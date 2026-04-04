<?php 
$page = "Manage Users";
  include "header.php";

  $msg = "";
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
		                                    <th>Full Name</th>
		                                    <th>Currency</th>
		                                    <th>Total Balance</th>
		                                
		          
		                                    <th>Edit</th>
		                                </tr>
		                                </thead>


		                                <tbody>
		                                	<?php 
		                                		$select = mysqli_query($link, "SELECT * FROM users ");
		                                		if (mysqli_num_rows($select) > 0) {
													while ($row = mysqli_fetch_assoc($select)) {


		                                	 ?>
		                                	 <form action="" method="post">
				                                <tr>
				                                
				                                	<td><?php echo $row['email'] ?></td>
				                                	<td><?php echo $row['fname'] ?></td>
				                                	<td><?php echo $row['currency'] ?></td>
				                                	<td>$<?php echo $row['balance'] ?></td>
				                                
				                                	
				                                	<td><a class="btn btn-info" href="edit-user.php?user=<?php echo $row['email'] ?>">Edit</a></td>
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
  include "footer.php";
 ?>