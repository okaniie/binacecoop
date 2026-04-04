<?php  
include 'header.php';

//TOTAL DEPOSITS
$sql211= "SELECT SUM(amount) as sum_amount FROM deposits WHERE userId = '$uid' and status = 'COMPLETED'";
    $result211 = mysqli_query($link,$sql211);
    $row11 = mysqli_fetch_assoc($result211);
    if($row11['sum_amount'] != ""){
        $sum_amount = $row11['sum_amount'];
    }else{
        $sum_amount = "0";
}

//Active investments
$sql_in = "SELECT SUM(invest_amt) as invest FROM investments WHERE userId = '$uid' and status = '1' ";
    $res_in = mysqli_query($link,$sql_in );
    $row_in = mysqli_fetch_assoc($res_in);
    if($row_in['invest'] != ""){
        $active_inv = $row_in['invest'];
    }else{
        $active_inv = "0";
}

//Total investments
$sql_tin = "SELECT SUM(invest_amt) as invest FROM investments WHERE userId = '$uid' ";
    $res_tin = mysqli_query($link,$sql_tin );
    $row_tin = mysqli_fetch_assoc($res_tin);
    if($row_tin['invest'] != ""){
        $total_tin = $row_tin['invest'];
    }else{
        $total_tin = "0";
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
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>

                                <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
                                    async>
                                        {
                                            "symbols": [
                                                {
                                                    "proName": "FOREXCOM:SPXUSD",
                                                    "title": "S&P 500"
                                                },
                                                {
                                                    "proName": "FOREXCOM:NSXUSD",
                                                    "title": "Nasdaq 100"
                                                },
                                                {
                                                    "proName": "FX_IDC:EURUSD",
                                                    "title": "EUR/USD"
                                                },
                                                {
                                                    "proName": "BITSTAMP:BTCUSD",
                                                    "title": "BTC/USD"
                                                },
                                                {
                                                    "proName": "BITSTAMP:ETHUSD",
                                                    "title": "ETH/USD"
                                                }
                                            ],
                                                "colorTheme": "dark",
                                                    "isTransparent": false,
                                                        "displayMode": "compact",
                                                            "locale": "en"
                                        }
                                    </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" style="padding-top: 35px;"> <img src="images/s1.png"
                                        style="width: 105px; height: 85px;"> <br><br>
                                    <h2 style="font-weight: lighter; font-size: " class=" mb-0">Wallet Balance</h2><br>
                                    <h4 style="font-weight: lighter;">$<?php echo number_format($balance,2) ?></h4><br><br />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" style="padding-top: 35px;"> <img src="images/s2.png"
                                        style="width: 105px; height: 85px;"> <br><br>
                                    <h2 style="font-weight: lighter; font-size: " class=" mb-0">Active Trade</h2><br>
                                    <h4 style="font-weight: lighter;">$<?php echo number_format($active_inv,2) ?></h4><br><br />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" style="padding-top: 35px;"> <img src="images/s3.png"
                                        style="width: 105px; height: 85px;"> <br><br>
                                    <h2 style="font-weight: lighter; font-size: " class=" mb-0">Total Profit</h2><br>
                                    <h4 style="font-weight: lighter;">$<?php echo number_format($profit,2) ?></h4><br><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" style="padding-top: 35px;"> <img src="images/s4.png"
                                        style="width: 105px; height: 85px;"> <br><br>
                                    <h2 style="font-weight: lighter; font-size: " class=" mb-0">Bonus</h2><br>
                                    <h4 style="font-weight: lighter;">$<?php echo number_format($ref_balance,2) ?></h4><br><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" style="padding-top: 35px;"> <img src="images/s6.png"
                                        style="width: 105px; height: 85px;"> <br><br>
                                    <h2 style="font-weight: lighter; font-size: " class=" mb-0">Total Trade</h2><br>
                                    <h4 style="font-weight: lighter;">$<?php echo number_format($total_tin,2) ?></h4><br><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" style="padding-top: 35px;"> <img src="images/r.png"
                                        style="width: 105px; height: 85px;"> <br><br>
                                    <h2 style="font-weight: lighter; font-size: " class=" mb-0">Referrals</h2><br>
                                    <h4 style="font-weight: lighter;"><?php echo $total_ref ?></h4><br><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Page Stats -->

            <!-- Market Stats -->
            <div class="row row-sm">
                <div class="col-xl-12 col-lg-12 col-md-12" style="margin-bottom: 20px;">
                    <div class="tradingview-widget-container" style="margin:30px 0px 10px 0px;">
                      <div id="tradingview_f933e"></div>
                      <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span> <span class="blue-text">Personal trading chart</span></a></div>
                      <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                      <script type="text/javascript">
                      new TradingView.widget(
                      {
                      "width": "100%",
                      "height": "550",
                      "symbol": "COINBASE:BTCUSD",
                      "interval": "1",
                      "timezone": "Etc/UTC",
                      "theme": 'dark',
                      "style": "9",
                      "locale": "en",
                      "toolbar_bg": "#f1f3f6",
                      "enable_publishing": false,
                      "hide_side_toolbar": false,
                      "allow_symbol_change": true,
                      "calendar": false,
                      "studies": [
                        "BB@tv-basicstudies"
                      ],
                      "container_id": "tradingview_f933e"
                    }
                      );
                      </script>
                    </div>
                                            
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12" style="margin-bottom: 20px;">
                     <!-- ============================================================================================================================ -->
                       <div class="tradingview-widget-container__widget swiper-slide" data-aos="fade-down"></div>
                       <script type   ="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                       {
                       "width": "100%",
                       "height": "400",
                       "colorTheme": "dark",
                       "currencies": [
                         "EUR",
                         "USD",
                         "JPY",
                         "GBP",
                         "CHF",
                         "AUD",
                         "CAD",
                         "NZD",
                         "CNY"
                       ],
                       "locale": "en"
                     }
                       </script>
                     </div>
                     <!-- TradingView Widget END -->
                </div>
                
                
            </div> <!-- /row -->

        </div>
        <!-- /conatiner -->



<?php  
include 'footer.php';
?>