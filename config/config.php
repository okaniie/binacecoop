<?php 
include 'db.php';

	$select = mysqli_query($link, "SELECT * FROM settings WHERE id = '1' ");
	if (mysqli_num_rows($select) > 0) {
		$row = mysqli_fetch_assoc($select);

		$sitename = $row['sitename'];
		$sitemail = $row['sitemail'];
		$siteurl = $row['siteurl'];
		$bwallet = $row['bwallet'];
		$bank_name = $row['bank_name'];
		$account_name = $row['account_name'];
		$account_num = $row['account_num'];
		$swift = $row['swift'];
		$routing = $row['routing'];

	}

?>

