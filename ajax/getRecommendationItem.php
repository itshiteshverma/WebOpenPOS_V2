<?php
// include Database connection file 
include("../db_connection.php");

// This is in the PHP file and sends a Javascript alert to the client

if(isset($_POST['itemName']) && isset($_POST['itemName']) != ""){



	$data = '<div class="container">
<div class="container" style="margin-top:50px;">
<div class="row"> ';



	$sql = "SELECT * FROM item WHERE category=(SELECT category FROM item WHERE name='".$_POST['itemName']."' LIMIT 1) AND name  != '".$_POST['itemName']."'";
	$result = $db->query($sql);
	$count = 1;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {

			$data .='    
                                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
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
                                    <button id="add_d3af2e19a4e14c3029d5698e718dd210" class="btn btn-outline btn-danger btn-sm btn-block btnAddAction btn-primary " onclick="getRItem(\''.$row['id'].'\')" type="button">
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

		echo $data;
	} else {
		echo '<div class="col-md-12">
											<div class="panel panel-blue text-center">

												<div class="panel-body">
													<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>


													<h2 class="text-muted">No Recommendation Available</h2>
												</div>
											</div>
										</div><!--/.col-->';
	}
}


?> 