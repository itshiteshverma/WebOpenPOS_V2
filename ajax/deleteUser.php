<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $id = $_POST['id'];


    $query2 = "SELECT item_name,quantity FROM billingitems WHERE id='".$id."' LIMIT 1;";
    $result2 = mysqli_query($db,$query2);
    $row = mysqli_fetch_array($result2);

    if($row){

        $itemName=$row['item_name'];
        $quantity=$row['quantity'];

        if (!$result2 = mysqli_query($db,$query2)) {
            exit(mysqli_error());
        }else{

            
            $query3="UPDATE item SET quantity = quantity + ".$quantity." WHERE name= '".$itemName."'";

            if (!$result = mysqli_query($db,$query3)) {
                exit(mysqli_error());
            }else{

                // delete User
                $query4 = "DELETE FROM billingitems WHERE id = '$id'";
                if (!$result = mysqli_query($db,$query4)) {
                    exit(mysqli_error());
                }
            }

        }

    } else{
        echo "N A";
    }


}
?>