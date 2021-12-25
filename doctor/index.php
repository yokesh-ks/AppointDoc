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
	
		$myquery = "SELECT * FROM `token_book` WHERE `udid`='$docid'";
		$connect = mysqli_query($connection, $myquery);
		while($result=mysqli_fetch_array($connect)){
			$pid = $result['userid'];
			$date = $result['date'];
			$time = $result['time'];

			$myquery = "SELECT * FROM `register` WHERE `userid` = '$pid'";
			$connect = mysqli_query($connection, $myquery);
			$result=mysqli_fetch_array($connect);
		
?>
		
		<div class="col-4 mb-4">
            <div class="icon-box">
				<div class="row">
					<div class="col-12 d-flex">
						<i class="bi bi-person-bounding-box" style="color: #890596;"></i>
						<h3 class="d-flex align-items-center"><?php echo $result['fullname'];?></h3>
					</div>
					<div class="col-12 d-flex pt-4">
						<i class="bi bi-calendar-check-fill" style="color: #890596;"></i>
						<h3 class="d-flex align-items-center"><?php echo $date;?></h3>
					</div>
					<div class="col-12 d-flex pt-4">
						<i class="bi bi-clock-fill" style="color: #890596;"></i>
						<h3 class="d-flex align-items-center"><?php echo $time;?></h3>
					</div>
					<div class="col-12 pt-4 d-flex justify-content-between">
						<button>View Profile</button>
						<button>Accept</button>
						<button>Decline</button>
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

  <?php include('inc/footer.php')?>
