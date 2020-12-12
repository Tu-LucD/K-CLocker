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

            $tps = round(($subtotal * 0.05), 2);
            $tvq = round(($subtotal * 0.09975), 2)
        ?>
    </table>
    <h3 id="checkoutSubtotal">Subtotal: <?php echo "$$subtotal" ?></h3>
</div>
<div id="checkoutRightDiv">
    <form action="" method="post">
        <h3>Receipt</h3>
        <table id="transactionInfo">
            <tr>
                <td>Subtotal:</td>
                <td><?php echo "$$subtotal";?></td>
            </tr>
            <tr>
                <td>TPS:</td>
                <td><?php echo "$$tps"?></td>
            </tr>
            <tr>
                <td>TVQ:</td>
                <td><?php echo "$$tvq"?></td>
            </tr>
            <tr>
                <td>Shipping Fee & Location:</td>
                <td>
                    <select name="location">
                        <option value="5.00">Montreal ($5.00)</option>
                        <option value="6.00">Laval ($6.00)</option>
                        <option value="10.00">Quebec City ($10.00)</option>
                        <option value="15.00">Granby ($15.00)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>----------</td>
            </tr>
            <tr>
                <td>Promotions</td>
            </tr>
            <?php
                $promo1 = 0;
                $promo2 = 0;
                $promo3 = 0;
                $promo4 = 0;

                //Checks eligibility for Big Spender's Paradise promotion
                if($subtotal >= 600)
                {
                    $promoRes = mysqli_query($link, "SELECT * FROM promotions where id = 1");
                    $promoName = mysqli_fetch_array($promoRes)['title'];
                    $promo1 = round(($subtotal * 0.1),2);
                    echo "<tr>";
                    echo "<td>"; echo $promoName; echo "</td>";
                    echo "<td>"; echo "-$$promo1"; echo "</td>";
                    echo "</tr>";
                }
                
                //Checks eligibility for Beginner's Luck promotion
                $userId = $_SESSION['id'];
                $previousOrders = mysqli_query($link, "SELECT * FROM orders WHERE account_id = $userId");
                if(!mysqli_fetch_array($previousOrders))
                {
                    $promoRes = mysqli_query($link, "SELECT * FROM promotions where id = 2");
                    $promoName = mysqli_fetch_array($promoRes)['title'];
                    $promo2 = round(($subtotal * 0.05),2);
                    echo "<tr>";
                    echo "<td>"; echo $promoName; echo "</td>";
                    echo "<td>"; echo "-$$promo2"; echo "</td>";
                    echo "</tr>";
                }

                //Checks eligibility for Team Spirit promotion
                $res = mysqli_query($link, "select * FROM cart");
                $elligible = false;
                while($row = mysqli_fetch_array($res))
                {
                    if($row['quantity'] >= 10)
                    {
                        $elligible = true;
                    }
                }
                if($elligible)
                {
                    $promoRes = mysqli_query($link, "SELECT * FROM promotions where id = 3");
                    $promoName = mysqli_fetch_array($promoRes)['title'];
                    
                    $quantity = 0;
                    $res = mysqli_query($link, "SELECT * FROM cart where quantity >= 10");
                    while($row = mysqli_fetch_array($res))
                    {                        
                        $unitPrice = $row['unityPrice'];
                    }
                    $promo3 = round(($unitPrice * 2),2);
                    echo "<tr>";
                    echo "<td>"; echo $promoName; echo "</td>";
                    echo "<td>"; echo "-$$promo3"; echo "</td>";
                    echo "</tr>";
                }

                //Checks eligibility for Small Errand promotion
                if($subtotal <= 20)
                {
                    $promoRes = mysqli_query($link, "SELECT * FROM promotions where id = 4");
                    $promoName = mysqli_fetch_array($promoRes)['title'];
                    $promo4 = round(($subtotal * 0.05),2);
                    echo "<tr>";
                    echo "<td>"; echo $promoName; echo "</td>";
                    echo "<td>"; echo "-$$promo4"; echo "</td>";
                    echo "</tr>";
                }   
            ?>
        </table>

        
        <?php
        // Calculates final total of the order
                $orderTotal = $subtotal + $tps + $tvq - $promo1 - $promo2 - $promo3 - $promo4;
        ?>
        <p id="orderTotal">Total: <?php echo $orderTotal;?> + Shipping</p>    
            <input type="submit" id="payButton" name="payButton" class="btn btn-success" value="Pay">
    </form>    
</div>

<?php
    if(isset($_POST['payButton']))
    {                
        //Inserting the order in orders table
        $shipping = $_POST['location'];        
        mysqli_query($link, "INSERT INTO orders VALUES(NULL, $userId, CURDATE(), $orderTotal, $shipping)");

        //Inserting the items in order_items table
        $res = mysqli_query($link,"SELECT * FROM orders where account_id = $userId order by id");
        $orderId = 0;
        //Get Id of inserted order
        while($row = mysqli_fetch_array($res))
        {
            $orderId = $row['id'];
        }

        $res = mysqli_query($link, "SELECT * FROM cart");
        $productId = 0;
        $quantity = 0;
        $price = 0;
        while($row = mysqli_fetch_array($res))
        {
            $productId = $row['productId'];
            $quantity = $row['quantity'];
            $price = $row['unityPrice'];
            mysqli_query($link,"INSERT INTO order_items VALUES(NULL, $orderId, $productId, $quantity, $price)");

            //Removes product in inventory
            $curQuantity=0;                                               
            $res=mysqli_query($link, "select * from inventory where id=$productId");            
            while($row=mysqli_fetch_array($res))
            {
                $curQuantity = $row["quantity"];
            }    
            $curQuantity -= $quantity;
            mysqli_query($link,"UPDATE inventory SET quantity=$curQuantity where id=$productId");
        }        
        mysqli_query($link,"DELETE FROM cart where productId is not null");  
        ?>
        <script type=text/javascript>
            window.location="index.php?page=dashboard";
        </script> 
        <?php
    }
?>