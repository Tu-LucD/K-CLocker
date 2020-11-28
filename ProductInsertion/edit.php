<?php
include('dbConnection.php');
$id=$_GET["id"];

$product_name="";
$product_description="";
$email="";
$contact="";
$image="";

$res=mysqli_query($link, "select * from product where id=$id");
while($row=mysqli_fetch_array($res))
{
    $product_name=$row["product_name"];
    $product_description=$row["product_description"];
    $email=$row["email"];
    $contact=$row["contact"];
    $image=$row["image"];
}
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    <div class="col-lg-4">
    <h2>Basic Database Connection</h2>
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
    <label for="price">Price (dont write $ e.g. 2.99):</label>
    <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
    </div>
    <div class="form-group">
    <label for="sport">Sport:</label>
    <select name="sports" id="sports">
        <option value="Running">running</option>
        <option value="Hockey">hockey</option>
        <option value="Volleyball">volleyball</option>
        <option value="Basketball">basketball</option>
        <option value="Baseball">baseball</option>
        <option value="Badminton">badminton</option>
        <option value="Tennis">tennis</option>
    </select>
    </div>
    <div class="form-group">
    <label for="category">Category:</label>
    <select name="categories" id="categories">
        <option value="Footwear">footwear</option>
        <option value="Clothing">clothing</option>
        <option value="Accessories">accessories</option>
        <option value="Equipment">equipment</option>
    </select>
    </div>
    <div class="form-group">
    <label for="sport">Image file name:</label>
    <input type="text" class="form-control" id="file" placeholder="Enter image file name" name="file">
    </div>
                
        <button type="submit" name="update" class="btn btn-default">Update</button>        
    </form>
    </div>
    </div>
        
    
    <?php
    if(isset($_POST["update"]))
    {
        $tm=md5(time());
        $fnm=$_FILES["f1"]["name"];

        if($fnm=="")
        {
            mysqli_query($link,"update product set product_name='$_POST[product_name]',product_description='$_POST[product_description]',email='$_POST[email]',contact='$_POST[contact]' where id=$id");
        }
        else
        {
        $dst="./images/".$tm.$fnm;
        $dst1="images/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        mysqli_query($link,"update product set product_name='$_POST[product_name]',product_description='$_POST[product_description]',email='$_POST[email]',contact='$_POST[contact]',image='$dst1' where id=$id");
        }
        ?>
        <script type="text/javascript">
        window.location="index.php?page=insert";
        </script>
        <?php
    }
    ?>
</body>
</html>