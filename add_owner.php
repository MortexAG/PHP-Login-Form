
<?php 
  include "db_conn.php";
  include "config.php";
$admin_sql = "SELECT id, nickname FROM $admins_table";
$owner_sql = "SELECT id, nickname FROM $owners_table";
$admin_result = mysqli_query($con, $admin_sql);
  ?>
<html>
  <head>
    <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
    
  <title><?php echo $yoursitename; ?> Register Owner Account</title>
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
  <link rel="stylesheet" href="admins/admin_assets/admin_styles_2.css">
    <script type="text/javascript" src="admins/admin_assets/admin_scripts_2.js"></script>
</head>
  <body>
    <fieldset>
  <center>
    <h2><?php echo $yoursitename; ?> Register Owner Account</h2>
    <br>
  <form name="formregister" method="post" action="add_owner_code.php">
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
  </center>
</fieldset>
  </body>
</html>
