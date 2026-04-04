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





      <div class="row row-sm">
        <div class="col-lg-4">
          <div class="card mg-b-20">
            <div class="card-body">
              <div class="pl-0">
                <div class="main-profile-overview">
                  <div class="main-img-user profile-user"
                    style="margin-left: auto; margin-right: auto; display: block;">


                    <img style="" alt="" src="uploads/<?php echo $profile_photo ?>">


                    <a class="fas fa-camera profile-edit" href="profile-upload-cover"></a>
                  </div>
                  <div style="text-align: center;">
                    <div>
                      <h5 class="main-profile-name"><?php echo ucwords($name) ?></h5>
                      <p class="main-profile-name-text">Membership - </p>
                      <h6>Joined <span class="text-primary"><span
                            style="text-transform: capitalize;"><?php echo $date_joined ?></span></span></h6>
                      Your account is - <i class="fa fa-check-square"></i> Active <br>
                    </div>
                  </div>

                  <!-- main-profile-work-list -->

                </div><!-- main-profile-overview -->
              </div>
            </div>
          </div>
          <div class="card mg-b-20">
            <div class="card-body">
              <div class="main-content-label tx-13 mg-b-25">
                Contact
              </div>
              <div class="main-profile-contact-list">
                <div class="media">
                  <div class="media-icon bg-success-transparent text-success">
                    <i class="fa fa-at"></i>
                  </div>
                  <div class="media-body">
                    <span>Email</span>
                    <div>
                      <?php echo $uemail ?> </div>
                  </div>
                </div>

              </div><!-- main-profile-contact-list -->
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="main-content-body main-content-body-contacts card custom-card">

            <div class="main-contact-info-body p-4 ps">

              <div class="media-list pb-0">



                <div class="media">
                  <div class="media-body">
                    <div>
                      <label>Currency</label> <span class="tx-medium"><?php echo $currency ?></span>
                    </div>
                  </div>
                </div>

                <!-- <div class="media">
                  <div class="media-body">
                    <div>
                      <label>Last Login</label> <span class="tx-medium">May 16 2023 01:24:22pm.</span>
                    </div>
                  </div>
                </div> -->
                <div class="media">
                  <div class="media-body">
                    <div>
                      <label>Capital</label> <span class="tx-medium"><?php echo $currency ?> <?php echo number_format($balance,2) ?></span>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-body">
                    <div>
                      <label>Profit</label> <span class="tx-medium"><?php echo $currency ?> <?php echo number_format($profit,2) ?></span>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-body">
                    <div>
                      <label>Net Balance</label> <span class="tx-medium"><?php echo $currency ?> <?php echo $total_balance ?></span>
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



<?php  
include 'footer.php';
?>