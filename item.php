<?php include 'itemTable.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lumino - Tables</title>

        <!--
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/datepicker3.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-table.css" rel="stylesheet">
<link href="bootstrap/css/styles.css" rel="stylesheet">

-->

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/datepicker3.css" rel="stylesheet">
        <link href="bootstrap/css/stylesMain.css" rel="stylesheet">


        <script src="bootstrap/js/lumino.glyphs.js"></script>

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

        </style>

    </head>

    <body>
        <?php
        include('navBar.php');
        include('sideBar.html');

        ?>


        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                        </a></li>
                    <li class="active">Icons</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Item</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Item Table</div>
                        <div class="panel-body">
                            <!--
<table data-toggle="table" data-url="item.json" data-show-refresh="true" data-show-toggle="true"
data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
<tr>
<th data-field="name" data-sortable="true">Item Name</th>
<th data-field="category" data-sortable="true">Category</th>
<th data-field="quantity" data-sortable="true">Quantity</th>
<th data-field="price" data-sortable="true">Price</th>
</tr>
</thead>
</table>
-->


                            <div class="row">
                                <h3>Records:</h3>
                                <div class="col-md-12" style="height: 300px !important;
                                                              overflow: scroll;">


                                    <div class="records_content"></div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div><!--/.row-->


            <div class="row">

                <div class="panel-heading">Form Elements</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Item Name</label>
                                <input class="form-control" id="itemName" type="text" name="item" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label>Price Per Item</label>
                                <input type="number" step='0.01' id="price" value='0.00' name="price" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>


<!--
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="image" id="image" id="image" >
                                <p class="help-block">Upload a .jgp/.jpge/.png/.gif img here.</p>
                            </div>
-->

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
                                            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/gif" required/> <!-- rename it -->
                                        </div>
                                    </span>
                                </div><!-- /input-group image-preview [TO HERE]--> 
                            </div>

                            <div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" name="remark" id="remark" rows="2"></textarea>
                            </div>


                            <div class="col-md-6">


                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                    </select>
                                </div>


                                <input type="submit" name="submit" value="Create" id="create"
                                       class="btn btn-success"/>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                            </div>
                        </form>
                    </div>

                </div><!--/.row-->

            </div>


            <!-- Modal - Update User details -->
            <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="update_remark">Remarks</label>
                                <input type="text" id="update_remark" placeholder="Remarks" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="update_quantity">Quantity</label>
                                <input type="number" id="update_quantity" placeholder="Quantity" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="update_price">Price</label>
                                <input type="number" step='0.01' id="update_price" placeholder="Price" class="form-control"/>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="UpdateItemDetails()" >Save Changes</button>
                            <input type="hidden" id="hidden_user_id">
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Modal -->

        </div><!--/.main-->

        <script src="bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/chart.min.js"></script>
        <script src="bootstrap/js/chart-data.js"></script>
        <script src="bootstrap/js/easypiechart.js"></script>
        <script src="bootstrap/js/easypiechart-data.js"></script>
        <script src="bootstrap/js/bootstrap-datepicker.js"></script>
        <script src="bootstrap/js/bootstrap-table.js"></script>


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
                $.get("ajaxitem/readRecords.php", {}, function (data, status) {
                    $(".records_content").html(data);
                });
            }


            function DeleteItem(id) {
                var conf = confirm("Are you sure, do you really want to delete Item?");
                if (conf == true) {
                    $.post("ajaxitem/deleteItem.php", {
                        id: id
                    },
                           function (data, status) {
                        // reload Users by using readRecords();
                        readRecords();
                    }
                          );
                }
            }

            function UpdateItem(id) {
                // Add User ID to the hidden field for furture usage
                $("#hidden_user_id").val(id);

                $.post("ajaxitem/readItemDetails.php", {
                    id: id
                },
                       function (data, status) {
                    // PARSE json data
                    var item = JSON.parse(data);
                    // Assing existing values to the modal popup fields
                    $("#update_remark").val(item.remark);
                    $("#update_price").val(item.price);
                    $("#update_quantity").val(item.quantity);

                }
                      );
                // Open modal popup
                $("#update_user_modal").modal("show");
            }

            function UpdateItemDetails() {
                // get values
                var remark = $("#update_remark").val();
                var price = $("#update_price").val();
                var quantity = $("#update_quantity").val();

                // get hidden field value
                var id = $("#hidden_user_id").val();

                // Update the details by requesting to the server using ajax
                $.post("ajaxitem/updateItemDetails.php", {
                    id: id,
                    remark: remark,
                    price: price,
                    quantity: quantity
                },
                       function (data, status) {
                    // hide modal popup
                    $("#update_user_modal").modal("hide");
                    // reload Users by using readRecords();
                    readRecords();
                }
                      );
            }

            $(document).ready(function () {
                // READ recods on page load
                readRecords(); // calling function
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

        </script>
    </body>

</html>

<?php

include("ajax/db_connection.php");


if ((isset($_POST['submit'])) AND $_POST['submit'] == "Create") {

    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    $query = "INSERT INTO item(`name`,`price`,`quantity`,`category`,`remark`,`image`) VALUES('" . $_POST['item'] . "','" . $_POST['price'] . "','" . $_POST['quantity'] . "','" . $_POST['category'] . "','" . $_POST['remark'] . "','".$file."')";
    if (mysqli_query($db, $query)) {

    } else {
        echo "Item Not Added";
    }
}

?>



