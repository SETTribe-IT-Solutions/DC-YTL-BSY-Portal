<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Equipment Inventory</title>
    <link rel="stylesheet" href="css/simplebar.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/daterangepicker.css">
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>

  <body class="vertical light d-flex flex-column min-vh-100">
    <div class="wrapper flex-grow-1">
      <?php include('include/header.php'); ?>
      <?php include('include/sidebar.php'); ?>

      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="text-center mt-4">
            <h1>Equipment Report</h1>
            <h4 id="teamName" class="text-muted"></h4>
          </div>
          <div class="card shadow mt-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th class="text-center">Available</th>
                    </tr>
                  </thead>
                  <tbody id="equipBody">
                    <tr><td colspan="3" class="text-center p-5">Loading...</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

    <?php include('include/footer.php'); ?>

    <!-- JS libraries -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script src="js/jquery.timepicker.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/dropzone.min.js"></script>
    <script src="js/uppy.min.js"></script>
    <script src="js/quill.min.js"></script>

<script>
  $(document).ready(function() {
    function loadEquipment() {
      $.getJSON('equipreport_db.php', function(data) {
        if (!data || !data.equipment) {
          $('#teamName').text('Team: N/A');
          $('#equipBody').html(
            '<tr><td colspan="3" class="text-center p-5">No data available.</td></tr>'
          );
          return;
        }

        $('#teamName').text('Team: ' + (data.full_name || 'Unknown'));

        // Sort: "No" first, then "Yes", then others
        const sorted = data.equipment.sort((a, b) => {
          const aLow = (a.available || '').toLowerCase();
          const bLow = (b.available || '').toLowerCase();
          if (aLow === bLow) return 0;
          if (aLow === 'no') return -1;
          if (bLow === 'no') return 1;
          return 0;
        });

        // Build table rows with auto-generated IDs
        const rows = sorted.map((e, index) => {
          const autoId = index + 1;
          const name = e.name ?? '';
          const availText = e.available ?? '';
          const availLow = availText.toLowerCase();
          const cls = 
            availLow === 'yes' ? 'text-success' :
            availLow === 'no' ? 'text-danger' : '';
          return `
            <tr>
              <td>${autoId}</td>
              <td>${name}</td>
              <td class="text-center">
                <span class="${cls}">${availText}</span>
              </td>
            </tr>`;
        });

        $('#equipBody').html(rows.join(''));
      }).fail(function() {
        $('#teamName').text('');
        $('#equipBody').html(
          '<tr><td colspan="3" class="text-center p-5 text-danger">Error loading data.</td></tr>'
        );
      });
    }

    loadEquipment();
  });
</script>


  </body>
</html>
