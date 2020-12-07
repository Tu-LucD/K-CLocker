<h2>Promotions</h2>
<table id="promotionsTable">
    <tr>
        <td>
            <?php
                createPromotionCell(1);
            ?>
        </td>
        <td class="emptyCell"></td>
        <td>
            <?php
                createPromotionCell(2);
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
                createPromotionCell(3);
            ?>
        </td>
        <td class="emptyCell"></td>
        <td>
            <?php
                createPromotionCell(4);
            ?>
        </td>
    </tr>
</table>

<?php
      
    function createPromotionCell($id)
    {
        include('dbConnection.php');  
        $res = mysqli_query($link,"select * from promotions where id=$id");
        while($row = mysqli_fetch_array($res))
        {
            ?>
            <h3 class="promotionTitle"><?php $row["title"]?></h3>
            <p class="promotionDesc"><?php $row["description"]?></p>
            <?php
        }
    }
?>