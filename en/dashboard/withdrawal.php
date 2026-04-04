<?php  
include 'session.php';

$tranxId = '1234567890';
$tranxId = str_shuffle($tranxId);
$tranxId = strlen($tranxId) != 6 ? substr($tranxId, 0, 6) : $tranxId;
$tranxId = "TRX".$uid.$tranxId;

if (isset($_POST['withdraw_request'])) {
	$amount = text_input($_POST['amount_requested']);
	if (empty($amount)) {
		echo "<script>alert('Enter Amount'); </script>";
	}elseif ($amount <= 0) {
		echo "<script>alert('Invalid Amount'); </script>";
	}elseif($amount > $balance){
		echo "<script>alert('Insuffient Funds'); </script>";
	}elseif (text_input($_POST['pin']) != $pin) {
		echo "<script>alert('Incorrect Pin'); </script>";
	} else{
		$wallet = text_input($_POST['bitcoin_address']);
		$acctnum = text_input($_POST['account_number']);
		$acctname = text_input($_POST['acccount_name']);
		$bankname = text_input($_POST['bank_name']);
		$swift = text_input($_POST['swift_code']);
		$paypal_address = text_input($_POST['paypal_address']);
		$customer_id = text_input($_POST['customer_id']);
		$status = "PENDING";
    $date = date('d-m-Y H:i');
    if (!empty($wallet)) {
      $method = "Bitcoin Withdrawal";
    }elseif (!empty($acctnum)) {
      $method = "Bank Withdrawal";
    }elseif (!empty($paypal_address)) {
      $method = "Paypal withdrawal";
    }
		$insert = mysqli_query($link, "INSERT INTO withdrawals (`userId`, `email`, `fullname`, `currency`, `method`, `amount`, `wallet`, `bank_name`, `acct_number`, `acct_name`, `swift`, `tranxid`, `paypal_email`, `status`, `date`) VALUES ('$uid', '$uemail', '$name', '$currency', '$method', '$amount', '$wallet', '$bankname', '$acctnum', '$acctname', '$swift', '$customer_id', '$paypal_address', '$status', '$date' ) ");
		if ($insert) {
			mysqli_query($link, "UPDATE users SET balance = balance - $amount WHERE id = '$uid' ");
			$subject = "Withdrawal Alert";
			$body = "<p>Dear ".$name."</p> <p>Your withdrawal request of ".$currency."".$amount." has been sent, your transaction ID is ".$tranxId.", Your choosen account will be credited once is it approved</p> ";
			sendMail($uemail, $name, $subject, $body);

        	$asubject = "New user withdrawal";
        	$abody = "A user just subjected a withdrawal request of ".$currency."".$amount." Login to admin dashboard to approve or decline the transaction  ";
        	sendAdminMail($sitemail, "Admin", $subject, $body);

        	echo "<script>alert('Your withdrawal request has been sent and its awaiting confirmation');window.location.href = 'withdraw-history' </script>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $sitename ?>  - <?php echo $sitename ?> </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">


  <!-- Your custom styles (optional) -->
  <style>

  </style>
  

</head>

<body class="fixed-sn white-skin navy-blue-skin dark-bg-admin">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="#" class="pl-0 text-white"></a>
          </div>
        </li>

        <!-- Search Form -->
        <li class="text-white">
          <form class="search-form" role="search">
            <div class="md-form mt-0 waves-light">
              <input type="text" class="form-control py-2 text-white" placeholder="Search">
            </div>
          </form>
        </li>

        <!-- Side navigation links -->
        <li class="text-white">
          <ul class="collapsible collapsible-accordion">
           <li class="text-white">
              <div style="" id="google_translate_element"></div>
            </li>
            <li class="text-white">
              <a href="index" class="text-white collapsible-header waves-effect"><i
                  class="w-fa fas fa-th-large"></i> Dashboard</a>
            </li>
            

          </ul>
        </li>
        <!-- Side navigation links -->

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav white-skin navy-blue-skin">

      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse text-white "><i class="fas fa-bars"></i></a>
      </div>

      <!-- Breadcrumb -->
      <div class="breadcrumb-dn mr-auto">
        <p class="text-white">MENU</p>
      </div>

      <div class="d-flex change-mode">


        <!-- Navbar links -->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

          <!-- Dropdown -->
          <li class="nav-item dropdown notifications-nav">
            <a class="nav-link dropdown-toggle text-white waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell"></i>
              <span class="d-none d-md-inline-block">Notifications</span>
            </a>
            <div class="dropdown-menu dropdown-primary bg-dark" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item text-white" href="#">
                <span>Your account is active</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i></span>
              </a>
              <a class="dropdown-item text-white" href="#">
                <span>Welcome to our investment platform</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i></span>
              </a>
              
            </div>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Welcome</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="userDropdown">
                <a class="dropdown-item text-white" href="https://bitcoinlegalminingllc.com/dashboard/profile">Account Profile</a>
                <a class="dropdown-item text-white" href="https://bitcoinlegalminingllc.com/dashboard/logout">Log Out</a>
            </div>
          </li>

        </ul>
        <!-- Navbar links -->

      </div>

    </nav>
    <!-- Navbar -->
  </header>
  <!-- Main Navigation -->



 
 
<main>
    <section class="mt-md-4 pt-md-2 mb-5 pb-4">
      
     
      
      <form method="post" action="withdrawal.php" style="padding: 20px; background-color: #fff;">
                                    <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="row">
                    <div class="col-sm-12">
                                            </div>
                </div>
                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-lg-6">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="email-address" name="email-address" class="form-control form-control-sm" value="<?php echo $uemail ?>" readonly>
                      <label for="form3" class="">Email address</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-lg-6">

                    <div class="md-form form-sm mb-0">
                      
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-6">

                    <div class="md-form form-sm mb-0">
                      <input type="hidden" value="" id="wallet" name="wallet" class="form-control form-control-sm" readonly>
                      
                      <label for="wallet" style="display: none;" class="">Wallet Address</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-6">

                    <div class="md-form form-sm mb-0">
                      <input type="text" value="<?php echo $tranxId ?>" id="customer_id" name="customer_id" class="form-control form-control-sm" readonly>
                      <label for="customer_id" class="">Customer ID</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-12">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="name" name="name" value="<?php echo $name ?>" class="form-control form-control-sm" readonly>
                      <label for="name" class="">Full name</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>

                <!-- Grid row -->
                
                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-6">

                    <div class="md-form form-sm mb-0">
                      <input type="text" value="<?php echo $balance ?>" id="account_balance" name="account_balance" class="form-control form-control-sm" readonly>
                      <label for="account_balance" class="">Account Balance</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-6">

                    <div class="md-form form-sm mb-0">
                      <input type="text" placeholder="Enter Amount you intend to withdraw" id="amount_requested" name="amount_requested" class="form-control form-control-sm" required>
                      <label for="amount_requested" class="">Amount Requested</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>
                <br /><br />
                <h4>How do you intend to receive your payment ?</h4>
                <div class="row">
                    <div  class="col-sm-12">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#home"><button class="btn btn-warning text-white"><i class="fab fa-bitcoin"></i> Bitcoin (BTC)</button></a></li>
                          <li><a data-toggle="tab" href="#menu1"><button class="btn btn-success text-white"><i class="fa fa-university"></i> Direct Bank Payment </button></a></li>
                          <li><a data-toggle="tab" href="#menu2"><button class="btn btn-info text-white"><i class="fab fa-paypal"></i> Paypal Address </button></a></li>
                        </ul>
                        
                        <div class="tab-content">
                          <div id="home" class="tab-pane fade in active">
                            <!-- Grid row -->
                            <div class="row">
            
                              
            
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  <input type="text" placeholder="Enter your BitCoin Address" id="bitcoin_address" name="bitcoin_address" class="form-control form-control-sm" >
                                  <label for="bitcoin_address" class="">BitCoin Address</label>
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
            
                            </div>
                          </div>
                          <div id="menu1" class="tab-pane fade">
                            <div class="row">
            
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  <input type="text" placeholder="" id="account_number" name="account_number" class="form-control form-control-sm" >
                                  <label for="account_number" class="">Account Number</label>
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  <input type="text" placeholder="" id="acccount_name" name="acccount_name" class="form-control form-control-sm" >
                                  <label for="acccount_name" class="">Account Name</label>
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
            
                            </div>
                            <div class="row">
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  <input type="text" placeholder="" id="bank_name" name="bank_name" class="form-control form-control-sm" >
                                  <label for="bank_name" class="">Bank Name</label>
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  <input type="text" placeholder="" id="swift_code" name="swift_code" class="form-control form-control-sm" >
                                  <label for="swift_code" class="">Swift Code</label>
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
            
                            </div>
                          </div>
                          <div id="menu2" class="tab-pane fade">
                            <div class="row">
            
                              
            
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  <input type="text" placeholder="Enter your Paypal Email Address" id="paypal_address" name="paypal_address" class="form-control form-control-sm" >
                                  <label for="paypal_address" class="">Paypal Address</label>
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
                              <!-- Grid column -->
                              <div class="col-md-6">
            
                                <div class="md-form form-sm mb-0">
                                  
                                </div>
            
                              </div>
                              <!-- Grid column -->
                              
            
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        
                        <div class="modal-body">
                            <img src="stories_banking_3-enter-pin.gif" width="100%">
                          <p>In order complete this transaction; kindly enter your PIN.<br></p>
                          <!-- Grid row -->
                <div class="row text-center">

                  <!-- Grid column -->
                  <div class="col-md-12">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="pin" name="pin" placeholder="" class="form-control form-control-sm" required>
                      <label for="pin" class="">Enter PIN</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>
                        <div class="row text-center">
                            <div class="col-lg-12 text-center">
                                <button type="submit" name="withdraw_request" class="btn btn-sm btn-secondary btn-rounded" > <i class="fas fa-check mr-2"></i> Withdraw </button>
                            </div>
                        </div>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                
                <!-- Grid row -->
                <div class="row text-center">
                <div class="col-lg-12 text-center">
                  <button type="button" data-toggle="modal" data-target="#myModal" name="withdraw_request" class="btn btn-secondary btn-rounded" > <i class="fas fa-check mr-2"></i> Request Withdrawal</button>
                </div>
                </div>
                <!-- Grid row -->


              </div>
              <!-- Card content -->
                      </form>
                      <br /><br />
        <div class="table-responsive">

                  
                  <!-- <table class="table table-hover mb-0">

                  
                    <thead>
                      <tr>
                        <th>
                          <input class="form-check-input text-white" type="checkbox" id="checkbox">
                          <label for="checkbox" class="form-check-label text-white mr-2 label-table"></label>
                        </th>
                        <th class="th-lg"><a class="text-white">Wallet Address <i class="fas fa-sort m-1"></i></a></th>
                        <th class="th-lg"><a class="text-white"></a></th>
                        <th class="th-lg"><a class="text-white"></a></th>
                        <th class="th-lg"><a class="text-white"></a></th>
                        <th class="th-lg"><a class="text-white">Amount Requested<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a class="text-white">Date<i lass="fas fa-sort ml-1"></i></a></th>
                      </tr>
                    </thead>
                    
                    <tbody>
                        
                                                                                        
                    </tbody>
                    

                  </table> -->
                  
                </div>
    </section>
</main>


  <!-- Footer -->
  <footer class="page-footer pt-0 mt-5 rgba-stylish-light dark-card-admin">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © <?php echo date('Y') ?> Copyright: <a class="text-white" href="https://www.encryptollc.com" target="_blank"> <?php echo $sitename ?> </a>
      </div>
    </div>

  </footer>
  <!-- Footer -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>

  <!-- Charts -->
  <script>
    // Small chart
    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
    });

    //Main chart
    var ctxL = document.getElementById("lineChart-main").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["Monday", "Tuesday", "Wednessday", "Thursday", "Friday", "Saturday", "Sunday"],
        datasets: [{
          label: "Daily Deposit",
          fillColor: "#fff",
          backgroundColor: 'rgba(255, 255, 255, .3)',
          borderColor: 'rgba(255, 255, 255, .9)',
          data: [0, 10, 5, 2, 20, 30, 45],
        }]
      },
      options: {
        legend: {
          labels: {
            fontColor: "#fff",
          }
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: true,
              color: "rgba(255,255,255,.25)"
            },
            ticks: {
              fontColor: "#fff",
            },
          }],
          yAxes: [{
            display: true,
            gridLines: {
              display: true,
              color: "rgba(255,255,255,.25)"
            },
            ticks: {
              fontColor: "#fff",
            },
          }],
        }
      }
    });

  </script>

  <!-- Charts 2 -->
  <script>
    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2
          },
          {
            label: "My Second dataset",
            data: [28, 48, 40, 19, 86, 27, 90],
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            borderWidth: 2
          }
        ]
      },
      options: {
        responsive: true
      }
    });

    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Monday", "Tuesday", "Wednessday", "Thursday", "Friday", "Saturday", "Sunday"],
        datasets: [{
            label: "My First dataset",
            data: [65, 59, 90, 81, 56, 55, 40],
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2
          },
          {
            label: "My Second dataset",
            data: [28, 48, 40, 19, 96, 27, 100],
            backgroundColor: [
              'rgba(0, 250, 220, .2)',
            ],
            borderColor: [
              'rgba(0, 213, 132, .7)',
            ],
            borderWidth: 2
          }
        ]
      },
      options: {
        responsive: true
      }
    });

    //bar
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      optionss: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //polar
    var ctxPA = document.getElementById("polarChart").getContext('2d');
    var myPolarChart = new Chart(ctxPA, {
      type: 'polarArea',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

    //minimalist
    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });

      $('.min-chart#chart-roi').easyPieChart({
        barColor: "#F44336",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });

      $('.min-chart#chart-conversion').easyPieChart({
        barColor: "#9e9e9e",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
    });

    var ctxBc = document.getElementById('bubbleChart').getContext('2d');
    var bubbleChart = new Chart(ctxBc, {
      type: 'bubble',
      data: {
        datasets: [{
          label: 'John',
          data: [{
            x: 3,
            y: 7,
            r: 10
          }],
          backgroundColor: "#ff6384",
          hoverBackgroundColor: "#ff6384"
        }, {
          label: 'Peter',
          data: [{
            x: 5,
            y: 7,
            r: 10
          }],
          backgroundColor: "#44e4ee",
          hoverBackgroundColor: "#44e4ee"
        }, {
          label: 'Donald',
          data: [{
            x: 7,
            y: 7,
            r: 10
          }],
          backgroundColor: "#62088A",
          hoverBackgroundColor: "#62088A"
        }]
      }
    })

    var ctxSc = document.getElementById('scatterChart').getContext('2d');
    var scatterData = {
      datasets: [{
        borderColor: 'rgba(99,0,125, .2)',
        backgroundColor: 'rgba(99,0,125, .5)',
        label: 'V(node2)',
        data: [{
          x: 1,
          y: -1.711e-2,
        }, {
          x: 1.26,
          y: -2.708e-2,
        }, {
          x: 1.58,
          y: -4.285e-2,
        }, {
          x: 2.0,
          y: -6.772e-2,
        }, {
          x: 2.51,
          y: -1.068e-1,
        }, {
          x: 3.16,
          y: -1.681e-1,
        }, {
          x: 3.98,
          y: -2.635e-1,
        }, {
          x: 5.01,
          y: -4.106e-1,
        }, {
          x: 6.31,
          y: -6.339e-1,
        }, {
          x: 7.94,
          y: -9.659e-1,
        }, {
          x: 10.00,
          y: -1.445,
        }, {
          x: 12.6,
          y: -2.110,
        }, {
          x: 15.8,
          y: -2.992,
        }, {
          x: 20.0,
          y: -4.102,
        }, {
          x: 25.1,
          y: -5.429,
        }, {
          x: 31.6,
          y: -6.944,
        }, {
          x: 39.8,
          y: -8.607,
        }, {
          x: 50.1,
          y: -1.038e1,
        }, {
          x: 63.1,
          y: -1.223e1,
        }, {
          x: 79.4,
          y: -1.413e1,
        }, {
          x: 100.00,
          y: -1.607e1,
        }, {
          x: 126,
          y: -1.803e1,
        }, {
          x: 158,
          y: -2e1,
        }, {
          x: 200,
          y: -2.199e1,
        }, {
          x: 251,
          y: -2.398e1,
        }, {
          x: 316,
          y: -2.597e1,
        }, {
          x: 398,
          y: -2.797e1,
        }, {
          x: 501,
          y: -2.996e1,
        }, {
          x: 631,
          y: -3.196e1,
        }, {
          x: 794,
          y: -3.396e1,
        }, {
          x: 1000,
          y: -3.596e1,
        }]
      }]
    }

    var config1 = new Chart.Scatter(ctxSc, {
      data: scatterData,
      options: {
        title: {
          display: true,
          text: 'Scatter Chart - Logarithmic X-Axis'
        },
        scales: {
          xAxes: [{
            type: 'logarithmic',
            position: 'bottom',
            ticks: {
              userCallback: function (tick) {
                var remain = tick / (Math.pow(10, Math.floor(Chart.helpers.log10(tick))));
                if (remain === 1 || remain === 2 || remain === 5) {
                  return tick.toString() + 'Hz';
                }
                return '';
              },
            },
            scaleLabel: {
              labelString: 'Frequency',
              display: true,
            }
          }],
          yAxes: [{
            type: 'linear',
            ticks: {
              userCallback: function (tick) {
                return tick.toString() + 'dB';
              }
            },
            scaleLabel: {
              labelString: 'Voltage',
              display: true
            }
          }]
        }
      }
    });

  </script>
  <!-- Initializations -->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>

</body>

</html>
