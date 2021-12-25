<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="userdashboard.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
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
<?php
	$useremail = $_GET['email'];
	include('database.php');
	
?>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid bg-primary bg-gradient">
    <span class="navbar-brand mb-0 h1">CLINIC TOKEN BOOKING APP</span>
  </div>
</nav>
<div class="row text-center">
		<a href="personaldetails.php?email=<?php echo $useremail;?>">
		<div class="col-md-4 col-xs-4 colortab1">
			<h5>Myprofile</h5>
	</div>
	</a>
	</div>
<div class="container">
	
    <hr>
	<div class="row mb-3">
		<div class="col-sm-6 col-xs-12">
			<form class="form-example" action="booktoken.php" method="post">
			<h1 style="color:fb9300">Appointment Booking</h1>
			<input type="hidden"  id="email" name="email" value="<?php echo $useremail;?>">
			<div class="row mb-3">
				<label for="date" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:10px;">Date</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="date" name="date">
				</div>
			</div>
			<div class="row mb-3">
				<label for="time" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:10px;">Time</label>
				<div class="col-sm-9">
					<input type="time" class="form-control" id="time" name="time">
				</div>
			</div>
			<div class="row mb-3">
				<label for="selectdoctor" class="col-sm-3 col-form-label" style="color:3b14a7; padding-top:10px;">Select Clinic</label>
					<div class="col-sm-9">
						<select class="form-select form-control" aria-label=".Default select example" name="selectclinic" id="selectclinic">
							<option value="">select the clinic</option>
							<?php
								$myquery = "SELECT DISTINCT `clinicname` FROM `clinic_details`";
								$connect = mysqli_query($dbconnect, $myquery);
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
								$myquery = "SELECT DISTINCT `docname` FROM `clinic_details`";
								$connect = mysqli_query($dbconnect, $myquery);
									while($result = mysqli_fetch_array($connect)){ ?>
										<option value="<?php echo $result['docname'];?>"><?php echo $result['docname'];?></option>
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
  
