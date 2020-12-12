<a href="index.php?page=cart" id="backToCart">Go back to cart to modify</a>
<div id="checkoutLeftDiv">
    <table>
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
                echo "</tr>";
                //Add item price to order subtotal
                $subtotal += $lineTotal;
            }
        ?>
    </table>
    <h3 id="checkoutSubtotal">Subtotal: <?php echo "$$subtotal" ?></h3>
</div>
<div id="checkoutRightDiv">
    <h3>Receipt</h3>
    <table id="transactionInfo">
        <tr>
            <td>Subtotal:</td>
            <td><?php echo "$$subtotal";?></td>
        </tr>
    </table>
    <p id="orderTotal">Total:</p>
    <a href="index.php?page=dashboard"><button id="payButton" class="btn btn-info">Pay</button></a>
</div>