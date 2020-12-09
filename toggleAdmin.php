<?php
    include('dbConnection.php');

    $id = 0;

    $admin = 0;
    $newAdmin = 0;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $admin = $_GET['admin'];

        if($admin == 0){
            $newAdmin = 1;
        }
        else if($admin == 1){
            $newAdmin = 0;
        }


        mysqli_query($link, "UPDATE account SET admin=$newAdmin WHERE id='$_GET[id]'");
        header("Location: index.php?page=accounts");
    }
?>