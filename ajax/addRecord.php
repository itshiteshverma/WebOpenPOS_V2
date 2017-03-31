<?php
if(isset($_POST['billNo']) && isset($_POST['itemName']) && isset($_POST['quantity']))
{
	// include Database connection file 
	include("db_connection.php");

	// get values 
	$billNo = $_POST['billNo'];
	$itemName = $_POST['itemName'];
	$quantity = (int) $_POST['quantity'];


	$query = "SELECT price FROM item WHERE name='".$itemName."' LIMIT 1;";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);

	if($row){

		$price=(float) $row['price'];
		$total = (float) $quantity * $price;
		

		$query = "INSERT INTO billingitems(`bill_id`,`item_name`,`quantity`,`price`,`total`) VALUES('".$billNo."','".$itemName."','".$quantity."','".$price."','".$total."')";


		if (!$result = mysqli_query($db,$query)) {
			exit(mysqli_error());
		}

		$query2="UPDATE item SET quantity = quantity - ".$quantity." WHERE name= '".$itemName."'";
		
		if (!$result = mysqli_query($db,$query2)) {
			exit(mysqli_error());
		}
		
		echo "1 Record Added!";


	}else{
		echo "We could not find You !!!!";
	}


}
?> 