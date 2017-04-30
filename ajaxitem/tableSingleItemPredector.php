<?php
// include Database connection file

include("../db_connection.php");

if((isset($_POST['id'])) ){

    $query = "SELECT item_name, 
       SUM(billingitems.quantity) AS sold_quantity,
       initial_quantity,
	   item.id,
       item.quantity as `left_quantity`,
       round((SUM(billingitems.quantity)/initial_quantity)*100) as `ratio_sold_initial`,
       round((SUM(item.quantity)/initial_quantity)*100) as `ratio_left_initial` 
FROM billingitems,item WHERE billingitems.item_name = item.name AND item.id = '".$_POST['id']."'
GROUP BY item_name  ORDER BY ratio_sold_initial DESC";


    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);

    if($row){
        echo $row['ratio_sold_initial'];
        //1
        if (!$result2 = mysqli_query($db,$query)) {
            exit(mysqli_error());
        }

    }

}
?>    