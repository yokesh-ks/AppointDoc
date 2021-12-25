<?php
	require('config/connect.php');
	if(isset($_GET['id'])){
		$userid=$_GET['id'];
		$myquery="SELECT * FROM `register` WHERE `userid`='$userid'";
		$myconnect = mysqli_query($connection, $myquery);
		$result = mysqli_fetch_array($myconnect);


		$salutation = $result['salutation'];
		$fullname = $result['fullname'];
		$email = $result['email'];
		$password = $result['password'];
		$type = $result['type'];
		$gender = $result['gender'];
		$dob = $result['dob'];
		$bloodgroup = $result['bloodgroup'];
		$mobileno = $result['mobileno'];
		$address = $result['address'];
		$button = "Update";
	}
	else{
		$salutation = "";
		$fullname = "";
		$email = "";
		$password = "";
		$type = "";
		$gender = "";
		$dob = "";
		$bloodgroup = "";
		$mobileno = "";
		$address = "";
		$button = "Register";
	}
?>

<?php include('inc/head.php')?>
<body>
<div class="container">


<section id="contact" class="contact">
	<div class="section-title">
		<h2>Register</h2>
	</div>

<div class="row">
		<div class="col-8 m-auto">
			<div class="row">
				<div class="col-12">
					<form action="submit.php" method="post" class="php-email-form">
						<input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>">

						<div class="row mb-3">
							<label for="salutation" class="col-sm-3 col-form-label titlecolor">Salutation</label>
							<div class="col-sm-9">
								<select class="form-select form-control" aria-label=".Default select example" name="salutation" id="salutation">
									<option value="Mr." <?php if($salutation=="Mr."){echo "selected";}?>>Mr.</option>
									<option value="Mrs."<?php if($salutation=="Mrs."){echo "selected";}?>>Mrs.</option>
									<option value="Dr."<?php if($salutation=="Dr."){echo "selected";}?>>Dr.</option>	
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="fullname" class="col-sm-3 col-form-label" >Full Name</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname;?>" placeholder="Enter your Full name">
							</div>
						</div>

						<div class="row mb-3">
							<label for="mailid" class="col-sm-3 col-form-label" >Email</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" name="mailid" id="mailid" value="<?php echo $email;?>" placeholder="Enter your Email">
							</div>	
						</div>
						
						<div class="row mb-3">
							<label for="pass" class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $password;?>" placeholder="Create Password">
							</div>
						</div>

						<div class="row mb-3">
							<label for="type" class="col-sm-3 col-form-label titlecolor">Account Type</label>
							<div class="col-sm-9">
								<select class="form-select form-control" aria-label=".Default select example" name="type" id="type">
									<option value="Patient" <?php if($type=="Patient"){echo "selected";}?>>Patient</option>
									<option value="Doctor"<?php if($type=="Doctor"){echo "selected";}?>>Doctor</option>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="gender" class="col-sm-3 col-form-label titlecolor">Gender</label>
							<div class="col-sm-9">
								<select class="form-select form-control" aria-label=".Default select example" name="gender" id="gender">
									<option value="Male" <?php if($type=="Male"){echo "selected";}?>>Male</option>
									<option value="Female"<?php if($type=="Female"){echo "selected";}?>>Female</option>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="dob" class="col-sm-3 col-form-label">Date of Birth</label>
							<div class="col-sm-9">
							  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="bloodgroup" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Blood Group</label>
							<div class="col-sm-9">
								<select class="form-select form-control" aria-label=".Default select example" name="bloodgroup" id="bloodgroup">
									<option value="A+" <?php if($bloodgroup=="A+"){echo "selected";}?>>A+</option>
									<option value="O+" <?php if($bloodgroup=="O+"){echo "selected";}?>>O+</option>
									<option value="B+" <?php if($bloodgroup=="B+"){echo "selected";}?>>B+</option>
									<option value="AB+" <?php if($bloodgroup=="AB+"){echo "selected";}?>>AB+</option>
									<option value="A-" <?php if($bloodgroup=="A-"){echo "selected";}?>>A-</option>
									<option value="O-" <?php if($bloodgroup=="O-"){echo "selected";}?>>O-</option>
									<option value="B-" <?php if($bloodgroup=="B-"){echo "selected";}?>>B-</option>
									<option value="AB-" <?php if($bloodgroup=="AB-"){echo "selected";}?>>AB-</option>
								</select>
							</div>
						</div>
						
						<input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email;?>">
						
				
						<div class="row mb-3">
							<label for="mobileno" class="col-sm-3 col-form-label">Mobile No.</label>
							<div class="col-sm-9">
							  <input type="number" class="form-control" id="mobileno" name="mobileno" value="<?php echo $mobileno;?>">
							</div>
						</div>

						<div class="row mb-3">
							<label for="address" class="col-sm-3 col-form-label">Address</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>">
							</div>
						</div>
						
						<div class="text-center">
							<button type ="submit" value="registersubmit" name="registersubmit"><?php echo $button;?></button>
						</div>
						<div class="text-center mt-4">
							<span>Already having Account </span><a href="login.php">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
  <?php include('inc/footer.php')?>