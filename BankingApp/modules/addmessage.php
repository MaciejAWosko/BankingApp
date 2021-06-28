<?php
    session_start();

    //check if user is logged in
    if($_SESSION["loggedin"] != true){
        $_SESSION["error"] = "Please login";
        header("Location: ../index.php");
        exit();
    }

    //check if user have permissions to get this page
    if ($_SESSION["ROLE"] != 7){
        $_SESSION["error"] = "Please log in as admin to get 'add message' page";
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/data.module.css">
    <title>Add message</title>
</head>
<body>
<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="./data.php" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="me-2"> <img src="../assets/livejournal.png"></span>
        <span class="fs-4">Dashboard</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
          <?php
            if($_SESSION['ROLE'] == 7) echo("<a class='me-3 py-2 text-dark text-decoration-none' href='./addmessage.php'> <img src='../assets/add.png'> Add message</a>");
          ?>
        
        <a class="py-2 text-dark text-decoration-none" href="./logOut.php"> <img src="../assets/logout.png"> Logout</a>
      </nav>
    </div>
  </header>
</div>
<div class="container-fluid">
    <div class="row center">
        <div class="col-3">
            <?php include_once("addMessage.component.html"); ?>
        </div>
        <div class="col-9">
        <?php include_once("tableMessage.component.php"); ?>
        </div>
    </div>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>