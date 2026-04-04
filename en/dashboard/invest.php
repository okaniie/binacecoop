<?php  
include 'header.php';

$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$planId = text_input($_POST['plan']);
	$amount = text_input($_POST['amount']);

	if (empty($planId)) {
		$err = "Select a plan";
	}else{
		$qq = mysqli_query($link, "SELECT * FROM package1 WHERE id = '$planId' ");
		if (mysqli_num_rows($qq) > 0) {
			$pln = mysqli_fetch_assoc($qq);
			$plan_name = $pln['pname']; 
			$plan_increase = $pln['increase']; 
			$plan_duration = $pln['duration']; 
			$min_amt = $pln['min_amt']; 
			$max_amt = $pln['max_amt']; 
		}
	}

	if (empty($amount)) {
		$err = "Input your investment amount";
	}

	if ($amount > $balance) {
		$err = "Insufficient fund to purchase this plan";
	}

	if ($amount < $min_amt) {
		$err = "Invest amount should not be lower than $".$min_amt;
	}elseif ($amount > $max_amt) {
		$err = "Invest amount should not be higher than $".$max_amt;
	}

	if (empty($err)) {
		$start_date = date('d-m-Y H:i:s');
		$end_date  = date('d-m-Y H:i:s', strtotime(' + '.$plan_duration.' hours'));
		$total_profit = ($plan_increase/100) * $amount;

		$sql = mysqli_query($link, "INSERT INTO investments (`userId`, `planId`, `invest_amt`, `plan_name`, `increase`, `duration`, `total_profit`, `start_date`, `end_date`, `status`) VALUES ('$uid', '$planId', '$amount', '$plan_name', '$plan_increase', '$plan_duration', '$total_profit', '$start_date', '$end_date', '1' ) ");

		if ($sql) {
      mysqli_query($link, "UPDATE users SET balance = balance - $amount WHERE id = '$uid' ");
			echo "<script>window.location.href = 'investment-history.php' </script>";
		}
	}

}
?>


 <!-- container -->
        <div class="container-fluid">

            <!-- Page Header 2 -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">

                    <div class="d-flex">
                        <i class="fa-solid fa-house"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor" style="color: #ffc108 !important;"> My Account

                        </p>
                    </div>
                </div>




                <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                    <a href="deposit">
                        <button type="button" class="btn btn-success mr-3 mt-2 mt-xl-0">
                            <i class="fas fa-arrow-alt-circle-down"></i> DEPOSIT
                        </button></a>
                    <a data-toggle="sidebar-right" data-target=".sidebar-right">
                        <button type="button" class="btn btn-warning btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="fa fa-id-card "></i>
                        </button></a>
                    <a href="logout">
                        <button type="button" class="btn btn-success btn-icon mr-3 mt-2 mt-xl-0">
                            <i class="fa fa-power-off"></i>
                        </button></a>

                </div>
            </div>
            <!-- /breadcrumb -->




            <!-- row  -->
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class=" overflow-hidden bg-transparent card-crypto-scroll shadow-none">
                        <div class="js-conveyor-example jctkr-wrapper jctkr-initialized">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container" style="width: 100%; height: 74px;">
                                <iframe scrolling="no" allowtransparency="true" frameborder="0"
                                    src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%5D%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22compact%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A74%2C%22utm_source%22%3A%22bitcoinlegalminingllc.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%7D"
                                    style="box-sizing: border-box; height: 74px; width: 100%;"></iframe>


                                <style>
                                    .tradingview-widget-copyright {
                                        font-size: 13px !important;
                                        line-height: 32px !important;
                                        text-align: center !important;
                                        vertical-align: middle !important;
                                        /* @mixin sf-pro-display-font; */
                                        font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
                                        color: #9db2bd !important;
                                    }

                                    .tradingview-widget-copyright .blue-text {
                                        color: #2962FF !important;
                                    }

                                    .tradingview-widget-copyright a {
                                        text-decoration: none !important;
                                        color: #9db2bd !important;
                                    }

                                    .tradingview-widget-copyright a:visited {
                                        color: #9db2bd !important;
                                    }

                                    .tradingview-widget-copyright a:hover .blue-text {
                                        color: #1E53E5 !important;
                                    }

                                    .tradingview-widget-copyright a:active .blue-text {
                                        color: #1848CC !important;
                                    }

                                    .tradingview-widget-copyright a:visited .blue-text {
                                        color: #2962FF !important;
                                    }
                                </style>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- /row -->
            <div class="row" >
             <div class="col-md-12">
                <div class="content">
                   <div class="area_chart">

                    <?php  
                      if ($err != "") {
                    ?>
                      <div class="alert alert-danger"><?php echo $err ?></div>
                  <?php } ?>



                      <div class="position-center">
                         <form class="form-horizontal bucket-form" action="invest.php" method="POST">

                            <div class="row">


                               <div class="form-group">
                               	<?php  
						      		$qqr = mysqli_query($link, "SELECT * FROM package1");
						      		if (mysqli_num_rows($qqr) > 0) {
						      			while ($rw = mysqli_fetch_assoc($qqr)) {
						      	?>
                                  <div class="col-lg-6 col-md-12 col-sm-12"
                                     style="border:3px solid #fff; float:left; width:100%;  padding-top:20px; padding-bottom:20px;">
                                     <div class="container">
                                        <label class="">

                                           <span style="color: #3da14b; font-weight: bold;"> <?php echo strtoupper($rw['pname']) ?></span><br> <?php echo $rw['increase'] ?>% Interest after <?php echo $rw['duration'] ?> hours <br>Amount:
                                           $<?php echo $rw['min_amt'] ?> - $<?php echo $rw['max_amt'] ?>
                                           <br> <input type="radio" name="plan" id="investment_id"
                                              value="<?php echo $rw['id'] ?>" required="required"><b> INVEST PLAN
                                           </b> </label>
                                     </div>
                                  </div>
                                  
                                <?php  
                                	}
                                }
                                ?>

                               </div>



                            </div>
                            <!-- /row-->
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="form-group">
                                     <label> Enter Amount</label>
                                     <input type="number" class="form-control" name="amount"
                                        min="50" placeholder=" Investment Amount" required>

                                  </div>
                               </div>

                            </div>

                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <button type="submit"
                                        style="background-color:#3da14b; color:#fff;"
                                        class="btn">Purchase Investment</button>
                                  </div>
                               </div>

                            </div>

                         </form>
                      </div>




                   </div>
                </div>

             </div>
          </div>

        </div>
        <!-- /conatiner -->



<?php  
include 'footer.php';
?>