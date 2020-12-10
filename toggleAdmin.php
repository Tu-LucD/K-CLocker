<?php
    include('dbConnection.php');

    $id = 0;

    $admin = 0;
    $newAdmin = 0;
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $admin = $_GET['admin'];

        /** Checks if the clicked acount is admin, determines the value that admin needs to be changed to */
        if($admin == 0){
            $newAdmin = 1;
        }
        else if($admin == 1){
            $newAdmin = 0;
        }


        mysqli_query($link, "UPDATE account SET admin=$newAdmin WHERE id='$_GET[id]'");

        /** Goes back to Manage accounts page with updated information */
        header("Location: index.php?page=accounts");
    }
?>