<?php
	require('../config/connect.php');
	$docid = $_GET['id'];
?>

<?php include('inc/head.php'); ?>
<body>
<?php include('inc/navbar.php'); ?>

<div class="container">
<section id="features" class="features">
<div class="row mt-5">
	<?php 
		$myquery = "SELECT * FROM `clinic_details` WHERE `docid` = '$docid'";
		$connect = mysqli_query($connection, $myquery);
		while($result = mysqli_fetch_array($connect)){
	?>
	<div class="col-6 mb-4">
        <div class="icon-box">
			<div class="row">
				<div class="col-md-10 d-flex">
					<i class="bi bi-building" style="color: #890596;"></i>
					<h2 class="d-flex align-items-center"><?php echo $result['clinicname'];?></h2>
				</div>
			
				<div class="col-md-1">
					<a href="clinicregister.php?clinicid=<?php echo $result['clinicid'];?>&id=<?php echo $docid;?>">
					<i class="bi bi-pencil-square" style="color: #890596;"></i>
					</a>
				</div>
			
				<div class="col-md-1">
					<a href="clinicdelete.php?clinicid=<?php echo $result['clinicid'];?>&id=<?php echo $docid;?>">
					<i class="bi bi-trash-fill" style="color: red;"></i>
					</a>
				</div>
			</div>
        
			<div class="row">
				<div class="col-12 d-flex pt-4">
					<i class="bi bi bi-telephone-fill" style="color: #890596;"></i>
					<h6 class="d-flex align-items-center"><?php echo $result['clinicnumber'];?></h6>
				</div>
				<div class="col-12 d-flex pt-4">
					<i class="bi bi-calendar2-event" style="color: #890596;"></i>
					<h6 class="d-flex align-items-center"><?php echo $result['workingdays'];?></h6>
				</div>
				<div class="col-12 d-flex pt-4">
					<i class="bi bi-geo-alt-fill" style="color: #890596;"></i>
					<h6 class="d-flex align-items-center"><?php echo $result['address']?></h6>
				</div>
			</div>
		</div>
    </div>

	<?php
	}
	?>
	</div>
</div>
</section><!-- End #main -->
</div>
  <?php include('inc/footer.php')?>
