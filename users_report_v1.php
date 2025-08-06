
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
  #dataTable-1 thead {
    background-color: #007bff !important; /* Bootstrap Blue */
    color: black !important;   /* Force text to black */
  }

  #dataTable-1 thead th {
    font-weight: bold;
    vertical-align: middle;
     color: white;
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
                        
                        <h1>Patient History</h1>
                        
                    <?php
                $query = mysqli_query($conn,"SELECT * FROM `visitedArea` where teamId='$teamId'  AND visitDate='$date'") or die($conn->error);
$fetchArea = mysqli_fetch_assoc($query);

$taluka = $fetchArea['taluka'];
$village = $fetchArea['village'];
                ?>
<form method="GET" class="needs-validation" novalidate id="labReportForm">
  <div class="form-row">
    <!-- Form Type Dropdown -->
    <div class="col-md-3 mb-3">
      <label for="formType"><strong>Select Form <b style="color:red">*</b></strong></label>
      <select class="form-control select2" id="formType" name="form_type" required>
        <option value="" selected disabled>Select Form</option>
        <option value="opdRegister" <?php if(isset($_GET['form_type']) && $_GET['form_type'] == 'opdRegister') echo 'selected'; ?>>OPD Register</option>
        <option value="childRegister" <?php if(isset($_GET['form_type']) && $_GET['form_type'] == 'childRegister') echo 'selected'; ?>>Child Register</option>
        <option value="ancpncRegi" <?php if(isset($_GET['form_type']) && $_GET['form_type'] == 'ancpncRegi') echo 'selected'; ?>>ANC/PNC Register</option>
      </select>
    </div>

    <!-- Patient Name Dropdown -->
    <div class="col-md-3 mb-3">
      <label for="patient"><strong>Patient Name <b style="color:red">*</b></strong></label>
      <select class="form-control select2" id="patient" name="patient_id" required>
        <option value="" selected disabled>Select Patient</option>
        <!-- Options will be filled by AJAX -->
      </select>
    </div>

    <!-- Taluka -->
    <div class="col-md-3 mb-3">
      <label><strong>Taluka</strong></label>
      <input type="text" name="taluka" id="taluka" class="form-control" value="<?php echo $taluka; ?>" readonly required>
    </div>

    <!-- Village -->
    <div class="col-md-3 mb-3">
      <label><strong>Village</strong></label>
      <input type="text" name="village" id="village" class="form-control" value="<?php echo $village; ?>" readonly required>
    </div>

    <!-- Submit + Reset -->
    <div class="col-md-3 mb-3">
      <button type="submit" class="btn btn-primary mt-4">Show</button>
      <button type="button" class="btn btn-secondary mt-4 ml-2" id="resetBtn">Reset</button>
    </div>
  </div>
</form>



                     
                   <!-- <h1>OPD Register</h1> -->
<div class="table-responsive">
<?php
if (isset($_GET['form_type']) && isset($_GET['patient_id'])) {
    $formType = $_GET['form_type'];
    $patientId = $_GET['patient_id'];
    
    // Determine the table name and required fields
    $table = '';
    $nameField = '';
    $diseaseField = '';
    if ($formType == 'opdRegister') {
        $table = 'opdRegister';
        $nameField = 'patientName';
        $diseaseField = 'Desease';
    } elseif ($formType == 'childRegister') {
        $table = 'childRegister';
        $nameField = 'childName';
        $diseaseField = 'Desease';
    } elseif ($formType == 'ancpncRegi') {
        $table = 'ancpncRegi';
        $nameField = 'motherName';
        $diseaseField = 'Desease';
    }


    
    if ($table != '') {
        $q = mysqli_query($conn, "SELECT * FROM `$table` WHERE registerId = '$patientId' AND taluka = '$taluka' AND village = '$village'") or die($conn->error);
        if (mysqli_num_rows($q) > 0) {
    echo '<div class="table-responsive mt-3">';
    echo '<table id="dataTable-1" class="table table-bordered">';
    echo '<thead><tr>
            <th>Sr No</th>
            <th>Patient Name</th>
            <th>Disease</th>
            <th>Action</th>
          </tr></thead>';
    echo '<tbody>';

    $sr = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        echo '<tr>';
        echo '<td>' . $sr++ . '</td>';
        echo '<td>' . htmlspecialchars($row[$nameField]) . '</td>';
        echo '<td>' . htmlspecialchars($row['Diseases']) . '</td>';
        $pageName = $table;
        echo '<td>
                <a href="' . $pageName . '.php?edit=' . $row['id'] . '" class="btn btn-sm btn-warning mr-1">Edit</a>
              </td>';
        echo '</tr>';
    }

    echo '</tbody></table></div>';
} else {
    echo '<p class="text-danger">No record found.</p>';
}

    } else {
        echo '<p class="text-danger">Invalid form selected.</p>';
    }
}
?>


</div>




<!-- Submit button -->
<!-- <button class="btn btn-primary mt-2" name="submit" type="submit">Submit form</button> -->



                         
                    
                        <!-- <button class="btn btn-primary mt-2" name="submit" type="submit">Submit form</button> -->
                                <!-- <button class="btn btn-primary mt-2" name="submit" type="submit">Submit form</button> -->
                             </div>
                          </div>
                        
                          
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->
              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->

      </main>
        </div>




  
  
   <?php include('include/footer.php'); ?>





<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src='js/jquery.dataTables.min.js'></script>
    <script src='js/dataTables.bootstrap4.min.js'></script>
    <!-- jQuery -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Responsive extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Optional: Bootstrap 4 styling for modern UI -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>


<script>
  $(document).ready(function () {
    $('#dataTable-1').DataTable({
     });
  });
</script>


<!-- SheetJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
  document.getElementById('exportExcel').addEventListener('click', function () {
    // Clone the original table
    var originalTable = document.getElementById('dataTable-1');
    var clonedTable = originalTable.cloneNode(true);
    
    // Change the ID of the cloned table to prevent DataTable initialization
    clonedTable.id = 'exportTable-clone';
    
    // Remove all classes from the cloned table
    clonedTable.className = '';
    
    // Remove classes from all child elements (thead, tbody, tr, td, th, etc.)
    var allElements = clonedTable.getElementsByTagName('*');
    for (let i = 0; i < allElements.length; i++) {
      allElements[i].className = '';
    }
    
    // Loop through rows and remove the 2nd column (index 1, i.e., Action column)
    for (let row of clonedTable.rows) {
      if (row.cells.length > 1) {
        row.deleteCell(1);  // Remove the Action column (2nd column)
      }
    }
    
    // Convert the cleaned table to a worksheet
    var ws = XLSX.utils.table_to_sheet(clonedTable);
    
    // Get the range of the worksheet
    var range = XLSX.utils.decode_range(ws['!ref']);
    
    // Calculate column widths based on content
    var colWidths = [];
    for (let col = range.s.c; col <= range.e.c; col++) {
      let maxWidth = 15; // minimum width
      for (let row = range.s.r; row <= range.e.r; row++) {
        let cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
        if (ws[cellAddress] && ws[cellAddress].v) {
          let cellValue = ws[cellAddress].v.toString();
          let cellWidth = cellValue.length * 1.2; // multiply by 1.2 for better spacing
          if (cellWidth > maxWidth) {
            maxWidth = Math.min(cellWidth, 60); // cap at 60 characters
          }
        }
      }
      colWidths.push({ wch: maxWidth });
    }
    ws['!cols'] = colWidths;
    
    // Create workbook and add worksheet
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Report");
    
    // Write file with cellStyles option enabled
    XLSX.writeFile(wb, "Lab Test Report.xlsx", {
      bookType: 'xlsx',
      cellStyles: true,
      sheetStubs: false
    });
  });
</script>



    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
 
<script>
  // Function to load patient list
 function loadPatientList() {
  const formType = $('#formType').val();
  const taluka = $('#taluka').val();
  const village = $('#village').val();
  const patientId = new URLSearchParams(window.location.search).get('patient_id');

  if (formType) {
    $.ajax({
      url: 'get_patients.php?patient_id=' + encodeURIComponent(patientId),
      type: 'POST',
      data: { formType: formType, taluka: taluka, village: village },
      success: function (response) {
        $('#patient').html(response);
      }
    });
  }
}


  // Trigger patient dropdown on form type change
  $('#formType').on('change', function () {
    loadPatientList();
  });

  // Trigger on page load if form_type is selected (for GET form prefill)
  $(document).ready(function () {
    if ($('#formType').val()) {
      loadPatientList();
    }

  });

  $(document).ready(function () {
  $('#resetBtn').on('click', function () {
    // Reload the page to reset everything
    window.location.href = window.location.pathname;
  });
});

</script>


  </body>

</html>