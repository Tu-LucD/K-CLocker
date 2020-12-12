<?php
    // echo $_SESSION['cartQuantity'];
?>
<h2>Your Cart</h2>
<table id="cartContents">
    <?php
        include('dbConnection.php');
        $subtotal = 0;
        $lineTotal = 0;
        //Displays the contents of the cart
        $res = mysqli_query($link, "SELECT * FROM cart");
        while($row = mysqli_fetch_array($res)){
            echo "<tr>"; ?>
            <td><img class="cartItemImg" src="images/product<?php echo $row['productId']?>.jpg" alt=""></td><?php            
            //Get the product name according to productId
            $productId = $row['productId'];
            $productRes = mysqli_query($link, "SELECT * FROM product where id = $productId");
            $productName = mysqli_fetch_array($productRes)['product_name'];
            echo "<td class='cartItemName'>"; echo $productName; echo "</p></td>";
            echo "<td>$"; echo $row['unityPrice']; echo "</td>";
            echo "<td>x"; echo $row['quantity']; echo "</td>";
            $lineTotal = $row['unityPrice'] * $row['quantity'];
            echo "<td>$"; echo $lineTotal; echo"</td>";
            echo "<td>"; ?> <a href="index.php?page=editCart&id=<?php echo $row["productId"];?>"><button type="button" class="btn btn-info">Edit</button></a> <?php echo "</td>";
            echo "</tr>";
            $subtotal += $lineTotal;
        }
    ?>    
</table>
<h4>Subtotal: $<?php echo $subtotal;?></h4>
<a href="index.php?page=checkout"><button type="button" class="btn btn-info">Checkout</button></a>