<?php  
include "config.php";
  
$server = getenv('server');
$db_username = getenv('db_username');
$db_password = getenv('db_password');
$db_name = getenv('db_name');

if ($server and $db_username and $db_password and $db_name) {
$con = mysqli_connect($server, $db_username, $db_password, $db_name);
}
else {

$con = mysqli_connect($yourservername, $yourdbusername, $yourdbpassword, $yourdbname);

}
?>
