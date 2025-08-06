<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone

$teamId = $_SESSION['teamId'];
$date = date('Y-m-d H:i:s');

if(isset($_POST['submit'])) {

$equipment_ids = $_POST['equipment_ids'];
$equipment_status = $_POST['equipment_status'];
$working = $_POST['working'];
$remark = $_POST['remark'];


foreach ($equipment_ids as $id) {
    $status = $equipment_status[$id];
    $workingStatus =  $working[$id];
    $remarkStatus =  $remark[$id];


    // Use INSERT ... ON DUPLICATE KEY UPDATE
    $query = "INSERT INTO EquipmentInventory (name, available,working,remark,teamId,createdDate)
              VALUES ('$id', '$status','$workingStatus','$remarkStatus','$teamId','$date')";

   $check =  mysqli_query($conn, $query) or die($conn->error);
}


if($check){
echo '<script>sweetalert("Team Created Successfully!", "equipment.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "equipment.php", "");</script>';
}

}




if(isset($_POST['update'])) {

$equipment_ids = $_POST['equipment_ids'];
$equipment_status = $_POST['equipment_status'];
$working = $_POST['working'];
$remark = $_POST['remark'];

foreach ($equipment_ids as $id) {
    $status = $equipment_status[$id];
        $workingStatus =  $working[$id];
    $remarkStatus =  $remark[$id];

    // Use INSERT ... ON DUPLICATE KEY UPDATE
    $query ="update EquipmentInventory set available='$status',working='$workingStatus',remark='$remarkStatus',updated_at='$date' where teamId='$teamId' AND name='$id' ";

   $check =  mysqli_query($conn, $query) or die($conn->error);
}


if($check){
echo '<script>sweetalert("Team Created Successfully!", "equipment.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "equipment.php", "");</script>';
}

}
?>