
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

                        
                        <h1>Medicine Report</h1>

<?php
  $month = $_POST['month']; // e.g., 7
    $year = $_POST['year']; 
    ?>
                        <form class="needs-validation" action="medicineReport.php" method="POST" novalidate>
  <div class="form-row">
    
    <!-- Month Dropdown -->
    <div class="col-md-4 mb-3">
      <label for="month"><strong>Month <b style="color:red">*</b></strong></label>
      <select class="form-control" id="month" name="month" required>
        <option value="" selected disabled>Select Month</option>
       <?php
$selectedMonth = isset($_POST['month']) ? $_POST['month'] : date('n'); // default to current month if not set

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
$selectedYear = isset($_POST['year']) ? $_POST['year'] : $currentYear;

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
      <button class="btn btn-primary mt-2" name="submit" type="submit">Show</button>
        
                <button id="exportExcel" class="btn btn-success mt-2" style="float :right"  type="button">Export to Excel</button>
    </div>

  </div>
</form>

                     
                   <!-- <h1>OPD Register</h1> -->


  
<?php
if (isset($_POST['month']) && isset($_POST['year'])) {
?>
<div class="table-responsive">
  <table id="dataTable-1" class="table table-bordered" style="width:100%;">
    <thead class="text-white">
<?php
    $month = $_POST['month'];
    $year = $_POST['year'];
    $teamId = $_SESSION['teamId'] ?? '';

    $startDate = date('Y-m-01', strtotime("$year-$month-01"));
    $endDate = date('Y-m-t', strtotime("$year-$month-01"));

    $period = new DatePeriod(
        new DateTime($startDate),
        new DateInterval('P1D'),
        (new DateTime($endDate))->modify('+1 day')
    );

    $dateList = [];
    foreach ($period as $date) {
        $dateList[] = $date->format('Y-m-d');
    }

    $dateColCount = count($dateList) * 3;
    $totalCols = 2 + 3 + $dateColCount; // Sr No + Med Name + QtyReceived (3 cols) + DateCols
?>

    <!-- Special Title Row -->
 <tr>
  <th colspan="<?= $totalCols ?>" class="text-center bg-info text-white fs-5">
    Daily Distribution Report (<?= date('F', mktime(0, 0, 0, $month, 1)) . ' - ' . $year ?>)
  </th>
</tr>


    <!-- Row 1: Section Titles -->
    <tr>
      <th rowspan="3">Sr No</th>
      <th rowspan="3">Medicine Name</th>
      <th colspan="3" class="text-center">Quantity Received</th>
      <th colspan="<?= $dateColCount ?>" class="text-center">Date-wise Details</th>
    </tr>

    <!-- Row 2: Dates -->
    <tr>
      <th>Qty</th>
      <th>Expiry</th>
      <th>Batch</th>
      <?php foreach ($dateList as $d): 
       
        ?>
        <th colspan="3" class="text-center"><?= date('d-m-Y', strtotime($d)) ?></th>
      <?php endforeach; ?>
    </tr>

    <!-- Row 3: Sub-headers under each date -->
 <tr>
  <?php 
  for ($i = 0; $i < count($dateList) + 1; $i++): ?>
    <th>Qty</th>
    <th>Issued</th>
    <th>Balance</th>
  <?php endfor; ?>
</tr>


    </thead>

    <tbody>
<?php

    if ($_SESSION['role'] == "team") {
        $userFilter = "AND teamId = '$teamId'";
    }

    $sr = 1;
    $medicineList = mysqli_query($conn, "SELECT medicine, medicineId FROM medicine");

    while ($med = mysqli_fetch_assoc($medicineList)) {
        $medicineId = $med['medicineId'];
        $medicineName = $med['medicine'];

        $firstStock = mysqli_fetch_assoc(mysqli_query($conn, "
            SELECT * FROM medicineStock 
            WHERE medicine = '$medicineId' $userFilter
            ORDER BY recievedDate ASC LIMIT 1"));

        $exp = $firstStock['expiryDate'] ?? '';
        $batch = $firstStock['batch'] ?? '';
        $initialQty = $firstStock['quantity'] ?? 0;

        echo "<tr>";
        echo "<td>$sr</td>";
        echo "<td>$medicineName</td>";
        echo "<td>$initialQty</td><td>$exp</td><td>$batch</td>";

        $lastDayBalance = 0;

        foreach ($dateList as $date) {
            $receivedQuery = mysqli_query($conn, "
                SELECT SUM(quantity) as total 
                FROM medicineStock 
                WHERE medicine = '$medicineId'  $userFilter AND DATE(recievedDate) = '$date'");
            $received = mysqli_fetch_assoc($receivedQuery)['total'] ?? 0;

            $issuedQuery = mysqli_query($conn, "
                SELECT SUM(quantity) as total 
                FROM medicineDistribution 
                WHERE medicine ='$medicineId' $userFilter AND date ='$date'");
            $issued = mysqli_fetch_assoc($issuedQuery)['total'] ?? 0;

            $qty = $lastDayBalance + $received;
            $balance = $qty - $issued;

            $lastDayBalance = $balance;

            echo "<td>$qty</td><td>$issued</td><td>$balance</td>";
        }

        echo "</tr>";
        $sr++;
    }
?>
    </tbody>
  </table>
</div>
<?php } ?>



      
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
    XLSX.writeFile(wb, "Medicine report.xlsx", {
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