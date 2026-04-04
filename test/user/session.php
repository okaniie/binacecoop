<?php 
session_start();
include '../config/db.php';
include '../config/config.php';
include '../config/functions.php';

if (isset($_SESSION['USER_LOGIN'])) {
	$umail = $_SESSION['USER_LOGIN'];
	$qq = mysqli_query($link, "SELECT * FROM users WHERE email = '$umail' ");
	if (mysqli_num_rows($qq) > 0) {
		$data = mysqli_fetch_assoc($qq);

		$fname = $data['fname'];
		$email = $data['email'];
		$password = $data['password'];
		$phone = $data['phone'];
		$country = $data['country'];
		$currency = $data['currency'];
		$balance = $data['balance'];
		$profit = $data['profit'];
		$occupation = $data['occupation'];
		$refcode = $data['refcode'];
		$btcwallet = $data['btc_wallet'];
		$tcode = $data['tcode'];

		if (!function_exists("crypto_rate")) {
			function crypto_rate()
			{
				global $currency;
				$url = "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC&tsyms=".$currency."";
				
			    if (!function_exists('curl_init'))
			    { 
			        die('CURL is not installed!');
			    }

			    $ch = curl_init();
			    curl_setopt($ch, CURLOPT_URL, $url);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			    $output = curl_exec($ch);
			    curl_close($ch);
			    $d = json_decode($output, TRUE);  
				return $d;	
			}
		}

		$data =  crypto_rate();
		$btcPrice = @$data['BTC'][$currency];

		$balbtc = $balance/$btcPrice;
	}else{
		echo "<script>window.location.href = '../auth/index.php' </script>";
	}
}else{
	echo "<script>window.location.href = '../auth/index.php' </script>";
}
?>