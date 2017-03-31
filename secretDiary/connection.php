 <?php 
             $user = 'u970193115_diary';
             $pass = 'eK4BGnRtTltp';
             $db = 'u970193115_diary';
             
            $db = new mysqli('mysql.hostinger.in' , $user,$pass,$db);
         if(mysqli_connect_error()){
             die("Could not connect to the dataBase");
         } else{
            //Good to GO!!!
         } 
?>