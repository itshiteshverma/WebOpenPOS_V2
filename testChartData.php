<?php
// include Database connection file
header('Content-Type: application/json');
include("ajax/db_connection.php");
//setting header to json


// Get User Details
//    $query = "SELECT name,organization FROM user";
//    if (!$result = mysqli_query($db,$query)) {
//        exit(mysqli_error());
//    }
//    $response = array();
//    if(mysqli_num_rows($result) > 0) {
//        while ($row = mysqli_fetch_assoc($result)) {
//            $response = $row;
//        }
//    }
//    else
//    {
//        $response['status'] = 200;
//        $response['message'] = "Data not found!";
//    }
//    // display JSON data
//    print json_encode($response);


//query to get data from the table
$query = "SELECT name,quantity FROM item";

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