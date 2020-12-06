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
                <td><input type="radio" name="filterPrice[]" value="$0-$99.99"></td>
                <td>0$ - 100$</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterPrice[]" value="$100-$199.99"></td>
                <td>100$ - 200$</td>
            </tr>
            <tr>
                <td><input type="radio" name="filterPrice[]" value="$200+"></td>
                <td>200$ +</td>
            </tr>
            <tr>
                <th colspan=2><input type="submit" name="apply" value="Apply Filter" />  <input type="submit" name="reset" value="Reset Filter" /></th>                
            </tr>
        </table>                                    
    </form>
</div>
<div id="searchDiv">
    <div id="productsNav">
        <form action="" method="post">  
            <input type="submit" name="previousPage" value="<-">
            <input type="submit" name="nextPage" value="->">
        </form>
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
        $currentRes;
        

        //Takes a sql query to make a product box
        function createProductBox($row){
            echo "<td class='productBox'>";
            ?><a href="index.php?page=productDetails&id=<?php echo $row["id"]?>"><img class="productPreview" src="<?php echo $row["product_image"]?>" alt="Product Image"></a>
            <?php echo "<br>";
            ?><p><?php echo $row["product_name"]?></p><p><?php echo "$".$row["price"]?></p>
            <?php echo "</td>";
        }

        //Takes result of sql query to make rows of products
        function fillProductTable($res){
            if(mysqli_fetch_array($res) == null) echo "<h3>No products matching the description was found.</h3>";
            else
            {
                $counter = 1;
                echo "<tr>";
                while($row = mysqli_fetch_array($res))
                {
                    if($counter < (9 * $_COOKIE["page"] + 10) and $counter >= (9 * $_COOKIE["page"] + 1))
                    {
                        createProductBox($row);    
                    }                    
                    if($counter % 3 == 0)
                    {
                        echo "</tr>";
                    }
                    $counter++;
                }
            }                                    
        }
        

        //Fills table upon opening the product page        
        if(!isset($_POST["apply"]) and !isset($_POST["search"]))
        {
            $res = mysqli_query($link,"select * from product order by product_name");
            $currentRes = $res;
            fillProductTable($res);
        }
        
        //Triggers if "Apply Filter" button is clicked
        if(isset($_POST["apply"]))
        {
            //If at least a filter is chosen
            if(isset($_POST["filterCategory"]) or isset($_POST["filterSport"]) or isset($_POST["filterPrice"]))
            {
                $categoryQuery = "";
                $sportQuery = "";
                $priceQuery = "";
                $checked = 0;
                if(isset($_POST["filterCategory"]))
                {
                    $category = $_POST["filterCategory"][0];
                    $categoryQuery = "select * from product where category='$category'";     
                    $checked++;               
                }
                if(isset($_POST["filterSport"]))
                {
                    $sport = $_POST["filterSport"][0];
                    $sportQuery = "select * from product where sport='$sport'";
                    $checked++;
                }
                if(isset($_POST["filterPrice"]))
                {
                    $price = $_POST["filterPrice"][0];                    
                    if($price == "$0-$99.99") $priceQuery = "select * from product where price >= 0 and price < 100";
                    elseif($price == "$100-$199.99") $priceQuery = "select * from product where price >= 100 and price < 200";
                    else $priceQuery = "select * from product where price >= 200";

                    $checked++;
                }   

                //Checks how many filters were chosen and builds sql query      
                $filteredQuery = "";
                if($checked == 1)   
                {
                    if($categoryQuery != null) $filteredQuery = $categoryQuery;
                    elseif($sportQuery != null) $filteredQuery = $sportQuery;
                    else $filteredQuery = $priceQuery;
                }
                elseif($checked == 2)
                {
                    if($categoryQuery == null) $filteredQuery = $sportQuery." intersect ".$priceQuery;
                    elseif($sportQuery == null) $filteredQuery = $categoryQuery." intersect ".$priceQuery;
                    else $filteredQuery = $sportQuery." intersect ".$categoryQuery;
                }
                else $filteredQuery = $categoryQuery." intersect ".$sportQuery." intersect ".$priceQuery;

                $res = mysqli_query($link,$filteredQuery." order by product_name");
                $currentRes = $res;
                fillProductTable($res);
            }
            //If no filter was chosen
            else
            {
                $res = mysqli_query($link,"select * from product order by product_name");
                $currentRes = $res;
                fillProductTable($res);
            }
        }

        //Triggers if "Reset Filter" button is clicked
        if(isset($_POST["reset"]))
        {
            //select all and echo the table        
            $res = mysqli_query($link,"select * from product order by product_name");
            $currentRes = $res;
            fillProductTable($res);
        }

        //Triggers if "Search" button is clicked
        if(isset($_POST["search"]))
        {
            $searchProduct = $_POST["searchProduct"];
            $res = mysqli_query($link,"select * from product where product_name like '%$searchProduct%' order by product_name");
            $currentRes = $res;
            fillProductTable($res);                    
        }

        //Triggers if <- button is clicked
        if(isset($_POST["previousPage"]))
        {
            $page = $_COOKIE["page"];
            if($page != 0) 
            {
                setcookie("page", $page--, time()+3600, "/", "", 0);
                fillProductTable($currentRes);
            }
        }

        //Triggers if -> button is clicked
        if(isset($_POST["nextPage"]))
        {
            $page = $_COOKIE["page"];
            $counter = 1;
            while($row = mysqli_fetch_array($currentRes))
            {
                $counter++;
            }

            if((9 * ($page + 1) + 1) < $counter)
            {
                setcookie("page", $page++, time()+3600, "/", "", 0);
                fillProductTable($currentRes);
            }
        }
    ?>
    </table>
</div>