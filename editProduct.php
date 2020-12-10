<h2>Edit</h2>

<?php
/** Gets the informtion of the product from the database */
    include "dbConnection.php";
    $id = $_GET["productId"];
    $productName = $productDescription = $imageUrl = $price = $sport = $category = "";
    $res = mysqli_query($link, "SELECT * FROM product WHERE id=$id");
    while($row = mysqli_fetch_array($res)){
        $productName = $row['product_name'];
        $productDescription = $row['product_description'];
        $imageUrl = $row['product_image'];
        $price = $row['price'];
        $sport = $row['sport'];
        $category = $row['category'];
    }
?>

<div class="container">
    <div class="d-flex justify-content-center">    
    <form action="<?php $_PHP_SELF ?>" name="" method="POST" enctype="multipart/form-data">
    <img src="<?php echo $imageUrl; ?>" height="175" width="175">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $productName; ?>">
        </div>
        <div class="form-group">
            <label for="description">Product Description:</label>
            <textarea name="description" class="form-control" cols="45" rows="7" value=""><?php echo $productDescription; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" placeholder="" name="price" value="<?php echo $price; ?>">
        </div>
        <div class="form-group">
            <label for="sport">Sport:</label>
            <select class="form-control" name="sport" id="sports">
                <option value="Running" <?php if($sport == 'Running') {echo 'selected="selected"';} ?>>Running</option>
                <option value="Hockey" <?php if($sport == 'Hockey') {echo 'selected="selected"';} ?>>Hockey</option>
                <option value="Volleyball" <?php if($sport == 'Volleyball') {echo 'selected="selected"';} ?>>Volleyball</option>
                <option value="Basketball" <?php if($sport == 'Basketball') {echo 'selected="selected"';} ?>>Basketball</option>
                <option value="Baseball" <?php if($sport == 'Baseball') {echo 'selected="selected"';} ?>>Baseball</option>
                <option value="Badminton" <?php if($sport == 'Badminton') {echo 'selected="selected"';} ?>>Badminton</option>
                <option value="Tennis" <?php if($sport == 'Tennis') {echo 'selected="selected"';} ?>>Tennis</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="categories">
                <option value="Footwear" <?php if($category == 'Footwear'){echo 'selected="selected"';} ?>>Footwear</option>
                <option value="Clothing" <?php if($category == 'Clothing'){echo 'selected="selected"';} ?>>Clothing</option>
                <option value="Accessories" <?php if($category == 'Accessories'){echo 'selected="selected"';} ?>>Accessories</option>
                <option value="Equipment" <?php if($category == 'Equipment'){echo 'selected="selected"';} ?>>Equipment</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-info">Update</button>
        <p><a href="index.php?page=editProducts"> CANCEL</a></p>
    </form>
    </div>
</div>

<?php
    if(isset($_POST["update"])){
        mysqli_query($link, "UPDATE product SET product_name='$_POST[name]', product_description='$_POST[description]', price='$_POST[price]', sport='$_POST[sport]', category='$_POST[category]' WHERE id='$_GET[productId]'");
        echo'<script> window.location="index.php?page=editProducts"; </script> ';

        
    }

?>