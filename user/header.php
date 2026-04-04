<?php  
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>User Dashboard</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/cryptocoins.css">
    <link rel="stylesheet" href="css/cryptocoins-colors.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="css/slick.css" rel="stylesheet">
    <!-- Mystic styles -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">



    <!-- Setting Panel -->
    <div class="ms-toggler ms-settings-toggle ms-d-block-lg">
        <i class="flaticon-paint"></i>
    </div>


<!--     
  <div id="preloader-wrap" style="background-color:#274E82">
  
    <div class="spinner spinner-8">  
      
      
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>

 -->


    <!-- Overlays -->
    <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
    <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity"
        data-toggle="slideRight"></div>

    <!-- Sidebar Navigation Left -->
    <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left" style="background-color:#274E82">

        <!-- Logo -->
        <div class="logo-sn ms-d-block-lg" style="background-color:#fff">
            <a class="pl-0 ml-0 text-center" href="index.php" style="color:White;font-size:20px;font-weight:bolder">
                <img src='2.png' style='width:250px' />
            </a>
        </div>

        <!-- Navigation -->
        <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion" style="background-color:#274E82">

            <li class="menu-item" style="padding-bottom:8px">
                <a href="index.php">
                    <span style="color:white"><i class="fa fa-home" style="font-size:17px"></i>Dashboard</span>
                </a>
            </li>


            <!--<li class="menu-item" style="padding-bottom:8px">-->
            <!--    <a href="LIVE-trading.php">-->
            <!--        <span style="color:white"><i class="fa fa-window-maximize" style="font-size:17px"></i>Live-->
            <!--            Trading</span>-->
            <!--    </a>-->
            <!--</li>-->


            <li class="menu-item" style="padding-bottom:8px">
                <a href="signal.php">
                    <span style="color:white"><i class="fa fa-window-maximize" style="font-size:17px"></i>Live Trading
                        Signals</span>
                </a>
            </li>



            <li class="menu-item" style="padding-bottom:8px">
                <a href="account.php">
                    <span style="color:white"><i class="fa fa-user-circle" style="font-size:17px"></i>Account
                        Profile</span>
                </a>
            </li>

            <li class="menu-item" style="padding-bottom:8px">
                <a href="deposit.php">
                    <span style="color:white"><i class="fa fa-credit-card" style="font-size:17px"></i> Make
                        Deposits</span>
                </a>
            </li>


            <!-- <li class="menu-item" style="padding-bottom:8px">
                <a href="tradehistory.php">
                    <span style="color:white"><i class="fa fa-clock" style="font-size:17px"></i> Trade History</span>
                </a>
            </li> -->

            <li class="menu-item" style="padding-bottom:8px">
                <a href="withdraw.php">
                    <span style="color:white"><i class="fa fa-suitcase" style="font-size:17px"></i> Withdrawals</span>
                </a>
            </li>

            <!--<li class="menu-item" style="padding-bottom:8px">-->
            <!--    <a href="import/">-->
            <!--        <span style="color:white"><i class="fa fa-suitcase" style="font-size:17px"></i> Connect-->
            <!--            Wallet</span>-->
            <!--    </a>-->
            <!--</li>-->

            <li class="menu-item" style="padding-bottom:8px">
                <a href="support.php">
                    <span style="color:white"><i class="fa fa-envelope" style="font-size:17px"></i> Our Support</span>
                </a>
            </li>



            <li class="menu-item" style="padding-bottom:8px;">
                <a href="logout.php">
                    <span style="color:white;text-align:Center"> Log Out</span>
                </a>
            </li>


            <!-- /Apps -->
        </ul>


    </aside>



    <!-- Main Content -->
    <main class="body-content">

    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar" style="background-color:#000">

      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-primary" style="background-color:#4da3ff;height:3px"></span>
        <span class="ms-toggler-bar bg-primary" style="background-color:#4da3ff;height:3px"></span>
        <span class="ms-toggler-bar bg-primary" style="background-color:#4da3ff;height:3px"></span>
      </div>

      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.php">
          <img src='2.png' style='width:250px;padding:7px' />
        </a>
      </div>

      <ul class="offset-sm-6 ms-nav-list ms-inline mb-0" id="ms-nav-options" style='color:#4da3ff'>

        <li class="ms-nav-item ms-nav-user dropdown" style='color:#4da3ff'>


          <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            style="color:#4da3ff;font-size:16px;padding-top:5px">
            <h3 style='color:white'>Balance : </h3>
            <?php echo $currency ?><?php echo number_format($balance,2) ?>
          </a>



          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled" style="color:black">Welcome, <?php echo ucwords($fname) ?></span></h6>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-dropdown-list">
              <a class="media fs-14 p-2" href="account.php"> <span><i class="flaticon-user mr-2"></i> Profile</span> </a>
              <a class="media fs-14 p-2" href="account.php"> <span><i class="flaticon-gear mr-2"></i> Account
                  Settings</span> </a>
              <a class="media fs-14 p-2" href="support.php"> <span><i class="flaticon-question mr-2"></i> Contact Us</span>
              </a>
            </li>
            <li class="dropdown-divider"></li>

            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="logout.php"> <span><i class="flaticon-shut-down mr-2"></i>
                  Logout</span> </a>
            </li>
          </ul>
        </li>
      </ul>

      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
        <span class="ms-toggler-bar bg-primary" style="background-color:#000000"></span>
        <span class="ms-toggler-bar bg-primary" style="background-color:#000000"></span>
        <span class="ms-toggler-bar bg-primary" style="background-color:#000000"></span>
        <span style='color:white'>Balance</span><br>
        <center> <img src='coins.svg' style='width:38px;'></center>
      </div>

    </nav>