<?php
    // echo $_SESSION['cartQuantity'];
?>

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
            //Get the name according to productId
            $productId = $row['productId'];
            $productRes = mysqli_query($link, "SELECT * FROM product where id = $productId");
            $productName = mysqli_fetch_array($productRes)['product_name'];
            echo "<td><p class='cartItemName'>"; echo $productName; echo "</p></td>";
            echo "<td>$"; echo $row['unityPrice']; echo "</td>";
            echo "<td>x"; echo $row['quantity']; echo "</td>";
            $lineTotal = $row['unityPrice'] * $row['quantity'];
            echo "<td>$"; echo $lineTotal; echo"</td>";
            echo "<td>"; ?> <a href="index.php?page=editCart&id=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Edit</button></a> <?php echo "</td>";
            echo "</tr>";
        }
    ?>    
</table>

<a href="index.php?page=checkout"><button type="button" class="btn btn-info">Checkout</button></a>