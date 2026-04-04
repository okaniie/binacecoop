<!-- /conatiner -->
    </div>
    <!-- /main-content -->

    <!-- Right-sidebar-->
    <div class="sidebar sidebar-right sidebar-animate ps">
        <div class="p-3">
            <a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i
                    class="fe fe-x"></i></a>
        </div>
        <div class="tab-menu-heading border-0 card-header">
            <div class="card-title mb-0">Information</div>
            <div class="card-options ml-auto">
                <a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
            <div class="tab-content">
                <div class="tab-pane active show" id="tab">
                    <div class="card-body p-0">
                        <div class="header-user text-center mt-4">
                            <span class="avatar avatar-xxl brround mx-auto">
                                <img src="uploads/<?php echo $profile_photo ?>" alt="Profile-img"
                                    class="avatar avatar-xxl brround">
                            </span>
                            <div class=" text-center font-weight-semibold user mt-3 h6 mb-0"> </div>
                        
                        </div>
                        <a class="dropdown-item  border-top" href="profile">
                            <i class="dropdown-icon fe fe-home mr-2"></i> Account Information
                        </a>

                        <a class="dropdown-item  border-top" href="profile-edit">
                            <i class="dropdown-icon fe fe-edit mr-2"></i> Edit Profile
                        </a>
                        <a class="dropdown-item  border-top" href="">
                            <i class="dropdown-icon fe fe-help-circle mr-2"></i> Need Help?
                        </a>

                        <div class="card-body border-top border-bottom">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a class="" href="logout" style="text-decoration: none; color:white;">
                                        <i class="dropdown-icon fa fa-sign-out-alt fs-20 m-0 leading-tight"></i>
                                        <div>Sign out</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps__rail-x" style="left: 0px; top: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div> <!-- Right-sidebar-closed -->


    <!-- Footer opened -->
    <div class="main-footer ht-40">
        <div class="container-fluid pd-t-0-f ht-100p">
            <span>&copy; <?php echo $sitename ?> <?php echo date('Y') ?>.</span>
        </div>
    </div>
    <!-- Footer closed -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top" style="display: block;"><i class="fas fa-chevron-up"></i></a>

    <!-- JQuery min js -->
    <script src="js/jquery.min.js"></script>

    <!-- Datepicker js -->
    <script src="js/datepicker.js"></script>

    <!-- Bootstrap Bundle js -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Ionicons js -->
    <script src="js/ionicons.js"></script>

    <!-- Moment js -->
    <script src="js/moment.js"></script>

    <!--Chart bundle min js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/raphael.min.js"></script>
    <script src="js/jquery.peity.min.js"></script>

    <!-- JQuery sparkline js -->
    <script src="js/jquery.sparkline.min.js"></script>


    <!-- Sampledata js -->
    <script src="js/chart.flot.sampledata.js"></script>

    <!-- Perfect-scrollbar js -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script src="js/p-scroll.js"></script>

    <!-- Internal  Flot js-->
    <script src="js/jquery.flot.js"></script>
    <script src="js/jquery.flot.pie.js"></script>
    <script src="js/jquery.flot.resize.js"></script>
    <script src="js/jquery.flot.categories.js"></script>
    <script src="js/dashboard.sampledata.js"></script>
    <script src="js/chart.flot.sampledata.js"></script>

    <!-- Internal Newsticker js-->
    <script src="js/jquery.jConveyorTicker.js"></script>
    <script src="js/newsticker.js"></script>

    <!-- Eva-icons js -->
    <script src="js/eva-icons.min.js"></script>

    <!-- Sidebar js -->
    <script src="js/sidemenu.js"></script>

    <!-- right-sidebar js -->
    <script src="js/sidebar.js"></script>
    <script src="js/sidebar-custom.js"></script>

    <!-- Rating js-->
    <script src="js/jquery.rating-stars.js"></script>
    <script src="js/jquery.barrating.js"></script>

    <!-- P-scroll js -->
    <script src="js/SmoothScroll.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <script src="js/p-scroll.js"></script>

    <!-- Internal Nice-select js-->
    <script src="js/jquery.nice-select.js"></script>
    <script src="js/nice-select.js"></script>

    <!-- Sticky js -->
    <script src="js/sticky.js"></script>

    <!-- index js -->
    <script src="js/dashboard.js"></script>
    <!-- Internal Modal js-->
    <script src="js/modal.js"></script>

    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="js/moment.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['BTC', 'ETH', 'USD', 'BNB', 'DOGECOIN', 'USDT'],
                datasets: [{
                    label: '# trading sessions',
                    data: [19, 15, 13, 17, 10, 12],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- <script>
// === include 'setup' then 'config' above ===

var myChart = new Chart(
document.getElementById('myChart'),
config
);
</script> -->

    <script>
        // Mark all message as read
        function markAllAsRead(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "process.php?msg_markall=" + id, true);
            xmlhttp.send();
        }
        function mmarkAllAsRead(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "process.php?msg_markall=" + id, true);
            xmlhttp.send();
        }
        function deletAllMsg(id) {
            var x = confirm("Are you sure you want to delete?");
            if (x) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var respo = xmlhttp.responseText;
                        if (respo == '1') {
                            alert("All your messages has been deleted!");
                            window.location.href = "index.php";
                        } else {
                            alert("Unable to delete all messages!");
                        }

                    }
                };
                xmlhttp.open("GET", "process.php?delet_Amsg=" + id, true);
                xmlhttp.send();
            } else {
                return false;
            }
        }
        function markAllNAsRead(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                }
            };
            xmlhttp.open("GET", "process.php?msg_markNall=" + id, true);
            xmlhttp.send();
        }
        function adore() {
            if (document.cform.amount.value == '') {
                alert("Please type your amount or email!");
                document.cform.email.focus();
                return false;
            }
            if (document.cform.balance.value == '') {
                alert("Please type your amount or email!");
                document.cform.blance.focus();
                return false;
            }
            if (document.cform.amount_in_btc.value == '') {
                alert("Please type your amount or email!");
                document.cform.amount_in_btc.focus();
                return false;
            }

            if (document.cform.wallet_address.value == '') {
                alert("Please type your amount or email!");
                document.cform.wallet_address.focus();
                return false;
            }

            var x_amount = parseInt(document.cform.amount.value);
            var x_balance = parseInt(document.cform.balance.value);

            var checkam = (x_amount > x_balance);
            var z = amount * btcvalue;

            if (checkam == true) {

                formc.amount_in_btc.value = "Insufficient Fund";
                alert("Insufficient Fund");
            }


            return true;
        }
    </script>
    <style>
        .mgm {
            border-radius: 7px;
            position: fixed;
            z-index: 90;
            bottom: 45%;
            right: 50px;
            background: #fff;
            padding: 10px 27px;
            box-shadow: 0px 5px 13px 0px rgba(0, 0, 0, .3);
        }

        .mgm a {
            font-weight: 700;
            display: block;
            color: #8BC34A;
        }

        .mgm a,
        .mgm a:active {
            transition: all .2s ease;
            color: #8BC34A;
        }
    </style>
    <div class="mgm" style="display: none;">
        <div class="txt" style="color:black;"></div>
    </div>
    <script data-cfasync="false" src="#"></script>

    <script type="text/javascript">
        var listCountries = ['South Africa', 'USA', 'Germany', 'France', 'Italy', 'South Africa', 'Australia', 'South Africa', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'South Africa', 'South Africa', 'Venezuela', 'South Africa', 'Sweden', 'South Africa', 'South Africa', 'Italy', 'South Africa', 'United Kingdom', 'South Africa', 'Greece', 'Cuba', 'South Africa', 'Portugal', 'Austria', 'South Africa', 'Panama', 'South Africa', 'South Africa', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
        var listPlans = ['$500', '$1,500', '$1,000', '$10,000', '$2,000', '$3,000', '$4,000', '$600', '$700', '$2,500'];
        var transarray = ['just <b>invested</b>', 'has <b>withdrawn</b>', 'is <b>trading with</b>'];
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var run = setInterval(request, interval);

        function request() {
            clearInterval(run);
            interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
            var country = listCountries[Math.floor(Math.random() * listCountries.length)];
            var transtype = transarray[Math.floor(Math.random() * transarray.length)];
            var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
            var msg = 'Someone from <b>' + country + '</b> ' + transtype + ' <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + '</a>';
            $(".mgm .txt").html(msg);
            $(".mgm").stop(true).fadeIn(300);
            window.setTimeout(function () {
                $(".mgm").stop(true).fadeOut(300);
            }, 10000);
            run = setInterval(request, interval);
        }
    </script>




    <div class="main-navbar-backdrop"></div>
    <div id="jiCXNzJ-1600607701865" class="" style="display: block !important;"><iframe id="QsGvCzY-1600607701867"
            src="about:blank" frameborder="0" scrolling="no" title="chat widget" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 350px !important; height: 520px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; display: none !important;"></iframe><iframe
            id="ZohQlph-1600607701872" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; pointer-events: auto !important; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 10px 0px !important; height: 60px !important; min-height: 60px !important; max-height: 60px !important; width: 60px !important; min-width: 60px !important; max-width: 60px !important; border-radius: 50% !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; margin: 0px !important; top: auto !important; bottom: 20px !important; right: 20px !important; left: auto !important; display: block !important;"></iframe><iframe
            id="q42FMdi-1600607701872" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; top: auto !important; bottom: 60px !important; right: 15px !important; left: auto !important; width: 21px !important; max-width: 21px !important; min-width: 21px !important; height: 21px !important; max-height: 21px !important; min-height: 21px !important; display: block !important;"></iframe><iframe
            id="abxKvKZ-1600607701872" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; bottom: 30px !important; top: auto !important; right: 0px !important; left: auto !important; width: 124px !important; max-width: 124px !important; min-width: 124px !important; height: 95px !important; max-height: 95px !important; min-height: 95px !important; z-index: 1000002 !important; margin: 0px !important; display: block !important;"></iframe>
        <div class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important; border-radius: unset !important; pointer-events: auto !important;">
        </div>
        <div id="s37FftD-1600607701865" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;">
        </div>
        <div id="ueNWtPW-1600607701865" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;">
        </div>
        <div id="hfR6YPP-1600607701866" class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;">
        </div><iframe id="mrztRWw-1600607701985" src="about:blank" frameborder="0" scrolling="no" title="chat widget"
            class=""
            style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 378px !important; height: 552px !important; display: none !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; bottom: 100px !important; top: auto !important; right: 20px !important; left: auto !important;"></iframe>
    </div>
    <!--Start of Tawk.to Script-->
    <!-- Smartsupp Live Chat script -->
    


<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'ffbd73fcc395b67ab1b907cea5f97f818b8d811e';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>


    <!--End of Tawk.to Script-->
</body>

</html>