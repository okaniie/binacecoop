<?php  
include 'header.php';

if (isset($_POST['btcsub'])) {
	$wadd = @text_input($_POST['wadd']);
	$method = text_input($_POST['pay_method']);
	$amount = text_input($_POST['amount']);

	$bankname = @text_input($_POST['bankname']);
	$bankadd = @text_input($_POST['bankadd']);
	$accname = @text_input($_POST['accname']);
	$accnum = @text_input($_POST['accnum']);
	$routnum = @text_input($_POST['routnum']);
	$swcode = @text_input($_POST['swcode']);

	$tfcoder = text_input($_POST['tfcoder']);

	if (!empty($amount)) {
		if ($tfcoder != $tcode) {
		 	echo "<script>alert('Incorrect Withdrawal Code');window.location.href = window.location.href </script>"; 
		 }elseif ($amount > $balance) {
			echo "<script>alert('Insufficient Funds');window.location.href = window.location.href </script>"; 
		}else{
			$status = "Pending";
			$date = date("F j, Y");
			$insert = mysqli_query($link, "INSERT INTO withdrawals (`email`, `method`, `amount`, `wallet`, `bank_name`, `bank_add`, `acct_number`, `acct_name`, `swift`, `routing`, `status`, `date`) VALUES ('$email', '$method', '$amount', '$wadd', '$bankname', '$bankadd', '$accnum', '$accname', '$swcode', '$routnum', '$status', '$date') ");
			if ($insert) {
				mysqli_query($link, "UPDATE users SET balance = balance - $amount WHERE email = '$email' ");
				$subject = "New Withdrawal";
				$body = 'Your withdrawal request of '.$amount.' '.$currency.' via '.$method.' was successful, your account will be credited when it is approved';
				sendMail($email, $fname, $subject, $body);
				echo "<script>alert('Withdrawal of ".$amount." ".$currency." was successful but still pending');window.location.href = window.location.href </script>"; 
			}
		}
	}else{
		echo "<script>alert('Enter an amount');window.location.href = window.location.href </script>";
	}
}
?>


<!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <!-- News Flash -->
<style>
label{
    color:white;
}
</style>
		
		     
          	<div class="col-xl-12 col-md-12">
	          <div class="ms-card ms-widget ms-infographics-widget" style="background-image: linear-gradient(100deg, black, #178000);border:none">
	            <div class="ms-card-body media">
	              <div class="media-body">
	                <h6 style="color:white">Balance</h6>
	                <p class="ms-card-change"  style="color:white"> <img src="money-bag-with-dollar-symbol.svg" style="width:20px"> 0.00 </p>
	                <p class="fs-12">Stats</p>
	              </div>
	            </div>
	             <i class="flaticon-stats"></i>
	          </div>
	        </div>
		
 
		
		
			
		
		
		        <div class="col-xl-12 col-md-12" style="margin-top:20px">
					<form method="post" action="" enctype="multipart/form-data" style="background-color:#262626; padding:20px; margin-top:10px;border-radius:10px">
						<div class="sign-u">
							<div class="sign-up1">
								<label>Withdrawal mode:</label>
							</div>
							<div class="sign-up2">
								<select name="payment_mode" onchange="this.form.submit()" style="width: 100%; height:40px;">
									<option>- Select Withdrawal Method -</option>  
									<option value="Bitcoin">Bitcoin</option>
									<option value="Bank">Bank Transfer</option>
									<option value="Ethereum">Ethereum</option>
								</select>
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="hidden" name="pay_method" value="<?php echo $_POST['payment_mode'] ?>">
						<?php  
							if (isset($_POST['payment_mode']) && $_POST['payment_mode'] == "Bitcoin") {
						?>
						<!-- Bitcoin withdrawal -->
						<div class='sign-u'>
							<div class='sign-up1'>
								<label  style='color:white'>Enter Bitcoin Wallet Address *:</label>
							</div>
							<div class='sign-up2'>
							<input type='text' name='wadd' style='width: 100%; height:40px;'>
							<input type='hidden' name='pmode' value='Bitcoin'>
							</div>
							<div class='clearfix'> </div>
						</div>
    					<div class='sign-u'>
    						<div class='sign-up1'>
    							<label style='color:white'>Withdrawal Amount:</label>
    						</div>
    						<div class='sign-up2'>
    						<input type='number' step='0.01' name='amount' style='width: 100%;'>
    						</div>
    						<div class='clearfix'> </div>
    					</div>
						<?php } ?>

						<?php  
							if (isset($_POST['payment_mode']) && $_POST['payment_mode'] == "Bank") {
						?>

						<!-- Bank Transfer Withdrawal -->
						<div class='sign-u'>
							<div class='sign-up1'>
								<label>Bank Name *:</label>
							</div>
							<div class='sign-up2'>
							<input type='text' name='bankname' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
							<input type='hidden' name='pmode' value='Bank'>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='sign-u'>
							<div class='sign-up1'>
								<label>Bank Address *:</label>
							</div>
							<div class='sign-up2'>
							<input type='text' name='bankadd' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='sign-u'>
							<div class='sign-up1'>
								<label>Account Name *:</label>
							</div>
							<div class='sign-up2'> 
							<input type='text' name='accname' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='sign-u'>
							<div class='sign-up1'>
								<label>Account Number *:</label>
							</div>
							<div class='sign-up2'>
							<input type='text' name='accnum' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='sign-u'>
							<div class='sign-up1'>
								<label>Routing Number:</label>
							</div>
							<div class='sign-up2'>
							<input type='text' name='routnum' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='sign-u'>
							<div class='sign-up1'>
								<label>Swift Code *:</label>
							</div>
							<div class='sign-up2'>
							<input type='text' name='swcode' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='sign-u'>
    						<div class='sign-up1'>
    							<label>Withdrawal Amount:</label>
    						</div>
    						<div class='sign-up2'>
    						<input type='number' step='0.01' name='amount' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
    						</div>
    						<div class='clearfix'> </div>
    					</div>

					<?php } ?>
					<?php  
							if (isset($_POST['payment_mode']) && $_POST['payment_mode'] == "Ethereum") {
						?>
					<div class='sign-u'>
						<div class='sign-up1'>
							<label>Enter Wallet Address *:</label>
						</div>
						<div class='sign-up2'>
						<input type='text' name='wadd' style='width: 100%; height:40px;'>
						<input type='hidden' name='pmode' value='Ethereum'>
						</div>
						<div class='clearfix'> </div>
					</div>
					<div class='sign-u'>
						<div class='sign-up1'>
							<label>Withdrawal Amount:</label>
						</div>
						<div class='sign-up2'>
						<input type='number' step='0.01' name='amount' required style='width: 100%;'>
						</div>
						<div class='clearfix'> </div>
					</div>
				<?php } ?>
						
						<br>
						<?php  
							if (isset($_POST['payment_mode']) ) {
						?>
						<div style='background-color:black;padding:10px;border-radius:20px;color:#66ff66'>
						Kindly Contact us via email <br> <b><?php echo $sitemail ?></b> to <b>Request</b> for <b>Transfer Code : </b>
						<br>
							<span>Enter Transfer Code</span>
						<br>
							<div class='sign-up2'>
    							<input type='text' name='tfcoder' class='col-sm-12 form-control'  style='width: 100%; height:40px;'>
    						</div>
    					
    					</div>
						
						
    					<div class='sub_home'>
    						<input type='submit' class='btn btn-default' name='btcsub' value='Withdraw'>
    						<div class='clearfix'> </div>
    					</div>
    				<?php } ?>
					</form>
        		</div>

		
      </div>
    </div>

<?php  
include 'footer.php';
?>