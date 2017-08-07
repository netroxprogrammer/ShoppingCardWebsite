<?php

class Database{
    private $DB_Name= DB_NAME;
    private $DB_Host =DB_HOST;
    private $DB_User =DB_USER;
    private $DB_Pass = DB_PASS;
    private $link;
    private $error;
    public function __construct(){
        $this->connection();
    }
    private function connection(){

        $this->link = new mysqli($this->DB_Host,$this->DB_User,$this->DB_Pass,$this->DB_Name)
        or die("Sorry No DataBase Connection ");

    }
    public function getData($query)
    {
        $result = $this->link->query($query) or die($this->link->error);
        if ($result) {
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return false;
            }
        }
    }
    public function insertData($query){
        $result = $this->link->query($query) or  die($this->link->error);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public  function deleteData($query){
        $result = $this->link->query($query) or  die($this->link->error);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
?>