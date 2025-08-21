<?php include('include/connection.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
    // $servername = "localhost";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "graha_chaukashi";
    
    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement
        $stmt = $conn->prepare("
            INSERT INTO chaukashi_forms (
                nav, dob, jat, ling, dharm, palaknav, shikshaknav, 
                contact, purviPata, pata, apanga, rahani, vyasan, relative, status
            ) VALUES (
                :nav, :dob, :jat, :ling, :dharm, :palaknav, :shikshaknav, 
                :contact, :purviPata, :pata, :apanga, :rahani, :vyasan, :relative, :status
            )
        ");
        
        // Bind parameters
        $stmt->bindParam(':nav', $_POST['nav']);
        $stmt->bindParam(':dob', $_POST['dob']);
        $stmt->bindParam(':jat', $_POST['jat']);
        $stmt->bindParam(':ling', $_POST['ling']);
        $stmt->bindParam(':dharm', $_POST['dharm']);
        $stmt->bindParam(':palaknav', $_POST['palaknav']);
        $stmt->bindParam(':shikshaknav', $_POST['shikshaknav']);
        $stmt->bindParam(':contact', $_POST['contact']);
        $stmt->bindParam(':purviPata', $_POST['purviPata']);
        $stmt->bindParam(':pata', $_POST['pata']);
        $stmt->bindParam(':apanga', $_POST['apanga']);
        $stmt->bindParam(':rahani', $_POST['rahani']);
        $stmt->bindParam(':vyasan', $_POST['vyasan']);
        $stmt->bindParam(':relative', $_POST['relative']);
        $stmt->bindParam(':status', $_POST['form_status']);
        
        // Execute the query
        $stmt->execute();
        
        // Success message
        $status = $_POST['form_status'] === 'approved' ? 'मंजूर' : 'नाकारलेला';
        $message = "फॉर्म यशस्वीरित्या सबमिट केला गेला आहे! स्थिती: $status";
        
        // Return success response
        echo "<script>
            alert('$message');
            window.location.href = 'graha_chaukashi.php';
        </script>";
        
    } catch(PDOException $e) {
        // Handle errors
        echo "<script>
            alert('त्रुटी: " . addslashes($e->getMessage()) . "');
            window.history.back();
        </script>";
    }
    
    $conn = null;
} else {
    header("Location: graha_chaukashi.php");
    exit();
}
?>