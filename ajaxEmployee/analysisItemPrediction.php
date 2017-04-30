<?php
// include Database connection file
header('Content-Type: application/json');
include("../db_connection.php");

$query = "SELECT item_name, 
       SUM(billingitems.quantity) AS sold_quantity,
       initial_quantity,
	   item.id,
       item.quantity as `left_quantity`,
       round((SUM(billingitems.quantity)/initial_quantity)*100) as `ratio_sold_initial`,
       round((SUM(item.quantity)/initial_quantity)*100) as `ratio_left_initial` 
FROM billingitems,item WHERE billingitems.item_name = item.name
GROUP BY item_name  ORDER BY ratio_sold_initial DESC";

if (!$result = mysqli_query($db,$query)) {
    exit(mysqli_error($db));
}
if(mysqli_num_rows($result) > 0) {
    $response = array();
    foreach ($result as $row) {
        $response[] = $row;
    }
}

else
{
    $response['status'] = 200;
    $response['message'] = "Data not found!";
}
//now print the data
print json_encode($response);

?>    