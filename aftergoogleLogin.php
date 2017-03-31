

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
   
}

?>

        <!doctype html>

        <html>

        <head>
            <title>HitReminder</title>

            <meta charset="utf-8" />
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

            <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
            <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

            <link href="style.css" rel="stylesheet">






        </head>

        <body data-spy="scroll" data-target=".navbar-collapse">

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

                                            <input type="hidden" size="30" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                            <input type="hidden" size="30" value="" placeholder="" name="FNAME" class="name" id="mce-FNAME">

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
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                      
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        
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

                                <span class="input-group-addon">Phone No</span>
                                <input type="text" class="form-control" name="phoneno" placeholder="BirthDay , Bank " />

                            </div>

                            <br/>

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
            </div>


            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>

            <script>
                $(".contentContainer").css("min-height", $(window).height());


                $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                    $("#success-alert").slideUp(500);
                });
            </script>
        </body>


        </html>