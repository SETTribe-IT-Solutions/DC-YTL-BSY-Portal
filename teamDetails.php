
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
                        <div class="table-responsive">
  <table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
    <thead class="text-white">
 <tr>
 
        <th>Sr. No</th>
       <th>Medicine Name</th>
        <th>Vechile No</th>
               <th>Username</th>
        <th>Password</th>
        <th>Details</th>

 </tr>
    </thead>
    <tbody>
<?php
$sr = 1;
$query = mysqli_query($conn, "SELECT * FROM `users` WHERE role!='admin'");
while ($row = mysqli_fetch_assoc($query)) {
  $teamId = $row['teamId'];
  $modalId = "teamModal_" . $teamId;
?>
<tr>
  <td><?= $sr++; ?></td>
  <td><?= $row['teamName'] ?></td>
  <td><?= $row['vechileNo'] ?></td>
  <td><?= $row['username'] ?></td>
  <td><?= $row['password'] ?></td>
  <td>
  
     <button type="button" class="btn mb-2 btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">See Details</button>

  </td>
</tr>


     <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" role="dialog" aria-labelledby="teamModalLabel_<?= $teamId ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="varyModalLabel">Team Details - <?php echo $row['teamName']; ?></h5>
                              <button type="button" class="btn-close close" data-bs-dismiss="modal"  aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>  
                            <div class="modal-body">
                               <div class="row">
                                
                                <div class="col-md-2"><b>Sr. No</b></div>
                                <div class="col-md-4"><b>Name</b></div>
                                <div class="col-md-3"><b>Role</b></div>
                                <div class="col-md-3"><b>Mobile</b></div>
                                   
                                <?php
                                $sr = 1;
                                $queryMembers = mysqli_query($conn,"SELECT fullName,role,mobileNo FROM teamDetails WHERE teamId='$teamId'") ;
                                while($fetchMembers = mysqli_fetch_assoc($queryMembers)){
                                    ?>
                                   <div class="col-md-2"><?php echo $sr++; ?></div>
                                   <div class="col-md-4"><?php echo $fetchMembers['fullName'] ?></div>
                                   <div class="col-md-3"><?php echo $fetchMembers['role'] ?></div>
                                   <div class="col-md-3"><?php echo $fetchMembers['mobileNo'] ?></div>
                                   <?php
                                }
                                ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn mb-2 btn-secondary" data-bs-dismiss="modal" >Close</button>
                              <button type="button" class="btn mb-2 btn-primary">Send message</button>
                            </div>
                          </div>
                        </div>
                      </div>



<?php } ?>
</tbody>

  </table>
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
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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