<h2>Edit Your Profile</h2>

<?php
/** Gets the informtion of the user from the database */
    include "dbConnection.php";
    $id = $_GET["id"];
    $firstname = $lastname = $email = $username = $password = "";
    $res = mysqli_query($link, "SELECT * FROM account WHERE id=$id");
    while($row = mysqli_fetch_array($res)){
        $firstname = $row["fname"];
        $lastname = $row["lname"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
    }
?>

<!-- This form is filled with all the information -- Can be edited -->
<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="<?php $_PHP_SELF ?>" name="loginForm" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" placeholder="" name="firstname" value=<?php echo $firstname; ?>>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" placeholder="" name="lastname" value=<?php echo $lastname; ?>>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" placeholder="" name="email" value=<?php echo $email; ?>>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" placeholder="" name="username" value=<?php echo $username; ?>>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="" name="password" value=<?php echo $password; ?>>
        </div>
        <button type="submit" name="update" class="btn btn-info">Update</button>
        <button type="submit" name="cancel" class="btn btn-info">Cancel</button>
    </form>
    </div>
</div>

<?php
/** If the user decides to cancel, it will bring him/her back to their respective dashboard depending on admin status */
    if(isset($_POST['cancel'])){
        if($_SESSION['admin'] == 1){
            header("Location: index.php?page=adminDashboard");
        }
        else{
            header("Location: index.php?page=dashboard");
        }
    }

    /** Once this is clicked, anything changed in the textboxes will be updated and saved in the database */
    if(isset($_POST["update"])){
        mysqli_query($link, "UPDATE account SET fname='$_POST[firstname]', lname='$_POST[lastname]', email='$_POST[email]', username='$_POST[username]', password='$_POST[password]' WHERE id='$_GET[id]'");
        $_SESSION['fname'] = $_POST['firstname'];
        $_SESSION['lname'] = $_POST['lastname'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

        /** After, user is sent back to the dashboard, same as the cancel button */
        if($_SESSION['admin'] == 1){
            header("Location: index.php?page=adminDashboard");
        }
        else{
            header("Location: index.php?page=dashboard");
        }
    }
    
?>

