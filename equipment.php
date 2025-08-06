<?php
session_start();
include('include/connection.php');
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
      input.form-control, select.form-control, textarea.form-control {
  transition: all 0.3s ease-in-out;
}

input.form-control:focus, select.form-control:focus, textarea.form-control:focus {
  border-color: #86b7fe;
  box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
}
@media only screen and (max-width: 600px) {
        .main-content {
  margin-left: 0 !important;
  width: 100% !important;
  position: relative;
  z-index: 1; /* Lower than sidebar */
}
        }

 
    /* Match the blue theme as in screenshot */
    thead th {
        background-color: #007bff;
        color: white;
        text-align: center;
        vertical-align: middle;
    }  
    
    .toggle-radio .btn {
  transition: all 0.3s ease;
  border: 1px solid transparent;
  padding: 0.375rem 1.25rem;
}

.toggle-radio .btn:hover {
  background-color: #f0f0f0;
}

.btn-check:checked + .btn {
  background-color: #e7f1ff;
  font-weight: 600;
  box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
}

/* YES checked - make it fully green */
input.btn-check:checked + label.btn-outline-success {
  background-color: #198754;
  color: white;
  border-color: #198754;
}

/* NO checked - make it fully red */
input.btn-check:checked + label.btn-outline-danger {
  background-color: #dc3545;
  color: white;
  border-color: #dc3545;
}

/* Optional: transition for smooth effect */
.toggle-radio .btn {
  transition: all 0.2s ease;
}

/* Hide radio buttons */
.btn-check {
  position: absolute;
  clip: rect(0, 0, 0, 0);
}

/* YES checked: make fully green */
.btn-check:checked + .btn-outline-success {
  background-color: #198754 !important;
  color: #fff !important;
  border-color: #198754 !important;
  font-weight: 600;
}

/* NO checked: make fully red */
.btn-check:checked + .btn-outline-danger {
  background-color: #dc3545 !important;
  color: #fff !important;
  border-color: #dc3545 !important;
  font-weight: 600;
}

/* Optional smooth transitions */
.toggle-radio .btn {
  transition: all 0.3s ease;
}


    </style>
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
                    <div class="card-header">
                      <h1>Equipment Master</h1>
                    </div>
                    <div class="card-body">
 <div class="col-md-12 my-4">
  <form method="POST" action="equipmentDB.php">
    <table id="equipmentTable" class="table table-bordered table-hover table-striped text-center">
      <thead>
        <tr>
          <th style=" background-color: #007bff;color:white">ID</th>
          <th style=" background-color: #007bff;color:white">Equipment</th>
          <th style=" background-color: #007bff;color:white"> Available YES/NO </th>
           <th style=" background-color: #007bff;color:white">Working YES/NO</th>
            <th style=" background-color: #007bff;color:white">Remark</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $sr = 1;
        $query = mysqli_query($conn, "SELECT DISTINCT(name), id FROM EquipmentList") or die($conn->error);
        while ($fetch = mysqli_fetch_assoc($query)) {
          $name = $fetch['name'];
          $id = $fetch['id'];

          $querycheck = mysqli_query($conn, "SELECT * FROM EquipmentInventory WHERE teamId='{$_SESSION['teamId']}' AND name='$id'") or die($conn->error);
          $savedStatus = mysqli_fetch_assoc($querycheck);
          $selected = $savedStatus['available'];
          $working = $savedStatus['working'];
          $remark = $savedStatus['remark'];

        ?>
          <tr>
            <td><?= $sr++ ?></td>
            <td>
              <?= $name ?>
              <input type="hidden" name="equipment_ids[]" value="<?= $id ?>">
            </td>
         <!-- Available YES/NO -->
<!-- Availability YES/NO Buttons -->
<td>
  <div class="btn-group toggle-radio" role="group" aria-label="Availability">
    <input type="radio" class="btn-check" name="equipment_status[<?= $id ?>]" id="yes_<?= $id ?>" value="Yes" <?= ($selected == 'Yes') ? 'checked' : '' ?> autocomplete="off">
    <label class="btn btn-outline-success rounded-start px-3 py-1" for="yes_<?= $id ?>">
      <i data-feather="check-circle"></i>
    </label>

    <input type="radio" class="btn-check" name="equipment_status[<?= $id ?>]" id="no_<?= $id ?>" value="No" <?= ($selected == 'No') ? 'checked' : '' ?> autocomplete="off">
    <label class="btn btn-outline-danger rounded-end px-3 py-1" for="no_<?= $id ?>">
      <i data-feather="x-circle"></i>
    </label>
  </div>
</td>

<!-- Working YES/NO -->
<td>
  <div class="btn-group toggle-radio" role="group" aria-label="Working">
    <input type="radio" class="btn-check" name="working[<?= $id ?>]" id="working_yes_<?= $id ?>" value="Yes" <?= ($working == 'Yes') ? 'checked' : '' ?> autocomplete="off">
    <label class="btn btn-outline-success rounded-start px-3 py-1" for="working_yes_<?= $id ?>">
      <i data-feather="check-circle"></i> 
    </label>

    <input type="radio" class="btn-check" name="working[<?= $id ?>]" id="working_no_<?= $id ?>" value="No" <?= ($working == 'No') ? 'checked' : '' ?> autocomplete="off">
    <label class="btn btn-outline-danger rounded-end px-3 py-1" for="working_no_<?= $id ?>">
      <i data-feather="x-circle"></i>
    </label>
  </div>
</td>


                         <td>
   <input type="text" name="remark[<?= $id ?>]" id="remark" class="form-control" value="<?php echo $remark ?>">          
    </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <?php if (mysqli_num_rows($querycheck) > 0) { ?>
      <button type="submit" name="update" class="btn btn-primary mt-3">Update</button>
    <?php } else { ?>
      <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
    <?php } ?>
  </form>
</div>

              
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

    <!-- Include jQuery and DataTable JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<

   <script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
</script>


    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
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
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
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
  function updateFileName(input) {
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    if (input.files && input.files.length > 0) {
      fileNameDisplay.textContent = "Selected file: " + input.files[0].name;
    } else {
      fileNameDisplay.textContent = "No file chosen.";
    }
  }
</script>
<!-- <style>
  label {
    float: right;
    display: inline-block;
    margin-bottom: 0.5rem;
}
</style> -->
 
  </body>

</html>