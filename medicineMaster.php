
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
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
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
                     
                        <h1>Add Medicine</h1>
                        <?php 
                     if(isset($_REQUEST['edit'])) {
                        $medicineId = $_REQUEST['edit'];
$query = mysqli_query($conn,"SELECT * FROM medicine where medicineId='$medicineId'") or die($conn->error);
$fetch = mysqli_fetch_assoc($query);

                     }

                         ?>
                     
                      <form class="needs-validation" action="medicineDB.php" method="POST" novalidate>
                        <div class="form-row">
                             <div class="col-md-6 mb-3">
                                 <label for="date-input1"><strong>Medicine Name<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="tetx" class="form-control" id="name" name="name" value="<?php echo $fetch['medicine']?>"  aria-describedby="button-addon2" required>
                           
                            </div>

                          </div>
                          <input type="hidden" name="medicineId" value="<?php echo $medicineId ?>">

                    <?php
                            if(isset($_REQUEST['edit'])) {
                                ?>
       <button class="btn btn-primary mb-2 px-4 py-2" name="update" type="submit" style="height: 45px; width: 150px;">
  Update Form
</button>  
<?php } else {  ?>                       
<button class="btn btn-primary mb-2 px-4 py-2" name="submit" type="submit" style="height: 45px; width: 150px;">
  Submit Form
</button>
<?php } ?>
                             </div>
                                </form>
                          </div>
                        
                          



                   
                    </div> <!-- /.card-body -->
                                      <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
  <table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
    <thead class="text-white">
 <tr>
 
        <th>Sr. No</th>
       <th>Medicine Name</th>
        <th>Action</th>
 </tr>
    </thead>
    <tbody>
      <?php
      $sr = 1;
      $query = mysqli_query($conn, "SELECT * FROM medicine where status='Active'");
      while ($row = mysqli_fetch_assoc($query)) { ?>

<tr>
    <td><?php echo $sr++; ?></td>
     <td><?php echo $row['medicine'] ?></td>
    <td>
        <a href="medicineMaster.php?edit=<?php echo $row['medicineId']?>" class="btn btn-sm btn-warning me-2">Edit</a>
<button class="btn btn-sm btn-danger" onclick="deleteFun('medicineDB.php?delete=<?php echo $row['medicineId']; ?>')">Delete</button>
</td>


</tr>
    
<?php
      }
      ?>
    </tbody>
  </table>
</div>
</div>

                    </div>
                  </div> <!-- /.card -->

          
                </div> <!-- /.col -->
              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->

      </main>
        </div>
  
      <?php include('include/footer.php'); ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('#taluka').on('change', function () {
      var taluka = $(this).val();
      if (taluka != '') {
        $.ajax({
          url: 'village_ajax.php',
          method: 'POST',
          data: { taluka: taluka },
          success: function (response) {
            $('#village').html(response);
          }
        });
      } else {
        $('#village').html('<option value="">Select Village</option>');
      }
    });
  });
</script>

    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src="js/daterangepicker.js"></script>
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


 
  </body>

</html>