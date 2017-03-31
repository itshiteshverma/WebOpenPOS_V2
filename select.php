<?php
//include("connection.php");
$output = "";
$db = mysqli_connect("localhost","root","","pos");

if(isset($_POST['action'])){
    $procedure = "
    CREATE PROCEDURE selectUser()
    BEGIN
    SELECT * FROM users ORDER BY id DESC;
    END;
    ";
    
    if(mysqli_query($db,"DROP PROCEDURE IF EXISTS selectUser;")){
        
        if(mysqli_query($db,$procedure)){
            $query = "CALL selectUser()";
            $result = mysqli_query($db,$query);
            $output .= '<table class="table table-bordered">
                            <tr>
                                <th width="35%">First Name</th>
                                <th width="35%">Last Name</th>
                                <th width="15%">Update</th>
                                <th width="15%">Delete</th>
                                
                            </tr>';
            
            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_array($result)){
                    $output .='
                            <tr>
                                <td>'.$row['first_name'].'</td>
                                <td>'.$row['last_name'].'</td>
                                <td><button type="button" name="update"
                                 id="'.$row['id'].'" class="update">Update</button></td>
                                 <td><button type="button" name="delete"
                                 id="'.$row['id'].'" class="delete">Delete</button></td>
                            </tr>
                    ';
                }
            }else{
                $output .='<tr>
                                <td colspan="4">Data Not Found</td>
                            </tr>';
            }
            
            $output .= '</table>';
            
            echo $output;
        }
        
//        echo "outside If";
    }
    
//    echo "outside procedure";
    
}

//echo "outside main if ";


?>