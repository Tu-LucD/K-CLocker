<h2>Your Profile</h2>

<div class="left" >
    <h2 class="profileHead"><u>This is your profile information</u></h2>
    <p class="profile">First Name:   <?php  echo $_SESSION['fname'];  ?></p> 
    <p class="profile">Last Name:   <?php  echo $_SESSION['lname'];  ?></p> 
    <p class="profile">Email:   <?php  echo $_SESSION['email'];  ?></p> 
    <p class="profile">Username:   <?php  echo $_SESSION['username'];  ?></p> 
    <p class="profile">Password (Encrypted):   <?php  echo md5($_SESSION['password']);  ?></p> 
    <a href="index.php?id=<?php echo $_SESSION['id'];?>&page=editProfile"><button type="button" class="btn btn-info">Edit Profile</button></a>
</div>

<div class="right">
    <h2 class="profileHead"><u>These are your past orders</u></h2>

    <table id="pastOrders" class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>


    <?php
        include('dbConnection.php');
        $res = mysqli_query($link, "SELECT * FROM orders WHERE account_id='$_SESSION[id]'");
        while($row = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row['id']; echo "</td>";
            echo "<td>"; echo $row['order_date']; echo "</td>";
            echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">View</button></a> <?php echo "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
  </table>
</div>