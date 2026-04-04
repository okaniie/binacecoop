<?php  
include "config/db.php";
include "config/config.php";
include "config/functions.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'mailer/vendor/autoload.php';


$sql = mysqli_query($link, "SELECT * FROM investments ");
if (mysqli_num_rows($sql) > 0) {
	while ($row = mysqli_fetch_assoc($sql)) {
		$invest_id = $row['id'];
		$userId = $row['userId'];
		$planId = $row['planId'];
		$invest_amt = $row['invest_amt'];
		$plan_name = $row['plan_name'];
		$increase = $row['increase'];
		$total_profit = $row['total_profit'];
		$start_date = $row['start_date'];
		$end_date = $row['end_date'];
		$status = $row['status'];

		$query = mysqli_query($link, "SELECT fname,lname,email FROM users WHERE id = '$userId' ");
		if(mysqli_num_rows($query) > 0){
			$data = mysqli_fetch_assoc($query);
			$name = $data['fname']." ".$data['lname'];
			$email = $data['email'];
		}

		$current_date = date('d-m-Y H:i:s');
		if ($status == 1) {
			if (strtotime($current_date) == strtotime($end_date) || strtotime($current_date) > strtotime($end_date) ) {
			    $tp = $invest_amt + $total_profit;
				mysqli_query($link, "UPDATE users SET profit = profit + $total_profit WHERE id = '$userId' ");
				mysqli_query($link, "UPDATE users SET balance = balance + $tp WHERE id = '$userId' ");
          		mysqli_query($link, "UPDATE investments SET status = '0' WHERE id = '$invest_id' ");
          		$subject = "Investment Notification";
		        $body = "<p>Dear ".$name."</p> <p>Your investment with ".$sitename." has ended and your profit added to your profit wallet balance, below are the details </p> <p>Plan - <strong>".$plan_name."</strong> </p> <p>Amount Invested - <strong>".$invest_amt." USD</strong> </p> <p>Start Date - <strong>".$start_date."</strong> </p> <p>End Date - <strong>".$end_date."</strong> </p> <p>Added Profit - <strong>".$total_profit." USD</strong> </p> ";
		        
		        
		        require_once "mailer/PHPMailer.php";
                require_once "mailer/SMTP.php";
                require_once "mailer/Exception.php";
		        
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
		}
	}
}

?>