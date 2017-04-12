<?php
// include Database connection file
include("../db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $remark = $_POST['remark'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Updaste User details
    $query = "UPDATE item SET `remark` = '$remark', `price` = '$price', `quantity` = '$quantity' , `initial_quantity` = '$quantity' WHERE id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }
}