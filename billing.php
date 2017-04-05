<!DOCTYPE html>
<?php
include('navBar.php');
include('sideBar.html');
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lumino - Panels</title>

		<?php
		include('packages.html');
		?>

		<script src="bootstrap/js/star-rating.min.js"></script>
		<link href="bootstrap/css/star-rating.min.css" rel="stylesheet">
		<style>
			/*		This is for the Recommendation stuff*/

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

			#itemImage{
				width: 100px;
				height: 110px;

			}

			#formGroupSelectItem{
				width: 100%;
				height: 150px;
			}
			.scrollit { 
				height:700px; overflow-y:scroll; 
			}
			.scrollit2 { 
				height:700px; overflow-y:scroll; 
			}

			#input-21b{
				width: 0px
			}
		</style>

	</head>

	<body>


		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			


			<div class="row">
				<div class="col-lg-12">
					<h2>Billing</h2>
				</div>



				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body tabs">

							<ul class="nav nav-pills">
								<li class="active"><a href="#pilltab1" data-toggle="tab">Billing</a></li>
								<li><a href="#pilltab2" data-toggle="tab">Tab 2</a></li>
								<li><a href="#pilltab3" data-toggle="tab">Tab 3</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade in active" id="pilltab1">
									<h4>Billing</h4>
									<form method="post">

										<div class="form-group">
											<label>Bill No</label>
											<input name='billNo' id="billNo" class="form-control" readonly type="number" value=
												   <?php

												   include("connection.php");
												   $query = "SELECT bill_id FROM billing ORDER BY bill_id DESC LIMIT 1;";
												   $result = mysqli_query($db,$query);
												   $row = mysqli_fetch_array($result);
												   if($row){
													   $BillingId=$row['bill_id'];
													   echo $BillingId;
												   }else{
													   $BillingId=0;
													   echo $BillingId;
												   }

												   ?> />
										</div>

										<div class="form-group" id="formGroupSelectItem">
											<label>Select Item :</label>
											<select class='selectpicker show-tick show-menu-arrow' id="itemName" name='itemName'  data-live-search='true' title='Choose one of the following...' required id='type' data-width="fit" data-size="6">
												<?php
												include("connection.php");
												$sql = "SELECT name,image FROM item";
												$result = $db->query($sql);

												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														echo '<option data-content="<img id=\'itemImage\' height=\'130\' width=\'150\' class=\'img-responsive img-rounded\'  onerror=\'this.src=\'images/noimg.png\'\' 
														src=\'data:image/jpeg;base64,'.base64_encode($row['image']).'\'> </span>  <span style=\'display:inline-block; 
														width:100px;\'>'.$row['name'].'</span>">'.$row['name'].'</option>';


													}
												} else {
													echo "No results";
												}
												$db->close();
												//
												//<option data-content="<img src='https://10.6.6.39/online_cos-portlet/images/icon/money_rmb.png'></span>  <span style='display:inline-block; width:100px;'>  人仔</span>">3</option>
												//

												?>
											</select>

										</div>

										<div class="form-group">
											<label>Quantity</label>
											<input type="number" id="quantity" name="quantity" class="form-control" required />
										</div>


										<!--
<div class="form-group">
<label>Remark</label>
<textarea class="form-control" name="remark" rows="2"></textarea>
</div>
-->	
										<br>
										<div>
											<label>Available Quantity: </label>
											<input type="number" id="availQty"  class="form-control" readonly/>
										</div>
										<br>

										<div class="col-md-6">

											<!--											<input type="submit" name="submit" value="Create" class="btn btn-success" />-->
											<button type="button" class="btn btn-success" onclick="addRecord()">Add Record</button>
											<button type="reset" class="btn btn-default">Reset Button</button>

											<!--											<input type="submit" name="submit" value="Create" onclick="addRecord()" class="btn btn-success" />-->
										</div>

									</form>


									<div class="row">
										<div class="col-md-12">
											<h3>Records:</h3>

											<div class="records_content"></div>
										</div>


									</div>
									<br><br>

									<div class="form-group">
										<label>Remark</label>
										<textarea class="form-control" id="remark" name="remark" rows="2"></textarea>
									</div>
									<button type="button" class="btn btn-success" onclick="printBill()">Print New Bill</button>
									<br><br>


								</div>
								<br>
								<div class="tab-pane fade" id="pilltab2">

								</div>
								<div class="tab-pane fade" id="pilltab3">

								</div>
							</div>
							<br>


						</div>



					</div><!--/.panel-->
				</div><!-- /.col-->

				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body tabs">

							<ul class="nav nav-pills">
								<li class="active"><a href="#pilltab01" data-toggle="tab">Recommended</a></li>
								<li><a href="#pilltab02" data-toggle="tab">Trending</a></li>
								<li><a href="#pilltab03" data-toggle="tab">Tab 3</a></li>
							</ul>

							<div class="tab-content">
								<div class="scrollit tab-pane fade in active" id="pilltab01">

									<div class="recommendedItem">
										<div class="col-md-12">
											<div class="panel panel-blue text-center">

												<div class="panel-body">
													<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>

													<h2 class="text-muted">Please Select an Item </h2>
												</div>
											</div>
										</div><!--/.col-->
									</div>
								</div>
								<br>
								<div class=" scrollit2 tab-pane fade" id="pilltab02">			

									<div class="container">
										<div class="container" style="margin-top:50px;">
											<div class="row">



												<?php
												include("connection.php");
												//												$sql = "SELECT * FROM item ";

												$sql = "SELECT item_name, 
														SUM(billingitems.quantity) AS sold_quantity,
														initial_quantity,
														item.id,
														item.image,
														item.name,
														item.quantity,
														item.price,
														item.quantity as `left_quantity`,
														round((SUM(billingitems.quantity)/initial_quantity)*100) as `ratio_sold_initial`,
														round((SUM(item.quantity)/initial_quantity)*100) as `ratio_left_initial` 
														FROM billingitems,item WHERE billingitems.item_name = item.name
														GROUP BY item_name  ORDER BY ratio_sold_initial DESC";
												$result = $db->query($sql);
												$count = 1;

												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														echo '     

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


											 <input  id="input-21b" value='.$row['ratio_sold_initial'].' type="text" class="rating" data-min=0 data-max=100 data-step=20 data-size="xs"
               								required title="" readOnly="true"  >
											<div class="clearfix"></div>

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
												} else {
													echo "No results";
												}
												$db->close();
												//
												?>



											</div>

										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="pilltab03">

								</div>
							</div>
							<br>


						</div>



					</div><!--/.panel-->
				</div><!-- /.col-->

			</div><!-- /.row -->

			<!-- Modal -->

			<div class="container">

				<!-- Trigger the modal with a button -->
				<button type="button" style="display: none;" id="mybtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Open Modal</button>

				<!-- Modal - Update User details -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Add Item</h4>
							</div>
							<div class="modal-body">


								<h2 class="text-center"><strong><label id="modal_item_label"></label></strong></h2>

								<div class="form-group">
									<label for="update_price">Price</label>
									<input type="number" step='0.01' readonly id="update_price" placeholder="Price" class="form-control"/>
								</div>

								<div class="form-group">
									<label for="update_quantity">Available Quantity</label>
									<input type="number" id="update_quantity" readonly placeholder="Quantity" class="form-control"/>
								</div>

								<div class="form-group">
									<label for="new_quantity"> Quantity</label>
									<input type="number" id="new_quantity"  placeholder="Required Quantity" class="form-control"/>
								</div>



							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-primary" onclick="AddItemRecommendation()" data-dismiss="modal" >Add Item</button>
								<input type="hidden" id="hidden_item_id">
							</div>
						</div>
					</div>
				</div>
				<!-- // Modal -->

				<!-- Modal -  Action details -->

			</div>


		</div><!--/.main-->




		<script>
			!function ($) {
				$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
					$(this).find('em:first').toggleClass("glyphicon-minus");	  
				}); 
				$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
			}(window.jQuery);

			$(window).on('resize', function () {
				if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
			})
			$(window).on('resize', function () {
				if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
			})
		</script>	
	</body>

</html>

<!-- Custom JS file -->



<script>



	function AddItemRecommendation() {
		// get values

		var quantity = $("#new_quantity").val();

		// get hidden field value
		var itemName = $("#hidden_item_id").val();

		var billNo = $("#billNo").val();


		// Add record
		$.post("ajax/addRecord.php", {
			billNo: billNo,
			itemName: itemName,
			quantity: quantity
		}, function (data, status) {
			// close the popup
			// $("#add_new_record_modal").modal("hide");

			// read records again

			readRecords();
			$("#new_quantity").val("");
		});

		$("#myModal").modal("hide");
	}



	function getRItem(id){



		$.post("ajax/recommendItemHandler.php", {
			id: id
		},
			   function (data, status) {
			// PARSE json data
			var item = JSON.parse(data);
			// Assing existing values to the modal popup fields

			$("#update_price").val(item.price);
			$("#update_quantity").val(item.quantity);
			$("#modal_item_label").text(item.name);
			$("#hidden_item_id").val(item.name);

		}
			  );
		// Open modal popup


		$("#mybtn").click();


	}




	function addRecord() {

		var billNo = $("#billNo").val();
		var itemName = $("#itemName").val();
		var quantity = $("#quantity").val();

		// Add record
		$.post("ajax/addRecord.php", {
			billNo: billNo,
			itemName: itemName,
			quantity: quantity
		}, function (data, status) {
			// close the popup
			// $("#add_new_record_modal").modal("hide");

			// read records again
			readRecords();

			// clear fields from the popup

			$("#itemName").val("");
			$("#quantity").val("");
			$("#availQty").val("");
		});


	}

	function readRecords() {
		var billNo = $("#billNo").val();
		$.post("ajax/readRecords.php", {billNo:billNo}, function (data, status) {
			$(".records_content").html(data);

		});
	}

	function DeleteUser(id) {
		var conf = confirm("Are you sure, do you really want to delete the Item?");
		if (conf == true) {
			$.post("ajax/deleteUser.php", {
				id: id
			},
				   function (data, status) {
				// reload Users by using readRecords();

				readRecords();
			}
				  );
		}
	}

	function printBill(){
		var billNo = $("#billNo").val();
		var remark = $("#remark").val();
		var grand_total = $("#grand_total").val();
		window.location.href = "ajax/printBill.php?bill_id="+billNo+"&remark="+remark+"&grand_total="+grand_total;

	}

	$(document).ready(function () {
		// READ recods on page load
		readRecords(); // calling function
	});

	$(function() {

		$('.selectpicker').on('change', function(){
			var itemName = $(this).find("option:selected").val();


			$.post("ajax/checkAvailableQty.php", {
				itemName: itemName
			},
				   function (data, status) {
				// reload Users by using readRecords();

				$("#availQty").val(data);

			}
				  );

			$.post("ajax/getRecommendationItem.php", {
				itemName: itemName
			},
				   function (data, status) {
				// reload Users by using readRecords();

				$(".recommendedItem").html(data);
			}
				  );

		});

	});

	var inputBox = document.getElementById('quantity');

	inputBox.onkeyup = function(){
		var availQty = Number($("#availQty").val());
		var inputQty = Number(inputBox.value);


		if( availQty >= inputQty){

		}else{
			swal(
				'Try Again',
				'Please Enter Quantity Less Than or Equal to Available',
				'error'
			)
			$("#quantity").val("");
		}
	}

</script>


