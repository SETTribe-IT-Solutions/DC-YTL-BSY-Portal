<?php
include('include/connection.php');

// Handle GET request for approval
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'], $_GET['action']) && $_GET['action'] == 'approve') {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $query = "UPDATE balsangopan_form SET eskuritiStatus1 = 'approve' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            header("Location: ScootiniReport1.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Handle POST request for rejection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['action']) && $_POST['action'] == 'rejected') {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        $query = "UPDATE balsangopan_form SET eskuritiStatus1 = 'rejected', eskuriti1Remark = '$remark' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            header("Location: ScootiniReport1.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
