<?php
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone


if(isset($_POST['submit'])) {

$teamName = $_POST['teamName'];
$vechileNo = $_POST['vechileNo'];
$fullName = $_POST['fullName'];
$role = $_POST['role'];
$username = $_POST['username'];
$mobile_no = $_POST['mobile_no'];
$teamId = "TEAM_" . uniqid();
$createdDate = date('Y-m-d H:i:s');



$query = mysqli_query($conn,"INSERT INTO `users`(`username`, `password`, `vechileNo`, `teamName`, `teamId`,`created_at`,`role`) VALUES ('$username','123456','$vechileNo','$teamName','$teamId','$createdDate','team')") or die($conn->error);



foreach ($_POST['fullName'] as $index => $fullName) {
    $fullName = trim($fullName);
    $role = trim($_POST['role'][$index]);
    $username = trim($username);
    $mobile_no = trim($_POST['mobile_no'][$index]);
$insert = mysqli_query($conn,"INSERT INTO `teamDetails`(`mobileNo`,`fullName`, `role`,`teamName`, `teamId`,`createdDate`) VALUES ('$mobile_no','$fullName','$role','$teamName','$teamId','$createdDate')") or die($conn->error);
}



if($query && $insert){
echo '<script>sweetalert("Team Created Successfully!", "createTeam.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "createTeam.php", "");</script>';
}

}

?>