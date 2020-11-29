<?php
    // Database connection parameters
    $dbhost = "localhost"; 
    $dbuser = "root";
    $dbpass = "";
    $dbname = "kclocker";
    $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysqli_error());
    mysqli_select_db($link,$dbname) or die(mysqli_error());
?>