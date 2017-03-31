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

		<div class="container box">
			<br/><br/>

			<label>Enter First Name</label>
			<input type="text" name="first_name" id="first_name" class="form-control"/>
			<br/>

			<label>Enter Last Name</label>
			<input type="text" name="last_name" id="last_name" class="form-control"/>
			<br/>
			<div align="centre">
				<input type="hidden" name="id" id="user_id"/>
				<button type="button" class="btn btn-warning" id="action" name="action">Add</button>
			</div>
			
			<br><br>
			<div id="result" class="table-responsive">
			
			</div>
		</div>

	</body>
	
</html>

<script>

	$(document).ready(function(){
		fetchUser();
		function fetchUser(){
			var action = "select";
			$.ajax({
				url : "select.php",
				method : "POST",
				data : {action:action},
				success:function(data){
					$('#first_name').val('');
					$('#last_name').val('');
					$('#action').text('Add');
					$('#result').html(data);
				}
			})
		}
	});
	
	$('#action').click(function(){
		var firstName = $('#first_name').val();
		var lastName = $('#last_name').val();
		var id = $('#user_id').val();
		var action = $('#action').text();
	
		if(firstName != '' && lastName != ''){
			$.ajax({
				url:"action.php",
				method :"POST",
				data : {firstName:firstName, lastName:lastName , id:id , action:action},
				success:function(data){
					alert(data);
					fetchUser();
				}
			})
			
		}else{
			alert("Enter Both the Values");
		}
	});
	
</script>