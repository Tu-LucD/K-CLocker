<nav class="navbar navbar-expand-lg navbar-light">
<a class="nav-link" href="index.php?page=home"><img id="navLogo" src="images/K&CLogo.png" alt="Company Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php
    session_start();

    /* Checks first if the user is signed in */
      if(isset($_SESSION['id'])){

        /* If the user is signed it, checks if user is an admin */
        if($_SESSION['admin'] == 1){ ?>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="index.php?page=accounts">Manage Accounts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="index.php?page=editProducts">Manage Products</a>
            </li>
            <a class="nav-link" style="color: white;" href="index.php?page=dashboard">Account</a>
            
            <a href="logout.php"><button type="button" class="btn btn-info">Logout</button></a>
        <?php } 

        /** Else if user is not admin, shows these options */
        else if($_SESSION['admin'] == 0) { ?>
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?page=about">About</a>
          </li>      
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?page=products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?page=contact">Contact</a>
          </li>  
          <a class="nav-link" style="color: white;" href="index.php?page=dashboard">Account</a>
             <i class="fa fa-shopping-cart"></i>
             <a href="logout.php"><button type="button" class="btn btn-info">Logout</button></a>
      <?php }
        
      }

      /** If the user is not signed in, show these options */
      else{
        ?> 
        <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?page=about">About</a>
          </li>      
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?page=products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?page=contact">Contact</a>
          </li>
          <a href="index.php?page=login"><button type="button" class="btn btn-info">Login</button></a>
      <?php }
      
    ?>
      
      
    </ul>
  </div>
</nav>