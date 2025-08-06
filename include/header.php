    <!-- <nav class="topnav navbar navbar-light bg-primary">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
         <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form> -->
<!-- Responsive, centered heading 
<div class="container">
  <div class="text-center px-3">
    <h1 class="h3 h1-md">जिल्हा परिषद, ठाणे</h1>
  </div>
</div>-->


        <!-- <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li> -->
          <!-- <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li> -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
            </div>
          </li> 
        </ul>
      </nav>-->
      <?php
session_start();
      ?>
<style>
    @media only screen and (max-width: 600px) {
        .navbar {
  margin-left: 0 !important;
  width: 100% !important;
  position: relative;
  z-index: 1; /* Lower than sidebar */
}
        }
</style>
<nav class="topnav navbar navbar-light bg-primary d-flex justify-content-between align-items-center px-4" style="height: 80px;">
  
  <!-- Left: Sidebar toggle button -->
  <button type="button" class="navbar-toggler text-white p-0 collapseSidebar" style="border: none;">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>

  <!-- Center: Heading -->
  <div class="mx-auto text-center">
    <h1 class="h4 m-0 text-white">Mobile Medical Unit</h1>
  </div>

  <!-- Right: Hello User -->
  <div class="text-white fw-semibold">
  
    Hello , <?php echo $_SESSION['teamName']; ?>
  </div>

</nav>


