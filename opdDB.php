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
$taluka = $_POST['taluka'] ?? '';
$village = $_POST['village'] ?? '';
$nameAsha = $_POST['nameAsha'] ?? '';
$contactNumber = $_POST['contactNumber'] ?? '';
$patientName = $_POST['patientName'] ?? '';
$age = $_POST['Age'] ?? '';
$Gender = $_POST['gender'] ?? '';
$address = $_POST['address'] ?? '';
$pateintContact = $_POST['pateintContact'] ?? '';
$aadharCard = $_POST['aadharCard'] ?? '';
$height = $_POST['height'] ?? '';
$weight = $_POST['weight'] ?? '';
$temp = $_POST['temp'] ?? '';
$BP = $_POST['BP'] ?? '';
$medicleSurgery = $_POST['medicleSurgery'] ?? '';
$screenigTuberculosis = $_POST['screenigTuberculosis'] ?? '';
$ScreeningHypertension = $_POST['ScreeningHypertension'] ?? '';
$ScreeningDiabetes = $_POST['ScreeningDiabetes'] ?? '';
$ScreeningOral = $_POST['ScreeningOral'] ?? '';
$ScreeningEye = $_POST['ScreeningEye'] ?? '';
$NCD = $_POST['NCD'] ?? '';
$tests = $_POST['tests'] ?? '';
$patientTreatment = $_POST['patientTreatment'] ?? '';
$ayushManCard = $_POST['ayushManCard'] ?? '';
$patientReferal = $_POST['patientReferal'] ?? '';
$remark  = $_POST['remark'];
$patientId ="Patient_" . uniqid();
$treatmentId ="Treatment_" . uniqid();
$lab_required = $_POST['lab_required'];
$lab_remark = $_POST['lab_remark'];

    
$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];
$Diseases = $_POST['Diseases'];
$dob = $_POST['dob'] ?? '';





$query = mysqli_query($conn, "
  INSERT INTO `opdRegister` (
    `registerId`,`treatmentId`, `dateTime`,`date`, `taluka`, `village`, `nameAsha`, `contactNumber`, `patientName`, `age`, `Gender`, `address`, `pateintContact`, `aadharCard`,
    `height`, `weight`, `temp`, `BP`, `medicleSurgery`, `screenigTuberculosis`, `ScreeningHypertension`, `ScreeningDiabetes`, `ScreeningOral`, `ScreeningEye`,
    `NCD`, `tests`, `patientTreatment`, `ayushManCard`, `patientReferal`, `remark`, `teamId`, `teamName`,`lab_required`, `Diseases`, `birthDate`
  ) VALUES (
    '$patientId','$treatmentId', '$date','$date1','$taluka', '$village', '$nameAsha', '$contactNumber', '$patientName', '$age', '$Gender', '$address', '$pateintContact', '$aadharCard',
    '$height', '$weight', '$temp', '$BP', '$medicleSurgery', '$screenigTuberculosis', '$ScreeningHypertension', '$ScreeningDiabetes', '$ScreeningOral', '$ScreeningEye',
    '$NCD', '$tests', '$patientTreatment', '$ayushManCard', '$patientReferal', '$remark', '$teamId', '$teamName','$lab_required', '$Diseases', '$dob'
  )
") or die($conn->error);

if (!empty($_POST['medicine'])) {

foreach ($medicine as $index => $medicine1) {
    $quantity1 = $quantity[$index];

    // 1. Insert into medicineDistribution
    $queryMedicine = mysqli_query($conn, "INSERT INTO `medicineDistribution`(`treatmentId`, `patient`, `medicine`, `quantity`, `date`,`tableName`,`teamId`) VALUES ('$treatmentId','$patientId','$medicine1','$quantity1','$date','opdRegister','$teamId')");

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
if (!empty($_POST['tests'])) {
 
    foreach ($_POST['tests'] as $test) {
       
        $test_type = $conn->real_escape_string($test['test_type']);
        $method = $conn->real_escape_string($test['method']);
        $obs = $conn->real_escape_string($test['observation']);
        $result = $conn->real_escape_string($test['result']);

        if ($test_type != '') {
         
         $labquery = mysqli_query($conn,"INSERT INTO labtests 
        (registerId, treatmentId, test_type, method, observation,result,date,tableName,lab_remark,teamId) 
        VALUES ('$patientId','$treatmentId','$test_type', '$method', '$obs', '$result','$date1','opdRegister','$lab_remark','$teamId')") or die($conn->error);
        }
    }
}
if($query){
echo '<script>sweetalert("Patient Details Inserted Successfully!", "opdRegister.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "opdRegister.php", "");</script>';
}

}



if(isset($_POST['update'])) {
$taluka = $_POST['taluka'] ?? '';
$village = $_POST['village'] ?? '';
$nameAsha = $_POST['nameAsha'] ?? '';
$contactNumber = $_POST['contactNumber'] ?? '';
$patientName = $_POST['patientName'] ?? '';
$age = $_POST['Age'] ?? '';
$Gender = $_POST['gender'] ?? '';
$address = $_POST['address'] ?? '';
$pateintContact = $_POST['pateintContact'] ?? '';
$aadharCard = $_POST['aadharCard'] ?? '';
$height = $_POST['height'] ?? '';
$weight = $_POST['weight'] ?? '';
$temp = $_POST['temp'] ?? '';
$BP = $_POST['BP'] ?? '';
$medicleSurgery = $_POST['medicleSurgery'] ?? '';
$screenigTuberculosis = $_POST['screenigTuberculosis'] ?? '';
$ScreeningHypertension = $_POST['ScreeningHypertension'] ?? '';
$ScreeningDiabetes = $_POST['ScreeningDiabetes'] ?? '';
$ScreeningOral = $_POST['ScreeningOral'] ?? '';
$ScreeningEye = $_POST['ScreeningEye'] ?? '';
$NCD = $_POST['NCD'] ?? '';
$tests = $_POST['tests'] ?? '';
$patientTreatment = $_POST['patientTreatment'] ?? '';
$ayushManCard = $_POST['ayushManCard'] ?? '';
$patientReferal = $_POST['patientReferal'] ?? '';
$remark  = $_POST['remark'];
$patientId = $_POST['registerId'];
$treatmentId ="Treatment_" . uniqid();
 $lab_required = $_POST['lab_required'];
$lab_remark = $_POST['lab_remark'];   
$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];
$Diseases = $_POST['Diseases'];
$dob= $_POST['dob'] ?? '';

$query = mysqli_query($conn, "
  INSERT INTO `opdRegister` (
    `registerId`,`treatmentId`, `dateTime`,`date`,`taluka`, `village`, `nameAsha`, `contactNumber`, `patientName`, `age`, `Gender`, `address`, `pateintContact`, `aadharCard`,
    `height`, `weight`, `temp`, `BP`, `medicleSurgery`, `screenigTuberculosis`, `ScreeningHypertension`, `ScreeningDiabetes`, `ScreeningOral`, `ScreeningEye`,
    `NCD`, `tests`, `patientTreatment`, `ayushManCard`, `patientReferal`, `remark`, `teamId`, `teamName`,`lab_required`, `Diseases`, `birthDate`
  ) VALUES (
    '$patientId','$treatmentId', '$date','$date1','$taluka', '$village', '$nameAsha', '$contactNumber', '$patientName', '$age', '$Gender', '$address', '$pateintContact', '$aadharCard',
    '$height', '$weight', '$temp', '$BP', '$medicleSurgery', '$screenigTuberculosis', '$ScreeningHypertension', '$ScreeningDiabetes', '$ScreeningOral', '$ScreeningEye',
    '$NCD', '$tests', '$patientTreatment', '$ayushManCard', '$patientReferal', '$remark', '$teamId', '$teamName','$lab_required', '$Diseases', '$dob'
  )
") or die($conn->error);

if (!empty($_POST['medicine'])) {

foreach ($medicine as $index => $medicine1) {
    $quantity1 = $quantity[$index];

    // 1. Insert into medicineDistribution
    $queryMedicine = mysqli_query($conn, "INSERT INTO `medicineDistribution`(`treatmentId`, `patient`, `medicine`, `quantity`, `date`,`tableName`,`teamId`) VALUES ('$treatmentId','$patientId','$medicine1','$quantity1','$date','opdRegister','$teamId')");

    // 2. Deduct stock from medicineStock (loop across rows if needed)
    $remainingQty = $quantity1;

  echo "SELECT * FROM `medicineStock` WHERE `medicine` = '$medicine1' AND `remaining` > 0 AND `teamId` = '$teamId' ORDER BY `expiryDate` ASC";
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
if (!empty($_POST['tests'])) {
 
    foreach ($_POST['tests'] as $test) {
       
        $test_type = $conn->real_escape_string($test['test_type']);
        $method = $conn->real_escape_string($test['method']);
        $obs = $conn->real_escape_string($test['observation']);
        $result = $conn->real_escape_string($test['result']);

        if ($test_type != '') {
         
         $labquery = mysqli_query($conn,"INSERT INTO labtests 
        (registerId, treatmentId, test_type, method, observation,result,date,tableName,lab_remark,teamId) 
        VALUES ('$patientId','$treatmentId','$test_type', '$method', '$obs', '$result','$date1','opdRegister','$lab_remark','$teamId')") or die($conn->error);
        }
    }
}

if($query){
echo '<script>sweetalert("Patient Details Inserted Successfully!", "opdRegister.php", "");</script>';
} else{
echo '<script>erroralertsorry("Team Not Created Successfully!", "opdRegister.php", "");</script>';
}

}


?>