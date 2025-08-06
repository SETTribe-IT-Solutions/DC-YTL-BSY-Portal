
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
                        
                        <h1 >ANC PNC Report</h1>
                        
                         <?php
  $month = $_POST['month']; // e.g., 7
    $year = $_POST['year']; 
                        

    ?>
                                              <?php
  $month = $_POST['month']; // e.g., 7
    $year = $_POST['year']; 
                        

    ?>
                      <form class="needs-validation" action="ancpncReportAdmin.php" method="POST" novalidate>
  <div class="form-row">
    
           <div class="col-md-4 mb-3">
                        <label for="unitSelect" class="form-label">Select Unit</label>
                        <select id="unitSelect" name="teamId" class="form-control select2">
                            <option value="">-- Select Unit --</option>
                            <?php 
                                $query1 = mysqli_query($conn,"select * from users where role!='admin'") or die($conn->error);
                                while($fetch = mysqli_fetch_assoc($query1)) {
                            ?>
                            <option value="<?php echo $fetch['teamId']; ?>" <?php if($_REQUEST['teamId'] == $fetch['teamId']) { echo "selected"; } ?> ><?php echo $fetch['teamName']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
    <!-- Month Dropdown -->
    <div class="col-md-4 mb-3">
      <label for="month"><strong>Month <b style="color:red">*</b></strong></label>
      <select class="form-control" id="month" name="month" required>
        <option value="" selected disabled>Select Month</option>
       <?php
 // default to current month if not set
$selectedMonth = isset($_POST['month']) ? $_POST['month'] :''; // default to current month if not set

for ($m = 1; $m <= 12; $m++) {
    $monthName = date('F', mktime(0, 0, 0, $m, 1));
    $selected = ($m == $selectedMonth) ? "selected" : "";
    echo "<option value=\"$m\" $selected>$monthName</option>";
}
?>

      </select>
      <div class="invalid-feedback">Please select a valid Month.</div>
    </div>

    <!-- Year Dropdown -->
    <div class="col-md-4 mb-3">
      <label for="year"><strong>Year <b style="color:red">*</b></strong></label>
      <select class="form-control" id="year" name="year" required>
        <option value="" selected disabled>Select Year</option>
    <?php
$currentYear = date('Y');
$selectedYear = isset($_POST['year']) ? $_POST['year']: '';


for ($y = $currentYear - 3; $y <= $currentYear + 1; $y++) {
    $selected = ($y == $selectedYear) ? "selected" : "";
    echo "<option value=\"$y\" $selected>$y</option>";
}
?>

      </select>
      <div class="invalid-feedback">Please select a valid Year.</div>
    </div>

    <!-- Submit Button -->
    <div class="col-md-4 mb-3 align-self-end">
      <button class="btn btn-primary mt-2" name="show" type="submit">Show</button>
        
        <button id="exportExcel" class="btn btn-success mt-2" style="float :right" type="button">Export to Excel</button>

    </div>

  </div>
</form>
                     
                   <!-- <h1>OPD Register</h1> -->


     <?php if(isset($_REQUEST['show'])) { ?>
<div class="table-responsive">
<table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
<thead>
  <tr>
    <th></th>
    <th data-priority="1" style="background-color: #007bff !important;" class="text-white">Sr. No</th>
   
    <th data-priority="2" style="background-color: #007bff !important;"  class="text-white">Date</th>
    <th data-priority="3" style="background-color: #007bff !important;" class="text-white">Mother Name</th>
    <th data-priority="4" style="background-color: #007bff !important;" class="text-white">Village</th>
    <th data-priority="5" style="background-color: #007bff !important;" class="text-white">Patient Category</th>
    <th style="background-color: #007bff !important;" class="text-white">Mother Contact</th>
    <th style="background-color: #007bff !important;" class="text-white">Husband Name</th>
    <th style="background-color: #007bff !important;" class="text-white">Husband Contact</th>
    <th style="background-color: #007bff !important;" class="text-white">Asha Name</th>
    <th style="background-color: #007bff !important;" class="text-white">Asha Contact</th>
    <th style="background-color: #007bff !important;" class="text-white">Patient Category</th>
    <th style="background-color: #007bff !important;" class="text-white">Height</th>
    <th style="background-color: #007bff !important;" class="text-white">Weight</th>
    <th style="background-color: #007bff !important;" class="text-white">UPT</th>
    <th style="background-color: #007bff !important;" class="text-white">LMP</th>
    <th style="background-color: #007bff !important;" class="text-white">EDD</th>
    <th style="background-color: #007bff !important;" class="text-white">HB</th>
    <th style="background-color: #007bff !important;" class="text-white">BP</th>
    <th style="background-color: #007bff !important;" class="text-white">CBC</th>
    <th style="background-color: #007bff !important;" class="text-white">Viral Marker</th>
    <th style="background-color: #007bff !important;" class="text-white">Blood Group</th>
    <th style="background-color: #007bff !important;" class="text-white">Blood Sugar</th>
    <th style="background-color: #007bff !important;" class="text-white">Urine Albumin</th>
    <th style="background-color: #007bff !important;" class="text-white">TT Dose</th>
    <th style="background-color: #007bff !important;" class="text-white">TT Booster</th>
    <th style="background-color: #007bff !important;" class="text-white">Iron Calcium</th>
    <th style="background-color: #007bff !important;" class="text-white">Sonography Status</th>
    <th style="background-color: #007bff !important;" class="text-white">Referral</th>
    <th style="background-color: #007bff !important;" class="text-white">High Risk Mother</th>
    <th style="background-color: #007bff !important;" class="text-white">Remark</th>
    <th style="background-color: #007bff !important;" class="text-white">Surakshit Matriyan</th>

  </tr>
</thead>


    <tbody>
      <?php
          $teamId = $_REQUEST['teamId'];
            
          
if(empty($month) && empty($year)){
    $month = date('m');
    $year = date('Y');
}
// Ensure two-digit format for month
$month = str_pad($month, 2, '0', STR_PAD_LEFT);

// Start date: always 1st of the month
$start_date = "$year-$month-01";

// End date: use PHP's date() and strtotime() to get last day of the month
$end_date = date("t-m-Y", strtotime("$year-$month-01"));
$end_date = date("Y-m-d", strtotime($end_date)); // format to dd-mm-yyyy
                        
if(!empty($month) && !empty($year)){
    $date_con = " AND date BETWEEN '$start_date' AND '$end_date' ";
}else{
}
        
if(!empty($teamId)) {
    $filter = "AND teamId='$teamId'";
}
   
      $sr = 1;
      $query = mysqli_query($conn, "
    SELECT * FROM ancpncRegi WHERE 1 $filter $date_con
    ORDER BY registerId DESC, id DESC
    LIMIT 1
");
      while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td></td>";
        echo "<td>{$sr}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['taluka']}</td>";
        echo "<td>{$row['village']}</td>";
        echo "<td>{$row['motherName']}</td>";
        echo "<td>{$row['motherContact']}</td>";
        echo "<td>{$row['husbandName']}</td>";
        echo "<td>{$row['husbandContact']}</td>";
        echo "<td>{$row['ashaName']}</td>";
        echo "<td>{$row['ashaContact']}</td>";
        echo "<td>{$row['patientCategory']}</td>";
        echo "<td>{$row['height']}</td>";
        echo "<td>{$row['weight']}</td>";
        echo "<td>{$row['UPT']}</td>";
        echo "<td>{$row['LMP']}</td>";
        echo "<td>{$row['EDD']}</td>";
        echo "<td>{$row['HB']}</td>";
        echo "<td>{$row['BP']}</td>";
        echo "<td>{$row['CBC']}</td>";
        echo "<td>{$row['viralMarker']}</td>";
        echo "<td>{$row['bloodGroup']}</td>";
        echo "<td>{$row['bloodSugar']}</td>";
        echo "<td>{$row['urineAlbumin']}</td>";
        echo "<td>{$row['ttDose']}</td>";
        echo "<td>{$row['ttBooster']}</td>";
        echo "<td>{$row['ironCalcium']}</td>";
        echo "<td>{$row['sonographyStatus']}</td>";
        echo "<td>{$row['Referral']}</td>";
        echo "<td>{$row['highriskMother']}</td>";
        echo "<td>{$row['remark']}</td>";
        echo "<td>{$row['surkshitMatriyan']}</td>";
       
        echo "</tr>";
        $sr++;
      }
      ?>
    </tbody>
  </table>
</div>
<?php } ?>
<!-- ✅ Step 3: JavaScript for Expanda -->
<!-- Submit button -->
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
      responsive: {
        details: {
          type: 'column',
          target: 0 // show the "+" icon in the first column
        }
      },
      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0
        }
      ],
      order: [1, 'asc'],
      autoWidth: false,
 
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
      if (row.cells.length > 0) {
        row.deleteCell(0);  // Remove the Action column (2nd column)
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
    XLSX.writeFile(wb, "ANC PNC Report.xlsx", {
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
 

 
  </body>

</html>