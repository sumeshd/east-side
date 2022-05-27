<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- plugins:css -->
<link rel="stylesheet" href="{{ url('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/css/vendor.bundle.base.css') }}">

<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ url('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{ url('assets/css/settings/style.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/settings/min.css') }}">


<link rel="stylesheet" href="{{ url('assets/css/jquery.nestable.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/category.css') }}">

<!-- End layout styles -->
<link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" />
</head>
<body>
<div class="container-scroller">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"> <span class="mdi mdi-menu"></span> </button>
  </div>
  <uul class="nav">
      <li class="nav-item menu-items"> <a class="nav-link" href="index.html"> <span class="menu-icon"> <i class="fa fa-home"></i> </span> <span class="menu-title">Dashboard</span> </a> </li>
      @can('project-list')
      <li class="nav-item menu-items"> <a class="nav-link" href="{{ route('Project.index') }}"> <span class="menu-icon"> <i class="fa fa-file-text"></i> </span> <span class="menu-title">Project</span> </a> </li>
      @endcan      
      @can('customer-list')     
      <li class="nav-item menu-items"> <a class="nav-link" href="{{ route('Customer.index') }}"> <span class="menu-icon"> <i class="fa fa-address-card-o"></i> </span> <span class="menu-title">Customer</span> </a> </li>
      @endcan

      <li class="nav-item menu-items"> <a class="nav-link" href="{{ route('teams.index') }}"> <span class="menu-icon"> <i class="fa fa-users"></i> </span> <span class="menu-title">Team</span> </a> </li>
      
      
      @can('role-list')
      <li class="nav-item menu-items"> <a class="nav-link" href="{{ route('roles.index') }}"> <span class="menu-icon"> <i class="fa fa-registered"></i> </span> <span class="menu-title">Role</span> </a> </li>
      @endcan
      @can('user-list')
      <li class="nav-item menu-items"> <a class="nav-link" href="{{ route('User.index') }}"> <span class="menu-icon"> <i class="fa fa-user"></i> </span> <span class="menu-title">User</span> </a> </li>
      @endcan
      <li class="nav-item menu-items"> <a class="nav-link" href="#"> <span class="menu-icon"> <i class="fa fa-cog"></i> </span> <span class="menu-title">Settings</span> </a>
        <div class="collapse show" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('presales') }}"> Presales </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('postsales') }}"> Postsales </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('execution') }}"> Execution </a></li>
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
          <div class="card-body"> <!-- <a href="#" class="combtnDiv"> Export Data </a>
             -->
            <div>
              @yield('content')
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- main-panel ends --> 
</div>
<!-- page-body-wrapper ends --> 

<!-- container-scroller --> 
<!-- plugins:js --> 
<script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script> 
<!-- endinject --> 
<!-- Plugin js for this page --> 
<script src="{{ url('assets/vendors/chart.js/Chart.min.js') }}"></script> 
<script src="{{ url('assets/vendors/progressbar.js/progressbar.min.js') }}"></script> 
<script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script> 
<script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> 
<script src="{{ url('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script> 
<!-- End plugin js for this page --> 
<!-- inject:js --> 
<script src="{{ url('assets/js/off-canvas.js') }}"></script> 
<script src="{{ url('assets/js/hoverable-collapse.js') }}"></script> 
<script src="{{ url('assets/js/misc.js') }}"></script> 
<script src="{{ url('assets/js/settings.js') }}"></script> 
<script src="{{ url('assets/js/todolist.js') }}"></script> 
<!-- endinject --> 
<!-- Custom js for this page --> 
<script src="{{ url('assets/js/dashboard.js') }}"></script> 
<!-- End custom js for this page --> 

<script>
function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}

function show4(){
  document.getElementById('div2').style.display ='none';
}
function show3(){
  document.getElementById('div2').style.display = 'block';
}


function show7(){
  document.getElementById('div3').style.display ='none';
}
function show6(){
  document.getElementById('div3').style.display ='none';
}
function show5(){
  document.getElementById('div3').style.display = 'block';
}

function show9(){
  document.getElementById('div4').style.display ='none';
}
function show8(){
  document.getElementById('div4').style.display = 'block';
}

function show10(){
  document.getElementById('div5').style.display = 'none';
}
function show11(){
  document.getElementById('div5').style.display = 'none';
}
function show12(){
  document.getElementById('div5').style.display = 'block';
}

$(function () {
        $("#checkbox35").click(function () {
            if ($(this).is(":checked")) {
                $("#div9").show();
              
            } else {
                $("#div9").hide();
             
            }
        });
    });





</script> 
<script>
$(".jDeleteRow").click(function() {
  var rowCount = $(this).closest('table').find('tbody').length;
  if (rowCount > 1) {
    $(this).closest('tbody').remove();
  }
});

$(".jAddRow").click(function() {
  var lastRow = $(this).closest('table').find('tbody').last();
  var newRow = lastRow.clone(true, true); //use true to copy event bindings with rows.  Doesn't always work with 3rd party plugins.
  newRow.find('input').val('');
  newRow.find('.jDeleteRow').removeAttr("disabled");
  newRow.insertAfter(lastRow);
});
</script>
@yield('footer')
</body>
</html>