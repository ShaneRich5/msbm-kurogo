<?php

Kurogo::includePackage('Courses');

/**
 * Class CoursesWebModule
 * @package Module
 * @subpackage Courses
 */
class CoursesWebModule extends WebModule
{
    protected $id = 'courses';
    private $token = "";

    protected function initializeForPage()
    {
        $this->$controller = DataRetriever::factory('MoodleDataRetriever.php', array());

        switch($this->page)
        {
            case 'index':
                # hard coded values
                # should be replaced by authentication
                $user = array(
                    'username' => '620065739',
                    'password' => '19941206',
                    'service' => 'moodle_mobile_app',
                    'moodlewsrestformat' => 'json'
                );

                # get user's moodle token
                $this->$token = $this->$controller->getToken($user); #JSON obj


                $userParam = array(
                    'wstoken' => $this->$token['wstoken'],
                    'wsfunction' => 'core_webservice_get_site_info'
                );

                # Retrieve user information
                $userInfo = $this->$controller->getUserId($userParam);

                # Retrieve json list of courses
                $coursesParam = array(
                    'wstoken' => $this->$token['wstoken'],
                    'wsfunction' => 'moodlewsrestformat',
                    'moodlewsrestformat' => 'json'
                );
                $userCourses = $this->controller->getCourses($coursesParam);

                $courseList = array();
                foreach ($userCourses as $courseData) {
                    $course = array(
                        'wstoken' => $this->$token['wstoken'],
                        'shortname' => $courseData['shortname'],
                        'fullname' => $courseData['fullname'],
                        'url' => $this->buildBreadcrumbURL('content', array('id' => $courseData['id'], 'token' => $token['wstoken'], 'name' => $courseData['shortname']))
                    );
                    $courseList[] = $course;
                }

                $this->assign('message', 'My Courses');
                $this->assign('token', $token['token']);
                $this->assign('userid', $userInfo['userid']);
                $this->assign('courseList', $courseList);

                # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=e23c35eeda5b1799ffcea51cec0c19b2&wsfunction=core_webservice_get_site_info

                break;
            case 'content':
                # pull course details
                # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=e23c35eeda5b1799ffcea51cec0c19b2&wsfunction=core_course_get_contents&courseid=1485

                $courseData = array(
                    'id' => $this->getArg('id'), # course content
                    'token' => $this->getArg('token'), # user token
                    'name' => $this->getArg('shortname') # shortened course name
                );

                if ($courseContent = $this->$controller->getContent($courseData)) {
                    foreach ($courseContent as $courseData) {

                    }
//                    $this->assign('courseName', $courseContent['']);
                }
            $this->assign('course_name', $courseData['name']);
        }
    }
}
