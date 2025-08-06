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
$husbandName = $_POST['husbandName'];
$husbandContact = $_POST['husbandContact'];
$ashaName = $_POST['ashaName'];
$ashaContact = $_POST['ashaContact'];
$patientCategory = $_POST['patientCategory'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$UPT = $_POST['UPT'];
$LMP = $_POST['LMP'];
$EDD = $_POST['EDD'];
$HB = $_POST['HB'];
$BP = $_POST['BP'];
$CBC = $_POST['CBC'];
$viralMarker = $_POST['viralMarker'];
$bloodGroup = $_POST['bloodGroup'];
$bloodSugar = $_POST['bloodSugar'];
$urineAlbumin = $_POST['urineAlbumin'];
$ttDose = $_POST['ttDose'];
$ttBooster = $_POST['ttBooster'];
$ironCalcium = $_POST['ironCalcium'];
$sonographyStatus = $_POST['sonographyStatus'];
$Referral = $_POST['Referral'];
$highriskMother = $_POST['highriskMother'];
$remark = $_POST['remark'];
$surkshitMatriyan = $_POST['surkshitMatriyan'];
$patientId ="ANCPNC_" . uniqid();
$treatmentId ="Treatment_" . uniqid();
$lab_required = $_POST['lab_required'];
$lab_remark = $_POST['lab_remark'];
$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];
$Diseases = $_POST['Diseases'];

$Diseases = $_POST['Diseases'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$query = "INSERT INTO `ancpncRegi`(
  `registerId`,`treatmentId`,`dateTime`,`date`,`taluka`, `village`, `motherName`, `motherContact`, 
  `husbandName`, `husbandContact`, `ashaName`, `ashaContact`, `patientCategory`, 
  `height`, `weight`, `UPT`, `LMP`, `EDD`, `HB`, `BP`, `CBC`, `viralMarker`, 
  `bloodGroup`, `bloodSugar`, `urineAlbumin`, `ttDose`, `ttBooster`, 
  `ironCalcium`, `sonographyStatus`, `Referral`, `highriskMother`, `remark`, 
  `surkshitMatriyan`, `teamId`, `teamName`,`lab_required`, `Diseases`, `birthDate`, `age`
) VALUES (
  '$patientId','$treatmentId','$date','$date1','$taluka', '$village', '$motherName', '$motherContact',
  '$husbandName', '$husbandContact', '$ashaName', '$ashaContact', '$patientCategory',
  '$height', '$weight', '$UPT', '$LMP', '$EDD', '$HB', '$BP', '$CBC', '$viralMarker',
  '$bloodGroup', '$bloodSugar', '$urineAlbumin', '$ttDose', '$ttBooster',
  '$ironCalcium', '$sonographyStatus', '$Referral', '$highriskMother', '$remark',
  '$surkshitMatriyan', '$teamId', '$teamName','$lab_required', '$Diseases', '$dob', '$age'
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
        VALUES ('$patientId','$treatmentId','$test_type', '$method', '$obs', '$result','$date1','ancpncRegi','$lab_remark','$teamId')") or die($conn->error);
        }
    }
}



if (!empty($_POST['medicine'])) {
foreach ($medicine as $index => $medicine1) {
    $quantity1 = $quantity[$index];

    // 1. Insert into medicineDistribution
    $queryMedicine = mysqli_query($conn, "INSERT INTO `medicineDistribution`(`treatmentId`, `patient`, `medicine`, `quantity`, `date`, `tableName`,`teamId`) VALUES ('$treatmentId','$patientId','$medicine1','$quantity1','$date1','ancpncRegi','$teamId')");

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



if(isset($_POST['update'])) {
$taluka = $_POST['taluka'];
$village = $_POST['village'];
$motherName = $_POST['motherName'];
$motherContact = $_POST['motherContact'];
$husbandName = $_POST['husbandName'];
$husbandContact = $_POST['husbandContact'];
$ashaName = $_POST['ashaName'];
$ashaContact = $_POST['ashaContact'];
$patientCategory = $_POST['patientCategory'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$UPT = $_POST['UPT'];
$LMP = $_POST['LMP'];
$EDD = $_POST['EDD'];
$HB = $_POST['HB'];
$BP = $_POST['BP'];
$CBC = $_POST['CBC'];
$viralMarker = $_POST['viralMarker'];
$bloodGroup = $_POST['bloodGroup'];
$bloodSugar = $_POST['bloodSugar'];
$urineAlbumin = $_POST['urineAlbumin'];
$ttDose = $_POST['ttDose'];
$ttBooster = $_POST['ttBooster'];
$ironCalcium = $_POST['ironCalcium'];
$sonographyStatus = $_POST['sonographyStatus'];
$Referral = $_POST['Referral'];
$highriskMother = $_POST['highriskMother'];
$remark = $_POST['remark'];
$surkshitMatriyan = $_POST['surkshitMatriyan'];
$patientId =$_POST['registerId'];
$treatmentId ="Treatment_" . uniqid();
$lab_required = $_POST['lab_required'];
$lab_remark = $_POST['lab_remark'];
    
$medicine = $_POST['medicine'];
$quantity = $_POST['quantity'];

$Diseases = $_POST['Diseases'];
$age = $_POST['age'];
$dob = $_POST['dob'];
 $query = "INSERT INTO `ancpncRegi`(
  `registerId`,`treatmentId`,`dateTime`,`date`,`taluka`, `village`, `motherName`, `motherContact`, 
  `husbandName`, `husbandContact`, `ashaName`, `ashaContact`, `patientCategory`, 
  `height`, `weight`, `UPT`, `LMP`, `EDD`, `HB`, `BP`, `CBC`, `viralMarker`, 
  `bloodGroup`, `bloodSugar`, `urineAlbumin`, `ttDose`, `ttBooster`, 
  `ironCalcium`, `sonographyStatus`, `Referral`, `highriskMother`, `remark`, 
  `surkshitMatriyan`, `teamId`, `teamName`,`lab_required`, `Diseases`, `birthDate`, `age`
) VALUES (
  '$patientId','$treatmentId','$date','$date1','$taluka', '$village', '$motherName', '$motherContact',
  '$husbandName', '$husbandContact', '$ashaName', '$ashaContact', '$patientCategory',
  '$height', '$weight', '$UPT', '$LMP', '$EDD', '$HB', '$BP', '$CBC', '$viralMarker',
  '$bloodGroup', '$bloodSugar', '$urineAlbumin', '$ttDose', '$ttBooster',
  '$ironCalcium', '$sonographyStatus', '$Referral', '$highriskMother', '$remark',
  '$surkshitMatriyan', '$teamId', '$teamName','$lab_required', '$Diseases', '$dob', '$age'
)";
$insert = mysqli_query($conn,$query);



if (!empty($_POST['medicine'])) {

foreach ($medicine as $index => $medicine1) {
    $quantity1 = $quantity[$index];

    // 1. Insert into medicineDistribution
    $queryMedicine = mysqli_query($conn, "INSERT INTO `medicineDistribution`(`treatmentId`, `patient`, `medicine`, `quantity`, `date`, `tableName`,`teamId`) VALUES ('$treatmentId','$patientId','$medicine1','$quantity1','$date1','ancpncRegi','$teamId')");

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
        VALUES ('$patientId','$treatmentId','$test_type', '$method', '$obs', '$result','$date1','ancpncRegi','$lab_remark','$teamId')") or die($conn->error);
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