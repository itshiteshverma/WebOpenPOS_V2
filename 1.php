<?php include 'setreminder.php';?>

    <?php
    
    include("connection.php");
if(isset($_SESSION['id'])){

     $query="SELECT name,email,phoneno FROM userdetails WHERE id='".$_SESSION['id']."' LIMIT 1";

    $result =  mysqli_query($db,$query);

    $row = mysqli_fetch_array($result);

    $name = $row['name'];

    $email = $row['email'];

    $phoneno = $row['phoneno'];
}else{
    header("Location:index.php"); //relogin
}

?>

        <!doctype html>

        <html>

        <head>
            <title>Bootstrap-Material DateTimePicker</title>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
            <link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
            <link rel="stylesheet" href="./bootstrap/css/bootstrap-material-datetimepicker.css" />
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
            <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
            <script type="text/javascript" src="./bootstrap/js/bootstrap-material-datetimepicker.js"></script>
            
              <link href="style.css" rel="stylesheet">

            <style>
                body {
                    font-family: 'Roboto', sans-serif;
                }
                
                @media(max-width: 300px) {
                    .well {
                        margin: 0
                    }
                    #date-end {
                        background-color: aqua;
                    }
                }
            </style>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-60343429-1', 'auto');
                ga('send', 'pageview');
            </script>
        </head>

        <body>

            <body data-target=".navbar-collapse">

                <div class="container-fluid">

                    <!-- Second navbar for sign in -->
                    <nav class="navbar navbar-default">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">HitReminder</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-collapse-2">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>

                                        <li>
                                            <form action="//000webhostapp.us15.list-manage.com/subscribe/post?u=c8df4d49f61506f7f23922ff2&amp;id=649b156591" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">

                                                <input type="hidden" size="30" value="<?php echo $email; ?>" name="EMAIL" class="required email" id="mce-EMAIL">
                                                <input type="hidden" size="30" value="<?php echo $name; ?>" placeholder="" name="FNAME" class="name" id="mce-FNAME">

                                                <div id="mce-responses" class="clear">
                                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                                </div>

                                                <div class="clear">
                                                    <button type="submit" class="btn btn-success btn-circle" name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
                                                </div>
                                            </form>
                                        </li>
                                        <li>

                                            <button onclick="location.href='index.php?logout=1'" type="button" class="btn btn-danger btn-circle">
                                                Log Out</button>

                                        </li>

                                </ul>

                                <ul class="nav navbar-nav navbar-left">
                                    <li>
                                        <a href="">
                                            <?php echo $name; ?>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="">
                                            <?php echo $email; ?>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="">
                                            <?php echo "+91-".$phoneno; ?>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container -->
                    </nav>
                    <!-- /.navbar -->


                </div>


                <div class="container contentContainer" id="topContainer">

                    <br>


                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" id="topRow">

                            <form method="post" id="reminderForm">

                                
                                  
                                <div class="input-group">

                                    <span class="input-group-addon">Type</span>
                                    <input type="text" class="form-control" name="type" placeholder="BirthDay , Bank " />

                                </div>

                                <br/>

                                <div class="input-group">

                                    <span class="input-group-addon">Message</span>
                                    <input type="text" class="form-control" name="message" placeholder="Enter Your Message Here" />

                                </div>

                                <br/>

                                <div class="input-group">

                                    <span class="input-group-addon">Time</span>
                                    <input type="text" id="time" class="form-control" name="time">

                                </div>

                                <br>

                                <div class="input-group">

                                    <span class="input-group-addon">Start Reminding Me From</span>
                                    <input type="text" id="date-start" class="form-control" name="start_date" placeholder="Start Date">

                                </div>

                                <br>

                                <div class="input-group">

                                    <span class="input-group-addon">Remind Me To This Date</span>
                                    <input type="text" id="date-end" class="form-control" name="end_date" placeholder=" Date">

                                </div>

                                <br>

                                <input type="submit" name="submit" value="Set Reminder" class="btn btn-success btn-lg  btn-circle" id="paddingTopSubmitBtn" />

                            </form>

                            <br/>
                            <?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger">'.$error.'</div>';
                    }
                
                if(isset($message)){
                        echo '<div class="alert alert-success" id="success-alert">'.$message.'</div>';
                    }
                ?>

                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-control-wrapper">

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-control-wrapper">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-control-wrapper">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <footer>

                    <?php

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($db,"SELECT * FROM reminder WHERE u_id='".$_SESSION['id']."'");

echo "<table class = 'table'>
<thead>
<tr>
<th>Sr.no</th>
<th>Type</th>
<th>Event Date</th>
<th>Reminding After</th>
<th>Message</th>

</tr>
</thead>

<tbody>";

    $count=1;            
                
while($row = mysqli_fetch_array($result))
{
echo "<tr class = 'success'>";
    echo "<td>" . $count . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['start_date'] . "</td>";
echo "<td>" . $row['end_date'] . "</td>";
    if(strlen($row['message']) < 15){
       echo "<td>" . $row['message'] . "</td>";
    }else{
       echo "<td>" . substr($row['message'],0,15).'...' . "</td>"; 
    }

echo "</tr>";
    $count++;
}
echo "</tbody> </table>";

?>


                </footer>




                <script type="text/javascript">
                    $(document).ready(function () {


                        $(".contentContainer").css("min-height", $(window).height());


                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                            $("#success-alert").slideUp(500);
                        });

                        $('#time').bootstrapMaterialDatePicker({
                            date: false,
                            shortTime: true,
                            format: 'HH:mm'
                        });



                        $('#date-end').bootstrapMaterialDatePicker({
                            format: 'YYYY-MM-DD',
                            time: false
                        });
                        $('#date-start').bootstrapMaterialDatePicker({
                            format:'YYYY-MM-DD',
//                            'dddd DD MMMM YYYY',
                            time: false,
                            minDate: new Date()
                        }).on('change', function (e, date) {
                            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
                        });


                        $.material.init()
                    });
                </script>
            </body>

        </html>