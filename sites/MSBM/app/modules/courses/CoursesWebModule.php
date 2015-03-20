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

                    $loginResult = $this->controller->getToken($credentials); // retrieves the token

//                    $userData = $this->controller->getUserId($_COOKIE['moodle_token']);
                    # if unsuccessful, present user with error
                    # else, save the data to a cookie and proceed
                    if (array_key_exists('error', $loginResult))
                        $this->assign('error', 'Incorrect username or password');
                    else
                    {
                        $_SESSION['moodle_token'] = $loginResult['token'];

                        $userData = $this->controller->getUserId($_SESSION['moodle_token']);
                        $_SESSION['user_id'] = $userData['userid'];

                        $this->redirectTo('all');
                    }
                }

                break;
            case 'all':
                if ((!isset($_SESSION['moodle_token'])) && (!isset($_SESSION['user_id'])))
                    $this->redirectTo('index');

//                $user = $this->controller->getUserDetails('6150', '47aae912ad404c743d7b66ad0c6c0742');
//                var_dump($user);

                # Retrieve user info, using stored cookie
//                $userInfo = $this->controller->getUserId($_COOKIE['moodle_token']);

//                $_SESSION['userid'] = $userInfo['userid'];
//                $this->assign('info', $userInfo['userid']);

                $userInfo = $this->controller->getUserDetails($_SESSION['user_id'], $_SESSION['moodle_token']);
                var_dump($userInfo[0]['email']);

                # Retrieve json list of courses
                $coursesParam = array(
                    'wstoken' => $_SESSION['moodle_token'],
                    'wsfunction' => 'core_enrol_get_users_courses',
                    'userid' => $_SESSION['user_id'],
                );

                # Retrieve user courses and converts json to php array
                $userCourses = $this->controller->getCourses($coursesParam);

//                print_r($userCourses);
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

            # 'url' => $this->buildBreadcrumbURL('details', array('wstoken' => '47aae912ad404c743d7b66ad0c6c0742','wsfunction' => 'core_course_get_contents', 'courseid' => $courseData['id']), false)

            case 'details':
                if (!isset($_SESSION['moodle_token']))
                    $this->redirectTo('index');

                $id = $this->getArg('courseid');
                $token = $this->getArg('wstoken');

                $this->assign('wstoken', $token);
                $this->assign('id', $id);

                if ($courseContent = $this->controller->getContent($id, $token)) {

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

            /*
             * Used from bookings
             */
            case 'login':
                if (isset($_SESSION['moodle_token']) && isset($_SESSION['user_id']))
                {
                    $this->redirectToModule('bookings', 'index', []);
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

                    $loginResult = $this->controller->getToken($credentials); // retrieves the token

                    # if unsuccessful, present user with error
                    # else, save the data to a cookie and proceed
                    if (array_key_exists('error', $loginResult))
                        $this->assign('error', 'Incorrect username or password');
                    else
                    {
                        $_SESSION['moodle_token'] = $loginResult['token'];

                        $userBooking = $this->controller->getUserId($_SESSION['moodle_token']);
                        $_SESSION['user_id'] = $userBooking['userid'];
                        $_SESSION['full_name'] = $userBooking['fullname'];

                        $this->redirectToModule('bookings', 'index', []);
                    }
                }

                break;

            default:
                parent::initializeForPage();

        }

    }
}
