<?php
/**
 * Created by PhpStorm.
 * User: Shane
 * Date: 1/25/2015
 * Time: 8:40 PM
 */

define("MASTER_STUDENT", "M");
define("UNDERGRAD_STUDENT", "U");

class MoodleDataRetriever extends URLDataRetriever
{
    protected $DEFAULT_PARSER_CLASS = 'JSONDataParser';
    public $format = array(
        'service' => 'moodlewsrestformat',
        'type' => 'json');

    public function getToken($moodle, $user)
    {
        # example of a call for user token
        # http://ourvle.mona.uwi.edu/login/token.php?username=620065739&password=19941206&service=moodle_mobile_app
        if (0 == strcmp(MASTER_STUDENT, $moodle))
            $this->setBaseURL('http://173.45.230.79/learning/login/token.php');
        else
            $this->setBaseURL('http://ourvle.mona.uwi.edu/login/token.php');

        $this->addParameter('username', $user['username']);
        $this->addParameter('password', $user['password']);
        $this->addParameter('service', 'moodle_mobile_app');
        $this->setMethod('GET');
//        $this->addParameter($this->format['service'], $this->format['type']);
        $token = $this->getData($response);
        return $token;
    }

    public function getUserId($moodle, $wstoken)
    {
        # example of a call for user id
        # http://ourvle.mona.uwi.edu/webservice/rest/server.php?wstoken=e23c35eeda5b1799ffcea51cec0c19b2&wsfunction=core_webservice_get_site_info

        if (0 == strcmp(MASTER_STUDENT, $moodle))
            $this->setBaseURL('http://173.45.230.79/learning/login/token.php');
        else
            $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');

        $this->addParameter('wstoken', $wstoken);
        $this->addParameter('wsfunction', 'core_webservice_get_site_info');
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('GET');
        return $this->getData($response);
    }

    public function getCourses($moodle, $params)
    {
        if (0 == strcmp(MASTER_STUDENT, $moodle))
            $this->setBaseURL('http://173.45.230.79/learning/login/token.php');
        else
            $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('wstoken', $params['wstoken']);
        $this->addParameter('wsfunction', $params['wsfunction']);
        $this->addParameter('userid', $params['userid']);
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('GET');
        return $this->getData($response);
    }

    public function getContent($moodle, $courseid, $token)
    {
        if (0 == strcmp(MASTER_STUDENT, $moodle))
            $this->setBaseURL('http://173.45.230.79/learning/login/token.php');
        else
            $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');

        $this->addParameter('courseid', $courseid);
        $this->addParameter('wstoken', $token);
        $this->addParameter('wsfunction', 'core_course_get_contents');
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('GET');
        return $this->getData($response);
    }

    public function getUserDetails($moodle, $userid, $token)
    {
        if (0 == strcmp(MASTER_STUDENT, $moodle))
            $this->setBaseURL('http://173.45.230.79/learning/login/token.php');
        else
            $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');

        $this->addParameter('wstoken', $token);
        $this->addParameter('wsfunction', 'core_user_get_users_by_id');
        $this->addParameter('userids[0]', $userid);
//        $this->addParameter('username', '620065739');
//        $this->addParameter('wsfunction', 'view_user_details');
        $this->addParameter($this->format['service'], $this->format['type']);
        $this->setMethod('POST');
        return $this->getData($response);
    }
}