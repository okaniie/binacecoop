<?php 
session_start();
include "../config/db.php";
include "../config/config.php";
include "../config/functions.php";

if (isset($_SESSION['USERLOGIN'])) {
	$usermail = $_SESSION['USERLOGIN'];
	$query = mysqli_query($link, "SELECT * FROM users WHERE email = '$usermail' ");
	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_assoc($query); 

		$uemail = $row['email'];
		$uid = $row['id'];
		$name = $row['fname'] . " ".$row['lname']; 
		$fname = $row['fname']; 
		$lname = $row['lname']; 
		$password = $row['password'];
		$phone = $row['phone'];
		$country = $row['country'];
		$balance = $row['balance'];
		$bonus = $row['bonus'];
		$refcode = $row['refcode'];
		$ref_balance = $row['ref_balance'];
		$profit = $row['profit'];
		$profile_photo = $row['profile_photo'];
		$id_photo = $row['Id_photo'];
		$currency = $row['currency'];
		$pin = $row['pin'];
		$status = $row['status'];
		$date_joined = $row['date'];
		$total_balance = $ref_balance + $profit + $bonus;
		
		$currency = ct($uemail);

		//Total Referrals
		$trf = mysqli_query($link, "SELECT COUNT(id) as total_ref FROM users WHERE referral = '$refcode' ");
		$row_trf = mysqli_fetch_assoc($trf);
		if($row_trf['total_ref'] != ""){
			$total_ref = $row_trf['total_ref'];
		}else{
			$total_ref = 0;
		}


	}else{
		echo "<script>window.location.href = '../auth/login.php' </script>";
	}
}else{
// 	header("location: ../../auth/login.php");
	echo "<script>window.location.href = '../auth/login.php' </script>";
}





	if (!function_exists("btc_rate")) {
		function btc_rate()
		{
			$url = "https://bitpay.com/api/rates";
			
		    if (!function_exists('curl_init'))
		    { 
		        die('CURL is not installed!');
		    }

		    // $btcDisplay = 0;

		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    $output = curl_exec($ch);
		    curl_close($ch);
		    $data = json_decode($output, TRUE);  

		        $btcPrice = @$data[2]["rate"];
				$btcDisplay = round($btcPrice,2);
		
			return $btcDisplay;	
		}

	}

		$btcvalue = btc_rate();
		@$total_value = $total_balance / $btcvalue;
		@$deposit_value = $balance / $btcvalue;
		@$profit_value = $profit / $btcvalue;
		@$refer_value = $ref_balance / $btcvalue;
 ?>