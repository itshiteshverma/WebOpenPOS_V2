<?php
session_start();
include("connection.php");
if(isset($_GET['logout'])==1 AND isset($_SESSION['id'])){
    session_destroy();

    $message = "You Have Been Logged Out ";
}


if((isset($_POST['submit'])) AND $_POST['submit']=="Sign Up" ){


    $error = "";
    if(strlen($_POST['password']) <4){
        $error .= "Please Enter a long password";
    }


    if(!($error=="")){
        $error= "There were error(s) : ".$error;
    }



    else{ //Real Logic


        include("ajax/db_connection.php");


        $query2="SELECT * FROM `user` WHERE email='".$_POST['email']."'";
        $result2 = mysqli_query($db,$query2);
        $row = mysqli_fetch_array($result2);

        if($row){
            $error = "That email address is already Registered";
            //1
            if (!$result2 = mysqli_query($db,$query2)) {
                exit(mysqli_error());
            }

        } else{

            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

            //            $query = "INSERT INTO user(`name`,`password`,`email`,`phone_no`,`address`,`image`,`organization`) VALUES('".$_POST['name']."','".md5(md5($_POST['email']).$_POST['password'])."','".$_POST['email']."','".$_POST['phoneNo']."','".$_POST['address']."','".$file."','".$_POST['org']."')"; 

            $query="CALL insertUsers('".$_POST['name']."','".md5(md5($_POST['email']).$_POST['password'])."','".$_POST['org']."','".$_POST['address']."','".$_POST['email']."','".$_POST['phoneNo']."','".$file."','manager',@UserID)";

            if (mysqli_query($db, $query)) {

                $select = mysqli_query($db, 'SELECT @UserID');
                $result = mysqli_fetch_assoc($select);
                $_SESSION['id'] = $result['@UserID'];
                header("Location:mainpage.php");
            } else {

            }


        }






    }
}

if((isset($_POST['submit'])) AND $_POST['submit']=="Log In"){

    $query = "SELECT * FROM `user` WHERE email='".$_POST['loginemail']."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' AND access='".$_POST['access']."' LIMIT 1 ;";

    $result = mysqli_query($db,$query);

    $row = mysqli_fetch_array($result);

    if($row){

        $_SESSION['id']=$row['id'];

        header("Location:mainpage.php");
        //re-direct to logged in page
    }else{
        $error = "We could not find You !!!!";
       
    }

}


?>