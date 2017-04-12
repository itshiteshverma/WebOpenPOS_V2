<?php
if(isset($_POST['itemName']) && isset($_POST['price']) && isset($_POST['quantity']))
{
	// include Database connection file 
	include("../db_connection.php");

	// get values 
	$itemName = $_POST['itemName'];
	$price = $_POST['price'];
	$quantity = (int) $_POST['quantity'];
	$remark = $_POST['remark'];
	$category = $_POST['category'];
	$img = $_POST['img'];

 	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

		$query = "INSERT INTO item(`name`,`category`,`price`,`quantity`,`remark`,`image`) VALUES('".$itemName."','".$category."','".$price."','".$quantity."','".$remark."','".$file."')";


		if (!$result = mysqli_query($db,$query)) {
			exit(mysqli_error());
		}
		echo "1 Record Added!";


	}else{
		echo "Error";
	}

?> 