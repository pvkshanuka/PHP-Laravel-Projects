<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Cash Collector</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Cash Collector">
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
                        <h1>Employee</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Cash Collector</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Cash Collector</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div>
                                            <a href="/newcashcollector">
                                                <button id="newStaffMember" type="buton" class="btn btn-primary">
                                                    <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                    <span id="staff_add">Add</span>
                                                </button>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cash Collectors</strong>
                            </div>
                            <div class="card-body">

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIC</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cctbdy">
                                        <?php
                                        $clevel_data = DB::table('employee')->where([
                                        ['employeeTypeId','=','4'],
                                        ['status','=','1']
                                        ])->get();
                                        foreach ($clevel_data as  $rname) {?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$rname->nic}}</td>
                                            <td class="sorting_1"><span>{{$rname->name}}</span>
                                            </td>
                                            <td>
                                                {{$rname->pno}}
                                            </td>
                                            <td>
                                                <button onclick="loadCashCollectorNoteDetails({{$rname->employeeId}})"
                                                    type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#mediumModal">Note
                                                    Details</button>&nbsp;
                                                <button onclick="loadCashCollectorDetails({{$rname->employeeId}})"
                                                    type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#mediumModal">More
                                                    Details</button>
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

            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Member Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="mdlbdaycc" class="modal-body">


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
                document.getElementById("empstaffnsg").setAttribute("class", "menu-item-has-children dropdown active");
            });
    </script>
    <script>
        function loadCashCollectorDetails(x)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var id = x;
                // alert(x);
                $.ajax({
                    url: "/loadccdetails",
                    type:"POST",
                    data:{
                        _token: CSRF_TOKEN,
                        ccid: id,
                    },
                    success:function(response){
                        document.getElementById("mdlbdaycc").innerHTML = response;
                    },
                });
            }
            function loadCashCollectorNoteDetails(x)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var id = x;
                $.ajax({
                    url: "/loadccnote",
                    type:"POST",
                    data:{
                        _token: CSRF_TOKEN,
                        ccid: id,
                    },
                    success:function(response){
                        document.getElementById("mdlbdaycc").innerHTML = response;
                    },
                });
            }
            
            function updateCashCollectorDetails(x){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var ccid = x
                var name = document.getElementById("ccnmudt").value
                var nic = document.getElementById("ccnicudt").value
                var mbile = document.getElementById("ccmobilenwudt").value
                var add1 = document.getElementById("ccaddres1udt").value
                var add2 = document.getElementById("ccaddres2udt").value
                var city = document.getElementById("cccityudt").value
                var addid = document.getElementById("ccaddidudt").value
                // alert(ccid);
                $.ajax({
                    url: "/updateccdetails",
                    type:"POST",
                    data: {_token: CSRF_TOKEN,
                        ccid : ccid,
                        ccname: name,
                        ccnic: nic,
                        ccmob: mbile,
                        ccadd1: add1,
                        ccadd2: add2,
                        cccity: city,
                        ccadid: addid
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
                        // console.log(data);
                        
                    }
                });
                
            }
            
            function updateCashCollectorNote(x)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var nt = document.getElementById("ccdetilasudt").value
                var collectorid = x
                $.ajax({
                    url: "/updateccnote",
                    type:"POST",
                    data: {_token: CSRF_TOKEN,
                        ccid: collectorid,
                        ccnote: nt,
                    },
                    success:function(response){
                        if(response.status == 2){
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
            function updateCashCollectorCredintials(x)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var pw1 = document.getElementById("ccpw1").value
                var pw2 = document.getElementById("ccpw1_confirmation").value
                var otppwd = document.getElementById("ccotpudt").value
                var collectorid = x
                $.ajax({
                    url: "/updatecccreadintials",
                    type:"POST",
                    data: {_token: CSRF_TOKEN,
                        cclgid: collectorid,
                        ccpw1: pw1,
                        ccpw1_confirmation: pw2,
                        ccotp : otppwd
                        
                    },
                    success:function(response){
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