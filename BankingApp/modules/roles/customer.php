
<table class="table table-hover table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Bill expenses</th>
      <th scope="col">Food expenses</th>
      <th scope="col">Petrol expenses</th>
      <th scope="col">Mail</th>
      <th scope="col">User balance</th>
      <th scope="col">Role id</th>
    </tr>
  </thead>
  <tbody>
  <?php
    include_once("config.php");
    $sql = "SELECT * FROM users_info WHERE User_Id =".$_SESSION["UID"];
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo("<tr><td>".$row["User_Id"]."</td>"."<td>".$row["billexpenses"]."</td><td>".$row["foodexpenses"]."</td><td>".$row["petrolexpenses"]."</td><td>".$row["Mail"]."</td><td>".$row["user_balance"]."</td><td>".$row["Role_Id"]."</td>");
        }
    }
    $con->close();
    ?>
  </tbody>
</table>