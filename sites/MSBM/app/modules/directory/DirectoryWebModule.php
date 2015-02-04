<?php
    Kurogo::includePackage('db');
    class DirectoryWebModule extends Webmodule
    {
        protected $id = 'directory';
        protected function initializeForPage(){
            $this -> assign('message', 'Directory');
            $contacts = array();
            try{
                $db = new db();
                $sql = "SELECT * FROM directory";
                $result = $db->query($sql);
                while ($row = $result->fetch()) {
                    //echo 'hello';
                    //$this -> assign('name', $row['fname'], );
                    $contacts[] = array(
                        "fname" => $row['fname'],
                        "lname" => $row['lname'],
                        "jobTitle" => $row['jobTitle'],
                        "unit" => $row['unit']
                    );
                }
                //print_r($contacts);
            $this -> assign('contacts', $contacts);
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

    }

?>
