<?php
$to = "itshiteshverma@gmail.com";
include('SMS/way2sms-api.php');
include("connection.php");
//$GLOBALS['mailFormat']

$r_ID= "33";
$RefLinkToWebSite = "http://www.itshiteshverma123.esy.es/";
$CancelLinkTotheWebSite = $RefLinkToWebSite."ReminderCanceledPage.php?r_id=".$r_ID;

switch("PreReminder"){
    case "WelcomeMail":
        $subject = " Welcome - Hit Reminder";
        $headers .= 'From: Hit Reminder'. "\r\n";
        $message = '<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <!-- NAME: SUBSCRIBER ALERT -->
        <!--[if gte mso 15]>
        <xml>
        <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        


        <!-- ////// OUTLOOK-SPECIFIC STYLES ///// -->
        <!--[if gte mso 7]>
        <style type="text/css">
        </style>
        <![endif]-->
           <script type="text/javascript">
                      var w=window;
                      if(w.performance||w.mozPerformance||w.msPerformance||w.webkitPerformance){var d=document,AKSB=AKSB||{};AKSB.q=[];AKSB.mark=function(a,b){AKSB.q.push(["mark",a,b||(new Date).getTime()])};AKSB.measure=function(a,b,c){AKSB.q.push(["measure",a,b,c||(new Date).getTime()])};AKSB.done=function(a){AKSB.q.push(["done",a])};AKSB.mark("firstbyte",(new Date).getTime());AKSB.prof={custid:"405167",ustr:"ECDHE-ECDSA-AES256-GCM-SHA384",originlat:0,clientrtt:173,ghostip:"23.76.157.148",
                      ipv6:false,pct:10,clientip:"103.240.235.64",requestid:"6016e829",protocol:"h2",blver:10,akM:"x",akN:"ae",akTT:"O",akTX:"1",akTI:"6016e829",ai:"343001",ra:"",pmgn:"",pmgi:"",pmp:""};(function(a){var b=
                      d.createElement("script");b.async="async";b.src=a;a=d.getElementsByTagName("script");a=a[a.length-1];a.parentNode.insertBefore(b,a)})(("https:"===d.location.protocol?"https:":"http:")+"//ds-aksb-a.akamaihd.net/aksb.min.js")};
                    </script>
                    </head>
    <body style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #F2F2F2;">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;background-color: #F2F2F2;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;border-top: 5px solid #FFFFFF;">
                        <!-- BEGIN TEMPLATE // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <tr>
                                <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                    <!-- BEGIN PREHEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #F2F2F2;border-top: 0;border-bottom: 0;">
                                        <tr>
                                        	<td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                    <tr>
                                                        <td valign="top" class="preheaderContainer" style="padding-top: 10px;padding-bottom: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 0px;padding-left: 0px;padding-top: 0;padding-bottom: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                
                                    <a href="https://hitreminder.000webhostapp.com/" title="" class="" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                        <img align="left" alt="" src="https://gallery.mailchimp.com/c8df4d49f61506f7f23922ff2/images/308eb199-86d4-43d1-8378-a21d2631f91b.png" width="296" style="max-width: 296px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" class="mcnImage">
                                    </a>
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>                                            
                                        </tr>
                                    </table>
                                    <!-- // END PREHEADER -->
                                </td>
                            </tr>
                            <tr>
                            	<td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
									<!-- BEGIN HEADER // -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #F2F2F2;border-top: 0;border-bottom: 0;">
                                    	<tr>
                                        	<td align="center" valign="top" style="padding-top: 20px;padding-bottom: 20px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
													<tr>
														<td align="center" height="10" valign="top" width="10" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
															<img src="https://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/d4042106-8117-4b79-b76b-91f8d64c5dff.gif" height="10" width="10" style="display: block;line-height: 0px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;">
														</td>
														<td align="center" height="10" valign="top" class="headerRearBackground" style="opacity: 0.5;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #D55258;">
															<img src="https://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/640a7ee0-db88-4905-a550-89e571c94697.png" class="mcnImage" height="10" width="580" style="display: block;line-height: 0px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;vertical-align: bottom;">
														</td>
														<td align="center" height="10" valign="top" width="10" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
															<img src="https://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/d4042106-8117-4b79-b76b-91f8d64c5dff.gif" height="10" width="10" style="display: block;line-height: 0px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;">
														</td>
													</tr>
                                                	<tr>
                                                    	<td align="center" colspan="3" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        	<table border="0" cellpadding="0" cellspacing="0" width="100%" class="headerFrontBackground" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #D55258;border-bottom: 2px solid #BD4046;">
                                                                <tr>
                                                                    <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                                        <!-- BEGIN HEADER // -->
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                                            <tr>
                                                                                <td valign="top" class="headerContainer" style="padding-top: 20px;padding-bottom: 20px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #FFFFFF;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <h1 style="display: block;margin: 0;padding: 0;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;text-align: left;color: #FFFFFF !important;">Bonjour,<br>'.$_POST['name'].'</h1>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #FFFFFF;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            Thanks for signing up, If u want to get regular updates about special offers and resources please subscribe to our mailing list from your account.<br>
<br>
In the meantime, create a Reminder&nbsp;<br>
<br>
Cheers,<br>
Hitesh Verma<br>
&nbsp;
                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top: 0;padding-right: 18px;padding-bottom: 18px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border: 2px solid #F2F2F2;border-radius: 4px;background-color: #FFFFFF;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial;font-size: 16px;padding: 20px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                <a class="mcnButton " title="Check It Out " href="https://hitreminder.000webhostapp.com/" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #D55258;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Check It Out </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table></td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- // END HEADER -->
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
											</td>
										</tr>
									</table>
									<!-- // END HEADER -->
								</td>
							</tr>
                            <tr>
                                <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                    <!-- BEGIN BODY // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #F2F2F2;border-top: 0;border-bottom: 0;">
                                        <tr>
                                            <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                    <tr>
                                                        <td valign="top" class="bodyContainer" style="padding-top: 10px;padding-bottom: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 1px solid #AAAAAA;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END BODY -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" style="padding-bottom: 40px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                    <!-- BEGIN FOOTER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #F2F2F2;border-top: 0;border-bottom: 0;">
                                        <tr>
                                            <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                    <tr>
                                                        <td valign="top" class="footerContainer" style="padding-top: 10px;padding-bottom: 10px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END FOOTER -->
                                </td>
                            </tr>
						</table>
						<!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>';
        
        ///send SMS too
         $SMS = "Welcome to HitReminder";            
        
        break;
        
    case "PreReminder":
        
         $subject = "Pre Reminder";
        $headers = 'From: Hit Reminder'. "\r\n";
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
                      Come check it out!
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">

                      <center>
                        <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="60%">
                          <tr>
                            <td style="color: #187272;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                            <br>
                            You won
                            <br>
                            <br>
                            <br>
                            </td>
                              
                                
                          </tr>
                          </table><a href="'.$CancelLinkTotheWebSite.'" style="background-color: #ac4d2f;border-radius: 4px;color: #ffffff;display: inline-block;font-family: Helvetica, Arial, sans-serif;font-size: 16px;font-weight: bold;line-height: 50px;text-align: center;text-decoration: none;width: 200px;-webkit-text-size-adjust: none;border: 0;outline: none;margin-bottom: 10px;">Cancel Reminder </a>
                        <a href="'.$RefLinkToWebSite.'" style="background-color:  rgb(81, 186, 86);border-radius: 4px;color: #ffffff;display: inline-block;font-family: Helvetica, Arial, sans-serif;font-size: 16px;font-weight: bold;line-height: 50px;text-align: center;text-decoration: none;width: 200px;-webkit-text-size-adjust: none;border: 0;outline: none;margin-bottom: 10px;">Create New Reminder </a>
                        
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
        
    case "FinalReminder": 
        
         $subject = "Final Reminder";
        $headers = 'From: Hit Reminder'. "\r\n";
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
                      Come check it out!
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">

                      <center>
                        <table style="margin: 0 auto;border-collapse: collapse !important;" cellpadding="0" cellspacing="0" width="60%">
                          <tr>
                            <td style="color: #187272;font-family: &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Arial&quot;, &quot;sans-serif&quot;  !important;font-weight: 400;text-align: center;">
                            <br>
                            You won\'t believe what you\'re missing!
                            <br>
                            <br>
                            <br>
                            </td>
                              
                                
                          </tr>
                          </table><a href="'.$RefLinkToWebSite.'" style="background-color: rgb(81, 186, 86);border-radius: 4px;color: #ffffff;display: inline-block;font-family: Helvetica, Arial, sans-serif;font-size: 16px;font-weight: bold;line-height: 50px;text-align: center;text-decoration: none;width: 200px;-webkit-text-size-adjust: none;border: 0;outline: none;margin-bottom: 10px;">Create a New Reminder </a></center></td><th> 
                            
                              
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

// Always set content-type when sending HTML email
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: Hit Reminder'. "\r\n";

mail($to,$subject,$message,$headers);
//sendWay2SMS ( $SMSUname, $SMSPass, $_POST['phoneno'], $SMS);

echo "DOne";
?>