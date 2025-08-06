<?php
// Start output buffering and session at the very top
ob_start();
session_start();

include('include/connection.php');
include('include/sweetAlert.php');

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username !== '' && $password !== '') {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // If you are storing plain text (not recommended), compare directly:
            if ($password === $user['password']) {
                $_SESSION['teamId']     = $user['teamId'];
                $_SESSION['teamName']   = $user['teamName'];
                $_SESSION['username'] = $user['username'];
                  $_SESSION['role'] = $user['role'];
                $_SESSION['logged_in']  = true;

                if($user['role'] == "admin") {
                header("Location: dashboard.php");
                } else {
                    header("Location: visitMaster.php");
                }
                exit; // STOP further execution
            } else {
                echo "<script>erroralertsorry('Invalid password','login.php','');</script>";
            }
        } else {
            echo "<script>erroralertsorry('Invalid username or password','login.php','');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter both username and password');</script>";
    }
}

// Now that all logic is complete, flush the buffer so HTML can render
ob_end_flush();
?>