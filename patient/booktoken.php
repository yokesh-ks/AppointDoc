<?php
	require('../config/connect.php');
	$userid = $_GET['id'];
	$date = $_POST['date'];
	$time = $_POST['time'];

	$clinicname = $_POST['selectclinic'];
	$myquery = "SELECT * FROM `clinic_details` WHERE `clinicname` = '$clinicname'";
	$connect = mysqli_query($connection, $myquery);
	$result = mysqli_fetch_array($connect);
	$clinicid = $result['clinicid'];

	$fullname = $_POST['selectdoctor'];
	$myquery = "SELECT * FROM `register` WHERE `fullname` = '$fullname'";
	$connect = mysqli_query($connection, $myquery);
	$result = mysqli_fetch_assoc($connect);
	$did = $result['userid'];

	$myquery = "INSERT INTO `token_book`(`userid`, `date`, `time`, `clinicid`, `udid`)
	VALUES ('$userid','$date','$time','$clinicid','$did')";

	$connect = mysqli_query($connection, $myquery);
	header("location:index.php?id=$userid");
	
?>