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
      @media only screen and (max-width: 600px) {
        .main-content {
          margin-left: 0 !important;
          width: 100% !important;
          position: relative;
          z-index: 1; /* Lower than sidebar */
        }
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
                  <center><strong class="card-title" style="font-size:2rem;">बालसंगोपन योजना करीता अर्ज</strong></center>
                </div>
                <div class="card-body">
                  <form class="needs-validation" action="balsangopan_yojanaForm_db.php" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3"><strong>संगोपनकर्त्याचे संपूर्ण नाव<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="teamName" name="sangopankartyache_name" required>
                        <div class="invalid-feedback"> Please enter a Team Name</div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>लाभार्थ्यांचे संपूर्ण नाव<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="labhartyanche_name" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>लाभार्थ्यांचे जन्म तारीख<b style="color:red;">*</b></strong></label>
                        <input type="date" class="form-control" id="vechileNo" name="date_of_birth" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>वय<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="age" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>राष्ट्रीयत्व<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="nationality" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>अधिवास<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="adhivas" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>शिक्षण (बोनाफाईड प्रमाणपत्र)<b style="color:red;">*</b></strong></label>
                        <input type="file" class="form-control" id="vechileNo" name="shikshan" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>व्यवसाय<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="bussiness" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>उत्पनाचे साधन<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="utpanache_sadhan" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>मासिक उत्पन्न<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="masik_utpann" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>बँक खात्याची तपशील<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="bank_info" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>बँकेचे नाव<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="bank_name" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>खाते क्रमांक<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="account_number" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>IFSC<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="ifsc_code" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>घरचा पत्ता<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="home_address" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>कायमचा पत्ता<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="address2" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>मोबाईल नंबर<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="mobile_number" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>कार्यलयाचा पत्ता<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="office_address" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>विवाह केव्हा झाला<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="marrige_info" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>झालेल्या बालकांची संख्या<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="child_info" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>ह्यात पत्नी संख्या - एक/दोन<b style="color:red;">*</b></strong></label>
                        <input type="text" class="form-control" id="vechileNo" name="wife_count" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                       <div class="col-md-6 mb-3">
                        <label for="validationCustom4"><strong>एखादा मोठा दीर्घ कालीन आजार किंवा असाध्य आजार असल्यास वैघ्कीय प्रमाणपत्र सादर करावे<b style="color:red;">*</b></strong></label>
                        <input type="file" class="form-control" id="vechileNo" name="document" required>
                        <div class="invalid-feedback"> Please enter a Vechile No </div>
                      </div>
                    </div> <!-- /.form-row -->
                    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
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
  </body>
</html>