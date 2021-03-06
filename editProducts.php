<h2>Manage Products</h2>

<form name="frmSearch" method="post" action="index.php?page=editProducts">
	<div class="search-box">
	<p>
	<input type="text" placeholder="Name" name="name" class="demoInputBox" value=""	>
	<input type="submit" name="search" class="btnSearch" value="Search">
    <input type="submit" name="reset" class="btnSearch" value="Reset">
	</p>
	</div>
</form>

<div>

    <table id="pastOrders" class="table table-bordered">
    <thead>
      <tr>
        <th>Image</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Desscription</th>
        <th>Price</th>
        <th>Sport</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Edit</th>
        <th>Edit Quantity</th>
      </tr>
    </thead>
    <tbody>


    <?php
        include('dbConnection.php');
        if(!isset($_POST['search'])){
            /** Will display if nothing has happened */
            $res = mysqli_query($link, "SELECT * FROM product, inventory WHERE product.id = inventory.id");
            while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>"; ?> <img class="cartItemImg" src="<?php echo $row['product_image']?> " alt=""> <?php echo "</td>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['product_name']; echo "</td>";
                echo "<td>"; echo $row['product_description']; echo "</td>";
                echo "<td>$"; echo $row['price']; echo "</td>";
                echo "<td>"; echo $row['sport']; echo "</td>";
                echo "<td>"; echo $row['category']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; ?> <a href="index.php?page=editProduct&productId=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Edit</button></a> <?php echo "</td>";
                echo "<td>"; ?> <a href="index.php?page=inventory&productId=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Quantity</button></a> <?php echo "</td>";
                echo "</tr>";
            }
        }
        /** Takes the word in the search box and looks at the name or description of the products to find that word */
        else if(isset($_POST['search'])){
            $res = mysqli_query($link, "SELECT * FROM product, inventory WHERE (product.product_name LIKE '%$_POST[name]%' OR product.product_description LIKE '%$_POST[name]%') AND product.id = inventory.id");
            while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>"; ?> <img class="cartItemImg" src="<?php echo $row['product_image']?> " alt=""> <?php echo "</td>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['product_name']; echo "</td>";
                echo "<td>"; echo $row['product_description']; echo "</td>";
                echo "<td>$"; echo $row['price']; echo "</td>";
                echo "<td>"; echo $row['sport']; echo "</td>";
                echo "<td>"; echo $row['category']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; ?> <a href="index.php?page=editProduct&productId=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Edit</button></a> <?php echo "</td>";
                echo "<td>"; ?> <a href="index.php?page=inventory&productId=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Quantity</button></a> <?php echo "</td>";
                echo "</tr>";
            }
        }
        /** Resets the table to how it was originally */
        else if(isset($_POST['reset'])){
            $res = mysqli_query($link, "SELECT * FROM product, inventory WHERE product.id = inventory.id");
            while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>"; ?> <img class="cartItemImg" src="<?php echo $row['product_image']?> " alt=""> <?php echo "</td>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['product_name']; echo "</td>";
                echo "<td>"; echo $row['product_description']; echo "</td>";
                echo "<td>"; echo $row['price']; echo "</td>";
                echo "<td>"; echo $row['sport']; echo "</td>";
                echo "<td>"; echo $row['category']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; ?> <a href="index.php?page=editProduct&productId=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Edit</button></a> <?php echo "</td>";
                echo "<td>"; ?> <a href="index.php?page=inventory&productId=<?php echo $row["id"];?>"><button type="button" class="btn btn-info">Quantity</button></a> <?php echo "</td>";
                echo "</tr>";
            }
        }
        
    ?>
    </tbody>
    </table>
  </div>