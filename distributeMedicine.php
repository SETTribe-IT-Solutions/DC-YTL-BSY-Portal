
<?php
session_start();
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
                     
                        <h1>Stock Master</h1>
                      
                      <form class="needs-validation" action="distributeMedicineDb.php" method="POST" novalidate>
                        <div class="form-row">
                    

                        
                        </div> <!-- /.form-row -->
                         <div class="form-row">
                             <div class="col-md-4 mb-3">
                          <label for="date-input1"><strong>Medicine Name<b style="color:red">*</b></strong></label>
                                 <?php // if($fetch['gender'] == "Male") { echo "selected";} ?>
                            <select class="form-control select2" id="medicine" name="medicine" required>
                              <option value="" selected disabled>Select Medicine</option>
                            <?php
                                
                                $queryP = mysqli_query($conn,"SELECT medicineId , medicine FROM `medicine`;");
                                while($fetchP = mysqli_fetch_assoc($queryP)){
                                    ?>
                                <option value="<?php echo $fetchP['medicineId'] ?>"><?php echo $fetchP['medicine'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback"> Please select a valid medicine. </div>
                          </div>
                             
                         <div class="col-md-4 mb-3">
                                <label for="validationCustom4"><strong>Quantity<b style="color:red">*</b></strong></label>
                            <input type="text" class="form-control" id="quantity" value="<?php echo $fetch['quantity'] ?>" name="quantity" required>
                            <!-- <div class="valid-feedback"> Looks good! </div> -->
                                <div class="invalid-feedback"> Please enter quantity </div>
                          </div>
                          
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom4"><strong>Batch<b style="color:red">*</b></strong></label>
                            <input type="text" class="form-control" id="batch" value="<?php echo $fetch['batch'] ?>" name="batch" required>
                            <!-- <div class="valid-feedback"> Looks good! </div> -->
                                <div class="invalid-feedback"> Please enter batch </div>
                          </div>


                                <div class="col-md-4 mb-3">
                                <label for="validationCustom4"><strong>Expiry Date<b style="color:red">*</b></strong></label>
                            <input type="date" class="form-control" id="expiryDate" value="<?php echo $fetch['expiryDate'] ?>" name="expiryDate" required>
                            <!-- <div class="valid-feedback"> Looks good! </div> -->
                                <div class="invalid-feedback"> Please enter Expiry Date </div>
                      



            
                    
                        <button class="btn btn-primary mt-2" name="submit" type="submit">Submit form</button>
                            </div>
                           
                          </div>
                        
                          
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->
                
              </div> <!-- end section -->

              <div class="row">
                <div class="col-md-12">
                                                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
  <table id="dataTable-1" class="table table-bordered responsive" style="width:100%;">
    <thead class="text-white">
 <tr>
 
        <th>Sr. No</th>
       <th>Medicine Name</th>
        <th>Recieved Date</th>
           <th>Expiry Date</th>
            <th>Batch no</th>
             <th>Quantity</th>
              <th>Issued</th>
               <th>Remaining</th>

 </tr>
    </thead>
    <tbody>
      <?php
      $sr = 1;
      $query = mysqli_query($conn, "SELECT * FROM medicineStock where teamId='{$_SESSION['teamId']}'");
      while ($row = mysqli_fetch_assoc($query)) { ?>

      

<tr>
    <td><?php echo $sr++; ?></td>
     <td><?php
      $query1 = mysqli_query($conn,"select medicine from medicine where medicineId='{$row['medicine']}'") or die($conn->error);
      $fetch1 = mysqli_fetch_assoc($query1);
     echo $fetch1['medicine'] ?></td>
    
       <td><?php echo $row['recievedDate'] ?></td>

  
       <td><?php echo $row['expiryDate'] ?></td>


       <td><?php echo $row['batch'] ?></td>


       <td><?php echo $row['quantity'] ?></td>


       <td><?php echo $row['issued'] ?></td>


       <td><?php echo $row['remaining'] ?></td>
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
                </div>
              </div>
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->



      </main>
        </div>
  
      <?php include('include/footer.php'); ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
   

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

 
  </body>

</html>