<?php 
$page = "Investments";
include 'header.php';

$msg = "";

if(isset($_POST['stop'])){
	
	
  $uemail = $_POST['email'];
  $uid = $_POST['uid'];
  $cdate = date('Y-m-d H:i:s');

    $sql1 = "UPDATE investment SET activate = '0' WHERE email='$uemail' AND id='$uid'";
    
 

  if(mysqli_query($link, $sql1)){
	
  $msg = "package is successfully stopped!";


}else{
		

    $msg = "Package cannot be stopped ! ";
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
		                                    <th>Email</th>
											<th>Type</th>
									
											<th style="display:none;"></th>
											<th style="display:none;"></th>
											<th>Daily Profit</th>
								            <th>Total Plan Profit</th>
								            <th>Activation Date</th>
											<th> End Date</th>
											<th>Days to End</th>
					            			<th>Amount Invested</th>            
					                        <th>Status</th>	
					                        <th>Action</th>
		                                </tr>
		                                </thead>


		                                <?php 
			$sql= "SELECT * FROM investment ORDER BY id DESC ";
				$result = mysqli_query($link,$sql);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){   
				 	$pdate = $row['pdate'];
				 	$duration = $row['duration'];
					$increase = $row['increase'];
					$usd = $row['usd'];
					$uid = $row['id'];
					$email = $row['email'];					 
					$date = $row['pdate'];
					$payday = $row['payday'];
					$plan_name = $row['cointype'];
					$lprofit = $row['lprofit'];
					$paypackage = new DateTime($payday);
					$payday = $paypackage->format('Y/m/d');


					if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){

							if($row['activate'] == 0){
								$endpackage = new DateTime($pdate);
									$endpackage->modify( '+ '.$duration. 'day');
									$Date2 = $endpackage->format('Y/m/d');
									$days = 0;
							}else{
						          $endpackage = new DateTime($pdate);
						          $endpackage->modify( '+ '.$duration. 'day');
								  $Date2 = $endpackage->format('Y/m/d');
								  $current=date("Y/m/d");
									  $diff = abs(strtotime($Date2) - strtotime($current));
									  $one = 1;

						          $date3 = new DateTime($Date2);
						           $date3->modify( '+'. $one.'day');
						           $date4 = $date3->format('Y/m/d');
									    $days = floor($diff / (60*60*24));
									$daily = $duration - $days;
									 $one = 1;
									$f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));




								if(isset($days) && $days == 0 || $Date2 == (date("Y/m/d")) || (date("Y/m/d")) >= $Date2  ){
								    
								    
								    $percentage = ($increase/100) * $duration * $usd;
								    $allprofit = $percentage - $lprofit;
								       $pp =   $allprofit;   
								       $ppr = $pp + $usd;
								    
									$_SESSION['pprofit'] = $percentage;
									 $sql = "UPDATE users SET balance = balance + $pp, profit = profit + $pp  WHERE email='$email'";
									 
									  $sql13 = "UPDATE investment SET activate = '0', profit = '$percentage', payday = '$current'  WHERE email='$email' AND id = '$uid'";
									 
									 
								  if(mysqli_query($link, $sql)){
									mysqli_query($link, $sql13);
									
									$percentage = $pp = 0;
									
										$Date2 = 0;
									$current = 0;
									$duration = 0;

									$days = 'package completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
									$days = 0;

									$current = 0;
									$duration = 0;

								  }
								}else{
								    if($payday == $current){
								        
								    }else{
								        
								    	$percentage = ($increase/100) * $daily * $usd;
								    
								    	$allprofit = $percentage - $lprofit;
								    
								     	$sql131 = "UPDATE investment SET profit = '$percentage', payday = '$current', lprofit = '$percentage' WHERE email='$email' AND id = '$uid'";
								      	$sql21 = "UPDATE users SET balance = balance + $allprofit, profit = profit + $allprofit  WHERE email='$email'";
								     
								     	mysqli_query($link, $sql131);
								     	mysqli_query($link, $sql21);
								    }


							}

								$add = "days";
							}    
				 }



			if(isset($_SESSION['pprofit'])){

			  $profit = $_SESSION['pprofit'];
			}else{
			  //session_destroy($_SESSION['pprofit']);
			  $profit = "";
			}
 

			$sql40= "SELECT * FROM investment WHERE email='$email' AND id = '$uid'";
			$result40 = mysqli_fetch_assoc(mysqli_query($link,$sql40));
			$percentage = $result40['profit'];
			if(isset($result40['activate']) &&  $result40['activate']== '1'){
				
				$sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';
			}else{
				$sec ='Completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
			}


				  ?>



											 	<tr>
											 		<td><?php echo $row['email'] ?></td>
											 		<td><?php echo $row['pname'] ?></td>
											
											 		<td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
						  							<td style="display:none;"><input type="hidden" name="uid" value="<?php echo $row['id'];?>"> </td>
											 		<td><?php echo $row['increase']."%" ?></td>
											 		<td>$<?php echo $percentage;?></td>
											 		<td><?php echo $date;?></td>
                            						<td><?php echo $Date2;?></td>
                            						<td><?php echo $days; ?> Day(s)</td>
                            						<td>$<?php echo $usd;?></td>
                            						<td><?php echo $sec ;?></td>
											 		<td><button class="btn btn-danger" type="submit" name="stop" ><span class="fa fa-times"> Stop Package</span></button></td>
											 	</tr>



											 <?php 
											 }
												}
											  ?>
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