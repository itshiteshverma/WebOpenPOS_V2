<!doctype html>



<html>



<head>
    <title>Hit Reminder</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--        this is for swrl-->
    <script src="jquery/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/sweetalert.css">




</head>


<body>
<?php
     include("connection.php");
    
     if( isset($_GET["r_id"])) {
   
    $query = "UPDATE reminder SET status='CANCLED' WHERE r_id=".$_GET['r_id']."; ";  
    mysqli_query($db,$query);
   }
    
    ?>

</body>
    
    <script type="text/javascript">
        function codeAddress() {
           swal("Reminder Canceled!", "Your Reminder Has been Canceled", "success")
        }
        window.onload = codeAddress;
        </script>

</html>