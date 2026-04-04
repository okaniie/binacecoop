<?php 
$page = "Admin Account";
include 'header.php';

$msg = "";

if (isset($_POST['change'])) {
	$admin_mail = $_POST['admin_mail'];
	$admin_pass = $_POST['admin_pass'];
	if (!empty($admin_mail) && !empty($_POST['admin_pass'])) {
		$save = mysqli_query($link, "UPDATE admin SET email = '$admin_mail', password = '$admin_pass' ");
		if ($save) {
			$msg = "Changed";
		}
	}
}

?>





<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
        		<div class="row">
        			<form method="post" action="account.php" enctype="multipart/form-data">
        				<?php 
        					if ($msg != "") {
        				 ?>
        				 <div class="alert alert-success"> <?php echo $msg ?>	</div>
        				<?php } ?>
                    <div style="margin:auto;" class="col-lg-6 col-sm-12 col-md-12" >
                        <div class="text-center">
                            <div class="mb-4">
                       
                            <input type="email" name="admin_mail" class="form-control" value="<?php echo $aemail ?>">
                            <br>

                            <input type="password" name="admin_pass" class="form-control" value="<?php echo $apass ?>">
                            <br>
                            	<button type="submit" name="change" class="btn btn-primary">Change</button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
                   
            
        </div>
    </div>
</div>



<?php 

include 'footer.php';
?>