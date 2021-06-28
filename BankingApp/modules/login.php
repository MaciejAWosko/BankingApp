<?php
    session_start();
    //sanityze data
    $Mail = htmlspecialchars($_POST["mail"]);
    $Password = htmlspecialchars($_POST["password"]);

    //chefk if login and password are set
    if(!empty($Mail) AND !empty($Password)){
        include_once("config.php");
        if ($stmt = $con->prepare('SELECT User_Id, Role_ID FROM users_info WHERE Mail = ? AND Password = ?')) {
            $stmt->bind_param('ss', $Mail,$Password);
            $stmt->execute();
            $stmt->store_result();
            
            //check if user exist
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($UID, $ROLE);
                $stmt->fetch();

                //if user exist set session and connect to main page
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['UID'] = $UID;
                $_SESSION['ROLE'] = $ROLE;
                header("Location: data.php");

            } else {
                // Incorrect username
                $_SESSION['error'] = "Incorrect username and/or password!";
                header("Location: ../index.php");
            }
            $stmt->close();
        }
        else{
            $_SESSION['error'] = "Something went wrong";
            header("Location: ../index.php");
        }
    }else{
        $_SESSION['error'] = "Pls fill login and password";
        header("Location: ../index.php");
    }

?>  