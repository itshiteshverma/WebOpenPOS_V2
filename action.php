<?php

if(isset($_POST['action'])){
$output = "";
$db = mysqli_connect("localhost","root","","pos");
    
$query = "CALL insertUsers('tttt','trer')";
mysqli_query($db,$query);
echo "DONE";
    
if($_POST['action'] == "Add"){
    
echo "in Action";
    $first_name = mysqli_real_escape_string($db,$_POST['firstName']);
     $last_name = mysqli_real_escape_string($db,$_POST['lastName']);
//    $first_name = $_POST['firstName'];
  //  $last_name = $_POST['lastName'];
    
    echo $first_name."--".$last_name;
    
    $procedure = "DELIMITER //
CREATE PROCEDURE insertUsers(IN firstName varchar(250) ,IN lastName varchar(250))
BEGIN
INSERT INTO users(first_name,last_name) VALUES(firstName,lastName);
END//

/* Finally, reset the delimiter to the default ; */
DELIMITER ;
    ";
    
    if(mysqli_query($db,"DROP PROCEDURE IF EXISTS insertUser")){
        echo "in drop ";
        if(mysqli_query($db,$procedure)){
            echo "after drop ";
            $query = "CALL insertUsers('".$first_name."','".$last_name."')";
            
            mysqli_query($db,$query);
            echo "Data Inserted";
        }
    }
    
    }
}else{
    echo "not set";
}

echo "not set ---";

?>