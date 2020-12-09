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
        //Takes a sql query to make a product box
        function createProductBox($row){
            echo "<td class='productBox'>";
            ?><a href="index.php?page=productDetails&id=<?php echo $row["id"]?>"><img class="productPreview" src="<?php echo $row["product_image"]?>" alt="Product Image"></a>
            <?php echo "<br>";
            ?><p><?php echo $row["product_name"]?></p><p><?php echo "$".$row["price"]?></p>
            <?php echo "</td>";
        }

        //Takes result of sql query to make rows of products
        function fillProductTable(){
            $res = $_SESSION['currentRes'];
            if( $res == null) echo "<h3>No products matching the description was found.</h3>";
            else
            {
                $resLength = count($res);
                $index = $_SESSION['currentIndex'];
                $trimRes;

                //If there can only be one page
                if($resLength <= 9) {$trimRes = $res;}
                //If on last page
                else if (($resLength - $index) <= 9) {$trimRes = array_slice($res, $index, $resLength-1);}
                //If there can be more pages after this one
                else
                {
                    $trimRes = array_slice($res, $index, $index + 9);
                }
                
                $counter = 1;                
                echo "<tr>";
                while($row = $trimRes)
                {
                    createProductBox($row);
                    if($counter %= 3) echo "</tr>";
                    $counter++;
                }
            }                                    
        }
        
        //Fills table upon opening the product page        
        if(!isset($_POST["apply"]) and !isset($_POST["search"]))
        {
            $res = mysqli_query($link,"select * from product");
            //$_SESSION['currentRes'] = mysqli_fetch_array($res);
            $arr[] = array();
            while($row = mysqli_fetch_array($res))
            {
                array_push($arr, $row);
            }
            $_SESSION['currentRes'] = $arr;
            $_SESSION['currentIndex'] = 1;
            fillProductTable();
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
                $_SESSION['currentRes'] = mysqli_fetch_array($res);
                $_SESSION['currentIndex'] = 1;
                fillProductTable();                
            }
            //If no filter was chosen
            else
            {
                $res = mysqli_query($link,"select * from product order by product_name");
                $_SESSION['currentRes'] = mysqli_fetch_array($res);
                $_SESSION['currentIndex'] = 1;
                fillProductTable();
            }
        }

        //Triggers if "Reset Filter" button is clicked
        if(isset($_POST["reset"]))
        {
            //select all and echo the table        
            $res = mysqli_query($link,"select * from product order by product_name");
            $_SESSION['currentRes'] = mysqli_fetch_array($res);
            $_SESSION['currentIndex'] = 1;
            fillProductTable();
        }

        //Triggers if "Search" button is clicked
        if(isset($_POST["search"]))
        {            
            $searchProduct = $_POST["searchProduct"];
            $res = mysqli_query($link,"select * from product where product_name like '%$searchProduct%' order by product_name");
            $_SESSION['currentRes'] = mysqli_fetch_array($res);
            $_SESSION['currentIndex'] = 1;
            fillProductTable();                 
        }

        //Triggers if <- button is clicked
        if(isset($_POST["previousPage"]))
        {

        }

        //Triggers if -> button is clicked
        if(isset($_POST["nextPage"]))
        {

        }
    ?>
    </table>
</div>