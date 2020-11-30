<?php
    $id = $_GET["id"];

    $res=mysqli_query($link, "select * from product where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $firstname=$row["firstname"];
        $lastname=$row["lastname"];
        $email=$row["email"];
        $contact=$row["contact"];
        $image=$row["image"];
    }
?>