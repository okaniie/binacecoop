<?php 
$page = "Wallets";
include 'header.php';

$msg = "";

$msg = "";

if (isset($_POST['save'])) {
  $wallet_name = trim($_POST['wallet_name']);
  $wallet_address = trim($_POST['wallet_address']);
  if (!empty($wallet_name) && !empty($wallet_address)) {
    $insert = mysqli_query($link, "INSERT INTO wallet (`name`, `address`) VALUES ('$wallet_name', '$wallet_address') ");
    if ($insert) {
      $msg = "New Wallet Added";
    }
  }
}

if (isset($_POST['edit'])) {
  $wallet_name = trim($_POST['wallet_name']);
  $wallet_address = trim($_POST['wallet_address']);
  $id = $_POST['id'];
  if (!empty($wallet_name) && !empty($wallet_address)) {
    $update = mysqli_query($link, "UPDATE wallet SET name = '$wallet_name', address = '$wallet_address' WHERE id = '$id' ");
    if ($update) {
      $msg = "Wallet Edited Successfully";
    }
  }
}

if (isset($_GET['del'])) {
  $id = $_GET['del'];
    $delete = mysqli_query($link, "DELETE FROM wallet WHERE id = '$id' ");
    if ($delete) {
      $msg = "Wallet Deleted Successfully";
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
		                                    <th>Wallet Name</th>
		                                    <th>Wallet Address</th>
		                                    <th>Edit</th>
		                                </tr>
		                                </thead>


		                                <tbody>
		                                	<?php
		                                		$select = mysqli_query($link, "SELECT * FROM wallet ");
		                                		if (mysqli_num_rows($select)) {
		                                			while($row = mysqli_fetch_assoc($select)){
		                                			
		                                	 ?>
		                                	 <form method="post">
				                                <tr>
				                                	<td><?php echo $row['name'] ?></td>
				                                	<td><?php echo $row['address'] ?></td>
				                                	<td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bs-edit-modal-center<?php echo $row['id'] ?>">Edit Wallet</button> </td>
				                                </tr>
			                                </form>


      <!-- Edit Wallet -->

<div class="modal fade bs-edit-modal-center<?php echo $row['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Wallet Name</label>
                                    <input type="text" required="" value="<?php echo $row['name'] ?>" name="wallet_name" class="form-control" autocomplete="off" placeholder="Enter Wallet Name">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="lastName" class="form-label">Wallet Address</label>
                                    <input type="text" name="wallet_address" value="<?php echo $row['address'] ?>" required="" class="form-control" autocomplete="off" placeholder="Enter Wallet Address">
                                </div>
                            </div>

                            <div class="col-xxl-12">
                                <div>
                                    <button type="submit" name="edit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                           
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

 <!-- Add Wallet -->

<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add New Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Wallet Name</label>
                                    <input type="text" required="" name="wallet_name" class="form-control" autocomplete="off" placeholder="Enter Wallet Name">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="lastName" class="form-label">Wallet Address</label>
                                    <input type="text" name="wallet_address" required="" class="form-control" autocomplete="off" placeholder="Enter Wallet Address">
                                </div>
                            </div>

                            <div class="col-xxl-12">
                                <div>
                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                           
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php 
include 'footer.php';
?>