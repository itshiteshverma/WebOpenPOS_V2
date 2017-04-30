<?php
// include Database connection file
header('Content-Type: application/json');
include("../db_connection.php");

if(isset($_POST['limit'])){

$query = "SELECT item.name, item.quantity, item.price, ROUND((item.price/item.quantity),2) As `ratio`, ROUND(((item.price/item.quantity)/
(SELECT sum(price/quantity) AS `total`
FROM (SELECT item.price as price, item.quantity as quantity, (item.price/item.quantity) AS `data` FROM `item` ORDER BY `data` DESC LIMIT ".$_POST['limit'].") item))*100,0) as `percentage`
FROM item order by `percentage` DESC LIMIT ".$_POST['limit'].";";

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

}
?>    