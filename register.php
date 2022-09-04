<html>
  <head>
    <?php 
include "config.php";
?>
    <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
    
  <title><?php echo $yoursitename; ?> Register Account</title>
  <link rel="icon" href="<?php echo $yoursiteicon; ?>">
  <link rel="stylesheet" href="assets/styles.css">
    <script type="text/javascript" src="assets/script.js"></script>
</head>
  <body>
    <fieldset>
  <center>
    <h2><?php echo $yoursitename; ?> Register Account</h2>
    <br>
  <form name="formregister" method="post" action="register_code.php">
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
     <a href="/index.php" target="_blank">
    <button>Login</button>
    </a>
  </center>
</fieldset>
  </body>
</html>