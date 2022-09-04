<?php 
session_start();

if (isset($_SESSION['owner_id']) && isset($_SESSION['owner_username'])) {
  include "../db_conn.php";
  include "../config.php";
$admin_sql = "SELECT id, nickname FROM $admins_table";
$owner_sql = "SELECT id, nickname FROM $owners_table";
$admin_result = mysqli_query($con, $admin_sql);
  ?>
<html>
  <head>
    <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
    
  <title><?php echo $yoursitename; ?> Register Admin Account</title>
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
  <link rel="stylesheet" href="admin_assets/admin_styles_2.css">
    <script type="text/javascript" src="admin_assets/admin_scripts_2.js"></script>
</head>
  <body>
    <fieldset>
  <center>
    <h2><?php echo $yoursitename; ?> Register Admin Account</h2>
    <br>
  <form name="formregister" method="post" action="register_admin_code.php">
  <input type="text" name="username" id="username" placeholder="Username"></input>
  <br>
    <div class="popup" onclick="popup()">
    <input  type="text" name="nickname" id="nickname" placeholder="Nickname"><span class="popuptext" id="myPopup">This Will Not Be Used To Sign In Later </span>
    </input></div>
  <br>
  <input type="password" name="password" id="password" placeholder="Password"></input>
  <br>
    <input type="password" name="re_password" id="re_password" placeholder="Re Enter Password"></input>
    <br>
    <br>
  <input type="submit" name="Submit" value="Register"></input>
  </form>
     <a href="../logout.php">
    <button>Logout</button>
    </a>
  </center>
</fieldset>
  </body>
</html>
<?php
}
else {
  $not_owner ="<center><h1 style='color:red;'>This Page Is Allowed For The Owner Only</h1><br><a href='admins/'><button>Go Back</button></a></center>";
    echo $not_owner;
}
 ?>