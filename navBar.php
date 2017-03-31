<?php
session_start();
include("ajax/db_connection.php");


if(isset($_SESSION['id'])){

	$query="SELECT * FROM user WHERE id='".$_SESSION['id']."' LIMIT 1";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);

	if($row){
		if (!$result = mysqli_query($db,$query)) {
			exit(mysqli_error());
		}
		$name=$row['name'];
		$email=$row['email'];
		$phoneNo=$row['phone_no'];
		$address=$row['address'];
		$image=$row['image'];
		$org= $row['organization'];


	} 
}else{

	header("Location:index.php"); //relogin

}


?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>OPEN SOURCE</span>  POS</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $GLOBALS['name']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
