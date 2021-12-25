<?php
	require('../config/connect.php');
	$clinicid = $_GET['clinicid'];
	$docid = $_GET['id'];

	$myquery="DELETE FROM `clinic_details` WHERE `clinicid`='$clinicid' AND `docid` = '$docid'";
	$connect= mysqli_query($connection,$myquery);
	
	header("location:clinicdetails.php?id=$docid");

?>