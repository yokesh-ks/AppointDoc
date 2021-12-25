<?php
	require('../config/connect.php');
?>

<?php include('inc/head.php')?>
<body>
<?php include('inc/navbar.php'); ?>
<div class="container">
<section id="features" class="features">
<div class="row mt-5">
<?php
	if(isset($_GET['clinicid'])){
		$clinicid = $_GET['clinicid'];
		$myquery= "SELECT * FROM `clinic_details` WHERE `clinicid` = '$clinicid'";
		$connect= mysqli_query($connection, $myquery);
		$result = mysqli_fetch_array($connect);
		$heading="Clinic Update";
		$clinicname=$result['clinicname'];
		$workingdays=$result['workingdays'];
		$singleday=explode(",",$workingdays);
		$clinicnumber=$result['clinicnumber'];
		$address=$result['address'];
		$button="Update";
	}
	else{
		$clinicid="";
		$heading="Clinic Register";
		$clinicname="";
		$workingdays="";
		$singleday=explode(",",$workingdays);;
		$clinicnumber="";
		$address="";
		$button="Register";
	}
	if(isset($_POST['submit'])){
		$docid = $_GET['id'];
		$clinicname = $_POST['clinicname'];
		$clinicnumber = $_POST['clinicnumber'];
		$workingdays = implode(", ",$_POST['days']);
		$address = $_POST['address'];
		if(isset($_GET['clinicid'])){
			$myquery = "UPDATE `clinic_details` SET `clinicname`='$clinicname',`clinicnumber`='$clinicnumber',`workingdays`='$workingdays',`address`='$address' WHERE `clinicid` = '$clinicid'";
		}
		else{
			$myquery = "INSERT INTO `clinic_details`(`docid`, `clinicname`, `clinicnumber`, `workingdays`, `address`) VALUES ('$docid', '$clinicname', '$clinicnumber', '$workingdays', '$address')";
		}
		$connect = mysqli_query($connection, $myquery);
		header("location:clinicdetails.php?id=$docid");
	}
?>


		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form class="form-example" action="" method="post">
					<h1 class="text-center" style="color:80ffdb"><?php echo $heading;?></h1>
						<input type="hidden" id="clinicid" name="clinicid" value="<?php echo $clinicid;?>">
						<div class="row mb-3">
							<label for="clinicname" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Clinic Name</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="clinicname" name="clinicname" value="<?php echo $clinicname;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="clinicnumber" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Clinic phone no</label>
							<div class="col-sm-9">
							  <input type="mail" class="form-control" id="clinicnumber" name="clinicnumber" value="<?php echo $clinicnumber;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="clinicnumber" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Working Days</label>
							<div class="col-sm-9 " style="color:f7fd04; padding-right:5px;">
							  <input type="checkbox" name="days[]" value="Monday" <?php if(in_array("Monday", $singleday)){echo "checked";} else{} ?> >Monday
							  <input type="checkbox" name="days[]" value="Tuesday" <?php if(in_array("Tuesday", $singleday)){echo "checked";} else{}?>>Tuesday
							  <input type="checkbox" name="days[]" value="Wednesday" <?php if(in_array("Wednesday", $singleday)){echo "checked";} else{}?>>Wednesday
							  <input type="checkbox" name="days[]" value="Thursday" <?php if(in_array("Thursday", $singleday)){echo "checked";} else{}?>>Thursday
							  <input type="checkbox" name="days[]" value="Friday" <?php if(in_array("Friday", $singleday)){echo "checked";} else{}?>>Friday
							  <input type="checkbox" name="days[]" value="Saturday" <?php if(in_array("Saturday", $singleday)){echo "checked";} else{}?>>Saturday
							  <input type="checkbox" name="days[]" value="Sunday" <?php if(in_array("Sunday", $singleday)){echo "checked";} else{}?>>Sunday
							</div>
						</div>
						<div class="row mb-3">
							<label for="address" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Address</label>
							<div class="col-sm-9">
							  <input type="address" class="form-control" id="address" name="address" value="<?php echo $address;?>">
							</div>
						</div>
						
						<div class="text-center">
							<button type ="submit" name="submit" value="<?php echo $button;?>" class="btn" style="background-color:fc5404; color:white"><?php echo $button;?></button>
						</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section><!-- End #main -->
</div>
  <?php include('inc/footer.php')?>