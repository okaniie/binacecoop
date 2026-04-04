<?php 
$page = "Dashboard";
include 'header.php';

$sql = "SELECT * FROM users ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				
              $total= mysqli_num_rows($result);
				
			  }else{
				$total = 0  ;
			  }

$sql1 = "SELECT * FROM deposits ";
	  $result1 = mysqli_query($link,$sql1);
	  if(mysqli_num_rows($result1) > 0){
		
	  $total_depo = mysqli_num_rows($result1);
		
	  }else{
		$total_depo = 0  ;
	  }
$sql2 = "SELECT * FROM withdrawals ";
	  $result2 = mysqli_query($link,$sql2);
	  if(mysqli_num_rows($result2) > 0){
		
	  $total_with = mysqli_num_rows($result2);
		
	  }else{
		$total_with = 0  ;
	  }

	 $sql211= "SELECT SUM(amount) as sum_amount FROM deposits WHERE status = 'COMPLETED'";
		    $result211 = mysqli_query($link,$sql211);
		    $row11 = mysqli_fetch_assoc($result211);
		    if($row11['sum_amount'] != ""){
		    	$total_depo_amt = $row11['sum_amount'];
		    }else{
		    	$total_depo_amt = "0.00";
		}

		$sql2113= "SELECT SUM(amount) as sum_amount FROM withdrawals WHERE status = 'COMPLETED'";
		    $result2113 = mysqli_query($link,$sql2113);
		    $row311 = mysqli_fetch_assoc($result2113);
		    if($row311['sum_amount'] != ""){
		    	$total_with_amt = $row311['sum_amount'];
		    }else{
		    	$total_with_amt = "0.00";
		}
?>

			<div class="row">
                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class=" mb-3 lh-1 d-block " style=" font-size: 16px; font-weight: bold;">TOTAL DEPOSITS </span>
                                    <h4 class="mb-3">
                                        <span ><?php echo $total_depo ?></span>
                                    </h4>
                                </div>
                                <hr>
                                
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-warning">Total Deposits</button>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class=" mb-3 lh-1 d-block " style=" font-size: 16px; font-weight: bold;">TOTAL  WITHDRAWAL</span>
                                    <h4 class="mb-3">
                                        <span ><?php echo $total_with ?></span>
                                    </h4>
                                </div>
                                <hr>
                                
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-warning">Total Withdrawals</button>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class=" mb-3 lh-1 d-block " style=" font-size: 16px; font-weight: bold;">NUMBER OF USERS</span>
                                    <h4 class="mb-3">
                                        <span ><?php echo $total ?></span>
                                    </h4>
                                </div>
                                <hr>
                                
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-secondary">All Users</button>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


  
            </div><!-- end row-->

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class=" mb-3 lh-1 d-block " style=" font-size: 16px; font-weight: bold;">TOTAL DEPOSITED AMOUNT </span>
                                    <h4 class="mb-3">
                                        $<span ><?php echo $total_depo_amt ?></span>
                                    </h4>
                                </div>
                                <hr>
                                
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-warning">Total Deposited Amount</button>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-6 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class=" mb-3 lh-1 d-block " style=" font-size: 16px; font-weight: bold;">TOTAL WITHDRAWAL AMOUNT</span>
                                    <h4 class="mb-3">
                                        $<span ><?php echo $total_with_amt ?></span>
                                    </h4>
                                </div>
                                <hr>
                                
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-warning">Total Withdrawal Amount</button>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                


  
            </div><!-- end row-->


<?php 
include 'footer.php';
?>