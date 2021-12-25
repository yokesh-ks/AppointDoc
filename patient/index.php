<?php
	require('../config/connect.php');
	$userid=$_GET['id']
?>

<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

		<!-- GRT Youtube Plugin CSS -->
		<link rel="stylesheet" href="../style/grt-responsive-menu.css">

		<script type="text/javascript">
			$(document).ready(function(){
				$("#selectclinic").click(function(){
				var clinicname = $('#selectclinic option:selected').val();
					$.ajax({
						type : "GET",
						url : "doctorajax.php",
						data : "clinicname="+clinicname,
						dataType : "html",
						success : function(response){
							$("#selectdoctor").html(response);
						}
					});
				});
			});
			$(document).ready(function(){
				$("#selectdoctor,doctoremail").click(function(){
				var docname = $('#selectdoctor option:selected').val();
					$.ajax({
						type : "GET",
						url : "doctorprofileside.php",
						data : "docname="+docname,
						dataType : "html",
						success : function(response){
							$("#doctorprofile").html(response);
						}
					});
				});
			});
		</script>
		
</head>

<header>
<div class="container">
	<div class="menu-container">
		<div class="grt-menu-row">
			<div class="grt-menu-logo">
				<a href="#"  class="grt-logo"><img src="../images/purplelogo.png"></a>
			</div>
			<div class="grt-menu-right">
				<nav>
					<button class="grt-mobile-button">
						<span class="line1"></span>
						<span class="line2"></span>
						<span class="line3"></span>
					</button>
					<ul class="grt-menu">
						<li class="active"><a href="">Home</a></li>
						<li><a href="">MyBooking</a></li>
						<li class="grt-dropdown dropdown-toggle"><a>Username</a>
							<ul class="grt-dropdown-list">
								<li><a href="personaldetails.php?id=<?php echo $userid;?>">Edit Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>						
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
</header>

<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="../assests/js/grt-responsive-menu.js"></script>

	<hr>
<div class="container">
	<div class="row mb-3">
		<div class="col-sm-6 col-xs-12">
			<form class="form-example" action="booktoken.php?id=<?php echo $userid;?>" method="post">
			<h3>Appointment Booking</h3>
			<div class="row mb-3">
				<label for="date" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:20px;">Date</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="date" name="date">
				</div>
			</div>
			<div class="row mb-3">
				<label for="time" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:20px;">Time</label>
				<div class="col-sm-9">
					<input type="time" class="form-control" id="time" name="time">
				</div>
			</div>
			<div class="row mb-3">
				<label for="selectdoctor" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:20px;">Select Clinic</label>
					<div class="col-sm-9">
						<select class="form-select form-control" aria-label=".Default select example" name="selectclinic" id="selectclinic">
							<option value="">select the clinic</option>
							<?php
								$myquery = "SELECT DISTINCT `clinicname` FROM `clinic_details`";
								$connect = mysqli_query($connection, $myquery);
									while($result = mysqli_fetch_array($connect)){ ?>
										<option value="<?php echo $result['clinicname'];?>"><?php echo $result['clinicname'];?></option>
									<?php
									}
									?>
						</select>
					</div>
			</div>
			<div class="row mb-3">
				<label for="selectdoctor" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:10px;">Select Doctor</label>
					<div class="col-sm-9">
						<select class="form-select form-control" aria-label=".Default select example" name="selectdoctor" id="selectdoctor">
							<option value="">Select the doctor</option>
							<?php
								$myquery = "SELECT DISTINCT `fullname` FROM `register` WHERE `type` = 'doctor'";
								$connect = mysqli_query($connection, $myquery);
									while($result = mysqli_fetch_array($connect)){ ?>
										<option value="<?php echo $result['fullname'];?>"><?php echo $result['fullname'];?></option>
									<?php
									}
									?>
						</select>
					</div>
					
			</div>
			
			
		</div>
		<div class="col-sm-6 col-xs-12" id="doctorprofile">
			
		</div>
	</div>
	<div class="row mb-3">
		<div class="text-center">
			<button type ="submit" value="submit" class="btn" style="background-color:fc5404; color:white">Book Now</button>
		</div>
	</div>
	</form>
</div>
</div>
