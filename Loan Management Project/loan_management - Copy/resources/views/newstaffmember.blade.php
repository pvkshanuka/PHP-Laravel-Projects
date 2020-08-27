<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sanju enterprises - Create Staff Member</title>
    <meta name="description" content="Sanju enterprises - Create Staff Member">
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
                            <li><a href="/customers">Staff</a></li>
                            <li><a href="/addcustomer">Add New Staff Member</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-12">
                        <a href="/staff" class="btn btn-secondary btn-sm"><i
                                class="fa fa-arrow-circle-o-left"></i>&nbsp;
                            Back</a>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Staff Member</strong>
                            </div>
                            <div class="card-body">
                                <div>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="exampleFormControlInput1">Name</label>
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            placeholder="Full Name">
                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                    <div class="form-group col-md-4">
                                                        <label>NIC</label>
                                                        <input type="text" id="nic" name="nic" class="form-control"
                                                            placeholder="nic">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Mobile</label>
                                                        <input type="number" id="tp" name="mobile" class="form-control"
                                                            placeholder="mobile">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Email</label>
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            placeholder="email">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Address 1</label>
                                                        <input type="text" id="add1" name="address line 1"
                                                            class="form-control" placeholder="address 1">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Address 2</label>
                                                        <input type="text" id="add2" name="address line 2"
                                                            class="form-control" placeholder="address 2">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>City</label>
                                                        <input type="text" id="city" name="city" class="form-control"
                                                            placeholder="city">
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Username</label>
                                                        <input type="text" id="uname" name="user name"
                                                            class="form-control" placeholder="Username">
                                                    </div>
                                                    <div class="form-group col-md-6">

                                                    </div>

                                                </div>
                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label>Password</label>
                                                        <input type="password" id="pw1" name="password"
                                                            class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Confirm Password</label>
                                                        <input type="password" id="pw1_confirmation"
                                                            name="confirm password" class="form-control"
                                                            placeholder="confirm Password">
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="card-body">

                                                <button onclick="savestaff();" class="btn btn-sm btn-info btn-block">
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
            $(document).ready(function() {
                
                
                var readURL = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function (e) {
                            $('.avatar').attr('src', e.target.result);
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                
                
                $(".file-upload").on('change', function(){
                    readURL(this);
                });
            });
            
            function savestaff()
            {
                
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                var name =   document.getElementById("name").value
                var nic =   document.getElementById("nic").value
                var tp =   document.getElementById("tp").value
                var email =   document.getElementById("email").value
                var add1 =   document.getElementById("add1").value
                var add2 =   document.getElementById("add2").value
                var city =   document.getElementById("city").value
                var uname =   document.getElementById("uname").value
                var pw1 =   document.getElementById("pw1").value
                var pw2 =   document.getElementById("pw1_confirmation").value
                
                $.ajax({
                url: "/newStaffMember",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                empname: name,
                empnic: nic,
                empemail: email,
                empadd1: add1,
                empadd2: add2,
                empcity: city,
                emptp: tp,
                empuname: uname,
                emppw1: pw1,
                emppw1_confirmation: pw2,
                
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