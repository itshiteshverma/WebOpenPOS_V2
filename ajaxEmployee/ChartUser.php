<?php
// include Database connection file
header('Content-Type: application/json');
include("../db_connection.php");


$query = "SELECT billing.employee_id, user.user_name,
user.time,
SUM(billing.total_amount) AS grand_total,
ROUND((SUM(billing.total_amount)/DATEDIFF(CURRENT_TIMESTAMP(), user.time)),2) AS `productivity`
FROM billing, user  WHERE billing.employee_id=user.id AND user.org_detail_id='".$orgId."' GROUP BY user.user_name  ORDER BY  `grand_total` DESC";

if (!$result = mysqli_query($db,$query)) {
    exit(mysqli_error($db));
}
if(mysqli_num_rows($result) > 0) {
    $response = array();
    foreach ($result as $row) {
        $response[] = $row;
    }
}

else
{
    $response['status'] = 200;
    $response['message'] = "Data not found!";
}
//now print the data
print json_encode($response);

?>    