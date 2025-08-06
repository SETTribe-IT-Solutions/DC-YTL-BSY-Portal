<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone


if(isset($_POST['submit'])) {

$name = $_POST['name'];

$medicineId = "Medicine_" . uniqid();
$createdDate = date('Y-m-d H:i:s');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['username'];
$teamName = $_SESSION['teamName'];

$insert = mysqli_query($conn,"INSERT INTO `medicine`(`medicine`, `medicineId`, `byUser`, `createdDate`, `status`) VALUES ('$name','$medicineId','$teamId','$createdDate','Active')") or die($conn->error);

if($insert){
echo '<script>sweetalert("Medicine Created Successfully!", "medicineMaster.php","");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "medicineMaster.php", "");</script>';
}

}



if(isset($_POST['update'])) {

$name = $_POST['name'];

$medicineId = $_POST['medicineId'];
$createdDate = date('Y-m-d H:i:s');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['username'];
$teamName = $_SESSION['teamName'];

$insert = mysqli_query($conn,"UPDATE `medicine` SET `medicine`='$name',`updatedDate`='$createdDate' WHERE medicineId='$medicineId'") or die($conn->error);

if($insert){
echo '<script>sweetalert("Medicine Name Created Successfully!", "medicineMaster.php","");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "medicineMaster.php", "");</script>';
}

}


if(isset($_REQUEST['delete'])) {

$name = $_POST['name'];

$medicineId = $_REQUEST['delete'];
$createdDate = date('Y-m-d H:i:s');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['username'];
$teamName = $_SESSION['teamName'];

$insert = mysqli_query($conn,"UPDATE `medicine` SET `status`='deleted' WHERE medicineId='$medicineId'") or die($conn->error);

if($insert){
echo '<script>sweetalert("Medicine Name Created Successfully!", "medicineMaster.php","");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "medicineMaster.php", "");</script>';
}

}

?>