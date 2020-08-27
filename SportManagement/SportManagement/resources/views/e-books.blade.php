@php
$user=session()->get('user');
@endphp

@if($user=='Admin')
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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout (@php echo $user; @endphp)</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/digital-library">
          <i class="fas fa-fw fa-tachometer-alt" style="color:orange"></i>
          <span><strong>Digital Library</strong></span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/digital-library/e-books">
          <i class="fas fa-fw fa-book" style="color:green"></i>
          <span><strong>e-Books</strong></span></a>
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
            <a href="/digital-library">Digital Library</a>
          </li>
          <li class="breadcrumb-item active">e-Books</li>
        </ol>

        <!--middle-->
        <!-- DataTables Example -->
        <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i> e-Books List 
                <span class="float-right">                
                <a href="/digital-library/add-ebook" class="btn btn-info btn-sm" role="button"><i class="fas fa-fw fa-plus-square"></i> Add New</a>
                </span>                
              </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><center>Name of<br/>e-Book</center></th>
                    <th><center>Author of<br/>e-Book</center></th>
                    <th><center>Date Of<br/>Published</center></th>
                    <th><center>Related<br/>Subject</center></th>
                    <th><center>Related<br/>Grade</center></th>
                    <th><center>File<br/>Type</center></th>
                    <th><center>Download</center></th>
                    <th><center>Controls</center></th>
                  </tr>
                </thead>
                
                <tbody>

                  @foreach($e_books as $ebook)
                  <tr>
                    <td>{{$ebook->Name}}</td>
                    <td>{{$ebook->Author}}</td>
                    <td>{{$ebook->DOP}}</td>
                    <td>{{$ebook->Subject}}</td>
                    <td>{{$ebook->Grade}}</td>
                    <td>{{$ebook->file_Type}}</td>
                    <td><center><a href="/digital-library/e-books/download/{{$ebook->id}}" class="btn btn-success btn-sm" role="button">Download</a></center></td>
                    <td><center><a href="/digital-library/update-ebook/{{$ebook->id}}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                        <a href="/digital-library/delete-ebook/{{$ebook->id}}" class="btn btn-danger btn-sm" onclick="confirmDelete()"><i class="fas fa-fw fa-trash"></i></a></center></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> <!--end middle-->       
        

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
          <a class="btn btn-primary" href="/digital-library">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Confirmation eBook-Delete JavaScript -->

  <script>
  function confirmDelete() {
  confirm("Do you want to delete this e-book?");
  }
  </script>

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

@else

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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout (@php echo $user; @endphp)</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/digital-library">
          <i class="fas fa-fw fa-tachometer-alt" style="color:orange"></i>
          <span><strong>Digital Library</strong></span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/digital-library/e-books">
          <i class="fas fa-fw fa-book" style="color:green"></i>
          <span><strong>e-Books</strong></span></a>
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
            <a href="/digital-library">Digital Library</a>
          </li>
          <li class="breadcrumb-item active">e-Books</li>
        </ol>

        <!--middle-->
        <!-- DataTables Example -->
        <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i> e-Books List
              </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><center>Name of<br/>e-Book</center></th>
                    <th><center>Author of<br/>e-Book</center></th>
                    <th><center>Date Of<br/>Published</center></th>
                    <th><center>Related<br/>Subject</center></th>
                    <th><center>Related<br/>Grade</center></th>
                    <th><center>File<br/>Type</center></th>
                    <th><center>Download</center></th>
                  </tr>
                </thead>
                
                <tbody>

                  @foreach($e_books as $ebook)
                  <tr>
                    <td>{{$ebook->Name}}</td>
                    <td>{{$ebook->Author}}</td>
                    <td>{{$ebook->DOP}}</td>
                    <td>{{$ebook->Subject}}</td>
                    <td>{{$ebook->Grade}}</td>
                    <td>{{$ebook->file_Type}}</td>
                    <td><center><a href="/digital-library/e-books/download/{{$ebook->id}}" class="btn btn-success btn-sm" role="button">Download</a></center></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> <!--end middle-->       
        

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
          <a class="btn btn-primary" href="/digital-library">Logout</a>
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

@endif
