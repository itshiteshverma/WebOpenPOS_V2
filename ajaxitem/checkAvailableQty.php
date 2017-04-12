<?php
	// include Database connection file 
	include("../db_connection.php");

// This is in the PHP file and sends a Javascript alert to the client

  if(isset($_POST['itemName']) && isset($_POST['itemName']) != ""){

        $itemName = $_POST['itemName'];
		$query = "SELECT quantity FROM item WHERE name='".$itemName."' LIMIT 1;";
		$result = mysqli_query($db,$query);
  		$row = mysqli_fetch_array($result);
    			
   		if($row){
     
			 $quantity=$row['quantity'];

			if (!$result = mysqli_query($db,$query)) {
	        exit(mysqli_error());
            }
	         echo $quantity;
       
      
   			}else{
         echo "N A";
   }


 
  }else{
   echo "N A";
  }
?>