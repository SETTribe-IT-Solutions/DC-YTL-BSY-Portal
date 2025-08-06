
<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['userId'];
$date1 = date('d-m-Y');
$date2 = date('Y-m-d');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



   

   <style>
    /* Professional Gradient Cards */
    .bg-gradient-primary {
      background: linear-gradient(135deg, #3b82f6, #6366f1);
    }
    .bg-gradient-danger {
      background: linear-gradient(135deg, #ec4899, #f43f5e);
    }
    .bg-gradient-success {
      background: linear-gradient(135deg, #10b981, #22c55e);
    }

    .patient-card-modern {
      border-radius: 15px;
      transition: all 0.3s ease-in-out;
    }

    .patient-card-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .badge {
      font-size: 0.8rem;
      padding: 0.5em 0.75em;
      border-radius: 1em;
    }

    .stats-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #2d3748;
      margin-bottom: 20px;
      text-align: center;
      position: relative;
    }

    .stats-title::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, #3b82f6 0%, #8b5cf6 100%);
      border-radius: 2px;
    }

    #dataTable-1 thead {
      background-color: #007bff !important;
      color: black !important;
    }

    #dataTable-1 thead th {
      font-weight: bold;
      vertical-align: middle;
      color: white;
    }

    a.text-decoration-none:hover {
  text-decoration: none;
  color: inherit;
  transform: scale(1.02);
}

  </style>

  </head>
  <body class="vertical light d-flex flex-column min-vh-100">

  <!-- Page Wrapper -->
  <div class="wrapper flex-grow-1">
    <?php include('include/header.php'); ?>
    <?php 
    include('include/sidebar.php');
     ?>

    <!-- Main content goes here -->
  <main role="main" class="main-content">
        <div class="container-fluid">
     <div class="row">
      <div class="col-md-12">
      <div class="stats-container mb-5">
            <h2 class="stats-title">Total Registered Patients</h2>
            <div class="row g-4">

   <!-- OPD Card -->
<div class="col-md-4">
  <a href="showPatients.php" class="text-decoration-none text-dark">
    <div class="card shadow border-0 h-100 patient-card-modern bg-white position-relative overflow-hidden">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <span class="badge bg-gradient-primary text-white mb-2">OPD Patients</span>
            <?php
              $opd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM opdRegister WHERE id != ''"))['c'];
            ?>
            <h3 class="fw-bold mb-0"><?php echo $opd; ?></h3>
          </div>
          <div class="fs-1 text-primary">
            <i class="fas fa-user-md"></i>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>

<!-- Child Patients Card -->
<div class="col-md-4">
  <a href="showPatients.php" class="text-decoration-none text-dark">
    <div class="card shadow border-0 h-100 patient-card-modern bg-white position-relative overflow-hidden">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <span class="badge bg-gradient-danger text-white mb-2">Child Patients</span>
            <?php
              $child = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM childRegister WHERE id != ''"))['c'];
            ?>
            <h3 class="fw-bold mb-0"><?php echo $child; ?></h3>
          </div>
          <div class="fs-1 text-danger">
            <i class="fas fa-child"></i>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>

<!-- ANC/PNC Patients Card -->
<div class="col-md-4">
  <a href="showPatients.php" class="text-decoration-none text-dark">
    <div class="card shadow border-0 h-100 patient-card-modern bg-white position-relative overflow-hidden">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <span class="badge bg-gradient-success text-white mb-2">ANC/PNC Patients</span>
            <?php
              $ancpnc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM ancpncRegi WHERE id != ''"))['c'];
            ?>
            <h3 class="fw-bold mb-0"><?php echo $ancpnc; ?></h3>
          </div>
          <div class="fs-1 text-success">
            <i class="fas fa-female"></i>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>

            </div>
          </div>
                 <div class="card shadow mb-4">
                   <!-- <div class="card-header eleven">
                        <h1 class="card-title" style="font-size:2rem">Create MMU Team</h1>
                    </div>-->
                    
                    <div class="card-body">

 <h1>Todays Visit(<?php echo $date1 ?>)</h1>

<div class="table-responsive">
  <table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
    <thead class="text-white">
 <tr>

        <th>Sr. No</th>
     
       <th>Unit Name</th>
        <th>Taluka</th>
        <th>Village</th>
        <th>Arrival Time</th>
        <th>Opd Patients</th>
        <th>Child Patients</th>
        <th>ANC/PNC Patients</th>

         

      </tr>
    </thead>
    <tbody>
      <?php
      $sr = 1;
      $date = date('Y-m-d');
      $query = mysqli_query($conn, "SELECT * FROM visitedArea where visitDate='$date'");
      while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
     <td><?php echo $sr++; ?></td>  
      <td><?php echo $row['userId']; ?></td>  
      <td><?php echo $row['taluka']; ?></td>  
      <td><?php echo $row['village']; ?></td> 
       <td><?php echo $row['arrivalTime']; ?></td>
          <td>
            <?php
          $queryOPD = mysqli_query($conn, "SELECT COUNT(*) AS OPD FROM opdRegister WHERE teamId='{$row['teamId']}' AND date='$date2'") or die($conn->error);
          $fetchOPD = mysqli_fetch_assoc($queryOPD);
           if($fetchOPD['OPD'] == 0) {
            echo "-";
          } else {
            ?>
          
            <?php
            echo $fetchOPD['OPD'];
          }
          ?>
          
          </td>  
      <td>
             <?php
            
          $queryOPD = mysqli_query($conn, "SELECT COUNT(*) AS child FROM childRegister WHERE teamId='{$row['teamId']}' AND date='$date2'") or die($conn->error);
          $fetchOPD = mysqli_fetch_assoc($queryOPD);
            if($fetchOPD['child'] == 0) {
            echo "-";
          } else {
            ?>

            <?php
            echo $fetchOPD['child'];
          }
          ?>
    </td> 
       <td>
                <?php
          $queryOPD = mysqli_query($conn, "SELECT COUNT(*) AS ancpnc FROM ancpncRegi WHERE teamId='{$row['teamId']}' AND date='$date2'") or die($conn->error);
          $fetchOPD = mysqli_fetch_assoc($queryOPD);
          if($fetchOPD['ancpnc'] == 0) {
            echo "-";
          } else {
            ?>
    
            <?php
            echo $fetchOPD['ancpnc'];
          }
          ?>
       
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


                               






                 



                </div> <!-- /.col -->
              </div> <!-- end section -->

  <div class="row">
    <!-- CARD 1: Top 5 Most Distributed Medicines -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h1 class="card-title" style="font-size:1.5rem">Top 5 Most Distributed Medicines</h1>
            </div>
            <div class="card-body">
                <!-- Dropdowns -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="unitSelect" class="form-label">Select Unit</label>
                        <select id="unitSelect" class="form-control select2">
                            <option value="">-- Select Unit --</option>
                            <?php 
                                $query1 = mysqli_query($conn,"select * from users where role!='admin'") or die($conn->error);
                                while($fetch = mysqli_fetch_assoc($query1)) {
                            ?>
                            <option value="<?php echo $fetch['teamId']; ?>"><?php echo $fetch['teamName']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="registerSelect" class="form-label">Select Register</label>
                        <select id="registerSelect" class="form-control select2">
                            <option value="">-- Select Register --</option>
                            <option value="opdRegister">OPD Register</option>
                            <option value="ancpncRegi">ANC/PNC Register</option>
                            <option value="childRegister">Child Register</option>
                        </select>
                    </div>
                </div>

                <!-- Chart Frame -->
                <iframe id="medicineChart" src="top5_medicines_chart.php" width="100%" height="500px" style="border: none;"></iframe>
            </div>
        </div>
    </div>

    <!-- CARD 2: Top 5 Most Prescribed Lab Tests -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h1 class="card-title" style="font-size:1.5rem">Top 5 Most Prescribed Lab Tests</h1>
            </div>
            <div class="card-body">
                <!-- Dropdowns -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="unitSelect1" class="form-label">Select Unit</label>
                        <select id="unitSelect1" class="form-control select2">
                            <option value="">-- Select Unit --</option>
                            <?php 
                                $query1 = mysqli_query($conn,"select * from users where role!='admin'") or die($conn->error);
                                while($fetch = mysqli_fetch_assoc($query1)) {
                            ?>
                            <option value="<?php echo $fetch['teamId']; ?>"><?php echo $fetch['teamName']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="registerSelect1" class="form-label">Select Register</label>
                        <select id="registerSelect1" class="form-control select2">
                            <option value="">-- Select Register --</option>
                            <option value="opdRegister">OPD Register</option>
                            <option value="ancpncRegi">ANC/PNC Register</option>
                            <option value="childRegister">Child Register</option>
                        </select>
                    </div>
                </div>

                <!-- Chart Frame -->
                <iframe id="labTestChart" src="top5_lab_tests_chart.php" width="100%" height="520px" style="border: none;"></iframe>
            </div>
        </div>
    </div>

    
    <!-- CARD 2: Top 5 Most Prescribed Lab Tests -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h1 class="card-title" style="font-size:1.5rem">Top 5 Most Prescribed Diseas Tests</h1>
            </div>
            <div class="card-body">
                <!-- Dropdowns -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="unitSelect1" class="form-label">Select Unit</label>
                        <select id="unitSelect_disease" class="form-control select2">
                            <option value="">-- Select Unit --</option>
                            <?php 
                                $query1 = mysqli_query($conn,"select * from users where role!='admin'") or die($conn->error);
                                while($fetch = mysqli_fetch_assoc($query1)) {
                            ?>
                            <option value="<?php echo $fetch['teamId']; ?>"><?php echo $fetch['teamName']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="registerSelect1" class="form-label">Select Register</label>
                        <select id="registerSelect_disease" class="form-control select2">
                            <option value="">-- Select Register --</option>
                            <option value="opdRegister">OPD Register</option>
                            <option value="ancpncRegi">ANC/PNC Register</option>
                            <option value="childRegister">Child Register</option>
                        </select>
                    </div>
                </div>

                <!-- Chart Frame -->
                <iframe id="DiseasTestChart" src="top5_diseas_tests_chart.php" width="100%" height="520px" style="border: none;"></iframe>
            </div>
        </div>
    </div>
<!-- CARD: Top 5 Age Groups -->
<div class="col-md-6">
  <div class="card shadow mb-4">
    <div class="card-header">
      <h1 class="card-title" style="font-size:1.5rem">Top 5 Ages (Most Frequent Patients)</h1>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="unitSelect_age" class="form-label">Select Unit</label>
          <select id="unitSelect_age" class="form-control select2">
            <option value="">-- Select Unit --</option>
            <?php 
              $query1 = mysqli_query($conn,"SELECT * FROM users WHERE role!='admin'") or die($conn->error);
              while($fetch = mysqli_fetch_assoc($query1)) {
            ?>
            <option value="<?php echo $fetch['teamId']; ?>"><?php echo $fetch['teamName']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6">
          <label for="registerSelect_age" class="form-label">Select Register</label>
          <select id="registerSelect_age" class="form-control select2">
            <option value="">-- Select Register --</option>
            <option value="opdRegister">OPD Register</option>
            <option value="ancpncRegi">ANC/PNC Register</option>
            <option value="childRegister">Child Register</option>
          </select>
        </div>
      </div>
      <iframe id="ageChart" src="top5_age_chart.php" width="100%" height="520px" style="border: none;"></iframe>
    </div>
  </div>
</div>
</div>

<!-- JavaScript to handle iframe updates -->
<script>
 $(document).ready(function () {
  // Disease Test Chart
  $('#unitSelect_disease, #registerSelect_disease').on('change', function () {
    const unit = $('#unitSelect_disease').val();
    const register = $('#registerSelect_disease').val();

    const iframeSrc = `top5_diseas_tests_chart.php?unit=${unit}&register=${register}`;
    $('#DiseasTestChart').attr('src', iframeSrc); // ✅ Corrected ID here
  });

  // Lab Test Chart
  $('#unitSelect1, #registerSelect1').on('change', function () {
    const unit = $('#unitSelect1').val();
    const register = $('#registerSelect1').val();

    const iframeSrc = `top5_lab_tests_chart.php?unit=${unit}&register=${register}`;
    $('#labTestChart').attr('src', iframeSrc);
  });

  // Medicine Chart
  $('#unitSelect, #registerSelect').on('change', function () {
    const unit = $('#unitSelect').val();
    const register = $('#registerSelect').val();

    const iframeSrc = `top5_medicines_chart.php?unit=${unit}&register=${register}`;
    $('#medicineChart').attr('src', iframeSrc);
  });

  // Age Chart
$('#unitSelect_age, #registerSelect_age').on('change', function () {
  const unit = $('#unitSelect_age').val();
  const register = $('#registerSelect_age').val();

  const iframeSrc = `top5_age_chart.php?unit=${unit}&register=${register}`;
  $('#ageChart').attr('src', iframeSrc);
});

});


</script>



            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->

    
  </main>
    
    
  </div>
      <?php include('include/footer.php'); ?>
<script src="js/jquery.min.js"></script>
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
    
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
   
   <script>
       $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
    </script>
    <script src='js/select2.min.js?v=<?php echo $version; ?>'></script>


 
  </body>

</html>