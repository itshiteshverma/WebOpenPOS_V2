<?php

session_start();

if($_GET['logout']==1 AND $_SESSION['id']){
    session_destroy();
    
    $message = "You Have Been Logged Out ";
}

include("connection.php");

if((isset($_POST['submit'])) AND $_POST['submit']=="Sign Up" ){
    
    $error = "";
    
    if(!$_POST['email']) { 
        $error .= "Please Enter your Email";
    }
    else if (!(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))){
        $error .= "<br/>Please Enter a vlid email Addrress";
    }
    
    if(!$_POST['name']) { 
        $error .= "Please Enter your Name";
    }
   
    
    
     if(!$_POST['password']) { 
        $error .= "<br/>Please Enter your Password ";
    }else{
         
         if(strlen($_POST['password']) <4){
             $error .= "<br/>Please Enter a long password";
         }
         
     }
    
    if(!($error=="")){
         $error= "There were error(s) : ".$error;}
   
    else{ //Real Logic
            
        
        
        $query="SELECT * FROM `users` WHERE email='".$_POST['email']."'";
        
        $result=mysqli_query($db,$query);
        
        $results = mysqli_num_rows($result);
        
        if($results) {
            $error = "That email address is already Registered";} //1
        else{
          $query = "INSERT INTO `users` (`email`,`password`,`name`) VALUES('".$_POST['email']."','".md5(md5($_POST['email']).$_POST['password'])."','".$_POST['name']."')";  
            mysqli_query($db,$query);
            echo "You have been signed Up";
            
            $_SESSION['id'] = mysqli_insert_id($db);
            
            
            //Redirest to logged in page
            
            header("Location:mainpage.php");
        }
    }
}
   
if((isset($_POST['submit'])) AND $_POST['submit']=="Log In"){
    
    $query = "SELECT * FROM users WHERE email='".$_POST[loginemail]."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1 ;";
    
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