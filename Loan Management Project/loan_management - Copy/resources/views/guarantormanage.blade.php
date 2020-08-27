<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sanju enterprises - Guarantors Manage</title>
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
                        <h1>Guarantors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Guarantors</li>
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
                                <strong class="card-title">Add Guarantor</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <a href="/addguarantor" class="btn btn-sm btn-info btn-block">
                                            <i class="fa fa-plus fa-sm"></i>&nbsp;
                                            <span id="payment-button-amount">Add</span>
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
                            <strong class="card-title">Guarantors</strong>
                        </div>
                        <div class="card-body">


                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                               

{{-- ................................................. --}}
<div class="row">
    <div class="col-md-12">
        <table id="bootstrap-data-table-export"
            class="table table-striped table-bordered">
            <thead>
                <tr>

                    <th>NIC</th>
                  
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Action</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $clevel_data = DB::table('guarantor')->get();
                foreach ($clevel_data as  $rname) {?>
                
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$rname->nic}}</td>
                
                    <td>
                        {{$rname->name}}
                    </td>
                    <td>
                        {{$rname->pno}}
                    </td>

                    <td>
                        @if($rname->status==1)
                        <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Deactive</span>
                    @endif
                    </td>
                    <td>
                     <button type="button" onclick="viewCustomer({{$rname->guarantorId}})"
                            class="btn btn-outline-primary btn-sm mb-1"
                            data-toggle="modal"
                            data-target="#mediumModalcusUpdate">Update</button>
                            {{-- <a href="#" class="btn btn-outline-primary btn-sm mb-1">Update</a> --}}
                    </td>
                    <td>
                        @if($rname->status==1)
                        <button type="button"
                        class="btn btn-outline-danger btn-sm" onclick="ActiveUser({{$rname->guarantorId}})">Deactive</button>
                    @else
                    <button type="button"
                    class="btn btn-outline-success btn-sm" onclick="DeactiveUser({{$rname->guarantorId}})">Active</button>
                    @endif

                    </td>
                </tr>
             <?php
                }?>

                

            </tbody>
        </table>
    </div>

</div>
{{-- ................................................. --}}

                              
                               

                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div> <!-- .content -->
    </div><!-- /#right-panel -->
    {{-- Customer Update Model --}}
    <div class="modal fade" id="mediumModalcusUpdate" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Update Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body" id="mdlbdaycc">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  
                </div>
            </div>
        </div>
    </div>
    {{-- Customer Update Model --}}

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
           document.getElementById("cusmnusb").setAttribute("class", "menu-item-has-children dropdown active");
         });

         function ActiveUser(id){
            
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
        url: "/activeGuarantor",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    
        cusid:id},
        success:function(response){

        
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Activa Success....!'
                });
                location.reload();
        
        
        },
       });
         }
         function DeactiveUser(id){
            
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
        url: "/deactiveGuarantor",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    
        cusid:id},
        success:function(response){

        
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Deactiva Success....!'
                });

                location.reload();
        
        },
       });
         }

        

      
        function viewCustomer(id){
           //var cusid = document.getElementById('cusid').innerHTML;
         
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
        url: "/viewGuarantorDetails",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    
        cusid:id},
        success:function(response){
  
            document.getElementById("mdlbdaycc").innerHTML = response;
        
        }, error: function(response) {
                            console.log(response);
                        }
       });
           
           
           
        }

        $(document).ready(function (){

            
        });

             function updatecustomer(id){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                 var name =  document.getElementById('cusname').value;
                
                 var tp1 =  document.getElementById('mob1').value;
                 var tp2 =  document.getElementById('mob2').value;
            
                 var adId =  document.getElementById('cusadId').value;
                 var ad1 =  document.getElementById('cusad1').value;
                 var ad2 =  document.getElementById('cusad2').value;
                 var city =  document.getElementById('cuscity').value;
              
                 var note =  document.getElementById('cusnote').value;
             

              
                 if (tp1.length==10&& tp2.length==10) {
                    $.ajax({
        url: "/updateGuarantor",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    
        cusid:id,
        cusname:name,
       
        custp1:tp1,
        custp2:tp2,
     
        cusadId:adId,
        cusad1:ad1,
        cusad2:ad2,
        cuscity:city,
        
        cusnote:note
    
    },
        success:function(response){

            
            console.log(response);
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'Update Customer Success....!'
        });

        location.reload();

        
        
        },
        error: function(response) {
                            console.log(response);
                        }
       });
                 } else {
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Add Correct Mobile Number....!'
        });
                 }
                 
             }
    </script>

</body>

</html>