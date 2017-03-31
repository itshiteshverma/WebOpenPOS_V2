<?php 
include("connection.php");
$r_id = $_POST['postrID'];

    $query = "UPDATE reminder SET status='CANCLED' WHERE r_id=".$r_id."; ";  
    mysqli_query($db,$query);
    echo "Success";
?>