<?php
/**
 * Created by PhpStorm.
 * User: Shane
 * Date: 1/25/2015
 * Time: 8:40 PM
 */

//namespace MSBM\lib;

class MoodleDataRetriever extends URLDataRetriever
{
    protected $DEFAULT_PARSER_CLASS = 'JSONDataParser';
    public $format = array(
        'service' => 'moodlewsrestformat',
        'type' => 'json');

    public function getToken($user)
    {
        # example of a call for user token
        # http://ourvle.mona.uwi.edu/login/token.php?username=620065739&password=19941206&service=moodle_mobile_app
        $this->setBaseURL('http://ourvle.mona.uwi.edu/login/token.php');
        $this->addParameter('username', $user['username']);
        $this->addParameter('password', $user['password']);
        $this->addParameter('service', $user['service']);
        $this->setMethod('GET');
//        $this->addParameter($this->format['service'], $this->format['type']);
        $token = $this->getData($response);
        return $token;
    }

    public function getUserId($params)
    {
        # example of a call for user id
        # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=e23c35eeda5b1799ffcea51cec0c19b2&wsfunction=core_webservice_get_site_info
        $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('wstoken', $params['wstoken']);
        $this->addParameter('wsfunction', $params['wsfunction']);
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('GET');
        return $this->getData($response);
    }

    public function getCourses($params)
    {
        # example of a call for user's courses
        # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=47aae912ad404c743d7b66ad0c6c0742&wsfunction=core_enrol_get_users_courses&userid=6150&moodlewsrestformat=json
        $this->setBaseUrl('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('wstoken', $params['wstoken']);
        $this->addParameter('wsfunction', $params['wsfunction']);
        $this->addParameter('userid', $params['userid']);
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('GET');
        return $this->getData($response);
    }

    public function getContent($courseid, $token) {
        # gets course content
        # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=47aae912ad404c743d7b66ad0c6c0742&wsfunction=core_course_get_contents&courseid=76
        $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('courseid', $courseid);
        $this->addParameter('wstoken', $token);
        $this->addParameter('wsfunction', 'core_course_get_contents');
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('GET');
        return $this->getData($response);
    }
}