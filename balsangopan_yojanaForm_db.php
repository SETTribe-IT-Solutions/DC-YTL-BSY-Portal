<?php
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['submit'])) {
    // Text inputs
    $sangopankartyache_name = $_POST['sangopankartyache_name'];
    $labhartyanche_name = $_POST['labhartyanche_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $age = $_POST['age'];
    $nationality = $_POST['nationality'];
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

    // Image upload handling
    $uploadDir = 'document/';

    // Handle shikshan image
    $shikshan = time() . '_' . basename($_FILES['shikshan']['name']);
    $shikshan_path = $uploadDir . $shikshan;
    move_uploaded_file($_FILES['shikshan']['tmp_name'], $shikshan_path);

    // Handle document image
    $document = time() . '_' . basename($_FILES['document']['name']);
    $document_path = $uploadDir . $document;
    move_uploaded_file($_FILES['document']['tmp_name'], $document_path);

    // Save to DB
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
        '', -- adhivas
        '$shikshan',
        '', -- bussiness
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

    if ($query) {
        echo '<script>sweetalert("Form Submitted Successfully!", "balsangopan_yojana_arz.php", "");</script>';
    } else {
        echo '<script>erroralertsorry("Form Not Submitted!", "balsangopan_yojana_arz.php", "");</script>';
    }
}
?>
