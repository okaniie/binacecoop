<?php 
include 'header.php'; 
$msg = "";

if(isset($_POST['delete'])){
    $uid = trim($_POST['userId']);
    
    mysqli_query($link, "DELETE FROM users WHERE id = '$uid' ");
    echo '<script>alert("User Account was deleted successfully");window.location.href = "users.php" </script>';
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
<?php 
    if ($msg != "") {
        echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>"; 
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
<div class="page-content">
    <div class="container-fluid">

			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-header">
			                <h4 class="card-title mb-0">All Users</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr>
			                                    <th>Full Name</th>
												<th>Email</th>
					              				<th>Total Profit</th>
												<th>Account Balance</th>
												<th>Date</th>
												<th>ACTION</th>
                                             	<th>ACTION</th>
                                                <!-- <th>ACTION</th> -->
			                                </tr>
			                            </thead>
								        <tbody>  
								          <?php $sql= "SELECT * FROM users ORDER BY id DESC";
											  $result = mysqli_query($link,$sql);
											  if(mysqli_num_rows($result) > 0){
												  while($row = mysqli_fetch_assoc($result)){  
											
												  ?>
				                    	 	<tr>
						                    	<form action="users.php" method="post">
						                    	    <input type="hidden" name="userId" value="<?php echo $row['id'];?>">
										            <td><?php echo $row['fname']." ".$row['lname'];?></td>
													<td id="email"><?php echo $row['email'];?></td>
													<td>$<?php echo $row['profit'];?></td>
													<td>$<?php echo $row['balance'];?></td>
						              				<td><?php echo $row['date'];?></td>
						              				<td> <a href="user-edit.php?email=<?php echo $row['email']?>"> 
		                                            <button type="button" name="edit" style="width:100%" class="btn btn-primary"><span class="fa fa-check">-Edit </span></button></a></td>
		                                            
		                                           <td><button type="submit" onclick="return confirm('Do you want to delete this account')" name="delete" style="width:100%" class="btn btn-danger"><span class="fas fa-trash">-Delete </span></button></td>
                                           
											</form>
											</tr>
				                        <?php }} ?>
								           
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