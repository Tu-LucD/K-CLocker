<!-- Check that the login info is correct -->
<?php 
    $message = "";
    if(isset($_POST['login'])){
        session_start();
        require('dbConnection.php');
        
        $sql = "SELECT * FROM account WHERE username = '".$_POST["username"]."' and password = '".$_POST["password"]."'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if(is_array($row)){
            $_SESSION['id'] = $row["id"];
            $_SESSION['fname'] = $row["fname"];
        }
        else{
            $message = "Invalid username or password";
        }
        if(isset($_SESSION['id'])){
            header("Location: index.php?page=dashboard");
        }
        else{
            echo '<script>alert("Invalid username or password")</script>';
            
        }
    }
    
?>

<h2>Login</h2>
<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="login.php" name="loginForm" method="POST" enctype="multipart/form-data">
    <?php 
        if($message != "") {echo $message;} 
    ?>
        <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <button type="submit" name="login" class="btn btn-info">Login</button>
    </form>
    </div>
</div>
<br>
<p>Don't have an account?<a href="index.php?page=createAccount"> Create an account by clicking here</a></p>