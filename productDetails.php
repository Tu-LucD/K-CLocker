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
            <?php
            /** User cannot add products to cart if they are not signed in */
                if(!isset($_SESSION['id'])){
                    echo '<a href="index.php?page=login">Sign in to add products to your cart!</a>';
                }
                else{
                    
                    echo '<input type="submit" name="addCart" value="Add to Cart">';
                }
            ?>                    
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
        $_SESSION['cartQuantity'] = 0;
        $res=mysqli_query($link, "select * from cart where productId=$id");
        //Product is
        if(!mysqli_fetch_array($res))
        {       
            $response = mysqli_query($link,"INSERT INTO cart values(NULL, $id,$price,1)");                
        }
        //Product is already in cart
        else
        {          
            //Take current quantity
            $quantity=0;                                               
            $res=mysqli_query($link, "select * from cart where productId=$id");            
            while($row=mysqli_fetch_array($res))
            {
                $quantity = $row["quantity"];
            }              
            //Increment quantity by 1 and update the table
            $quantity++;            
            mysqli_query($link,"UPDATE cart SET quantity=$quantity where productId=$id");
            
            //Increment number of items in cart
            $nbCart = $_SESSION['cartQuantity'];
            $nbCart++;
            $_SESSION['cartQuantity'] = $nbCart;
        }        
    }
    
?>