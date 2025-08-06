<option value="" disabled selected>Select Service</option>
<?php
include('include/connection.php');

if(isset($_POST['scheme'])) {
$type = $_POST['scheme'];

$query = mysqli_query($conn,"select distinct(service) from services where type='$type'") or die($conn->error);
while($res = mysqli_fetch_assoc($query)) { ?>

 <option value="<?php echo $res['service'] ?>"><?php echo $res['service'] ?></option>

<?php
}
}

?>