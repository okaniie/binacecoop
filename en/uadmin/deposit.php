<?php 
include 'header.php'; 
$msg = "";
$err = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	if (isset($_POST['approve'])) {
		$depost_id = $_POST['deposit_id'];
		$userId = $_POST['userId'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$method = $_POST['method'];
		$status = $_POST['status'];
		$referral = $_POST['referral'];
		if (isset($status) && $status == "COMPLETED") {
			$msg = "This transaction has been Approved already";
		}else{
			$query = mysqli_query($link, "UPDATE deposits SET status = 'COMPLETED' WHERE id = '$depost_id' ");

			if ($query) {
				$refb = ($ref_bonus/100) * $amount;
				$update = mysqli_query($link, "UPDATE users SET balance = balance + '$amount'  WHERE id = '$userId' ");
				if($update){
				    mysqli_query($link, "UPDATE users SET ref_balance = ref_balance + '$refb'  WHERE refcode = '$referral' ");

    				$subject = "Deposit Approval!";
    				$body = "<p>Dear ".$name."</p> <p>Congratulation! Your deposit of $".$amount."  worth of ".$method." has been approved successfully and your account balance has been updated.  </p> ";
    
    				sendMail($email, $name, $subject, $body);
    				echo "<script>alert('Transaction has been approved');window.location.href = window.location.href </script>";
				}else{
				    // echo "<script>alert('".mysqli_error($link)."');window.location.href = window.location.href </script>";
				    $msg = mysqli_error($link);
				}
				
                
                
			
			}
// 			$msg = "Transaction has been Approved successfully";
		}
	}

	if(isset($_POST['delete'])){
		$depost_id = $_POST['deposit_id'];
		mysqli_query($link, "DELETE FROM deposits WHERE id = '$depost_id' ");
		$msg = "Deposit Transaction deleted successfully";
	}

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  

  <link rel="stylesheet" href=" https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css">



  

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="">
 
  

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
   
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<style>
.table-responsive {
overflow-x: hidden;
}
@media (max-width: 8000px) {
.table-responsive {
overflow-x: auto;
}
</style>
<div class="page-content">
    <div class="container-fluid">
<?php 
    if ($msg != "") {
        echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>"; 
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-header">
			                <h4 class="card-title mb-0">All Deposits</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr class="info">
												<th>Name</th>
												<th>Email</th>
												<th>Amount(USD)</th>
												<th>Method</th>
												<th>Status</th>
												<th>Date</th>
						                        <th>Action</th>						                        
						                        <th>Action</th>
								
											</tr>
			                            </thead>
								        <tbody>
									<?php 
									$sql= "SELECT * FROM deposits WHERE status = 'PENDING' ";
									  $result = mysqli_query($link,$sql);
									  if(mysqli_num_rows($result) > 0){
										  while($row = mysqli_fetch_assoc($result)){   
										  	$userId = $row['userId'];
										  	$user = mysqli_query($link, "SELECT * FROM users WHERE id = '$userId' ");
											$user_r = mysqli_fetch_assoc($user);
				  						?>
				  		
						<tr class="primary">
						<form method="post">
                            <input type="hidden" name="name" value="<?php echo $user_r['fname'] ?>">
							<input type="hidden" name="email" value="<?php echo $user_r['email'] ?>">
							<input type="hidden" name="referral" value="<?php echo $user_r['referral'] ?>">
                        	<input type="hidden" name="deposit_id" value="<?php echo $row['id'] ?>">
                        	<input type="hidden" name="status" value="<?php echo $row['status'] ?>">
                        	<input type="hidden" name="amount" value="<?php echo $row['amount'] ?>">
                        	<input type="hidden" name="method" value="<?php echo $row['method'] ?>">
                        	<input type="hidden" name="userId" value="<?php echo $row['userId'] ?>">
							<td><?php echo $user_r['fname']." ".$user_r['lname'] ?></td>
							<td><?php echo $user_r['email'] ?></td>
							<td>$<?php echo $row['amount'] ?></td>
							<td><?php echo $row['method'] ?></td>
							<td><?php echo $row['status'] ?></td>
							<td><?php echo $row['date'] ?></td>
                            <td><button onclick="return confirm('Carry out action')" type="submit" name="approve" class="btn btn-success">Approved</button></td>
                            
							
							<td><button type="submit" onclick="return confirm('Do you want to delete this transaction ?')" name="delete" class="btn btn-danger">Delete</button></td></td>
							
   
						</form>
						</tr>
						
					  <?php
 }
			  }
			  ?>
					</tbody>

								      </table>  

			                        
			                    </div>


			                </div>
			            </div><!-- end card -->
			        </div>
			        <!-- end col -->
			    </div>
			    <!-- end col -->
			</div>
			<!-- end row -->


	</div>
</div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<?php include 'footer.php'; ?>