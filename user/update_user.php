<?php

session_start();

include ('../config/db_config.php');
include ('update.php');

if (!isset($_SESSION['id'])) {
    header('location:../index');
}

$user_id = $_SESSION['id'];

$alert_msg = '';
$get_first_name = $get_middle_name = $get_last_name = $get_email_ad = $get_contact_number =
    $get_user_name = '';

$get_all_user_sql = "SELECT * FROM tbl_users WHERE user_id = :id";
$get_all_user_data = $con->prepare($get_all_user_sql);
$get_all_user_data->execute([':id' => $_SESSION['id']]);
while ($result = $get_all_user_data->fetch(PDO::FETCH_ASSOC)) {
    $db_user_name = $result['username'];
    $db_first_name = $result['first_name'];
    $db_middle_name = $result['middle_name'];
    $db_last_name = $result['last_name'];
    $db_email_ad = $result['email'];
    $db_contact_number = $result['contact_number'];

}


if (isset($_GET['userpass'])) {
    $user_id = $_GET['id'];

    $get_user_sql = "SELECT * FROM tbl_users WHERE user_id = :id";
    $get_user_data = $con->prepare($get_user_sql);
    $get_user_data->execute([':id' => $user_id]);
    while ($result = $get_user_data->fetch(PDO::FETCH_ASSOC)) {
        $update_user_id = $result['user_id'];
        $get_user_name = $result['username'];
        $get_user_pass = $result['userpass'];
        $get_first_name = $result['first_name'];
        $get_middle_name = $result['middle_name'];
        $get_last_name = $result['last_name'];
        $get_email_ad = $result['email'];
        $get_contact_number = $result['contact_number'];

    }

}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/scclogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: ">
      <span class="brand-text font-weight-light">DTS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php echo $db_first_name . " " . $db_middle_name . " " . $db_last_name ?>  </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Dashboard
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-header">TRANSACTIONS</li>
               <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Manage Records 
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="list_incoming.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Incoming</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_received.php" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Received</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_outgoing.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Outgoing</p>
                </a>
              </li>
            
            
            <li class="nav-item">
                <a href="list_archived.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Archive</p>
                </a>
              </li>
            </ul>
            
          <li class="nav-header">MASTER FILES</li>
          <li class="nav-item">
            <a href="list_document_type.php" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Document Type
                             </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="list_department.php" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Departments
                          </p>
            </a>
          </li>
          
              <li class="nav-item">
                <a href="list_users.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php htmlspecialchars("PHP_SELF") ?>">
              <div class="box-body">
                <?php echo $alert_msg; ?>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>First Name</label>
                  </div>
                  <div class="col-md-10">
                  
                      <input type="text" class="form-control" name="new_firstname" value="<?php echo
$get_first_name; ?>" placeholder="Firstname" >
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>Middle Name</label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="new_middlename" value="<?php echo
$get_middle_name; ?>" placeholder="Middlename" >
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>Last Name</label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="new_lastname" value="<?php echo
$get_last_name; ?>" placeholder="Lastname">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>Email Address</label>
                  </div>
                  <div class="col-md-10">
                      <input type="email" class="form-control" name="new_email" value="<?php echo
$get_email_ad; ?>" placeholder="Email Address" >
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>Contact Number</label>
                  </div>
                  <div class="col-md-10">
                      <input type="number" class="form-control" name="new_contact_number" value="<?php echo
$get_contact_number; ?>" placeholder="Contact Number" >
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>Username</label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="new_username" value="<?php echo
$get_user_name; ?>" placeholder="Username">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-2" style="text-align: right;padding-top: 5px;">
                   <label>Password</label>
                  </div>
                  <div class="col-md-10">
                    <input type="password" class="form-control" name="new_user_password" placeholder="Password">
                    <span>Note: Input password if you want to update</span>
                  </div>
                </div><br>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="user_id_update" value="<?php echo $update_user_id; ?>">
                <input type="submit" name="update_user" class="btn btn-primary" value="Update">
                <a href="users">
                  <input type="button" name="cancel" class="btn btn-default" value="Cancel">       
                </a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-1"></div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer here -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; <?php echo 2018; ?>.</strong> All rights
      reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
$('#users').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'autoHeight'  : true
    })
  </script>

<script type="text/javascript">

  $(document).ready(function() {

    $(document).ajaxStart(function () {
      Pace.restart()
    })  

  });


</script>


</body>
</html>