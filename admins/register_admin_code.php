<?php
include "../db_conn.php";
include "../config.php";
function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
$username = $_POST['username'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
/* Check If The Input Fields Are Empty */
$uname = validate($username);
$pass = validate($password);
$niname = validate($nickname);
if (empty($uname) && empty($pass) && empty($niname)){
  $both_empty = "<center><h1 style='color:red;'>Username And Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
	    echo $both_empty;
}
else if (empty($uname)) {
		$uname_empty = "<center><h1 style='color:red;'>Username Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
	    echo $uname_empty;
	}else if(empty($pass)){
  $pass_empty = "<center><h1 style='color:red;'>Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
	    echo $pass_empty;
}
else if(empty($niname)){
  $niname_empty = "<center><h1 style='color:red;'>Nickname Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
	    echo $niname_empty;
}
/* Continue If They're Not Empty */
  else {
  /* Get The Username and Password From Input */
$username = $_POST['username'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$re_password = $_POST['re_password'];
  /* To Check For Owner Profile */
$sql_owner = "SELECT * FROM $owners_table WHERE username='$username'";
  /* To Check For An Admin Profile */  
$sql_admin = "SELECT * FROM $admins_table WHERE username='$username'";
 /* To Check For Normal User Accounts */   
$sqle = "SELECT * FROM $users_table WHERE username='$username'";
/* Resulting Inputs */
$result_owner = mysqli_query($con, $sql_owner);
$row_owner = mysqli_fetch_assoc($result_owner);
$result_admin = mysqli_query($con, $sql_admin);
$row_admin = mysqli_fetch_assoc($result_admin);
$result = mysqli_query($con, $sqle);
$row = mysqli_fetch_assoc($result);
 /* Checking Existing Users */   
if ($row['username'] == $username or $row_admin['username'] == $username or $row_owner['username']){
  $already_registered = "<center><h1 style='color:red;'>Username Is Already Registered</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
  echo $already_registered;
  exit();
}
/* Creat A Profile */  
else {
if ($password == $re_password){
  
$sql = "INSERT INTO `$admins_table` (id, username, password, nickname) VALUES (0, '$username', '$password', '$nickname')";

$rs = mysqli_query($con, $sql);
if($rs)
{
  /* Profile Created Successfully */
  $reg_success = "<center><h1 style='color:Green;'>Register Successful</h1><br><h2 style='color:green;'>Welcome Your Username is $nickname</h2><br><h2 style='color:green;'>Your Nickname is $nickname</h2><br><h3>Login Using Your Username And Password</h3></center> <meta http-equiv='refresh' content='3; URL=../' />";
 echo $reg_success;
}
else {
  /* Something Went Wrong While Creating */
  $error_register = "<center><h1 style='color:red;'>Something Went Wrong Try Again</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
  echo $error_register;
}
}
else{
  /* Passwords Don't Match */
  $pass_no_match = "<center><h1 style='color:red;'>Passwords Don't Match</h1></center> <meta http-equiv='refresh' content='3; URL=/register_admin.php' />";
  echo $pass_no_match;
}
}
  }
?>