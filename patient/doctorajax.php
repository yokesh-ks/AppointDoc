<?php
	require('../config/connect.php');
	$clinicname = $_GET['clinicname'];

?>
	<select class="form-select form-control" aria-label=".Default select example" name="selectclinic" id="selectclinic">
		<?php
			$myquery = "SELECT `fullname` FROM `register` JOIN `doctor_edu` ON register.userid = doctor_edu.userid JOIN `clinic_details` ON doctor_edu.docid = clinic_details.docid WHERE `clinicname`='$clinicname'";
			$connect = mysqli_query($connection, $myquery);
			while($result = mysqli_fetch_array($connect)){ 
		?>
			<option value="<?php echo $result['fullname'];?>"><?php echo $result['fullname'];?></option>
		<?php
		}
		?>
	</select>

	