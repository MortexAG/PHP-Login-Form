<?php 
session_start();

if ((isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) or (isset($_SESSION['owner_id']) && isset($_SESSION['owner_username']))) {
  include "../db_conn.php";
  include "../config.php";
if (!$_SESSION['owner_nickname']){
  $user_nickname = $_SESSION['admin_nickname'];
}
else {
  $user_nickname = $_SESSION['owner_nickname'];
}
$admin_sql = "SELECT id,username, nickname FROM $admins_table";
$sql = "SELECT id, username, nickname FROM $users_table";
$admin_result = mysqli_query($con, $admin_sql);
$result = mysqli_query($con, $sql);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel="stylesheet" href="admin_assets/admin_styles_2.css">
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
	<title><?php echo $user_nickname; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center>
     <h1>Hello, <?php echo $user_nickname; ?></h1>
     <h2>Here Is A List Of The Site Users</h2>
     <br>
    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nickname</th>
      </tr>
      
        <?php 
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["id"]. "</td>" ."<td>". $row["username"]."</td><td>".$row["nickname"]."</td></tr>";
  }
}
  ?>
      
    </table>
         <h2>Here Is A List Of The Site Admins</h2>
     <br>
    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nickname</th>
      </tr>
      
        <?php 
if (mysqli_num_rows($admin_result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($admin_result)) {
    echo "<tr><td>" . $row["id"]. "</td>" ."<td>". $row["username"]."</td><td>".$row["nickname"]."</td></tr>";
  }
}
  ?>
      
    </table>
     <br><a href="../logout.php"><button>Logout</button></a>
    <br>
    <br><?php if((isset($_SESSION['owner_id']) && isset($_SESSION['owner_username']))) {echo "<a href='owner.php'><button>Go Back</button></a>";} else if((isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])){echo "<a href='admins/'><button>Go Back</button></a>";}
  </center>
</body>
</html>

<?php 
}else{
     header("Location: ../");
     exit();
}
 ?>