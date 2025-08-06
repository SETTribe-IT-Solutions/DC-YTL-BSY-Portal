<?php
session_start();
include('include/sweetAlert.php');
?>

<!-- Sidebar Toggle Button (only on mobile) -->
<button class="btn btn-primary d-lg-none m-2" onclick="toggleSidebar()">☰ Menu</button>

<!-- Sidebar -->
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <!-- Close Button (only on mobile) -->
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" onclick="toggleSidebar()">
  <!--  <i class="fe fe-x"><span class="sr-only"></span></i>-->
  </a>

  <nav class="vertnav navbar navbar-light">
    <!-- Logo and text -->
    <div class="w-100 mb-4 d-flex flex-column align-items-center text-center">
      <div class="mt-2 d-flex justify-content-center gap-3">
        <img src="img/images.jpeg" alt="Jila Parishad Logo" style="height: 60px;">
      </div>
      <h5 class="fw-bold mt-2">जिल्हा परिषद</h5>
      <span class="text-dark">ठाणे</span>
    </div>

    <!-- Nav Items -->
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="createTeam.php">
          <i class="fe fe-users fe-16"></i>
          <span class="ml-3 item-text">Create Team</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="visitMaster.php">
          <i class="fe fe-map fe-16"></i>
          <span class="ml-3 item-text">Visit Master</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="equipment.php">
          <i class="fe fe-box fe-16"></i>
          <span class="ml-3 item-text">Equipment</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href='javascript:logoutFun("logout.php")'>
          <i class="fe fe-log-out fe-16"></i>
          <span class="ml-3 item-text">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>

<!-- Overlay for mobile -->
<div id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- Style (Put in <head> or before closing </body>) -->
<style>
  @media (max-width: 991.98px) {
    #leftSidebar {
      position: fixed;
      top: 0;
      left: -260px;
      width: 260px;
      height: 100%;
      z-index: 1050;
      background-color: #fff;
      transition: left 0.3s ease;
      box-shadow: 2px 0 5px rgba(0,0,0,0.3);
    }

    #leftSidebar.active {
      left: 0;
    }

    #sidebarOverlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1040;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    #sidebarOverlay.show {
      display: block;
    }
     button.navbar-toggler.text-white.p-0.collapseSidebar {
    display: none !important;
      }
  }
</style>

<!-- JS to Toggle Sidebar -->
<script>
  function toggleSidebar() {
    document.getElementById('leftSidebar').classList.toggle('active');
    document.getElementById('sidebarOverlay').classList.toggle('show');
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      document.getElementById('leftSidebar').classList.remove('active');
      document.getElementById('sidebarOverlay').classList.remove('show');
    }
  });
</script>