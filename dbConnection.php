<?php
    // Database connection parameters
    $dbhost = "localhost"; 
    $dbuser = "root";
    $dbpass = "";
    $dbname = "kclocker";
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error());    
?>