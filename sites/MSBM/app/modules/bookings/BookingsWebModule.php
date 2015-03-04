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
    private $email;
    private $password;
    protected $client;

/*    function __construct()
//    {
//        $this->client = new Google_Client();
        // OAuth2 client ID and secret can be found in the Google Developers Console.

        # test values hard coded
//        $this->client->setClientId('987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com');
//        $this->client->setClientSecret('onkohzxipY8Rm-XTeouk8nyV');
//
//        $this->client->setRedirectUri('localhost:8888/bookings/index');
//        $this->client->setRedirectUri('http://kurogo.artuvic.com:8010/bookings/index');
//        $this->client->setApplicationName('MSBM');
//        $this->client->setAccessType()
//        $this->client->addScope('https://www.googleapis.com/auth/calendar');
//        $this->client->addScope('shane.richards121@gmail.com');
//        $this->client->addScope('email');
//        41hloqnqe4a9pl0ngpocc2t92g@group.calendar.google.com
//        $this->service = new Google_Service_Calendar($this->client);
//
//        $this->client->setRedirectUri('http://www.kurogo.artuvic.com/oauth2callback');
//        $this->client->addScope('email');

//        $this->service = new Google_Service_Calendar($this->client);
    }*/


    protected function initializeForPage() {

        switch($this->page) {
            case 'index':
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
                $this->isAccessSet();

                break;
            case 'list':
                $this->isAccessSet();

                break;
            case 'day';
                $this->isAccessSet();
                $links = array(
                    array(
                        'title' => 'Login',
                        'url' => $this->buildBreadcrumbURL('login', array())
                    ),
                );
                $this->assign('links', $links);
                break;

            case 'login':
                $formFields = $this->loadPageConfigArea($this->page, false);
                foreach ($formFields as $i => $formField) {
                    if (isset($formField['option_keys'])) {
                        $options = array();
                        foreach ($formField['option_keys'] as $j => $optionKey) {
                            $options[$optionKey] = $formField['option_values'][$j];
                        }
                        $formFields[$i]['options'] = $options;
                        unset($formFields[$i]['option_keys']);
                        unset($formFields[$i]['option_values']);
                    }
                }
                $this->assign('formFields', $formFields);
                break;

            case 'logout':
                # if token is set, unset it
                # redirect to index
                if (isset($_SESSION['google_token']))
                    unset($_SESSION['google_token']);

                $this->redirectTo('/index');
        }//END-- of switch
    }

    public function isAccessSet()
    {
        if (!isset($_SESSION['google_token']))
            $this->redirectTo('/index');
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