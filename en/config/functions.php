<?php 
include 'db.php';
include 'config.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../mailer/vendor/autoload.php';
	
function text_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function sendAdminMail($email, $name, $subject, $body){
  global $sitemail, $sitename,$siteurl;
  
  require_once "../mailer/PHPMailer.php";
    require_once "../mailer/SMTP.php";
    require_once "../mailer/Exception.php";
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $host; //
    $mail->SMTPAuth = true;
    $mail->Username = $mail_username; // Default cpanel email account
    $mail->Password = $mail_password; // Default cpanel email password
    $mail->Port = 465; // 587
    $mail->SMTPSecure = "ssl"; // tls
    $mail->isHTML(true);
    $mail->setFrom($mail_username, $sitename); // Email address/ Bank bane shown to reciever
    $mail->addAddress($email);
    $mail->AddReplyTo($mail_username, $sitename); // Email address/ Bank bane shown to reciever
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $send = $mail->Send();
    return $send;
}

function sendMail($email, $name, $subject, $message){
	global $sitemail, $sitename,$siteurl,$host,$mail_username,$mail_password;
	
	require_once "../mailer/PHPMailer.php";
    require_once "../mailer/SMTP.php";
    require_once "../mailer/Exception.php";
    
    $body = ' <!DOCTYPE html>
    <html lang="en" xmlns="">
    <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name=""> 
    <link rel="stylesheet" type="text/css" href="mail.css">
    <title></title> 
    </head>
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">
    <center style="width: 100%; ">
      <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
      </div>
      <div style="max-width: 600px; margin: 0 auto;" class="email-container">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
          <tr>
            <td valign="top" class="" style="padding: 1em 2.5em 0 2.5em;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td class="logo" style="text-align: center;">
                    <h1><img src="'.$siteurl.'/img/logo.png"></h1>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td valign="middle" class="hero" style="padding: 2em 0 4em 0;">
              <table>
                <tr>
                  <td>
                    <div class="text" style="color: black; font-size: 15px;  text-align: justify;">
                      '.$message.'
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <br>
          <tr>
            <td valign="middle" class="hero" style="; ">
              <table>
                <tr>
                  <td>
                    <div class="text" style="color: black; font-weight: bold;  text-align: center;">
                      <p>'.$sitemail.'. </p>
                      <p>All Rights Reserved</p>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </center>


    </body>
  </html>';
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $host; //
    $mail->SMTPAuth = true;
    $mail->Username = $mail_username; // Default cpanel email account
    $mail->Password = $mail_password; // Default cpanel email password
    $mail->Port = 465; // 587
    $mail->SMTPSecure = "ssl"; // tls
    $mail->isHTML(true);
    $mail->setFrom($mail_username, $sitename); // Email address/ Bank bane shown to reciever
    $mail->addAddress($email);
    $mail->AddReplyTo($mail_username, $sitename); // Email address/ Bank bane shown to reciever
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $send = $mail->Send();
    return $send;

}


function customAlert($case, $content){
    switch ($case) {
      case 'success':
        $mesg =  '<script type="text/javascript">
          $(document).ready(function() {
              swal({
                  title: "Success",
                  text: " '.$content.' ",
                  icon: "success",
                  button: "Ok",
                  timer: 5000
              });    
          });
        </script>';
        break;

        case 'error':
          $mesg = '<script type="text/javascript">
              $(document).ready(function() {
                  swal({
                      title: "Error",
                      text: " '.$content.' ",
                      icon: "error",
                      button: "Ok",
                      timer: 5000
                  });    
              });
          </script>';
        break;
      default:
        break;
    }
  return $mesg;
}

function pageRedirect($sec, $route){
  $c = "<meta http-equiv='refresh' Content='".$sec."; url=".$route." ' />";
  return $c;
}


function getRandomStrings() {
    $rnumbs = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $tnumbs = str_shuffle($rnumbs);
    $tnumbs = substr($tnumbs, 0, 30);
    return $tnumbs;
  }

  function ct($email){
    global $link;
    $query = mysqli_query($link, "SELECT currency FROM users WHERE email = '$email' ");
    if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      $c = $row['currency'];
      if ($c == "") {
        $c = "$";
      }
    }else{
      $c = "$";
    }
    return $c;
  }


?>