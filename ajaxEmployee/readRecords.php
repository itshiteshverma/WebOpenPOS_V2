<?php
// include Database connection file 
session_start();
//require_once('../navBar.php');
include("../db_connection.php");


// Design initial table header 
$data = '


<table class="table table-responsive table-hover table-condensed table-bordered table-striped">
        <thead>
                 <tr>
						   	<th class="text-center col-md-1">Image</th>
                            <th class="text-center col-md-2">Name</th>
							<th class="text-center col-md-2">Email ID</th>
							<th class="text-center col-md-2">Total Sale</th>
                            <th class="text-center col-md-2">Productivity</th>
                            <th class="text-center col-md-2">Action</th>
        </tr>
        </thead>

';


$query = "SELECT billing.employee_id, user.user_name,
DATE_FORMAT(user.time,'%D %b %y') as `date`,user.image,user.email,
SUM(billing.total_amount) AS grand_total,
ROUND((SUM(billing.total_amount)/DATEDIFF(CURRENT_TIMESTAMP(), user.time)),2) AS `productivity`
FROM billing, user  WHERE billing.employee_id=user.id AND user.org_detail_id='".$orgId."' GROUP BY user.user_name  ORDER BY  `grand_total` DESC";

if (!$result = mysqli_query($db,$query)) {
	exit(mysqli_error($db));
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
                             
                               <td class="text-center col-md-2"><strong>'.$row['user_name'].'<br>'.$row['date'].'</strong></td>
				               <td class="text-center col-md-2">'.$row['email'].'</td>
				               <td class="text-center col-md-2">'.$row['grand_total'].'</td>
				               <td class="text-center col-md-2">'.$row['productivity'].'</td>

				<td class="text-center col-md-2">
					<button onclick="DeleteEmployee('.$row['employee_id'].')" class="glyphicon glyphicon-trash btn btn-danger"></button>
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