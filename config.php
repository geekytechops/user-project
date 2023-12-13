<?php

class database {

    private $conn='';

    public function __construct(){
        $this->connect=mysqli_connect('localhost','root','');
    }

    public function dbConnect($dbName){
        mysqli_query($this->connect , "use $dbName");
        return $this->connect;
    }

    public function execute($query){
        return mysqli_query($this->connect ,$query );
    }


}

$db=new database();
$conn=$db->dbConnect('user_project');

?>