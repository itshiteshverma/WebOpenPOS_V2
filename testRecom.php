<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lumino - Tables</title>


        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/datepicker3.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-table.css" rel="stylesheet">
        <link href="bootstrap/css/styles.css" rel="stylesheet">

        <!--Icons-->
        <script src="bootstrap/js/lumino.glyphs.js"></script>

        <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

        <style>

            @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
            .col-item
            {
                border: 1px solid #E1E1E1;
                border-radius: 10px;
                background: #FFF;

                padding: 9px 2px;
                margin:5px 0;

            }
            .col-item:hover
            { 
                box-shadow: 0px 2px 5px -1px #000;
                -moz-box-shadow: 0px 2px 5px -1px #000;
                -webkit-box-shadow: 0px 2px 5px -1px #000;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 10px;   
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                -ms-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;   
                border-bottom:2px solid #52A1D5;        
            }
            .col-item .photo img
            {
                margin: 0 auto;
               
                padding: 1px;
                border-radius: 10px 10px 0 0 ;
            }

            .col-item .info
            {
                padding: 10px;
                border-radius: 0 0 5px 5px;
                margin-top: 1px;
            }

            .col-item .price
            {
                /*width: 50%;*/
                float: left;
                margin-top: 5px;
            }

            .col-item .price h5
            {
                line-height: 20px;
                margin: 0;
            }

            .price-text-color
            {
                color: #219FD1;
            }

            .col-item .info .rating
            {
                color: #777;
            }

            .col-item .rating
            {
                /*width: 50%;*/
                float: left;
                font-size: 17px;
                text-align: right;
                line-height: 52px;
                margin-bottom: 10px;
                height: 52px;
            }

            .col-item .separator
            {
                border-top: 1px solid #E1E1E1;
            }

            .clear-left
            {
                clear: left;
            }

            .col-item .separator p
            {
                line-height: 20px;
                margin-bottom: 0;
                margin-top: 10px;
                text-align: center;
            }

            .col-item .separator p i
            {
                margin-right: 5px;
            }
            .col-item .btn-add
            {
                width: 50%;
                float: left;
            }

            .col-item .btn-add
            {
                border-right: 1px solid #E1E1E1;

            }

            .col-item .btn-details
            {
                width: 50%;
                float: left;
                padding-left: 10px;
            }
            .controls
            {
                margin-top: 20px;
            }
            [data-slide="prev"]
            {
                margin-right: 10px;
            }

            /*
            Hover the image
            */
            .post-img-content
            {
                height: 160px;
                position: relative;
            }

            .center img { width: 40%; height: auto; position: absolute;
                top: -webkit-calc(50% - 20%); left: -webkit-calc(50% - 20%);
                top: -moz-calc(50% - 20%); left: -moz-calc(50% - 20%);
                top: calc(00% - 20%); left: calc(50% - 20%); }

            .absolute-aligned {
                position: relative; min-height: 150px;

            }
            .absolute-aligned img {
                width: 50%;
                min-width: 120px;
                height: auto;
                overflow: auto; margin: auto;
                position: absolute;
                top: 0; left: 0; bottom: 0; right: 0;
            }

            .post-img-content img
            {
                position: absolute;
                padding: 1px;

                height: 150px; 
                width: 10px;
                margin: 0 auto;
                border-radius: 0px 0px 0 0 ;
            }
            .post-name-text {
                min-height: 50px;
            }
            /*.post-title{
            display: table-cell;
            vertical-align: bottom;
            z-index: 2;
            position: relative;
            }
            .post-title b{
            background-color: rgba(51, 51, 51, 0.58);
            display: inline-block;
            margin-bottom: 5px;
            margin-left: 2px;
            color: #FFF;
            padding: 10px 15px;
            margin-top: 10px;
            font-size: 12px;
            }
            .post-title b:first-child{
            font-size: 14px;
            }*/
            .round-tag{
                width: 60px;
                height: 60px;
                border-radius: 50% 50% 50% 0;
                border: 4px solid #FFF;
                background: #37A12B;
                position: absolute;
                bottom: 0px;
                padding: 15px 6px;
                font-size: 17px;
                color: #FFF;
                font-weight: bold;
            }
        </style>


    </head>

    <body>

        <div class="container">
            <div class="container" style="margin-top:50px;">
                <div class="row">

          
                                
                                    	<?php
												include("connection.php");
												$sql = "SELECT * FROM item WHERE category='Option 1'";
												$result = $db->query($sql);
                                                $count = 1;
												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														echo '     
                                                        
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 ">
                                                    <div class="col-item">
                                                    <div class="post-img-content ">
                                                    <div class="absolute-aligned">
                                
                                                    <img  onerror="this.src=\'images/noimg.png\'" src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="img-responsive" />
                            
                                
                                            </div>
                                                    <span class="round-tag text-center">'.$count.'</span>
                                                    </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-12">
                                        <div class="post-name-text">
                                            <h5>'.$row['name'].'</h5>
                                        </div>
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <strong>Quantity</strong><span class="pull-right">'.$row['quantity'].'</span>
                                            </div>
                                            <div class="price col-md-12">
                                                <strong>Price</strong><span class="pull-right price-text-color">'.$row['price'].' Rs</span>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <p></p>
                                    <button id="add_d3af2e19a4e14c3029d5698e718dd210" class="btn btn-outline btn-danger btn-sm btn-block btnAddAction btn-primary " onclick="DeleteUser(\''.$row['id'].'\')" type="button">
                                        <i class="fa fa-shopping-cart fa-fw"></i>Add to The Cart</button>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                         </div>
                        ';
                                                        $count++;
													}
												} else {
													echo "No results";
												}
												$db->close();
//
											?>

                        
                        
                   
<!--

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="col-item">
                            <div class="post-img-content ">
                                <div class="absolute-aligned">
                                    <img src="http://paritet.profit.in.net/media/UA/img/01974.jpg" class="img-responsive" alt="a" />
                                </div>
                                <span class="round-tag">-10%</span>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-12">
                                        <div class="post-name-text">
                                            <h5> Sample Product Sample Product Sample Product</h5>
                                        </div>
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <strong>SCU</strong><span class="pull-right">112233</span>
                                            </div>
                                            <div class="price col-md-12">
                                                <strong>Price</strong><span class="pull-right price-text-color">19.99€</span>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <div class="separator clear-left">
                                        <p></p>
                                        <button id="add_d3af2e19a4e14c3029d5698e718dd210" class="btn btn-outline btn-danger btn-sm btn-block btnAddAction btn-primary " onclick="cartAction('add','d3af2e19a4e14c3029d5698e718dd210','000000209')" type="button">
                                            <i class="fa fa-shopping-cart fa-fw"></i>Купить</button>
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
       
-->
                </div>
            </div>
        </div>


    </body>



    <script src="bootstrap/js/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/chart.min.js"></script>
    <script src="bootstrap/js/chart-data.js"></script>
    <script src="bootstrap/js/jq"></script>

    <script src="bootstrap/js/easypiechart.js"></script>
    <script src="bootstrap/js/easypiechart-data.js"></script>
    <script src="bootstrap/js/bootstrap-datepicker.js"></script>
    <script src="bootstrap/js/bootstrap-table.js"></script>
    <script>

	function DeleteUser(id) {
	alert(id);
	}


    </script>

</html>

