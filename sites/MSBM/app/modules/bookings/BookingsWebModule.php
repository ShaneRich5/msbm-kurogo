<?php

session_start();
require_once('google-api-php-client/src/Google/autoload.php');
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

    function __construct()
    {
        $this->client = new Google_Client();
        // OAuth2 client ID and secret can be found in the Google Developers Console.

        # test key, hard coded,
        # erase key when finished
        $this->client->setClientId('987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com');
        $this->client->setClientSecret('onkohzxipY8Rm-XTeouk8nyV');
        $this->client->setRedirectUri('localhost:8888/bookings/index');
//        $this->client->setRedirectUri('http://kurogo.artuvic.com:8010/bookings/index');
        $this->client->setApplicationName('MSBM');
//        $this->client->setAccessType()
        $this->client->addScope('https://www.googleapis.com/auth/calendar');
        $this->client->addScope('shane.richards121@gmail.com');
//        $this->client->addScope('email');
//        41hloqnqe4a9pl0ngpocc2t92g@group.calendar.google.com
        $this->service = new Google_Service_Calendar($this->client);


    }

    protected function initializeForPage()
    {

        switch($this->page)
        {
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

                break;
            case 'week':
                # if the token is not set
                # redirect to login
                $this->redirectTo('/index');

                break;
            case 'logout':
                # if token is set, unset it
                # redirect to index
                if (isset($_SESSION['google_token']))
                    unset($_SESSION['google_token']);

                $this->redirectTo('/index');

                break;
            default:
                parent::initializeForPage();
                break;
        }
    }

    public function isAccessSet()
    {
        if (!isset($_SESSION['google_token']))
            $this->redirectTo('/index');
    }
}
