<?php
// include Database connection file
include("../db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $item_id = $_POST['id'];

    // Get User Details
    $query = "SELECT price,quantity,remark FROM item WHERE id = '$item_id' ORDER BY `quantity` DESC";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}