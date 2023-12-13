<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
require_once('config.php');
$clientIp=$_SERVER['REMOTE_ADDR'];
$insertIp=$db->execute("INSERT INTO ip_checklist(ip_address)VALUES('$clientIp')");
if($insertIp){
    
    $users=$db->execute("select COUNT(ip_address) as ip_count from ip_checklist WHERE ip_address='$clientIp'");
    $ipResult=mysqli_fetch_array($users);
    
    if($ipResult['ip_count']>3){
        echo "Request Declined: This IP Address requested the data more than 3 times";
    }else{

        $userList=$db->execute("SELECT username from users");
        while($userResult=mysqli_fetch_array($userList)){
            echo $userResult['username'];
        }

    }

}



?>