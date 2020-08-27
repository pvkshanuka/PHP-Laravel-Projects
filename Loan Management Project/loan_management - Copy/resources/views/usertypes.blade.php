<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - User Types</title>
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
                        <h1>Privilages</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">User Types</li>
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
                                <strong class="card-title">Add User Type</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">User type Name</label>
                                            <input id="utype" name="cc-payment" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" onclick="AddUtype();"
                                                class="btn btn-sm btn-info btn-block">
                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                <span id="payment-button-amount">Add</span>
                                            </button>
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
                                <strong class="card-title">User Types</strong>
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
                                                            style="width: 209px;">id</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 349px;">
                                                            Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 154px;">
                                                            Status</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 122px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                        $clevel_data = DB::table('employeetype')->get();
                                        foreach ($clevel_data as  $rname) {?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$rname->employeeTypeId}}</td>
                                                        <td class="sorting_1">
                                                            <span>{{$rname->name}}</span>

                                                        </td>
                                                        <td id="statusutyp{{$rname->employeeTypeId}}">
                                                            @if($rname->status==1)
                                                            <span class="badge badge-success">Active</span>
                                                            @else
                                                            <span class="badge badge-danger">Dective</span>
                                                            @endif
                                                        </td>
                                                        <td id="btnutyp{{$rname->employeeTypeId}}">
                                                            @if($rname->status==1)
                                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                                onclick="Deactiveutype({{$rname->employeeTypeId}})">Dective</button>
                                                            @elseif($rname->status==0)
                                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                                onclick="Activeutype({{$rname->employeeTypeId}})">Active</button>
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
        document.getElementById("privilagesmnusb").setAttribute("class", "menu-item-has-children dropdown active");
    });
    </script>
    <script>
        function AddUtype()
    {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var name = document.getElementById("utype").value
        // alert(name);
        $.ajax({
            url: "/Addusertype",
            type:"POST",
            data: {_token: CSRF_TOKEN,
                utype: name,
                status:1
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
                        title: 'Record Added successfully'
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
    
    
    function Activeutype(id)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var emplgid = id;
        $.ajax({
            url: "/activeUsertype",
            type:"POST",
            data: {_token: CSRF_TOKEN,
                
                cusid:id},
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
                        document.getElementById("statusutyp"+emplgid).innerHTML = "";
                        
                        var newElement = document.createElement('span');
                        newElement.innerHTML = "Active";
                        newElement.setAttribute("class", "badge badge-success");
                        document.getElementById("statusutyp"+emplgid).appendChild(newElement);
                        
                        document.getElementById("btnutyp"+emplgid).innerHTML = "";
                        
                        var newElement2 = document.createElement('button');
                        newElement2.innerHTML = "Active";
                        newElement2.setAttribute("class", "btn btn-outline-danger btn-sm");
                        newElement2.setAttribute("onclick", "Deactiveutype("+emplgid+")");
                        document.getElementById("btnutyp"+emplgid).appendChild(newElement2);
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
        function Deactiveutype(id)
        {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var emplgid = id;
            $.ajax({
                url: "/deactiveutype",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                    
                    cusid:id},
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
                            document.getElementById("statusutyp"+emplgid).innerHTML = "";
                            
                            var newElement = document.createElement('span');
                            newElement.innerHTML = "Deactive";
                            newElement.setAttribute("class", "badge badge-danger");
                            document.getElementById("statusutyp"+emplgid).appendChild(newElement);
                            
                            document.getElementById("btnutyp"+emplgid).innerHTML = "";
                            
                            var newElement2 = document.createElement('button');
                            newElement2.innerHTML = "Active";
                            newElement2.setAttribute("class", "btn btn-outline-success btn-sm");
                            newElement2.setAttribute("onclick", "Activeutype("+emplgid+")");
                            document.getElementById("btnutyp"+emplgid).appendChild(newElement2);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                                type: 'success',
                                title: 'Record Added successfully'
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