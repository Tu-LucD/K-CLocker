<h2>Your Profile</h2>
<div>
    <h2 class="profileHead"><u>This is your profile information</u></h2>
    <p class="profile">First Name:   <?php  echo $_SESSION['fname'];  ?></p> 
    <p class="profile">Last Name:   <?php  echo $_SESSION['lname'];  ?></p> 
    <p class="profile">Email:   <?php  echo $_SESSION['email'];  ?></p> 
    <p class="profile">Username:   <?php  echo $_SESSION['username'];  ?></p> 
    <p class="profile">Password (Encrypted):   <?php  echo md5($_SESSION['password']);  ?></p> 
    <a href="index.php?id=<?php echo $_SESSION['id'];?>&page=editProfile"><button type="button" class="btn btn-info">Edit Profile</button></a>
</div>