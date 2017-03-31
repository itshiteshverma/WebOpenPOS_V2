<?php
session_start();
include("db_connection.php");


$billNo = 0;

if(isset($_GET["bill_id"]))
{
    $temp = (int)$_GET["bill_id"];
    $billNo = $temp + 1 ;
        

    if(isset($_GET['remark'])){
        $remark = $_GET['remark'];
        $query = "UPDATE billing SET remark = '$remark', user_id = ".$_SESSION['id']." WHERE bill_id = '$temp'";
        if (!$result = mysqli_query($db,$query)) {
            exit(mysqli_error($db));
        }
    }


}

if((isset($_POST['submit']))){

    //    $message = "clicked";
    //    echo "<script type='text/javascript'>alert('$message');</script>";
    //    echo "Clicked";
    

    $query = "INSERT INTO billing(`bill_id`) VALUES('".$billNo."')";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysqli_error($db));
    }else{
        header("Location: ../billing.php");
    }
   
}else{
  

}


?>

<!doctype html>
<html>

    <head>
        <title>HitReminder</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="logo.PNG" />

        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#FCB110">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#FCB110">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#FCB110">

        <!-- Latest compiled and minified CSS -->


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <style>
            .invoice-title h2, .invoice-title h3 {
                display: inline-block;
            }

            .table > tbody > tr > .no-line {
                border-top: none;
            }

            .table > thead > tr > .no-line {
                border-bottom: none;
            }

            .table > tbody > tr > .thick-line {
                border-top: 2px solid;
            }

            .contanier{
                padding-top: 20px;

            }

        </style>



    </head>

    <body >
        <?php

        include("db_connection.php");

        $bill_id = $_GET["bill_id"];

        $query2 = "SELECT * FROM user WHERE id='".$_SESSION['id']."' LIMIT 1;";
        $result2 = mysqli_query($db,$query2);
        $row = mysqli_fetch_array($result2);

        if($row){

        $image=$row['image'];
            if (!$result2 = mysqli_query($db,$query2)) {
                exit(mysqli_error());
            }
                         $data = '<div class="contanier">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="invoice-title">
                            <h3 class="pull-right">Bill Id #'.$bill_id.'</h3>
                        </div>
                        <div class="invoice-title">                    
                        
                          
                            
                            <img class="img-responsive img-rounded" width="100" height="100"  onerror="this.src=\'images/noimg.png\'"  src="data:image/jpeg;base64,'.base64_encode($image).'"/>
                            
                            <h2>'.$row['organization'].'</h2>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Billed By:</strong><br>
                                    Name - '.$row['name'].'<br>
                                    email - '.$row['email'].'<br>
                                    phone No - '.$row['phone_no'].'<br>
                                    Address - '.$row['address'].'
                                </address>


                            </div>
                            <div class="col-xs-6 text-right">';
                            
                
           
                            $bill_id = $_GET["bill_id"];

                            $query2 = "SELECT time FROM billing WHERE bill_id='".$bill_id."' LIMIT 1;";
                            $result2 = mysqli_query($db,$query2);
                            $row = mysqli_fetch_array($result2);

                        if($row){

                                $time=$row['time'];
                                if (!$result2 = mysqli_query($db,$query2)) {
                                        exit(mysqli_error());
                                    }
                
                            
                                $data .= '<address>
                                    <strong>Order Date:</strong><br>
                                    '.$time.'<br><br>
                                </address>
                            </div>
                        </div>
                        <div class="row">


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Order summary</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">



                                    <table class="table table-condensed table-bordered table-striped">
                                                <thead>
                                                            <tr>
                                                                     <td><strong>No.</strong></td>
                                                <td class="text-center"><strong>Image</strong></td>
                                                <td class="text-center" ><strong>Item Name</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                                            </tr>
                                                </thead> 
                                                <tbody>';
            
            }

        } else{
            
        }

   

        $query = "SELECT * FROM billingitems INNER JOIN item ON billingitems.item_name=item.name WHERE billingitems.bill_id=".$bill_id."";

        if (!$result = mysqli_query($db,$query)) {
            exit(mysqli_error($db));
        }

        // if query results contains rows then featch those rows 
        if(mysqli_num_rows($result) > 0)
        {
            $number = 1;
            while($row = mysqli_fetch_assoc($result))
            {
                $itemImage = $row['image'];
                $data .= '<tr>
	                                                			<td>'.$number.'</td>
                                                                <td class="text-center">
                            <img class="img-responsive img-rounded" width="100" height="100"  onerror="this.src=\'images/noimg.png\'"  src="data:image/jpeg;base64,'.base64_encode($itemImage).'"/>
                            </td>
	                                                			<td class="text-center" >'.$row['item_name'].'</td>
	                                                			<td class="text-center" >'.$row['quantity'].'</td>
	                                                			<td class="text-center" >'.$row['price'].'</td>
	                                                			<td class="text-right">'.$row['total'].'</td>
                                                    		</tr>';
                $number++;
            }
        }
        else
        {
            // records now found 
            $data .= '<tr><td colspan="6">Records not found!</td></tr>';
        }

        





        $data .='<tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Grand Total</strong></td>
                                        <td class="thick-line text-right"><strong>'.$_GET['grand_total'].'</strong></td>
                                    </tr>
                                  ';
                                    
                                    $data .= '</table>;

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

        echo $data;

        ?>

        <div class="container">
            <form role="form" method="post">

                <input type="submit" name="submit" value="Go Back" class="btn btn-info btn-lg" />
               
                <button class="btn btn-success btn-lg" onclick="myFunction()">Print</button>

            </form>
        </div>


    </body>
    
    
<script>
   
    
    function myFunction() {
    window.print();
}
    </script>

</html>


