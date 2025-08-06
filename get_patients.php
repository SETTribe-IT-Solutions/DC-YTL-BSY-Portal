<?php
include('include/connection.php');
$formType = $_POST['formType'];
$taluka = $_POST['taluka'];
$village = $_POST['village'];
$selectedPatientId = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';

$options = '<option value="" selected disabled>Select Patient</option>';

if ($formType == 'opdRegister') {
    $query = mysqli_query($conn, "
        SELECT DISTINCT(registerId), patientName  FROM opdRegister
            WHERE taluka = '$taluka' AND village = '$village'
            GROUP BY registerId
        )
        ORDER BY registerId DESC
    ");
    while ($row = mysqli_fetch_assoc($query)) {
        $selected = ($selectedPatientId == $row['registerId']) ? 'selected' : '';
        $options .= '<option value="' . $row['registerId'] . '" ' . $selected . '>' . $row['patientName'] . '</option>';
    }
} elseif ($formType == 'childRegister') {
    $query = mysqli_query($conn, "
        SELECT DISTINCT(registerId), childName FROM childRegister
        WHERE taluka = '$taluka' AND village = '$village'
        ORDER BY id DESC
    ");
    while ($row = mysqli_fetch_assoc($query)) {
        $selected = ($selectedPatientId == $row['registerId']) ? 'selected' : '';
        $options .= '<option value="' . $row['registerId'] . '" ' . $selected . '>' . $row['childName'] . '</option>';
    }
} elseif ($formType == 'ancpncRegi') {
    $query = mysqli_query($conn, "
        SELECT DISTINCT(registerId), motherName FROM ancpncRegi
        WHERE taluka = '$taluka' AND village = '$village'
        ORDER BY id DESC
    ");
    while ($row = mysqli_fetch_assoc($query)) {
        $selected = ($selectedPatientId == $row['registerId']) ? 'selected' : '';
        $options .= '<option value="' . $row['registerId'] . '" ' . $selected . '>' . $row['motherName'] . '</option>';
    }
}

echo $options;
?>
