
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Digital Library</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">School Management System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout (@php echo $user; @endphp)</a> -->
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/digital-library">
          <i class="fas fa-fw fa-tachometer-alt" style="color:orange"></i>
          <span><strong>Digital Library</strong></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/e-books">
          <i class="fas fa-fw fa-book" style="color:green"></i>
          <span>e-Books</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/articles">
          <i class="fas fa-fw fa-newspaper" style="color:green"></i>
          <span>Articles</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/cd-copies">
          <i class="fas fa-fw fa-life-ring" style="color:green"></i>
          <span>CD-Copies</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/past-exam-papers">
          <i class="fas fa-fw fa-folder-open" style="color:green"></i>
          <span>Past Exam Papers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/useful-documents">
          <i class="fas fa-fw fa-file-pdf" style="color:green"></i>
          <span>Useful Documents</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/request-messages">
          <i class="fas fa-fw fa-envelope" style="color:green"></i>
          <span>Request Messages</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Admin Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Digital Library</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0</b></button> <br/> e-Books!
                  <button type="button" class="btn btn-warning btn-sm"><b>0{{$ebookcount}}</b></button> <br/> e-Books!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/e-books">
                <span class="float-left">View list</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                <a href="/digital-library/add-ebook" class="btn btn-dark btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-newspaper"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0</b></button> <br/> Articles!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/articles">
                <span class="float-left">View list</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                <a href="/digital-library/add-article" class="btn btn-dark btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-light btn-sm"><b>0</b></button> <br/> CD Copies!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/cd-copies">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                  <a href="/digital-library/add-cdcopy" class="btn btn-dark btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-folder-open"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0</b></button> <br/> Past Exam Papers!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/past-exam-papers">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                  <a href="/digital-library/add-exampaper" class="btn btn-dark btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-file-pdf"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0</b></button> <br/> Useful Documents!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/useful-documents">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                  <a href="/digital-library/add-document" class="btn btn-dark btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-envelope"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>012</b></button> <br/> Request Messages!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/request-messages">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                  <a href="/digital-library/request-messages" class="btn btn-dark btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>
              </a>
            </div>
          </div>
        </div>
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Sumana Balika College 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>

</body>

</html>




<!-- <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Digital Library</title> -->

  <!-- Custom fonts for this template-->
  <!-- <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> -->

  <!-- Page level plugin CSS-->
  <!-- <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <!-- <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">School Management System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button> -->

    <!-- Navbar Search -->
    <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Navbar -->
    <!-- <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout (@php echo $user; @endphp)</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper"> -->

    <!-- Sidebar -->
    <!-- <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/digital-library">
          <i class="fas fa-fw fa-tachometer-alt" style="color:orange"></i>
          <span><strong>Digital Library</strong></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/e-books">
          <i class="fas fa-fw fa-book" style="color:green"></i>
          <span>e-Books</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/articles">
          <i class="fas fa-fw fa-newspaper" style="color:green"></i>
          <span>Articles</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/cd-copies">
          <i class="fas fa-fw fa-life-ring" style="color:green"></i>
          <span>CD-Copies</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/past-exam-papers">
          <i class="fas fa-fw fa-folder-open" style="color:green"></i>
          <span>Past Exam Papers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/useful-documents">
          <i class="fas fa-fw fa-file-pdf" style="color:green"></i>
          <span>Useful Documents</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital-library/request-messages">
          <i class="fas fa-fw fa-envelope" style="color:green"></i>
          <span>Request Messages</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid"> -->

        <!-- Breadcrumbs-->
        <!-- <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">School Management System</a>
          </li>
          <li class="breadcrumb-item active">Digital Library</li>
        </ol> -->

        <!-- Icon Cards-->
        <!-- <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0{{$ebookcount}}</b></button> <br/> e-Books!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/e-books">
                <span class="float-left">View list</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-newspaper"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0{{$articount}}</b></button> <br/> Articles!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/articles">
                <span class="float-left">View list</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-light btn-sm"><b>0{{$cdcount}}</b></button> <br/> CD Copies!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/cd-copies">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-folder-open"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0{{$examcount}}</b></button> <br/> Past Exam Papers!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/past-exam-papers">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-file-pdf"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>0{{$doccount}}</b></button> <br/> Useful Documents!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/useful-documents">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-envelope"></i>
                </div>
                <div class="mr-5">
                  <button type="button" class="btn btn-warning btn-sm"><b>012</b></button> <br/> Request Messages!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/digital-library/request-messages">
                <span class="float-left">View list</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        

      </div> -->
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <!-- <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Sumana Balika College 2019</span>
          </div>
        </div>
      </footer>

    </div> -->
    <!-- /.content-wrapper -->

  <!-- </div> -->
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->

  <!-- Logout Modal-->
  <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/">Logout</a>
        </div>
      </div>
    </div>
  </div> -->


  <!-- Bootstrap core JavaScript-->
  
  <!-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> -->

  <!-- Page level plugin JavaScript-->
  <!-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script> -->

  <!-- Custom scripts for all pages-->
  <!-- <script src="{{ asset('js/sb-admin.min.js') }}"></script> -->

  <!-- Demo scripts for this page-->
  <!-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>

</body>

</html> -->


