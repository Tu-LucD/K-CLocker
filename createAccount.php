<h2>Create an account</h2>
<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="verifyLogin.php" name="form1" method="POST" enctype="multipart/form-data">        
        <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" placeholder="Enter first name" name="first_name">
        </div>
        <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" placeholder="Enter last name" name="last_name">
        <label for="email">Email:</label>
        <input type="text" class="form-control" placeholder="Enter email" name="email">
        <label for="username">Username:</label>
        <input type="text" class="form-control" placeholder="Enter username" name="username">
        <label for="password">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        
        <button type="submit" name="insert" class="btn btn-info">Create</button>
    </form>
    </div>
</div>
<br>