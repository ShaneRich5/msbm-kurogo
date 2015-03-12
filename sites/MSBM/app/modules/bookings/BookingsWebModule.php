<?php

session_start();
require_once('google-api-php-client/src/Google/autoload.php');

//$conn = mysqli_connect('localhost', 'root', 'kurogo', 'kurogo');
//if(!$conn){
//	 die('Connect Error: ' . mysqli_connect_error());
//}



//require_once('google-api-php-client/autoload.php');
/**
 * Class BookingsWebModule
 * @package Modules
 * @subpackage Bookings
 */
class BookingsWebModule extends WebModule
{
    /**
     * Specifies the module name
     *
     * @var string
     */
    protected $id = 'bookings';

    private $service;
    private $password;
    protected $client;
    protected $access_token;
    protected $refresh_token;

    protected $service_account_name = 'shane.richards121@gmail.com';

    function __construct()
    {

        $conn = mysqli_connect('localhost', 'root', 'root', 'kurogo');
        if(!$conn){
             die('Connect Error: ' . mysqli_connect_error());
        }


            $this->client = new Google_Client();
            // OAuth2 client ID and secret can be found in the Google Developers Console.
        #refresh token
        //$refreshToken = '1/bTAaKST4WXP1U16FzobZUqsOkKTK36j2G8dYZKMLjq8';
            # test values hard coded
            $this->client->setClientId('987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com');
            $this->client->setClientSecret('onkohzxipY8Rm-XTeouk8nyV');

            $this->client->setRedirectUri('localhost:8888/bookings/index');
            $this->client->setRedirectUri('http://kurogo.artuvic.com:8010/courses/index');
            $this->client->setApplicationName('MSBM');

            $this->client->addScope('https://www.googleapis.com/auth/calendar');
            $this->client->addScope('shane.richards121@gmail.com');

            $this->service = new Google_Service_Calendar($this->client);
            //$this->client->authenticate('4/UJTpCcSpvRQn1bEfT2mhfbncIG-5OC3MNtp6caqVzCE.gq-Um0T2p7ESaDn_6y0ZQNhgUaoAmAI');
            //$this->access_token = $this->client->getAccessToken();

            //$this->client->setAccessToken($refreshToken);
            //if ($this->client->isAccessTokenExpired())
            //    $this->client->refreshToken($refreshToken);

        $this->service = new Google_Service_Calendar($this->client);
        //$this->client->authenticate('4/egQcISXQMD-Tv8PggVgTEb3KVkqf1AkikeEbcBOaNds.cjXCnwZzA4MdaDn_6y0ZQNgmzL4TmAI');
        //$access_token = $this->client->getAccessToken();
        //$tokens_decoded = json_decode($access_token);
        //$refresh_token = $tokens_decoded->refresh_token;

        //$sql = "INSERT INTO google_cal (access_token, refresh_token) VALUES ( '$access_token', '$refresh_token')";

        $get = "SELECT * FROM google_cal";
        $result = mysqli_query($conn, $get);
        //if (mysqli_query($conn, $get)) {
        if (mysqli_num_rows($result) > 0){
            $tokens = mysqli_fetch_assoc($result);
                echo "New record created successfully" . $tokens['refresh_token'];
        } else {
            echo "Error: " . $get . "<br>" . $conn->error;
        }
        $this->access_token = $this->client->setAccessToken($tokens['access_token']);
        if ($this->client->isAccessTokenExpired()) {

            $this->refresh_token = $tokens['refresh_token'];
            $this->client->refreshToken($this->refresh_token);
            $this->access_token = $this->client->getAccessToken();
            $tokens_decoded = json_decode($this->access_token);
            $this->refresh_token = $tokens_decoded->refresh_token;
            echo "Got new access token" . $this->refresh_token;
            $update = "UPDATE google_cal SET access_token='$this->access_token', refresh_token='$this->refresh_token' WHERE id=0";
            //$result = mysqli_query($conn, $get);
            if (mysqli_query($conn, $update)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            $this->client->authenticate($this->access_token);
        }
//        var_dump($this->access_token);
//        $this->client->authenticate($this->access_token);
        //$this->client->setAccessToken($refreshToken);
        //if ($this->client->isAccessTokenExpired()) {
        //    $this->client->refreshToken($refreshToken);
        //  }


    }


    protected function initializeForPage()
    {

        $this->controller = DataRetriever::factory('MoodleDataRetriever', array());

        switch($this->page) {
            case 'index':
                // $this->isMoodleTokenSet(); // checks if user is logged in

//                if (!isset($_COOKIE['moodle_token']))
//                    $this->redirectTo('login');

                $this->assign('token', $_COOKIE['moodle_token']);
                if (!isset($_SESSION['google_token']))
                {
//                    $authUrl = $this->client->createAuthUrl();
//                    $this->assign('logi', $authUrl);

                    $scope = 'https://www.googleapis.com/auth/calendar';
                    $client_id = '987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com';
                    $redirect_uri = 'http://kurogo.artuvic.com:8010/bookings/index';

                    $params = [
                        'response_type' =>  'code',
                        'client_id'     =>  $client_id,
                        'redirect_uri'  =>  $redirect_uri,
                        'scope'         =>  $scope,
                    ];

                    $url = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);

                    $this->assign('logi', $url);

                }

                break;
            case 'create':
                $this->isMoodleTokenSet(); // checks if user is logged in

                $this->isAccessTokenSet();

                break;

            case 'list':
                // $this->isMoodleTokenSet();

                $this->isAccessTokenSet();

                break;

            case 'day';
                // $this->isMoodleTokenSet(); // checks if user is logged in

                $this->isAccessTokenSet();

                $links = [
                    [
                        'title' => 'Login',
                        'url' => $this->buildBreadcrumbURL('login', [])
                    ],
                ];

                $this->assign('links', $links);
                break;

            case 'login':


                $this->assign("access", $this->access_token);

                if (isset($_COOKIE['moodle_token']))
                {
                    $this->redirectTo('index');
                }
                else if (!empty($_POST)) // if a post was sent to this page
                {
                    $credentials = [
                        'username'  =>  $_POST['username'],
                        'password'  =>  $_POST['password'],
                    ];

                    $result = $this->controller->getToken($credentials);

                    if (array_key_exists('error', $result))
                        $this->assign('error', 'Incorrect login credentials');
                    else
                    {
                        setcookie('moodle_token', $result['token'], time() + (60 *60 *24 * 30));
                        Kurogo::redirectToURL('index');
                    }

                }
                else // kenneth you need to explain this
                {


//                    $formFields = $this->loadPageConfigArea($this->page, false);
//                    foreach ($formFields as $i => $formField) {
//                        if (isset($formField['option_keys'])) {
//                            $options = array();
//                            foreach ($formField['option_keys'] as $j => $optionKey) {
//                                $options[$optionKey] = $formField['option_values'][$j];
//                            }
//                            $formFields[$i]['options'] = $options;
//                            unset($formFields[$i]['option_keys']);
//                            unset($formFields[$i]['option_values']);
//                        }
//                    }
//                    $this->assign('formFields', $formFields);
                }


                break;

            case 'logout':
                # if token is set, unset it
                # redirect to index
                if (isset($_SESSION['google_token']))
                    unset($_SESSION['google_token']);

                if (isset($_COOKIE['moodle_token']))
                    setcookie('moodle_token', '', time() - 3600);

                $this->redirectTo('login');
        }
    }

    public function isAccessTokenSet()
    {
        if (!isset($_SESSION['google_token']))
        {

        }
        $this->client->setAccessToken($_SESSION['google_token']);

    }

    public function isMoodleTokenSet()
    {
        if (!isset($_COOKIE['moodle_token']))
            $this->redirectTo('login');

    }
}
