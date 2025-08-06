<?php
session_start();
include('include/connection.php');

if (!isset($_SESSION['userId'], $_SESSION['teamId'])) {
    header('Location: login.php');
    exit;
}

// Handle updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updates'])) {
    $stmt = $conn->prepare("
        UPDATE EquipmentInventory
        SET available = ?,  userId = ?, teamId = ?, updated_at = NOW()
        WHERE id = ?");
    foreach ($_POST['updates'] as $id => $avail) {
        $stmt->bind_param(
            "issi",
            $avail,
            $_SESSION['userId'],
            $_SESSION['teamId'],
            $id
        );
        $stmt->execute();
    }
    echo json_encode(['success' => true]);
    exit;
}

// Return JSON for AJAX
header('Content-Type: application/json');
$res = $conn->query("SELECT id, name, available FROM EquipmentInventory ORDER BY id");
$data = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
$conn->close();
exit;
?>
