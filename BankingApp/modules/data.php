<?php
    session_start();
    if($_SESSION["loggedin"] != true){
        $_SESSION["error"] = "Please login";
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
    <title>Dashboard</title>
</head>
<body>
<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="me-2"> <img src="../assets/livejournal.png"></span>
        <span class="fs-4">Dashboard</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
          <?php
            if($_SESSION['ROLE'] == 7) echo("<a class='me-3 py-2 text-dark text-decoration-none' href='./addmessage.php'><img src='../assets/add.png'> Add message</a>");
          ?>
        
        <a class="py-2 text-dark text-decoration-none" href="./logOut.php"> <img src="../assets/logout.png"> Logout</a>
      </nav>
    </div>
  </header>
</div>
<div class="container-fluid">
<?php
    if($_SESSION["ROLE"] == 2){
        include_once("./roles/customer.php");
    } else if($_SESSION["ROLE"] == 5){
        include_once("./roles/employee.php");
    } else if($_SESSION["ROLE"] == 7){
        include_once("./roles/admin.php");
    }
?>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>