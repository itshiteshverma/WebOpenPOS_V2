<?php 
//             $user = 'root';
//             $pass = '';
//             $db = 'pos';
//             $dataBase = $db;
//             $Location = 'localhost';
//             
//            $db = new mysqli($Location , $user,$pass,$db);
//         if(mysqli_connect_error()){
//             die("Could not connect to the dataBase");
//         } else{
//            //Good to GO!!!
//            
//         } 
//            $connection=new PDO('mysql:host=localhost;dbname='.$dataBase';charset=utf8mb4', 'root', '') or die("Could connect to Database");
//
//    $connection = mysql_connect($Location, $user,$pass);
//  $database_select = mysql_select_db($dataBase, $connection);
///* */

//            $user = 'root';
//             $pass = '';
//             $db = 'pos';
//             $dataBase = $db;
//             $Location = 'localhost';
//
//             
//            $db = new mysqli($Location,$user,$pass,$db) or die("MYSQLI Could connect to Database");
//            $connection=new PDO('mysql:host='.$Location.';dbname='.$dataBase.';charset=utf8mb4', $user, $pass) or die("Could connect to Database");

//            $connection = mysql_connect('mysql.hostinger.in', 'u970193115_diary','obQWz4OuItyP');
//            $database_select = mysql_select_db($dataBase, $connection);


//connection with the way to SMS


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

 $GLOBALS['SMSUname']="7988886763";
 $GLOBALS['SMSPass']="hitreminder";

//
////---------------------for online 000 WEB HOST -------------
//  
//             $user = 'id641484_itshiteshverma';
//             $pass = '9991008728';
//             $db = 'id641484_hitreminder';
//             
//            $db = new mysqli('localhost' , $user,$pass,$db);
//         if(mysqli_connect_error()){
//             die("Could not connect to the dataBase");
//         } else{
//            //Good to GO!!!
//            
//         } 


//
////---------------------for online HOSTINGER-------------
//////  
//             $user = 'u970193115_diary';
//             $pass = 'obQWz4OuItyP';
//             $db = 'u970193115_diary';
//             $dataBase = $db;
//             $Location = 'mysql.hostinger.in';
//
//             
//            $db = new mysqli($Location,$user,$pass,$db) or die("MYSQLI Could connect to Database");
//            $connection=new PDO('mysql:host='.$Location.';dbname='.$dataBase.';charset=utf8mb4', $user, $pass) or die("Could connect to Database");
//
////            $connection = mysql_connect('mysql.hostinger.in', 'u970193115_diary','obQWz4OuItyP');
////            $database_select = mysql_select_db($dataBase, $connection);

        
       
?>