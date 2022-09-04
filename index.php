<html>
  <head>
    <?php 
include "config.php";
?>
    <!-- To Allow It To Resize On Different Devices !-->
    <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=yes">
    
    <title><?php echo $yoursitename; ?> Login</title>
    <link rel="icon" href=<?php echo $yoursiteicon; ?>>
  </head>
  <body>
<fieldset>
  <center>
    <h2><?php echo $yoursitename; ?> Login</h2>
    <br>
  <form name="formlogin" method="post" action="login.php">
  <input type="text" name="username" id="username" placeholder="Username"></input>
  <br>
  <input type="password" name="password" id="password" placeholder="Password"></input>
    <br>
    <br>
  <input type="submit" name="Submit" value="Login"></input>
    
  </form>
     <a href="/register.php" target="_blank">
    <button>Register</button>
    </a>
    </center>
</fieldset>
  </body>
</html>