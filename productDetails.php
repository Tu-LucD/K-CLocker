<?php
    include('dbConnection.php');
    //Retrieve id and info of selected product 
    $id = $_GET["id"];
    $name="";
    $description="";
    $imageUrl="";
    $price=0;
    $sport="";
    $category="";

    $res=mysqli_query($link, "select * from product where id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $name=$row["product_name"];
        $description=$row["product_description"];
        $imageUrl=$row["product_image"];
        $price=$row["price"];
        $sport=$row["sport"];
        $category=$row["category"];
    }    
?>
<a id="goBackToProduct" href="index.php?page=products"><i class="fa fa-arrow-left"></i>Go back to Products</a>
<form action="" method="post">
    <div id="pdDetailsContainer">
        <div id="productDetailImgDiv"><img src="<?php echo $imageUrl?>" alt=""></div>
        <div id="productPurchasingInfo">
            <h2><?php echo $name?></h2>
            <h4>Price:</h4>
            <p>$<?php echo $price ?></p>        
            <input type="submit" name="addCart" value="Add to Cart">
        </div>
    </div>
</form>
<div id="productDetails">
    <h3>Description</h3>
    <p><?php echo $description ?></p>
    <h3>Sport</h3>
    <p><?php echo $sport ?></p>
    <h3>Category</h3>
    <p><?php echo $category ?></p>    
</div>

<?php    
    if(isset($_POST["addCart"]))
    {
        $res=mysqli_query($link, "select * from cart where productId=$id");
        //Product is
        if(mysqli_fetch_array($res) == null)
        {
            mysqli_query($link,"INSERT INTO cart VALUES(NULL,$id,$price,1");
            echo "inserted";
        }
        //Product is already in cart
        else
        {            
            $quantity = 0;
            while($row=mysqli_fetch_array($res))
            {
                $quantity=$row["quantity"];
            }
            $quantity++;
            mysqli_query($link,"UPDATE cart SET quantity='$quantity'");
            echo "nope";
        }        
    }
    
?>