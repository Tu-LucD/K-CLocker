<h2>Login</h2>
<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="verifyLogin.php" name="loginForm" method="POST" enctype="multipart/form-data">        
        <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        
        <button type="submit" name="insert" class="btn btn-info">Insert</button>
    </form>
    </div>
</div>
<br>
<p>Don't have an account?<a href="index.php?page=createAccount"> Create an account by clicking here</a></p>