

<div class="left" >
    <h2 class="profileHead"><u>This is your profile information</u></h2>
    <p class="profile">First Name:   <?php  echo $_SESSION['fname'];  ?></p> 
    <p class="profile">Last Name:   <?php  echo $_SESSION['lname'];  ?></p> 
    <p class="profile">Email:   <?php  echo $_SESSION['email'];  ?></p> 
    <p class="profile">Username:   <?php  echo $_SESSION['username'];  ?></p> 
    <a href="index.php?id=<?php echo $_SESSION['id'];?>&page=editProfile"><button type="button" class="btn btn-info">Edit Profile</button></a>
</div>

<div class="right">
  <div>
    <h2 class="profileHead"><u>These are your past orders</u></h2>
    
    <form action="index.php?page=dashboard" method="POST">
      <input style="float: right; margin-bottom: 5px;" class="btn btn-info" name="ascending" type="submit" value="Sort" <?php if(!isset($_POST['descending'])){echo "hidden";} ?>>
      <input style="float: right; margin-bottom: 5px;" class="btn btn-info" name="descending" type="submit" value="Sort" <?php if(isset($_POST['descending'])){echo "hidden";} else{echo "";} ?>>
    </form>
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
    /** This part shows past orders of the user signed in, if there are any */
        include('dbConnection.php');
        if(!isset($_POST['descending'])){
          $res = mysqli_query($link, "SELECT * FROM orders WHERE account_id='$_SESSION[id]' order by id");
          while($row = mysqli_fetch_array($res)){
              echo "<tr>";
              echo "<td>"; echo $row['id']; echo "</td>";
              echo "<td>"; echo $row['order_date']; echo "</td>";

              /** Option to view the items purchased in the order */
              echo "<td>"; ?> <a href="index.php?page=viewOrder&id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">View</button></a> <?php echo "</td>";
              echo "</tr>";
          }
        }
        /** This sorts from oldest to newest (descending) */
        else if(isset($_POST['descending'])){
          $res = mysqli_query($link, "SELECT * FROM orders WHERE account_id='$_SESSION[id]' order by id desc");
          while($row = mysqli_fetch_array($res)){
              echo "<tr>";
              echo "<td>"; echo $row['id']; echo "</td>";
              echo "<td>"; echo $row['order_date']; echo "</td>";

              /** Option to view the items purchased in the order */
              echo "<td>"; ?> <a href="index.php?page=viewOrder&id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">View</button></a> <?php echo "</td>";
              echo "</tr>";
          }
        }
        /** All this does is make the table how it originally was when first loading */
       else if(isset($_POST['ascending'])){
          $res = mysqli_query($link, "SELECT * FROM orders WHERE account_id='$_SESSION[id]' order by id");
          while($row = mysqli_fetch_array($res)){
              echo "<tr>";
              echo "<td>"; echo $row['id']; echo "</td>";
              echo "<td>"; echo $row['order_date']; echo "</td>";

              /** Option to view the items purchased in the order */
              echo "<td>"; ?> <a href="index.php?page=viewOrder&id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">View</button></a> <?php echo "</td>";
              echo "</tr>";
          }
        }
        
    ?>
    </tbody>
    </table>
  </div>
    
</div>