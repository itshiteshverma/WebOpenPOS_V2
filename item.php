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
			
			#loading {
				background: #f4f4f2 repeat scroll 0 0;
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
					<h2>Items</h2>
				</div>

				
				
				<div class="container" id="beforeLoadingAnimation">
					<div class="row">
						
						<div id="loading">
							<ul class="bokeh">
								<li></li>
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
								<li class="active"><a href="#pilltab1" data-toggle="tab">Item Bar Graph</a></li>
								<li><a href="#pilltab2" data-toggle="tab">Item Records</a></li>
								<li><a href="#pilltab3" data-toggle="tab">Add Item</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade in active" id="pilltab1">
									<div id="chart-container" width="100%" height="100%">
										<canvas id="itemCanvas"></canvas>
									</div>
								</div>
								<br>
								<div class="tab-pane fade" id="pilltab2">

									<div class="row">
										<div class="col-lg-12">
											<div class="panel panel-default">

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
														<h3>Item Records:</h3>
														<div class="col-md-12" style="height: 100% !important;
																					  overflow: scroll;">


															<div class="records_content"></div>
														</div>


													</div>

												</div>
											</div>
										</div>
									</div><!--/.row-->

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

									<!-- Modal -  Action details -->




								</div>
								<div class="tab-pane fade" id="pilltab3">
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
																	<input type="file" name="image" id="image" accept="image/png, image/jpeg, image/gif" /> <!-- rename it -->
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

			$('#action_modal').on('hidden.bs.modal', function () {
				clear();
			});

			function ActionItem(id){

				// Open modal popup


				$.post("ajaxitem/tableSingleItemPredector.php", {
					id: id,
				},
					   function (data, status) {

					swal({
						title: '<h3>Prediction</h3>',
						html:
						'<strong>Probablity of the Item '+data+' % </strong> ' +
						'<canvas id="mycanvas"></canvas>',
						showCloseButton: true,
						confirmButtonText:
						'<i class="fa fa-thumbs-up"></i> OK!'
					});


					var data = {
						labels: [
							"True",
							"False"
						],
						datasets: [
							{
								data: [data,100-data],
								backgroundColor: [
									"rgba(0, 128, 0, 0.45)",
									"rgba(255, 0, 0, 0.36)"

								],
								hoverBackgroundColor: [
									"#0ef844",
									"#f23f3f"

								]
							}]
					};



					var ctx = $("#mycanvas");

					var barGraph = new Chart(ctx, {
						type: 'doughnut',
						data: data,

					});

				}
					  );




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
				$("#afterLoadingContainer").hide();
				readRecords(); // calling function
				$.ajax({
					url: "ajaxitem/tableItemMain.php",
					method: "GET",
					success: function(data) {
						console.log(data);
						var name = [];
						var quantity = [];
						var price = [];

						Chart.defaults.scale.ticks.beginAtZero = true;
						Chart.defaults.global.title.text = "20";


						for(var i in data) {
							name.push(data[i].name);
							quantity.push(data[i].quantity);
							price.push(data[i].price);
						}

						var chartdata = {
							labels: name,
							datasets : [
								{
									label: 'Item Quantity',
									type: 'bar',
									backgroundColor: 'rgba(97, 247, 235, 0.75)',
									borderColor: 'rgba(41, 23, 23, 0.75)',
									hoverBackgroundColor: 'rgb(57, 33, 240)',
									hoverBorderColor: 'rgb(12, 21, 239)',
									fill: 'false',
									yAxisID: 'y-axis-1',
									data: quantity
								},
								{
									label: 'Item Price',
									type: 'line',
									fill: 'false',
									borderColor: 'rgba(41, 23, 23, 0.75)',
									hoverBackgroundColor: 'rgb(57, 33, 240)',
									hoverBorderColor: 'rgb(12, 21, 239)',
									yAxisID: 'y-axis-2',
									borderWidth: 5,
									data: price
								},	
							]
						};



						var options =  {
							responsive: true,
							tooltips: {
								mode: 'label'
							},
							elements: {
								line: {
									fill: false
								}
							},
							scales: {
								xAxes: [{
									display: true,
									gridLines: {
										display: false
									},
									labels: {
										show: true,
									}
								}],
								yAxes: [{
									type: "linear",
									display: true,
									position: "left",
									id: "y-axis-1",
									gridLines:{
										display: false
									},
									labels: {
										show:true,

									}
								}, {
									type: "linear",
									display: true,
									position: "right",
									id: "y-axis-2",
									gridLines:{
										display: false
									},
									labels: {
										show:true,

									}
								}]
							}
						};




						var ctx = $("#itemCanvas");

						var barGraph = new Chart(ctx, {
							type: 'bar',
							data: chartdata,
							options: options

						});
						$("#beforeLoadingAnimation").hide();
						$("#afterLoadingContainer").show();
					},
					error: function(data) {
						console.log(data);
					}
				});
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


if ((isset($_POST['submit'])) AND $_POST['submit'] == "Create") {

	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

	$query = "INSERT INTO item(`name`,`price`,`quantity`,`category`,`remark`,`image`,`initial_quantity`) VALUES('" . $_POST['item'] . "','" . $_POST['price'] . "','" . $_POST['quantity'] . "','" . $_POST['category'] . "','" . $_POST['remark'] . "','".$file."','".$_POST['quantity']."')";
	if (mysqli_query($db, $query)) {

	} else {
		$message = "Please Choose a Different Item Name";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}

?>



