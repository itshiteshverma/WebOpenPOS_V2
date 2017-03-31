<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
	<title>How to create a custom drop down with images using jQuery UI.</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/bootstrap/js/jquery.ddslick.js"></script>
	
	<style type="text/css">
		*
		{
			font-size:12px;
			font-family:verdana;
		}
		.demo-content
		{
			background: none repeat scroll 0 0 #DADADA;
			border: 2px solid #DDDDDD;
			font-size: 12px;
			width: 900px;
			padding:20px;
			margin:0px auto;
		}
		.demo-content h3{
			padding:0px;
			margin:0px 0px 20px;
			font-size:18px;
		}
		.spacer {
			clear: both;
			height: 20px;
			width: 100%;
		}
	</style>
</head>
<body>
	<!--
		HTML CODE
	-->
	<div class="demo-content">
		<div class="demo-live">
			<h3>Generated with page load</h3>
			<select id="demo-htmlselect-basic">
				<option data-description="Description with Facebook" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/facebook-icon-32.png" value="0">Facebook</option>
				<option data-description="Description with Twitter" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/twitter-icon-32.png" value="1">Twitter</option>
				<option data-description="Description with LinkedIn" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/linkedin-icon-32.png" value="2">LinkedIn</option>
				<option data-description="Description with Foursquare" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/foursquare-icon-32.png" value="3">Foursquare</option>
			</select>
			<div class="spacer"></div>
			
			<hr />
			<br />
			<br />
			<!--
				below drop down will converted to custom drop down.
				1. data-description
					attribute display the description for option value.
				2. data-imagesrc
					attribute will add image to custom drop down.
			-->
			<h3>
				Render from HTML select options
			</h3>
			<select id="demo-htmlselect">
				<option data-description="Description with Facebook" data-imagesrc="https://www.google.co.in/images/branding/googlelogo/2x/googlelogo_color_120x44dp.png" value="0">Facebook</option>
				<option data-description="Description with Twitter" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/twitter-icon-32.png" value="1">Twitter</option>
				<option data-description="Description with LinkedIn" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/linkedin-icon-32.png" value="2">LinkedIn</option>
				<option data-description="Description with Foursquare" data-imagesrc="http://dl.dropbox.com/u/40036711/Images/foursquare-icon-32.png" value="3">Foursquare</option>
			</select>
			<div class="spacer"></div>
			<!--
				Two buttons that add and remove custom drop down.
			-->
			<button id="make-it-custom">Make it Custom!</button>
			<button id="restore">Restore to Original</button>
			<br />
			<br />
			<hr />
			<br />
			<br />
			<h3>Result</h3>
			<div id="dd-display-data"></div>
			<br />
			<br />
			<br />
			<br />
		</div>
	</div>
</body>
</html>

<script>

	/*
  jQuery Document ready
*/
$(function()
{	
	$('#demo-htmlselect-basic').ddslick(
	{
		//callback function: do anything with selectedData
		onSelected: function(data)
		{
			/*
				we are calling custom created function.
				that function will display selected option detail.
			*/
			displaySelectedData("Callback Function on Dropdown Selection" , data);
		}
	});
	
	/*
		adding click event handler
		for making drop down to custom drop down
	*/
	$('#make-it-custom').on('click', function()
	{
		/*
			on click it will generate drop down to custom drop down
		*/
		$('#demo-htmlselect').ddslick(
		{
			//callback function: do anything with selectedData
			onSelected: function(data)
			{
				/*
					we are calling custom created function.
					that function will display selected option detail.
				*/
				displaySelectedData("Callback Function on Dropdown Selection" , data);
			}
		});
	});

	//Restore Original
	$('#restore').on('click', function()
	{
		$('#demo-htmlselect').ddslick('destroy');
		$('#dd-display-data').empty();
	});
	
	/*
		callback function when selection made
		demoIndex : 
			heading for result
		ddData :
			drop down selected object
	*/
	function displaySelectedData(demoIndex, ddData)
	{
		/*
			add heading to div
		*/
		$('#dd-display-data').html("<h3>Data from Demo " + demoIndex + "</h3>");
		/*
			append selected drop down index to result.
			also added code so you can check
			in browser console for selected object
		*/
		$('#dd-display-data').append('<strong>selectedIndex:</strong> ' + ddData.selectedIndex + '<br/><strong>selectedItem:</strong> Check your browser console for selected "li" html element');
		
		/*
			check if selection made.
		*/
		if (ddData.selectedData)
		{
			/*
				appeding more data to result div.
			*/
			$('#dd-display-data').append
			(
				'<br/><strong>Value:</strong>  ' + ddData.selectedData.value +
				'<br/><strong>Description:</strong>  ' + ddData.selectedData.description +
				'<br/><strong>ImageSrc:</strong>  ' + ddData.selectedData.imageSrc
			);
		}
		/*
			browser console code
		*/
		//console.log(ddData);
	}
});
</script>