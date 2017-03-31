<?php include 'login.php';?>

    <!doctype html>

    <html>

    <head>
        <title>Secret Diary</title>

        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link href="style.css" rel="stylesheet">




    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">

        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand">Secret Diary</a>
                </div>

                <div class="collapse navbar-collapse">

                    <form class="navbar-form navbar-right" method="post">
                        
                        
                        <div class="form-group">
                            <input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php if(isset($_POST['loginemail'])){
                        echo addslashes($_POST['loginemail']);
                    }else{} ?>" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php if(isset($_POST['loginpassword'])){
                        echo addslashes($_POST['loginpassword']);
                        }else{} ?>" />
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="Log In" />
                    </form>
                </div>
            </div>
        </div>

        <div class="container contentContainer" id="topContainer">

            <div class="row">
                <div class="col-md-6 col-md-offset-3" id="topRow">
                    <h1 id="title">Secret Diary</h1>
                    <p class="lead">Your Own Private Diary</p>



                    <p>Intrested Sign Up Below</p>

                    <p class="bold">Interested Join Us</p>

                    <form method="post">
                        
                         <div class="input-group">

                            <span class="input-group-addon">User Name</span>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Name Here" value="<?php if(isset($_POST['name'])){
                        echo addslashes($_POST['name']);
                    }else{} ?>" />

                        </div>
                        <br/>
                        
                        
                        <div class="input-group">

                            <span class="input-group-addon">Email ID</span>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Here" value="<?php if(isset($_POST['email'])){
                        echo addslashes($_POST['email']);
                    }else{} ?>" />

                        </div>
                        <br/>

                        <div class="input-group">

                            <span class="input-group-addon">Password</span>
                            <input type="password" class="form-control" name="password" placeholder="Enter Your Password Here" value="<?php if(isset($_POST['password'])){
                        echo addslashes($_POST['password']);
                        }else{} ?>" />

                        </div>

                        <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg" id="paddingTopSubmitBtn" />
                    </form>
                    <br/>
                    <?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger">'.$error.'</div>';
                    }
                
                if(isset($message)){
                        echo '<div class="alert alert-success">'.$message.'</div>';
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
        </script>
    </body>


    </html>



    <!--
        <form method="post">
            <input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])){
    echo addslashes($_POST['email']);
}else{} ?>" />
            <input type="password" name="password" value="<?php if(isset($_POST['password'])){
    echo addslashes($_POST['password']);
}else{} ?>" />
            <input type="submit" name="submit" value="Sign Up" />
        </form>

        <form method="post">
            <input type="email" name="loginemail" id="email" />
            <input type="password" name="loginpassword" />
            <input type="submit" name="submit" value="Log In" />
        </form>-->