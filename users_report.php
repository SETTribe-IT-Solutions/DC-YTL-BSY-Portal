
<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['userId'];
$date = date('Y-m-d');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
     <?php include('include/title.php') ?>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJ+Y3bK1kq3I2+8zStGfnEkzs74Xk5/7X6X0k="
        crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <style>
      input.form-control, select.form-control, textarea.form-control {
  transition: all 0.3s ease-in-out;
}

input.form-control:focus, select.form-control:focus, textarea.form-control:focus {
  border-color: #86b7fe;
  box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
}

    </style>
      <style>
      .eleven h1 {
  font-size:30px;text-align:center; 
          line-height:1.5em;
          padding-bottom:45px; 
          font-family:"Playfair Display", serif; 
          text-transform:uppercase;
          letter-spacing: 2px; 
          color:#111;
}


.eleven h1:before {
  position: absolute;
  left: 0;
  bottom: 20px;
  width: 60%;
  left:50%; 
margin-left:-30%;
  height: 1px;
  content: "";
  background-color: #777;
    z-index: 1;
}
.eleven h1:after {
  position:absolute;
  width:40px; 
    height:40px; 
    left:50%; 
    margin-left:-20px;
    bottom:0px;
  content: '\00a7'; 
    font-size:30px; 
    line-height:40px;
    color:#c50000;
  font-weight:400; 
    z-index:1;
  display:block;
  background-color:#f8f8f8;
}
       
      </style>
    <!-- jQuery -->


<!-- Add more as needed -->

  </head>
  <body class="vertical light d-flex flex-column min-vh-100">

  <!-- Page Wrapper -->
  <div class="wrapper flex-grow-1">
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>

    <!-- Main content goes here -->
  <main role="main" class="main-content">
        <div class="container-fluid">
     <div class="row">
      <div class="col-md-12">
                  <div class="card shadow mb-4">
                   <!-- <div class="card-header eleven">
                        <h1 class="card-title" style="font-size:2rem">Create MMU Team</h1>
                    </div>-->
                    
                    <div class="card-body">
                        
                        <h1 >OPD Register</h1>
                <?php
                $query = mysqli_query($conn,"SELECT * FROM `visitedArea` where teamId='$teamId'  AND visitDate='$date'") or die($conn->error);
$fetchArea = mysqli_fetch_assoc($query);

$taluka = $fetchArea['taluka'];
$village = $fetchArea['village'];
                ?>
<form class="needs-validation" action="users_report.php" method="POST" novalidate>
  <div class="form-row">

    <!-- Form Type Dropdown -->
    <div class="col-md-3 mb-3">
      <label for="formType"><strong>Select Form <b style="color:red">*</b></strong></label>
      <select class="form-control select2" id="formType" name="form_type" required>
        <option value="" selected disabled>Select Form</option>
        <option value="opdRegister">OPD Register</option>
        <option value="childRegister">Child Register</option>
        <option value="ancpncRegi">ANC/PNC Register</option>
      </select>
      <div class="invalid-feedback"> Please select a form. </div>
    </div>

    <!-- Patient Name Dropdown -->
    <div class="col-md-3 mb-3">
      <label for="patient"><strong>Patient Name <b style="color:red">*</b></strong></label>
      <select class="form-control select2" id="patient" name="patient_id" required>
        <option value="" selected disabled>Select Patient</option>
      </select>
      <div class="invalid-feedback"> Please select a valid patient. </div>
    </div>

    <!-- Taluka -->
    <div class="col-md-3 mb-3">
      <label for="taluka"><strong>Taluka <b style="color:red">*</b></strong></label>
      <input type="text" class="form-control" id="taluka" name="taluka" value="<?php echo $taluka ?>" readonly required>
      <div class="invalid-feedback"> Please enter Taluka. </div>
    </div>

    <!-- Village -->
    <div class="col-md-3 mb-3">
      <label for="village"><strong>Village <b style="color:red">*</b></strong></label>
      <input type="text" class="form-control" id="village" name="village" value="<?php echo $village ?>" readonly required>
      <div class="invalid-feedback"> Please enter Village. </div>
    </div>

    <!-- Submit -->
    <div class="col-md-3 mb-3">
      <button class="btn btn-primary mt-4" name="Show" type="submit">Show</button>
    </div>
  </div>
</form>

<?php
if (isset($_POST['Show'])) {

    $form_type = $_POST['form_type'] ?? '';
    $patient_id = $_POST['patient_id'] ?? '';
    $taluka = $_POST['taluka'] ?? '';
    $village = $_POST['village'] ?? '';

    // Sanitize inputs
    $form_type = mysqli_real_escape_string($conn, $form_type);
    $patient_id = (int) $patient_id;
    $taluka = mysqli_real_escape_string($conn, $taluka);
    $village = mysqli_real_escape_string($conn, $village);

    // Validate form type
    $allowed_tables = ['opdRegister', 'childRegister', 'ancpncRegi'];
    if (!in_array($form_type, $allowed_tables)) {
        echo "<div class='alert alert-danger mt-4'>Invalid form selected.</div>";
        exit;
    }

    // Fetch data
    $query = "SELECT * FROM $form_type WHERE id = '$patient_id' AND taluka = '$taluka' AND village = '$village'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h5 class='mt-4'>Report from <b>" . htmlspecialchars($form_type) . "</b></h5>";
echo "<div class='table-responsive'>
        <table id='reportTable' class='table table-bordered table-striped'>";
        echo "<thead><tr>";

        // Table headers
        $fields = mysqli_fetch_fields($result);
        foreach ($fields as $field) {
            echo "<th>" . ucfirst($field->name) . "</th>";
        }

        echo "</tr></thead><tbody>";

        // Table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody></table></div>";
    } else {
        echo "<div class='alert alert-warning mt-4'>No data found for the selected patient in $form_type.</div>";
    }
}
?>

                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->
              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->

      </main>
        </div>


  
    <?php include('include/footer.php'); ?>
<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS & CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function () {
    $('.select2').select2({
      width: '100%' // Ensure it fits properly inside Bootstrap columns
    });
  });
</script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#reportTable').DataTable({
      pageLength: 10,
      lengthMenu: [5, 10, 25, 50, 100],
      language: {
        search: "🔍 Search:"
      }
    });
  });
</script>

<!-- Load core JS files in correct order -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js?v=<?php echo $version; ?>"></script>

<!-- Load moment.js before any date-related scripts -->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>

<!-- Other required JS plugins -->
<script src="js/simplebar.min.js"></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>

<!-- Chart libraries -->
<script src="js/Chart.min.js"></script>
<script>
  // define global chart options
  Chart.defaults.global.defaultFontFamily = base?.defaultFontFamily || 'Arial';
  Chart.defaults.global.defaultFontColor = colors?.mutedColor || '#333';
</script>


<!-- Form and UI related -->
<script src='js/jquery.mask.min.js?v=<?php echo $version; ?>'></script>
<script src='js/select2.min.js?v=<?php echo $version; ?>'></script>
<script src='js/jquery.steps.min.js?v=<?php echo $version; ?>'></script>
<script src='js/jquery.validate.min.js?v=<?php echo $version; ?>'></script>
<script src='js/jquery.timepicker.js?v=<?php echo $version; ?>'></script>
<script src='js/dropzone.min.js?v=<?php echo $version; ?>'></script>
<script src='js/uppy.min.js?v=<?php echo $version; ?>'></script>
<script src='js/quill.min.js?v=<?php echo $version; ?>'></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#formType').on('change', function () {
    const formType = $(this).val();
    const taluka = $('#taluka').val();
    const village = $('#village').val();

    if (formType) {
      $.ajax({
        url: 'get_patients.php',
        type: 'POST',
        data: { formType: formType, taluka: taluka, village: village },
        success: function (response) {
          $('#patient').html(response);
        }
      });
    }
  });
</script>


 
  </body>

</html>