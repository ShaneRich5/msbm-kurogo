<?php
/**
 * Created by PhpStorm.
 * User: Shane
 * Date: 2/26/2015
 * Time: 12:32 AM
 */



class CalendarDataRetriever {

    public $service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
    public $email;
    public $password;
    public $client;

    function __construct($email, $password)
    {
        require_once 'Zend/Gdata.php';
        require_once 'Zend/Loader.php';

        Zend_Loader::registerAutoload();

        $this->email = $email;
        $this->password = $password;

//        $this->client = Zend_Gdata_ClientLogin::getHttpClient()
    }
}