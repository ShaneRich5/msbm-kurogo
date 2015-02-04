<?php
/**
 * Created by PhpStorm.
 * User: Shane
 * Date: 1/25/2015
 * Time: 8:40 PM
 */

class MoodleTokenDataRetriever extends URLDataRetriever
{
    public $DEFAULT_PARSER_CLASS = 'JSONDataParser';
    public $format = array(
        'service' => 'moodlewsrestformat',
        'type' => 'json');

    public function getToken($user)
    {
        $this->setBaseURL('http://ourvle.mona.uwi.edu/login/token.php');
        $this->addParameter('username', $user['username']);
        $this->addParameter('password', $user['password']);
        $this->addParameter('service', $user['moodle_mobile_app']);
        $this->addParameter($this->format['service'], $this->format['type']);
        $token = $this->getData($response);
        return $token;
    }

    public function getUserId($params)
    {
        $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('wstoken', $params['wstoken']);
        $this->addParameter('wsfunction', $params['wsfunction']);
        $this->addParameter($this->format['service'], $this->format['type']);
        return $this->getData($response);
    }

    public function getCourses($params)
    {
        $this->setBaseUrl('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('wstoken', $params['wstoken']);
        $this->addParameter('&wsfunction', $params['wsfunction']);
        $this->addParameter($this->format['service'], $this->format['type']);
        return $this->getData($response);
    }

    public function getContent($courseid) {
        $this->setBaseURL('http://ourvle.mona.uwi.edu/webservice/rest/server.php');
        $this->addParameter('id', $courseid);
        $this->addParameter('wstoken', 'e23c35eeda5b1799ffcea51cec0c19b2');
        $this->addParameter('wsfunction', 'core_course_get_contents');
        return $this->getData($response);
    }
}