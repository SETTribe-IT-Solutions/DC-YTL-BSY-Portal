
<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
$teamId = $_SESSION['teamId'];
$userId = $_SESSION['userId'];
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
                        
                        <h1 >Child Register</h1>

                          <?php
                $query = mysqli_query($conn,"SELECT * FROM `visitedArea` where teamId='$teamId'  AND visitDate='$date'") or die($conn->error);
$fetchArea = mysqli_fetch_assoc($query);

$taluka = $fetchArea['taluka'];
$village = $fetchArea['village'];
                ?>
             
    <form class="needs-validation" action="childRegister.php" method="POST" novalidate>
 <div class="form-row">
        <div class="col-md-3 mb-3">

                          <label for="date-input1"><strong>Patient Name<b style="color:red">*</b></strong></label>
                            <select class="form-control select2" id="edit" name="edit" required>
                              <option value="" selected disabled>Select Patient</option>
<?php
$query1 = mysqli_query($conn, "
    SELECT *
    FROM childRegister r
    WHERE (r.registerId, r.id) IN (
        SELECT registerId, MAX(id)
        FROM childRegister
        WHERE taluka = '$taluka' AND village = '$village'
        GROUP BY registerId
    )
    ORDER BY registerId DESC
") or die($conn->error);

while($fetch1 = mysqli_fetch_assoc($query1)) {
?>
  <option value="<?php echo $fetch1['id']; ?>" 
    <?php if (isset($_REQUEST['edit']) && $_REQUEST['edit'] == $fetch1['id']) echo "selected"; ?>>
    <?php echo $fetch1['childName']; ?>
  </option>
<?php } ?>



                            </select>
                            <div class="invalid-feedback"> Please select a valid state. </div>
                          <button class="btn btn-primary mt-2" name="Show" type="submit">Show</button>

                          </div>
 </div>

    </form>
                     
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
                               <label for="validationCustom4"><strong>Taluka<b style="color:red">*</b></strong></label>
                            <input type="text" class="form-control" id="taluka" value="<?php echo $taluka ?>" name="taluka" readonly required>
                            <!-- <div class="valid-feedback"> Looks good! </div> -->
                                <div class="invalid-feedback"> Please enter Taluka </div>
                          </div>
                          
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom4"><strong>Village<b style="color:red">*</b></strong></label>
                            <input type="text" class="form-control" id="village" value="<?php echo $village ?>" readonly name="village" required>
                            <!-- <div class="valid-feedback"> Looks good! </div> -->
                                <div class="invalid-feedback"> Please enter Taluka </div>
                          </div>


       <div class="col-md-6 mb-3">
                                 <label for="Name of Mother"><strong>Name of Mother<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="motherName" value="<?php echo  $fetch['motherName']?>" name="motherName"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>


                                   <div class="col-md-6 mb-3">
                                 <label for="Contact No"><strong>Mother Contact No<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="motherContact" name="motherContact" value="<?php echo  $fetch['motherContact']?>"   aria-describedby="button-addon2">
                           
                            </div>
                          </div>



                            <div class="col-md-6 mb-3">
                                 <label for="Name of Father"><strong>Name of Father<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="fatherName" name="fatherName" value="<?php echo  $fetch['fatherName']?>"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>


                                   <div class="col-md-6 mb-3">
                                 <label for="Husband Contact No"><strong>Father Contact No<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="fatherContact" name="fatherContact"  value="<?php echo  $fetch['fatherContact']?>" aria-describedby="button-addon2">
                           
                            </div>
                          </div>




                             <div class="col-md-6 mb-3">
                                 <label for="nameAsha"><strong>Name of Asha<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="ashaName" name="ashaName"  value="<?php echo  $fetch['ashaName']?>"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>


                                   <div class="col-md-6 mb-3">
                                 <label for="Contact No"><strong>Contact No<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="ashaContact" name="ashaContact"  value="<?php echo  $fetch['ashaContact']?>"   aria-describedby="button-addon2">
                           
                            </div>
                          </div>



                     <div class="col-md-6 mb-3">
                          <label for="Name of Child patient"><strong>Name of Child patient<b style="color:red">*</b></strong></label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="childName" name="childName"  value="<?php echo  $fetch['childName']?>" aria-describedby="button-addon2">
                           
                            </div>
                          </div>

                  <div class="col-md-3 mb-3">
  <label for="birthDate"><strong>Birth Date <b style="color:red">*</b></strong></label>
  <div class="input-group">
    <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo  $fetch['birthDate']?>" aria-describedby="button-addon2">
  </div>
</div>

<div class="col-md-3 mb-3">
  <label for="age"><strong>Age <b style="color:red">*</b></strong></label>
  <div class="input-group">
    <input type="text" class="form-control" id="age" name="age" aria-describedby="button-addon2" readonly>
  </div>
</div>

<script>
  function calculateAge() {
    const birthDateInput = document.getElementById('birthDate');
    const ageInput = document.getElementById('age');

    if (!birthDateInput || !birthDateInput.value) return;

    const birthDate = new Date(birthDateInput.value);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    ageInput.value = age;
  }

  // Run on page load
  window.addEventListener('DOMContentLoaded', calculateAge);

  // Run on input change
  document.getElementById('birthDate').addEventListener('change', calculateAge);
</script>


        <div class="col-md-3 mb-3">
                          <label for="date-input1"><strong>Gender<b style="color:red">*</b></strong></label>
                            <select class="form-control select2" id="gender" name="gender"  value="<?php echo  $fetch['gender']?>" required>
                              <option value="" selected disabled>Select Gender</option>
                         <option>Male</option>
                          <option>Female</option>
                           <option>Other</option>
                            </select>
                            <div class="invalid-feedback"> Please select a valid state. </div>
                          </div>


                 <div class="col-md-3 mb-3">
                                    <label for="Height"><strong>Height<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="height" name="height"  value="<?php echo  $fetch['height']?>" aria-describedby="button-addon2">
                           
                            </div>
                          </div>



                                 <div class="col-md-3 mb-3">
                                    <label for="weight"><strong>Weight<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="weight" name="weight"   value="<?php echo  $fetch['weight']?>" aria-describedby="button-addon2">
                           
                            </div>
                          </div>


                          
 <div class="col-md-3 mb-3">
                                    <label for="Other Details"><strong>Other Any Detail of Child Patient<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                             <textarea name="otherDetails" class="form-control" rows="2" placeholder="Enter remarks"> <?php echo  $fetch['otherDetails']?> </textarea>
                           
                            </div>
                          </div>

                <div class="col-md-3 mb-3">
                          <label for="Immunization Status of Baby"><strong>Immunization Status of Baby<b style="color:red">*</b></strong></label>
                            <select class="form-control select2" id="ImmunizationStatus" name="ImmunizationStatus" required>
                              <option value="" selected disabled>Select </option>
                     <option value="Fully Immunized" <?php if($fetch['ImmunizationStatus'] == "Fully Immunized") { echo "selected";} ?>>Fully Immunized</option>
  <option value="Partially Immunized" <?php if($fetch['ImmunizationStatus'] == "Partially Immunized") { echo "selected";} ?>>Partially Immunized</option>
  <option value="Not Immunized" <?php if($fetch['ImmunizationStatus'] == "Not Immunized") { echo "selected";} ?>>Not Immunized</option>
                            </select>
                            <div class="invalid-feedback"> Please select a valid state. </div>
                          </div>


                                        <div class="col-md-3 mb-3">
                                    <label for="Health History"><strong>Health History<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="healthHistory" value="<?php echo  $fetch['healthHistory']?>" name="healthHistory"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>
                                               <div class="col-md-3 mb-3">
  <label for="Diseases"><strong>Diseases <b style="color:red">*</b></strong></label>
  <div class="input-group">
    <select class="form-control" id="Diseases" name="Diseases" required>
      <option value="" disabled selected>Select Disease</option>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM Diseases");
      while ($row = mysqli_fetch_assoc($result)) {
          $selected = ($fetch['Diseases'] == $row['diseases']) ? 'selected' : '';
          echo '<option value="' . htmlspecialchars($row['diseases']) . '" ' . $selected . '>' . htmlspecialchars($row['diseases']) . '</option>';
      }
      ?>
    </select>
  </div>
</div>

                          
                                        <div class="col-md-3 mb-3">
                                    <label for="Child Treatment"><strong>Child Treatment<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="childTreatment" value="<?php echo  $fetch['childTreatment']?>" name="childTreatment"  aria-describedby="button-addon2">
                           
                            </div>
                          </div>

       

                           <div class="col-md-3 mb-3">
                                    <label for="Referral"><strong>Referral<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="Referral" name="Referral" value="<?php echo  $fetch['Referral']?>" aria-describedby="button-addon2">
                           
                            </div>
                          </div>

     

 <div class="col-md-6 mb-3">
                                    <label for="Remark"><strong>Remark<b style="color:red">*</b></strong></label>
                            <div class="input-group">
                             <textarea name="remark" class="form-control" rows="2" placeholder="Enter remarks"><?php echo  $fetch['remark']?></textarea>
                           
                            </div>
                          </div>


                          <div class="medicineDiv col-md-12">
    <div class="row medicineRow">
        <div class="col-md-3 mb-3">
            <label><strong>Medicine Name <b style="color:red">*</b></strong></label>
            <select class="form-control medicineSelect" name="medicine[]" required>
                <option value="" selected disabled>Select Medicine</option>
                <?php
                $queryP = mysqli_query($conn,"SELECT medicineId, medicine FROM medicine");
                while($fetchP = mysqli_fetch_assoc($queryP)){
                    echo '<option value="'.$fetchP['medicineId'].'">'.$fetchP['medicine'].'</option>';
                }
                ?>
            </select>
            <div class="invalid-feedback">Please select a medicine.</div>
        </div>

        <div class="col-md-3 mb-3">
            <label><strong>Quantity <b style="color:red">*</b></strong></label>
            <input type="number" class="form-control" name="quantity[]" min="1" required>
        </div>

        <div class="col-md-1 mb-3 d-flex align-items-end">
            <button type="button" class="btn btn-success addMedicine">+</button>
        </div>
    </div>
</div>



<script>
$(document).ready(function () {
    let stockMap = {};

    function updateMedicineOptions() {
        let selected = [];
        $('.medicineSelect').each(function () {
            const val = $(this).val();
            if (val) selected.push(val);
        });

        $('.medicineSelect').each(function () {
            const current = $(this);
            const currentVal = current.val();

            current.find('option').each(function () {
                const optVal = $(this).val();
                if (optVal && optVal !== currentVal && selected.includes(optVal)) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    }

    // Add new medicine row
    $(document).on('click', '.addMedicine', function () {
        const $row = $(this).closest('.medicineRow');
        const $clone = $row.clone();

        $clone.find('select').val('');
        $clone.find('input').val('');
        $clone.find('.stock-warning').remove();

        $clone.find('.addMedicine')
            .removeClass('btn-success addMedicine')
            .addClass('btn-danger removeMedicine')
            .text('-');

        $('.medicineDiv').append($clone);

        updateMedicineOptions();
    });

    // Remove medicine row
    $(document).on('click', '.removeMedicine', function () {
        $(this).closest('.medicineRow').remove();
        updateMedicineOptions();
    });

    // On change medicine: check stock
$(document).on('change', '.medicineSelect', function () {
    const $select = $(this);
    const medicineId = $select.val();
    const $row = $select.closest('.medicineRow');
    const $qty = $row.find('input[name="quantity[]"]');

    updateMedicineOptions();

    $qty.val('');
    $qty.attr('max', '');
    $qty.next('.stock-warning').remove();

    if (medicineId) {
        $.post('get_stock.php', { medicineId: medicineId }, function (stock) {
            stock = parseInt(stock);
            stockMap[medicineId] = stock;

            $qty.attr('max', stock);
            $qty.val('');
            $qty.next('.stock-warning').remove();

            if (stock <= 0 || isNaN(stock)) {
                $qty.after('<div class="stock-warning text-danger">Out of stock!</div>');
            }
        });
    }
});


    // Quantity check
   $(document).on('input', 'input[name="quantity[]"]', function () {
    const $input = $(this);
    const qty = parseInt($input.val()) || 0;
    const $row = $input.closest('.medicineRow');
    const medicineId = $row.find('.medicineSelect').val();

    $input.next('.stock-warning').remove();

    if (medicineId && stockMap[medicineId] !== undefined) {
        const available = stockMap[medicineId];
        if (qty > available) {
            $input.val('');
            $input.after('<div class="stock-warning text-danger">Only ' + available + ' in stock!</div>');
        }
    }
});

});
</script>


<div class="col-md-12 mb-3">
  <label class="form-label fw-bold">Is Lab Test Required?</label><br>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="lab_required" id="labYes" value="yes" onclick="toggleLabSection(true)">
    <label class="form-check-label" for="labYes">Yes</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="lab_required" id="labNo" value="no" onclick="toggleLabSection(false)">
    <label class="form-check-label" for="labNo">No</label>
  </div>
</div>

<!-- Lab test section hidden initially -->
<div id="labTestSection" style="display: none;">
  <div class="col-md-12">
    <div class="table-responsive">
      <table id="testTable" class="table table-bordered">
        <thead>
          <tr>
            <th>Test</th>
            <th>Method</th>
            <th>Observation</th>
            <th>Result</th>
            <th><button type="button" class="btn btn-success btn-sm" onclick="addRow()">+</button></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select name="tests[0][test_type]" class="form-control test-select" onchange="updateDropdowns()">
                <option value="">Select</option>
                <?php
                $tests = mysqli_query($conn, "SELECT test_name FROM lab_tests");
                while ($row = mysqli_fetch_assoc($tests)) {
                  echo "<option value='{$row['test_name']}'>{$row['test_name']}</option>";
                }
                ?>
              </select>
            </td>
            <td><input type="text" name="tests[0][method]" class="form-control"></td>
            <td><input type="text" name="tests[0][observation]" class="form-control"></td>
            <td><input type="text" name="tests[0][result]" class="form-control"></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- ✅ Remark field outside the table -->
  <div class="col-md-12 mt-3">
    <label class="form-label fw-bold">Remark</label>
    <textarea name="lab_remark" class="form-control" rows="2" placeholder="Enter any remark..."></textarea>
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
        <?php
        $tests = mysqli_query($conn, "SELECT test_name FROM lab_tests");
        while ($row = mysqli_fetch_assoc($tests)) {
          echo "<option value='{$row['test_name']}'>{$row['test_name']}</option>";
        }
        ?>
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
                               <?php
                               $query = mysqli_query($conn,"select distinct(type) from services") or die($conn->error);
                               while($fetch = mysqli_fetch_assoc($query)) {
                               ?>
                               <option><?php echo $fetch['type'] ?></option>
                               <?php 
                               } 
                               ?>
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

                      <?php if(isset($_REQUEST['edit'])) { 
                
                      ?>
                      
<button class="btn btn-primary mt-2" name="update" type="submit">Submit</button>
                      <?php } else { ?>
                        <button class="btn btn-primary mt-2" name="submit" type="submit">Submit form</button>
                        <?php } ?>
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