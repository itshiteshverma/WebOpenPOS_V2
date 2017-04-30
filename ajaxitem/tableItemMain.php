<?php
// include Database connection file
header('Content-Type: application/json');
include("../db_connection.php");

$query = "SELECT name,quantity,price FROM item ORDER BY `price` DESC";

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