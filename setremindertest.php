<?php

session_start();

       include("connection.php");
           $query = "INSERT INTO `item` (`name`,`quantity`,`price`,`category`) VALUES($_POST['item'],$_POST['quantity'],$_POST['price'],$_POST['type'])";  
            
            if(mysqli_query($db,$query)){
               echo "ReminderSet";
            
            }else{
                echo "ReminderNotSet";
            }
    

?>