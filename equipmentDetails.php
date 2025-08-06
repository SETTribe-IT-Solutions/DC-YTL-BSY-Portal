
<?php
session_start();
include('include/sweetAlert.php');
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
    <!-- Bootstrap 5 CSS -->

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

     <!-- <style>
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
       
      </style>-->
      <!-- Bootstrap 5 JS Bundle (includes Popper) -->


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
                  

                   
                  <!-- /.card-body -->
                                      <div class="card">

                    <div class="card-body">
                        <h1>Team Details</h1>
                                                <form class="needs-validation" action="equipmentDetails.php" method="POST" novalidate>
  <div class="form-row">
    
    <!-- Month Dropdown -->
    <div class="col-md-4 mb-3">
      <label for="month"><strong>Unit Name <b style="color:red">*</b></strong></label>
      <select class="form-control" id="TeamId" name="TeamId" required>
        <option value="" selected disabled>Select Unit</option>
        <?php 
                    $query1 = mysqli_query($conn,"select * from users where role!='admin'") or die($conn->error);
                    while($fetch = mysqli_fetch_assoc($query1)) {
                      ?>
                    <option value="<?php echo  $fetch['teamId']?>" <?php if($_POST['TeamId'] == $fetch['teamId'] ) { echo "selected" ;} ?>><?php echo  $fetch['teamName']?></option>

                    <?php } ?>

      </select>
      <div class="invalid-feedback">Please select a valid Month.</div>
    </div>

    <!-- Year Dropdown -->


    <!-- Submit Button -->
    <div class="col-md-4 mb-3 align-self-end">
      <button class="btn btn-primary mt-2" name="submit" type="submit">Show</button>
        
                <button id="exportExcel" class="btn btn-success mt-2" style="float :right"  type="button">Export to Excel</button>
    </div>

  </div>
</form>
<?php 
if(isset($_POST['submit'])) { 
    $teamName = $_POST['TeamId'];
    ?>
                        <div class="table-responsive">
  <table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
    <thead class="text-white">
        <tr>
            <?php
                $queryname = mysqli_query($conn,"select * from users where teamId='$teamName '") or die($conn->error);
                    $fetchName = mysqli_fetch_assoc($queryname);
                        ?>
            <th colspan="5" class="text-center"> Team Name - <?php echo $fetchName['teamName'] ?> </th>
        </tr>
 <tr>
 
        <th>Sr. No</th>
       <th>Equipment Name</th>
        <th>Available</th>
         <th>Wroking</th>
        <th>Remark</th>
      

 </tr>
    </thead>
    <tbody>
<?php
$sr = 1;
$query = mysqli_query($conn, "SELECT * FROM `EquipmentInventory` where teamId='$teamName'");
while ($row = mysqli_fetch_assoc($query)) {


?>
<tr>
  <td><?= $sr++; ?></td>
  <td>
    <?php

$queryNew = mysqli_query($conn, "
  SELECT * FROM `EquipmentList`
  WHERE id = '{$row['name']}'
");
  $fetchNew = mysqli_fetch_assoc($queryNew);
  echo $fetchNew['name'];
   ?>
 </td>
  <td><?= $row['available'] ?></td>
  <td><?= $row['working'] ?></td>
  <td><?= $row['remark'] ?></td>

</tr>


   
<?php } ?>
</tbody>

  </table>
</div>
<?php } ?>
</div>

                  
                  </div> <!-- /.card -->

          
                </div> <!-- /.col -->
              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->

      </main>
        </div>
  

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
      var fileName = "Equipment report (<?php echo $fetchName['teamName']; ?>) <?php echo date('d-m-Y'); ?>.xlsx";

    
    // Write file with cellStyles option enabled
XLSX.writeFile(wb, fileName, {
  bookType: 'xlsx',
  cellStyles: true,
  sheetStubs: false
});
  });
</script>
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
    <script src="js/apps.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Responsive extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Optional: Bootstrap 4 styling for modern UI -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>


<!-- <script>
  $(document).ready(function () {
    $('#dataTable-1').DataTable({

 
    });
  });
</script> -->


 
  </body>

</html>