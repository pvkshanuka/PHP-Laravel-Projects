<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Create Cash Collector</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises pvt ltd - Create Cash Collector">
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
                        <h1>Employee</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/customers">Cash Collectors</a></li>
                            <li><a href="/addcustomer">Add Cash Collector</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <a href="/cashcollector" class="btn btn-secondary btn-sm"><i
                                class="fa fa-arrow-circle-o-left"></i>&nbsp;
                            Back</a>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Cash Collector</strong>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="name">Name</label>
                                                <input type="text" id="ccnm" name="name" class="form-control"
                                                    placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label>NIC</label>
                                                <input type="text" id="ccnic" name="nic" class="form-control"
                                                    placeholder="nic">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mobile</label>
                                                <input type="number" id="ccmobile" name="mobile" class="form-control"
                                                    placeholder="mobile">
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label>Address line 1</label>
                                                <input type="text" id="ccaddres1" name="address line 1"
                                                    class="form-control" placeholder="address">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Address line 2</label>
                                                <input type="text" id="ccaddres2" name="address line 2"
                                                    class="form-control" placeholder="address">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>City</label>
                                                <input type="text" id="cccity" name="city" class="form-control"
                                                    placeholder="address">
                                                <small class="help-block form-text">Please enter a complex
                                                    password</small>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Note</label>
                                                <textarea name="customerdetilas" id="ccdetilas" rows="5"
                                                    placeholder="About Customer..." class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" id="ccuname" name="uname" class="form-control"
                                                    placeholder="Username">
                                            </div>
                                            <div class="form-group col-md-6">

                                            </div>

                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" id="ccpw1" name="pw" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" id="ccpw1_confirmation" name="pw"
                                                    class="form-control" placeholder="confirm Password">
                                            </div>

                                        </div>

                                        <div class="card-body">

                                            <button onclick="addCashCollector()" class="btn btn-sm btn-info btn-block">
                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                <span id="payment-button-amount">Add</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- .card -->

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
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}">
    </script>
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
                    document.getElementById("cusmnusb").setAttribute("class", "menu-item-has-children dropdown active");
                });
    </script>
    <script>
        function addCashCollector(){                
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');                    
                    var name = document.getElementById("ccnm").value
                    var nic = document.getElementById("ccnic").value
                    var mbile = document.getElementById("ccmobile").value
                    var add1 = document.getElementById("ccaddres1").value
                    var add2 = document.getElementById("ccaddres2").value
                    var city = document.getElementById("cccity").value
                    var note = document.getElementById("ccdetilas").value
                    var uname = document.getElementById("ccuname").value
                    var pw1 = document.getElementById("ccpw1").value
                    var pw2 = document.getElementById("ccpw1_confirmation").value                    
                    $.ajax({
                        url: "/CreateCashcollector",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            ccname: name,
                            ccnic: nic,
                            ccmob: mbile,
                            ccadd1: add1,
                            ccadd2: add2,
                            cccity: city,
                            ccdetails: note,
                            ccuname: uname,
                            ccpw1: pw1,
                            ccpw1_confirmation: pw2,
                            
                            status:1},
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
    </script>
</body>

</html>