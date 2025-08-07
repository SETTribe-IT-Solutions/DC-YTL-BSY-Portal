
<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
// $teamId = $_SESSION['teamId'];
// $userId = $_SESSION['userId'];
error_reporting(0);
ini_set('display_errors', 0);
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
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJ+Y3bK1kq3I2+8zStGfnEkzs74Xk5/7X6X0k="
        crossorigin="anonymous"></script>

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
                        
                        <h1 >Create Users</h1>

                          
             

                     
                      <form class="needs-validation" action="childDB.php" method="POST" novalidate>
                        <div class="form-row">

                        <?php
                      


if(isset($_REQUEST['edit'])) {

  $registerId = $_REQUEST['edit'];
 
  $queryCheck = mysqli_query($conn,"select * from `childRegister` where id='$registerId'") or die($conn->error);
  $fetch = mysqli_fetch_assoc($queryCheck);
 
}
?>



       <div class="col-md-6 mb-3">
                                 <label for="full_name"><strong>Full Name<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="full_name" value="<?php echo  $fetch['full_name']?>" name="full_name"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>


                                   <div class="col-md-6 mb-3">
                                 <label for="Email"><strong>Email<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="email" class="form-control" id="Email" name="Email" value="<?php echo  $fetch['Email']?>"   aria-describedby="button-addon2">
                           
                            </div>
                          </div>



                            <div class="col-md-6 mb-3">
                                 <label for="address"><strong>Address<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="address" name="address" value="<?php echo  $fetch['address']?>"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>


                                   <div class="col-md-6 mb-3">
                                 <label for="designation"><strong>Designation<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                               <select class="form-control select2" id="designation" name="designation"  value="<?php echo  $fetch['designation']?>" required>
                              <option value="" selected disabled>Select designation</option>
                              <?php
                              $queryRoles = mysqli_query($conn,"select * from `roles`") or die($conn->error);
                              while($role = mysqli_fetch_assoc($queryRoles)) {
                                $selected = ($role['id'] == $fetch['designation']) ? 'selected' : '';
                                echo "<option value='{$role['id']}' $selected>{$role['roles']}</option>";
                              }
                              ?>
                            </select>
                            <div class="invalid-feedback"> Please select a valid state. </div>
                           
                            </div>
                          </div>



                                   <div class="col-md-6 mb-3">
                                 <label for="mobile_no"><strong>Mobile   No (Username)<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="mobile_no" name="mobile_no"  value="<?php echo  $fetch['mobile_no']?>"   aria-describedby="button-addon2">
                           
                            </div>
                          </div>



                     <div class="col-md-6 mb-3">
                          <label for="Password"><strong>Password<b style="color:red">*</b></strong></label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="Password" name="Password"  value="<?php echo  $fetch['Password']?>" aria-describedby="button-addon2">
                           
                            </div>
                          </div>
  
  <div class="col-md-6 " style="align-content: end;">
                      <?php if(isset($_REQUEST['edit'])) { 
                
                      ?>
                    
<button class="btn btn-primary mt-2" name="update" type="submit" style="height: 45px;">Submit</button>
                      <?php } else { ?>
                        <button class="btn btn-primary mt-2" name="submit" type="submit"  style="height: 45px;">Submit form</button>
                        <?php } ?>
  </div>
</div> 

<script>
let testIndex = 1;

function toggleLabSection(show) {
  document.getElementById('labTestSection').style.display = show ? 'block' : 'none';
}

function addRow() {
  const table = document.getElementById('testTable').getElementsByTagName('tbody')[0];
  const newRow = table.insertRow();

  newRow.innerHTML = `
    <td>
      <select name="tests[${testIndex}][test_type]" class="form-control test-select" onchange="updateDropdowns()">
        <option value="">Select</option>
        
      </select>
    </td>
    <td><input type="text" name="tests[${testIndex}][method]" class="form-control"></td>
    <td><input type="text" name="tests[${testIndex}][observation]" class="form-control"></td>
    <td><input type="text" name="tests[${testIndex}][result]" class="form-control"></td>
    <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">x</button></td>
  `;
  testIndex++;
  updateDropdowns();
}

function removeRow(btn) {
  btn.closest('tr').remove();
  updateDropdowns();
}

// ✅ Hide already selected tests in other dropdowns
function updateDropdowns() {
  const allSelects = document.querySelectorAll('.test-select');
  const selectedValues = Array.from(allSelects)
    .map(select => select.value)
    .filter(val => val !== '');

  allSelects.forEach(select => {
    const currentVal = select.value;
    const options = select.querySelectorAll('option');

    options.forEach(opt => {
      if (opt.value === '' || opt.value === currentVal) {
        opt.disabled = false;
      } else {
        opt.disabled = selectedValues.includes(opt.value);
      }
    });
  });
}
</script>


                          <input  type="hidden" name="registerId" value="<?php echo $fetch['registerId'];?>" id="registerId">



                          

                               <!-- <div class="col-md-6 mb-3">
                          <label for="type"><strong>Type<b style="color:red">*</b></strong></label>
                            <select class="form-control select2" id="type" name="type" onchange="getServices()" required>
                              <option value="" selected disabled>Select Type</option>
                              
                            </select>
                            <div class="invalid-feedback"> Please select a valid Type . </div>
                          </div>

                                     <div class="col-md-6 mb-3">
                          <label for="type"><strong>Type<b style="color:red">*</b></strong></label>
                            <select class="form-control select2" id="service" name="service" required>
                              <option value="" selected disabled>Select Type</option>
                          
                            </select>
                            <div class="invalid-feedback"> Please select a valid Type . </div>
                          </div> -->
   </div> <!-- /.form-row -->

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


        <script>
function getServices(){
        var scheme = $("#type").val();
        $.ajax('getServices.php', {
            type: 'POST',  
            data: { scheme : scheme },  
            success: function (data) {
                document.getElementById('service').innerHTML = data;
            }
        });
    }

          </script>
  
   <?php include('include/footer.php'); ?>



<!-- Load core JS files in correct order -->
<script src="js/jquery.min.js?v=<?php echo $version; ?>"></script>
<script src="js/popper.min.js?v=<?php echo $version; ?>"></script>
<script src="js/bootstrap.min.js?v=<?php echo $version; ?>"></script>

<!-- Load moment.js before any date-related scripts -->
<script src="js/moment.min.js?v=<?php echo $version; ?>"></script>
<script src="js/daterangepicker.js?v=<?php echo $version; ?>"></script>

<!-- Other required JS plugins -->
<script src="js/simplebar.min.js?v=<?php echo $version; ?>"></script>
<script src='js/jquery.stickOnScroll.js?v=<?php echo $version; ?>'></script>
<script src="js/tinycolor-min.js?v=<?php echo $version; ?>"></script>
<script src="js/config.js?v=<?php echo $version; ?>"></script>
<script src="js/d3.min.js?v=<?php echo $version; ?>"></script>
<script src="js/topojson.min.js?v=<?php echo $version; ?>"></script>
<script src="js/datamaps.all.min.js?v=<?php echo $version; ?>"></script>
<script src="js/datamaps-zoomto.js?v=<?php echo $version; ?>"></script>
<script src="js/datamaps.custom.js?v=<?php echo $version; ?>"></script>

<!-- Chart libraries -->
<script src="js/Chart.min.js?v=<?php echo $version; ?>"></script>
<script>
  // define global chart options
  Chart.defaults.global.defaultFontFamily = base?.defaultFontFamily || 'Arial';
  Chart.defaults.global.defaultFontColor = colors?.mutedColor || '#333';
</script>
<script src="js/gauge.min.js?v=<?php echo $version; ?>"></script>
<script src="js/jquery.sparkline.min.js?v=<?php echo $version; ?>"></script>
<script src="js/apexcharts.min.js?v=<?php echo $version; ?>"></script>
<script src="js/apexcharts.custom.js?v=<?php echo $version; ?>"></script>

<!-- Form and UI related -->
<script src='js/jquery.mask.min.js?v=<?php echo $version; ?>'></script>
<script src='js/select2.min.js?v=<?php echo $version; ?>'></script>
<script src='js/jquery.steps.min.js?v=<?php echo $version; ?>'></script>
<script src='js/jquery.validate.min.js?v=<?php echo $version; ?>'></script>
<script src='js/jquery.timepicker.js?v=<?php echo $version; ?>'></script>
<script src='js/dropzone.min.js?v=<?php echo $version; ?>'></script>
<script src='js/uppy.min.js?v=<?php echo $version; ?>'></script>
<script src='js/quill.min.js?v=<?php echo $version; ?>'></script>
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