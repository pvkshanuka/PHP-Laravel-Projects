<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Collected Cash History Manage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Collected Cash History Manage">
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
                        <h1>Cash Collect</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Collected Cash History Manage</li>
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
                                <strong class="card-title">Collected Cash History</strong>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="bootstrap-data-table-export"
                                            class="table table-striped table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Handovered Employee Name</th>
                                                    <th>Route Name</th>
                                                    <th>Collection Date</th>
                                                    <th>Handover Date</th>
                                                    <th>Target Amount</th>
                                                    <th>Collected Amount</th>
                                                    <th>Collected Arrers Amount</th>
                                                    {{-- <th>Status</th> --}}
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cctbdy">
                                                {{-- //1 - Not Yet Requested
                                                //2 - Pending
                                                //0 - approved --}}
                                                <?php
                                                $clevel_data = DB::table('collectionhandover')
                                                ->join('employee', 'employee.employeeId', '=', 'collectionhandover.employeeId')
                                                ->join('collectorroute', 'collectorroute.collectorRouteId', '=', 'collectionhandover.collectorRouteId')
                                                ->join('route', 'route.routeId', '=', 'collectorroute.routeId')
                                                ->select('route.routename as routename','employee.name as empName','employee.employeeId as employeeId','employee.nic as nic','employee.pno as pno', 'collectionhandover.*')
                                                ->where('collectionhandover.status', '1')
                                                ->get();
                                                foreach ($clevel_data as  $rname) {?>
                                                <tr>
                                                    <td><span class="badge badge-Light">{{$rname->empName}}</span></td>
                                                    <td><span class="badge badge-Light">{{$rname->routename}}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-Light">{{$rname->collectiondate}}</span>
                                                    </td>
                                                    <td><span class="badge badge-Light">{{$rname->handoverdate}}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-Light">{{$rname->amount}}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-Light">{{$rname->collectedamount}}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-Light">{{$rname->arrershvamount}}</span>
                                                    </td>
                                                    {{-- <td id="btchstatus{{$rname->collectionhandoverId}}">
                                                    @if ($rname->status==1)
                                                    <span class="badge badge-success">Collected</span>
                                                    @endif

                                                    </td> --}}
                                                    <td>
                                                        <button
                                                            onclick="loadCashCollectDetails({{$rname->collectionhandoverId}})"
                                                            type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#mediumModal"
                                                            class="btn btn-sm btn-primary">Info</button>
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

            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="mdlbdaycc" class="modal-body">
                            {{-- details --}}
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
        document.getElementById("cshclctmngmngsb").setAttribute("class", "menu-item-has-children dropdown active");
    });
    </script>

    <script>
        function loadCashCollectDetails(x){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = x;
        // alert(x);
        $.ajax({
            url: "/loadcshcollectentryhistory",
            type:"POST",
            data:{
                _token: CSRF_TOKEN,
                cchid: id,
            },
            success:function(response){
                console.log(response);
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
                }else{
                    document.getElementById("mdlbdaycc").innerHTML = response;
                }
            },error: function(data) {
                console.log(data);
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
    </script>


</body>

</html>