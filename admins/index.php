<?php 
session_start();
include "../config.php";
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])){

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
	<title><?php echo $_SESSION['admin_nickname']; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center>
     <h1>Hello, <?php echo $_SESSION['admin_nickname']; ?></h1>
     <h2>Here are Your Admin Tools</h2>
    <a href="users_list.php" target="_blank"><button>See The Site Users List</button></a>
     <br>
     <br>
  <a href="../logout.php"><button>Logout</button></a>
  </center>
</body>
</html>

<?php 
}
else if(
  isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])){
 header(("Location: owner.php"));
}
else{
     header("Location: ../");
     exit();
}
 ?>