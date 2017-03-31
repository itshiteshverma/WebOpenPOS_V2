<?php

include("connection.php");
include('SMS/way2sms-api.php');
require 'PHPMailer/PHPMailerAutoload.php'; 


$GLOBALS['RefLinkToWebSite'] = "http://www.itshiteshverma123.esy.es/";
$GLOBALS['CancelLinkTotheWebSite'] = $RefLinkToWebSite."ReminderCanceledPage.php?r_id=";

echo "Start";

$sql = "SELECT * FROM `ViewReminder` WHERE status='NOT SEND' OR  status='AYEAR' OR  status='BMONTH'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
 
    while($row = mysqli_fetch_assoc($result)) {
       
        if(isset($row['status'])){
            checkStatusFun($row ,$row['status'] );            
        }
        else{
            echo "<br/>Not the time";
        }
        
    }echo "<br/><br/>End While";
     
} 

    else {
    echo "<br/>Nothing To send results";
}

function checkStatusFun($row,$status){
            date_default_timezone_set('Asia/Kolkata');
            $time_hour= date("H");
            $day= date("d");  //01 to  31
            $date = date("m/d"); 
            
                    if( $status=="BMONTH" AND $day >= date('d', strtotime($row['start_date'])) AND $day <  date('d', strtotime($row['end_date'])) AND $time_hour == date('H', strtotime($row['time']))){
                        sendPreReminder($row,$status);
                    }
            
                    else if( $status=="BMONTH" AND $day == date('d', strtotime($row['end_date'])) AND $time_hour == date('H', strtotime($row['time']))){
                        sendFinalReminder($row,$status);
                    }
            
                    else if($date >= date('m/d', strtotime($row['start_date'])) AND $date < date('m/d', strtotime($row['end_date'])) AND $time_hour == date('H', strtotime($row['time']))){
                    sendPreReminder($row,$status);
          
                        }
                    else if($date == date('m/d', strtotime($row['end_date'])) AND $time_hour == date('H', strtotime($row['time']))){
                        sendFinalReminder($row,$status);
                    }
}

function sendPreReminder($row,$status){
                        $subject = "";
                    
                        if($status == 'AYEAR'){
                            $subject = " Yearly";
                        }
                        else  if($status == 'BMONTH'){
                            $subject = " Monthly";
                        }
            
                        $subject .= " Reminder of : ".$row['type'];            
                        
                        $SMS = (strlen($subject.$row['message']) > 139) ? substr($subject." - ".$row['message'],0,135).'...' : $subject." : ".$row['message'];
                   
                        $type = "PreReminder";
                        
                        sendMail($row['email'],$subject, $row['message'],$row['phoneno'],$type,$SMS,$row['r_id']);
                        
                                   
                        echo "<br/> Send Pre Reminder".$row['message'];
    
}

function sendFinalReminder($row,$status){
                        $subject = "";
                    
                        if($status == 'AYEAR'){
                            $subject = " Yearly";
                        }
                        else  if($status == 'BMONTH'){
                            $subject = " Monthly";
                        }
            
                        
                        $subject .= " Final Reminder : ".$row['type'];
                        
                        $SMS = (strlen($subject.$row['message']) > 139) ? substr($subject." - ".$row['message'],0,135).'...' : $subject." : ".$row['message'];
                        
                        if($status == 'NOT SEND'){
                       //chnage STATUS to SEND
                        $query = "UPDATE `reminder` SET status='GONE' WHERE r_id='".$row['r_id']."' ";
                            global $db;
                        mysqli_query($db,$query);
                        }
                        
                         $type = "FinalReminder";
                        sendMail($row['email'],$subject, $row['message'], $row['phoneno'],$type,$SMS,$row['r_id']);
                        
                        echo "<br/>Send Final Reminder".$row['message'];
}

function sendMail($emailTo,$subject,$msg ,$PhoneNo,$type,$SMS,$R_id){
   

//    // Always set content-type when sending HTML email
//    $headers = "From: HitReminder";
//    $headers = "MIME-Version: 1.0" . "\r\n";
//    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    switch($type)
    {
        case "FinalReminder":        
                    $message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Neopolitan Invitation Email</title>
                    <!-- Designed by https://github.com/kaytcat -->
                    <!-- Robot header image designed by Freepik.com -->
                    
                    <style type="text/css">
                    @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
                    
                    /* Take care of image borders and formatting */
                    
                    img {
                    max-width: 600px;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                    }
                    
                    a {
                    text-decoration: none;
                    border: 0;
                    outline: none;
                    color: #bbbbbb;
                    margin-bottom: 10px;
                    }
                    
                    a img {
                    border: none;
                    }
                    
                    /* General styling */
                    
                    td, h1, h2, h3  {
                    font-family: Helvetica, Arial, sans-serif;
                    font-weight: 400;
                    }
                    
                    td {
                    text-align: center;
                    }
                    
                    body {
                    -webkit-font-smoothing:antialiased;
                    -webkit-text-size-adjust:none;
                    width: 100%;
                    height: 100%;
                    color: #37302d;
                    background: #ffffff;
                    font-size: 16px;
                    }
                    
                    table {
                    border-collapse: collapse !important;
                    }
                    
                    .headline {
                    color: #ffffff;
                    font-size: 36px;
                    }
                    
                    .force-full-width {
                    width: 100% !important;
                    }
                    
                    
                    
                    
                    </style>
                    
                    <style type="text/css" media="screen">
                    @media screen {
                    /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
                    td, h1, h2, h3 {
                    font-family: "Droid Sans", "Helvetica Neue", "Arial", "sans-serif"  !important;
                    }
                    }
                    </style>
                    
                    <style type="text/css" media="only screen and (max-width: 480px)">
                    /* Mobile styles */
                    @media only screen and (max-width: 480px) {
                    
                    table[class="w320"] {
                    width: 320px !important;
                    }
                    
                    
                    }
                    </style>
                    </head>
                    <body class="body" style="padding: 0;margin: 0;display: block;background: #ffffff;-webkit-text-size-adjust: none;-webkit-font-smoothing: antialiased;width: 100%;height: 100%;color: #37302d;font-size: 16px;" bgcolor="#ffffff">
                    <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" style="border-collapse: collapse !important;">
                    <tr>
                    <td align="center" valign="top" bgcolor="#ffffff" width="100%" style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <center>
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="100%" class="w320">
                    <tr>
                    <td align="center" valign="top" style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                    <td style="font-size: 30px;text-align: center;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;">
                    <br>
                    <img src="http://itshiteshverma123.esy.es/hitReminderLogo.PNG" width="154" height="50" alt="robot picture">
                    <br>
                    <br>
                    </td>
                    </tr>
                    </table>
                    
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F46B45">
                    <tr>
                    <td style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <br>
                    <img src="https://cdn2.iconfinder.com/data/icons/flaturici-set-4/512/clock-512.png" width="224" height="240" alt="robot picture">
                    </td>
                    </tr>
                    <tr>
                    <td class="headline" style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;color: #ffffff;font-size: 36px;">
                    '.$subject.'
                    </td>
                    </tr>
                    <tr>
                    <td style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    
                    <center>
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="60%">
                    <tr>
                    <td style="color: #187272;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <br>
                    '.$msg.'
                    <br>
                    <br>
                    <br>
                    </td>
                    
                    
                    </tr>
                    </table><a href="'.$GLOBALS['RefLinkToWebSite'].'" style="background-color: rgb(81, 186, 86);border-radius: 4px;color: #ffffff;display: inline-block;font-family: Helvetica, Arial, sans-serif;font-size: 16px;font-weight: bold;line-height: 50px;text-align: center;text-decoration: none;width: 200px;-webkit-text-size-adjust: none;border: 0;outline: none;margin-bottom: 10px;">Create a New Reminder </a></center></td><th> 
                    
                    
                    </th> 
                    </tr></table>
                    
                    
                    </td></tr></table></center>
                    
                    </td>
                    </tr>
                    </table>
                    
                    
                    <table style="margin: 0 auto;border-collapse: collapse !important;width: 100% !important;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#414141">
                    <tr>
                    <td style="background-color: #414141;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <br>
                    <br>
                    <img src="https://www.filepicker.io/api/file/R4VBTe2UQeGdAlM7KDc4" alt="google+">
                    <img src="https://www.filepicker.io/api/file/cvmSPOdlRaWQZnKFnBGt" alt="facebook">
                    <img src="https://www.filepicker.io/api/file/Gvu32apSQDqLMb40pvYe" alt="twitter">
                    <br>
                    <br>
                    </td>
                    </tr>
                    <tr>
                    <td style="color: #bbbbbb;font-size: 12px;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <a href="#" style="text-decoration: none;border: 0;outline: none;color: #bbbbbb;margin-bottom: 10px;">View in browser</a> | <a href="#" style="text-decoration: none;border: 0;outline: none;color: #bbbbbb;margin-bottom: 10px;">Unsubscribe</a> | <a href="#" style="text-decoration: none;border: 0;outline: none;color: #bbbbbb;margin-bottom: 10px;">Contact</a>
                    <br><br>
                    </td>
                    </tr>
                    <tr>
                    <td style="color: #bbbbbb;font-size: 12px;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    © 2017 All Rights Reserved
                    <br>
                    <br>
                    </td>
                    </tr>
                    </table>
                    
                    
                    </body>
                    </html>';
                    
                    break;
                    
                    
                    
                    
                case "PreReminder":
                    
                    $message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Neopolitan Invitation Email</title>
                    <!-- Designed by https://github.com/kaytcat -->
                    <!-- Robot header image designed by Freepik.com -->
                    
                    <style type="text/css">
                    @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
                    
                    /* Take care of image borders and formatting */
                    
                    img {
                    max-width: 600px;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                    }
                    
                    a {
                    text-decoration: none;
                    border: 0;
                    outline: none;
                    color: #bbbbbb;
                    margin-bottom: 10px;
                    }
                    
                    a img {
                    border: none;
                    }
                    
                    /* General styling */
                    
                    td, h1, h2, h3  {
                    font-family: Helvetica, Arial, sans-serif;
                    font-weight: 400;
                    }
                    
                    td {
                    text-align: center;
                    }
                    
                    body {
                    -webkit-font-smoothing:antialiased;
                    -webkit-text-size-adjust:none;
                    width: 100%;
                    height: 100%;
                    color: #37302d;
                    background: #ffffff;
                    font-size: 16px;
                    }
                    
                    table {
                    border-collapse: collapse !important;
                    }
                    
                    .headline {
                    color: #ffffff;
                    font-size: 36px;
                    }
                    
                    .force-full-width {
                    width: 100% !important;
                    }
                    
                    
                    
                    
                    </style>
                    
                    <style type="text/css" media="screen">
                    @media screen {
                    /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
                    td, h1, h2, h3 {
                    font-family: "Droid Sans", "Helvetica Neue", "Arial", "sans-serif"  !important;
                    }
                    }
                    </style>
                    
                    <style type="text/css" media="only screen and (max-width: 480px)">
                    /* Mobile styles */
                    @media only screen and (max-width: 480px) {
                    
                    table[class="w320"] {
                    width: 320px !important;
                    }
                    
                    
                    }
                    </style>
                    </head>
                    <body class="body" style="padding: 0;margin: 0;display: block;background: #ffffff;-webkit-text-size-adjust: none;-webkit-font-smoothing: antialiased;width: 100%;height: 100%;color: #37302d;font-size: 16px;" bgcolor="#ffffff">
                    <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" style="border-collapse: collapse !important;">
                    <tr>
                    <td align="center" valign="top" bgcolor="#ffffff" width="100%" style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <center>
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="100%" class="w320">
                    <tr>
                    <td align="center" valign="top" style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                    <td style="font-size: 30px;text-align: center;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;">
                    <br>
                    <img src="http://itshiteshverma123.esy.es/hitReminderLogo.PNG" width="154" height="50" alt="robot picture">
                    <br>
                    <br>
                    </td>
                    </tr>
                    </table>
                    
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="100%" bgcolor="#4dbfbf">
                    <tr>
                    <td style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <br>
                    <img src="https://cdn2.iconfinder.com/data/icons/flaturici-set-4/512/clock-512.png" width="224" height="240" alt="robot picture">
                    </td>
                    </tr>
                    <tr>
                    <td class="headline" style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;color: #ffffff;font-size: 36px;">
                    '.$subject.'
                    </td>
                    </tr>
                    <tr>
                    <td style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    
                    <center>
                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="60%">
                    <tr>
                    <td style="color: #187272;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <br>
                    '.$msg.'
                    <br>
                    <br>
                    <br>
                    </td>
                    
                    
                    </tr>
                    </table><a href="'.$GLOBALS['CancelLinkTotheWebSite'].$R_id.'" style="background-color: #ac4d2f;border-radius: 4px;color: #ffffff;display: inline-block;font-family: Helvetica, Arial, sans-serif;font-size: 16px;font-weight: bold;line-height: 50px;text-align: center;text-decoration: none;width: 200px;-webkit-text-size-adjust: none;border: 0;outline: none;margin-bottom: 10px;">Cancel Reminder </a>
                    <a href="'.$GLOBALS['RefLinkToWebSite'].'" style="background-color:  rgb(81, 186, 86);border-radius: 4px;color: #ffffff;display: inline-block;font-family: Helvetica, Arial, sans-serif;font-size: 16px;font-weight: bold;line-height: 50px;text-align: center;text-decoration: none;width: 200px;-webkit-text-size-adjust: none;border: 0;outline: none;margin-bottom: 10px;">Create New Reminder </a>
                    
                    </center></td><th> 
                    
                    
                    </th> 
                    </tr></table>
                    
                    
                    </td></tr></table></center>
                    
                    </td>
                    </tr>
                    </table>
                    
                    
                    <table style="margin: 0 auto;border-collapse: collapse !important;width: 100% !important;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#414141">
                    <tr>
                    <td style="background-color: #414141;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <br>
                    <br>
                    <img src="https://www.filepicker.io/api/file/R4VBTe2UQeGdAlM7KDc4" alt="google+">
                    <img src="https://www.filepicker.io/api/file/cvmSPOdlRaWQZnKFnBGt" alt="facebook">
                    <img src="https://www.filepicker.io/api/file/Gvu32apSQDqLMb40pvYe" alt="twitter">
                    <br>
                    <br>
                    </td>
                    </tr>
                    <tr>
                    <td style="color: #bbbbbb;font-size: 12px;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    <a href="#" style="text-decoration: none;border: 0;outline: none;color: #bbbbbb;margin-bottom: 10px;">View in browser</a> | <a href="#" style="text-decoration: none;border: 0;outline: none;color: #bbbbbb;margin-bottom: 10px;">Unsubscribe</a> | <a href="#" style="text-decoration: none;border: 0;outline: none;color: #bbbbbb;margin-bottom: 10px;">Contact</a>
                    <br><br>
                    </td>
                    </tr>
                    <tr>
                    <td style="color: #bbbbbb;font-size: 12px;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                    © 2017 All Rights Reserved
                    <br>
                    <br>
                    </td>
                    </tr>
                    </table>
                    
                    
                    </body>
                    </html>';
                    break;
            }
            
    
        $mail = new PHPMailer;
        
        $mail->isSMTP();                                   // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                            // Enable SMTP authentication
        $mail->Username = 'hitreminder';          // SMTP username
        $mail->Password = 'microtex'; // SMTP password
        $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                 // TCP port to connect to
        
        $mail->setFrom('hitreminder@gmail.com', 'HitReminder');
        $mail->addAddress($emailTo);   // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        $mail->isHTML(true);  // Set email format to HTML
        
        $bodyContent = $message;
       // $bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';
        
        $mail->Subject = $subject;
        $mail->Body    = $bodyContent;
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        
            sendWay2SMS ( $GLOBALS['SMSUname'], $GLOBALS['SMSPass'], $PhoneNo, $SMS);

//        mail($emailTo,$subject,$message,$headers); 
} 

mysqli_close($db); 
?>