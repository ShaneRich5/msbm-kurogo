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

//        var_dump($this->issset($_COOKIE['moodle_token']));
        switch ($this->page)
        {
            // login validation
            case 'index':
                if (isset($_COOKIE['moodle_token'])) // checks if the user's token has been saved in memory
                {
                    $this->redirectTo('all'); // and if so, redirects to courses page
                } else if (!empty($_POST)){  // attempts login
                    /**
                     * ADD VALIDATION
                     *
                     * TODO
                     */
                    $credentials = array(
                        'username' => $_POST['username'],
                        'password' => $_POST['password'],
                        'service' => 'moodle_mobile_app'
                    );

                    $loginResult = $this->controller->getToken($credentials); // retrieves the token

                    if (array_key_exists('error', $loginResult))
                        $this->assign('error', 'Incorrect username or password');
                    else
                    {
                        setcookie('moodle_token', $loginResult['token'], time() + (60 *60 *24 * 30));
                        Kurogo::redirectToURL('all');
                    }


                }

                break;
            case 'all':
                $this->assign('token', $_COOKIE['moodle_token']);
                $userParam = array(
                    'wstoken' => $_COOKIE['moodle_token'],
                    'wsfunction' => 'core_webservice_get_site_info'
                );

                # Retrieve user information
                $userInfo = $this->controller->getUserId($userParam);
                $_SESSION['userid'] = $userInfo['userid'];

                $this->assign('info', $userInfo['userid']);

                # Retrieve json list of courses
                $coursesParam = array(
                    'wstoken' => $_COOKIE['moodle_token'],
                    'wsfunction' => 'core_enrol_get_users_courses',
                    'userid' => $userInfo['userid'],
                );

                # Retrieve user courses and converts json to php array
                $userCourses = $this->controller->getCourses($coursesParam);

//                print_r($userCourses);
                # prep list for courses
                $coursesList = array();



                foreach ($userCourses as $courseData)
                {
                    $course = array(
                        'subtitle' => $courseData['shortname'],
                        'title' => $courseData['fullname'],
                        'url' => $this->buildBreadcrumbURL('details', array(
                            'wstoken' => '47aae912ad404c743d7b66ad0c6c0742',
                            'courseid' => $courseData['id'])
                        )
                    );
                    $coursesList[] = $course;
                }

                $this->assign('coursesList', $coursesList);
                break;

            # 'url' => $this->buildBreadcrumbURL('details', array('wstoken' => '47aae912ad404c743d7b66ad0c6c0742','wsfunction' => 'core_course_get_contents', 'courseid' => $courseData['id']), false)

            case 'details':
                $id = $this->getArg('courseid');
                $token = $this->getArg('wstoken');

                $this->assign('wstoken', $token);
                $this->assign('id', $id);

                if ($courseContent = $this->controller->getContent($id, $token)) {
//                    var_dump($courseContent);
                    $contentList = array();
                    $detailsList = array();

                    foreach ($courseContent as $sectionContent) {

                        $details = array();

//                        var_dump(is_array($sectionContent['modules']));

                        if(is_array($sectionContent['modules']))
                        {
                            foreach ($sectionContent['modules'] as $sectionDetails)
                            {
                                var_dump(array_key_exists('name', $sectionContent));
                                $details = array(
                                    'name' => $sectionDetails['name']
                                );
                                $detailsList[] = $details;
                            }

                        }

                        $section = array(
                            'subtitle' => $sectionContent['id'],
                            'section_name' => $sectionContent['name'],
                            'section_details' => $detailsList
                        );


                        $contentList[] = $section;
                    }
                    $this->assign('contentList', $contentList);
                }

                break;
            default:
                parent::initializeForPage();

        }

    }
}
