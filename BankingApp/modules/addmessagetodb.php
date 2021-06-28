<?php
    session_start();
    if(isset($_POST['message']) && isset($_SESSION['UID']) && $_SESSION['ROLE'] == 7)
    {
        include_once("config.php");
        $message = $_POST['message'];
        $sql = "INSERT INTO messages (Message) values ('$message')";
        $result = $con->query($sql);
        if($sql){
            header("Location: ./addmessage.php");
        }else{
            echo "Cannot add message to db";
            exit();
        }
        $con->close();
    }
    else{
        exit();
    }
?>