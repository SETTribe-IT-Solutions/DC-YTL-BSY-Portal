<?php
include("include/connection.php");

if (isset($_POST['taluka'])) {
    $taluka = mysqli_real_escape_string($conn, $_POST['taluka']);
    $query = mysqli_query($conn, "SELECT DISTINCT village FROM taluka WHERE taluka='$taluka' ORDER BY village");

    echo '<option value="">Select Village</option>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row['village'] . '">' . $row['village'] . '</option>';
    }
}
?>