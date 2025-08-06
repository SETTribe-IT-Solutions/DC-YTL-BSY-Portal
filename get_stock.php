<?php
include('include/connection.php');

if (isset($_POST['medicineId'])) {
    $medicineId = $_POST['medicineId'];
    $query = "SELECT SUM(remaining) as totalStock FROM medicineStock WHERE medicine = '$medicineId'";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $totalStock = $row['totalStock'] !== null ? (int)$row['totalStock'] : 0;
        echo $totalStock;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>
