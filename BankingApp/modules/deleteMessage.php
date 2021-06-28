<?php
    session_start();
    if(isset($_POST['deleteID']) && isset($_SESSION['UID']) && $_SESSION['ROLE'] == 7)
    {
        include_once("config.php");
        $id = $_POST['deleteID'];
        $sql = "DELETE FROM messages WHERE Message_ID = $id";
        $result = $con->query($sql);
        if($sql){
            header("Location: ./addmessage.php");
        }else{
            echo "Cannot delete message to db";
            exit();
        }
        $con->close();
    }
    else{
        exit();
    }
?>