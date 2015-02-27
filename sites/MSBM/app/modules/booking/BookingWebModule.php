<?php
Kurogo::includePackage('db');
class BookingWebModule extends WebModule
{
  protected $id='booking';
    protected $apiMessage = 'Calender Call: ';
    protected $apiText1 = 'Message: ';
    protected $apiText2 = 'Message: ';

    //Database configuration --Incomplete--
    /*protected function searchTime($date) {
        try {
            $db = new db();
            $sql = "SELECT * FROM reservation WHERE Room_Date=?";
            $result = $db->query($sql, array($date));
            while ($row = $result->fetch()) {
                //RETURN RESULTS to Screen
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    protected function reserveTime($name, $id, $room, $date, $time, $duration, $size) {
        $isThere = true;
        try {
            $db = new db();
            $sql = "SELECT * FROM reservation WHERE Room_Date= '" . $date . "' " . "AND Room_Time= '" . $time . "'; ";
            $result = $db->query($sql, array($date, $time));
            while ($row = $result->fetch()) {
                //RETURN RESULTS to Screen
            }
            if (!($isThere)) {
                $sql = "INSERT INTO reservation (Student, Student_ID, Room, Room_Date, Room_Time, Duration, Group_Size) VALUES (";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }*/

    //Gebre's Code Application --Copied Zend Folder into module--
    function load(){
        // load library
        require_once 'Zend/Loader.php';
        Zend_Loader::loadClass('Zend_Gdata');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
        Zend_Loader::loadClass('Zend_Gdata_Calendar');
        Zend_Loader::loadClass('Zend_Http_Client');

        // create authenticated HTTP client for Calendar service
        $gcal = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
        $user = "testemailaddr@gmail.com";
        $pass = "n3wp@ssw0rd";
        //echo $pass;
        $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $gcal);
        $gcal = new Zend_Gdata_Calendar($client);
        return $gcal;
    }

    function find($title){
        $lists = array();

        if(isset($title)){
            // set configuration parameters
            $userid = 'guestservices.mvl%40gmail.com';
            $magicCookie = 'aae21d7c4ce28d4c24095f1377c91eaf';
            $query = str_replace(' ', '+', $title);

            $feedURL = "http://www.google.com/calendar/feeds/$userid/private-$magicCookie/basic?q=$query";
            $this->assign('apiMessage',"$feedURL"); //Returns URL into...thing
            // read feed into SimpleXML object
            $sxml = simplexml_load_file($feedURL);

            // get number of events
            $counts = $sxml->children('http://a9.com/-/spec/opensearchrss/1.0/');
            $total = $counts->totalResults;
            $this->assign('apiText1',"$sxml->title");

            //echo "$total event(s) found.";
            // build feed URL
            //echo '<ol>';

            // iterate over entries in category
            // print each entry's details
            foreach ($sxml->entry as $entry) {
                $title = stripslashes($entry->title);
                $idstr = stripslashes($entry->id);
                $summary = stripslashes($entry->summary);
                $id_arry = explode("/", $idstr);
                print_r($id_arry);
                $id = $id_arry[count($id_arry)-1];
                echo "<li>\n";
                echo "<h2>$title</h2>\n";
                echo "$id <br />";
                echo "$summary <br/>\n";
                echo "</li>\n";
            }
            if(isset($id)){

                return $id;
            }
            return -1;
            echo '</ol>';
        }else{
            echo 'No Title inputted';
            return -1;
        }
    }


    //Kurogo Module Application
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

  protected function initializeForPage(){
	$this->assign('message','Facility Booking Service');
    switch($this->page){
      case 'index':
        $links = array(
            array(
                'title' => 'Multimedia Room',
                'url'   => $this->buildBreadcrumbURL('media', array()),
            ),
            array(
                'title' => 'Gazebo',
                'url'   => $this->buildBreadcrumbURL('gaz', array()),
            ),
        );
        $this->assign('links', $links);
            break;

      case 'media':
        $this->assign('text', 'Multimedia Room');
        //$this->assign('lists', $this->getListsForPage($this->page));
        $links = array(
            array(
               'title' => 'Create Reservation',
               'url'   => $this->buildBreadcrumbURL('create', array()),
            ),
            array(
                'title' => 'View Reservations',
                'url'   => $this->buildBreadcrumbURL('view', array()),
            ),
          );
          $this->assign('links', $links);
          break;

      case 'gaz':
        $this->assign('text', 'Gazebo');
        //$this->assign('lists', $this->getListsForPage($this->page));
          $links = array(
              array(
                  'title' => 'Create Reservation',
                  'url'   => $this->buildBreadcrumbURL('create', array()),
              ),
              array(
                  'title' => 'View Reservations',
                  'url'   => $this->buildBreadcrumbURL('view', array()),
              ),
          );
          $this->assign('links', $links);
            break;

      case 'create':
        $this->assign('text', 'New Reservation');
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

      case 'view':
        $this->assign('text', 'Reservations');

        if ($title = $this->getArg('title')) {
            $this->setPageTitles($title);
        }
        $this->assign('next',    'Next');
        $this->assign('prev',    'Prev');
        $this->assign('nextURL', $this->buildBreadcrumbURL($this->page, $this->args, false));
        $this->assign('prevURL', $this->buildBreadcrumbURL($this->page, $this->args, false));
        $this->assign('lists',   $this->getListsForPage($this->page));
        break;
      }//END of Switch

    }//END of Function
}

