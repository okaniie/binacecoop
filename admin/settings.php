<?php 
$page = "Settings";
include 'header.php';


	$msg = "";

	if (isset($_POST['save'])) {
		$site_name = text_input($_POST['site_name']);
		$site_email = text_input($_POST['site_email']);
		$site_url = text_input($_POST['site_url']);
		$btcwallet = text_input($_POST['btcwallet']);
        $bank_name = text_input($_POST['bank_name']);
        $account_name = text_input($_POST['account_name']);
        $account_num = text_input($_POST['account_num']);
        $swift = text_input($_POST['swift']);
        $routing = text_input($_POST['routing']);
        

		if (empty($site_name) || empty($site_email) || empty($site_url)) {
			echo "";
		}else{
			$save = mysqli_query($link, "UPDATE settings SET routing = '$routing', swift = '$swift', account_num = '$account_num', account_name = '$account_name', bank_name = '$bank_name', sitename = '$site_name', sitemail = '$site_email', siteurl = '$site_url', bwallet = '$btcwallet' ");
			if($save){
				$msg = "Settings has been updated";
			}
		}
	}
 ?>

 <div class="row">
    <?php 
            if ($msg != "") {
         ?>
         <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    <div class="col-xl-12">
        <div class="card">
         
            <div class="card-body">
                <form class="needs-validation" method="post" action="settings.php" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Site Name</label>
                                <input type="text" name="site_name" class="form-control" id="validationCustom01" placeholder="Site Name" value="<?php echo $sitename ?>" required>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Site URL</label>
                                <input type="text" name="site_url" class="form-control" id="validationCustom02" placeholder="https://example.com" value="<?php echo $siteurl ?>" required>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Site Email</label>
                                <input type="text" name="site_email" class="form-control" id="validationCustom03" value="<?php echo $sitemail ?>" placeholder="mail@domain.com" required>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">BTC Wallet</label>
                                <input type="text" class="form-control" name="btcwallet" id="validationCustom04"  value="<?php echo $bwallet ?>" placeholder="BTC Wallet Address" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" id="validationCustom04"  value="<?php echo $bank_name ?>" placeholder="Bank Name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Account Name</label>
                                <input type="text" class="form-control" name="account_name" id="validationCustom04"  value="<?php echo $account_name ?>" placeholder="Account Name" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Account Number</label>
                                <input type="text" class="form-control" name="account_num" id="validationCustom04"  value="<?php echo $account_num ?>" placeholder="Account Number" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Swift Code</label>
                                <input type="text" class="form-control" name="swift" id="validationCustom04"  value="<?php echo $swift ?>" placeholder="Swift Code" required>
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Routing Number</label>
                                <input type="text" class="form-control" name="routing" id="validationCustom04"  value="<?php echo $routing ?>" placeholder="Routing Number" required>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    
                    <button class="btn btn-primary" name="save" type="submit">Save</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

 <?php 
	include 'footer.php';
 ?> 