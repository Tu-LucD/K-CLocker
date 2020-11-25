<nav class="navbar navbar-expand-lg navbar-light bg-navy">
<a class="nav-link" href="index.php?page=home"><img id="navLogo" src="images/K&CLogo.png" alt="Company Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=about">About</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=products">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=contact">Contact</a>
      </li>
      <?php
        //To do: if statement that check if user is logged in and echos
        //  if logged in: echo username and shopping cart
        //  else: echo login button
        //  <button type="button" class="btn btn-info">Login</button>
      ?>
        <a href="login.php"><button type="button" class="btn btn-info">Login</button></a>      
    </ul>
  </div>
</nav>