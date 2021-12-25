<?php
    $userid = $_POST['userid'];
    $salutation = $_POST['salutation'];
    $fullname = $_POST['fullname'];
    $mailid = $_POST['mailid'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $bloodgroup = $_POST['bloodgroup'];
    $mobileno = $_POST['mobileno'];
    $address = $_POST['address'];

    require('config/connect.php');
    if($userid==""){
        $myquery = "UPDATE `register` SET `salutation`='$salutation',`fullname`='$fullname',`mailid`='$mailid',`password`='$pass',`type`='$type',`gender`='$gender',`dob`='$dob',`bloodgroup`='$bloodgroup',`mobileno`='$mobileno',`address`='$address' WHERE `userid`='$userid'";
        echo "hello";
    }
    else{
        $myquery = "INSERT INTO `register`(`salutation`, `fullname`, `email`, `password`, `type`, `gender`, `dob`, `bloodgroup`, `mobileno`, `address`) VALUES ('$salutation','$fullname','$mailid','$pass','$type','$gender','$dob','$bloodgroup','$mobileno','$address')";
        
    }
    $connect = mysqli_query($connection, $myquery);

    header("location:login.php");
?>