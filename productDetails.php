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
<div id="pdDetailsContainer">
    <div id="productDetailImgDiv"><img src="<?php echo $imageUrl?>" alt=""></div>
    <div id="productPurchasingInfo">
        <h2><?php echo $name?></h2>
        <p><h4>Price:</h4>
        <?php echo $price ?></p>
        
        <a href="index.php?page=products"><button type="button" class="btn btn-info">Add to Cart</button></a>
    </div>
</div>
<div id="productDetails"></div>