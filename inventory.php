<h2>Edit Quantity</h2>

<?php
/** Gets the quantity of the inventory for the product from the database */
    include "dbConnection.php";
    $id = $_GET["productId"];
    $quantity = $imageUrl = "";
    $res = mysqli_query($link, "SELECT * FROM product, inventory WHERE inventory.id=$id AND product.id = inventory.id");
    while($row = mysqli_fetch_array($res)){
        $quantity = $row['quantity'];
        $imageUrl = $row['product_image'];
    }
?>

<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="<?php $_PHP_SELF ?>" name="" method="POST" enctype="multipart/form-data">
    <img src="<?php echo $imageUrl; ?>" height="175" width="175">
        <div class="form-group">
            <label for="quantity">Quantity of Item:</label>
            <input type="number" class="form-control" placeholder="" name="quantity" value="<?php echo $quantity; ?>">
        </div>
        <button type="submit" name="update" class="btn btn-info">Update</button>
        <p><a href="index.php?page=editProducts"> CANCEL</a></p>
    </form>
    </div>
</div>

<?php
    /** Updates the quantity of the product in the database */
    if(isset($_POST["update"])){
        mysqli_query($link, "UPDATE inventory SET quantity ='$_POST[quantity]' WHERE id=$id");
        echo'<script> window.location="index.php?page=editProducts"; </script> ';

        
    }

?>