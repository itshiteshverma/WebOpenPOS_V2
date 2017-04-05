<?php include 'login.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Open POS</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



        <!--        this is for swrl-->
        <script src="jquery/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/sweetalert.css">


        <!--

this is for the animated gradiant
-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <!-- Scrolling Nav JavaScript -->
        <script src="./bootstrap/js/jquery.easing.min.js"></script>
        <script src="./bootstrap/js/scrolling-nav.js"></script>
        <link href="./bootstrap/css/scrolling-nav.css" rel="stylesheet">

        <style>
            body{
                padding: 50px 0;

                background: #30E8BF; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #30E8BF , #FF8235); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #30E8BF , #FF8235); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }
            .no-padding{
                padding: 0;
            }
            .form-wrapper{
                max-width: 767px;
                background: #57a1eb;
                margin: 0 auto;
                position: relative;
                overflow: hidden;
                padding: 50px 0;
            }
            .form-wrapper:after{
                content: '';
                display: block;
                position: absolute;
                width: 200%;
                height: 75%;
                left: -7%;
                bottom: 0;
                z-index: 1;
                background: #f0f0f0;
                transform:rotate(-30deg);
            }
            @media(max-width: 767px){
                .form-wrapper:after{
                    height: 40%;
                    left: -7%;
                }
            }
            @media(max-width: 540px){
                .form-wrapper:after{
                    height: 25%;
                }
            }
            @media(max-width: 340px){
                .form-wrapper:after{
                    height: 20%;
                }
            }
            .form-wrapper .my-form{
                width: 80%;
                overflow: auto;
                margin: 0 auto;
                background: #3175f5;
                position: relative;
                z-index: 9;
                box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
            }
            .my-form .info{
                padding: 15px;
                height: 100%;
            }
            .my-form .info .carousel-caption{
                margin: 0;
                padding: 0;
                bottom: 50px;
                right: 0;
                left: 0;
            }
            .my-form .carousel-indicators .active{
                background: rgba(0, 0, 0, 0.5);
                border-color: rgba(0, 0, 0, 0.5)
            }
            .my-form .item{
                padding: 60px 0;
                min-height: 300px;
            }
            .my-form .form-bg{
                background: #fff;
            }
            .main-form .nav > li{
                width: 50%;
            }
            .main-form .nav-tabs > li > a{
                border-radius: 0;
                display: inline-block;
                width: 100%;
                text-align: center;
                outline: 0;
                text-transform: uppercase;
                color: #2207f2;
                font-weight: 600;
                font-size: 13px;
            }
            .main-form .nav-tabs > li > a:hover{
                color: #000aff;
            }
            .main-form .form-control{
                margin-top: 15px;
                height: 50px;
                border-radius: 0;
                box-shadow: none;
                border:1px solid #f0f0f0;
            }
            .main-form .form-control:focus{
                border-color: #2f37f4;
            }
            .main-form .checkbox{
                margin-left: 20px;
                color: #999;
            }
            .main-form .checkbox a{
                color: #2f37f4;
            }
            .main-form .btn-submit{
                display: block;
                background: #2f37f4;
                color: #fff;
                border-radius: 0;
                width: 100%;
                text-transform: uppercase;
                margin-top: 15px;
                padding: 12px;
            }
            .main-form .tab-content{
                padding: 60px 0;
            }

            #title{
                color: aliceblue;
            }


            #radioBtn .notActive{
                color: #3276b1;
                background-color: #fff;
            }
        </style>


    </head>

</html>

<!-- Custom JS file -->

<body>

    <div class="container">


        <div class="row">

            <div class="col-sm-12">

                <div class="form-wrapper">

                    <div class="my-form">
                        <h1 class="text-center" id="title">Open Source POS </h1>
                        <div class="col-sm-6 no-padding">

                            <div class="info">
                                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                                        <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                                        <li data-target="#carousel-id" data-slide-to="3" class=""></li>
                                    </ol>
                                    <div class="carousel-inner ">
                                        <div class="item active">
                                            <img width="120" height="120" src="images/login1.png" class="img-responsive center-block" alt="">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <p>Easy,Simple,Fast </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <img width="120" height="120" src="images/login2.png" class="img-responsive center-block" alt="">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <p>Open Source License</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <img width="120" height="120" src="images/login3.png"  class="img-responsive center-block" alt="">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <p>Light and Fast</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="item ">
                                            <img width="120" height="120" src="images/login4.png"  class="img-responsive center-block" alt="">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <p>Platform Independent</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-bg">
                            <div class="main-form">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Signup</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="login">
                                            <form action="" method="post" accept-charset="utf-8">
                                                <input class="form-control" type="email" name="loginemail" value="" placeholder="Email Address">
                                                <input class="form-control" type="password" name="loginpassword" value="" placeholder="Password">

                                                <br>
                                                <div class="col-sm-12 ">
                                                    <div class="input-group">
                                                        <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-primary btn-sm notActive " data-toggle="happy" data-title="manager">MANAGER</a>
                                                            <a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="employee">EMPLOYEE</a>
                                                        </div>
                                                        <input type="hidden" name="access" id="happy">
                                                    </div>
                                                </div>

                                                <br><br>

                                                <input class="btn btn-submit" type="submit" name="submit" value="Log In" >
                                            </form>
                                        </div>


                                        <div role="tabpanel" class="tab-pane" id="signup">
                                            <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                                <input class="form-control" type="text" name="name" value="" placeholder="Full Name">
                                                <input class="form-control" type="text" name="org" value="" placeholder="Name of Your Organisation ">
                                                <input class="form-control" type="email" name="email" value="" placeholder="Email Address">
                                                <input class="form-control" type="number" name="phoneNo" value="" placeholder="Phone Number">
                                                <input class="form-control" type="password" name="password" value="" placeholder="Password">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="address" placeholder="Address" rows="5" id="comment"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Upload Your Brand/Org Logo</label>
                                                    <input type="file" name="image" id="image">
                                                    <p class="help-block">Upload a .jgp/.jpge/.png/.gif img here.</p>
                                                </div>

                                                <input class="btn btn-submit" type="submit" name="submit" id="submit" value="Sign Up">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>


<script>
    $('input,textarea').focus(function(){
        $(this).data('placeholder',$(this).attr('placeholder'))
        $(this).attr('placeholder','');
    });
    $('input,textarea').blur(function(){
        $(this).attr('placeholder',$(this).data('placeholder'));
    });

    $(document).ready(function(){
        $('#submit').click(function(){
            var image_name = $('#image').val();
            if(image_name == ""){
                alert("Please Select an Image");
                return false;
            }else{
                var extension = $('#image').val().split('.').pop().toLocaleLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) ==-1){
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
            }
        });
    });

    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })
</script>



<?php
if(isset($error)){

    echo '<script>
           sweetAlert("Error","'.$error.'", "error");
           </script>';

}


if(isset($message)){

    echo '
                        <script>
                            swal({
                            title: "Done",
                            text: "'.$message.'",
                            timer: 1400,
                            showConfirmButton: false
                            });
                            </script>';
}

?>

