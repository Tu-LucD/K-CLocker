<h2>Manage Accounts</h2>

<div class="scroll">

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
        $res = mysqli_query($link, "SELECT * FROM account");
        while($row = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row['id']; echo "</td>";
            echo "<td>"; echo $row['fname']; echo "</td>";
            echo "<td>"; echo $row['lname']; echo "</td>";
            echo "<td>"; echo $row['email']; echo "</td>";
            echo "<td>"; if($row['admin'] == 0) {echo "No";} else {echo "Yes";} echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo md5($row['password']); echo "</td>";
            echo "<td>"; ?> <a href="index.php?page=toggleAdmin&admin=<?php echo $row['admin'] ?>&&id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Toggle Admin</button></a> <?php echo "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </table>
  </div>