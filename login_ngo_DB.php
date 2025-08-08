<?php
// Start session at the top
session_start();
ob_start();

include('include/connection.php');
include('include/sweetAlert.php');

if (isset($_POST['submit'])) {
    $mobile_no = trim($_POST['mobile_no']);
    $Password = trim($_POST['Password']);

    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE mobile_no = ? AND Password = ?");
    $stmt->bind_param("ss", $mobile_no, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Login successful
        $_SESSION['user_id'] = $row['id']; // Save session user id

        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Login Successful!',
                text: 'Redirecting to report page...',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'ScootiniReport1.php';
            });
        </script>";
    } else {
    // Invalid login
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: 'Invalid mobile number or password.',
            timer: 1500
        }).then(() => {
            window.location.href = 'login_ngo.php';
        });
    </script>";
}
}
ob_end_flush();
?>
