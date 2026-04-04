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
            </div> <!-- /breadcrumb -->




            <!-- row  -->
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class=" overflow-hidden bg-transparent card-crypto-scroll shadow-none">
                        <div class="js-conveyor-example jctkr-wrapper jctkr-initialized">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container" style="width: 100%; height: 74px;">
                                <iframe scrolling="no" allowtransparency="true" frameborder="0"
                                    src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%5D%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22compact%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A74%2C%22utm_source%22%3A%22cryptofxaitrades.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%7D"
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
            </div> <!-- Page Stats -->
            <!-- /row -->
            <div class="col-xl-12" style="padding-right: 0;padding-left: 0;">
                <span class="form-heading lead ">

                </span>
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">DEPOSIT HISTORY</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap dataTable no-footer" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-20p border-bottom-0">#</th>
                                        <!--<th class="wd-20p border-bottom-0">Date</th>-->
                                        <th class="wd-15p border-bottom-0">Amount</th>

                                        <th class="wd-25p border-bottom-0">Method</th>
                                        <th class="wd-15p border-bottom-0">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	$i = 0;
                                    $select = mysqli_query($link, "SELECT * FROM deposits WHERE userId = '$uid' ORDER BY id DESC ");
                                    if (mysqli_num_rows($select)) {
                                        while ($row = mysqli_fetch_assoc($select)) {
 										$i++; 
                                 ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['currency'] ?> <?php echo $row['amount'] ?></td>
                                        <td><?php echo $row['method'] ?></td>
                                        <td>
                                            <div class="badge badge-success badge-danger"><?php echo $row['status'] ?></div>
                                        </td>
                                    </tr>

                                   <?php }} ?>

                                </tbody>
                            </table>
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