<?php
include("db_connection.php");
if(isset($_SESSION['id'])){


    $query="SELECT * FROM user,org WHERE user.org_detail_id = org.id AND user.id='".$_SESSION['id']."'  LIMIT 1";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);

    if($row){
        if (!$result = mysqli_query($db,$query)) {
            exit(mysqli_error());
        }
        $name=$row['user_name'];
        $email=$row['email'];
        $phoneNo=$row['phone_no'];
        $address=$row['address'];
        $image=$row['logo'];
        $org= $row['org_name'];
        $access = $row['access'];
        $orgId =  $row['org_detail_id'];

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
                    <?php 
                    if($access === "manager"){
                        echo '<button class="btn btn-success">Manager</button>
						';
                    }else{
                        echo '<button class="btn btn-danger">Employee</button>
						';
                    }

                    ?> 

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo "Hitesh"; ?> <span class="caret"></span></a>
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

