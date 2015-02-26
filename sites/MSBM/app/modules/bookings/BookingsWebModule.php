<?php


Kurogo::includePackage('db');

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


    /**
     *
     */
    protected function initializeForPage()
    {
        $db = new db();
        $this->controller = DataRetriever::factory('MoodleDataRetriever', array());

        switch($this->page)
        {
            case 'index':
                if ($token = $_COOKIE['moodle_token'])
                {
                    $this->redirectTo('booking/all');
                }
//                $sqlDate = "SELECT * FROM booking booking_time";
//                $resultDate = $db->query($sqlDate, array('id', 'uwi_id', 'name', 'time_from', 'time_to'));
//
//                while ($row = $resultDate->fetch())
//                {
//
//                }

                break;
            case 'create':

                $nav = array(
                    'subtitle' => 'Subtitle',
                    'title' => 'Booking',
                    'url' => $this->buildBreadcrumbURL('book', array())
                );
                $this->assign('nav', $nav);
                $this->assign('message', 'Hello World');

//                $sqlLocations = "SELECT * FROM booking_location";
//                $result = $db->query($sqlLocations, array('location', 'field1', 'field2'));
//                while ($row = $result->fetch())
//                {
//                    // add the location data here
//                }
                $form = array(
                    array(
                        'name' => 'from',
                        'title' => 'Time',
                        'label' => 'from',
                        'subtitle' => '(from)',
                        'type' => 'time'
                    ),

                    array(
                        'name' => 'to',
                        'title' => 'Time',
                        'label' => 'to',
                        'subtitle' => '(to)',
                        'type' => 'time'
                    ),

                    array(
                        'name' => 'location',
                        'title' => 'Location',
                        'type' => 'select',
                        'default' => 'pagoda1',
                        'options' => array(
                            'pogoda2',
                            'pogoda3',
                            'room1'
                        ) // fill this inner array from database, gives more ontroll to admin
                    ),

                    array(
                        'name' => 'date',
                        'title' => 'Date',
                        'type' => 'date',
                        'value' => getdate()
                    ),

                    array(
                        'name' => 'submit',
                        'value' => 'Submit',
                        'type' => 'submit'
                    )

                );

                $this->assign('formFields', $form);
                $this->assign('formListID', 'booking-form');

                break;
            case 'all':
                $this->assign('username', $this->getArg('username'));
                break;
            default:
                parent::initializeForPage();
                break;
        }
    }
}