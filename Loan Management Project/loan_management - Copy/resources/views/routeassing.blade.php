<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Add New Route</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
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

<body onload="loaddata();">


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
                        <h1>Route Assignings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            {{-- <li class="active">Route Assignings</li> --}}
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
                                <strong class="card-title">Add New Cash Collector set Route </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    {{-- <form action="/CollectoreAssingRoute" method="POST">
                                        {{csrf_field()}} --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <div class="row form-group">
                                                    <select name="select" id="collectoreid" class="form-control">
                                                        <option value="0">Please Select Collector</option>
                                                        {{-- <option value="1">Option #1</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option> --}}
                                                        <?php
                                                        $clevel_data = DB::table('collector')->where('status',1)->get();
                                                        foreach ($clevel_data as  $rname) {
                                                           $empid = $rname->employeeId;
                                                        $epdata = DB::table('employee')->where('employeeId',$empid)->get();

                                                        foreach ($epdata as  $ename) {?>

                                                        <option value="{{$ename->employeeId}}">{{$ename->name}}</option>

                                                        break;

                                                        <?php
                                                        }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <div class="row form-group">
                                                    <select name="select" id="routeid" class="form-control">
                                                        <option value="0">Please Select Route</option>
                                                        <?php
                                                        $clevel_data = DB::table('route')->where('status',1)->get();
                                                        foreach ($clevel_data as  $rname) {?>

                                                        <option value="{{$rname->routeId}}">{{$rname->routename}}
                                                        </option>



                                                        <?php
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>


                                        </div>



                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <button id="Savebtn" type="submit" onclick="routeAssigs();"
                                                    class="btn btn-sm btn-info btn-block">
                                                    <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                    <span id="payment-button-amount">Add</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3"></div>

                                        </div>


                                    </div>
                                    {{-- </form> --}}
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Route </strong>
                            </div>
                            <div class="card-body">


                                <div id="bootstrap-data-table-export_wrapper"
                                    class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="bootstrap-data-table-export"
                                                class="table table-striped table-bordered dataTable no-footer"
                                                role="grid" aria-describedby="bootstrap-data-table-export_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 209px;">Route ID</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 349px;">
                                                            Route Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 154px;">
                                                            Collector Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 154px;">
                                                            Update</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 122px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{--  --}}

                                                    <?php
                                                    $data = DB::table('collectorroute')
                                                ->join('collector', 'collector.idcollector', '=', 'collectorroute.idcollector')
                                                ->Join('employee', 'employee.employeeId', '=', 'collector.employeeId')
                                                ->Join('route', 'route.routeId', '=', 'collectorroute.routeId')
                                                ->get();
                                                
                                                foreach ($data as  $value) {
                                                    # code...

                                                ?>


                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$value->routeId}}</td>
                                                        <td><span class="text-success">{{$value->routename}}</span>
                                                        <td><span class="text-info">{{$value->name}}</span> </td>
                                                        <td>


                                                            <select name="select" id="changecollector"
                                                                class="form-control">
                                                                <option value="0">Change</option>
                                                                <?php  
                                                                 $data1 = DB::table('employee')->where('employeeTypeId','=','4')->get();
                                                              
                                                                ?>

                                                                @foreach ($data1 as $collector)

                                                                <option value="{{$collector->employeeId}}">
                                                                    {{$collector->name}}</option>

                                                                @endforeach
                                                            </select></td>
                                                        <td><button type="submit"
                                                                onclick="ChangeCollectorRoute({{$value->routeId}});"
                                                                class="btn btn-outline-primary btn-sm">Update</button>
                                                        </td>
                                                    </tr>

                                                    <?php

                                                        }      
                                            ?>


                                                </tbody>
                                            </table>
                                        </div>
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
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>


    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/init-scripts/data-table/datatables-init.js')}}"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
              document.getElementById("loaninterestsb").setAttribute("class", "menu-item-has-children dropdown active");
             });

             function routeAssigs(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                 var collector =   document.getElementById("collectoreid").value
                var route =   document.getElementById("routeid").value
                
                if (collector==0) {
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Select Cash Collector....!'
        });
                } else {
                    if (route==0) {
                        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Select Route....!'
        });
                    } else {
                        $.ajax({
                url: "/CollectoreAssingRoute",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                empId: collector,
                routeid: route,
                status:0},
                success:function(response){
                    console.log(response);

    // const Toast = Swal.mixin({
    //         toast: true,
    //         position: 'top-end',
    //         showConfirmButton: false,
    //         timer: 3000
    //     });
    //     Toast.fire({
    //         type: 'success',
    //         title: 'Add Route Assign Cash Collector Success...!'
    //     });



},
error: function(data) {
                            console.log(data);
                        }
});
                    }
                }
             }

             function ChangeCollectorRoute(id){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var collector =   document.getElementById("changecollector").value
                alert(collector);
                if (collector==0) {
                    
                } else {

                        $.ajax({
                url: "/CollectoreUpdateRoute",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                collectorId: collector,
                routeid: id,
},
                success:function(response){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'Route Update Success...!'
        });
                    console.log(response);
                },
                error: function(data) {
                            console.log(data);
                        }
                });
                    
                }

             }

             

             function loaddata(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                $.ajax({
                url: "/loadrouteassingload",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                
                },
                success:function(data){
                    console.log(data);
                },
                error: function(data) {
                            console.log(data);
                        }
                });
             }
    </script>

</body>

</html>