<?php
session_start();
include('include/connection.php');
include('include/sweetAlert.php');
date_default_timezone_set('Asia/Kolkata'); // IST timezone
$role = $_SESSION['role'];
?>
<style>
  @media only screen and (max-width: 600px) {
        .main-content {
  margin-left: 0 !important;
  width: 100% !important;
  position: relative;
  z-index: 1; /* Lower than sidebar */
}
        }
  </style>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
     <div class="w-100 mb-4 d-flex flex-column align-items-center text-center">
  <!-- <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
   
    <svg version="1.1" id="logo" class="navbar-brand-img brand-sm mb-2" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve" width="50" height="50">
      <g>
        <polygon class="st0" points="78,105 15,105 24,87 87,87" />
        <polygon class="st0" points="96,69 33,69 42,51 105,51" />
        <polygon class="st0" points="78,33 15,33 24,15 87,15" />
      </g>
    </svg>
  </a> -->

    <!-- Image logos -->
  <div class="mt-2 d-flex justify-content-center gap-3">
    <img src="img/images.jpeg" alt="Jila Parishad Logo" style="height: 60px;">
    <!-- <img src="assets/images/tnae-logo.png" alt="TNAE Logo" style="height: 40px;"> -->
  </div>
  <!-- Text below logo -->
 <h5 class="fw-bold mt-2">जिल्हा परिषद</h5>
<span class="text-dark">ठाणे</span>
         <hr class="w-75 my-2" style="border-top: 2px solid #ccc;">
</div>
            

            <hr>


         
          <ul class="navbar-nav flex-fill w-100 mb-2">
           
     
<?php if($role=="admin") {
  ?>

      <li class="nav-item w-100">
              <a class="nav-link" href="dashboard.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>


            <li class="nav-item w-100">
              <a class="nav-link" href="createTeam.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Create Team</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>


               <li class="nav-item w-100">
              <a class="nav-link" href="teamDetails.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Team Details</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>

                            <li class="nav-item w-100">
                    <a class="nav-link" href="medicineReport.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Medicine Report</span>
              </a>
            </li>



                
                <li class="nav-item w-100">
                    <a class="nav-link" href="testReport.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Lab Test Report</span>
              </a>
            </li>



                      <li class="nav-item w-100">
                    <a class="nav-link" href="opdReportAdmin.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">OPD Report</span>
              </a>
            </li>

  


                            <li class="nav-item w-100">
                    <a class="nav-link" href="ancpncReportAdmin.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">ANC PNC Report</span>
              </a>
            </li>


                                 <li class="nav-item w-100">
                    <a class="nav-link" href="childReportAdmin.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Child Report</span>
              </a>
            </li>
            
               <li class="nav-item w-100">
              <a class="nav-link" href="equipmentDetails.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Equipment Details</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>


   
   
<?php } else if($role == "team") { ?>

       <li class="nav-item w-100">
              <a class="nav-link" href="visitMaster.php">
                <i class="fe fe-map fe-16"></i>
                <span class="ml-3 item-text">Visit Master</span>
              </a>
            </li>

            <?php
            $Date = date('Y-m-d');
$select = mysqli_query($conn,"SELECT * FROM visitedArea WHERE teamId='{$_SESSION['teamId']}' AND visitDate='$Date'") or die($conn->error);

if(mysqli_num_rows($select) > 0)  {
            ?>

               <li class="nav-item w-100">
              <a class="nav-link" href="opdRegister.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">OPD Register</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>

                     <li class="nav-item w-100">
              <a class="nav-link" href="childRegister.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Child Register</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>


            
                     <li class="nav-item w-100">
              <a class="nav-link" href="ancpncRegi.php">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">ANC /PNC Register</span>
                <!-- <span class="badge badge-pill badge-primary">New</span> -->
              </a>
            </li>



             <?php } ?>


                      <li class="nav-item w-100">
                    <a class="nav-link" href="distributeMedicine.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Add Stock</span>
              </a>
            </li>


                <li class="nav-item w-100">
                    <a class="nav-link" href="equipment.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Equipment</span>
              </a>
            </li>


            
                <li class="nav-item w-100">
                    <a class="nav-link" href="medicineReport.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Medicine Report</span>
              </a>
            </li>



                
                <li class="nav-item w-100">
                    <a class="nav-link" href="testReport.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Lab Test Report</span>
              </a>
            </li>



                      <li class="nav-item w-100">
                    <a class="nav-link" href="testReport.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">OPD Report</span>
              </a>
            </li>

  


                            <li class="nav-item w-100">
                    <a class="nav-link" href="ancpncRegister_fetch.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">ANC PNC Report</span>
              </a>
            </li>


                                 <li class="nav-item w-100">
                    <a class="nav-link" href="childRegister_fetch.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Child Report</span>
              </a>
            </li>
               <li class="nav-item w-100">
                    <a class="nav-link" href="users_report_v1.php">
             <i class="fe fe-box fe-16"></i>

                <span class="ml-3 item-text">Pationt History Report</span>
              </a>
            </li>

<?php } ?>

                    <li class="nav-item w-100">
                  <a class="nav-link" href='javascript:logoutFun("logout.php")'>
            <i class="fe fe-log-out fe-16"></i>


                <span class="ml-3 item-text">Logout</span>
              </a>
            </li>

          </ul>
  
          
        </nav>
      </aside>