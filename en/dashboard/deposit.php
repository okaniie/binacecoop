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
                        </div>
                    </div>
                </div>
            </div>

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
                        <a class="nav-link active show" data-toggle="pill" href="#nav-tab-crypto">
                            <i class="fab fa-btc"></i> Pay with Crypto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-wire">
                            <i class="fa fa-university"></i> Wire Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-giftcard">
                            <i class="fa fa-gift"></i> Gift Card</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <!-- ============ TAB 1: PAY WITH CRYPTO (Existing) ============ -->
                    <div class="tab-pane fade active show" id="nav-tab-crypto">
                        <div>
                            <div class="card" style="padding: 40px;">
                                <h4>Add Funds</h4>
                                <form action="confirm.php" method="post">
                                    <div class="form-group">
                                        <div style="margin-top:10px;">
                                            Method of Deposit<br>
                                            <div class="input-group c-square">
                                                <select name="method" class="form-control c-square c-theme" required="">
                                                    <?php  
                                                        $query = mysqli_query($link, "SELECT * FROM wallet ");
                                                        if (mysqli_num_rows($query) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <label for="payment_amount">Amount in $</label>
                                        <input type="number" class="form-control" placeholder="Amount" name="amount" value="" required="">
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-primary mr-2" name="deposit">Proceed</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ============ TAB 2: WIRE TRANSFER ============ -->
                    <div class="tab-pane fade" id="nav-tab-wire">
                        <div class="card" style="padding: 40px;">
                            <!-- Header Icon -->
                            <div style="text-align: center; margin-bottom: 25px;">
                                <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #1e90ff, #00bfff); display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                                    <i class="fa fa-university" style="font-size: 28px; color: #fff;"></i>
                                </div>
                                <h4 style="margin-bottom: 5px;">Wire Transfer Deposit</h4>
                                <p style="color: #8e9cc0; font-size: 14px;">Secure bank-to-bank transfer processed within 24-48 hours</p>
                            </div>

                            <!-- Security Badge -->
                            <div style="background: rgba(30, 144, 255, 0.1); border: 1px solid rgba(30, 144, 255, 0.3); border-radius: 8px; color: #8e9cc0; padding: 15px; margin-bottom: 20px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fa fa-shield-alt" style="color: #1e90ff; font-size: 18px; min-width: 20px;"></i>
                                    <div>
                                        <strong style="color: #fff;">Bank-Grade Security</strong><br>
                                        <small>All wire transfers are encrypted and processed through verified banking channels. Your funds are fully insured.</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Form -->
                            <form id="wireTransferForm" onsubmit="return handleWireTransfer(event);">
                                <div class="form-group">
                                    <label style="color: #b3c0d8; font-weight: 600; margin-bottom: 8px;">
                                        <i class="fa fa-dollar-sign" style="color: #1e90ff; margin-right: 5px;"></i> Deposit Amount (USD)
                                    </label>
                                    <input type="number" class="form-control" id="wireAmount" placeholder="Enter amount (min. $100)" 
                                           min="100" step="1" required=""
                                           style="background: #1a1e3a; border: 1px solid #2d3460; color: #fff; padding: 12px 15px; font-size: 16px; border-radius: 8px;">
                                    <small style="color: #6c757d; margin-top: 5px; display: block;">Minimum deposit: $100.00</small>
                                </div>

                                <!-- Info Panel -->
                                <div style="background: #141730; border-radius: 8px; padding: 15px; margin: 20px 0;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #1e2249;">
                                        <span style="color: #8e9cc0;"><i class="fa fa-clock" style="margin-right: 8px;"></i>Processing Time</span>
                                        <span style="color: #fff; font-weight: 600;">24 - 48 Hours</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #1e2249;">
                                        <span style="color: #8e9cc0;"><i class="fa fa-percentage" style="margin-right: 8px;"></i>Transaction Fee</span>
                                        <span style="color: #00e676; font-weight: 600;">FREE</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0;">
                                        <span style="color: #8e9cc0;"><i class="fa fa-lock" style="margin-right: 8px;"></i>Security</span>
                                        <span style="color: #1e90ff; font-weight: 600;">SSL Encrypted</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block" 
                                        style="background: linear-gradient(135deg, #1e90ff, #00bfff); border: none; color: #fff; padding: 14px; font-size: 16px; font-weight: 600; border-radius: 8px; letter-spacing: 0.5px; transition: all 0.3s ease; cursor: pointer;"
                                        onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 25px rgba(30,144,255,0.4)';"
                                        onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';">
                                    <i class="fa fa-comments" style="margin-right: 8px;"></i> Open Google Chat for Wire Transfer
                                </button>
                            </form>

                            <div style="text-align: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #1e2249;">
                                <small style="color: #6c757d;">
                                    <i class="fa fa-info-circle" style="margin-right: 5px;"></i>
                                    You'll be connected to our finance team to complete the transfer securely.
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- ============ TAB 3: GIFT CARD ============ -->
                    <div class="tab-pane fade" id="nav-tab-giftcard">
                        <div class="card" style="padding: 40px;">
                            <!-- Header Icon -->
                            <div style="text-align: center; margin-bottom: 25px;">
                                <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #ff6b35, #ffc107); display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                                    <i class="fa fa-gift" style="font-size: 28px; color: #fff;"></i>
                                </div>
                                <h4 style="margin-bottom: 5px;">Gift Card Deposit</h4>
                                <p style="color: #8e9cc0; font-size: 14px;">Convert your gift cards into investment capital instantly</p>
                            </div>

                            <!-- Accepted Cards Badge -->
                            <div style="background: rgba(255, 193, 7, 0.1); border: 1px solid rgba(255, 193, 7, 0.3); border-radius: 8px; color: #8e9cc0; padding: 15px; margin-bottom: 20px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fa fa-check-circle" style="color: #ffc107; font-size: 18px; min-width: 20px;"></i>
                                    <div>
                                        <strong style="color: #fff;">Accepted Gift Cards</strong><br>
                                        <small>Amazon, iTunes, Google Play, Steam, Walmart, eBay, Sephora, Vanilla Visa &amp; more.</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Form -->
                            <form id="giftCardForm" onsubmit="return handleGiftCard(event);">
                                <div class="form-group">
                                    <label style="color: #b3c0d8; font-weight: 600; margin-bottom: 8px;">
                                        <i class="fa fa-tag" style="color: #ffc107; margin-right: 5px;"></i> Gift Card Type
                                    </label>
                                    <select class="form-control" id="giftCardType" required=""
                                            style="background: #1a1e3a; border: 1px solid #2d3460; color: #fff; padding: 12px 15px; font-size: 15px; border-radius: 8px;">
                                        <option value="" disabled selected>Select gift card type</option>
                                        <option value="Amazon">Amazon Gift Card</option>
                                        <option value="iTunes / Apple">iTunes / Apple Gift Card</option>
                                        <option value="Google Play">Google Play Gift Card</option>
                                        <option value="Steam">Steam Gift Card</option>
                                        <option value="Walmart">Walmart Gift Card</option>
                                        <option value="eBay">eBay Gift Card</option>
                                        <option value="Sephora">Sephora Gift Card</option>
                                        <option value="Vanilla Visa">Vanilla Visa Gift Card</option>
                                        <option value="Other">Other Gift Card</option>
                                    </select>
                                </div>

                                <div class="form-group" style="margin-top: 15px;">
                                    <label style="color: #b3c0d8; font-weight: 600; margin-bottom: 8px;">
                                        <i class="fa fa-dollar-sign" style="color: #ffc107; margin-right: 5px;"></i> Gift Card Value (USD)
                                    </label>
                                    <input type="number" class="form-control" id="giftCardAmount" placeholder="Enter gift card value (min. $50)" 
                                           min="50" step="1" required=""
                                           style="background: #1a1e3a; border: 1px solid #2d3460; color: #fff; padding: 12px 15px; font-size: 16px; border-radius: 8px;">
                                    <small style="color: #6c757d; margin-top: 5px; display: block;">Minimum value: $50.00</small>
                                </div>

                                <!-- Info Panel -->
                                <div style="background: #141730; border-radius: 8px; padding: 15px; margin: 20px 0;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #1e2249;">
                                        <span style="color: #8e9cc0;"><i class="fa fa-clock" style="margin-right: 8px;"></i>Processing Time</span>
                                        <span style="color: #fff; font-weight: 600;">1 - 6 Hours</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #1e2249;">
                                        <span style="color: #8e9cc0;"><i class="fa fa-percentage" style="margin-right: 8px;"></i>Transaction Fee</span>
                                        <span style="color: #00e676; font-weight: 600;">FREE</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0;">
                                        <span style="color: #8e9cc0;"><i class="fa fa-lock" style="margin-right: 8px;"></i>Security</span>
                                        <span style="color: #ffc107; font-weight: 600;">Verified &amp; Secure</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block" 
                                        style="background: linear-gradient(135deg, #ff6b35, #ffc107); border: none; color: #fff; padding: 14px; font-size: 16px; font-weight: 600; border-radius: 8px; letter-spacing: 0.5px; transition: all 0.3s ease; cursor: pointer;"
                                        onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 25px rgba(255,193,7,0.4)';"
                                        onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none';">
                                    <i class="fa fa-comments" style="margin-right: 8px;"></i> Open Google Chat for Gift Card
                                </button>
                            </form>

                            <div style="text-align: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #1e2249;">
                                <small style="color: #6c757d;">
                                    <i class="fa fa-info-circle" style="margin-right: 5px;"></i>
                                    You'll be connected to our finance team to verify and process your gift card.
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /container -->




<?php  
include 'footer.php';
?>

<!-- ============ Google Chat Redirect Script (after footer so jQuery/Bootstrap are loaded) ============ -->
<script>
// ====================================================================
// Google Chat / Support Email
// ====================================================================
var supportEmail = "binancecoop66@gmail.com";

var userName = "<?php echo addslashes($name); ?>";
var userEmail = "<?php echo addslashes($uemail); ?>";
var siteName = "<?php echo addslashes($sitename); ?>";

function handleWireTransfer(e) {
    e.preventDefault();
    var amount = document.getElementById('wireAmount').value;
    
    if (!amount || parseFloat(amount) < 100) {
        alert('Please enter a valid amount (minimum $100)');
        return false;
    }

    var formattedAmount = parseFloat(amount).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    var subject = "Wire Transfer Deposit Request - " + userName;
    var body = "Hello " + siteName + " Support,\n\n" +
        "I would like to make a deposit via Wire Transfer.\n\n" +
        "Deposit Details\n" +
        "-----------------\n" +
        "Name: " + userName + "\n" +
        "Email: " + userEmail + "\n" +
        "Amount: $" + formattedAmount + "\n" +
        "Method: Wire Transfer\n" +
        "-----------------\n\n" +
        "Please provide me with the details to complete this transfer.\n\nThank you.";

    window.location.href = "mailto:" + supportEmail + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
    return false;
}

function handleGiftCard(e) {
    e.preventDefault();
    var amount = document.getElementById('giftCardAmount').value;
    var cardType = document.getElementById('giftCardType').value;

    if (!cardType) {
        alert('Please select a gift card type');
        return false;
    }
    if (!amount || parseFloat(amount) < 50) {
        alert('Please enter a valid amount (minimum $50)');
        return false;
    }

    var formattedAmount = parseFloat(amount).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    var subject = "Gift Card Deposit Request - " + userName;
    var body = "Hello " + siteName + " Support,\n\n" +
        "I would like to make a deposit via Gift Card.\n\n" +
        "Deposit Details\n" +
        "-----------------\n" +
        "Name: " + userName + "\n" +
        "Email: " + userEmail + "\n" +
        "Value: $" + formattedAmount + "\n" +
        "Card Type: " + cardType + "\n" +
        "-----------------\n\n" +
        "Please guide me on how to proceed with this gift card deposit.\n\nThank you.";

    window.location.href = "mailto:" + supportEmail + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
    return false;
}

// Manual tab switching fallback
$(document).ready(function() {
    $('.nav-pills .nav-link').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        
        $('.nav-pills .nav-link').removeClass('active show');
        $(this).addClass('active show');
        
        $('.tab-content .tab-pane').removeClass('active show');
        $(target).addClass('active show');
    });
});
</script>