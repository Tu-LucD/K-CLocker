<h2>Manage Accounts</h2>

<div>

    <table id="pastOrders" class="table table-bordered">
    <thead>
      <tr>
        <th>Account Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Username</th>
        <th>Password</th>
        <th>Make Admin</th>
      </tr>
    </thead>
    <tbody>


    <?php
        include('dbConnection.php');
        $res = mysqli_query($link, "SELECT * FROM account WHERE id!='$_SESSION[id]'");
        while($row = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row['id']; echo "</td>";
            echo "<td>"; echo $row['fname']; echo "</td>";
            echo "<td>"; echo $row['lname']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";

            /** Depending on the admin value, it will show Yes or No */
            echo "<td>"; if($row['admin'] == 0) {echo "No";} else {echo "Yes";} echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo md5($row['password']); echo "</td>";

            /** Button that will switch the value of admin status if clicked */
            echo "<td>"; ?> <a href="index.php?page=toggleAdmin&admin=<?php echo $row['admin'] ?>&id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Toggle Admin</button></a> <?php echo "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </table>
  </div>