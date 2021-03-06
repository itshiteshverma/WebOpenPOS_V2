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


			<div class="row" >
				<div class="col-lg-12">
					<h2>Item</h2>
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
								<li class="active"><a href="#pilltab4" data-toggle="tab">Item Bar Graph</a></li>
								<li><a href="#pilltab1" data-toggle="tab">Item Sales Prediction</a></li>
								<li><a href="#pilltab2" data-toggle="tab">Suggestions</a></li>
							
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade in active" id="pilltab4">
									<canvas id="itemBarGraph"></canvas>
								</div>
								<div class="tab-pane fade " id="pilltab1">
									<div id="chart-container" width="100%" height="100%">
										<canvas id="itemCanvas"></canvas>
									</div>
								</div>
								<br>
								<div class="tab-pane fade" id="pilltab2">

									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-default">

												<div class="panel-body">
													<form>
														<h2>Suggestion to Buy Items :</h2><br>
														<h3>According to Available Quantity and Price</h3>
														<input type="number"  id="suggestionAccToQTYandPRICE"  name="suggestionAccToQTYandPRICE" class="form-control" required>
														<br>
														<button name="submit" value="Suggest" id="submitQTYandPRICE_Form"
																class="btn btn-success" > Suggest</button>
													</form>
													<hr>
													<br>
													<form>
														<h3>According to the Current Sales Data</h3>
														<input type="number"  id="suggestionAccToSALE"  name="suggestionAccToSALE" class="form-control" required>
														<br>
														<button name="submit" value="Suggest" id="submitSALE_Form"
																class="btn btn-success" > Suggest</button>
													</form>
												</div>
											</div>
										</div>
									</div><!--/.row-->

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

			$(document).ready(function () {
				// READ recods on page load

				$("#afterLoadingContainer").hide();

				$.ajax({
					url: "ajaxitem/analysisItemPrediction.php",
					method: "GET",
					success: function(data) {
						console.log(data);
						var itemName = [];
						var ratio_sold_initial = [];
						var ratio_left_initial = [];


						for(var i in data) {
							itemName.push(data[i].item_name);
							ratio_sold_initial.push(data[i].ratio_sold_initial);
							ratio_left_initial.push(data[i].ratio_left_initial);
						}

						var chartdata = {
							labels: itemName,
							datasets : [
								{
									type: 'line',
									label: 'Prediction %',
									fill: false,
									backgroundColor: 'rgba(30, 30, 255, 0.6)',
									borderColor: '#71B37C',
									hoverBackgroundColor: '#71B37C',
									hoverBorderColor: '#71B37C',
									yAxisID: 'y-axis-1',
									data: ratio_sold_initial,
									borderWidth: 5
								}, {
									label: "Qty Available",
									type:'bar',
									data: ratio_left_initial,
									fill: false,
									borderColor: '#EC932F',
									backgroundColor: '#EC932F',
									pointBorderColor: '#EC932F',
									pointBackgroundColor: '#EC932F',
									pointHoverBackgroundColor: '#EC932F',
									pointHoverBorderColor: '#EC932F',
									yAxisID: 'y-axis-2',
									borderWidth: 5
								} 
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

						$("#afterLoadingContainer").show();
						$("#beforeLoadingAnimation").hide();
					},
					error: function(data) {
						console.log(data);
					}
});

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




						var ctx = $("#itemBarGraph");

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

			$('#submitQTYandPRICE_Form').click(function(e){
				e.preventDefault();
				// Code goes here
				$.ajax({
					url: "ajaxitem/analysisItemSuggestion_QTYandPrice.php",
					data : {
						limit : $("#suggestionAccToQTYandPRICE").val()
						//$("#suggestionAccToQTYadnSALE").val(); // will be accessible in $_GET['data1']
					},
					type: 'post', // performing a POST request
					success: function(data) {
						console.log(data);
						var itemName = [];
						var percentage = [];


						swal({
							title: '<h3>Suggestion</h3>',
							html:
							'<strong>According to Quantity Left and Price</strong> ' +
							'<canvas id="pieChartQtyAndSale"></canvas>',
							showCloseButton: true,
							confirmButtonText:
							'<i class="fa fa-thumbs-up"></i> OK!'
						});



						for(var i in data) {
							itemName.push(data[i].name);
							percentage.push(data[i].percentage);
						}

						var dynamicColors = function() {
							var r = Math.floor(Math.random() * 255);
							var g = Math.floor(Math.random() * 255);
							var b = Math.floor(Math.random() * 255);
							return "rgb(" + r + "," + g + "," + b + ")";
						}


						var chartdata = {
							labels: itemName,
							datasets : [
								{
									label: 'Prediction %',
									fill: false,
									backgroundColor: dynamicColors(),
									hoverBackgroundColor: '#71B37C',
									hoverBorderColor: '#71B37C',
									data: percentage
								}
							],

						};




						var ctx = $("#pieChartQtyAndSale");

						var barGraph = new Chart(ctx, {
							type: 'pie',
							data: chartdata

						});

					},
					error: function(data) {
						alert("Error");
					}
				});

			});

			$('#submitSALE_Form').click(function(e){
				e.preventDefault();
				// Code goes here
				$.ajax({
					url: "ajaxitem/analysisItemSuggestion_SALE.php",
					data : {
						limit : $("#suggestionAccToSALE").val()
						//$("#suggestionAccToQTYadnSALE").val(); // will be accessible in $_GET['data1']
					},
					type: 'post', // performing a POST request
					success: function(data) {
						console.log(data);
						var itemName = [];
						var percentage = [];


						swal({
							title: '<h3>Suggestion</h3>',
							html:
							'<strong>According To Sale</strong> ' +
							'<canvas id="pieChartSale"></canvas>',
							showCloseButton: true,
							confirmButtonText:
							'<i class="fa fa-thumbs-up"></i> OK!'
						});



						for(var i in data) {
							itemName.push(data[i].item_name);
							percentage.push(data[i].sold_quantity);
						}

						var dynamicColors = function() {
							var r = Math.floor(Math.random() * 255);
							var g = Math.floor(Math.random() * 255);
							var b = Math.floor(Math.random() * 255);
							return "rgb(" + r + "," + g + "," + b + ")";
						}


						var chartdata = {
							labels: itemName,
							datasets : [
								{
									label: 'Prediction %',
									fill: false,
									backgroundColor: dynamicColors(),
									hoverBackgroundColor: '#71B37C',
									hoverBorderColor: '#71B37C',
									data: percentage
								}
							],

						};




						var ctx = $("#pieChartSale");

						var barGraph = new Chart(ctx, {
							type: 'pie',
							data: chartdata

						});

					},
					error: function(data) {
						alert("Error");
					}
				});

			});

		</script>
	</body>

</html>

