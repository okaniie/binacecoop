<?php  
include 'header.php';

if (isset($_GET['amount'])) {
  $amount = $_GET['amount'];
}else{
  echo "<script>window.location.href = 'deposit.php' </script>";
}

if (isset($_POST['Send'])) {
  $method = text_input($_POST['paymo']);
  $amount = text_input($_POST['amount']);
  if (!empty($method) && !empty($amount)) {
      $status = "Pending";
      $insert = mysqli_query($link, "INSERT INTO deposits ( `method`, `email`, `amount`, `currency`, `status`) VALUES ('$method', '$email', '$amount', '$currency', '$status') ");
      if ($insert) {
        $subject = "New Deposit";
        $body = "<p>Dear ".$fname." </p> <p>You initiated a deposit of ".$amount." ".$currency." of ".$method." </p> <p>You trading accout will be credit once it is approved</p> <p>Thank You</p> ";
        sendMail($email, $fname, $subject, $body);
        echo "<script>alert('Deposit has been submitted');window.location.href = 'deposit.php' </script>";
      }
    
    
  }
}
?>



  <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <!-- News Flash -->
 
        		
<section class="invoice-view-wrapper">
  <div class="row">
    <!-- invoice view page -->
    <div class="col-xl-9 col-md-8 col-12">
      <div class="card invoice-print-area">
        <div class="card-content">
          <div class="card-body pb-0 mx-25">
          
            <!-- logo and title -->
            <div class="row my-3">
          
              <div class="col-12 d-flex justify-content-end">
                <img src="https://www.smartwealthfront.com/logo.png" alt="logo" height="60" width="224"  >
              </div>
            </div>
            <hr>
            <!-- invoice address and contact -->
            <div class="row invoice-info">
              <div class="col-6 mt-1">
                <h6 class="invoice-from" style="color:#000;font-size:20px;font-weight:bolder">Contract Between <i class='fa fa-arrow-right'></i></h6>
                <div class="mb-1">
                  <span><b>Company : </b><?php echo $sitename ?></span>
                </div>
                <div class="mb-1">
                  <span><b>Email : </b> <?php echo $sitemail ?></span>
                </div> 
              </div>
              <div class="col-6 mt-1">
              <h6 class="invoice-from" style="color:#000;font-size:20px;font-weight:bolder">And</h6>
                <div class="mb-1">
                  <span><b>Fullname : </b><?php echo ucwords($fname) ?></span>
                </div>
                <div class="mb-1">
                  <span><b>Email Address :</b><?php echo $email ?></span>
                </div>
                
          
              </div>
            </div>
            <hr>
          </div>
                <div class="col-sm-12" style="background-color:#000;font-weight:bolder;padding:10px;color:#fff">
                  <span>
				  <center style='color:#fff;font-size:18px'>
				   
				  Kindly Make A Payment Of <b style="color:#4da9ff">$<?php echo $amount ?></b> To The Bitcoin Address Below.
				  </center>
				  
				  </span>
                </div>
          <!-- product details table-->
         
         <div class="col-xl-12 col-md-12 col-sm-12"  >
           <div class="card collapse-icon accordion-icon-rotate" style='border:none'>
        <div class="card-content" >
            <p style="color:#000;text-align:center;">Please make your payment to any of the <b>Crypto-Currency Address</b> below </p>
          <div class="card-body" >
            <div class="accordion" id="cardAccordion" >
              
              
             
              <?php  
          $qr = mysqli_query($link, "SELECT * FROM wallet ");
          if (mysqli_num_rows($qr) > 0) {
            while ($dd = mysqli_fetch_assoc($qr)) { 
        ?>
              <div  style="border:3px solid #4da9ff;border-radius:5px;margin-top:4px" >
                <div class="card-header"  
                  aria-expanded="true" aria-controls="collapseOne" role="button" style='background-color:#fff'>
                  <span class="collapsed collapse-title">
                    <img src="wallet/<?php echo $dd['image'] ?>" style="width:130px;">
                   <img src="https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl=<?php echo strtolower($dd['name']) ?>:<?php echo $dd['address'] ?>" style="width:130px;"> </span>
                </div>
                <div id="collapseOne" class="  pt-1" aria-labelledby="headingOne" data-parent="#cardAccordion">
                  <div class="card-body" style='color:#000'>
          <b style='color:#000'>Pay to <?php echo $dd['name'] ?> Address :</b>
          <br>
          <mark style='background-color:#b3daff;font-weight:bolder'><?php echo $dd['address'] ?></mark>
          <br>
          <b>
          Kindly Contact For Further Assitance <a href='mailto:<?php echo $dd['image'] ?>'><?php echo $sitemail ?></a> to Request <?php echo $dd['name'] ?> Address For Payment.
                     </b>
                  </div> 
                </div>
              </div>

              <?php }
          } ?>
    
              
              
              
              
              
                    
             
               
               
   
            </div>
          </div>
        </div>
      </div>
    </div>
         
		  
		  
		    <div class="card-body pt-0 mx-25" style="margin-top:20px">
            
            <div class="row">
              <div class="col-12 col-sm-12 mt-75" style="background-color:#000;padding:10px;border-radius:4px">
                <p style="text-align:left;color:#fff;float:left">Sign this contract by copying and pasting the hash generated by this transaction in the field below
<form method="POST">	
<input type='text' class='form-control' name='amount' style='float:left;background-color:#fff;margin-top:5px;border:none' placeholder='Enter Amount Sent in ' value='<?php echo $amount ?>' readonly>
<br>
<input type='text' class='form-control' name='paymo' style='float:left;background-color:#fff;margin-top:5px;border:none' placeholder='Enter Payment Mode - Bitcoin, Etheruem, Bitcoin Cash...' value=''>
<button type='submit' name='Send'  style='float:left;background-color:#66b5ff;margin-top:10px;color:#fff' class='btn'>I Have Paid</button>


	
				 
				   
					</form>

			</p>
              </div> 
			  			<div class="col-md-12">
</div>
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </div>
    <!-- invoice action  -->
 
        
			  
			 
		        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="ms-card card-gradient-dark">
            <div class="ms-card-body">
              <h1 style="color:white">To Proceed With Other Payment Kindly</h1>
              <p>Contact management at <b><span style="background-color:#000000;padding:3.4px;border-radius:4px;font-weight:bolder;color:white"><?php echo $sitemail ?></span></b> to deposit your investment<b> <!--via Bitcoin , Ethereum and Other Available Payment Methods--></b>,<br> Thank you.</p>
            </div>
          </div>
        </div>
        
  </div>
</section>

 
		        <div class="col-lg-4 col-md-4 col-sm-6">
       
        </div>
		
		
		
		  

      </div>
    </div>


<?php  
include 'footer.php';
?>