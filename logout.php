<?php
    /** Kills all the session variables when logout button is clicked*/
    session_start();
    session_destroy();
    //Clears what is currently in the cart table
    mysqli_query($link,"DELETE FROM cart where productId is not null");  
    header("Location: index.php?page=login");
?>