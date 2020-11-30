<div id="filterDiv">
    <form action="" method="post">
        <table>            
            <tr><th colspan=2><h4>Sport</h4></th></tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Running"></td>
                <td>Running</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Hockey"></td>
                <td>Hockey</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Volleyball"></td>
                <td>Volleyball</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Basketball"></td>
                <td>Basketball</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Baseball"></td>
                <td>Baseball</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Badminton"></td>
                <td>Badminton</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="Tennis"></td>
                <td>Tennis</td>
            </tr>
            <tr><th colspan=2><h4>Category</h4></th></tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="Footwear"></td>
                <td>Footwear</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="Clothing"></td>
                <td>Clothing</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="Accessories"></td>
                <td>Accessories</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="Equipment"></td>
                <td>Equipment</td>
            </tr>
            <tr><th colspan=2><h4>Price Range</h4></th></tr>
            <tr>
                <td><input type="radio" name="filterPrice[]" value="0+"></td>
                <td>0$ - 100$</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterPrice[]" value="100+"></td>
                <td>100$ - 200$</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterPrice[]" value="200+"></td>
                <td>200$ +</td>
            </tr>
            <tr>
                <th colspan=2><input type="submit" name="apply" value="Apply Filter" />  <input type="submit" name="reset" value="Reset Filter" /></th>                
            </tr>
        </table>                                    
    </form>
</div>
<div id="searchDiv">
    <div id="filterList">
        <?php
            //make filters appear after they apply filters
        ?>
    </div>
    <div id="searchBar">      
        <form action="" method="post">  
            <input type="text" name="searchProduct">
            <input type="submit" name="search" value="Search">
        </form>
    </div>    
</div>
<div id="productsDiv">
    <table>
    <?php
        include('dbConnection.php');

        //Takes a sql query to make a product box
        function createProductBox($row){
            echo "<td class='productBox'>";
            ?><img class="productPreview" src="<?php echo $row["product_image"]?>" alt="Product Image">
            <?php echo "<br>";
            ?><p><?php echo $row["product_name"]?></p> <a href="index.php?page=productDetails&id=<?php echo $row["id"]?>"><button type="button" class="btn btn-info">View</button></a>
            <?php echo "</td>";
        }

        //Takes result of sql query to make rows of products
        function fillProductTable($res){
            $counter = 1;
            echo "<tr>";
            while($row = mysqli_fetch_array($res))
            {
                createProductBox($row);
                if($counter % 3 == 0)
                {
                    echo "</tr>";
                }
                $counter++;
            }
        }
        //Fills table upon opening the product page
        $res = mysqli_query($link,"select * from product");
        fillProductTable($res);
        
        //Triggers if "Apply Filter" button is clicked
        if(isset($_POST["apply"]))
        {
            if(isset($_POST["filterCategory"]))
            {
                $category = $_POST["filterCategory"][0];
                $res = mysqli_query($link,"select * from product where category=$category");
                fillProductTable($res);                
            }            
            else echo "haha";
        }

        //Triggers if "Reset Filter" button is clicked
        if(isset($_POST["reset"]))
        {
            //select all and echo the table        
        }

        //Triggers if "Search" button is clicked
        if(isset($_POST["search"]))
        {
            echo "haha";
        }
    ?>
    </table>
</div>