<?php
	require('../config/connect.php');
	
	if(isset($_POST['submit'])){
		$docid = $_POST['docid'];
		$userid=$_GET['id'];
		$qualification = $_POST['qualification'];
		$experience = $_POST['experience'];
		$language = $_POST['language'];
		$speciality = $_POST['speciality'];
		$medregno = $_POST['medregno'];
		if($docid==""){
			$myquery="INSERT INTO `doctor_edu`(`userid`, `qualification`, `experience`, `language`, `speciality`, `medregno`) VALUES ('$userid', '$qualification', '$experience', '$language', '$speciality', '$medregno')";
			$myconnect = mysqli_query($connection, $myquery);

			$myquery = "SELECT * FROM `doctor_edu` WHERE `userid` =$userid";

			$myconnect = mysqli_query($connection, $myquery);
			$fetchresult= mysqli_fetch_array($myconnect);
			$docid = $fetchresult['docid'];
			header("location:index.php?id=$userid");
		}
		else{
			
			$myquery = "UPDATE `doctor_edu` SET `qualification`='$qualification',`experience`='$experience',`language`='$language',`speciality`='$speciality',`medregno`='$medregno' WHERE `docid` = '$docid'";
			$myconnect = mysqli_query($connection, $myquery);
			header("location:index.php?id=$userid");
		}
	}
	if($_GET['id']){
		$userid = $_GET['id'];
		$fetchquery = "SELECT * FROM `doctor_edu` WHERE `userid` = '$userid'";
		$connect = mysqli_query($connection, $fetchquery);
		$count = mysqli_num_rows($connect);
		if($count==1){
			while($fetchresult=mysqli_fetch_array($connect)){
				$docid = $fetchresult['docid'];
				$qualification = $fetchresult['qualification'];
				$experience = $fetchresult['experience'];
				$language = $fetchresult['language'];
				$speciality = $fetchresult['speciality'];
				$medregno = $fetchresult['medregno'];
				$button ="update";
			}
		}
		else{
			$docid="";
			$qualification = "";
			$experience = "";
			$language = "";
			$speciality = "";
			$medregno = "";
			$button ="register";
		}
		
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
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form class="form-example" action="" method="post">
						<h1 class="text-center" style="color:80ffdb;">Professional Details</h1>
						<input type="hidden" id="docid" name="docid" value="<?php echo $docid;?>">
						<div class="row mb-3">
							<label for="qualification" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Qualification</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $qualification;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="experience" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Experience</label>
							<div class="col-sm-9">
							  <input type="number" class="form-control" id="experience" name="experience" value="<?php echo $experience;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="language" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Language</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="language" name="language" value="<?php echo $language;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="speciality" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Speciality</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="speciality" name="speciality" value="<?php echo $speciality;?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="medregno" class="col-sm-3 col-form-label" style="color:f7fd04; padding-top:10px;">Medical Register No.</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" id="medregno" name="medregno" value="<?php echo $medregno;?>">
							</div>
						</div>
						<div class="text-center">
							<button type ="submit" value="submit" name="submit" class="btn" style="background-color:fc5404; color:white"><?php echo $button;?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>