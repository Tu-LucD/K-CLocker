<?php
include('dbConnection.php');
$id=$_GET["id"];

$product_name="";
$product_id="";
$unitPrice="";
$quantity="";

$res=mysqli_query($link, "select * from cart where productId=$id");
while($row=mysqli_fetch_array($res))
{
    //Fetch the product name with the product_id
    $productId = $row['productId'];
    $productRes = mysqli_query($link, "SELECT * FROM product where id = $productId");
    $product_name = mysqli_fetch_array($productRes)['product_name'];
    $unitPrice = $row['unityPrice'];
    $quantity = $row['quantity'];
}
?>
<h2><?php echo $product_name?></h2>
<div class="editCartItemContainer">
    <form action="" name="form1" method="post" enctype="multipart/form-data">    
        <div class="form-group">
        <p>Unit Price:</p>
        <p>$<?php echo $unitPrice;?></p>  
        <p>Quantity</p>  
        <input type="text" onkeypress="return isNumber(event)" name="quantity" id="editCartQuantity" placeholder="<?php echo $quantity;?>">
        <br>
        <input id="modifyItem" type="submit" name="modify" class="btn btn-info" value="Modify Item">
        <input type="submit" name="remove" class="btn btn-danger" value="Remove Item">        
    </form>
</div>

<script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
<?php
    //If the customer wants to modify the quantity of the selected item in their cart
    if(isset($_POST['modify']))
    {
        if(!$_POST['quantity']) echo "You must enter a quantity or click the remove item button";
        else
        {
            mysqli_query($link,"UPDATE cart SET quantity=$_POST[quantity] where productId=$id");
            header("Location: index.php?page=cart");
            $_SESSION['cartQuantity'] -= $quantity;
            $_SESSION['cartQuantity'] += $_POST['quantity'];
        }        
    }
    //If the user wants to remove an item from their cart
    if(isset($_POST['remove']))
    {
        mysqli_query($link,"DELETE FROM cart where productId=$id");  
        header("Location: index.php?page=cart");
        $_SESSION['cartQuantity'] -= $quantity;
    }
?>