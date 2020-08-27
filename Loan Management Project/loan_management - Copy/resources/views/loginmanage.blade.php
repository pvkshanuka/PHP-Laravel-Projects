<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Login Manage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Login Manage">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" />
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->
    @include('inc.sidebar')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('inc.headernav')
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Logins</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Login Manage</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Staff Members</strong>
                            </div>
                            <div class="card-body">
                                {{-- <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                            <label>Employee: <select name="bootstrap-data-table-export_length"
                                                aria-controls="bootstrap-data-table-export"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">All</option>
                                                <option value="25">Office Staff</option>
                                                <option value="25">Cash Colloctors</option>
                                            </select> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                            <label>Order by : <select name="bootstrap-data-table-export_length"
                                                aria-controls="bootstrap-data-table-export"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">Active Customer</option>
                                                <option value="25">Deactive Customer</option>
                                            </select> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="dataTables_filter text-center">
                                            
                                            <label>Turn off Login connectoin for staff : <br>
                                                <label class="switch switch-text switch-warning switch-pill"> <input
                                                    type="checkbox"
                                                    class="switch-input switch switch-text switch-warning switch-pill"
                                                    checked="true">
                                                    <span data-on="On" data-off="Off" class="switch-label"></span> <span
                                                    class="switch-handle"></span></label>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="bootstrap-data-table-export"
                                            class="table table-striped table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>NIC</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Employee Type</th>
                                                    <th>Status</th>
                                                    <th>Login Status</th>
                                                    <th>Action Login On / Off</th>
                                                    <th>Action Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cctbdy">
                                                <?php
                                                $clevel_data = DB::table('employee')
                                                ->join('login', 'login.idlogin', '=', 'employee.idlogin')
                                                ->where('employeeTypeId', '2')
                                                ->orWhere('employeeTypeId', '3')
                                                ->orWhere('employeeTypeId', '4')
                                                ->get();
                                                foreach ($clevel_data as  $rname) {?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$rname->nic}}</td>
                                                    <td class="sorting_1"><span>{{$rname->name}}</span>
                                                    </td>
                                                    <td>
                                                        {{$rname->pno}}
                                                    </td>
                                                    <td>
                                                        @if ($rname->employeeTypeId==2)
                                                        <span>Employee</span>
                                                        @elseif ($rname->employeeTypeId==3)
                                                        <span>Employee</span>
                                                        @elseif ($rname->employeeTypeId==4)
                                                        <span>Cash Collector</span>
                                                        @endif
                                                    </td>
                                                    <td id="stattd{{$rname->employeeId}}">
                                                        @if ($rname->status==1)
                                                        <span class="badge badge-success">Active</span>
                                                        @elseif ($rname->status==0)
                                                        <span class="badge badge-danger">Deactive</span>
                                                        @endif
                                                    </td>
                                                    <td id="loginstattd{{$rname->idlogin}}">
                                                        @if ($rname->lgstatus==1)
                                                        <span class="badge badge-info"> Login Active</span>
                                                        @elseif ($rname->lgstatus==2)
                                                        <span class="badge badge-warning">Login Deactive</span>
                                                        @elseif ($rname->lgstatus==0)
                                                        <span class="badge badge-danger">Login Block</span>
                                                        @endif
                                                    </td>
                                                    <td id="btnudtlgstat{{$rname->idlogin}}">
                                                        @if ($rname->employeeTypeId!=4)
                                                        @if ($rname->lgstatus==1)
                                                        <button
                                                            onclick="updateLoginEmpstatDeactive({{$rname->idlogin}})"
                                                            class="btn btn-outline-warning btn-sm">Deactive</button>
                                                        @elseif ($rname->lgstatus==2)
                                                        <button
                                                            onclick="updateLoginEmpstatActive({{$rname->employeeId}})"
                                                            class="btn btn-outline-info btn-sm">Active</button>
                                                        @endif
                                                        @endif

                                                    <td id="btnudtstat{{$rname->employeeId}}">
                                                        @if ($rname->status==1)
                                                        <button
                                                            onclick="updateEmpstatDeactive({{$rname->employeeId}},{{$rname->idlogin}})"
                                                            class="btn btn-outline-danger btn-sm">Deactive</button>
                                                        @elseif ($rname->status==0)
                                                        <button
                                                            onclick="updateEmpstatActive({{$rname->employeeId}},{{$rname->idlogin}})"
                                                            class="btn btn-outline-success btn-sm">Active</button>
                                                        @endif

                                                    </td>

                                                </tr>

                                                <?php
                                                            }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>


    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}">
    </script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/init-scripts/data-table/datatables-init.js')}}"></script>

    <script>
        $(document).ready(function () {
                        document.getElementById("privilagesmnusb").setAttribute("class", "menu-item-has-children dropdown active");
                    });
    </script>
    <script>
        function updateLoginEmpstatDeactive(x)
                    {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var emplgid = x
                        $.ajax({
                            url: "/updatelgempstatdeactive",
                            type:"POST",
                            data: {_token: CSRF_TOKEN,
                                emplgid: emplgid 
                            },
                            success:function(response){
                                // console.log(response);
                                if(response.status == 1){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'error',
                                        title: ''+response.errors[0]
                                    });
                                }else if(response.status == 2){
                                    var onc = "loadEmployeeDetails("+emplgid+")";
                                    document.getElementById("loginstattd"+emplgid).innerHTML = "";
                                    
                                    var newElement = document.createElement('span');
                                    newElement.innerHTML = "Login Deactive";
                                    newElement.setAttribute("class", "badge badge-warning");
                                    document.getElementById("loginstattd"+emplgid).appendChild(newElement);
                                    
                                    document.getElementById("btnudtlgstat"+emplgid).innerHTML = "";
                                    
                                    var newElement2 = document.createElement('button');
                                    newElement2.innerHTML = "Active";
                                    newElement2.setAttribute("class", "btn btn-outline-info btn-sm");
                                    newElement2.setAttribute("onclick", "updateLoginEmpstatActive("+emplgid+")");
                                    document.getElementById("btnudtlgstat"+emplgid).appendChild(newElement2);
                                    
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Record Updated successfully'
                                    });
                                }
                            },
                            error: function(data) {
                                // console.log(data);
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: 'Error'
                                });
                                
                            }
                        });
                        
                    }
                    function updateLoginEmpstatActive(x)
                    {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var emplgid = x
                        $.ajax({
                            url: "/updatelgempstatactive",
                            type:"POST",
                            data: {_token: CSRF_TOKEN,
                                emplgid: emplgid
                            },
                            success:function(response){
                                // console.log(response);
                                if(response.status == 1){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'error',
                                        title: ''+response.errors[0]
                                    });
                                }else if(response.status == 2){
                                    var onc = "loadEmployeeDetails("+emplgid+")";
                                    document.getElementById("loginstattd"+emplgid).innerHTML = "";
                                    
                                    var newElement = document.createElement('span');
                                    newElement.innerHTML = "Login Active";
                                    newElement.setAttribute("class", "badge badge-info");
                                    document.getElementById("loginstattd"+emplgid).appendChild(newElement);
                                    
                                    document.getElementById("btnudtlgstat"+emplgid).innerHTML = "";
                                    
                                    var newElement2 = document.createElement('button');
                                    newElement2.innerHTML = "Deactive";
                                    newElement2.setAttribute("class", "btn btn-outline-warning btn-sm");
                                    newElement2.setAttribute("onclick", "updateLoginEmpstatDeactive("+emplgid+")");
                                    document.getElementById("btnudtlgstat"+emplgid).appendChild(newElement2);
                                    
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Record Updated successfully'
                                    });
                                }
                            },
                            error: function(data) {
                                // console.log(data);
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: 'Error'
                                });
                                
                            }
                        });
                        
                    }
                    function updateEmpstatActive(x,y)
                    {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var empid = x;
                        var emplgid = y;
                        // alert(x+","+y);
                        $.ajax({
                            url: "/updateempstatactive",
                            type:"POST",
                            data: {_token: CSRF_TOKEN,
                                empid: empid,
                                emplgid: emplgid,
                                adid: 1
                            },
                            success:function(response){
                                // console.log(response);
                                if(response.status == 1){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'error',
                                        title: ''+response.errors[0]
                                    });
                                }else if(response.status == 2){
                                    // var onc = "loadEmployeeDetails("+empid+")";
                                    // document.getElementById("stattd"+empid).innerHTML = "";
                                    
                                    // var newElement = document.createElement('span');
                                    // newElement.innerHTML = "Active";
                                    // newElement.setAttribute("class", "badge badge-success");
                                    // document.getElementById("stattd"+empid).appendChild(newElement);
                                    
                                    // document.getElementById("btnudtstat"+empid).innerHTML = "";
                                    
                                    // var newElement2 = document.createElement('button');
                                    // newElement2.innerHTML = "Deactive";
                                    // newElement2.setAttribute("class", "btn btn-outline-danger btn-sm");
                                    // newElement2.setAttribute("onclick", "updateEmpstatDeactive("+empid+","+emplgid+")");
                                    // document.getElementById("btnudtstat"+empid).appendChild(newElement2);

                                    // // ------------------login---------------
                                    // var onc = "loadEmployeeDetails("+emplgid+")";
                                    // document.getElementById("loginstattd"+emplgid).innerHTML = "";
                                    
                                    // var newElement = document.createElement('span');
                                    // newElement.innerHTML = "Login Active";
                                    // newElement.setAttribute("class", "badge badge-info");
                                    // document.getElementById("loginstattd"+emplgid).appendChild(newElement);
                                    
                                    // document.getElementById("btnudtlgstat"+emplgid).innerHTML = "";
                                    
                                    // var newElement2 = document.createElement('button');
                                    // newElement2.innerHTML = "Deactive";
                                    // newElement2.setAttribute("class", "btn btn-outline-warning btn-sm");
                                    // newElement2.setAttribute("onclick", "updateLoginEmpstatDeactive("+emplgid+")");
                                    // document.getElementById("btnudtlgstat"+emplgid).appendChild(newElement2);
                                    
                                    
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Record Updated successfully'
                                    });

                                    location.reload();
                                }
                            },
                            error: function(data) {
                                // console.log(data);
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: 'Error'
                                });
                                
                            }
                        });
                        
                    }
                    function updateEmpstatDeactive(x,y)
                    {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var empid = x
                        var emplgid = y;
                        // alert(x+","+y);
                        $.ajax({
                            url: "/updateempstatdeactive",
                            type:"POST",
                            data: {_token: CSRF_TOKEN,
                                empid: empid,
                                emplgid: emplgid,
                                adid: 1
                            },
                            success:function(response){
                                // console.log(response);
                                if(response.status == 1){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'error',
                                        title: ''+response.errors[0]
                                    });
                                }else if(response.status == 2){
                                    // var onc = "loadEmployeeDetails("+empid+")";
                                    // document.getElementById("stattd"+empid).innerHTML = "";
                                    
                                    // var newElement = document.createElement('span');
                                    // newElement.innerHTML = "Deactive";
                                    // newElement.setAttribute("class", "badge badge-danger");
                                    // document.getElementById("stattd"+empid).appendChild(newElement);
                                    
                                    // document.getElementById("btnudtstat"+empid).innerHTML = "";
                                    
                                    // var newElement2 = document.createElement('button');
                                    // newElement2.innerHTML = "Active";
                                    // newElement2.setAttribute("class", "btn btn-outline-success btn-sm");
                                    // newElement2.setAttribute("onclick", "updateEmpstatActive("+empid+","+emplgid+")");
                                    // document.getElementById("btnudtstat"+empid).appendChild(newElement2);

                                    // // ------------------login---------------
                                    // var onc = "loadEmployeeDetails("+emplgid+")";
                                    // document.getElementById("loginstattd"+emplgid).innerHTML = "";
                                    
                                    // var newElement = document.createElement('span');
                                    // newElement.innerHTML = "Login Block";
                                    // newElement.setAttribute("class", "badge badge-danger");
                                    // document.getElementById("loginstattd"+emplgid).appendChild(newElement);
                                    
                                    // document.getElementById("btnudtlgstat"+emplgid).innerHTML = "";
                                    
                                    
                                    
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Record Updated successfully'
                                    });
                                    location.reload();
                                }
                            },
                            error: function(data) {
                                // console.log(data);
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: 'Error'
                                });
                                
                            }
                        });
                        
                    }

    </script>

</body>

</html>