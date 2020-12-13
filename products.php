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
    <!-- </form> -->
</div>
<div id="searchDiv">
    <div id="productsNav">
        <!-- <form action="" method="post"> -->
            <input type="submit" name="previousPage" value="Previous">
            <input type="submit" name="nextPage" value="Next">
        <!-- </form> -->
    </div>
    <div id="searchBar">      
        <!-- <form action="" method="post">   -->
            <input type="text" name="searchProduct">
            <input type="submit" name="search" value="Search">
        <!-- </form> -->
    </div>    
</div>
<div id="productsDiv">
    <table>    
    <?php
        //Stores currently active filter(s)
        if(!isset($_SESSION['filter']))
        {
            $_SESSION['filter'] = "None";
        }        
        //Stores current resource
        if(!isset($_SESSION['currentRes']))
        {
            $_SESSION['currentRes'] = " from product order by product_name";               
            fillProductTable();
        }
        //Stores current page in navigation
        if(!isset($_SESSION['pageno']))
        {
            $_SESSION['pageno'] = 1;
        }
        //Variable used to identify if the customer chose to filter with categories
        if(!isset($_SESSION['type']))
        {
            $_SESSION['type'] = 0;
        }        

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
            include('dbConnection.php');    
            echo "<tr><td colspan='3'>Filter: $_SESSION[filter]</td></tr>";
            $query = $_SESSION['currentRes'];            
            $pageno = $_SESSION['pageno'];                        
            $no_of_records_per_page = 9;
            $offset = ($pageno-1) * $no_of_records_per_page;                        
            //If anything but a category filter is applied
            if($_SESSION['type'] == 0)
            {
                //Calculates number of pages
                $total_pages_sql = "SELECT COUNT(*)".$query;            
                $result = mysqli_query($link,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
        
                //Displays products of selected page
                $sql = "SELECT *$query LIMIT $offset, $no_of_records_per_page";            
                $res_data = mysqli_query($link,$sql);
            }
            //If a category filter is applied
            else
            {
                //Calculates number of pages
                $total_pages_sql = "SELECT COUNT(*) FROM (".$query.") I";                            
                $result = mysqli_query($link,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
        
                //Displays products of selected page
                $sql = "$query LIMIT $offset, $no_of_records_per_page";            
                $res_data = mysqli_query($link,$sql);
            }

            //Prints products based on query
            $counter = 1;
            echo "<tr>";
            while($row = mysqli_fetch_array($res_data)){
                createProductBox($row);
                if($counter % 3 == 0)
                    echo "</tr>";
                $counter++;
            }                            
        }
        
        //Triggers if "Apply Filter" button is clicked
        if(isset($_POST["apply"]))
        {
            //If at least a filter is chosen
            if(isset($_POST["filterCategory"]) or isset($_POST["filterSport"]) or isset($_POST["filterPrice"]))
            {
                $_SESSION['filter'] = "";
                $categoryQuery = "";
                $sportQuery = "";
                $priceQuery = "";
                $checked = 0;
                //If a category is chosen
                if(isset($_POST["filterCategory"]))
                {
                    $category = $_POST["filterCategory"][0];
                    $categoryQuery = "select * from product where category='$category'";     
                    $checked++;              
                    $_SESSION['filter'] .= "Category-$category ";
                }
                //If a sport is chosen
                if(isset($_POST["filterSport"]))
                {
                    $sport = $_POST["filterSport"][0];
                    $sportQuery = "select * from product where sport='$sport'";
                    $checked++;
                    $_SESSION['filter'] .= "Sport-$sport ";
                }
                //If a price is chosen
                if(isset($_POST["filterPrice"]))
                {
                    $price = $_POST["filterPrice"][0];                    
                    if($price == "$0-$99.99") 
                    {
                        $priceQuery = "select * from product where price >= 0 and price < 100";
                        $priceRange = "$0-$99.99";
                    }
                    elseif($price == "$100-$199.99")
                    {
                        $priceQuery = "select * from product where price >= 100 and price < 200";
                        $priceRange = "$100-$199.99";
                    } 
                    else
                    {
                        $priceQuery = "select * from product where price >= 200";
                        $priceRange = "$200+";
                    } 

                    $checked++;
                    $_SESSION['filter'] .= "Price-$priceRange ";
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

                
                $_SESSION['currentRes'] = $filteredQuery." order by product_name";
                $_SESSION['currentIndex'] = 1;
                $_SESSION['type'] = 1;                
                fillProductTable();                
            }
            //If no filter was chosen
            else
            {                
                $_SESSION['currentRes'] =  " from product order by product_name";
                $_SESSION['pageno'] = 1;
                $_SESSION['type'] = 1;
                $_SESSION['filter'] = "None";
                fillProductTable();
            }
        }

        //Triggers if "Reset Filter" button is clicked
        if(isset($_POST["reset"]))
        {
            //select all and echo the table                    
            $_SESSION['currentRes'] = " from product order by product_name";
            $_SESSION['pageno'] = 1;
            $_SESSION['type'] = 0;
            $_SESSION['filter'] = "None";
            fillProductTable();
        }

        //Triggers if "Search" button is clicked
        if(isset($_POST["search"]))
        {            
            $searchProduct = $_POST["searchProduct"];            
            $_SESSION['currentRes'] = " from product where product_name like '%$searchProduct%' order by product_name";
            $_SESSION['pageno'] = 1;
            $_SESSION['type'] = 0;
            $_SESSION['filter'] = "\"$searchProduct\"";
            fillProductTable();                 
        }

        //Triggers if <- button is clicked
        if(isset($_POST["previousPage"]))
        {
            //Checks if clicking Previous goes out of bounds
            if($_SESSION['pageno'] != 1)
            {
                $_SESSION['pageno']--;
                fillProductTable();
            }     
            else
            {
                fillProductTable();
            }       
        }

        //Triggers if -> button is clicked
        if(isset($_POST["nextPage"]))
        {
            $query = $_SESSION['currentRes'];            
            $pageno = $_SESSION['pageno'];            
            $no_of_records_per_page = 9;
            $offset = ($pageno-1) * $no_of_records_per_page;            
         //Counts number of pages
            //If anything but a category filter is applied
            if($_SESSION['type'] == 0)
            {
                $total_pages_sql = "SELECT COUNT(*)".$query;            
                $result = mysqli_query($link,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);                        
            }
            //If category filter is applied
            else
            {
                $total_pages_sql = "SELECT COUNT(*) FROM (".$query.") I";                            
                $result = mysqli_query($link,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);        
            }
            //Determines if clicking Next goes out of bounds
            if($_SESSION['pageno'] < $total_pages)
            {
                $_SESSION['pageno']++;
                fillProductTable();
            }   
            else
                fillProductTable();
        }
    ?>
    </table>
    </form>
</div>