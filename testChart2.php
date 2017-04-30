<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Open POS</title>
		<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="https://www.amcharts.com/lib/3/gauge.js"></script>
		<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
		<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

		<style>

			#chartdiv {
				width: 600px;
				height: 500px;
				margin: 0 auto;
			}

		</style>
	</head>



	<!-- Custom JS file -->

	<body>

		<div id="chartdiv"></div> 



	</body>


	<script>


		var chart = AmCharts.makeChart("chartdiv", {
			"theme": "light",
			"type": "gauge",
			"axes": [{
				// inner circle
				"id": "axis1",
				"labelsEnabled": false,
				"axisColor": "#808080",
				"axisAlpha": 1,
				"tickAlpha": 0,
				"radius": "20%",
				"startAngle": 0,
				"endAngle": 360,
				"topTextFontSize": 20,
				"topTextYOffset": 140,
				
			}, {
				// red ticks
				"id": "axis2",
				"endAngle": 0,
				"endValue": 400,
				"radius": "100%",
				"axisAlpha": 0,
				"axisThickness": 0,
				"valueInterval": 1,
				"minorTickInterval": 4,
				"tickColor": "#ff0000",
				"tickLength": 40,
				"labelsEnabled": true,
				"labelFrequency": 100,
				"labelFunction": createLabel,
				// text inside center circle
				"topTextFontSize": 20,
				"topTextYOffset": 130,
				"topTextColor": "#808080",
			}, {
				// green ticks
				"id": "axis2",
				"startAngle": 0,
				"startValue": 400,
				"endValue": 1000,
				"radius": "100%",
				"valueInterval": 4,
				"minorTickInterval": 4,
				"axisAlpha": 0,
				"axisThickness": 0,
				"tickColor": "#006600",
				"tickLength": 40,
				"labelsEnabled": true,
				"labelFrequency": 25,
				"labelFunction": createLabel,
			}],
			"arrows": [{
				"axis": "axis2",
				"color": "#808080",
				"innerRadius": "20%",
				"nailRadius": 10,
				"radius": "70%"
			}],
			"export": {
				"enabled": true
			}
		});

		setInterval(randomValue, 1000);

		// set random value
		function randomValue() {
			var value = Math.round(Math.random() * 500);
			chart.arrows[0].setValue(200);
			chart.axes[1].setTopText(200/ 100);
		}

		function createLabel(value) {
			return value / 100.0
		}

	</script>
</html>
