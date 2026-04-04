<?php 
include 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
function text_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function sendMail($email, $name, $subject, $body){
	global $sitemail, $sitename,$siteurl;
	
	 require_once "../PHPMailer/PHPMailer.php";
    require_once '../PHPMailer/Exception.php';

    $mail = new PHPMailer;
    $mail->setFrom($sitemail);
    $mail->FromName = $sitename;
    $mail->addAddress("$email", "$name");
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '<div style="border:1px solid #ccc;padding:5%">
		<div align="">
		    <img src="'.$siteurl.'/images/ICT.png" style="height:100px;width:auto" align="center" >
		</div>
		<h3 align="">Dear '.$name.', </h3>
		<p>
		    '.$body.'
		</p>
		<br>
		<a href="'.$siteurl.'">'.$siteurl.'</a>
		<p>'.$sitename.'.</p>
		</div>
		';
    $send = $mail->send();
    return $send;
}

function pageRedirect($sec, $route){
  $c = "<meta http-equiv='refresh' Content='".$sec."; url=".$route." ' />";
  return $c;
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

 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>