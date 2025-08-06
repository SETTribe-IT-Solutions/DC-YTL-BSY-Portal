<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['userId'];
$date1 = date('d-m-Y');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="css/simplebar.css">
  <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/feather.css">
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
  <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

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
  </style>
</head>
<body class="vertical light d-flex flex-column min-vh-100">

<div class="wrapper flex-grow-1">
  <?php include('include/header.php'); ?>
  <?php include('include/sidebar.php'); ?>

  <main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <!-- Professional Patient Stats Cards -->
          <div class="stats-container mb-5">
            <h2 class="stats-title">Total Registered Patients</h2>
            <div class="row g-4">

              <!-- OPD Card -->
              <div class="col-md-4">
                <div class="card shadow border-0 h-100 patient-card-modern bg-white position-relative overflow-hidden">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <span class="badge bg-gradient-primary text-white mb-2">OPD Patients</span>
                        <?php
                          $opd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM opdRegister WHERE id != ''"))['c'];
                        ?>
                        <h3 class="fw-bold mb-0"><?php echo $opd; ?></h3>
                        <small class="text-muted">Outpatient Department</small>
                      </div>
                      <div class="fs-1 text-primary">
                        <i class="fas fa-user-md"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Child Patients -->
              <div class="col-md-4">
                <div class="card shadow border-0 h-100 patient-card-modern bg-white position-relative overflow-hidden">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <span class="badge bg-gradient-danger text-white mb-2">Child Patients</span>
                        <?php
                          $child = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM childRegister WHERE id != ''"))['c'];
                        ?>
                        <h3 class="fw-bold mb-0"><?php echo $child; ?></h3>
                        <small class="text-muted">Pediatric Care</small>
                      </div>
                      <div class="fs-1 text-danger">
                        <i class="fas fa-child"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ANC/PNC Patients -->
              <div class="col-md-4">
                <div class="card shadow border-0 h-100 patient-card-modern bg-white position-relative overflow-hidden">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <span class="badge bg-gradient-success text-white mb-2">ANC/PNC Patients</span>
                        <?php
                          $ancpnc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM ancpncRegi WHERE id != ''"))['c'];
                        ?>
                        <h3 class="fw-bold mb-0"><?php echo $ancpnc; ?></h3>
                        <small class="text-muted">Maternal Care</small>
                      </div>
                      <div class="fs-1 text-success">
                        <i class="fas fa-female"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Today's Visit Table -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <h1>Today's Visit (<?php echo $date1 ?>)</h1>
              <div class="table-responsive">
                <table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
                  <thead class="text-white">
                    <tr>
                      <th>Sr. No</th>
                      <th>Unit Name</th>
                      <th>Taluka</th>
                      <th>Village</th>
                      <th>Arrival Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sr = 1;
                    $date = date('Y-m-d');
                    $query = mysqli_query($conn, "SELECT * FROM visitedArea WHERE visitDate='$date'");
                    while ($row = mysqli_fetch_assoc($query)) {
                      ?>
                      <tr>
                        <td><?php echo $sr++; ?></td>
                        <td><?php echo $row['userId']; ?></td>
                        <td><?php echo $row['taluka']; ?></td>
                        <td><?php echo $row['village']; ?></td>
                        <td><?php echo $row['arrivalTime']; ?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Chart Section -->
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-body">
                <iframe src="top5_medicines_chart.php" width="100%" height="500px" style="border: none;"></iframe>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
</div>

<?php include('include/footer.php'); ?>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>

<!-- DataTables Scripts -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function () {
    $('#dataTable-1').DataTable();
  });
</script>
</body>
</html>
