<?php 

require_once('config.php');

$users=$db->execute('select * from users');
print_r($_SERVER['REMOTE_ADDR']);

?>