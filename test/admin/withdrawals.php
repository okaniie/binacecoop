<?php 
$page = "Withdrawals";
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = "";
	
	if (isset($_POST['approve'])) {
		$with_id = $_POST['with_id'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$method = $_POST['method'];
		$status = $_POST['status'];


		if (isset($status) && $status == "COMPLETED") {
			$msg = "This transaction has been Approved already";
		}else{
			$query = mysqli_query($link, "UPDATE withdrawals SET status = 'COMPLETED' WHERE id = '$with_id' ");

			if ($query) {

				$subject = "Withdrawal Approval!";
				$body = 'Congratulation! Your withdrawal request of '.$amount.' USD  has been approved successfully and you will be credited soon.';
				$send = sendMail($email, $name, $subject, $body);
				$msg = "Transaction has been Approved successfully";
			
			}
			
		}
	}


	if(isset($_POST['delete'])){
		$with_id = $_POST['with_id'];
		mysqli_query($link, "DELETE FROM withdrawals WHERE id = '$with_id' ");
		$msg = "Withdrawal Transaction deleted successfully";
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
		                                    <th>Email</th>
		                                    <th>Method</th>
		                                    <th>Wallet Address</th>
		                                    <th>Amount</th>
		                                    <th>Bank Name</th>
		                                 	<th>Bank Address</th>
		                                    <th>Account Number</th>
		                                    <th>Account Name</th>
		                                    <th>Status</th>
		                                    <th>Date</th>
		                                    <th>Approve/Delete</th>
		                                </tr>
		                                </thead>


		                                <tbody>
		                                	<?php
		                                		$select = mysqli_query($link, "SELECT * FROM withdrawals ");
		                                		if (mysqli_num_rows($select)) {
		                                			while ($row = mysqli_fetch_assoc($select)) {
		                                				$user = $row['email'];
		                                				$user = mysqli_query($link, "SELECT * FROM users WHERE email = '$user' ");
												$user_r = mysqli_fetch_assoc($user);
		                                			
		                                	 ?>
		                                	 <form action="withdrawals.php" method="post">
				                                <tr>
				                                	<input type="hidden" name="name" value="<?php echo $user_r['fname'] ?>">
													<input type="hidden" name="email" value="<?php echo $user_r['email'] ?>">
				                                	<input type="hidden" name="with_id" value="<?php echo $row['id'] ?>">
				                                	<input type="hidden" name="status" value="<?php echo $row['status'] ?>">
				                                	<input type="hidden" name="amount" value="<?php echo $row['amount'] ?>">
				                                	<input type="hidden" name="method" value="<?php echo $row['method'] ?>">
				                                	
				                                    <td><?php echo $row['email'] ?></td>
				                                    <td><?php echo $row['method'] ?></td>
				                                    <td><?php echo $row['wallet'] ?></td>
				                                    <td>$<?php echo $row['amount'] ?></td>
				                                    <td><?php echo $row['bank_name'] ?></td>
				                                    <td><?php echo $row['bank_add'] ?></td>
				                                    <td><?php echo $row['acct_number'] ?></td>
				                                    <td><?php echo $row['acct_name'] ?></td>
				                                    
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
														<button type="submit" name="approve" class="btn btn-success">Approved</button>

														<button type="submit" onclick="alert('Do you want to delete this transaction ?')" name="delete" class="btn btn-danger">Delete</button></td>
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