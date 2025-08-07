<?php
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone


if (isset($_POST['submit'])) {
    $sangopankartyache_name = $_POST['sangopankartyache_name'];
    $labhartyanche_name = $_POST['labhartyanche_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $age = $_POST['age'];
    $nationality = $_POST['nationality'];
    $adhivas = $_POST['adhivas'];
    $shikshan = $_POST['shikshan'];
    $bussiness = $_POST['bussiness'];
    $utpanache_sadhan = $_POST['utpanache_sadhan'];
    $masik_utpann = $_POST['masik_utpann'];
    $bank_info = $_POST['bank_info'];
    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $ifsc_code = $_POST['ifsc_code'];
    $home_address = $_POST['home_address'];
    $address2 = $_POST['address2'];
    $mobile_number = $_POST['mobile_number'];
    $office_address = $_POST['office_address'];
    $marrige_info = $_POST['marrige_info'];
    $child_info = $_POST['child_info'];
    $wife_count = $_POST['wife_count'];
    $document = $_POST['document'];

    // Optional: For tracking
    $created_at = date('Y-m-d H:i:s');

    $query = mysqli_query($conn, "INSERT INTO `balsangopan_form` (
        `sangopankartyache_name`,
        `labhartyanche_name`,
        `date_of_birth`,
        `age`,
        `nationality`,
        `adhivas`,
        `shikshan`,
        `bussiness`,
        `utpanache_sadhan`,
        `masik_utpann`,
        `bank_info`,
        `bank_name`,
        `account_number`,
        `ifsc_code`,
        `home_address`,
        `address2`,
        `mobile_number`,
        `office_address`,
        `marrige_info`,
        `child_info`,
        `wife_count`,
        `document`
    ) VALUES (
        '$sangopankartyache_name',
        '$labhartyanche_name',
        '$date_of_birth',
        '$age',
        '$nationality',
        '$adhivas',
        '$shikshan',
        '$bussiness',
        '$utpanache_sadhan',
        '$masik_utpann',
        '$bank_info',
        '$bank_name',
        '$account_number',
        '$ifsc_code',
        '$home_address',
        '$address2',
        '$mobile_number',
        '$office_address',
        '$marrige_info',
        '$child_info',
        '$wife_count',
        '$document'
    )") or die($conn->error);



// foreach ($_POST['fullName'] as $index => $fullName) {
//     $fullName = trim($fullName);
//     $role = trim($_POST['role'][$index]);
//     $username = trim($username);
//     $mobile_no = trim($_POST['mobile_no'][$index]);
// $insert = mysqli_query($conn,"INSERT INTO `teamDetails`(`mobileNo`,`fullName`, `role`,`teamName`, `teamId`,`createdDate`) VALUES ('$mobile_no','$fullName','$role','$teamName','$teamId','$createdDate')") or die($conn->error);
// }



if($query){
echo '<script>sweetalert("Form Submited Successfully!", "balsangopan_yojana_arz.php", "");</script>';
} else{
echo '<script>erroralertsorry("Form Not Submited Successfully!", "balsangopan_yojana_arz.php", "");</script>';
}

}

?>