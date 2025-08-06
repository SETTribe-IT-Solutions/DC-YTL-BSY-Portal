<?php
session_start();
include('include/connection.php');

if (!isset($_SESSION['userId'], $_SESSION['teamId'])) {
    header('Location: login.php');
    exit;
}

$teamId = $_SESSION['teamId'];

// Fetch team name for display
$stmtTeam = $conn->prepare("SELECT full_name FROM users WHERE teamId = ? LIMIT 1");
$stmtTeam->bind_param("i", $teamId);
$stmtTeam->execute();
$stmtTeam->bind_result($full_name);
$stmtTeam->fetch();
$stmtTeam->close();

// Fetch equipment
header('Content-Type: application/json');
$stmt = $conn->prepare("SELECT  name, available FROM EquipmentInventory WHERE teamId = ? ORDER BY id");
$stmt->bind_param("i", $teamId);
$stmt->execute();
$res = $stmt->get_result();

$data = [];
while ($row = $res->fetch_assoc()) {
    $row['available'] = $row['available'] == 1 ? 'Yes' : 'No';
    $data[] = $row;
}

echo json_encode(['full_name' => $full_name, 'equipment' => $data]);
$conn->close();
exit;
