<h2>This is a past order of yours</h2>



<div>
    <h2><?php echo "Order # " .$_GET['id']  ?></h2>
   
    <table id="pastOrders" class="table table-bordered">
        <thead>
        <u>
            <tr>
            <th>Product Name</th>
            <th>Price</th>
            </tr>
         </u>
        </thead>
    <tbody>


    <?php
        include('dbConnection.php');
        $price = 0;
        $totalPrice = 0;

        /** Fills the table with products included in this order along with their prices */
        $res = mysqli_query($link, "SELECT * FROM order_items oi, product p WHERE order_id='$_GET[id]' AND oi.product_id = p.id");
        while($row = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row['product_name']; echo "</td>";
            echo "<td>$"; echo $row['price']; $totalPrice += $row['price']; echo "</td>";
            $price = $row['price'];
        }
        $res = mysqli_query($link, "SELECT * FROM orders WHERE id='$_GET[id]' AND account_id='$_SESSION[id]'");
        while($row = mysqli_fetch_array($res)){
            $totalPrice += $row['order_shipping'];
            echo "</tr>";
        }
    ?>
    </tbody>
  </table>
  <!-- This displays the total rice + shipping -->
  <p style="color: green;">  <?php  echo "Total Price (shipping included): $$totalPrice";   ?>  </p>
</div>

<!-- User can go back to their dashboard by clicking this link -->
<a id="goBackToProduct" href="index.php?page=dashboard"><i class="fa fa-arrow-left"></i>Go back to Dashboard</a>

