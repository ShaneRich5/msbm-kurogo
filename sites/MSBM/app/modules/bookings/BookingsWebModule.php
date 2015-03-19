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

//    function __construct()
//    {
//
//        $conn = mysqli_connect('localhost', 'root', 'root', 'kurogo');
//        if(!$conn){
//             die('Connect Error: ' . mysqli_connect_error());
//        }

//
//
//            $this->client = new Google_Client();
//            // OAuth2 client ID and secret can be found in the Google Developers Console.
//        #refresh token
//        //$refreshToken = '1/bTAaKST4WXP1U16FzobZUqsOkKTK36j2G8dYZKMLjq8';
//            # test values hard coded
//            $this->client->setClientId('987849558796-5a1oa8h6la31s7l8ve5vsisjlhsahfrj.apps.googleusercontent.com');
//            $this->client->setClientSecret('onkohzxipY8Rm-XTeouk8nyV');
//
//            $this->client->setRedirectUri('localhost:8888/bookings/index');
//            $this->client->setRedirectUri('http://kurogo.artuvic.com:8010/courses/index');
//            $this->client->setApplicationName('MSBM');
//
//            $this->client->addScope('https://www.googleapis.com/auth/calendar');
//            $this->client->addScope('shane.richards121@gmail.com');
//
//            $this->service = new Google_Service_Calendar($this->client);
//            //$this->client->authenticate('4/UJTpCcSpvRQn1bEfT2mhfbncIG-5OC3MNtp6caqVzCE.gq-Um0T2p7ESaDn_6y0ZQNhgUaoAmAI');
//            //$this->access_token = $this->client->getAccessToken();
//
//            //$this->client->setAccessToken($refreshToken);
//            //if ($this->client->isAccessTokenExpired())
//            //    $this->client->refreshToken($refreshToken);
//
//        $this->service = new Google_Service_Calendar($this->client);
//        //$this->client->authenticate('4/egQcISXQMD-Tv8PggVgTEb3KVkqf1AkikeEbcBOaNds.cjXCnwZzA4MdaDn_6y0ZQNgmzL4TmAI');
//        //$access_token = $this->client->getAccessToken();
//        //$tokens_decoded = json_decode($access_token);
//        //$refresh_token = $tokens_decoded->refresh_token;
//
//        //$sql = "INSERT INTO google_cal (access_token, refresh_token) VALUES ( '$access_token', '$refresh_token')";
//
//        $get = "SELECT * FROM google_cal";
//        $result = mysqli_query($conn, $get);
//        //if (mysqli_query($conn, $get)) {
//        if (mysqli_num_rows($result) > 0){
//            $tokens = mysqli_fetch_assoc($result);
////                echo "New record created successfully" . $tokens['refresh_token'];
//        } else {
//            echo "Error: " . $get . "<br>" . $conn->error;
//        }
//        $this->access_token = $this->client->setAccessToken($tokens['access_token']);
//        if ($this->client->isAccessTokenExpired()) {
//
//            $this->refresh_token = $tokens['refresh_token'];
//            $this->client->refreshToken($this->refresh_token);
//            $this->access_token = $this->client->getAccessToken();
//            $tokens_decoded = json_decode($this->access_token);
//            $this->refresh_token = $tokens_decoded->refresh_token;
//            echo "Got new access token" . $this->refresh_token;
//            $update = "UPDATE google_cal SET access_token='$this->access_token', refresh_token='$this->refresh_token' WHERE id=0";
//            //$result = mysqli_query($conn, $get);
//            if (mysqli_query($conn, $update)) {
//                echo "Record updated successfully";
//            } else {
//                echo "Error updating record: " . mysqli_error($conn);
//            }
//            $this->client->authenticate($this->access_token);
//        }
////        var_dump($this->access_token);
////        $this->client->authenticate($this->access_token);
//        //$this->client->setAccessToken($refreshToken);
//        //if ($this->client->isAccessTokenExpired()) {
//        //    $this->client->refreshToken($refreshToken);
//        //  }
//
//
//    }


    protected function initializeForPage()
    {
        $this->controller = DataRetriever::factory('MoodleDataRetriever', array());

        switch($this->page) {
            case 'index':
                //$this->isMoodleTokenSet();
                //var_dump($_COOKIE['moodle_token']);
                $this->retrieveAccessToken();

                $events = $this->service
                    ->events
                    ->listEvents('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com');
//                var_dump(json_encode($events, true));
//                var_dump(json_encode($events));

//                $events = json_encode($events); # converts received json to array

                $eventsList = [];

                while (true)
                {
                    foreach ($events->getItems() as $event)
                    {
                        $event = [
                            'title'     => $event->getSummary(),
                            'subtitle'  => $event->getId(),
                            'url'       => $this->buildBreadcrumbURL('details', [
                                'calendarid'    => 'vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com',
                                'eventid'       => $event->getId(),
                            ])
                        ];
                        $eventsList[] = $event;
                    }
                    $pageToken = $events->getNextPageToken();
                    if ($pageToken)
                    {
                        $optParams = [
                            'pageToken' => $pageToken
                        ];
                        $events = $this->service->events->listEvents('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com', $optParams);

                    }
                    else
                    {
                        break;
                    }
                }
                $this->assign('create_url', $this->createLinkToCreate());

                $this->assign('eventsList', $eventsList);
                break;
            case 'create':
                $this->isMoodleDataSet();

                $this->retrieveAccessToken();

                $locations = $this->getLocations(); # available locations

                $userDetails = $this->controller->getUserDetails($_SESSION['user_id'], $_SESSION['moodle_token']);
                $userEmail = $userDetails[0]['email'];

                $this->assign('locations', $locations);
                $this->assign('email', $userEmail);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') # if data was posted
                {
                    $errors = []; # validation errors

                    /*
                     * Validation
                     */

                    $errors = $this->createEventValidation();

                    if (!empty($errors)) {
                        $event_name = $_POST['event-name'];

                        $event_location = $_POST['event-location'];

                        if ('PM' === $_POST['start-date-am-pm'])
                            $_POST['start-date-am-pm'] += 12;

                        $start_time = $_POST['start-date-year']
                            . "-" . $_POST['start-date-month']
                            . "-" . $_POST['start-date-day'];

                        $start_time .= "T" . $_POST['start-date-hour']
                            . ":"
                            . $_POST['start-date-minute'] . ":00.000";

                        if ('PM' === $_POST['start-date-am-pm'])
                            $_POST['end-date-am-pm'] += 12;

                        $end_time = $_POST['end-date-year']
                            . "-" . $_POST['end-date-month']
                            . "-" . $_POST['end-date-day'];

                        $end_time .= "T" . $_POST['end-date-hour']
                            . ":"
                            . $_POST['end-date-minute'] . ":00.000";

//                        $created_by = $_POST['event-creator']; # pull this from moodle
                        $created_by = $userDetails[0]['email'];

                        $event = new Google_Service_Calendar_Event();
                        $creator = new Google_Service_Calendar_EventCreator();

                        $creator->setEmail($userEmail); # pull this from moodle

                        $event->setSummary($event_name); # name of event

                        $event->setLocation($event_location); # make a predefined list

                        $start = new Google_Service_Calendar_EventDateTime();
                        $start->setTimeZone('America/Jamaica');
                        $start->setDateTime($start_time);

                        $event->setStart($start);

                        $end = new Google_Service_Calendar_EventDateTime();
                        $end->setTimeZone('America/Jamaica');
                        $end->setDateTime($end_time);


                        $event->setEnd($end);

                        //41hloqnqe4a9pl0ngpocc2t92g@group.calendar.google.com
                        //mine  k1tphoccb98nsglm123se5aoa4@group.calendar.google.com
                        $createdEvent = $this->service->events->insert('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com', $event);

                        $this->assign('id', $createdEvent->getId());

                        $this->redirectTo('index');
                    }
                    else
                    {
                        $this->assign('errors', $errors);
                    }
                }

                break;
            case 'details':
                $this->isMoodleDataSet();

                $this->retrieveAccessToken();

                $calendar_id = $this->getArg('calendarid');
                $event_id = $this->getArg('eventid');


                $event = $this->service->events->get($calendar_id, $event_id);
                $creator = $event->getCreator();
                $start = $event->getStart();
                $end = $event->getEnd();

                $this->assign('event_name', $event->getSummary());
                $this->assign('event_location', $event->location);

                $this->assign('creator_name', $creator->displayName);
                $this->assign('creator_email', $creator->email);

                $this->assign('start_time', $start->dateTime);
                $this->assign('start_date', $start->date);

                $this->assign('end_time', $end->dateTime);
                $this->assign('end_date', $end->date);

                $delete_url = $this->buildBreadcrumbURL('delete', [
                    'calendarid'    => 'vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com',
                    'eventid'       => $event->getId()
                ]);

                $this->assign('delete_url', $delete_url);
                $this->assign('create_url', $this->createLinkToIndex());
                $this->assign('index_url', $this->createLinkToIndex());

                break;
            case 'delete':
                $this->isMoodleDataSet();

                $this->retrieveAccessToken();

                $calendar_id = $this->getArg('calendarid');
                $event_id = $this->getArg('eventid');

                $this->service->events->delete($calendar_id, $event_id);

                $this->assign('create_url', $this->createLinkToCreate());

                $this->assign('index_url', $this->createLinkToIndex());

                break;
            case 'update':

                break;
            case 'login':
                if ((isset($_SESSION['moodle_token'])) && (isset($_SESSION['user_id'])))
                    $this->redirectTo('index');
                else if (!empty($_POST))
                {
                    # NEEDS
                    # VALIDATION

                    $credentials = [
                        'username'  => $_POST['username'],
                        'password'  => $_POST['password'],
                    ];

                    $result = $this->controller->getToken($credentials);

                    # if unsuccessful, present user with error
                    # else, save the data to a cookie and proceed
                    if (array_key_exists('error', $result))
                        $this->assign('error', 'Incorrect username or password');
                    else
                    {
                        setcookie('moodle_token', $result['token'], time() + (60 *60 *24 * 30));
                        $this->redirectTo('create');
                    }
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

    public function isMoodleDataSet()
    {
        if ((!isset($_SESSION['moodle_token'])) && (!isset($_SESSION['user_id'])))
        {
            $this->redirectToModule('courses', 'login', []);
        }
    }

    public function getLocations()
    {
        return $locations = [
            [
                'name'          =>  'gazebo_1',
                'description'   => ''
            ],
            [
                'name'          =>  'gazebo_2',
                'description'   => ''
            ],
            [
                'name'          =>  'gazebo_3',
                'description'   => ''
            ],
            [
                'name'          =>  'gazebo_4',
                'description'   => ''
            ],
            [
                'name'          =>  'gazebo_5',
                'description'   => ''
            ],
            [
                'name'          =>  'gazebo_6',
                'description'   => ''
            ]
        ];
    }

    public function createLinkToCreate()
    {
        return $this->buildBreadcrumbURL('create', []);
    }


    private function createLinkToIndex()
    {
        return $this->buildBreadcrumbURL('index', []);
    }

    public function retrieveAccessToken()
    {
        $conn = mysqli_connect('localhost', 'root', 'kurogo', 'kurogo');
        if(!$conn){
            die('Connect Error: ' . mysqli_connect_error());
        }

        $this->client = new Google_Client();
        // OAuth2 client ID and secret can be found in the Google Developers Console.
        #refresh token
        //$refreshToken = '1/bTAaKST4WXP1U16FzobZUqsOkKTK36j2G8dYZKMLjq8';
        # test values hard coded
        $this->client->setClientId('893211488768-c8lcurkricsfrpsc1qnptauqn5dbviud.apps.googleusercontent.com');
        $this->client->setClientSecret('F24HBb8OiwFh1VM7zPZDJ8mz');

        $this->client->setRedirectUri('localhost:8888/bookings/index');
        $this->client->setRedirectUri('http://kurogo.artuvic.com:8010/courses/index');
        $this->client->setApplicationName('MSBM Mobile');

        $this->client->addScope('https://www.googleapis.com/auth/calendar');
        $this->client->addScope('msbm.mobile@gmail.com');

        $this->service = new Google_Service_Calendar($this->client);
        //$this->client->authenticate('4/UJTpCcSpvRQn1bEfT2mhfbncIG-5OC3MNtp6caqVzCE.gq-Um0T2p7ESaDn_6y0ZQNhgUaoAmAI');
        //$this->access_token = $this->client->getAccessToken();

//        $scope = new Google_Service_Calendar_AclRuleScope();
//        $scope->setType('user');
//        $scope->setValue('shane.richards121@gmail.com');
//
//        $rule = new Google_Service_Calendar_AclRule();
//        $rule->setRole('owner');
//        $rule->setScope( $scope );



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
//            echo "New record created successfully" . $tokens['refresh_token'];
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
//                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            $this->client->authenticate($this->access_token);
        }
    }

    private function createEventValidation()
    {
        $validationErrors = [];
        $time = time();

        if (!isset($_POST['event-name']))
            $validationErrors[] = 'No event name given';

        /*
         * Start section validation
         */
        if (!isset($_POST['start-date-year']))
            $_POST['start-date-year'] = date('YYYY', $time);
        if (!isset($_POST['start-date-month']))
            $_POST['start-date-day'] = date('MM', $time);
        if (!isset($_POST['start-date-day']))
            $_POST['start-date-day'] = date('DD', $time);

        if ((!isset($_POST['start-date-year'])) || (3000 > $_POST['start-date-year']) || (2000 < $_POST['start-date-year']))
            $validationErrors[] = 'Invalid start year';
        if ((!isset($_POST['start-date-month'])) || (1 > $_POST['start-date-month']) || (12 < $_POST['start-date-month']))
            $validationErrors[] = 'Invalid start month';
        if ((!isset($_POST['start-date-day'])) || (1 > $_POST['start-date-day']) || (31 < $_POST['start-date-day']))
            $validationErrors[] = 'Invalid start month';

        if ((!isset($_POST['start-date-hour'])) || (1 > $_POST['start-date-hour']) || (12 < $_POST['start-date-hour']))
            $validationErrors[] = 'Invalid start hour';
        if ((!isset($_POST['start-date-minute'])) || (1 > $_POST['start-date-minute']) || (12 < $_POST['start-date-minute']))
            $validationErrors[] = 'Invalid start minutes';

        /*
         * End section validation
         */

        if (!isset($_POST['end-date-year']))
            $_POST['end-date-year'] = date('YYYY', $time);
        if (!isset($_POST['end-date-month']))
            $_POST['end-date-day'] = date('MM', $time);
        if (!isset($_POST['end-date-day']))
            $_POST['end-date-day'] = date('DD', $time);

        if ((!isset($_POST['end-date-year'])) || (3000 > $_POST['end-date-year']) || (2000 < $_POST['end-date-year']))
            $validationErrors[] = 'Invalid end year';
        if ((!isset($_POST['end-date-month'])) || (1 > $_POST['end-date-month']) || (12 < $_POST['end-date-month']))
            $validationErrors[] = 'Invalid end month';
        if ((!isset($_POST['end-date-day'])) || (1 > $_POST['end-date-day']) || (31 < $_POST['end-date-day']))
            $validationErrors[] = 'Invalid end month';

        if ((!isset($_POST['end-date-hour'])) || (1 > $_POST['end-date-hour']) || (12 < $_POST['end-date-hour']))
            $validationErrors[] = 'Invalid end hour';
        if ((!isset($_POST['end-date-minute'])) || (1 > $_POST['end-date-minute']) || (12 < $_POST['end-date-minute']))
            $validationErrors[] = 'Invalid end minutes';

        return $validationErrors;
    }
}
