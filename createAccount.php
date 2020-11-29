<h2>Create an account</h2>
<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="createAccount.php" name="createAccountForm" method="POST" enctype="multipart/form-data">        
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
        
        <button type="submit" name="create" class="btn btn-info">Create</button>
    </form>
    </div>
</div>
<br>
<p>Already have an account with us?<a href="index.php?page=login"> Sign in</a></p>

<!-- This part will create and add new user to the DB -->
<?php
    include('dbConnection.php');
    session_destroy();
    session_start();
    if(isset($_POST['create'])){
        mysqli_query($link, "INSERT INTO account values(NULL, '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', 0, '$_POST[username]', '$_POST[password]')");

        $sql = "SELECT * FROM account WHERE username = '".$_POST["username"]."' and password = '".$_POST["password"]."'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if(is_array($row)){
            $_SESSION['id'] = $row["id"];
            $_SESSION['fname'] = $row["fname"];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
        }
        header("Location: index.php?page=dashboard");
    }

?>