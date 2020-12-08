<h2>This is a past order of yours</h2>



<div>
    <h2><?php echo "Order # " .$_GET['id']  ?></h2>
   
    <table id="pastOrders" class="table table-bordered">
        <thead>
        <u>
            <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Total</th>
            </tr>
         </u>
        </thead>
    <tbody>


    <?php
        include('dbConnection.php');
        $price = 0;
        $res = mysqli_query($link, "SELECT * FROM order_items oi, product p WHERE order_id='$_GET[id]' AND oi.product_id = p.id");
        while($row = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row['product_name']; echo "</td>";
            echo "<td>$"; echo $row['price']; echo "</td>";
            $price = $row['price'];
        }
        $res = mysqli_query($link, "SELECT * FROM orders WHERE id='$_GET[id]' AND account_id='$_SESSION[id]'");
        while($row = mysqli_fetch_array($res)){

            /** For the total, it is the shipping price + price of the order */
            echo "<td>$"; echo $row['order_shipping'] + $price; echo "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
  </table>
</div>

<a id="goBackToProduct" href="index.php?page=dashboard"><i class="fa fa-arrow-left"></i>Go back to Dashboard</a>

