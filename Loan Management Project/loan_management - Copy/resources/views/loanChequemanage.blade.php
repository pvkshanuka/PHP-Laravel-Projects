<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Cheque Diary Manage</title>
    <meta name="description" content="Sanju enterprises - Cheque Diary Manage">
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
                        <h1>Chaque</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Customer Cheque Manage</li>
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
                                                    <th>Loan ID</th>

                                                    <th>Loan Amount</th>
                                                    <th>Check No</th>
                                                    <th>Bank Name</th>
                                                    <th>Release Date</th>
                                                    <th>Description</th>
                                                    <th><strong>Totle Amount</strong></th>
                                                    <th>Status</th>
                                                    <th>Action Status</th>
                                                    <th>Action Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cctbdy">
                                                <?php
                                                $clevel_data = DB::table('checkdetails')
                                                ->join('loan','loan.loanId','=','checkdetails.loanId')
                                                ->join('customer','customer.idcustomer','=','loan.idcustomer')
                                                ->select('checkdetails.*','loan.custom_loanId as cid','loan.amount as lamount','customer.name as cname')
                                                ->get();
                                                foreach ($clevel_data as  $rname) {?>
                                                <tr role="row" class="odd">
                                                    <td>{{$rname->cid}} </td>

                                                    <td>{{$rname->lamount}} </td>
                                                    <td class="sorting_1"><span>{{$rname->checkNo}}</span> </td>
                                                    <td class="sorting_1">{{$rname->bankName}}</td>
                                                    <td> {{$rname->realizeDate}}</td>
                                                    <td>{{$rname->description}} </td>
                                                    <td style="color: red">{{$rname->returnpanalty+$rname->lamount}}
                                                    </td>
                                                    <td>
                                                        @if ($rname->status==0)
                                                        <span class="badge badge-success">Paid</span>
                                                        @elseif ($rname->status==2)
                                                        <span class="badge badge-danger">Return</span>
                                                        @endif
                                                    </td>
                                                    <td style="width: 170px;">
                                                        @if ($rname->status==1 || $rname->status==2)
                                                        <select name="select" id="paidstatus" class="form-control">
                                                            <option value="0">Please Select</option>
                                                            <option value="1"> Paid</option>
                                                            <option value="2"> Return</option>
                                                            <option value="3"> Clear</option>
                                                        </select>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($rname->status==1 ||$rname->status==2)
                                                        <button type="button" class="btn btn-warning"
                                                            onclick="paid({{$rname->checkDetailId}});">Submit</button>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        @if ($rname->status==0)
                                                        <span class="badge badge-success">Paid</span>
                                                        @elseif ($rname->status==1)
                                                       
                                                        <button type="button" class="btn btn-warning" onclick="paid({{$rname->checkDetailId}});">Paid</button>
                                                    @elseif ($rname->status==2)
                                                    <span class="badge badge-danger">Return</span>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        @if ($rname->status==1)
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="returncheck({{$rname->checkDetailId}});">Return</button>
                                                        @elseif ($rname->status==2)
                                                        <button type="button" class="btn btn-info"
                                                            onclick="clearreturn({{$rname->checkDetailId}});">Clear</button>
                                                        @endif
                                                    </td> --}}


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
        document.getElementById("chqudrymng").setAttribute("class", "menu-item-has-children dropdown active");
         });


         function paid(id){
            

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var status = document.getElementById('paidstatus').value;

            if (status==0) {
                const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'error',
            title: 'Invalid Action...!'
        });
            }else{
            $.ajax({
                        url: "/customer_cheque_paid",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            check_id: id,
                            pstatus: status,
                    
                        },


                        success:function(data){
                                                console.log(data);
                                                const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'Update Success...!'
        });
                            location.reload();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });

                }
         }
         function returncheck(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/customer_cheque_return",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            check_id: id
                    
                        },


                        success:function(data){
                            console.log(data);
                            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'Update Success...!'
        });
        location.reload();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
         }
         function clearreturn(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/customer_cheque_clear",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            check_id: id
                    
                        },


                        success:function(data){
                            console.log(data);
                            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'Update Success...!'
        });

        location.reload();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
         }

        function sumData(){
            var table = document.getElementById("table"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);
            }
            
            document.getElementById("sumcount").innerHTML ="Rs : "+sumVal+".00";
            console.log(sumVal);
        }
    </script>

</body>

</html>