<table class="table table-hover table-light">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Message text</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include_once("config.php");
            $sql = "SELECT * FROM messages";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row["Message_ID"];
                    echo("<tr><td>".$id."</td><td>".$row["Message"]."</td>
                    <td> 
                        <form action='deleteMessage.php' method='POST'>
                        <input type='text' value='$id' name='deleteID' class='hideInput'>
                        <button class='deleteButton' type='submit'><img class='deleteMessage' src='../assets/delete.png'></button> 
                        </form>
                    </td>
                    </tr>");
                }
            }
            $con->close();
            ?>
    </tbody>
</table>