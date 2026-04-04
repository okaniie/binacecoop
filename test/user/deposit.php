<?php  
include 'header.php';
?>


 <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <!-- News Flash -->

		
		     
              <div class="col-md-12 col-sm-6">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modal-10" style="background-color:#ff6666;font-weight:bolder;border:1px solid #ff6666"> Fund My Account </button>
                </div>
                <div class="modal fade" id="modal-10" tabindex="-1" role="dialog" aria-labelledby="modal-10">
                  <div class="modal-dialog modal-dialog-centered modal-min" role="document">
                    <div class="modal-content">

                      <div class="modal-body text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img src="1128456.svg" style="width:120px;padding:20px">
                        <h1>Make Deposit Now</h1>
                        <form method="get" action="payment.php">
                          <div class="ms-form-group has-icon">
                            <input type="text" placeholder="Enter Amount in <?php echo $currency ?>" class="form-control" name="amount" required>
                          </div>
              						  <button type="submit" class="btn btn-primary" style="color:white;background-color:#67B237;ffont-weight:bolder;border:1px solid #67B237" >Next 
              						  <img src="dot-arrow.svg" style="width:20px"></button>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
		
		
		
		
		
		
		
		 
		
		
		        <div class="col-xl-12 col-md-12" style="margin-top:20px">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Deposit History </h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table thead-primary">
                  <thead style="background-color:#262626">
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Payment mode</th>
                      <th scope="col">Payment Confirmation</th>
                    </tr>
                  </thead>
                  <tbody>
                 		<?php  
                      $qqe = mysqli_query($link, "SELECT * FROM deposits WHERE email = '$email' ORDER BY id DESC ");
                      if (mysqli_num_rows($qqe) > 1) {
                          while($rre = mysqli_fetch_assoc($qqe)){
                    ?>
        						<tr> 
        							<th scope='row'><?php echo $rre['date'] ?></th>
        							 <td><?php echo $rre['currency'] == "USD" ? "$" : "" ?><?php echo number_format($rre['amount'],2) ?> <?php echo $rre['currency'] == "USD" ? "" : $rre['currency'] ?></td> 
        							 <td><?php echo $rre['method'] ?></td>
        							 <td><?php echo $rre['status'] ?></td> 
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




<?php  
include 'footer.php';
?>