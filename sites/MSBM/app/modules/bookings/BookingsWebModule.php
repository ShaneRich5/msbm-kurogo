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
                echo $_SESSION['moodle_token'];
                //$this->isMoodleTokenSet();
                //var_dump($_COOKIE['moodle_token']);
                $this->retrieveAccessToken();

                $events = $this->service
                    ->events
                    ->listEvents('41hloqnqe4a9pl0ngpocc2t92g@group.calendar.google.com');
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
                            'subtitle'  => $event->getId()
                        ];
                        $eventsList[] = $event;
//                        echo $event;
//
//                        var_dump($event->getId());
//                        $this->assign('sum',$event->getSummary());
//                        $this->assign("lol", $event);
                    }
                    $pageToken = $events->getNextPageToken();
                    if ($pageToken)
                    {
                        $optParams = [
                            'pageToken' => $pageToken
                        ];
                        $events = $this->service->events->listEvents('primary', $optParams);

                    }
                    else
                    {
                        break;
                    }
                }
                $this->assign('eventsList', $eventsList);

                break;
            case 'create':
                echo $_SESSION['moodle_token'];
                $this->isMoodleTokenSet();

                $this->retrieveAccessToken();

                if ($_SERVER['REQUEST_METHOD'] == 'POST') # if data was posted
                {
                    $event_name = $_POST['event-name'];
//                    var_dump($name);

                    $start_time = $_POST['start-date'];
//                    var_dump($start_date);


                    $start_time = $start_time . "T" . $_POST['start-time'] . ":00.000";
//                    var_dump($start_time);


                    var_dump($start_time);

                    $end_time = $_POST['end-date'];
                    $end_time = $end_time . "T" . $_POST['end-time'] . ":00.000";

                    $created_by = $_POST['event-creator']; # pull this from moodle

                    $event = new Google_Service_Calendar_Event();
                    $creator = new Google_Service_Calendar_EventCreator();

                    $creator->setEmail($created_by); # pull this from moodle


                    $event->setSummary($event_name); # name of event
                    $event->setLocation('Gazzebo_1'); # make a predefined list

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
                    $createdEvent = $this->service->events->insert('41hloqnqe4a9pl0ngpocc2t92g@group.calendar.google.com', $event);

                    $this->assign('id', $createdEvent->getId());
                }


//                $t = time();

//                $date = date("'Y-m-d\TH:i:s'", $t);

//                var_dump($date);

                $event = new Google_Service_Calendar_Event();

                $creator = new Google_Service_Calendar_EventCreator();
//                $creator->setEmail(); # pull this from moodle
//
//                $event->setSummary('Example'); # name of event
//                $event->setLocation('Gazzebo1'); # make a predefined list
//
//                $start = new Google_Service_Calendar_EventDateTime();
//                $start->setDateTime(time());
//
//                $event->setStart($start);
//
//                $end = new Google_Service_Calendar_EventDateTime();
//                $end->setDateTime(time() + (60 * 60 * 2));
//
//
//                $event->setEnd($end);
//
//                $createdEvent = $this->service->events->insert('primary', $event);
//
//                $this->assign('id', $createdEvent->getId());

                break;

            case 'list':

                break;

            case 'delete';

                break;

            case 'login':

                if (isset($_SESSION['moodle_token']))
                    $this->redirectTo('create');
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
                        Kurogo::redirectToURL('create');
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

    public function isMoodleTokenSet()
    {
        if (!isset($_SESSION['moodle_token']))
            $this->redirectTo('login');

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
}
