<div id="filterDiv">
    <form action="" method="post">
        <table>            
            <tr><th colspan=2><h4>Sport</h4></th></tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="running"></td>
                <td>Running</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="hockey"></td>
                <td>Hockey</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="volleyball"></td>
                <td>Volleyball</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="basketball"></td>
                <td>Basketball</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="baseball"></td>
                <td>Baseball</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="badminton"></td>
                <td>Badminton</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterSport[]" value="tennis"></td>
                <td>Tennis</td>
            </tr>
            <tr><th colspan=2><h4>Category</h4></th></tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="footwear"></td>
                <td>Footwear</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="clothing"></td>
                <td>Clothing</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="accessories"></td>
                <td>Accessories</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterCategory[]" value="equipment"></td>
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
    <table id="productTable">
    <?php
        include('dbConnection.php');
        function createProductBox($row){
            echo "<td>";
            ?><img src="<?php echo $row["product_image"]?>" alt="Product Image">
            <?php echo "<br>";
            echo $row["product_name"]; ?> <a href="productDetails.php?id=<?php echo $row["id"]?>"><button type="button" class="btn btn-info">View</button></a>
            <?php echo "</td>";
        }
        function fillProductTable($res){
            $counter = 1;
            while($row = mysqli_fetch_array($res))
            {
                if($counter==1 or $counter % 3 == 0)
                {
                    echo "</tr>";
                }
            }
        }
        if(isset($_POST["apply"]))
        {
            $category = $_POST["filterCategory"][0];
            echo $category;
        }
        if(isset($_POST["reset"]))
        {
            //select all and echo the table        
        }
        if(isset($_POST["search"]))
        {
            echo "haha";
        }
    ?>
    </table>
</div>