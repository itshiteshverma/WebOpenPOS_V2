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



        <!--

this is for the animated gradiant
-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <!-- Scrolling Nav JavaScript -->
        <script src="./bootstrap/js/jquery.easing.min.js"></script>
        <script src="./bootstrap/js/scrolling-nav.js"></script>
        <link href="./bootstrap/css/scrolling-nav.css" rel="stylesheet">


    </head>

</html>

<!-- Custom JS file -->

<body>

 <div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>

    

</body>


<script>
//    var ctx = $("#chart");
//
//    //    Chart.defaults.global.animation.onComplete = () => {
//    //        alert("Chart Loaded");
//    //    }
//
//    //    Chart.defaults.global.scales.yAxes.ticks.beginAtZero = true;
//
//    console.log(Chart.defaults);
//
//    var myChart = new Chart(ctx, {
//        type: 'line',
//        data: {
//            labels: ["January", "February", "March", "April", "May", "June", "July"],
//            datasets: [
//                {
//                    label: "My First dataset",
//                    fill: false,
//                    lineTension: 0.1,
//                    backgroundColor: "rgba(75,192,192,0.4)",
//                    borderColor: "rgba(75,192,192,1)",
//                    borderCapStyle: 'butt',
//                    borderDash: [],
//                    borderDashOffset: 0.0,
//                    borderJoinStyle: 'miter',
//                    pointBorderColor: "rgba(75,192,192,1)",
//                    pointBackgroundColor: "#fff",
//                    pointBorderWidth: 1,
//                    pointHoverRadius: 5,
//                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
//                    pointHoverBorderColor: "rgba(220,220,220,1)",
//                    pointHoverBorderWidth: 2,
//                    pointRadius: 1,
//                    pointHitRadius: 10,
//                    data: [65, 59, 80, 81, 56, 55, 40],
//                    spanGaps: false,
//                }, {
//                    label: "My Second dataset",
//                    fill: true,
//                    lineTension: 0.3,
//                    backgroundColor: "rgba(75,192,192,0.4)",
//                    borderColor: "rgba(75,192,192,1)",
//                    borderCapStyle: 'butt',
//                    borderDash: [],
//                    borderDashOffset: 0.0,
//                    borderJoinStyle: 'miter',
//                    pointBorderColor: "rgba(75,192,192,1)",
//                    pointBackgroundColor: "#fff",
//                    pointBorderWidth: 1,
//                    pointHoverRadius: 5,
//                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
//                    pointHoverBorderColor: "rgba(220,220,220,1)",
//                    pointHoverBorderWidth: 2,
//                    pointRadius: 1,
//                    pointHitRadius: 10,
//                    data: [6, 77, 20, 61, 26, 95, 20],
//                    spanGaps: false,
//                }
//            ]},
//        options: {
//            scales: {
//                yAxes: [{
//                    ticks: {
//                        beginAtZero:true
//                    }
//                }]
//            }
//        }
//    });

  $(document).ready(function(){
	$.ajax({
		url: "testChartData.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];

			Chart.defaults.scale.ticks.beginAtZero = true;
			Chart.defaults.global.title.text = "20";
			
			
			for(var i in data) {
				player.push("Player " + data[i].name);
				score.push(data[i].quantity);
			}

			var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'Player Score',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};
			
		

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'horizontalBar',
				data: chartdata,
			
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
  });


</script>

