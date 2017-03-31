<?php
    session_start();
    
    include("connection.php");

     $query="SELECT diary , name FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";

    $result =  mysqli_query($db,$query);

    $row = mysqli_fetch_array($result);

    $diary = $row['diary'];

    $name = $row['name'];

?>

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
                <div class="navbar-header pull-left">

                    <a class="navbar-brand">Secret Diary</a>

                    <ul class="navbar-nav nav">

                        <li>
                            <a href="">
                                <?php echo $name; ?>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class=" pull-right">
                    <ul class="navbar-nav nav">

                        <li><a href="index.php?logout=1">Log Out</a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="container contentContainer" id="topContainer">

            <div class="row">
                <div class="col-md-6 col-md-offset-3" id="topRow">

                    <textarea id="textArea" class="form-control"><?php 
                    echo $diary; ?></textarea>

                </div>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <script>
            $(".contentContainer").css("min-height", $(window).height());

            $("#textArea").css("height", $(window).height() - 140);

            $("#textArea").keyup(function () {

                $.post("updatediary.php", {
                    diary: $("#textArea").val()
                });

            });
        </script>
    </body>


    </html>