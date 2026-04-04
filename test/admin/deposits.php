<?php 
$page = "Deposits";
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$msg = "";
	
	if (isset($_POST['approve'])) {
		$depost_id = $_POST['deposit_id'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$method = $_POST['method'];
		$status = $_POST['status'];
		$currency = $_POST['currency'];

		if (isset($status) && $status == "Approved") {
			$msg = "This transaction has been Approved already";
		}else{
			$query = mysqli_query($link, "UPDATE deposits SET status = 'Approved' WHERE id = '$depost_id' ");

			if ($query) {
				mysqli_query($link, "UPDATE users SET balance = balance + $amount  WHERE email = '$email' ");
				$subject = "Deposit Approval";
				$body = 'Congratulation! Your deposit of '.$amount.' '.$currency.' worth of '.$method.' has been approved successfully and your account balance has been updated. ';
				$send = sendMail($email, $name, $subject, $body);
				
			$msg = "Transaction has been Approved successfully";
			}
			
		}
	}

	if(isset($_POST['delete'])){
		$depost_id = $_POST['deposit_id'];
		mysqli_query($link, "DELETE FROM deposits WHERE id = '$depost_id' ");
		$msg = "Deposit Transaction deleted successfully";
	}

	if (isset($_POST['cancel'])) {
		$depost_id = $_POST['deposit_id'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$method = $_POST['method'];
		$status = $_POST['status'];
		$currency = $_POST['currency'];

		if (isset($status) && $status == "CANCELLED") {
			$msg = "This transaction has been cancelled already";
		}else{
			$query = mysqli_query($link, "UPDATE deposits SET status = 'CANCELLED' WHERE id = '$depost_id' ");

			if ($query) {
				
				$subject = "Deposit Cancelled";
				$body = 'Sorry! Your deposit of '.$amount.' '.$currency.' worth of '.$method.' has was cancelled  ';
				$send = sendMail($email, $name, $subject, $body);
				$msg = "Transaction has been cancelled successfully";
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
							<div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
		                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
		                                <thead>
		                                <tr>
		                                    <th>Method</th>
		                                    <th>Deposited By</th>
		                                    <th>Amount</th>
		                                    <th>Status</th>
		                                    <th>Date</th>
		                                    <th>Approve/Delete</th>
		                                </tr>
		                                </thead>


		                                <tbody>
		                                	<?php
		                                		$select = mysqli_query($link, "SELECT * FROM deposits ");
		                                		if (mysqli_num_rows($select)) {
		                                			while ($row = mysqli_fetch_assoc($select)) {
		                                				$user = $row['email'];
		                                				$user = mysqli_query($link, "SELECT * FROM users WHERE email = '$user' ");
												$user_r = mysqli_fetch_assoc($user);
		                                			
		                                	 ?>
		                                	 <form action="deposits.php" method="post">
				                                <tr>
				                                	<input type="hidden" name="name" value="<?php echo $user_r['fname'] ?>">
													<input type="hidden" name="email" value="<?php echo $user_r['email'] ?>">
				                                	<input type="hidden" name="deposit_id" value="<?php echo $row['id'] ?>">
				                                	<input type="hidden" name="status" value="<?php echo $row['status'] ?>">
				                                	<input type="hidden" name="amount" value="<?php echo $row['amount'] ?>">
				                                	<input type="hidden" name="method" value="<?php echo $row['method'] ?>">
				                                	<input type="hidden" name="currency" value="<?php echo $row['currency'] ?>">
				                                	
				                          
				                                    <td><?php echo $row['method'] ?></td>
				                                    <td><?php echo $row['email'] ?></td>
				                                    <td><?php echo $row['amount'] ?> <?php echo $row['currency'] ?></td>
				                                    <td>
				                                    	<?php 
				                                    		if ($row['status'] == "Pending") {
				                                    	 ?>
				                                    	 <button type="button" class="btn btn-warning"><?php echo $row['status'] ?></button>
				                                    	<?php }else{ ?>
				                                    	<button type="button" class="btn btn-success"><?php echo $row['status'] ?></button>
				                                    <?php } ?>
				                                    </td>
				                                    <td><?php echo $row['date'] ?></td>
				                                    <td>

				                                    	<?php 
														if ($row['status'] == "Pending") {
														
													 ?>
														<button onclick="return confirm('Do you want to approve')" type="submit" name="approve" class="btn btn-success">Approved</button>

														<button type="submit" name="cancel" class="btn btn-danger">Cancel</button></td>
													<?php }else{

													 ?>
													 <button type="submit" onclick="alert('Do you want to delete this transaction ?')" name="delete" class="btn btn-danger">Delete</button></td>

													<?php } ?>
				                                    </td>
				                                </tr>
			                                </form>
			                                <?php }
		                                		} ?>
		                            	</tbody>
		                            </table>
		                        </div>
		                    </div>
                        </div>
                    </div>
                </div>

            </div>



<?php 
include 'footer.php';
?>