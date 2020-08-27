<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Monthly loan Reports</title>
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

<body onload="loadSummary()">


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
                        <h1>Collect Totle  Report</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Collect Totle  Report</li>

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
                                <strong class="card-title">Collect Summary</strong>
                                
                            </div>
                            <div class="card-body">

                                <aside class="profile-nav alt">
                                    <section class="card">
                                    {{-- <br>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="row form-group">
                                    
                                                    <input onclick="choosedate();" type="date" id="sdate" name="text-input" placeholder="Text" class="form-control">
                                                  </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div> --}}
                        
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 20px;color:black;">Darily Loan </span> <span id="type1" style="font-size: 20px;" class="badge badge-light pull-right">10</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 20px;color:black;"> Monthly Loan </span><span id="type2" style="font-size: 20px;" class="badge badge-light pull-right">15</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i> &nbsp;<span style="font-size: 20px;color:black;">Monthly Interst Loan</span> <span id="type3" style="font-size: 20px;" class="badge badge-light pull-right">11</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 20px;color:black;"> Property Loan</span> <span id="type4" style="font-size: 20px;" class="badge badge-light pull-right">03</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 20px;color:black;"> Vehical Loan </span><span id="type5" style="font-size: 20px;" class="badge badge-light pull-right">03</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 20px;color:black;"> Cheque Interst </span><span id="type6" style="font-size: 20px;" class="badge badge-light pull-right">03</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 20px;color:black;"> Loan Pay Amount </span><span id="loanpay" style="font-size: 20px;" class="badge badge-light pull-right">03</span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#"> <i class="fa fa-circle"></i>&nbsp;<span style="font-size: 25px;color:green;"><strong>Totle Amount</strong> </span> <span id="tot" style="font-size: 25px;" class="badge badge-success pull-right">03</span></a>
                                            </li>
                                        </ul>
                        
                                    </section>
                                </aside>


                            </div>
                        </div>


                    </div>



                </div>


            </div>

            {{-- --------------------------------------------- --}}
            
            {{-- --------------------------------------------- --}}
            
            
            <!-- .content -->
        </div>
        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Collect Summary</strong>

                            </div>
                            <div class="card-body">

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="bootstrap-data-table-export"
                                            class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                
                                                    <th>Loan ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Loan Type</th>
                                                    <th>Loan Amount</th>
                                                    <th>Recive Amount</th>
                                                    
                                                    {{-- <th>Loan Info</th> --}}
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //   $subscription = \App\Subscription::create([
                                                //       'price' => 10000,
                                                //       'currency' => 'LKR'
                                                //       ]);
                                                 $opendate = \Carbon\Carbon::now();
                                                $today = $opendate->format('Y-m-d');
                    
                                                   $name=DB::table('loan')
                                                    // ->join('installment','installment.loanId','=','loan.loanId')
                                                    // ->join('installmentpay','installmentpay.installmentId','=','installment.installmentId')
                                                    ->join('customer','customer.idcustomer','=','loan.idcustomer')
                                                    ->join('loantype','loantype.loanTypeId','=','loan.loanTypeId')
                                                    ->join('interest','interest.loanId','=','loan.loanId')
                                                    ->join('interestpay','interestpay.interestId','=','interest.interestId')
                                                    ->where('interestpay.datec','=', $today)
                                                    ->select('interestpay.paidAmount as ipamount','loan.custom_loanId as cloanid','customer.name as cname','loantype.name as typename','loan.amount as famount')
                                                    ->get();
                                                foreach ($name as  $rname) {?>
                                                
                                                <tr role="row" class="odd">
                                                   
                                                    <td class="sorting_1">{{$rname->cloanid}}</td>
                                                    <td class="sorting_1">{{$rname->cname}}</td>
                                                    <td class="sorting_1">{{$rname->typename}}</td>
                                                    <td class="sorting_1">{{number_format($rname->famount, 2, '.', ',')}}</td>
                                                    <td class="sorting_1">{{number_format($rname->ipamount, 2, '.', ',')}}</td>
                                            
                                                </tr>
                                             <?php
                                                }?>
                                                <?php
                                                $opendate = \Carbon\Carbon::now();
                                               $today = $opendate->format('Y-m-d');
                    
                                                  $name=DB::table('loan')
                                                   ->join('installment','installment.loanId','=','loan.loanId')
                                                   ->join('installmentpay','installmentpay.installmentId','=','installment.installmentId')
                                                   ->join('customer','customer.idcustomer','=','loan.idcustomer')
                                                   ->join('loantype','loantype.loanTypeId','=','loan.loanTypeId')
                                                //    ->join('interest','interest.loanId','=','loan.loanId')
                                                //    ->join('interestpay','interestpay.interestId','=','interest.interestId')
                                                   ->where('installmentpay.datec','=', $today)
                                                   ->select('installmentpay.amount as ipamount','loan.custom_loanId as cloanid','customer.name as cname','loantype.name as typename','loan.amount as famount')
                                                   ->get();
                                               foreach ($name as  $rname) {?>
                                               
                                               <tr role="row" class="odd">
                                                   
                                                   <td class="sorting_1">{{$rname->cloanid}}</td>
                                                   <td class="sorting_1">{{$rname->cname}}</td>
                                                   <td class="sorting_1">{{$rname->typename}}</td>
                                                   <td class="sorting_1">{{number_format($rname->famount, 2, '.', ',')}}</td>
                                                    <td class="sorting_1">{{number_format($rname->ipamount, 2, '.', ',')}}</td>
                                           
                                                </tr>
                                              <?php
                                               }?>
                                               {{--  --}}
                    
                                               <?php
                                               $opendate = \Carbon\Carbon::now();
                                              $today = $opendate->format('Y-m-d');
                   
                                                 $name=DB::table('loan')
                                                  ->join('loanpay','loanpay.loanId','=','loan.loanId')
                                                  ->join('customer','customer.idcustomer','=','loan.idcustomer')
                                                  ->join('loantype','loantype.loanTypeId','=','loan.loanTypeId')
                                                  ->where('loanpay.datec','=', $today)
                                                  ->select('loanpay.amount as ipamount','loan.custom_loanId as cloanid','customer.name as cname','loantype.name as typename','loan.amount as famount')
                                                  ->get();
                                              foreach ($name as  $rname) {?>
                                              
                                              <tr role="row" class="odd">
                                                  
                                                  <td class="sorting_1">{{$rname->cloanid}}</td>
                                                  <td class="sorting_1">{{$rname->cname}}</td>
                                                  <td class="sorting_1">{{$rname->typename}}</td>
                                                  <td class="sorting_1">{{number_format($rname->famount, 2, '.', ',')}}</td>
                                                  <td class="sorting_1">{{number_format($rname->ipamount, 2, '.', ',')}}</td>
                                          
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

            {{-- --------------------------------------------- --}}
            
            {{-- --------------------------------------------- --}}
            
            
            <!-- .content -->
        </div>
        

        
    </div><!-- .content -->

    <!-- .content -->
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
    function loadSummary(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
            $.ajax({
                url: "/allsummry",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                    
                
                    },
                    success:function(data){
                        
                        console.log(data);
                        var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){

                              var  type1 = data[i].type1;
                              var type2 = data[i].type2;
                              var type3 = data[i].type3;
                              var  type4 = data[i].type4;
                              var type5 = data[i].type5;
                              var type6 = data[i].type6;
                              var  loanpay = data[i].loanpay;
                              var  tot = data[i].tot;
                                
                              const formatter = new Intl.NumberFormat('LKR', {
                                //  style: 'currency',
                                // currency: 'LKR',
                                 minimumFractionDigits: 2
                                    })
                                    
                                document.getElementById("loanpay").innerHTML =formatter.format(loanpay);
                                document.getElementById("type1").innerHTML = formatter.format(type1);
                                document.getElementById("type2").innerHTML = formatter.format(type2);
                                document.getElementById("type3").innerHTML =formatter.format(type3); 
                                document.getElementById("type4").innerHTML =formatter.format(type4);
                                document.getElementById("type5").innerHTML = formatter.format(type5);
                                document.getElementById("type6").innerHTML =formatter.format(type6);
                                document.getElementById("tot").innerHTML =formatter.format(tot); 
                               
                                // document.getElementById("todaydate").innerHTML =date;
                         }
                    },
                    error: function(data) {
                        console.log(data);
                        
                    }
                });
    }

  
</script>
</body>

</html>