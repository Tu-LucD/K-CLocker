<?php
    /** Kills all the session variables when logout button is clicked*/
    session_start();
    session_destroy();
    header("Location: index.php?page=login");
?>