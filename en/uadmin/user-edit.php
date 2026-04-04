<?php 
include 'header.php';

if(isset($_GET['email'])){
	$email = $_GET['email'];
}else{
	$email = '';
}

$msg = "";
$err = "";
				  
    if(isset($_POST['edit'])){
      $emails =$link->real_escape_string( $_POST['email']);
      $password =$link->real_escape_string( $_POST['password']);
      $balance =$link->real_escape_string( $_POST['balance']);
      $refbonus =$link->real_escape_string( $_POST['refbonus']);
      $profit =$link->real_escape_string( $_POST['profit']);
      $fname =$link->real_escape_string( $_POST['name']);
      $lname =$link->real_escape_string( $_POST['lname']);
      $phone =$link->real_escape_string( $_POST['phone']);
      $referred =$link->real_escape_string( $_POST['referred']);
      $pin =$link->real_escape_string( $_POST['pin']);

      $sql1 = "UPDATE users SET pin = '$pin', fname = '$fname', lname = '$lname', email='$emails', password='$password', phone='$phone', referral = '$referred', profit = '$profit', ref_balance = '$refbonus', balance = '$balance' WHERE email = '$email' ";
      
      if (mysqli_query($link, $sql1)) {
          $msg = "Account Details Edited Successfully!";
      } else {
          $err = mysqli_error($link);
      }
      }



 $sql = "SELECT * FROM users WHERE email = '$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);

      
          $username =  $row['username'];
          
          

        }
				  

?>

<br>
<br>
<div class="page-content">
    <div class="container-fluid">
<?php 
    if ($msg != "") {
        echo customAlert("success", $msg);
        echo pageRedirect("2", "user-edit.php?email=".$email);
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
        <div class="row">
            <div class="col-xxl-12">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Edit Info
                                </a>
                            </li>
                            

                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form action="user-edit.php?email=<?php echo $email ?>" method="post">
                                    <center>
                                        <img width="100" height="100" src="../dashboard/uploads/<?php echo $row['profile_photo'] ?>" >
                                    </center>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your fullname" name="name" value="<?php echo $row['fname'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your fullname" name="lname" value="<?php echo $row['lname'] ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                <input type="number" class="form-control" id="phonenumberInput" placeholder="Enter  phone number" name="phone" value="<?php echo $row['phone'] ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="emailInput" placeholder="Enter your email" value="<?php echo $email ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Account Balance</label>
                                                <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter balance" name="balance" value="<?php echo $row['balance'] ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Refbonus</label>
                                                <input type="text" name="refbonus" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['ref_balance'] ?>">
                                            </div>
                                        </div>

                             
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Profit</label>
                                                <input type="text" name="profit" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['profit'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Referred By</label>
                                               
                                                <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter Referral" name="referred" value="<?php echo $row['referral'];?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Password</label>
                                                <input type="text" name="password" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['password'] ;?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Withdrawl Pin</label>
                                                <input type="text" name="pin" class="form-control" id="emailInput" placeholder="Enter Withdrawl Pin" value="<?php echo $row['pin'] ;?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Upgrade(<?php echo $row['upgrade'] == 1 ? "Yes" : "No" ?>)</label>
                                    
                                                <select name="upgrade" class="form-control">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" name="edit" class="btn btn-primary">Update</button>
                                                
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->


                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div><!-- End Page-content -->








<?php 
include 'footer.php';
?>