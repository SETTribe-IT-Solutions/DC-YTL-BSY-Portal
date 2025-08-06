<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone


if(isset($_POST['submit'])) {

$visitDate = $_POST['visitDate'];
$taluka = $_POST['taluka'];
$village = $_POST['village'];
$area = $_POST['area'];
$arrivalTime = $_POST['arrivalTime'];
$visitId = "VISIT_" . uniqid();
$createdDate = date('Y-m-d H:i:s');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['username'];
$teamName = $_SESSION['teamName'];

$insert = mysqli_query($conn,"INSERT INTO `visitedArea`(`visitId`, `visitDate`, `Area`, `taluka`, `village`, `arrivalTime`, `teamName`, `userId`, `teamId`, `createdDate`) VALUES ('$visitId','$visitDate','$area','$taluka','$village','$arrivalTime','$teamName','$userId','$teamId','$createdDate')") or die($conn->error);

if($insert){
echo '<script>sweetalert("Visit Created Successfully!", "visitMaster.php","");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "visitMaster.php", "");</script>';
}

}

?>