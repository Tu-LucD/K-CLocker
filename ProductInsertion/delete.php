<?php
include "dbConnection.php";
$id=$_GET["id"];
mysqli_query($link, "delete from product where id=$id");
?>

<script type=text/javascript>
window.location="index.php";
</script> 