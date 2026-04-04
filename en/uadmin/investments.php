<?php 
include 'header.php'; 
$msg = $err = "";

if(isset($_POST['stop'])){
  $invest_id = trim($_POST['invest_id']);
  $cdate = date('Y-m-d H:i:s');

    $sql1 = "UPDATE investments SET  status = '0' WHERE id= '$invest_id' ";
    
 

  if(mysqli_query($link, $sql1)){
	
  $msg = "Investment is successfully stopped!";


}else{
		

    $err = "Investment cannot be stopped ! ";
}
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
        echo customAlert("success", $msg);
        echo pageRedirect("2", "investments.php");
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
			                <h4 class="card-title mb-0">All Investments</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr>
			                                	<th style="display: none"></th>
			                                	<th style="display: none"></th>
			                                    <th>Investor</th>
												<th>Plan</th>
												<th>Amount Invested</th> 
						              			<th>Total Plan Profit</th>
						              			<th>Percentage</th>
						              			<th>Duration</th>
						            			<th>Start Date</th>
												<th>End Date</th>                         
						                        <th>Status</th>
						                        <th>Action</th>
			                                </tr>
			                            </thead>
								        <tbody>
					    <?php

							$sql = "SELECT * FROM investments ORDER BY id DESC ";
						  		$result = mysqli_query($link,$sql);
							if(mysqli_num_rows($result) > 0){
				  				while($row = mysqli_fetch_assoc($result)){   
					  			$userId = $row['userId'];
					  			$su = mysqli_query($link, "SELECT fname,lname,email FROM users WHERE id = '$userId' ");
					  			if(mysqli_num_rows($su)){
					  				$row_user = mysqli_fetch_assoc($su);
					  			}
					 
 	

				  	?>

						<tr class="primary">
						<form action="investments.php" method="post">
							<input type="hidden" name="invest_id" value="<?php echo $row['id'] ?>">
						<td style="display:none;"><input type="hidden" name="email" value="<?php echo $row_user['email'];?>"> </td>
						  <td style="display:none;"><input type="hidden" name="uid" value="<?php echo $row_user['id'];?>"> </td>
						<td style="font-weight: bold;"><?php echo strtoupper($row_user['fname']." ".$row_user['lname']) ?>(<?php echo $row_user['email'];?>)</td>
                          <td><?php echo $row['plan_name'];?> </td>
						  <td>$<?php echo $row['invest_amt'] ?></td>
						  <td>$<?php echo $row['total_profit'] ?></td>
						  <td><?php echo $row['increase'] ?>%</td>
						  <td><?php echo $row['duration'] ?>Hr(s)</td>
						  <td><?php echo $row['start_date'] ?></td>
						  <td><?php echo $row['end_date'] ?></td>
						  <td><?php echo $row['status'] == 1 ? '<div class="btn btn-primary">Active</div>' : '<div class="btn btn-success">Completed</div>' ?></td>
						
                             <td><button class="btn btn-danger" type="submit" onclick="return confirm('do you want to end this investment ?')" name="stop" ><span class="fa fa-times"> Stop Investment</span></button></td>
	
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