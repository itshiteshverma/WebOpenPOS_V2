<?php
  session_start();
    include("connection.php");


if(isset($_SESSION['id'])){

     $query="SELECT name,email FROM user WHERE id='".$_SESSION['id']."' LIMIT 1";

    $result =  mysqli_query($db,$query);

    $row = mysqli_fetch_array($result);

    $name = $row['name'];

    $email = $row['email'];

    
    ///chek if the reminder has been set or not 
   
}
    
else{
    header("Location:index.php"); //relogin
}




?>

    <!doctype html>

    <html>



    <head>
        <title>Hit Reminder</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
        <link rel="stylesheet" href="./bootstrap/css/bootstrap-material-datetimepicker.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="./bootstrap/js/bootstrap-material-datetimepicker.js"></script>



        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>


        <!-- Scrolling Nav JavaScript -->
        <script src="./bootstrap/js/jquery.easing.min.js"></script>
        <script src="./bootstrap/js/scrolling-nav.js"></script>

        Custom CSS
        <link href="./bootstrap/css/scrolling-nav.css" rel="stylesheet">

        <!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->


        <!--        this is for swrl-->
        
        <script src="jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/sweetalert.css">


<!--
        <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.css">
-->
        <!--
        
        this is for dropdown list
-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>


        <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>


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
            
            #brandLogo {
                width: 250px;
                height: 45px;
            }
            
            .float-left {
                float: left;
                padding: 5px;
            }
            
            .float-right {
                float: right;
            }
            
            #topRow {
                padding-top: 80px;
                text-align: center;
            }
            
            #footer {
                background-color: bisque;
                margin-top: 200px;
            }
            
            #containerReminder {
                padding-top: 70px;
            }
            /********************************************************************/
            /*** PANEL INFO ***/
            
            .with-nav-tabs.panel-info .nav-tabs > li > a,
            .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
            .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
                color: #31708f;
            }
            
            .with-nav-tabs.panel-info .nav-tabs > .open > a,
            .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
            .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
            .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
            .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
                color: #31708f;
                background-color: #bce8f1;
                border-color: transparent;
            }
            
            .with-nav-tabs.panel-info .nav-tabs > li.active > a,
            .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
            .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
                color: #31708f;
                background-color: #fff;
                border-color: #bce8f1;
                border-bottom-color: transparent;
            }
            
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
                background-color: #d9edf7;
                border-color: #bce8f1;
            }
            
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
                color: #31708f;
            }
            
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
                background-color: #bce8f1;
            }
            
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
            .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
                color: #fff;
                background-color: #31708f;
            }
            
            #paddingTopSubmitBtn {
                width: 80%;
            }
            /*///////////////////////////////////////////////////////////// for the caption table*/
            
            .col-xs-5ths,
            .col-sm-5ths,
            .col-md-5ths,
            .col-lg-5ths {
                position: relative;
                min-height: 1px;
                padding-right: 10px;
                padding-left: 7px;
                margin-top: 17px;
                margin-bottom: 3px;
            }
            
            .col-xs-5ths {
                width: 20%;
                float: left;
            }
            
            @media (min-width: 768px) {
                .col-sm-5ths {
                    width: 20%;
                    float: left;
                }
            }
            
            @media (min-width: 992px) {
                .col-md-5ths {
                    width: 20%;
                    float: left;
                }
            }
            
            @media (min-width: 1200px) {
                .col-lg-5ths {
                    width: 20%;
                    float: left;
                }
            }
            
            #topContainer {
                background: #FF4E50;
                /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #FF4E50, #F9D423);
                /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #FF4E50, #F9D423);
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            
            #containerReminder {
                background: rgba(226, 226, 226, 1);
                background: -moz-linear-gradient(45deg, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 0.95) 19%, rgba(209, 209, 209, 0.79) 80%, rgba(254, 254, 254, 0.74) 100%);
                background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(226, 226, 226, 1)), color-stop(19%, rgba(219, 219, 219, 0.95)), color-stop(80%, rgba(209, 209, 209, 0.79)), color-stop(100%, rgba(254, 254, 254, 0.74)));
                background: -webkit-linear-gradient(45deg, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 0.95) 19%, rgba(209, 209, 209, 0.79) 80%, rgba(254, 254, 254, 0.74) 100%);
                background: -o-linear-gradient(45deg, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 0.95) 19%, rgba(209, 209, 209, 0.79) 80%, rgba(254, 254, 254, 0.74) 100%);
                background: -ms-linear-gradient(45deg, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 0.95) 19%, rgba(209, 209, 209, 0.79) 80%, rgba(254, 254, 254, 0.74) 100%);
                background: linear-gradient(45deg, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 0.95) 19%, rgba(209, 209, 209, 0.79) 80%, rgba(254, 254, 254, 0.74) 100%);
                filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=1);
                width: 100%;
            }
            
            .btn span.glyphicon {
                opacity: 0;
            }
            
            .btn.active span.glyphicon {
                opacity: 1;
            }
            /*
            
            this is for advance feature
*/
            
            .slidingDiv {
                height: 100%;
                width: 100%;
                background-color: #D9EDF7;
                padding-top: 20px;
                margin-top: 25px;
                border-radius: 5px;
                border-bottom: 5px solid #3399FF;
                text-align: center;
            }
            
            .show_hide {
                display: none;
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



    <body id="page-top" data-target=".navbar-fixed-top">

        <div class="container-fluid">

            <!-- Second navbar for sign in -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand page-scroll" href="#topContainer"><span class="glyphicon glyphicon-time"></span>  Hit Reminder</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-2">
                        <ul class="nav navbar-nav navbar-right">



                            <li class="hidden">
                                <a class="page-scroll" href="#topContainer"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#containerReminder"><span class="glyphicon glyphicon-option-vertical"></span> Reminders</a>
                            </li>

                            <li>
                                <form action="//000webhostapp.us15.list-manage.com/subscribe/post?u=c8df4d49f61506f7f23922ff2&amp;id=649b156591" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">

                                    <input type="hidden" size="30" value="<?php echo $email; ?>" name="EMAIL" class="required email" id="mce-EMAIL">
                                    <input type="hidden" size="30" value="<?php echo $name; ?>" placeholder="" name="FNAME" class="name" id="mce-FNAME">

                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>

                                    <div class="clear" style="margin-left:15px;">
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

                    <form method="post" id="reminderForm" >



                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="selectpicker show-tick show-menu-arrow " name="category" data-live-search="true" title="Choose one of the following..." required id="type">
                                <option data-icon="glyphicon glyphicon-gift" data-subtext="Buy Gift"> BirthDay</option>
                                <option data-icon="glyphicon glyphicon-heart">Anniversary</option>
                                <option data-icon="glyphicon glyphicon-flash">Party</option>
                                <option data-icon="glyphicon glyphicon-bullhorn">Event</option>
                                <option data-icon="glyphicon glyphicon-record">Special Day</option>


                                <option data-divider="true"></option>


                                <option data-icon="glyphicon glyphicon-education">Exam</option>
                                <option data-icon="glyphicon glyphicon-ok">Appointment</option>
                                <option data-icon="glyphicon glyphicon-usd">Banking</option>
                                <option data-icon="glyphicon glyphicon-flag">Vaccations</option>
                                <option data-icon="glyphicon glyphicon-hourglass">DeadLine</option>
                                <option data-icon="glyphicon glyphicon-cog">Work</option>
                                <option data-icon="glyphicon glyphicon-plane">Travelling Date</option>

                                <option data-divider="true"></option>

                                <option data-icon="glyphicon glyphicon-asterisk">Other</option>
                            </select>

                        </div>

                        <br>

                        <div class="input-group">

                            <span class="input-group-addon">Item</span>
                            <input type="text" class="form-control" id="item" name="item" placeholder="Enter Your Message Here" required />

                        </div>
                        
                        
                         <div class="input-group">
                            <span class="input-group-addon">Price</span>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Your Message Here" required />
                        </div>
                        
                        
                        <div class="input-group">
                            <span class="input-group-addon">Quantity</span>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Your Message Here" required />

                        </div>
                        
                        
                        
                        <br>

                        <div>
                            <input type="submit" name="submit" value="Create" class="btn btn-success btn-lg  btn-circle" id="paddingTopSubmitBtn" />
                        </div>



                    </form>




                </div>
            </div>



        </div>

     <?php
    
            session_start();
            include("connection.php");
            

            if((isset($_POST['submit'])) AND $_POST['submit']=="Create" ){
      
           $query = "INSERT INTO item(`name`,`price`,`quantity`,`category`) VALUES('".$_POST['item']."','".$_POST['price']."','".$_POST['quantity']."','".$_POST['category']."')";
            if(mysqli_query($db,$query)){
               echo "ReminderSet";
            
            }else{
                echo "ReminderNotSet";
            }

  
            }
        
    ?>






        <script type="text/javascript">
            // window.onload = function () {
            //                        if (window.jQuery) {
            //                            // jQuery is loaded   
            //                            alert("Yeah!");
            //                        } else {
            //                            // jQuery is not loaded
            //                            alert("Doesn't Work");
            //                        }
            //                    }

            //this is for the advance feature
            $(document).ready(function () {
                $(".slidingDiv").hide();
                $(".show_hide").show();

                $('.show_hide').click(function () {
                    $(".slidingDiv").slideToggle();
                });
            });




            $(document).ready(function () {


                $(".contentContainer").css("min-height", $(window).height());


            });
        </script>
    </body>

    </html>