<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone

$teamId = $_SESSION['teamId'];
$teamName = $_SESSIOn['teamName'];
$byUser = $_SESSION['username'];

$date = date('Y-m-d H:i:s');
$date1 = date('Y-m-d');

if(isset($_POST['submit'])) {
$taluka = $_POST['taluka'];
$village = $_POST['village'];
$motherName = $_POST['motherName'];
$motherContact = $_POST['motherContact'];
$fatherName = $_POST['fatherName'];
$fatherContact = $_POST['fatherContact'];
$ashaName = $_POST['ashaName'];
$ashaContact = $_POST['ashaContact'];
$childName = $_POST['childName'];
$birthDate = $_POST['birthDate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$otherDetails = $_POST['otherDetails'];
$ImmunizationStatus = $_POST['ImmunizationStatus'];
$healthHistory = $_POST['healthHistory'];
$childTreatment = $_POST['childTreatment'];
$Referral = $_POST['Referral'];
$remark = $_POST['remark'];
$patientId ="CHILD_" . uniqid();
$treatmentId ="Treatment_" . uniqid();
$lab_required = $_POST['lab_required'];
$lab_remark = $_POST['lab_remark'];
$treatmentId ="Treatment_" . uniqid();
    
$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];
$Diseases = $_POST['Diseases'];

 $query = "INSERT INTO `childRegister`(
  `registerId`,`treatmentId`,`dateTime`,`date`,`taluka`,`village`,`motherName`, `motherContact`, `fatherName`, `fatherContact`,
  `ashaName`, `ashaContact`, `childName`, `birthDate`, `age`, `gender`, `height`, `weight`,
  `otherDetails`, `ImmunizationStatus`, `healthHistory`, `childTreatment`, `Referral`, `remark`,
  `teamId`, `teamName`,`lab_required`, `Diseases`
) VALUES (
  '$patientId','$treatmentId','$date','$date1','$taluka','$village','$motherName', '$motherContact', '$fatherName', '$fatherContact',
  '$ashaName', '$ashaContact', '$childName', '$birthDate', '$age', '$gender', '$height', '$weight',
  '$otherDetails', '$ImmunizationStatus', '$healthHistory', '$childTreatment', '$Referral', '$remark',
  '$teamId', '$teamName','$lab_required', '$Diseases'
)";

$insert = mysqli_query($conn,$query);



if (!empty($_POST['tests'])) {
 
    foreach ($_POST['tests'] as $test) {
       
        $test_type = $conn->real_escape_string($test['test_type']);
        $method = $conn->real_escape_string($test['method']);
        $obs = $conn->real_escape_string($test['observation']);
        $result = $conn->real_escape_string($test['result']);

        if ($test_type != '') {
         
         $labquery = mysqli_query($conn,"INSERT INTO labtests 
        (registerId, treatmentId, test_type, method, observation,result,date,tableName,lab_remark,teamId) 
        VALUES ('$patientId','$treatmentId','$test_type', '$method', '$obs', '$result','$date1','childRegister','$lab_remark','$teamId')") or die($conn->error);
        }
    }
}

if (!empty($_POST['medicine'])) {
foreach ($medicine as $index => $medicine1) {
    $quantity1 = $quantity[$index];

    // 1. Insert into medicineDistribution
    $queryMedicine = mysqli_query($conn, "INSERT INTO `medicineDistribution`(`treatmentId`, `patient`, `medicine`, `quantity`, `date`, `tableName`,`teamId`) VALUES ('$treatmentId','$patientId','$medicine1','$quantity1','$date','childRegister','$teamId')");

    // 2. Deduct stock from medicineStock (loop across rows if needed)
    $remainingQty = $quantity1;


    $stockRows = mysqli_query($conn, "SELECT * FROM `medicineStock` WHERE `medicine` = '$medicine1' AND `remaining` > 0 AND `teamId` = '$teamId' ORDER BY `expiryDate` ASC");

    while ($row = mysqli_fetch_assoc($stockRows)) {
        $stockId = $row['id'];
        $available = $row['remaining'];
        $issued = $row['issued'];

        if ($available >= $remainingQty) {
            $newIssued = $issued + $remainingQty;
            $newRemaining = $available - $remainingQty;

            // Update the stock row
            mysqli_query($conn, "UPDATE `medicineStock` SET `issued` = '$newIssued', `remaining` = '$newRemaining' WHERE `id` = '$stockId'");
            break; // Done issuing required quantity
        } else {
            // Use up this row completely
            $newIssued = $issued + $available;
            $newRemaining = 0;
            $remainingQty -= $available;

            mysqli_query($conn, "UPDATE `medicineStock` SET `issued` = '$newIssued', `remaining` = '$newRemaining' WHERE `id` = '$stockId'");
            // Continue loop to deduct from next row
        }
    }
}

}



if($insert){
echo '<script>sweetalert("Patient Details Inserted Successfully!", "childRegister.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "childRegister.php", "");</script>';
}

}


if(isset($_POST['update'])) {
$taluka = $_POST['taluka'];
$village = $_POST['village'];
$motherName = $_POST['motherName'];
$motherContact = $_POST['motherContact'];
$fatherName = $_POST['fatherName'];
$fatherContact = $_POST['fatherContact'];
$ashaName = $_POST['ashaName'];
$ashaContact = $_POST['ashaContact'];
$childName = $_POST['childName'];
$birthDate = $_POST['birthDate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$otherDetails = $_POST['otherDetails'];
$ImmunizationStatus = $_POST['ImmunizationStatus'];
$healthHistory = $_POST['healthHistory'];
$childTreatment = $_POST['childTreatment'];
$Referral = $_POST['Referral'];
$remark = $_POST['remark'];
$patientId = $_POST['registerId'];
$treatmentId ="Treatment_" . uniqid();
$lab_required = $_POST['lab_required'];
$lab_remark = $_POST['lab_remark'];
    $treatmentId ="Treatment_" . uniqid();


$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];
$Diseases = $_POST['Diseases'];

$query = "INSERT INTO `childRegister`(
  `registerId`,`treatmentId`,`dateTime`,`date`,`taluka`,`village`,`motherName`, `motherContact`, `fatherName`, `fatherContact`,
  `ashaName`, `ashaContact`, `childName`, `birthDate`, `age`, `gender`, `height`, `weight`,
  `otherDetails`, `ImmunizationStatus`, `healthHistory`, `childTreatment`, `Referral`, `remark`,
  `teamId`, `teamName`,`lab_required`, `Diseases`
) VALUES (
  '$patientId','$treatmentId','$date','$date1','$taluka','$village','$motherName', '$motherContact', '$fatherName', '$fatherContact',
  '$ashaName', '$ashaContact', '$childName', '$birthDate', '$age', '$gender', '$height', '$weight',
  '$otherDetails', '$ImmunizationStatus', '$healthHistory', '$childTreatment', '$Referral', '$remark',
  '$teamId', '$teamName','$lab_required', '$Diseases'
)";


$insert = mysqli_query($conn,$query);

if (!empty($_POST['tests'])) {
 
    foreach ($_POST['tests'] as $test) {
       
        $test_type = $conn->real_escape_string($test['test_type']);
        $method = $conn->real_escape_string($test['method']);
        $obs = $conn->real_escape_string($test['observation']);
        $result = $conn->real_escape_string($test['result']);

        if ($test_type != '') {
         
         $labquery = mysqli_query($conn,"INSERT INTO labtests 
        (registerId, treatmentId, test_type, method, observation,result,date,tableName,lab_remark,teamId) 
        VALUES ('$patientId','$treatmentId','$test_type', '$method', '$obs', '$result','$date1','childRegister','$lab_remark','$teamId')") or die($conn->error);
        }
    }
}

if (!empty($_POST['medicine'])) {
foreach ($medicine as $index => $medicine1) {
    $quantity1 = $quantity[$index];

    // 1. Insert into medicineDistribution
    $queryMedicine = mysqli_query($conn, "INSERT INTO `medicineDistribution`(`treatmentId`, `patient`, `medicine`, `quantity`, `date`, `tableName`,`teamId`) VALUES ('$treatmentId','$patientId','$medicine1','$quantity1','$date','childRegister','$teamId')");

    // 2. Deduct stock from medicineStock (loop across rows if needed)
    $remainingQty = $quantity1;


    $stockRows = mysqli_query($conn, "SELECT * FROM `medicineStock` WHERE `medicine` = '$medicine1' AND `remaining` > 0 AND `teamId` = '$teamId' ORDER BY `expiryDate` ASC");

    while ($row = mysqli_fetch_assoc($stockRows)) {
        $stockId = $row['id'];
        $available = $row['remaining'];
        $issued = $row['issued'];

        if ($available >= $remainingQty) {
            $newIssued = $issued + $remainingQty;
            $newRemaining = $available - $remainingQty;

            // Update the stock row
            mysqli_query($conn, "UPDATE `medicineStock` SET `issued` = '$newIssued', `remaining` = '$newRemaining' WHERE `id` = '$stockId'");
            break; // Done issuing required quantity
        } else {
            // Use up this row completely
            $newIssued = $issued + $available;
            $newRemaining = 0;
            $remainingQty -= $available;

            mysqli_query($conn, "UPDATE `medicineStock` SET `issued` = '$newIssued', `remaining` = '$newRemaining' WHERE `id` = '$stockId'");
            // Continue loop to deduct from next row
        }
    }
}

}

if($insert){
echo '<script>sweetalert("Patient Details Inserted Successfully!", "ancpncRegi.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "ancpncRegi.php", "");</script>';
}

}


?>