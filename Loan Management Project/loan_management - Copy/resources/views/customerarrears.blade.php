<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Customer Arrears</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

<body onload="loandata();">


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
                        <h1>Customers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Customer Loan Detais</li>
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
                                                    <th>Name</th>
                                                    <th>NIC</th>
                                                    <th>Reg. Number</th>
                                                    <th>Loan ID</th>
                                                   
                                                    <th>Loan Type</th>
                                                    <th>Amount</th>
                                                    <th>Issue Date</th>
                                                    <th>Closing Date</th>
                                                  
                                                    <th>Loan Info</th>
                                                    <th>Info</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cctbdy">
                                                <?php
                                                $clevel_data = DB::table('loan')
                                                ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                                                ->join('loantype', 'loantype.loanTypeId', '=', 'loan.loanTypeId')
                                                ->select('customer.name as cusName','customer.idcustomer as idcustomer','customer.customerNo as customerNo','customer.nic as nic', 'loan.*', 'loantype.*')
                                                ->get();
                                                   foreach ($clevel_data as  $rname) {?>
                                               
                                           <tr role="row" class="odd">
                                            <td>{{$rname->cusName}}</td>
                                               <td class="sorting_1">{{$rname->nic}}</td>
                                               <td class="sorting_1">{{$rname->customerNo}}</td>
                                               <td class="sorting_1">{{$rname->custom_loanId}}</td>
                                               
                                               <td>{{$rname->name}}</td>
                                               <td>{{ number_format($rname->amount+$rname->targetIncome, 2, '.', ',') }}</td>
{{--                                                         
                                                   @if($rname->status==0)
                                                   <span class="text-success">Active</span>
                                               @else
                                               <span class="text-danger">Dective</span>
                                               @endif --}}
                                               <td><span class="badge badge-Light">{{$rname->takenDate}}</span></td>
                                               <td><span class="badge badge-Light">{{$rname->endDate}}</span></td>
                                               
                                            
                                               <td> <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#loandetails" onclick="loanInfo({{$rname->loanId}});">Loan Info</button> </td>
                                               <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#userDetails" onclick="userinfo({{$rname->idcustomer}});"><i class="fa fa-user"></i></button> </td>
                                               
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
    <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <P>Checkout Model</P>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ............................Loan Details Model Start..................... --}}
    <div class="modal fade" id="loandetails" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div id="detals1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="p-0 clearfix">
                                    <i class="fa fa-cogs bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                                    <div class="h5 text-primary mb-0 pt-3" id="famount"></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Full Loan Amount</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="p-0 clearfix">
                                    <i class="fa fa-cogs bg-warning  p-4 font-2xl mr-3 float-left text-light"></i>
                                    <div class="h5 text-primary mb-0 pt-3" id="pamount"></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Payment Loan Amount</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="p-0 clearfix">
                                    <i class="fa fa-cogs bg-danger  p-4 font-2xl mr-3 float-left text-light"></i>
                                    <div class="h5 text-primary mb-0 pt-3" id="camount"></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Current Loan Amount</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span>Capital Payment History</span>
                            <br>
                            <div id="detilscapi">
                                
                                <span class="badge badge-secondary">Secondary</span> <span class="badge badge-info">Secondary</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row" id="caldetails">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="p-0 clearfix">
                                    <i class="fa fa-bell  bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                                    <div class="h5 text-primary mb-0 pt-3" id="totamount">Rs :00.00</div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Totle Amount</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="p-0 clearfix">
                                    <i class="fa fa-bell  bg-warning p-4 font-2xl mr-3 float-left text-light"></i>
                                    <div class="h5 text-primary mb-0 pt-3" id="totpayamount">Rs :00.00</div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Pay Amount</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="p-0 clearfix">
                                    <i class="fa fa-bell  bg-danger  p-4 font-2xl mr-3 float-left text-light"></i>
                                    <div class="h5 text-primary mb-0 pt-3" id="balance">Rs :00.00</div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Due Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Customer Loan Shedulle</strong>
                        </div>
                        <div class="card-body">
                            <table class="table" id="loantable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Payment Amount</th>
                                        <th scope="col">Paid Amount</th>
                                        <th scope="col">Paid Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="loadcustomerloandetails">
                                    {{-- <tr>
                                        <th scope="row">2020-07-01</th>
                                        <td>1100</td>
                                        <td>1100</td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">2020-07-01</th>
                                        <td>1100</td>
                                        <td>1100</td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">2020-07-01</th>
                                        <td>1100</td>
                                        <td>1100</td>
                                        
                                    </tr> --}}
                                </tbody>
                            </table>

                        </div>
                       
                    </div>
                </div>
               
               
            </div>
        </div>
    </div>
    {{-- ............................Loan Details Model End..................... --}}
    {{-- ............................Customer Details Model Start..................... --}}
    <div class="modal fade" id="userDetails" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Customer Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cusdata">
                    {{-- <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3"
                                            style="width:85px; height:85px;" alt=""
                                            src="images/admin.jpg">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6" id="cname">Name</h2>
                                        <p id="cnic">City</p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#" id="cmobile"> <i class="fa fa-phone"></i>0711067032 </a>
                                </li>
                            </ul>

                        </section>
                    </aside> --}}
                </div>
                
            </div>
        </div>
    </div>
    {{-- ............................Customer Details Model End..................... --}}

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

            function loandata(){
                // $("#loantable").empty();
                $("#loadcustomerloandetails").empty();
            }

                function loanInfo(id){
                   
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/loadCustomerLoan",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            loan_id: id
                    
                        },


                        success:function(data){
                            
                            console.log(data);
                            var lenght = Object.keys(data).length;
                            var content = "";
                            for(var i=0;i<lenght;i++){

                                var paymentdate = data[i].date;
                                var paymentamount = data[i].amount;
                                var paymentfullamount = data[i].fullamount;
                                var payedcapital = data[i].loanamo;
                                var paydate = data[i].paydate;
                                var payinterst = data[i].payamount;

                                var newamo = paymentfullamount-payedcapital;
                               
                                var details = document.getElementById("caldetails");
                                var details1 = document.getElementById("detals1");
                                    if (data[i].index==1) {
                                        
                                        details.style.display = "none";
                                        details1.style.display = "block";
                                    }else if(data[i].index==0){
                                       
                                        details.style.display = "block";
                                        details1.style.display = "none";
                                        
                                    }
                                    document.getElementById("famount").innerHTML ="Rs : "+paymentfullamount+".00";
                                        document.getElementById("pamount").innerHTML ="Rs : "+payedcapital+".00";
                                        document.getElementById("camount").innerHTML ="Rs : "+newamo+".00";
                                    // content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+ data[i].amount +"</td><td><span class='badge badge-danger'>Returned</span></td> </tr>";
                                    content="<tr><th>"+paymentdate+"</th><td>"+paymentamount+"</td>  <td>"+payinterst+"</td> <td>"+paydate+"</td></tr>";
                                    $("#loadcustomerloandetails").append(content);
                                

                                   
                            }
                            
                            sumData(newamo);
                           
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
                }

                function userinfo(id){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/loadCustomerdata",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            cus_id: id
                    
                        },


                        success:function(data){
                            
                            console.log(data);
                            document.getElementById("cusdata").innerHTML = data;
                           
                           
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });     
                }

                function sumData(){
            var table = document.getElementById("loantable"), sumVal = 0;
            var table = document.getElementById("loantable"), sumVal1 = 0;
           
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[1].innerHTML);
                sumVal1 = sumVal1 + parseFloat(table.rows[i].cells[2].innerHTML);
               
            }
          
            
            document.getElementById("totamount").innerHTML ="Rs : "+sumVal+".00";
            document.getElementById("totpayamount").innerHTML ="Rs : "+sumVal1+".00";
            document.getElementById("balance").innerHTML ="Rs : "+(sumVal-sumVal1)+".00";
            
            // console.log(sumVal);
        }
      
    </script>

</body>

</html>