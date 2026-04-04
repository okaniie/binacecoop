<?php 
$page = "Edit User";
include 'header.php';
$msg = "";

	if (isset($_GET['user'])) {
		$user = $_GET['user'];
	}else{
		echo "<script>window.location.href = 'users.php'</script>";
	}

	$query = mysqli_query($link, "SELECT * FROM users WHERE email = '$user' ");
	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_assoc($query);
	}else{
		echo "<script>window.location.href = 'users.php'</script>";
	}

	if (isset($_POST['update'])) {
		$fname = text_input($_POST['fname']);
		$currency = text_input($_POST['currency']);
		$email = text_input($_POST['email']);
		$country = text_input($_POST['country']);
		$phone = text_input($_POST['phone']);
		$password = text_input($_POST['password']);
		$tcode = text_input($_POST['tcode']);
		$balance = text_input($_POST['balance']);
		$occupation = text_input($_POST['occupation']);

		$update = mysqli_query($link, "UPDATE users SET tcode = '$tcode', fname = '$fname', currency = '$currency', email = '$email', country = '$country', phone = '$phone', password = '$password', balance = '$balance', tcode = '$tcode', occupation = '$occupation' WHERE email = '$user' " );
		if ($update) {
			$msg = "User details has been updated";
		}

	}
	
	if(isset($_POST['delete'])){
		mysqli_query($link, "DELETE FROM users WHERE email = '$user' ");
		echo "<script>window.location.href = 'users.php'</script>";
	}


 ?>

 <div class="row">
    <div class="col-12">
    	<?php 
			if ($msg != "") {
				echo "<script>alert('".$msg."');window.location.href = window.location.href </script>";
			}
		 ?>
        <div class="card">
            <div class="card-body p-4">
            	<form method="post" action="edit-user.php?user=<?php echo $row['email'] ?>">
                <div class="row">
                	<div class="text-center mb-3">
                		<h3 ><?php echo $row['fname'] ?></h3>
                		
                	</div>
                    <div class="col-lg-6">
                        <div>
                            
                             <div class="mb-3">
                                <label for="example-date-input" class="form-label">First Name</label>
                                <input class="form-control" type="text" name="fname" value="<?php echo $row['fname'] ?>" id="example-date-input">
                            </div>
                            <div class="mb-3">
                                <label for="example-search-input" class="form-label">Currency</label>
                                <input class="form-control" type="text" name="currency" value="<?php echo $row['currency'] ?>" id="example-search-input">
                            </div>
                            <div class="mb-3">
                                <label for="example-email-input" class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $row['email'] ?>" id="example-email-input">
                            </div>

                            <div class="mb-3">
                                <label for="example-month-input" class="form-label">Password</label>
                                <input class="form-control" type="text" name="password" value="<?php echo $row['password'] ?>" id="example-month-input">
                            </div>
                            
                        	<div class="mb-3">
                                <label for="example-month-input" class="form-label">Withdrawal Code</label>
                                <input class="form-control" type="text" name="tcode" value="<?php echo $row['tcode'] ?>" id="example-month-input">
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-url-input" class="form-label">Country</label>
                                <select class="form-control" name="country">
                                	<option value="<?php echo $row['country'] ?>"><?php echo $row['country'] ?></option>
									<option value="Afghanistan">Afghanistan</option>

									<option value="Albania">Albania</option>

									<option value="Algeria">Algeria</option>

									<option value="American Samoa">American Samoa</option>

									<option value="Andorra">Andorra</option>

									<option value="Angola">Angola</option>

									<option value="Anguilla">Anguilla</option>

									<option value="Antarctica">Antarctica</option>

									<option value="Antigua and Barbuda">Antigua and Barbuda</option>

									<option value="Argentina">Argentina</option>

									<option value="Armenia">Armenia</option>

									<option value="Aruba">Aruba</option>

									<option value="Australia">Australia</option>

									<option value="Austria">Austria</option>

									<option value="Azerbaijan">Azerbaijan</option>

									<option value="Bahamas">Bahamas</option>

									<option value="Bahrain">Bahrain</option>

									<option value="Bangladesh">Bangladesh</option>

									<option value="Barbados">Barbados</option>

									<option value="Belarus">Belarus</option>

									<option value="Belgium">Belgium</option>

									<option value="Belize">Belize</option>

									<option value="Benin">Benin</option>

									<option value="Bermuda">Bermuda</option>

									<option value="Bhutan">Bhutan</option>

									<option value="Bolivia">Bolivia</option>

									<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>

									<option value="Botswana">Botswana</option>

									<option value="Bouvet Island">Bouvet Island</option>

									<option value="Brazil">Brazil</option>

									<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>

									<option value="Brunei Darussalam">Brunei Darussalam</option>

									<option value="Bulgaria">Bulgaria</option>

									<option value="Burkina Faso">Burkina Faso</option>

									<option value="Burundi">Burundi</option>

									<option value="Cambodia">Cambodia</option>

									<option value="Cameroon">Cameroon</option>

									<option value="Canada">Canada</option>

									<option value="Cape Verde">Cape Verde</option>

									<option value="Cayman Islands">Cayman Islands</option>

									<option value="Central African Republic">Central African Republic</option>

									<option value="Chad">Chad</option>

									<option value="Chile">Chile</option>

									<option value="China">China</option>

									<option value="Christmas Island">Christmas Island</option>

									<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>

									<option value="Colombia">Colombia</option>

									<option value="Comoros">Comoros</option>

									<option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>

									<option value="Republic of Congo">Republic of Congo</option>

									<option value="Cook Islands">Cook Islands</option>

									<option value="Costa Rica">Costa Rica</option>

									<option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>

									<option value="Cuba">Cuba</option>

									<option value="Cyprus">Cyprus</option>

									<option value="Czech Republic">Czech Republic</option>

									<option value="Denmark">Denmark</option>

									<option value="Djibouti">Djibouti</option>

									<option value="Dominica">Dominica</option>

									<option value="Dominican Republic">Dominican Republic</option>

									<option value="East Timor">East Timor</option>

									<option value="Ecuador">Ecuador</option>

									<option value="Egypt">Egypt</option>

									<option value="El Salvador">El Salvador</option>

									<option value="Equatorial Guinea">Equatorial Guinea</option>

									<option value="Eritrea">Eritrea</option>

									<option value="Estonia">Estonia</option>

									<option value="Ethiopia">Ethiopia</option>

									<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>

									<option value="Faroe Islands">Faroe Islands</option>

									<option value="Fiji">Fiji</option>

									<option value="Finland">Finland</option>

									<option value="France">France</option>

									<option value="France, Metropolitan">France, Metropolitan</option>

									<option value="French Guiana">French Guiana</option>

									<option value="French Polynesia">French Polynesia</option>

									<option value="French Southern Territories">French Southern Territories</option>

									<option value="Gabon">Gabon</option>

									<option value="Gambia">Gambia</option>

									<option value="Georgia">Georgia</option>

									<option value="Germany">Germany</option>

									<option value="Ghana">Ghana</option>

									<option value="Gibraltar">Gibraltar</option>

									<option value="Guernsey">Guernsey</option>

									<option value="Greece">Greece</option>

									<option value="Greenland">Greenland</option>

									<option value="Grenada">Grenada</option>

									<option value="Guadeloupe">Guadeloupe</option>

									<option value="Guam">Guam</option>

									<option value="Guatemala">Guatemala</option>

									<option value="Guinea">Guinea</option>

									<option value="Guinea-Bissau">Guinea-Bissau</option>

									<option value="Guyana">Guyana</option>

									<option value="Haiti">Haiti</option>

									<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>

									<option value="Honduras">Honduras</option>

									<option value="Hong Kong">Hong Kong</option>

									<option value="Hungary">Hungary</option>

									<option value="Iceland">Iceland</option>

									<option value="India">India</option>

									<option value="Isle of Man">Isle of Man</option>

									<option value="Indonesia">Indonesia</option>

									<option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>

									<option value="Iraq">Iraq</option>

									<option value="Ireland">Ireland</option>

									<option value="Israel">Israel</option>

									<option value="Italy">Italy</option>

									<option value="Ivory Coast">Ivory Coast</option>

									<option value="Jersey">Jersey</option>

									<option value="Jamaica">Jamaica</option>

									<option value="Japan">Japan</option>

									<option value="Jordan">Jordan</option>

									<option value="Kazakhstan">Kazakhstan</option>

									<option value="Kenya">Kenya</option>

									<option value="Kiribati">Kiribati</option>

									<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>

									<option value="Korea, Republic of">Korea, Republic of</option>

									<option value="Kosovo">Kosovo</option>

									<option value="Kuwait">Kuwait</option>

									<option value="Kyrgyzstan">Kyrgyzstan</option>

									<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>

									<option value="Latvia">Latvia</option>

									<option value="Lebanon">Lebanon</option>

									<option value="Lesotho">Lesotho</option>

									<option value="Liberia">Liberia</option>

									<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>

									<option value="Liechtenstein">Liechtenstein</option>

									<option value="Lithuania">Lithuania</option>

									<option value="Luxembourg">Luxembourg</option>

									<option value="Macau">Macau</option>

									<option value="North Macedonia">North Macedonia</option>

									<option value="Madagascar">Madagascar</option>

									<option value="Malawi">Malawi</option>

									<option value="Malaysia">Malaysia</option>

									<option value="Maldives">Maldives</option>

									<option value="Mali">Mali</option>

									<option value="Malta">Malta</option>

									<option value="Marshall Islands">Marshall Islands</option>

									<option value="Martinique">Martinique</option>

									<option value="Mauritania">Mauritania</option>

									<option value="Mauritius">Mauritius</option>

									<option value="Mayotte">Mayotte</option>

									<option value="Mexico">Mexico</option>

									<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>

									<option value="Moldova, Republic of">Moldova, Republic of</option>

									<option value="Monaco">Monaco</option>

									<option value="Mongolia">Mongolia</option>

									<option value="Montenegro">Montenegro</option>

									<option value="Montserrat">Montserrat</option>

									<option value="Morocco">Morocco</option>

									<option value="Mozambique">Mozambique</option>

									<option value="Myanmar">Myanmar</option>

									<option value="Namibia">Namibia</option>

									<option value="Nauru">Nauru</option>

									<option value="Nepal">Nepal</option>

									<option value="Netherlands">Netherlands</option>

									<option value="Netherlands Antilles">Netherlands Antilles</option>

									<option value="New Caledonia">New Caledonia</option>

									<option value="New Zealand">New Zealand</option>

									<option value="Nicaragua">Nicaragua</option>

									<option value="Niger">Niger</option>

									<option value="Nigeria">Nigeria</option>

									<option value="Niue">Niue</option>

									<option value="Norfolk Island">Norfolk Island</option>

									<option value="Northern Mariana Islands">Northern Mariana Islands</option>

									<option value="Norway">Norway</option>

									<option value="Oman">Oman</option>

									<option value="Pakistan">Pakistan</option>

									<option value="Palau">Palau</option>

									<option value="Palestine">Palestine</option>

									<option value="Panama">Panama</option>

									<option value="Papua New Guinea">Papua New Guinea</option>

									<option value="Paraguay">Paraguay</option>

									<option value="Peru">Peru</option>

									<option value="Philippines">Philippines</option>

									<option value="Pitcairn">Pitcairn</option>

									<option value="Poland">Poland</option>

									<option value="Portugal">Portugal</option>

									<option value="Puerto Rico">Puerto Rico</option>

									<option value="Qatar">Qatar</option>

									<option value="Reunion">Reunion</option>

									<option value="Romania">Romania</option>

									<option value="Russian Federation">Russian Federation</option>

									<option value="Rwanda">Rwanda</option>

									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>

									<option value="Saint Lucia">Saint Lucia</option>

									<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>

									<option value="Samoa">Samoa</option>

									<option value="San Marino">San Marino</option>

									<option value="Sao Tome and Principe">Sao Tome and Principe</option>

									<option value="Saudi Arabia">Saudi Arabia</option>

									<option value="Senegal">Senegal</option>

									<option value="Serbia">Serbia</option>

									<option value="Seychelles">Seychelles</option>

									<option value="Sierra Leone">Sierra Leone</option>

									<option value="Singapore">Singapore</option>

									<option value="Slovakia">Slovakia</option>

									<option value="Slovenia">Slovenia</option>

									<option value="Solomon Islands">Solomon Islands</option>

									<option value="Somalia">Somalia</option>

									<option value="South Africa">South Africa</option>

									<option value="South Georgia South Sandwich Islands">South Georgia South Sandwich Islands</option>

									<option value="South Sudan">South Sudan</option>

									<option value="Spain">Spain</option>

									<option value="Sri Lanka">Sri Lanka</option>

									<option value="St. Helena">St. Helena</option>

									<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>

									<option value="Sudan">Sudan</option>

									<option value="Suriname">Suriname</option>

									<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>

									<option value="Swaziland">Swaziland</option>

									<option value="Sweden">Sweden</option>

									<option value="Switzerland">Switzerland</option>

									<option value="Syrian Arab Republic">Syrian Arab Republic</option>

									<option value="Taiwan">Taiwan</option>

									<option value="Tajikistan">Tajikistan</option>

									<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>

									<option value="Thailand">Thailand</option>

									<option value="Togo">Togo</option>

									<option value="Tokelau">Tokelau</option>

									<option value="Tonga">Tonga</option>

									<option value="Trinidad and Tobago">Trinidad and Tobago</option>

									<option value="Tunisia">Tunisia</option>

									<option value="Turkey">Turkey</option>

									<option value="Turkmenistan">Turkmenistan</option>

									<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>

									<option value="Tuvalu">Tuvalu</option>

									<option value="Uganda">Uganda</option>

									<option value="Ukraine">Ukraine</option>

									<option value="United Arab Emirates">United Arab Emirates</option>

									<option value="United Kingdom">United Kingdom</option>

									<option value="United States">United States</option>

									<option value="United States minor outlying islands">United States minor outlying islands</option>

									<option value="Uruguay">Uruguay</option>

									<option value="Uzbekistan">Uzbekistan</option>

									<option value="Vanuatu">Vanuatu</option>

									<option value="Vatican City State">Vatican City State</option>

									<option value="Venezuela">Venezuela</option>

									<option value="Vietnam">Vietnam</option>

									<option value="Virgin Islands (British)">Virgin Islands (British)</option>

									<option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>

									<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>

									<option value="Western Sahara">Western Sahara</option>

									<option value="Yemen">Yemen</option>

									<option value="Zambia">Zambia</option>

									<option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="example-color-input" class="form-label">Total Balance</label>
                                <input type="number" class="form-control" name="balance" id="example-color-input" value="<?php echo $row['balance'] ?>" title="Choose your color">
                            </div>
                            <div class="mb-3">
                                <label for="example-tel-input" class="form-label">Occupation</label>
                                <input class="form-control" type="text" name="occupation" value="<?php echo $row['occupation'] ?>" id="example-tel-input">
                            </div>
                            <div class="mb-3">
                                <label for="example-week-input" class="form-label">Phone</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $row['phone'] ?>" id="example-week-input">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-center">
                	<button type="submit" class="btn btn-info"  name="update">Update</button>
                </div>
				<br>
				<div class="text-center">
                	<button class="btn btn-danger" type="submit" onclick="return confirm('Delete user account')" name="delete">Delete User Account</button>
                </div>
            </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


 <?php
include 'footer.php';
 ?>