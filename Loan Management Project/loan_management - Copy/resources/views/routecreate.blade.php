<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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
                        <h1>Route</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Add New Route </li>
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
                                <strong class="card-title">Add New Route </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Route Name</label>
                                            <input id="routename" name="routename" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Details</label>
                                            <input id="details" name="details" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>

                                        <div>
                                            <button id="Savebtn" type="submit" class="btn btn-sm btn-info btn-block"
                                                onclick="saveRoute();">
                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                <span id="payment-button-amount">Add</span>
                                            </button>
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
                                                            style="width: 209px;">Route Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 349px;">
                                                            Route Detais</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="r_body">
                                                    <?php
                                                $clevel_data = DB::table('route')->where('status',1)->get();
                                                foreach ($clevel_data as  $rname) {?>
                                                    <tr role="row" class="odd">

                                                        <td class="sorting_1"><span
                                                                class="text-success">{{$rname->routename}}</span>
                                                        <td>{{$rname->details}}</td>

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



function saveRoute(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var routename =   document.getElementById("routename").value
    var details =   document.getElementById("details").value
  
    if (routename!="" && details!="") {

        $.ajax({
        url: "/newroute",
        type:"POST",
        data: {_token: CSRF_TOKEN,routename1: routename,details1: details,status:1},
        success:function(response){
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Add New Route'
                });

                $("#routename").val('');
                $("#details").val('');
        
        },
       });
        
        
    }else{
        const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'warning',
                    title: 'Fill All Details'
                });
    }

    
}



    </script>

</body>

</html>