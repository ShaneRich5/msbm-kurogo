<?php

session_start();
require_once('google-api-php-client/src/Google/autoload.php');


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

    protected $service_account_name = 'shane.richards121@gmail.com';

    function __construct()
    {
        $this->client = new Google_Client();
        // OAuth2 client ID and secret can be found in the Google Developers Console.
	#refresh token	
	$refreshToken = '1/bTAaKST4WXP1U16FzobZUqsOkKTK36j2G8dYZKMLjq8';
        # test values hard coded
        $this->client->setClientId('987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com');
        $this->client->setClientSecret('onkohzxipY8Rm-XTeouk8nyV');

        $this->client->setRedirectUri('localhost:8888/bookings/index');
        $this->client->setRedirectUri('http://kurogo.artuvic.com:8010/courses/index');
        $this->client->setApplicationName('MSBM');

        $this->client->addScope('https://www.googleapis.com/auth/calendar');
        $this->client->addScope('shane.richards121@gmail.com');
	$this->service = new Google_Service_Calendar($this->client);
	$this->client->authenticate('4/UJTpCcSpvRQn1bEfT2mhfbncIG-5OC3MNtp6caqVzCE.gq-Um0T2p7ESaDn_6y0ZQNhgUaoAmAI');
	$access_token = $this->client->getAccessToken();

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
                $this->isMoodleTokenSet(); // checks if user is logged in

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
                $this->isMoodleTokenSet();

                $this->isAccessTokenSet();

                break;
            case 'day';
                $this->isMoodleTokenSet(); // checks if user is logged in

                $this->isAccessTokenSet();
                $links = array(
                    array(
                        'title' => 'Login',
                        'url' => $this->buildBreadcrumbURL('login', array())
                    ),
                );
                $this->assign('links', $links);
                break;

            case 'login':

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

//
//    /**
//     * Initialization Using the API
//     */
//    protected function initializeForPage()
//    {
//
//        switch($this->page)
//        {
//            case 'index':
////                print "Please visit:\n$authUrl\n\n";
//                print "Please enter the auth code:\n";
//                $authCode = trim(fgets(STDIN));
//
//                // Exchange authorization code for access token
//                $accessToken = $this->client->authenticate($authCode);
//                $this->client->setAccessToken($accessToken);
//                break;
//            case 'create':
//                if ($token = Kurogo::getCache('token'))
//                {
//                    $this->redirectTo('booking/all');
//                }
////                $sqlDate = "SELECT * FROM booking booking_time";
////                $resultDate = $db->query($sqlDate, array('id', 'uwi_id', 'name', 'time_from', 'time_to'));
////
////                while ($row = $resultDate->fetch())
////                {
////
////                }
//
//                break;
//            case 'create':
//
//                $nav = array(
//                    'subtitle' => 'Subtitle',
//                    'title' => 'Booking',
//                    'url' => $this->buildBreadcrumbURL('book', array())
//                );
//                $this->assign('nav', $nav);
//                $this->assign('message', 'Hello World');
//
////                $sqlLocations = "SELECT * FROM booking_location";
////                $result = $db->query($sqlLocations, array('location', 'field1', 'field2'));
////                while ($row = $result->fetch())
////                {
////                    // add the location data here
////                }
//                $form = array(
//                    array(
//                        'name' => 'from',
//                        'title' => 'Time',
//                        'label' => 'from',
//                        'subtitle' => '(from)',
//                        'type' => 'time'
//                    ),
//
//                    array(
//                        'name' => 'to',
//                        'title' => 'Time',
//                        'label' => 'to',
//                        'subtitle' => '(to)',
//                        'type' => 'time'
//                    ),
//
//                    array(
//                        'name' => 'location',
//                        'title' => 'Location',
//                        'type' => 'select',
//                        'default' => 'pagoda1',
//                        'options' => array(
//                            'pogoda2',
//                            'pogoda3',
//                            'room1'
//                        ) // fill this inner array from database, gives more ontroll to admin
//                    ),
//
//                    array(
//                        'name' => 'date',
//                        'title' => 'Date',
//                        'type' => 'date',
//                        'value' => getdate()
//                    ),
//
//                    array(
//                        'name' => 'submit',
//                        'value' => 'Submit',
//                        'type' => 'submit'
//                    )
//
//                );
//                $this->assign('formFields', $form);
//                $this->assign('formListID', 'booking-form');
//                break;
//            case 'all':
//                $this->assign('username', $this->getArg('username'));
//                break;
//            default:
//                parent::initializeForPage();
//                break;
//        }
//    }
