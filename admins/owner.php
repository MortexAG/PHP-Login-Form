<?php 
session_start();
include "../config.php";
if (isset($_SESSION['owner_id']) && isset($_SESSION['owner_username'])){

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
	<title><?php echo $_SESSION['owner_nickname']; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center>
     <h1>Hello, <?php echo $_SESSION['owner_nickname']; ?></h1>
     <h2>Here are Your Owner Tools</h2>
    <a href="users_list.php" target="_blank"><button>See The Site Users List</button></a>
     <br>
     <br>
    <a href="register_admin.php" target="_blank"><button>Register A New Admin</button></a>
    <br>
     <br><a href="../logout.php"><button>Logout</button></a>
  </center>
</body>
</html>

<?php 
}else{
     header("Location: ../");
     exit();
}
 ?>