<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lumino - Panels</title>

		<?php
		include('packages.html');
		?>

	</head>

	<body>
		<?php
		include('navBar.php');
		include('sideBar.html');
		?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			


			<div class="row">
				<div class="col-lg-12">
					<h2>Billing</h2>
				</div>



				<div class="col-md-12">
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

										<div class="form-group">
											<label>Select Item :</label>
											<select class='selectpicker show-tick show-menu-arrow' id="itemName" name='itemName'  data-live-search='true' title='Choose one of the following...' required id='type' data-width="fit" data-size="10">
												<?php
												include("connection.php");
												$sql = "SELECT name,image FROM item";
												$result = $db->query($sql);

												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) {
														echo '<option data-content="<img height=\'170\' width=\'150\' class=\'img-responsive img-rounded\'  onerror=\'this.src=\'images/noimg.png\'\' src=\'data:image/jpeg;base64,'.base64_encode($row['image']).'\'> </span>  <span style=\'display:inline-block; 
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

			</div><!-- /.row -->


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
		var conf = confirm("Are you sure, do you really want to delete User?");
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


