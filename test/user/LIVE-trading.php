<?php  
include 'header.php';
?>




<!-- Body Content Wrapper -->
<div class="ms-content-wrapper" style='background-color:white'>
  <div class="row" style='background-color:white;border-radius:10px'>

    <!-- News Flash -->



    <div class="col-sm-12">
      <span style='font-size:35px;color:black'> Welcome To Live Trading
        <b style='color:#4da3ff;text-decoration:underline'><?php echo ucwords($fname) ?></b></span>
    </div>


    <div class='col-sm-12'>
      <p id="date" style='float:left;font-weight:normal;color:black;text-align:center'></p>.
    </div>
    <script>
      document.getElementById("date").innerHTML = Date();
    </script>








    <!-- Crypto Slider -->
    <div class="col-md-12">










      <div class="modal fade" id="modal-11" tabindex="-1" role="dialog" aria-labelledby="modal-10">
        <div class="modal-dialog modal-dialog-centered modal-min" role="document">
          <div class="modal-content">

            <div class="modal-body text-center">
              <h1 class='text-danger'>SELL ORDER</h1>
              <hr>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>




              <form role="form" method="post">
                <div class="row">

                  <div class="col-md-12 pr-md-1">
                    <div class="form-group">
                      <label>Amount</label>
                      <input type="Amount" class="form-control" name="svolamount" placeholder="Amount to buy" value=""
                        step="any" required="">
                    </div>
                  </div>
                  <div class="col-md-12 px-md-1">
                    <div class="form-group">
                      <label>Type</label>
                      <select class="form-control" name="stype">
                        <option value="Market Execution">Market Execution</option>
                        <option value="Pending Order">Pending Order</option>
                      </select>
                      <input type="hidden" name="ordertype" value="buy">
                    </div>
                  </div>
                  <div class="col-md-12 pl-md-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Asset</label>
                      <select name="ssymbol" class="form-control">
                        <option value="AUD/CHF">AUD/CHF</option>
                        <option value="BTC/USD">BTC/USD</option>
                        <option value="BTC/USD">ETH/USD</option>
                        <option value="BTC/USD">BCH/USD</option>
                        <option value="BTC/USD">LTC/USD</option>
                        <option value="BTC/USD">BCHSV/USDT</option>
                        <option value="BTC/USD">TRX/USD</option>
                        <option value="BTC/USD">XRP/USD</option>
                        <option value="BTC/USD">XMR/USD</option>


                        <option value="USD/JPY">USD/JPY </option>
                        <option value="GBP/USD">GBP/USD </option>
                        <option value="USD/CAD">USD/CAD </option>
                        <option value="USD/CHF">USD/CHF </option>
                        <option value="NZD/USD">NZD/USD</option>
                        <option value="AUD/USD">AUD/USD</option>
                        <option value="AUD/NZD">AUD/NZD</option>
                        <option value="AUD/CAD">AUD/CAD</option>
                        <option value="AUD/CHF">AUD/CHF</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                      <label>Stop Loss <b>(SL)</b></label>
                      <input type="number" name="ssl" class="form-control" min="0" value="0.0000" step="any"
                        required="">
                    </div>
                  </div>
                  <div class="col-md-6 pl-md-1">
                    <div class="form-group">
                      <label>Take Profit <b>(TP)</b></label>
                      <input type="number" name="stp" class="form-control" min="0" value="0.0000" step="any"
                        required="">
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" name="sell" class="btn btn-block btn-danger btn-lg " value="Sell by Market">
                    </div>
                  </div>
                </div>
              </form>









            </div>

          </div>
        </div>
      </div>














      <div class="modal fade" id="modal-10" tabindex="-1" role="dialog" aria-labelledby="modal-10">
        <div class="modal-dialog modal-dialog-centered modal-min" role="document">
          <div class="modal-content">

            <div class="modal-body text-center">
              <h1 class='text-success'>BUY ORDER</h1>
              <hr>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>




              <form role="form" method="post">
                <div class="row">

                  <div class="col-md-12 pr-md-1">
                    <div class="form-group">
                      <label>Volume</label>
                      <input type="number" class="form-control" name="bvolamount" placeholder="Amount to buy" value=""
                        step="any" required="">
                    </div>
                  </div>
                  <div class="col-md-12 px-md-1">
                    <div class="form-group">
                      <label>Type</label>
                      <select class="form-control" name="btype">
                        <option value="Market Execution">Market Execution</option>
                        <option value="Pending Order">Pending Order</option>
                      </select>
                      <input type="hidden" name="ordertype" value="buy">
                    </div>
                  </div>
                  <div class="col-md-12 pl-md-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Symbol</label>
                      <select name="bsymbol" class="form-control">
                        <option value="EUR/USD ">EUR/USD</option>
                        <option value="USD/JPY">USD/JPY</option>
                        <option value="GBP/USD">GBP/USD</option>
                        <option value="USD/CAD">USD/CAD</option>
                        <option value="USD/CHF">USD/CHF</option>
                        <option value="NZD/USD">NZD/USD</option>
                        <option value="AUD/USD">AUD/USD</option>
                        <option value="AUD/NZD">AUD/NZD</option>
                        <option value="AUD/CAD">AUD/CAD</option>
                        <option value="AUD/CHF">AUD/CHF</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                      <label>Stop Loss <b>(SL)</b></label>
                      <input type="number" name="bsl" class="form-control" min="0" value="0.0000" step="any"
                        required="">
                    </div>
                  </div>
                  <div class="col-md-6 pl-md-1">
                    <div class="form-group">
                      <label>Take Profit <b>(TP)</b></label>
                      <input type="number" name="btp" class="form-control" min="0" value="0.0000" step="any"
                        required="">
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" name="buy" class="btn btn-block btn-success btn-lg " value="Buy by Market">
                    </div>
                  </div>
                </div>
              </form>











            </div>

          </div>
        </div>
      </div>



      <Div class='col-sm-6' style='float:right;height:72px'>

        <!-- <input type='submit' value='BUY' data-toggle="modal" data-target="#modal-10" class='btn btn-success'
          style='float:right;margin-left:10px;'>
        <input type='submit' value='SELL' data-toggle="modal" data-target="#modal-11" class='btn btn-danger'
          style='float:right;'> -->

      </Div>






      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
          async>
            {
              "symbols": [
                {
                  "title": "S&P 500",
                  "proName": "OANDA:SPX500USD"
                },
                {
                  "title": "Nasdaq 100",
                  "proName": "OANDA:NAS100USD"
                },
                {
                  "title": "EUR/USD",
                  "proName": "FX_IDC:EURUSD"
                },
                {
                  "title": "BTC/USD",
                  "proName": "BITSTAMP:BTCUSD"
                },
                {
                  "title": "ETH/USD",
                  "proName": "BITSTAMP:ETHUSD"
                }
              ],
                "colorTheme": "dark",
                  "isTransparent": false,
                    "displayMode": "adaptive",
                      "locale": "en"
            }
          </script>
      </div>
      <!-- TradingView Widget END -->
    </div>



    <div class="col-xs-12 col-md-12" style="height:auto">

      <!-- TradingView Widget BEGIN -->
      <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
      <script type="text/javascript">
        new TradingView.widget(
          {
            "width": "auto",
            "height": 610,
            "symbol": "FX:EURUSD",
            "timezone": "Etc/UTC",
            "theme": "Dark",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "withdateranges": true,
            "range": "all",
            "allow_symbol_change": true,
            "save_image": false,
            "details": true,
            "hotlist": true,
            "calendar": true,
            "news": [
              "stocktwits",
              "headlines"
            ],
            "studies": [
              "BB@tv-basicstudies",
              "MACD@tv-basicstudies",
              "MF@tv-basicstudies"
            ],
            "container_id": "tradingview_f263f"
          }
        );
      </script>
      <!-- TradingView Widget END -->
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container ">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a
            href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener"
            target="_blank"><span class="blue-text"></span></span></a></div>
        <script type="text/javascript"
          src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
            {
              "width": "100%",
                "height": 400,
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

  </div>













  <br>
  <div class="pcoded-content" style='background-color:white;margin-bottom:200px'>

    <!-- [ breadcrumb ] end -->
    <div class="pcoded-inner-content" style='background-color:white'>
      <!-- Main-body start -->
      <div class="main-body" style='background-color:white'>
        <div class="page-wrapper" style='background-color:white'>
          <!-- Page-body start -->
          <div class="page-body">
            <div class="card">
            </div>
            <!-- Inverse table card start -->
            <div class="card">
              <!-- <div class="card-header">
                <h3>Order History</h3>

                <div class="card-header-right"> </div>
              </div> -->
              <div class="card-block table-border-style">
                <div class="table-responsive">
                  <!-- <table class="table table-inverse">
                    <thead>
                      <tr>

                        <th scope="col">Order</th>
                        <th scope="col">Time</th>
                        <th scope="col">Type</th>

                        <th scope="col">Symbol</th>
                        <th scope="col">Volume</th>
                        <th scope="col">S/L</th>
                        <th scope="col">T/P</th>
                        <th scope="col">Status</th>
                        <th scope="col">Expire Time</th>
                        <th scope="col">Profit</th>
                        <th scope="col">Loss</th>
                      </tr>

                    </thead>
                    <tbody>









                    </tbody>
                  </table> -->
                </div>
              </div>

            </div>
            <!-- Inverse table card end -->

          </div>
          <!-- Page-body end -->
        </div>
      </div>
      <!-- Main-body end -->


    </div>
  </div>
</div>
</div>

<?php  
include 'footer.php';
?>