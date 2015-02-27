<?php


Kurogo::includePackage('db');

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
    {
        $this->client = new Google_Client();
        // OAuth2 client ID and secret can be found in the Google Developers Console.

        # test values hard coded
        $this->client->setClientId('987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com');
        $this->client->setClientSecret('onkohzxipY8Rm-XTeouk8nyV');
        $this->client->setRedirectUri('http://www.kurogo.artuvic.com/oauth2callback');
        $this->client->addScope('email');

        $this->service = new Google_Service_Calendar($this->client);
    }*/

    protected function getListsForPage($page) {
        $lists = array();

        $supportedFields = array(
            'titles'    => 'title',
            'subtitles' => 'subtitle',
            'urls'      => 'url',
            'imgs'      => 'img',
            'classes'   => 'class',
        );

        $configs = $this->loadPageConfigArea($page, false);
        foreach ($configs as $config) {
            if (!isset($config['titles'])) { continue; }

            $list = array(
                'description' => self::argVal($config, 'description', 'list'),
                'items' => array(),
            );
            foreach ($config['titles'] as $i => $title) {
                $item = array();
                foreach ($supportedFields as $fieldArray => $supportedField) {
                    if (isset($config[$fieldArray], $config[$fieldArray][$i])) {
                        $item[$supportedField] = $config[$fieldArray][$i];
                    }
                }
                if (!isset($item['url'])) {
                    $args = $this->args;
                    if (isset($item['title'])) {
                        $args['title'] = $item['title'];
                    }
                    $item['url'] = $this->buildBreadcrumbURL($this->page, $args);
                }
                $list['items'][] = $item;
            }
            $lists[] = $list;
        }

        return $lists;
    }

    protected function initializeForPage() {

        switch($this->page) {
            case 'index':
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

            case 'today':
                $this->assign('out', 'Logout');
                $this->assign('outURL', $this->buildBreadcrumbURL('logout', array()));
                $this->assign('lists', $this->getListsForPage($this->page));
                break;

        }//END-- of switch
    }

    /**
     * Initialization Using the API
     */
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
}