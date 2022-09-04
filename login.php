<?php
session_start();
include "db_conn.php";
include "config.php";
function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
$username = $_POST['username'];
$password = $_POST['password'];
/* Check If The Input Fields Are Empty */
$uname = validate($username);
$pass = validate($password);
if (empty($uname) && empty($pass)){
  $both_empty = "<center><h1 style='color:red;'>Username And Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
	    echo $both_empty;
}
else if (empty($uname)) {
		$uname_empty = "<center><h1 style='color:red;'>Username Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
	    echo $uname_empty;
	}else if(empty($pass)){
  $pass_empty = "<center><h1 style='color:red;'>Password Can't Be Empty</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
	    echo $pass_empty;
}
  /* Continue If They're Not Empty */
  else {
/* Get The Input Username And Password From The DataBase */
$sql = "SELECT * FROM $users_table WHERE username='$username' AND password='$password'";
$result = mysqli_query($con, $sql);
    /* Check IF the User is An Admin */
$sql_admin = "SELECT * FROM $admins_table WHERE username='$username' AND password='$password'";
    $row = mysqli_fetch_assoc($result);
$result_admin = mysqli_query($con, $sql_admin);
$row_admin = mysqli_fetch_assoc($result_admin);
    /* Check IF The User Is The Owner */
$sql_owner = "SELECT * FROM $owners_table WHERE username='$username' AND password='$password'";
$owner_result = mysqli_query($con, $sql_owner);
$row_owner = mysqli_fetch_assoc($owner_result);
    /*Check For Owner */
if ($row_owner['username'] == $username and $row_owner['password'] == $password){
    $_SESSION['owner_username'] = $row_owner['username'];
    $_SESSION['owner_id'] = $row_owner['id'];
  $_SESSION['owner_nickname'] = $row_owner['nickname'];
    header("Location: admins/owner.php");
    exit();
  }
  /* Continue If Not The Owner */
else {
    /* Check For Admin */
if ($row_admin['username'] == $username and $row_admin['password'] == $password){
    $_SESSION['admin_username'] = $row_admin['username'];
    $_SESSION['admin_id'] = $row_admin['id'];
    $_SESSION['admin_nickname'] = $row_admin['nickname'];
    header("Location: admins/");
    exit();
  }
  /* Continue If Not An Admin */
else{
if ($row['username'] == $username){
  
  if ($row['password'] == $password){
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    header("Location: users/");
    exit();
  }
    }
else{
  /* If The Username or Password Are Incorrect or The User Is Not Registered */
  $incorrect_user = "<center><h1 style='color:red;'>Incorrect Username or Password</h1></center> <meta http-equiv='refresh' content='3; URL=/' />";
  echo $incorrect_user;
}
}
  }
  }
?>