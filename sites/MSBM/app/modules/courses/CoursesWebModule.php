<?php

/**
 * Class CoursesWebModule
 * @package Module
 * @subpackage Courses
 */
class CoursesWebModule extends WebModule
{
    protected $id = 'courses';

    protected function initializeForPage()
    {
        $this->controller = DataRetriever::factory('MoodleDataRetriever', array()); // interacts with moodle's api
        session_start();
//        var_dump($this->issset($_COOKIE['moodle_token']));
        switch ($this->page)
        {
            // login validation
            case 'index':
//                $_SESSION['moodle_token'];
                # if the user's token has been saved in memory, skip this page,
                # else, display login page
                var_dump('token' . $_SESSION['moodle_token']);
                var_dump('user ID' . $_SESSION['user_id']);

                $userData = $this->controller->getUserId('MASTER_STUDENT', $_SESSION['moodle_token']);
                var_dump('user data' . $userData['user_id']);

                if (isset($_SESSION['moodle_token']) && isset($_SESSION['user_id']))
                {
                    $this->redirectTo('all');
                }
                else if (!empty($_POST)){
                    /**
                     * ADD VALIDATION
                     *
                     * TODO
                     */
                    $credentials = [
                        'username' => $_POST['username'],
                        'password' => $_POST['password'],
                    ];

                    $moodle_instance = $_POST['student-type'];

                    $loginResult = $this->controller->getToken($moodle_instance, $credentials); // retrieves the token

                    # if unsuccessful, present user with error
                    # else, save the data to a cookie and proceed
                    if (array_key_exists('error', $loginResult))
                        $this->assign('error', 'Incorrect username or password');
                    else
                    {
                        $_SESSION['moodle_token'] = $loginResult['token'];

                        $userData = $this->controller->getUserId($moodle_instance, $_SESSION['moodle_token']);

                        $_SESSION['user_id'] = $userData['userid'];
                        $_SESSION['user_type'] = $moodle_instance;

                        $this->redirectTo('all');
                    }
                }

                break;

            case 'all':
                var_dump($_SESSION['user_type']);
                if ((!isset($_SESSION['moodle_token'])) && (!isset($_SESSION['user_id'])))
                    $this->redirectTo('index');

                $userInfo = $this->controller->getUserDetails($_SESSION['user_type'], $_SESSION['user_id'], $_SESSION['moodle_token']);

                if(0 == strcmp(MASTER_STUDENT,$_SESSION['user_type'])){
                    var_dump('EMINEM');
                    $moodle_version_wsfunction = 'moodle_enrol_get_users_courses';
                }else{
                     var_dump('Hammer Time');
                     $moodle_version_wsfunction = 'core_enrol_get_users_courses';
                }

                # Retrieve json list of courses
                $coursesParam = array(
                    'wstoken' => $_SESSION['moodle_token'],
                    'wsfunction' => $moodle_version_wsfunction,
                    'userid' => $_SESSION['user_id'],
                );

                # Retrieve user courses and converts json to php array
                $userCourses = $this->controller->getCourses($_SESSION['user_type'], $coursesParam);

                # prep list for courses
                $coursesList = [];

                foreach ($userCourses as $courseData)
                {
                    $course = [
                        'subtitle' => $courseData['shortname'],
                        'title' => $courseData['fullname'],
                        'url' => $this->buildBreadcrumbURL('details', [
                            'wstoken' => $_SESSION['moodle_token'],
                            'courseid' => $courseData['id']]
                        )
                    ];
                    $coursesList[] = $course;
                }

                $this->assign('coursesList', $coursesList);
                break;

            case 'details':
                if (!isset($_SESSION['moodle_token']))
                    $this->redirectTo('index');

                $id = $this->getArg('courseid');
                $token = $this->getArg('wstoken');

                $this->assign('wstoken', $token);
                $this->assign('id', $id);

                if ($courseContent = $this->controller->getContent($_SESSION['user_type'], $id, $token)) {

                    $contentList = array();

                    foreach ($courseContent as $sectionContent) {

                        $detailsList = array();

                        if (is_array($sectionContent['modules']))
                        {
                            foreach ($sectionContent['modules'] as $sectionDetails)
                            {
                                $details = array(
                                    'title'  => $sectionDetails['name'],
                                );
                                if (array_key_exists('contents', $sectionDetails))
                                {
//                                    var_dump($sectionDetails['contents']);

                                    foreach($sectionDetails['contents'] as $findUrl)
                                    {
                                        if (array_key_exists('fileurl', $findUrl))
                                        {
                                            $details = array_merge($details, array(
                                                'url' => $findUrl['fileurl'] . '&token=' . $_COOKIE['moodle_token']
                                            ));
//                                            var_dump($findUrl['fileurl']);
                                        }
                                    }

                                      if (array_key_exists('fileurl', $sectionDetails['contents'])){
//                                        var_dump($sectionDetails['contents']['fileurl']);
//                                        array_merge($details, array(
//                                            'url' => $sectionDetails['contents']['fileurl']
//                                        ));
//                                        var_dump(array('url' => $sectionDetails['contents']['fileurl']));
                                    }

                                }

//                                if (array_key_exists('contents', $sectionDetails))
//                                {
//                                    var_dump($sectionDetails['contents']);
//                                    if (array_key_exists('fileurl', $sectionDetails['contents']))
//                                    {
//                                        var_dump(array_key_exists('fileurl', $sectionDetails['contents']));
//                                    }

//                                    $details = array_merge($details, array(
//                                        'url' => $sectionDetails['contents']['fileurl'] . $_COOKIE['moodle_token']
//                                    ));
//                                }
//                                var_dump($sectionDetails['contents']);

                                $detailsList[] = $details;
                            }

                        }

                        $section = array(
                            'subtitle'          => $sectionContent['id'],
                            'section_name'      => $sectionContent['name'],
                            'section_details'   => $detailsList
                        );


                        $contentList[] = $section;
                    }
                    $this->assign('contentList', $contentList);
                }
                break;

            case 'logout':
                if (isset($_SESSION['moodle_token']))
                    session_destroy();
                $this->redirectTo('index');
                break;

            default:
                $this->redirectTo('index');

        }

    }
}
