<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone

$teamId = $_SESSION['teamId'];
$teamName = $_SESSIOn['teamName'];
$byUser = $_SESSION['username'];

$date = date('Y-m-d H:i:s');

if(isset($_POST['submit'])) {
$taluka = $_POST['taluka'];
$village = $_POST['village'];
$patientName = $_POST['patientName'];
$age = $_POST['Age'];
$gender = $_POST['gender'];
$Aadhar = $_POST['Aadhar'];
$mobileNumber = $_POST['mobileNumber'];
$type = $_POST['type'];
$service = $_POST['service'];
$patientId ="Patient_" . uniqid();


$query = mysqli_query($conn,"INSERT INTO `patientDetails`(`patientId`, `patientName`, `taluka`, `village`, `age`, `aadharNumber`, `mobileNumber`, `type`, `service`, `byUser`, `teamId`, `teamName`, `createdDate`) VALUES ('$patientId','$patientName','$taluka','$village','$age','$Aadhar','$mobileNumber','$type','$service','$byUser','$teamId','$teamName','$date')") or die($conn->error);


if($query){
echo '<script>sweetalert("Patient Details Inserted Successfully!", "patientMaster.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "patientMaster.php", "");</script>';
}

}


?>