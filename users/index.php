<?php 
session_start();
include "../config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
	<title><?php echo $_SESSION['username']; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center>
     <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <h2>Here are Your User Tools</h2>
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