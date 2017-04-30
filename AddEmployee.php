<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lumino - Tables</title>

        <?php
        include('packages_css.html');
        ?>


        <style>
            .container{
                margin-top:20px;
            }
            .image-preview-input {
                position: relative;
                overflow: hidden;
                margin: 0px;    
                color: #333;
                background-color: #fff;
                border-color: #ccc;    
            }
            .image-preview-input input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }
            .image-preview-input-title {
                margin-left:2px;
            }
            #chartdiv {
                width: 500px;
                height: 500px;
                margin: 0 auto;
                float: top;
            }


            /*            this is for the loading*/
            #loading {
                background: #f4f4f2 url("img/page-bg.png") repeat scroll 0 0;
                height: 100%;
                left: 0;
                margin: auto;
                position: fixed;
                top: 0;
                width: 100%;
            }
            .bokeh {
                border: 0.01em solid rgba(150, 150, 150, 0.1);
                border-radius: 50%;
                font-size: 100px;
                height: 1em;
                list-style: outside none none;
                margin: 0 auto;
                position: relative;
                top: 35%;
                width: 1em;
                z-index: 2147483647;
            }
            .bokeh li {
                border-radius: 50%;
                height: 0.2em;
                position: absolute;
                width: 0.2em;
            }
            .bokeh li:nth-child(1) {
                animation: 1.13s linear 0s normal none infinite running rota, 3.67s ease-in-out 0s alternate none infinite running opa;
                background: #00c176 none repeat scroll 0 0;
                left: 50%;
                margin: 0 0 0 -0.1em;
                top: 0;
                transform-origin: 50% 250% 0;
            }
            .bokeh li:nth-child(2) {
                animation: 1.86s linear 0s normal none infinite running rota, 4.29s ease-in-out 0s alternate none infinite running opa;
                background: #ff003c none repeat scroll 0 0;
                margin: -0.1em 0 0;
                right: 0;
                top: 50%;
                transform-origin: -150% 50% 0;
            }
            .bokeh li:nth-child(3) {
                animation: 1.45s linear 0s normal none infinite running rota, 5.12s ease-in-out 0s alternate none infinite running opa;
                background: #fabe28 none repeat scroll 0 0;
                bottom: 0;
                left: 50%;
                margin: 0 0 0 -0.1em;
                transform-origin: 50% -150% 0;
            }
            .bokeh li:nth-child(4) {
                animation: 1.72s linear 0s normal none infinite running rota, 5.25s ease-in-out 0s alternate none infinite running opa;
                background: #88c100 none repeat scroll 0 0;
                margin: -0.1em 0 0;
                top: 50%;
                transform-origin: 250% 50% 0;
            }
            @keyframes opa {
                12% {
                    opacity: 0.8;
                }
                19.5% {
                    opacity: 0.88;
                }
                37.2% {
                    opacity: 0.64;
                }
                40.5% {
                    opacity: 0.52;
                }
                52.7% {
                    opacity: 0.69;
                }
                60.2% {
                    opacity: 0.6;
                }
                66.6% {
                    opacity: 0.52;
                }
                70% {
                    opacity: 0.63;
                }
                79.9% {
                    opacity: 0.6;
                }
                84.2% {
                    opacity: 0.75;
                }
                91% {
                    opacity: 0.87;
                }
            }

            @keyframes rota {
                100% {
                    transform: rotate(360deg);
                }
            }

        </style>

    </head>

    <body>
        <?php
        include('navBar.php');
        include('sideBar.html');

        ?>


        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">



            <div class="row">
                <div class="col-lg-12">
                    <h2>Employee <h4>Only shows data of working employee</h4></h2>
                </div>

                <div class="container" id="beforeLoadingAnimation">
                    <div class="row">
                        <div id="loading">
                            <ul class="bokeh">
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-md-12" id="afterLoadingContainer">
                    <div class="panel panel-default">
                        <div class="panel-body tabs">

                            <ul class="nav nav-pills">
                                <li class="active"><a href="#pilltab1" data-toggle="tab">Employees Records</a></li>
                                <li><a href="#pilltab2" data-toggle="tab">Add Employee</a></li>

                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="pilltab1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">

                                                <div class="panel-body">

                                                    <div class="row">
                                                        <h3>Employee Records:</h3>
                                                        <div class="col-md-12" style="height: 100% !important;
                                                                                      overflow: scroll;">
                                                            <div class="records_content"></div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!--/.row-->

                                </div>
                                <br>
                                <div class="tab-pane fade" id="pilltab2">
                                    <div class="row">

                                        <div class="panel-heading">Form Elements</div>
                                        <div class="panel-body">
                                            <div class="col-md-6">
                                                <form role="form" method="post" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label>Employee Name</label>
                                                        <input class="form-control" id="EName" type="text" name="EName" placeholder="" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email Id</label>
                                                        <input type="text"  id="EEmailId" name="EEmailId" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="EPassword" id="EPassword" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Upload Image</label>
                                                        <div class="input-group image-preview">
                                                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                            <span class="input-group-btn">
                                                                <!-- image-preview-clear button -->
                                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                                </button>
                                                                <!-- image-preview-input -->
                                                                <div class="btn btn-default image-preview-input">
                                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                                    <span class="image-preview-input-title">Browse</span>
                                                                    <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/gif" /> <!-- rename it -->
                                                                </div>
                                                            </span>
                                                        </div><!-- /input-group image-preview [TO HERE]--> 
                                                    </div>

                                                    <div class="col-md-6">

                                                        <input type="submit" name="submit" value="Add Employee" id="EAdd"
                                                               class="btn btn-success"/>
                                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div><!--/.row-->

                                    </div>




                                </div>


                            </div>
                            <br>


                        </div>



                    </div><!--/.panel-->
                </div><!-- /.col-->



            </div><!-- /.row -->







        </div><!--/.main-->


        <?php
        include('packages_js.html');
        ?>



        <script>
            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            });

            $(window).on('resize', function () {
                if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            });



            // READ records
            function readRecords() {
                $.get("ajaxEmployee/readRecords.php", {}, function (data, status) {
                    $(".records_content").html(data);
                });
            }

            function DeleteEmployee(id) {
                var conf = confirm("Are you sure, do you really want to delete this User?");
                if (conf == true) {
                    $.post("ajaxEmployee/deleteUser.php", {
                        id: id
                    },
                           function (data, status) {
                        // reload Users by using readRecords();
                        readRecords();
                    }
                          );
                }
            }


            $('#action_modal').on('hidden.bs.modal', function () {
                clear();
            });


            $(document).on('click', '#close-preview', function(){ 
                $('.image-preview').popover('hide');
                // Hover befor close the preview
                $('.image-preview').hover(
                    function () {
                        $('.image-preview').popover('show');
                    }, 
                    function () {
                        $('.image-preview').popover('hide');
                    }
                );    
            });

            $(function() {
                // Create the close button
                var closebtn = $('<button/>', {
                    type:"button",
                    text: 'x',
                    id: 'close-preview',
                    style: 'font-size: initial;',
                });
                closebtn.attr("class","close pull-right");
                // Set the popover default content
                $('.image-preview').popover({
                    trigger:'manual',
                    html:true,
                    title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                    content: "There's no image",
                    placement:'bottom'
                });
                // Clear event
                $('.image-preview-clear').click(function(){
                    $('.image-preview').attr("data-content","").popover('hide');
                    $('.image-preview-filename').val("");
                    $('.image-preview-clear').hide();
                    $('.image-preview-input input:file').val("");
                    $(".image-preview-input-title").text("Browse"); 
                }); 
                // Create the preview image
                $(".image-preview-input input:file").change(function (){     
                    var img = $('<img/>', {
                        id: 'dynamic',
                        width:250,
                        height:200
                    });      
                    var file = this.files[0];
                    var reader = new FileReader();
                    // Set preview image into the popover data-content
                    reader.onload = function (e) {
                        $(".image-preview-input-title").text("Change");
                        $(".image-preview-clear").show();
                        $(".image-preview-filename").val(file.name);            
                        img.attr('src', e.target.result);
                        $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                    }        
                    reader.readAsDataURL(file);
                });  
            });


            ///Predection Chart



        </script>
    </body>

</html>

<?php

include("db_connection.php");


if (isset($_POST['submit'])) {

    $ORGID = $orgId; // form navBar.php
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    $query = "INSERT INTO user(`user_name`,`password`,`email`,`access`,`org_detail_id`,`image`) VALUES('".$_POST['EName']. "','".md5(md5($_POST['EEmailId']).$_POST['EPassword'])."','" . $_POST['EEmailId'] . "','employee','". $ORGID ."','".$file."')";
    if (mysqli_query($db, $query)) {
        $message = "User Created ";
        echo "<script type='text/javascript'>alert('$message');</script>";

    } else {
        $message = "Please Choose a Different Email Id";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }



}


?>



