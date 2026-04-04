<?php  
include 'header.php';
?>


 <!-- container -->
        <div class="container-fluid">

            <!-- Page Header 2 -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">

                    <div class="d-flex">
                        <i class="fa-solid fa-house"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor" style="color: #ffc108 !important;">Referrals

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
            <div class="row card-body" style="padding: 0rem !important" >
            	<div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><?php echo $sitename ?> Referral System</h2>
									<p>
									<?php echo $sitename ?>'s referral programme is transparent and instantly gives you $<?php echo $ref_bonus ?> whenenver someone signup with your referral link. We have more bonus offers meant for our premium members.</p>
								</div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
											<div class="form-group">
												<div class="form-field">
													<input type="text" class="form-control" value="<?php echo $siteurl ?>/auth/register.php?ref=<?php echo $refcode ?>" id="dash">
													<button onclick="myFunction8()" class="btn btn-primary btn-lg"><i class="fa-copy fa" aria-hidden="true"></i></button>
												</div>
											</div>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                <div class="col-md-l2 col-lg-12">
                           <div class="white_shd full">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>All Referrals</h2>
                                 </div>
                              </div>
                              <div class="full graph_revenue">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="content">
                                          <div class="area_chart">
                              
							  
							  
							        <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          	<thead>
			                                    <tr>
			                                        <th>SN</th>
				                                    <th>Name</th>
				                                    <th>Status</th> 
				                                    <th>Date registered</th>
			                                    </tr>
                                			</thead>
                                 			<tbody>
											<?php  
											$i = 1;
												$query = mysqli_query($link, "SELECT * FROM users WHERE referral = '$refcode' ");
												if (mysqli_num_rows($query) > 0) {
													while ($row = mysqli_fetch_assoc($query)) {
											?>

												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $row['fname']." ".$row['lname'] ?></td>
													<td>Active</td>
													<td><?php echo $row['date'] ?></td>
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
                           </div>
                        </div>



            </div>
          </div>
        </div>
        <!-- /conatiner -->

<script>
    function myFunction8() {
        /* Get the text field */

        var copyText = document.getElementById("dash");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
    }

</script>


<?php  
include 'footer.php';
?>