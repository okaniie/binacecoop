<?php  
include 'header.php';


$msg = "";
$err = "";


$oldpass = $newpass = "";
$oldpass_err = $newpass_err = "";

     if (isset($_POST['change'])) {
        
        if (empty(text_input($_POST['oldpass']))) {
            $err = "Enter Current Password";
        }else{
            $oldpass = text_input($_POST['oldpass']);
        }

        if (empty(text_input($_POST['newpass']))) {
            $err = "Enter New Password";
        }elseif(strlen(text_input($_POST["newpass"])) < 6){
          $err = "New Password must have atleast 6 characters.";
      }elseif (text_input($_POST['cpw']) != text_input($_POST['newpass'])) {
      	$err = "Passwords do not match";
      } else{
            $newpass = text_input($_POST['newpass']);
        }

        if (empty($err)) {
            $user = mysqli_query($link, "SELECT password FROM users WHERE id  = '$uid' ");
            $row = mysqli_fetch_assoc($user);

            if ($row['password'] != $oldpass) {
                $err = "Current Password didn`t match!";
            }else{
                $update = mysqli_query($link, "UPDATE users SET password = '$newpass' WHERE id  = '$uid' ");
                if ($update) {
                    $msg = "Password was updated successfully";
                }
            }
        }

     }
?>
<?php  
if ($msg != "") {
	echo "<script>alert('".$msg."');window.location.href = window.location.href </script>";
}
?>

<?php  
if ($err != "") {
	echo "<script>alert('".$err."');window.location.href = window.location.href </script>";
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
          <div class="main-content-body main-content-body-profile">
            <nav class="nav main-nav-line card mb-4">
              <a class="nav-link" href="profile">Profile</a>
              <a class="nav-link" href="profile-edit">Update Profile</a>
              <a class="nav-link" href="profile-upload-cover">Upload Profile Image</a>
              <a class="nav-link   active show " href="profile-change-password">Change Password</a>
            </nav><!-- main-profile-body -->
            <div class="main-profile-body p-0">
              <div class="row row-sm">
                <div class="col-12">
                  <div class="">
                    <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                    <div class="main-content-body main-content-body-contacts card custom-card">

                      <div class="main-contact-info-body p-4 ps">

                        <div class="media-list pb-0">


                          <div class="media-body">
                            <h6 class="mb-0 mg-t-9">CHANGE PASSWORD</h6>
                          </div>
                          <hr>

                          <div class="">

                            <form action="profile-change-password.php" method="post">
                              <!-- BEGIN: ADDRESS FORM -->
                              <div style="padding-top:20px;">
                                <div class="row">
                                  <div class="form-group col-md-12">
                                    <label class="control-label">Old Password</label>
                                    <input type="password" class="form-control c-square c-theme" placeholder="Password"
                                      name="oldpass" required="" id="oldpassword">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-12">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control c-square c-theme" placeholder="Password"
                                      name="newpass" required="" id="password">
                                  </div>
                                </div>
                                <div class="row">

                                  <div class="form-group col-md-12">
                                    <label class="control-label">Repeat New Password</label>
                                    <input type="password" class="form-control c-square c-theme" placeholder="Password"
                                      name="cpw" required="" id="confirm_password">
                                    <p class="help-block">Hint: The password should be at least six characters long.</p>
                                  </div>
                                </div>
                                <div class="row c-margin-t-30">
                                  <div class="form-group col-md-12" role="group">
                                    <input type="hidden" name="uid" value="ttechdesign01@gmail.com">

                                    <button type="submit" class="btn btn-main-primary pd-x-20"
                                      name="change">Change Password</button>

                                  </div>
                                </div>
                              </div>
                              <!-- END: ADDRESS FORM -->
                            </form>

                          </div>

                          <div class="media">
                            <div class="media-body">
                              <div>
                                <label>Net Balance</label> <span class="tx-medium">$ 0.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- main-profile-body -->
          </div>
        </div>
      </div>
    </div>
    <!-- /conatiner -->




<?php  
include 'footer.php';
?>
