<h2>This is the products page</h2>
<div id="filterDiv">
    <form action="" method="post">
    <h4>Sport</h4>
    <label>        
        <input type="radio" name="filterSport[]" value="running">
        Running
    </label>
    <label>        
        <input type="radio" name="filterSport[]" value="hockey">
        Hockey
    </label>
    <label>        
        <input type="radio" name="filterSport[]" value="volleyball">
        Volleyball
    </label>
    <label>
        <input type="radio" name="filterSport[]" value="basketball">
        Basketball
    </label>
    <label>
        <input type="radio" name="filterSport[]" value="baseball">
        Baseball
    </label>
    <label>
        <input type="radio" name="filterSport[]" value="badminton">
        Badminton
    </label>
    <label>
        <input type="radio" name="filterSport[]" value="tennis">
        Tennis
    </label>

    <br>

    <h4>Category</h4>
    <label>        
        <input type="radio" name="filterCategory[]" value="footwear">
        Footwear
    </label>
    <label>        
        <input type="radio" name="filterCategory[]" value="clothing">
        Clothing
    </label>
    <label>        
        <input type="radio" name="filterCategory[]" value="accessories">
        Accessories
    </label>
    <label>
        <input type="radio" name="filterCategory[]" value="equipment">
        Equipment
    </label>

    <br>

    <h4>Price Range</h4>
    <label>        
        <input type="radio" name="filterPrice[]" value="0+">
        0$ - 100$
    </label>
    <label>        
        <input type="radio" name="filterPrice[]" value="100+">
        100$ - 200$
    </label>
    <label>        
        <input type="radio" name="filterPrice[]" value="200+">
        200$ +
    </label>

    <input type="submit" name="apply" value="Apply Filter" />
    <input type="submit" name="reset" value="Reset Filter" />
    </form>
</div>
<div id="searchDiv"></div>
<div id="productsDiv">
    <table>
    <?php
        require('dbConnection.php');
        if(isset($_POST["apply"]))
        {
            $category = $_POST["filterCategory"][0];
            echo $category;
        }
        if(isset($_POST["reset"]))
        {
            //select all and echo the table        
        }
    ?>
    </table>
</div>