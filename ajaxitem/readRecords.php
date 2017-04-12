<?php
// include Database connection file 
include("../db_connection.php");


// Design initial table header 
$data = '


<table class="table table-responsive table-hover table-condensed table-bordered table-striped">
        <thead>
                 <tr>
						   	<th class="text-center col-md-1">Image</th>
                            <th class="text-center col-md-2">Item</th>
							<th class="text-center col-md-2">Category</th>
							<th class="text-center col-md-2">Price</th>
                            <th class="text-center col-md-2">Quantity</th>
                            <th class="text-center col-md-2">Action</th>
        </tr>
        </thead>

';

$query = "SELECT * FROM item ORDER BY `id` DESC";

if (!$result = mysqli_query($db,$query)) {
	exit(mysql_error());
}

// if query results contains rows then featch those rows 
if(mysqli_num_rows($result) > 0)
{
	$number = 1;
	while($row = mysqli_fetch_assoc($result))
	{


		$data .= '<tbody>
                          <tr>
                              <td class="text-center col-md-2"><img height="100" width="100" class="text-center img-responsive thumbnail img-rounded" onerror="this.src=\'images/noimg.png\'"  src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/></td>
                               <td class="text-center col-md-2">
                                   <strong>'.$row['name'].'</strong>

				               </td>
				               <td class="text-center col-md-2">'.$row['category'].'</td>
				               <td class="text-center col-md-2">'.$row['price'].'</td>
				               <td class="text-center col-md-2">'.$row['quantity'].'</td>

				<td class="text-center col-md-2">
					<button onclick="DeleteItem('.$row['id'].')" class="glyphicon glyphicon-trash btn btn-danger"></button>
                    <button onclick="UpdateItem('.$row['id'].')" class="glyphicon glyphicon-pencil btn btn-success"></button>
					<button onclick="ActionItem('.$row['id'].')" class="glyphicon glyphicon-star glyphicon  btn btn-info"></button>

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

$data .= '  </tbody>
</table>';


echo $data;

?>