<?php
    include_once("config.php");
    $sql = "SELECT * FROM messages";
    $result = $con->query($sql);

    $arr = Array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($arr,$row);
        }
    }
    $json = json_encode($arr);
    echo($json);
    $con->close();
?>