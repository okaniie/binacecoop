<?php  
include 'header.php';
?>


 <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <!-- News Flash -->

		
		     
          
		
		
		
		
		 
		<style>
		td{
			text-align:center;
			color:black;
		}
		th{
			text-align:Center;
		}
		</style>
		
		
		
		
		        <div class="col-xl-12 col-md-12" style="margin-top:20px">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h1><?php echo $sitename ?> - Signal Packages List</h1>
            </div>
			
            <div class="ms-panel-body">
             
             
             
               
	<!-- Our Pricing Table -->
	<section class="ulockd-pricing">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
					<div class="ulockd-main-title">
					 
				</div>
			</div>
			<div class="row ulockd-mrgn1260">
	 		<?php  
        		$query = mysqli_query($link, "SELECT * FROM package1");
        		if (mysqli_num_rows($query) > 0) {
        			while ($data = mysqli_fetch_assoc($query)) {
        	?>
			    <div class="col-xl-4 col-md-4 col-sm-4" style='margin-bottom:5px;float:left'>
			      <div class="card">
			        <div class="card-content">
			          <div class="card-body">
			            <h2 class="card-title" style="text-align:center"><B><?php echo strtoupper($data['pname']) ?> SIGNAL</B></h2>
			              </div>
					  <center>
			          <img class="img-fluid" src="signal.jpg" style="width:150px;height:150px;border-radius:100%;margin-top:-20px" ><br>
					  
					  </center>
			        </div>
					 <ul class="list-group list-group-flush">
			          <li class="list-group-item" style='text-align:center'>Minimum Deposit - $<?php echo $data['froms'] ?></li>
			          <li class="list-group-item" style='text-align:center'>Risk Managements</li>
			          <li class="list-group-item" style='text-align:center'>Standard Options</li>
			          <!-- <li class="list-group-item" style='text-align:center'>Leverage 1 : 300</li> -->
			          
			          <li class="list-group-item" style='text-align:center'><?php echo $data['increase'] ?>% Trading Percentage</li> 
			        </ul>
			        <div class="card-footer d-flex justify-content-between">
			          <a href="signalpay.php?signal=<?php echo $data['id'] ?>" class="btn col-sm-12" style="background-color:#23272D;color:white">Purchase Contract</a>
			        </div>
			      </div>
			    </div>

			<?php }} ?>


			    
			    <!--
				<div class="col-md-6 col-lg-3 ulockd-pad35" style='background-color:#f2f2f2;border-radius:5px;margin:10px'>
					<div class="ulockd-pricing-table text-center">
						<div class="ulocked-pricing-header">
							<div class="ulocked-pricing-tag"><span class="color-white">$1,000</span></div>
							<h2 class="text-uppercase">Basic Plan</h2>
							<p class="sub-title">INDIVIDUALS AND SMALL TEAMS</p>
						</div>
						<div class="ulocked-pricing-details">
							<ul class="list-unstyled">
								<li><a href="#"> Minimum $1,000 </a></li>
								<li><a href="#"> Maximum $5,000 </a></li>
								<li><a href="#"> 15% Daily </a></li>
								<li><a href="#">3 DAY DURATION</a></li>
								<li><a href="#"> Risk management </a></li>
								<li><a href="#"> Leverage - 1:5000 </a></li>
								<li><a href="#"> No Maintanance Fee </a></li>
								<li><a href="#"> 5% Referal Bonus</a></li>
								<li><a href="#"> Standard Options</a></li>
								<li><a href="#"> 1 Account manager </a></li>
								<li><a href="#"> 24/7 Active Support </a></li>
							</ul>
								<a href="signalpay.php" class="btn btn-lg btn-block ulockd-btn-thm2" style='background-color:black;color:#fff'><span> Invest Now</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 ulockd-pad395" style='background-color:#f2f2f2;border-radius:5px;margin:10px'>
					<div class="ulockd-pricing-table text-center">
						<div class="ulocked-pricing-header">
							<div class="ulocked-pricing-tag"><span class="color-white" >$6,000</span></div>
							<h2 class="text-uppercase">Standard Plan</h2>
							<p class="sub-title">GROWING BUSINESSES</p>
						</div>
						<div class="ulocked-pricing-details">
							<ul class="list-unstyled">
								<li><a href="#"> Minimum $6,000 </a></li>
								<li><a href="#"> Maximum $10,000 </a></li>
								<li><a href="#"> 25% Daily </a></li>
								<li><a href="#">6 DAY DURATION</a></li>
								<li><a href="#"> Risk management </a></li>
								<li><a href="#"> Leverage - 1:10000 </a></li>
								<li><a href="#"> No Maintanance Fee </a></li>
								<li><a href="#"> 15% Referal Bonus</a></li>
								<li><a href="#"> Standard Options</a></li>
								<li><a href="#"> 1 Account manager </a></li>
								<li><a href="#"> 24/7 Active Support </a></li>
							</ul>
								<a href="signalpay.php" class="btn btn-lg btn-block ulockd-btn-thm2" style='background-color:black;color:#fff'><span> Invest Now</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 ulockd-pad395" style='background-color:#f2f2f2;border-radius:5px;margin:10px'>
					<div class="ulockd-pricing-table text-center">
						<div class="ulocked-pricing-header">
							<div class="ulocked-pricing-tag"><span class="color-white">$10,000</span></div>
							<h2 class="text-uppercase">Smart Plan</h2>
							<p class="sub-title" style='background-color:#338d25;color:white;border-radius:10px'>NEW * ADVANCED COMPANIES</p>
						</div>
						<div class="ulocked-pricing-details">
							<ul class="list-unstyled">
								<li><a href="#"> Minimum $11,000 </a></li>
								<li><a href="#"> Maximum $50,000 </a></li>
								<li><a href="#"> 55% Daily </a></li>
								<li><a href="#">7 DAY DURATION</a></li>
								<li><a href="#"> Risk management </a></li>
								<li><a href="#"> Leverage - 1:100000 </a></li>
								<li><a href="#"> No Maintanance Fee </a></li>
								<li><a href="#"> 45% Referal Bonus</a></li>
								<li><a href="#"> Advanced Options</a></li>
								<li><a href="#"> 1 Account manager </a></li>
								<li><a href="#"> 24/7 Active Support </a></li>
							</ul>
							<a href="signalpay.php" class="btn btn-lg btn-block ulockd-btn-thm2" style='background-color:black;color:#fff'><span> Invest Now</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 ulockd-pad95" style='background-color:#f2f2f2;border-radius:5px;margin:10px'>
					<div class="ulockd-pricing-table text-center">
						<div class="ulocked-pricing-header">
							<div class="ulocked-pricing-tag"><span class="color-white">$51,100</span></div>
							<h2 class="text-uppercase">Gold Plan</h2>
							<p class="sub-title" style='background-color:#338d25;color:white;border-radius:10px'>NEW * Ultimate</p>
						</div>
						<div class="ulocked-pricing-details">
							<ul class="list-unstyled">
								<li><a href="#"> Minimum $50,000 </a></li>
								<li><a href="#"> Maximum $150,000 </a></li>
								<li><a href="#"> 75% Daily </a></li>
								<li><a href="#">9 DAY DURATION</a></li>
								
								<li><a href="#"> Risk management </a></li>
								<li><a href="#"> Leverage - 1:300000 </a></li>
								<li><a href="#"> No Maintanance Fee </a></li>
								<li><a href="#"> 50% Referal Bonus</a></li>
								<li><a href="#"> Advanced Options</a></li>
								<li><a href="#"> 1 Account manager </a></li>
								<li><a href="#"> 24/7 Active Support </a></li>
							</ul>
								<a href="signalpay.php" class="btn btn-lg btn-block ulockd-btn-thm2" style='background-color:black;color:#fff'><span> Invest Now</span></a>
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</section>
	 
	
            </div>
          </div>
        </div>

      </div>
    </div>



<?php  
include 'footer.php';
?>