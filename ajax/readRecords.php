<?php
	// include Database connection file 
	include("db_connection.php");

  if(isset($_POST['billNo']) && isset($_POST['billNo']) != ""){
	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Item Name</th>
							<th>Quantity</th>
							<th>Price</th>
                            <th>Total</th>
							<th>Delete</th>
						</tr>';
 
	$query = "SELECT * FROM billingitems WHERE bill_id=".$_POST['billNo']."";

	if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['item_name'].'</td>
				<td>'.$row['quantity'].'</td>
				<td>'.$row['price'].'</td>
                <td>'.$row['total'].'</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    
   
   $query2 = "SELECT ROUND(SUM(total),2) AS total FROM billingitems WHERE bill_id = '".$_POST['billNo']."' LIMIT 1";
	
	$result2 = mysqli_query($db,$query2);
	$row = mysqli_fetch_array($result2);

	if($row){

		$totalprice=$row['total'];
		if (!$result2 = mysqli_query($db,$query2)) {
			exit(mysqli_error($db));
		}else{
         $data .= '
         <br>
         <label for="grand_total">Grand Total</label>
          <div class="form-group">
           <input id="grand_total" name="grand_total" class="form-control bold" readonly type="number" value="'.$totalprice.'"/>
          </div>'
         ;

        }

	}else{
		$data .= '<lable>Total Price :'."NA".'</lable>';
	}

  
   echo $data;
  }
?>