<h2>This is the contact page</h2>

    <div class="container">
        <div class="d-flex justify-content-center">    
        <form action="contact.php" name="feedbackForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="text">Your Feedback:</label>
                <textarea name="text" placeholder="Type here" class="form-control" id="" cols="50" rows="5"></textarea><br>
                <button type="submit" name="sendFeedback" class="btn btn-info">Send</button>
            </form>
        </div>
    </div>

<?php
    include("dbConnection.php");
    if(!isset($_SESSION['id'])){
        header("Location: index.php?page=login");
    }
    
    if(isset($_POST['sendFeedback'])){
        session_start();
        $id = $_SESSION['id'];
        mysqli_query($link, "INSERT INTO feedback values(NULL, '$id', '$_POST[text]')");
        header("Location: index.php?page=confirm");
    }
?>