<?php

//// Connection variables 
//$host = "localhost"; // MySQL host name eg. localhost
//$user = "root"; // MySQL user. eg. root ( if your on localserver)
//$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
//$database = "pos"; // MySQL Database name
//
//// Connect to MySQL Database 
//$db = mysql_connect($host, $user, $password) or die("Could not connect to database");
//
//// Select MySQL Database 
//mysql_select_db($database, $db);

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "pos";

$db = mysqli_connect ($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die ("Opps something went wrong ");

$orgId = 6;

?>