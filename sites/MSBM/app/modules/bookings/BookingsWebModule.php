<?php

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
class BookingsWebModule extends CalendarWebModule
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
//thing here wasn't being used 

    protected function initializeForPage()
    {
        session_start();
        $this->controller = DataRetriever::factory('MoodleDataRetriever', array());

        switch($this->page) {
            case 'index':

                $this->assign('today', mktime(0, 0, 0));
                $this->assign('dateFormat', $this->getLocalizedString("LONG_DATE_FORMAT"));
                try {
                    $this->retrieveAccessToken();
                } catch (Exception $e) {
                    header("Refresh:0");
                }
                
                $options = [
                    [
                        'title' => 'All Bookings',
                        'subtitle' => '',
                        'url' => $this->buildBreadcrumbURL('day', []),
                    ],
                ];

                if (isset($_SESSION['moodle_token'])) {
                    $options[] = [
                        'title'         => 'My Bookings',
                        'subtitle'      => '',
                        'url'           => $this->buildBreadcrumbURL('list', [
                            'feed'          => 'personal',
                        ]),
                    ];
                }

                //$options[] = [
                //        'title' => 'Booking Joined',
                //        'subtitle' => '',
                //        'url' => $this->buildBreadcrumbURL('list', [
                //            'feed'  =>  'participant',
                //       ]),
                //];

                $this->assign('feeds', $options);


                $this->assign('create_url', $this->createLinkToCreate());

//                $this->assign('eventsList', $eventsList);
                break;

            case 'create':

                //var_dump($_SESSION['moodle_token']);
                var_dump($_SESSION['user_id']);
                $this->isMoodleDataSet();

                $this->retrieveAccessToken();

                $locations = $this->getLocations(); # available locations

                $userDetails = $this->controller->getUserDetails($_SESSION['user_type'], $_SESSION['user_id'], $_SESSION['moodle_token']);

                $userEmail = $userDetails[0]['email'];

                $today = time();
                $year = date('Y', $today);
                $month = date('m', $today);
                $day = date('d', $today);

                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('day', $day);

                $this->assign('locations', $locations);
                $this->assign('email', $userEmail);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') # if data was posted
                {
                    /*
                     * Validation
                     */
                    $errors = $this->createEventValidation();

                    if (!empty($errors)) {
                        $next_day = false;

                        $event_name = $_POST['event-name'];

                        $event_location = $_POST['event-location'];

                        if ('PM' === $_POST['start-date-am-pm'])
                            $_POST['start-date-hour'] += 11; //original was causing an additional hour to be added to times 

                        if ('AM' === $_POST['start-date-am-pm'])
                            $_POST['start-date-hour'] -= 1; //original was causing an additional hour to be added to times

                        $start_time = $_POST['start-date-year']
                            . "-" . $_POST['start-date-month']
                            . "-" . $_POST['start-date-day'];

                        $start_time .= "T" . $_POST['start-date-hour']
                            . ":" . $_POST['start-date-minute'] . ":00.000";

//                        $end_time = $_POST['start-date-year']
//                            . "-" . $_POST['start-date-month']
//                            . "-" . $_POST['start-date-day'];

                        if ($_POST['event-duration'] == 1)
                        
                            $_POST['start-date-hour'] += 1;

                        elseif($_POST['event-duration'] == 2)
                        
                            $_POST['start-date-hour'] += 2;
                        
                        else
                        
                            $_POST['start-date-hour'] += 4; 

                        if ($_POST['start-date-hour'] >= 24) {
                            $_POST['start-date-hour'] -= 24;
                            $next_day = true;
                        }

//                        if ('PM' === $_POST['end-date-am-pm'])
//                            $_POST['end-date-hour'] += 11;  //original was causing an additional hor to be added to times

                        $end_time = $_POST['start-date-year']
                            . "-" . $_POST['start-date-month']
                            . "-" . $_POST['start-date-day'];

                        if ($next_day)
                            $end_time = strtotime("+1 day", strtotime($end_time));

                        $end_time .= "T" . $_POST['start-date-hour']
                            . ":" . $_POST['start-date-minute'] . ":00.000";

                        if (null == $this->isSlotBooked($start_time, $end_time, $event_location)) {
                            $event = new Google_Service_Calendar_Event();
//                        $organizer = new Google_Service_Calendar_EventOrganizer();

                            //$organizer->setEmail($userEmail);
                            //$organizer->setDisplayName($_SESSION['full_name']);

//                        $event->setOrganizer($organizer);

                            $attendee1 = new Google_Service_Calendar_EventAttendee();
                            $attendee1->setEmail($userEmail);
                            $attendees = [$attendee1];
                            $event->attendees = $attendees; //person creating booking added to attendees index 0 as neither creator nor organizer is being wrtitten to when tried.

                            //$event->colorId = "#2952A3";
                            $event->setColorId("5");

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


                            try {
                                $createdEvent = $this->service->events->insert('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com', $event);
                            } catch (Exception $e) {
                                $this->assign('error', 'Please fill out the fields correctly');
                            }
                            if ($e == NULL)
                                $this->redirectTo('day');
                        } else {
                            $this->assign('error', 'The selected time is already booked');
                            $errors[] = "The selected time is already booked";
                        }
                    } else {
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


                $organizer = $event->getOrganizer();

                $start = $event->getStart();
                $end = $event->getEnd();

//                $creator = $event->getCreator();
//                $attendees = $event->getAttendees();
//                $maker = $attendees[0]->email;

//                $creator = $event->getCreator();
//                $attendees = $event->getAttendees();
//                $maker = $attendees[0]->email;


                //$creator = $event->getCreator(); //not being used, not writable
                $attendees = $event->getAttendees(); //get person who made booking
                $maker = $attendees[0]->email;  //get person who made booking


                $color_id = $event->getColorId();
                //var_dump($color_id);
                if ($color_id == 10)
                    $confirmation = "Event Confirmed";
                elseif ($color_id == 5)
                    $confirmation = "Confirmation Pending";
                else
                    $confirmation = "Event Denied!";

                //var_dump($confirmation);

                //$colors = $service->colors->get();colorId
                //$col_id = $event->colorId;
                //var_dump($maker);

                $non_form_start = $event->getStart()->dateTime;
                $non_form_end = $event->getEnd()->dateTime;

                $this->assign('event_name', $event->getSummary());
                $this->assign('event_location', $event->location);

                $this->assign('event_confirmation', $confirmation);

//                $this->assign('creator_name', $creator->displayName);
                $this->assign('creator_email', $maker);

                $begin_time = date("h:i a", strtotime($non_form_start));
                $end_time = date("h:i a", strtotime($non_form_end));

                $begin_date = date("Y-m-d", strtotime($non_form_start));
                $end_date = date("Y-m-d", strtotime($non_form_end));

                $this->assign('start_time', $begin_time);
                $this->assign('start_date', $begin_date);

                $this->assign('end_time', $end_time);
                $this->assign('end_date', $end_date);


                if ($this->isOrganizer($maker)) {
                    $this->assign('edit_url', $this->linkTo('update', $event_id));
                    $this->assign('delete_url', $this->linkTo('delete', $event_id));
                }

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

                $event_id = $this->getArg('eventid');
                $calendar_id = $this->getArg('calendarid');

                $this->retrieveAccessToken();

                $event = $this->service->events->get($calendar_id, $event_id);

                $attendees = $event->getAttendees();

                $userDetails = $this->controller->getUserDetails($_SESSION['user_type'], $_SESSION['user_id'], $_SESSION['moodle_token']); //get the current users email address
                $userEmail = $userDetails[0]['email']; //get the current users email address

                if (0 != strcmp($attendees[0]->email, $userEmail))
                {
                    $this->redirectTo('details', [
                        'calendarid'    =>  $calendar_id,
                        'eventid'       =>  $event_id
                    ]);
                }

                $this->assign('');

                $updatedEvent = $this->service->events->update($calendar_id, $event_id, $event);

                break;

            case 'list': //shows bookings made by user

                $feed = $this->getArg('feed');

                if (($feed != 'personal') && ($feed != 'participant'))
                    $this->redirectTo('index');

                $userDetails = $this->controller->getUserDetails($_SESSION['user_type'], $_SESSION['user_id'], $_SESSION['moodle_token']); //get the current users email address
                $userEmail = $userDetails[0]['email']; //get the current users email address
                //var_dump($userDetails);
                $this->retrieveAccessToken();

                $eventsList = [];

                $events = $this->service
                    ->events
                    ->listEvents('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com');

                while (true)
                {
                    foreach ($events->getItems() as $event)
                    {
                        $attendees = $event->getAttendees();

                        if ($feed == 'personal') # events created by current user
                        {
                            var_dump($event->getAttendees()[0]->email);
                            if (0 == strcmp($attendees[0]->email, $userEmail))
                            {
                                $begin = date("h:i a", strtotime($event->getStart()->dateTime));
                                $end = date("h:i a", strtotime($event->getEnd()->dateTime));
                                $confirmed = $event->getColorId();

                                if($confirmed == 10)
                                    $confirmation = "Event Confirmed";
                                elseif($confirmed == 5)
                                    $confirmation = "Confirmation Pending";

                                $event = [
                                    'title'     => $event->getSummary() . " (". $confirmation . ") ",
                                    'subtitle'  => $begin . "-" . $end . " | " . sizeof($attendees) . " attending",
                                    'url'       => $this->buildBreadcrumbURL('details', [
                                        'calendarid'    => 'vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com',
                                        'eventid'       => $event->getId(),
                                    ])
                                ];
                                $eventsList[] = $event;
                            }
                        }
                        else
                        {
                            if ($this->isAttendee($attendees, $userEmail) )
                            {
                                $begin = date("h:i a", strtotime($event->getStart()->dateTime));
                                $end = date("h:i a", strtotime($event->getEnd()->dateTime));
                                $confirmed = $event->getColorId();

                                if($confirmed == 10)
                                    $confirmation = "Event Confirmed";
                                elseif($confirmed == 5)
                                    $confirmation = "Confirmation Pending";

                                $event = [
                                    'title'     => $event->getSummary() . " (". $confirmation . ") ",
                                    'subtitle'  => $begin . "-" . $end . " | " . sizeof($attendees) . " attending",
                                    'url'       => $this->buildBreadcrumbURL('details', [
                                        'calendarid'    => 'vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com',
                                        'eventid'       => $event->getId(),
                                    ])
                                ];
                                $eventsList[] = $event;
                            }
                        }
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

                $this->assign('events', $eventsList);


                $title = 'All My Bookings';

                $dayRange = new DayRange(time());

                $this->assign('feedTitle', $title);
                $this->assign('events',  $eventsList);

                $this->assign('create_url', $this->createLinkToCreate());

                break;

            case 'day':
                $current    = $this->getArg('time', time(), FILTER_VALIDATE_INT);
                $type       = $this->getArg('type', 'static');
                $calendar   = $this->getArg('calendar');
                $next       = strtotime("+1 day", $current);
                $prev       = strtotime("-1 day", $current);

                $start = new DateTime(date('Y-m-d H:i:s', $current), $this->timezone);
                $start->setTime(0,0,0);
                $end = clone $start;
                $end->setTime(23,59,59);
//                var_dump(date('Y-m-d',$current));

                $this->retrieveAccessToken();

                $eventsList = [];

                $events = $this->service
                    ->events
                    ->listEvents('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com');

                while (true)
                {
                    foreach ($events->getItems() as $event)
                    {
//                        var_dump(substr($event['start']['dateTime'], 0, 10));
                        $startDateTime = $event->getStart()->dateTime;
                        $endDateTime = $event->getEnd()->dateTime;
                        $begin = date("h:i a", strtotime($startDateTime));
                        $end = date("h:i a", strtotime($endDateTime));
                        $confirmed = $event->getColorId();

                        if($confirmed == 10)
                            $confirmation = "Event Confirmed";
                        elseif($confirmed == 5)
                            $confirmation = "Confirmation Pending";

                        //var_dump($event->getSummary());
                        //var_dump(date("h:i a", strtotime($startDateTime)));
                        //var_dump(date("h:i a", strtotime($endDateTime))); //date("H:i:s",strtotime($time))
                        $startDate = substr($event['start']['dateTime'], 0, 10);
                        $endDate = substr($event['end']['dateTime'], 0, 10);
                        $cmpDate = date('Y-m-d', $current);

                        if ((0 == strcmp($startDate, $cmpDate)) || (0 == strcmp($endDate, $cmpDate)))
                        {
                            if($confirmed != 11){
                                $event = [
                                    'title'     => $event->getSummary() . " (" . $confirmation . ") ",
                                    'subtitle'  => $begin . "-" . $end,//$event->getId(),
                                    'url'       => $this->buildBreadcrumbURL('details', [
                                        'calendarid'    => 'vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com',
                                        'eventid'       => $event->getId(),
                                    ])
                                ];
                                $eventsList[] = $event;
                            }
                        }
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

                $eventsToday = [];

                $title = 'Gazeebo Bookings';

                $dayRange = new DayRange(time());

                $this->assign('feedTitle', $title);
                $this->assign('type',    $type);
                $this->assign('calendar',$calendar);
                $this->assign('current', $current);
                $this->assign('next',    $next);
                $this->assign('prev',    $prev);
                $this->assign('nextURL', $this->dayURL($next, $type, $calendar, false));
                $this->assign('prevURL', $this->dayURL($prev, $type, $calendar, false));
                $this->assign('titleDateFormat', $this->getLocalizedString('MEDIUM_DATE_FORMAT'));
                $this->assign('linkDateFormat', $this->getLocalizedString('SHORT_DATE_FORMAT'));
                $this->assign('isToday', $dayRange->contains(new TimeRange($current)));
                $this->assign('events',  $eventsList);

                $this->assign('create_url', $this->createLinkToCreate());
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

                    $moodle_instance = $_POST['student-type'];

                    $result = $this->controller->getToken($moodle_instance, $credentials);

                    # if unsuccessful, present user with error
                    # else, save the data to a cookie and proceed
                    if (array_key_exists('error', $result))
                        $this->assign('error', 'Incorrect username or password');
                    else
                    {
                        $_SESSION['moodle_token'] = $result['token'];

                        $userBooking = $this->controller->getUserId($moodle_instance, $_SESSION['user_type'], $_SESSION['moodle_token']);
                        $_SESSION['user_id'] = $userBooking['userid'];
                        $_SESSION['full_name'] = $userBooking['fullname'];
                        $_SESSION['user_type'] = $moodle_instance;
                        $this->redirectTo('index');
                    }
                }

                break;

            case 'logout':
                # if token is set, unset it
                # redirect to index
                if (isset($_SESSION['google_token']))
                    session_destroy();

                $this->redirectTo('login');

                break;
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
                'name'          =>  'Gazebo 1',
                'description'   =>  ''
            ],
            [
                'name'          =>  'Gazebo 2',
                'description'   =>  ''
            ],
            [
                'name'          =>  'Gazebo 3',
                'description'   =>  ''
            ],
            [
                'name'          =>  'Gazebo 4',
                'description'   =>  ''
            ],
            [
                'name'          =>  'Gazebo 5',
                'description'   =>  ''
            ],
            [
                'name'          =>  'Gazebo 6',
                'description'   =>  ''
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

        if (!isset($_POST['event-name']))
            $validationErrors[] = 'No event name given';

        /*
         * Start section validation
         * Sets a default start date if none is provided
         */
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

//        2011-06-03T10:00:00.000-07:00
        /*
         * End section validation
         */

        if ((!isset($_POST['end-date-hour'])) || (1 > $_POST['end-date-hour']) || (12 < $_POST['end-date-hour']))
            $validationErrors[] = 'Invalid end hour';
        if ((!isset($_POST['end-date-minute'])) || (1 > $_POST['end-date-minute']) || (12 < $_POST['end-date-minute']))
            $validationErrors[] = 'Invalid end minutes';

        return $validationErrors;
    }

    private function isOrganizer($email)
    {
        $userDetails = $this->controller->getUserDetails($_SESSION['user_type'], $_SESSION['user_id'], $_SESSION['moodle_token']);
        return $email == $userDetails[0]['email'];
    }

    private function linkTo($page, $event_id)
    {
        return $this->buildBreadcrumbURL($page, [
            'calendarid'    => 'vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com',
            'eventid'       => $event_id
        ]);
    }

    public function isSlotBooked($userStart, $userEnd, $userLocation)
    {
        $this->retrieveAccessToken();

        $events = $this->service
            ->events
            ->listEvents('vu1bq6tvg5ogfmq5f5nlejo45o@group.calendar.google.com');

        while (true)
        {
            foreach ($events->getItems() as $event)
            {
                $start_ts = strtotime($event->getStart()->getDatetime());
                $end_ts = strtotime($event->getEnd()->getDatetime());
                $location = $event->getLocation();

                /*
                 * Checks if the user's time overlaps
                 */
                if ((($userStart >= $start_ts) && ($userStart <= $end_ts)) || (($userEnd >= $start_ts) && ($userEnd <= $end_ts)))
                {
                    if ($location === $userLocation)
                    {
                        var_dump($event);
                        return $event;
                    }
                }
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
        return null;
    }

    private function isAttendee($attendee, $email)
    {
        for ($i = 1; $i < sizeof($attendee); $i++)
        {
            if (0 == strcmp($attendee[$i], $email))
                return true;
        }
        return false;
    }

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

}
