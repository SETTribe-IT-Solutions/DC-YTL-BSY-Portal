<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone

$date = date('Y-m-d H:i:s');
$date1 = date('Y-m-d');

if(isset($_POST['submit'])) {
// $taluka = $_POST['taluka'];
// $village = $_POST['village'];
$full_name = $_POST['full_name'];
$Email = $_POST['Email'];
$address = $_POST['address'];
$designation = $_POST['designation'];
$mobile_no = $_POST['mobile_no'];
$Password = $_POST['Password'];

$userId = "USER_" . uniqid();

 $query = "INSERT INTO `users`(
  `user_id`, `full_name`, `Email`, `address`, `designation`, `mobile_no`, `Password`,`status`
) VALUES (
  '$userId','$full_name', '$Email', '$address', '$designation', '$mobile_no','$Password','active')";

$insert = mysqli_query($conn,$query);



if($insert){
echo '<script>sweetalert("User Created Successfully!", "createUser.php", "");</script>';
} else{
echo '<script>erroralertsorry("Sorry Something went wrong", "createUser.php", "");</script>';
}

}


if(isset($_POST['update'])) {
$full_name = $_POST['full_name'];
$Email = $_POST['Email'];
$address = $_POST['address'];
$designation = $_POST['designation'];
$mobile_no = $_POST['mobile_no'];
$Password = $_POST['Password'];
$id = $_POST['update'];

$query = "UPDATE `users` SET 
  `full_name` = '$full_name', 
  `Email` = '$Email', 
  `address` = '$address', 
  `designation` = '$designation', 
  `mobile_no` = '$mobile_no', 
  `Password` = '$Password' 
WHERE id = '".$id."'";


$insert = mysqli_query($conn,$query);

if($insert){
echo '<script>sweetalert("User Updated Successfully!", "createUser.php");</script>';
} else{
echo '<script>erroralertsorry("Sorry Something went wrong", "createUser.php");</script>';
}

}

if(isset($_REQUEST['delete'])) {
$id = $_REQUEST['id'];

$query = "DELETE FROM `users` WHERE id = '".$id."'";
$delete = mysqli_query($conn,$query);

if($delete){
echo '<script>sweetalert("User Deleted Successfully!", "createUser.php");</script>';
} else{
echo '<script>erroralertsorry("Sorry Something went wrong", "createUser.php");</script>';
}

}