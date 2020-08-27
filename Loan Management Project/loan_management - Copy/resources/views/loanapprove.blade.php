<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Loan Approve</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Loan Approve">
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
                        <h1>Loan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Loan Approve</li>
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
                                <strong class="card-title">Customers</strong>
                            </div>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="bootstrap-data-table-export"
                                        class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Loan Type</th>
                                                <th>Loan Amount</th>
                                                <th>Target Income</th>
                                                <th>Taken Date</th>
                                                <th>End Date</th>
                                                <th>Installment /Interest</th>
                                                <th>Rental Count</th>
                                                <th>Customer Info</th>
                                                <th>Action Approve</th>
                                                <th>Not Approve</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cctbdy">
                                            <?php
                                            $clevel_data = DB::table('loan')
                                            ->join('customer','customer.idcustomer','=','loan.idcustomer')
                                            ->where('loan.status', '2')
                                            ->select('loan.*','customer.name as cusname','customer.idcustomer as idcus')
                                            ->get();
                                            foreach ($clevel_data as  $rname) {?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <span>{{$rname->cusname}}</span>
                                                    </td>
                                                    <td>
                                                        @if ($rname->loanTypeId==1)
                                                        <span>Daily Loan</span>
                                                        @elseif($rname->loanTypeId==2)
                                                        <span>Monthly Loan (P Type)</span>
                                                        @elseif($rname->loanTypeId==3)
                                                        <span>Monthly Loan</span>
                                                        @elseif($rname->loanTypeId==4)
                                                        <span>Property Loan</span>
                                                        @elseif($rname->loanTypeId==5)
                                                        <span>Vehicle Loan</span>
                                                        @elseif($rname->loanTypeId==6)
                                                        <span>Cheque Loan</span>
                                                        @endif
                                                    </td>
                                                    <td>{{number_format($rname->amount, 2, '.', ',')}}</td>
                                                    <td>{{number_format($rname->targetIncome, 2, '.', ',')}}</td>
                                                    <td>{{$rname->takenDate}}</td>
                                                    <td>{{$rname->endDate}}</td>
                                                    {{-- -----------------------------------------------installment amount ------------------ --}}
                                                    @if ($rname->loanTypeId==3 || $rname->loanTypeId==6)
                                                    {{-- ----------interest-------- --}}
                                                    <?php
                                                    $amnt = DB::table('interest')->where('loanId', $rname->loanId)->first();
                                                        ?>
                                                        <td><span class="count">{{number_format($amnt->amount, 2, '.', ',')}}</span></td>                                                        
                                                    @else
                                                    {{-- ----------installment-------- --}}
                                                    <?php
                                                    $intr = DB::table('installment')->where('loanId', $rname->loanId)->first();                                                                                               
                                                        ?>
                                                        <td><span class="count">{{number_format($intr->amount, 2, '.', ',')}}</span></td>                                             
                                                    @endif
                                                    {{-- --------------------------------------------------end installment amount ------------------ --}}
                                                    {{-- ---------------------------------------------------count start------------------ --}}
                                                    @if ($rname->loanTypeId==3 || $rname->loanTypeId==6)
                                                    {{-- ----------interest-------- --}}
                                                    <?php
                                                    $customer_list = DB::table('interest')->where('loanId', $rname->loanId)->get();
                                                    $customet_count = $customer_list->count();                                                    
                                                    ?>
                                                    <td><span class="count">{{$customet_count}}</span></td>
                                                    @else
                                                    {{-- ----------installment-------- --}}
                                                    <?php
                                                    $customer_list = DB::table('installment')->where('loanId', $rname->loanId)->get();
                                                    $customet_count = $customer_list->count();                                                    
                                                    ?>
                                                    <td><span class="count">{{$customet_count}}</span></td>
                                                    @endif
                                                    
                                                    {{-- ---------------------------------------------------count end------------------ --}}
                                                    {{-- <td><button
                                                        onclick="viewLoanInfo({{$rname->loanId}},{{$rname->loanTypeId}})"
                                                        type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#mediumModal"><i
                                                        class="fa fa-info"></i> &nbsp;
                                                        Info</button>
                                                    </td> --}}
                                                    <td><button onclick="viewCustomerInfo({{$rname->idcus}})"
                                                        type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#mediumModal"><i
                                                        class="fa fa-user"></i> &nbsp;
                                                        Info</button>
                                                    </td>
                                                    <td><button onclick="approveLoan({{$rname->loanId}})"
                                                        class="btn btn-success btn-sm">Approve</button>
                                                    </td>
                                                    <td><button onclick="notApproveLoan({{$rname->loanId}})"
                                                        class="btn btn-danger btn-sm">Not Approve</button>
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
                    {{-- member details --}}
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
        document.getElementById("loanmngsb").setAttribute("class", "menu-item-has-children dropdown active");
    });
    
</script>
<script>
    function viewCustomerInfo(x)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = x;
        // alert(x);
        $.ajax({
            url: "/loadcustomerdetails",
            type:"POST",
            data:{
                _token: CSRF_TOKEN,
                ccid: id,
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
                }else{
                    document.getElementById("mdlbdaycc").innerHTML = response;
                }        
            },
            error: function(data) {
                // console.log(data);
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
    
    function approveLoan(x)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = x;
        $.ajax({
            url: "/approveLoanadmin",
            type:"POST",
            data:{
                _token: CSRF_TOKEN,
                lnid: id,
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
                }else if(response.status == 2){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'Loan Approve successfully'
                    });
                    
                    location.reload();
                }
            },
            error: function(data) {
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
                
            }
        });
    }
    function notApproveLoan(x)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = x;
        $.ajax({
            url: "/notapproveLoanadmin",
            type:"POST",
            data:{
                _token: CSRF_TOKEN,
                lnid: id,
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
                }else if(response.status == 2){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'Loan Not Approve successfully'
                    });
                    
                    location.reload();
                }
            },
            error: function(data) {
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
                
            }
        });
    }
</script>

</body>

</html>