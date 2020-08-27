<!DOCTYPE html>
<html lang="en">

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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css' />

</head>

<body>
    <div class="container">
        <h1>Hi Users</h1>

        {{-- <div id="testtbleid" class="row">
            
        </div>
         --}}
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered dataTable no-footer" role="grid"
                    aria-describedby="bootstrap-data-table-export_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="NIC: activate to sort column descending"
                                style="width: 209px;">
                                NIC</th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1"
                                colspan="1" aria-label="Register Number: activate to sort column ascending">
                                Reg. Number</th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1"
                                colspan="1" aria-label="Name: activate to sort column ascending" style="width: 349px;">
                                Name</th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 154px;">
                                Status</th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 154px;">
                                Update</th>
                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1"
                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                style="width: 122px;">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody id="testtbleid">
                        <tr role="row" class="odd">
                            <td class="sorting_1">35543534534V</td>
                            <td class="sorting_1">3554</td>
                            <td>
                                Customer Name
                            </td>
                            <td><span class="text-success">Deactive</span></td>
                            <td><button type="button" class="btn btn-outline-primary btn-sm mb-1" data-toggle="modal"
                                    data-target="#mediumModalcusUpdate">Update</button>
                            </td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Active</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>&nbsp;</label>
                    <button class="btn btn-sm btn-info btn-block" onclick="loadCustomer()">
                        <i class="fa fa-plus fa-sm"></i>&nbsp;
                        <span id="payment-button-amount">Add</span>
                    </button>
                    <br><br><br>
                </div>
            </div>
        </div>

    </div>

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

    {{-- <script>
        function loadtestdata()
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: "/loadTestData",
            type:"POST",
            data:{
                _token: CSRF_TOKEN,
            },
            success:function(response){
                console.log(response);
                document.getElementById("testtbleid").innerHTML = response;
            },
            error: function(data) {
                console.log(data);
                
            }
        });
    }
    function loadCustomer()
    {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
    url: "/loadcustomerlist",
    type:"GET",
    data:{
    _token: CSRF_TOKEN,
    },
    success:function(response){
    console.log(response);
    // document.getElementById("testtbleid").innerHTML = response;
    },
    error: function(data) {
    console.log(data);
    
    }
    });
    }
    </script> --}}

</body>

</html>