<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone


if(isset($_POST['submit'])) {

$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];
$batch = $_POST['batch'];
$expiryDate = $_POST['expiryDate'];
$stockId = "STOCK_" . uniqid();
$createdDate = date('Y-m-d H:i:s');
$recievecDate = date('Y-m-d');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['username'];
$teamName = $_SESSION['teamName'];

$insert = mysqli_query($conn,"INSERT INTO `medicineStock`(`stockId`, `medicine`, `quantity`,`remaining`,`batch`, `expiryDate`, `recievedDate`, `createdDate`, `teamId`) VALUES ('$stockId','$medicine','$quantity','$quantity','$batch','$expiryDate','$recievecDate','$createdDate','$teamId')") or die($conn->error);

if($insert){
echo '<script>sweetalert("Stock Added Successfully!", "distributeMedicine.php","");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "distributeMedicine.php", "");</script>';
}

}

?>