<?php
	require('../config/connect.php');
	if(isset($_GET['id'])){
		$pid=$_GET['id'];
		$myquery="SELECT * FROM `register` WHERE `userid` = '$pid'";
		$myconnect = mysqli_query($connection, $myquery);
		$result = mysqli_fetch_array($myconnect);
		$salutation = $result['salutation'];
		$fullname = $result['fullname'];
		$age = $result['age'];
		$gender = $result['gender'];
		$dob = $result['dob'];
		$bloodgroup = $result['bloodgroup'];
		$mobileno = $result['mobileno'];
		$address = $result['address'];
		$button = "Register";
	}
	if(isset($_POST['registersubmit'])){
	$pid=$_GET['id'];
	$salutation = $_POST['category'];
	$fullname = $_POST['fullname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$dob = $_POST['date'];
	$bloodgroup = $_POST['bloodgroup'];
	$mobileno = $_POST['mobileno'];
	$address = $_POST['address'];
	
	$myquery = "UPDATE `register` SET `salutation`='$salutation',`fullname`='$fullname',`age`='$age',`gender`='$gender',`dob`='$dob',`bloodgroup`='$bloodgroup',`mobileno`='$mobileno',`address`='$address' WHERE `userid`='$pid'";
	$myconnect = mysqli_query($connection, $myquery);
	header("location:index.php?id=$pid");
	}
?>

<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
			body{
				position: relative;
				z-index: 100;
				display: flex;
				flex-direction: row;
				align-items: center;
				width: 100%;
				padding: 5vw;
				background-image: linear-gradient(110deg,#1e089b,#4702a0);	
			}
			div{
				margin-bottom:7px;
				vertical-align:middle;
				padding:5px;
			}
		</style>
	</head>
	<body>
		<div class="d-flex justify-content-center align-items-center container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form class="form-example" action="" method="post">
						<h1 class="text-center" style="color:80ffdb">Personal Details</h1>
						<input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>">
						<div class="row mb-3">
							<label for="category" class="col-sm-3 col-form-label titlecolor" style="color:f7fd04; padding-top:10px;">Salutation</label>
							<div class="col-sm-9">
								<select class="form-select form-control" aria-label=".Default select example" name="category" id="category">
									<option value="Mr." <?php if($salutation=="Mr."){echo "selected";}?>>Mr.</option>
									<option value="Mrs."<?php if($salutation=="Mrs."){echo "selected";}?>>Mrs.</option>
									<option value="Dr."<?php if($salutation=="Dr."){echo "selected";}?>>Dr.</option>	
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<label for="fullname" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Full Name</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname;?>">
							</div>
						</div>
						<fieldset class="row mb-3">
							<label class="col-form-label col-sm-3" style="color:f7fd04; padding-top:10px;">Gender</label>
							<div class="col-sm-9">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" id="radio1" value="male" <?php if($gender=="male"){echo "checked";}?>>
									<label class="form-check-label" for="radio1" style="color:f7fd04;">Male</label>
									<input class="form-check-input" type="radio" name="gender" id="radio2" value="female" <?php if($gender=="female"){echo "checked";}?>>
									<label class="form-check-label" for="radio2" style="color:f7fd04;">Female</label>
									<input class="form-check-input" type="radio" name="gender" id="radio3" value="other" <?php if($gender=="other"){echo "checked";}?>>
									<label class="form-check-label" for="radio3" style="color:f7fd04;">Others</label>
								</div>
							</div>
						</fieldset>
						<div class="row mb-3">
							<label for="age" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:12px;">Age</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="date" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Date of Birth</label>
							<div class="col-sm-9">
							  <input type="date" class="form-control" id="date" name="date" value="<?php echo $dob;?>">
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
							<label for="mobileno" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Mobile No.</label>
							<div class="col-sm-9">
							  <input type="number" class="form-control" id="mobileno" name="mobileno" value="<?php echo $mobileno;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="address" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Address</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>">
							</div>
						</div>
						
						<div class="text-center">
							<button type ="submit" value="registersubmit" name="registersubmit" class="btn" style="background-color:fc5404; color:white"><?php echo $button;?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>