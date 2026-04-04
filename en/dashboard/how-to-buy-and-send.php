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
                                    src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%5D%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22compact%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A74%2C%22utm_source%22%3A%22encryptollc.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%7D"
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
            <div class="row">

                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h6 class="text-white">NET BALANCE</h6>
                                    <h2 class="text-white m-0 "><?php echo $currency ?> <?php echo number_format($total_balance) ?></h2>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-white display-6"><i
                                            class="fas fa-money-bill-alt fa-2x"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Page Stats -->
            <!-- /row -->
            <div style="padding: 0rem !important" class="card-body">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">MAKING A DEPOSIT</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <h3 class="c-font c-font-bold">

                </h3>
                <ul class="nav bg-inverse-success nav-pills rounded nav-fill mb-3" role="tablist"
                    style="border-bottom: 1px solid #19203a; padding-bottom: 10px;">
                    <li class="nav-item">
                        <a class="nav-link"  href="deposit">
                            <i class="fab fa-btc"></i> Pay with Bitcoin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="pill"
                            href="how-to-buy-and-send">
                            <i class="fa fa-university"></i>Where can i purchase bitcoins</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="nav-tab-paypal">
                        <div style="">
                            <center>
                                <input type="hidden" name="method_of_payment" class="form-control c-square c-theme"
                                    required="" value="BTC">

                                <br /><br />
                                <strong style="font-size: 18px;">Where to buy Cyptocurrencies ?</strong><br /><br />
                                <input style="font-size: 18px;" type="radio" name="h_id" value="1" checked=""
                                    onclick="updateCompound()"> <a href="https://www.paybis.com"
                                    sytle="text-decoration: none; color: inherit; font-size: 18px;">Paybis.com</a>
                                <br>
                                <input style="font-size: 18px;" type="radio" name="h_id" value="1" checked=""
                                    onclick="updateCompound()"> <a href="https://www.moonpay.com"
                                    sytle="text-decoration: none; color: inherit; font-size: 18px;">Moonpay.com</a>
                                <br>
                                <input style="font-size: 18px;" type="radio" name="h_id" value="1" checked=""
                                    onclick="updateCompound()"> <a href="https://www.localbitcoins.com"
                                    sytle="text-decoration: none; color: inherit; font-size: 18px;">Localbitcoins.com</a>
                                <br>
                                <input style="font-size: 18px;" type="radio" name="h_id" value="1" checked=""
                                    onclick="updateCompound()"> <a href="https://www.crypto.com"
                                    sytle="text-decoration: none; color: inherit; font-size: 18px;">Crypto.com</a>
                                <br>

                                <input style="font-size: 18px;" type="radio" name="h_id" value="1" checked=""
                                    onclick="updateCompound()"> <a href="http://trustwallet.com/"
                                    sytle="text-decoration: none; color: inherit; font-size: 18px;">Trustwallet.com</a>
                                <br><br>
                                <center>

                                </center>
                                <div class="line">

                                </div>
                                <script>
                                    function myFunction() {
                                        var copyText = document.getElementById("myInput");
                                        copyText.select();
                                        copyText.setSelectionRange(0, 99999)
                                        document.execCommand("copy");
                                        alert("Copied the text: " + copyText.value);
                                    }
                                </script><br>
                            </center>




                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-bank" style="text-align: center;">
                        <p>Kindly request the payment method that's best for you</p>

                        <dl class="param">
                            <dd><a href="https://xcoins.com/"><button type="button" id="bank-wire"
                                        class="btn btn-dark btn-fw">
                                        <i class="icon-arrow-right-circle"></i> Click here if you're in the United
                                        States to buy bitcoins with your credit card.</button></a></dd>
                        </dl>
                        <dl class="param">
                            <dd><a href="https://payments.changelly.com/"><button type="button" id="bank-wire"
                                        class="btn btn-dark btn-fw">
                                        <i class="icon-arrow-right-circle"></i> Click here if you're in the United
                                        Kindom to buy bitcoins with your credit card.</button></a></dd>
                        </dl>




                    </div>


                </div>
            </div>
        </div>
        <!-- /conatiner -->


<?php 
include 'footer.php';
?>