<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Log in to system</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
      
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="./assets/user.png" id="icon" alt="User Icon" />
          </div>
      
          <!-- Login Form -->
          <form action="./modules/login.php" method="POST">
            <input type="text" id="login" class="fadeIn second" name="mail" placeholder="E-Mail">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>
      
          <!-- Shows errors if exist -->
          <?php 
          if(isset($_SESSION['error']))
            echo("<div id='formFooter'>
              ".$_SESSION['error']."
            </div>");
            session_unset();
            session_destroy();
          ?>
          <div id="snackbar"></div>
        </div>
    <!-- scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="./scripts/index.js"></script>
</body>
</html>