<!-- Check that the login info is correct -->
<?php 
    $message = "";
    if(isset($_POST['login'])){
        require('dbConnection.php');

        //Clears what is currently in the cart table
        mysqli_query($link,"DELETE FROM cart where productId is not null");  
        
        /** Select if the credentials can be found in the database */
        $sql = "SELECT * FROM account WHERE username = '".$_POST["username"]."' and password = '".$_POST["password"]."'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if(is_array($row)){
            $_SESSION['id'] = $row["id"];
            $_SESSION['fname'] = $row["fname"];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['cartQuantity'] = 0;
        }
        /** If it is not found display error message */
        else{
            $message = "Invalid username or password";
        }

        /** Brings user to respective dashboard depending on admin status */
        if(isset($_SESSION['id'])){
            if($_SESSION['admin'] == 1){
                header("Location: index.php?page=adminDashboard");
            }
            else if($_SESSION['admin'] == 0){
                header("Location: index.php?page=dashboard");
            }
            
        }
    }
    
?>

<h2>Login</h2>
<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="index.php?page=login" name="loginForm" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <p style="color: red;">
        <?php 
            /** Message displays if login credentials are incorrect */
            if($message != "") {echo $message;} 
        ?>
    </p>
        <button type="submit" name="login" class="btn btn-info">Login</button>
    </form>
    </div>
</div>
<br>
<p>Don't have an account?<a href="index.php?page=createAccount"> Create an account by clicking here</a></p>