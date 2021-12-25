<?php
	$fullname = $_GET['docname'];
	require('../config/connect.php');
	$myquery = "SELECT * FROM doctor_edu JOIN `register` ON doctor_edu.userid = register.userid WHERE `fullname` = '$fullname'";
	$connect = mysqli_query($connection, $myquery);
	$result = mysqli_fetch_array($connect);
?>

		
<div class="row mb-3">
	<div class="col-sm-12" style="color:fb9300">
			<h1><?php echo $result['salutation']." ".$result['fullname'];?></h1>
	</div>
	<div class="row mb-3">
		<div class="col-sm-12" style="color:ff449f">
			<h4><?php echo $result['qualification'];?></h4>
		</div>
	</div>
	<input type="hidden"  id="doctoremail" name="doctoremail" value="<?php echo $result['email'];?>">
	<div class="row">
		<div class="col-md-5 col-xs-5" style="color:3b14a7; padding-top:10px;">EXPERIENCE</div>
		<div class="col-md-7 col-xs-7">
		<label><?php echo $result['experience']." Years";?></label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-xs-5" style="color:3b14a7; padding-top:10px;">Language</div>
		<div class="col-md-7 col-xs-7">
		<label><?php echo $result['language'];?></label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-xs-5" style="color:3b14a7; padding-top:10px;">Speciality</div>
		<div class="col-md-7 col-xs-7">
		<label><?php echo $result['speciality'];?></label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-xs-5" style="color:3b14a7; padding-top:10px;">Medical License No.</div>
		<div class="col-md-7 col-xs-7">
		<label><?php echo $result['medregno'];?></label>
		</div>
	</div>
</div>
	
	
	