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
        $this->controller = DataRetriever::factory('MoodleDataRetriever', array());

        switch ($this->page)
        {
            case 'index':
                $this->assign('message', 'Hello World');

                # hard coded values
                # should be replaced by authentication
//
//                $user = array(
//                    'username' => '620065739',
//                    'password' => '19941206',
//                    'service' => 'moodle_mobile_app'
//                );
//
//                # get user's moodle token
//                $this->token = $this->controller->getToken($user); #JSON obj

//                $this->assign('token', $this->token['token']);

                $userParam = array(
                    'wstoken' => '47aae912ad404c743d7b66ad0c6c0742',
                    'wsfunction' => 'core_webservice_get_site_info'
                );

                # Retrieve user information
                $userInfo = $this->controller->getUserId($userParam);

                $this->assign('info', $userInfo['userid']);

                # Retrieve json list of courses
                $coursesParam = array(
                    'wstoken' => '47aae912ad404c743d7b66ad0c6c0742',
                    'wsfunction' => 'core_enrol_get_users_courses',
                    'userid' => $userInfo['userid'],
                );

                # Retrieve user courses and converts json to php array
                $userCourses = $this->controller->getCourses($coursesParam);

//                print_r($userCourses);
                # prep list for courses
                $coursesList = array();


//                foreach ($userCourses as $courseData)
//                {
//                    $course = array(
//                        'id' => $courseData['id'],
//                        'shortname' => $courseData['shortname'],
//                        'fullname' => $courseData['fullname'],
//                        'usercount' => $courseData['enrolledusercount'],
//                        'idnumber' => $courseData['idnumber'],
//                        'url' =>  '/courses/details?wstoken=47aae912ad404c743d7b66ad0c6c0742&wsfunction=core_course_get_contents&courseid=' . $courseData['id']
//                    );
//                    $coursesList[] = $course;
//                }

                foreach ($userCourses as $courseData)
                {
                    $course = array(
                        'subtitle' => $courseData['shortname'],
                        'title' => $courseData['fullname'],
                        'url' => $this->buildBreadcrumbURL('details', array('wstoken' => '47aae912ad404c743d7b66ad0c6c0742','wsfunction' => 'core_course_get_contents', 'courseid' => $courseData['id']))
                    );
                    $coursesList[] = $course;
                }

                $this->assign('coursesList', $coursesList);
                break;

            # 'url' => $this->buildBreadcrumbURL('details', array('wstoken' => '47aae912ad404c743d7b66ad0c6c0742','wsfunction' => 'core_course_get_contents', 'courseid' => $courseData['id']), false)
            case 'details':
                $id = $this->getArg('courseid');
                $token = $this->getArg('wstoken');
                $func = $this->getArg('wsfunction');
                $this->assign('wstoken', $token);
                $this->assign('id', $id);
                $this->assign('func', $func);
                if ($courseContent = $this->controller->getContent($id, $token, $func)) {
                    $contentList = array();

                    foreach ($courseContent as $section) {
                        $detail = array(
                            'subtitle' => $section['id'],
                            'title' => $section['name']
                        );
                        $contentList[] = $detail;
                    }
                    $this->assign('contentList', $contentList);
                }

//                else {
//                    $this->redirectTo('index');
//                }
                break;
            default:
                parent::initializeForPage();

        }

//<KEY name="idnumber"> &wsfunction=core_course_get_contents&courseid=76
//<VALUE>JAPA10010</VALUE>
//</KEY>




//  wsfunction=core_enrol_get_users_courses&userid=9742

//
//        switch($this->page)
//        {
//            case 'index':
//                # Retrieve user information
//                $userInfo = $this->$controller->getUserId($userParam);
//
//                # Retrieve json list of courses
//                $coursesParam = array(
//                    'wstoken' => $this->$token['wstoken'],
//                    'wsfunction' => 'moodlewsrestformat',
//                    'moodlewsrestformat' => 'json'
//                );
//                $userCourses = $this->controller->getCourses($coursesParam);
//
//                $courseList = array();
//                foreach ($userCourses as $courseData) {
//                    $course = array(
//                        'wstoken' => $this->$token['wstoken'],
//                        'shortname' => $courseData['shortname'],
//                        'fullname' => $courseData['fullname'],
//                        'url' => $this->buildBreadcrumbURL('content', array('id' => $courseData['id'], 'token' => $token['wstoken'], 'name' => $courseData['shortname']))
//                    );
//                    $courseList[] = $course;
//                }
//
//                $this->assign('message', 'My Courses');
//                $this->assign('token', $token['token']);
//                $this->assign('userid', $userInfo['userid']);
//                $this->assign('courseList', $courseList);
//
//                # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=e23c35eeda5b1799ffcea51cec0c19b2&wsfunction=core_webservice_get_site_info
//
//                break;
//            case 'content':
//                # pull course details
//                # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=e23c35eeda5b1799ffcea51cec0c19b2&wsfunction=core_course_get_contents&courseid=1485
//
//                $courseData = array(
//                    'id' => $this->getArg('id'), # course content
//                    'token' => $this->getArg('token'), # user token
//                    'name' => $this->getArg('shortname') # shortened course name
//                );
//
//                if ($courseContent = $this->$controller->getContent($courseData)) {
//                    foreach ($courseContent as $courseData) {
//
//                    }
////                    $this->assign('courseName', $courseContent['']);
//                }
//            $this->assign('course_name', $courseData['name']);
//        }
    }
}
