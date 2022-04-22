<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- plugins:css -->
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/css/vendor.bundle.base.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/css/vendor.bundle.base.css')); ?>">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/jvectormap/jquery-jvectormap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/owl-carousel-2/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/vendors/owl-carousel-2/owl.theme.default.min.css')); ?>">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/css/min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/css/customer.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/css/execution.css')); ?>">

<!-- End layout styles -->
<link rel="shortcut icon" href="<?php echo e(url('assets/images/favicon.png')); ?>" />
</head>
<body>
<div class="container-scroller"> 
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"> <span class="mdi mdi-menu"></span> </button>
    </div>
    <ul class="nav">
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-home"></i> </span> <span class="menu-title">Dashboard</span> </a> </li>
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-envelope"></i> </span> <span class="menu-title">Email</span> </a> </li>
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-square"></i> </span> <span class="menu-title">box</span> </a> </li>
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-file-text"></i> </span> <span class="menu-title">File</span> </a> </li>
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-calendar"></i> </span> <span class="menu-title">Calander</span> </a> </li>
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-user"></i> </span> <span class="menu-title">User</span> </a> </li>
      
      
      <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="true" aria-controls="auth">
              <span class="menu-icon"> <i class="fa fa-cog"></i> </span> <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse show" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="presales2.html"> Presales </a></li>
                <li class="nav-item"> <a class="nav-link" href="postsales.html"> Postsales </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('Execution.index')); ?>"> Execution </a></li>
              </ul>
            </div>
        </li>
    </ul>
  </nav>
  
  <!-- partial -->
  <div class="container-fluid page-body-wrapper"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <ul class="navbar-nav w-100">
          <li class="nav-item w-100">
            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
              <input type="text" class="form-control" placeholder="Search products">
            </form>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown"> <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="mdi mdi-email"></i> <span class="count bg-success"></span> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail"> <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic"> </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                <p class="text-muted mb-0"> 1 Minutes ago </p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail"> <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic"> </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                <p class="text-muted mb-0"> 15 Minutes ago </p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail"> <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic"> </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                <p class="text-muted mb-0"> 18 Minutes ago </p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <p class="p-3 mb-0 text-center">4 new messages</p>
            </div>
          </li>
          <li class="nav-item dropdown"> <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown"> <i class="mdi mdi-bell"></i> <span class="count bg-danger"></span> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle"> <i class="mdi mdi-calendar text-success"></i> </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Event today</p>
                <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle"> <i class="mdi mdi-settings text-danger"></i> </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Settings</p>
                <p class="text-muted ellipsis mb-0"> Update dashboard </p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle"> <i class="mdi mdi-link-variant text-warning"></i> </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Launch Admin</p>
                <p class="text-muted ellipsis mb-0"> New admin wow! </p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <p class="p-3 mb-0 text-center">See all notifications</p>
            </div>
          </li>
          <li class="nav-item dropdown"> <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
            <div class="navbar-profile"> <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
              <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
              <i class="mdi mdi-menu-down d-none d-sm-block"></i> </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
              <h6 class="p-3 mb-0">Profile</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle"> <i class="mdi mdi-settings text-success"></i> </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Settings</p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle"> <i class="mdi mdi-logout text-danger"></i> </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>
              </div>
              </a>
              <div class="dropdown-divider"></div>
              <p class="p-3 mb-0 text-center">Advanced settings</p>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"> <span class="mdi mdi-format-line-spacing"></span> </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="dashboard-bodypart">
        <div class="dashboard-bodypart-in">
          <h1> Home <span> <i class="fa fa-home"></i> </span> <small> Home - Dashboard </small> </h1>
          <div class="card">
            <div class="card-body">
              
              

              <div class="container">
                <?php echo $__env->yieldContent('content'); ?>
              </div>




            </div>
            <div class="paginationDiv">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#"> <img src="<?php echo e(url('assets/images/aro-lft.jpg')); ?>" alt="img"> </a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#"><img src="<?php echo e(url('assets/images/aro-rht.jpg')); ?>" alt="img"> </a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main-panel ends --> 
  </div>
  <!-- page-body-wrapper ends --> 
</div>






<!-- container-scroller --> 
<!-- plugins:js --> 
<script src="<?php echo e(url('assets/vendors/js/vendor.bundle.base.js')); ?>"></script> 
<!-- endinject --> 
<!-- Plugin js for this page --> 
<script src="<?php echo e(url('assets/vendors/chart.js/Chart.min.js')); ?>"></script> 
<script src="<?php echo e(url('assets/vendors/progressbar.js/progressbar.min.js')); ?>"></script> 
<script src="<?php echo e(url('assets/vendors/jvectormap/jquery-jvectormap.min.js')); ?>"></script> 
<script src="<?php echo e(url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script> 
<script src="<?php echo e(url('assets/vendors/owl-carousel-2/owl.carousel.min.js')); ?>"></script> 
<!-- End plugin js for this page --> 
<!-- inject:js --> 
<script src="<?php echo e(url('assets/js/off-canvas.js')); ?>"></script> 
<script src="<?php echo e(url('assets/js/hoverable-collapse.js')); ?>"></script> 
<script src="<?php echo e(url('assets/js/misc.js')); ?>"></script> 
<script src="<?php echo e(url('assets/js/settings.js')); ?>"></script> 
<script src="<?php echo e(url('assets/js/todolist.js')); ?>"></script> 
<!-- endinject --> 
<!-- Custom js for this page --> 
<script src="<?php echo e(url('assets/js/dashboard.js')); ?>"></script> 
<!-- End custom js for this page -->
<?php echo $__env->yieldContent('footer'); ?>
</body>
</html><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side Project\LaravelStater\resources\views\project\index_project.blade.php ENDPATH**/ ?>