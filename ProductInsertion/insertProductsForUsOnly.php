<?php
    include('dbConnection.php');
?>
<div class="container">
<div class="col-lg-4">
<h2>Insert</h2>
<form action="" name="form1" method="post" enctype="multipart/form-data">        
    <div class="form-group">
    <label for="product_name">Product Name:</label>
    <input type="text" class="form-control" id="product_name" placeholder="Enter product_name" name="product_name">
    </div>
    <div class="form-group">
    <label for="product_description">Product_description:</label>
    <input type="text" class="form-control" id="product_description" placeholder="Enter product_description" name="product_description">
    </div>
    <div class="form-group">
    <label for="price">Price:</label>
    <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
    </div>
    <div class="form-group">
    <label for="sport">Sport:</label>
    <select name="sports" id="sports">
        <option value="running">running</option>
        <option value="hockey">hockey</option>
        <option value="volleyball">volleyball</option>
        <option value="basketball">basketball</option>
        <option value="baseball">baseball</option>
        <option value="badminton">badminton</option>
        <option value="tennis">tennis</option>
    </select>
    </div>
    <div class="form-group">
    <label for="category">Category:</label>
    <select name="categories" id="categories">
        <option value="footwear">footwear</option>
        <option value="clothing">clothing</option>
        <option value="accessories">accessories</option>
        <option value="equipment">equipment</option>
    </select>
    </div>
    <div class="form-group">
    <label for="sport">Image file name:</label>
    <input type="text" class="form-control" id="file" placeholder="Enter image file name" name="file">
    </div>
    
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    <button type="submit" name="update" class="btn btn-default">Update</button>
    <button type="submit" name="delete"class="btn btn-default">Delete</button>
</form>
</div>
</div>

<div class="col-lg-4">
<table class="table table-bordered">
    <thead>
    <tr>
    <th>#</th>
        <th>Image</th>
        <th>product_name</th>
        <th>product_description</th>
        <th>price</th>
        <th>sport</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $res = mysqli_query($link,"select * from product");
        while($row = mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td>"; echo $row["id"]; echo "</td>";
            echo "<td>"; ?> <img src="<?php echo $row["image"]?>" height="100" width="100"><?php echo "</td>";
            echo "<td>"; echo $row["product_name"]; echo "</td>";
            echo "<td>"; echo $row["product_description"]; echo "</td>";
            echo "<td>"; echo $row["price"]; echo "</td>";
            echo "<td>"; echo $row["sport"]; echo "</td>";
            echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-success">Edit</button></a><?php echo "</td>";
            echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-danger">Delete</button></a><?php echo "</td>";
            echo "</tr>";
        }        

        ?>
    </tbody>
</table>
</div>

<?php
if(isset($_POST["insert"]))
{
    // $tm=md5(time());
    // $fnm=$_FILES["f1"]["name"];
    // $dst="./images/".$tm.$fnm;
    // $dst1="images/".$tm.$fnm;
    // move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

    // mysqli_query($link,"insert into product values(NULL,'$_POST[product_name]','$_POST[product_description]','$_POST[price]','$_POST[sport]','$dst1')");
        echo $_POST["sports"];
    ?>
    <!-- <script type="text/javascript">
    window.location.href=window.location.href;
    </script> -->
    <?php
}

if(isset($_POST["delete"]))
{
    mysqli_query($link,"delete from product where product_name='$_POST[product_name]'") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php
}

if(isset($_POST["update"]))
{
    mysqli_query($link,"update product set product_name='$_POST[product_description]' where product_name='$_POST[product_name]'");

    ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php
}
?>
