<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/main.css"	 />
		<title>Agro Loans</title>

	</head>
	<body>
		<header>
			<div class="site_logo">
			</div>
			<h1 class="site_title">Agro Loans</h1>
			<p class="site_tagline">help at your finger tips</p>
		</header>
		<section class="content">
			<?php if (isset($_POST['submit'])) {
				//PROCESS FORM
				var_dump($_POST);
			}else{ 

				//TODO: transfer to seperate file later

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "agro_loans";

				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("Connection failed: ".$conn->connect_error);
				}

				?>

			<form class="" method="post" action="loan_form.php">
				<fieldset>
					<legend>Personal Details</legend>
					<label for="boa_account_no">Account No.</label><input type="text" id="boa_account_no" name="boa_account_no" /><br />
					<label for="first_name">First Name</label><input type="text" id="first_name" name="first_name" /><br />
					<label for="middle_name">Middle Name</label><input type="text" id="middle_name" name="middle_name" /><br />
					<label for="last_name">Last Name</label><input type="text" id="last_name" name="last_name" /><br />
					<label for="date_of_birth">Date of Birth</label><input type="text" id="date_of_birth" name="date_of_birth" /><br />
					<label for="gender">Gender</label><select id="gender" name="gender">
						<option value="">select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select><br />
					<label for="nationality">Nationality</label><select id="nationality" name="nationality">
						<option value="nigeria">Nigeria</option>
						<option value="others">Other country</option>
					</select><br />
					<label for="occupation">Occupation</label><input type="text" id="occupation" name="occupation" /><br />
					<label for="company_name">Company Name</label><input type="text" id="company_name" name="company_name" /><br />
					<label for="marital_status">Marital Status</label><select id="marital_status" name="marital_status">
						<option value="single">Single</option>
						<option value="married">Married</option>
						<option value="other">Other</option>
					</select><br />
					<label for="other_marital_status">if other</label><input type="text" id="other_marital_status" name="other_marital_status" /><br />
					<label for="spouse_name">Name of Spouse</label><input type="text" id="spouse_name" name="spouse_name" /><br />
				</fieldset>	
				<fieldset>
					<legend>Address</legend>
					<label for="house_no">House No</label><input type="number" id="house_no" name="house_no" /><br />
					<label for="street">Street</label><input type="text" id="street" name="street" /><br />
					<label for="area">Area</label><input type="text" id="area" name="area" /><br />
					<label for="city">City</label><input type="text" id="city" name="city" /><br />
					<label for="country">Country</label><select id="country" name="country">
						<?php
						$sql = "SELECT id, name FROM countries";
						$result = $conn->query($sql);

						$countries = "<option value=\"\">--</option>";

						if ($result->num_rows > 0) {
						 	
						 	while ($row = $result->fetch_assoc()) {
						 		$countries .= "<option value=".$row['id'] .">". $row['name'] ."</option>\n";
						 	}
						 	echo $countries;
						 }
						
						?>
					</select><br />
					<label for="state">State</label><select id="state" name="state">
						<?php
						$sql = "SELECT id, name FROM states";
						$result = $conn->query($sql);

						$states = "<option value=\"\">--</option>";

						if ($result->num_rows > 0) {
						 	
						 	while ($row = $result->fetch_assoc()) {
						 		$states .= "<option value=".$row['id'] .">". $row['name'] ."</option>\n";
						 	}
						 	echo $states;
						 }
						
						?>
					</select><br />
					<label for="lga">LGA</label><select id="lga" name="lga">
						<?php
						$sql = "SELECT id, state_id, name FROM local_governments";
						$result = $conn->query($sql);

						$local_governments = "<option value=\"\">--</option>";

						if ($result->num_rows > 0) {
						 	
						 	while ($row = $result->fetch_assoc()) {
						 		$local_governments .= "<option value=".$row['id'] ." data-state_id=". $row['state_id'] .">". $row['name'] ."</option>\n";
						 	}
						 	echo $local_governments;
						 }
						
						?>
					</select><br />
					<label for="phone_no">Phone No</label><input type="text" id="phone_no" name="phone_no" /><br />
					<label for="email">Email address</label><input type="email" id="email" name="email" /><br />
				</fieldset>
				<fieldset>
					<legend>ID Proof</legend>
					<label for="id_type">Valid ID type</label><select id="id_type" name="id_type">
						<option value="international_passport">International Passport</option>
						<option value="driving_license">Driving License</option>
						<option value="pvc">Permanent Voters' Card</option>
						<option value="national_id">National ID</option>
					</select><br />
					<label for="issue_date">Issue Date</label><input type="date" placeholder="mm/dd/yyyy" placeholder="mm/dd/yyyy" placeholder="mm/dd/yyyy" id="issue_date" name="issue_date" /><br />
					<label for="expiry_date">Expiry Date</label><input type="date" placeholder="mm/dd/yyyy" placeholder="mm/dd/yyyy" id="expiry_date" name="expiry_date" /><br />
					<label for="expiry_date">Expiry Date</label><input type="date" placeholder="mm/dd/yyyy" id="expiry_date" name="expiry_date" /><br />
					<label for="utility_bill_no">Utility Bills (NEPA or water board) Account No</label><input type="text" id="utility_bill_no" name="utility_bill_no" /><br />
					<label for="utility_bill_date">Issue Date</label><input type="date" placeholder="mm/dd/yyyy" id="utility_bill_date" name="utility_bill_date" /><br />


				</fieldset>
				<fieldset>
					<legend>Next of Kin Details</legend>
					<label for="nok_first_name">First Name</label><input type="text" id="nok_first_name" name="nok_first_name" /><br />
					<label for="nok_last_name">Last Name</label><input type="text" id="nok_last_name" name="nok_last_name" /><br />
					<label for="nok_relationship">Relationship</label><input type="text" id="nok_relationship" name="nok_relationship" /><br />
					<label for="nok_date_of_birth">Date of Birth</label><input type="text" id="nok_date_of_birth" name="nok_date_of_birth" /><br />
					<label for="nok_gender">Gender</label><select id="nok_gender" name="nok_gender">
						<option value="">select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select><br />
					<label for="nok_house_no">House No</label><input type="number" id="nok_house_no" name="nok_house_no" /><br />
					<label for="nok_street">Street</label><input type="text" id="nok_street" name="nok_street" /><br />
					<label for="nok_area">Area</label><input type="text" id="nok_area" name="nok_area" /><br />
					<label for="nok_city">City</label><input type="text" id="nok_city" name="nok_city" /><br />
					<label for="nok_country">Country</label><select id="nok_country" name="nok_country">
						<?php echo $countries ?>
					</select><br />
					<label for="nok_state">State</label><select id="nok_state" name="nok_state">
						<?php echo $states ?>
					</select><br />
					<label for="nok_lga">LGA</label><select id="nok_lga" name="nok_lga">
						<?php echo $local_governments ?>
					</select><br />
					<label for="nok_phone_no">Phone No</label><input type="text" id="nok_phone_no" name="nok_phone_no" /><br />
					<label for="nok_email">Email address</label><input type="email" id="nok_email" name="nok_email" /><br />
				</fieldset>	
				<fieldset>
					<legend>Other Bank Account Details</legend>
					<label for="bank_name">Bank Name</label><input type="text" id="bank_name" name="bank_name" /><br />
					<label for="branch_name">Branch Name</label><input type="text" id="branch_name" name="branch_name" /><br />
					<label for="account_type">Branch Name</label><input type="text" id="account_type" name="account_type" /><br />
					<label for="other_bank_account_no">Email address</label><input type="email" id="other_bank_account_no" name="other_bank_account_no" /><br />
				
				</fieldset>

				<input type="submit" value="Submit" id="submit" name="submit" />
			</form>
<!-- 			<div class="form_pages_nav">
					<button class="prev">previous page</button>
					<button class="next">next page</button>
				</div> -->
		</section>
		<footer>(c) Pocosoft technologies 2019</footer>
	</body>

	<script src="scripts/main.js"></script>
	
</html>
<?php  }  ?>