<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sanju enterprises - Dashboard</title>
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

</head>

<body onload="loadCheque(),darilysummry();">


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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-1">
                        <div class="card-body pb-0">

                            <h4 class="mb-0">

                            <?php
                                $customer_list = DB::table('customer')->where('status', '1')->get();
                                $customet_count = $customer_list->count();
                               
                            ?>
                                                
                                <span class="count">{{$customet_count}}</span>

                            <?php
                            ?>
                            </h4>
                            <p class="text-light"><strong>Total Customers</strong></p>

                        </div>

                    </div>
                </div>
                <!--/.col-->
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-5">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                                <span>Rs : 10468.00</span>
                            </h4>
                            <p class="text-light"><strong>Profit</strong> </p>
    
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-4">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                            <?php
                                $loan_list = DB::table('loan')->where('status', '1')->get();
                                $loan_count = $loan_list->count();
                               
                            ?>
                                                
                                <span>{{$loan_count}}</span>

                            <?php
                            ?>
                            </h4>
                            <p class="text-light"><strong>Count of Loans </strong></p>
    
                        </div>
    
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                   <a href="/summary" class="alert-link"> Darily Summary</a>
                </div>
                </div>
          
            <div class="row">
                <div class="col-md-4">
                    <div class="card  no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="h4 mb-0">
                                <span class="count" id="collect">00</span>
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Collect Amount</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    
                        <div class="card  no-padding ">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="fa fa-pie-chart"></i>
                                </div>
                                <div class="h4 mb-0">
                                    <span class="count" id="bankepo">00</span>
                                </div>
                                <small class="text-muted text-uppercase font-weight-bold">Diposit Amount</small>
                                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                            </div>
                        </div>
                    
                </div>
                <div class="col-md-4">
                   
                        <div class="card  no-padding ">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="fa fa-pie-chart"></i>
                                </div>
                                <div class="h4 mb-0">
                                    <span class="count" id="totamo"></span>0</span>
                                </div>
                                <small class="text-muted text-uppercase font-weight-bold">Totle Amount</small>
                                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                            </div>
                        </div>
                    
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-4">
                        <div class="card-body pb-0">
                        
                                <h4 class="mb-0">
                                    <span id="darilyloan">Rs : 0.00</span>
                                </h4>
                                <p class="text-light"><strong> Daily Loan Amount</strong></p>
                         
                            
    
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-2">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                                <span id="monthly">Rs : 00.00</span>
                            </h4>
                            <p class="text-light"><strong>Monthly Loan Amount</strong></p>
    
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-3">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                                <span id="monthlyp">Rs : 00.00</span>
                            </h4>
                            <p class="text-light"><strong> Cash Loan Amount</strong></p>
    
                        </div>
    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-3">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                                <span id="cheque">Rs : 00.00</span>
                            </h4>
                            <p class="text-light"><strong>Cheque Loan Amount</strong> </p>
    
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-5">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                                <span id="property">Rs : 00.00</span>
                            </h4>
                            <p class="text-light"><strong>Lands Loan Amount</strong> </p>
    
                        </div>
    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-2">
                        <div class="card-body pb-0">
                        
                            <h4 class="mb-0">
                                <span id="vehical">Rs : 00.00</span>
                            </h4>
                            <p class="text-light"><strong>Vehicle Loan Amount</strong> </p>
    
                        </div>
    
                    </div>
                </div>
            </div> --}}
            
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-center">
                        <div class="page-title">
                            <h1>Post Cheque </h1>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Table Head</strong>
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <div class="col-md-6">
                                <div class="card">
                                    <div class="p-0 clearfix">
                                        <i class="fa fa-cogs bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                                        
                                        <?php
                                         $monthlyp= DB::table('chequetransactions')
                                        ->where('status', 0)
                                            ->sum('chequetransactions.amount');  ?>
                                        <div class="h5 text-primary mb-0 pt-3" id="totle amount">Rs : {{$monthlyp}}.00</div>
                                      
                                        <div class="text-muted text-uppercase font-weight-bold font-xs small">Totle Cheque Amount</div>
                                    </div>
                                </div>
                               </div>
                               <div class="col-md-6">
                                <div class="card">
                                    <div class="p-0 clearfix">
                                        <i class="fa fa-cogs bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                                        <div class="h5 text-primary mb-0 pt-3" id="todayamount">00.00</div>
                                        <div class="text-muted text-uppercase font-weight-bold font-xs small">To day diposite Amount</div>
                                    </div>
                                </div>
                               </div>
                           </div>
                            <table class="table" id="tabledata">
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th scope="col">Bank Name</th>
                                        
                                        <th scope="col">Cheque Number</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="chequedata">
                                  
                                </tbody>
                            </table>

                        </div>
                    </div>
                    </div>
                    {{-- <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Table Head</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Cheque Number</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td>HNB</td>
                                            <td>10000.00</td>
                                            <td>213213</td>
                                            <th>des</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">2020-8-20</th>
                                            <td>BOC</td>
                                            <td>100000.00</td>
                                            <td>1231313</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2020-9-20</th>
                                            <td>Peopls</td>
                                            <td>750000.00</td>
                                            <td>231234</td>
                                        </tr>
                                    </tbody>
                                </table>
    
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-center">
                            <div class="page-title">
                                <h1>Route vise Daily Summary</h1>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Table Head</strong>
                            </div>
                            <div class="card-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="row form-group">
                                                            
                                    <div class="col-12 col-md-9">
                                        <select name="select" id="routcahnge" class="form-control" onchange="changeroutedata();">
                                            <option value="0">Please Select Payment Method</option>
                                            <?php
                                            $clevel_data =DB::table('collectorroute')
                                ->join('route','route.routeId','=','collectorroute.routeId')
                                ->get();
                                        
                                            foreach ($clevel_data as  $rname) {?>

                                            <option value="{{$rname->routeId}}">{{$rname->routename}}
                                            </option>



                                            <?php
                                            }?>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                               <div class="card" style="-webkit-border-radius: 15px 15px 15px 15px;">
                                <div class="twt-feed blue-bg" style="-webkit-border-radius: 15px 15px 15px 15px;">
                                    
            
                                    <div class="media">
                                        
                                        <div class="media-body">
                                            <h2 class="text-white display-6" id="cname">Collector Name</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="weather-category twt-category">
                                    <ul>
                                        <li class="active">
                                            <h3 style="color: steelblue" id="target">00.00</h3>
                                            <h5 style="color: black">Target</h5> 
                                        </li>
                                        <li>
                                            <h3 style="color: seagreen" id="payed">00.00</h3>
                                            <h5 style="color: black">Collected</h5> 
                                             
                                        </li>
                                        <li>
                                            <h3 style="color: red" id="arres">00.00</h3>
                                            <h5 style="color: black">Arrears</h5> 
                                             
                                        </li>
                                    </ul>
                                </div>
                       
                            </div>
    
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-2"></div>
                </div>
                
                
                <div class="row">
                    
                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-stats-up text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Today Route {Custome Name} Summery</div>
                                            <div class="stat-text">Total: $76,58,714</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-stats-up text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Today Route {Custome Name} Summery</div>
                                            <div class="stat-text">Total: $76,58,714</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-stats-up text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Today Route {Custome Name} Summery</div>
                                            <div class="stat-text">Total: $76,58,714</div>
                                        </div>
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
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    <script>
        $(document).ready(function () {
           document.getElementById("dashboardsm").setAttribute("class", "active");
         });


         function Load_Loanamount(){
           
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/showloanData",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                      
                        },


                        success:function(data){
                            console.log(data);
                           
                            var darilyloan;
                            var darilyloancollect;
                            var monthlyloan;
                            var monthlyptypr;
                            var property;
                            var vehical;
                            var cheque;
                            var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){

                                darilyloan = data[i].darily;
                                darilyloancollect = data[i].darilycollect;
                                monthlyloan = data[i].monthly;
                                monthlyptypr = data[i].monthlyp;
                                property = data[i].proper;
                                vehical = data[i].vehi;
                                cheque = data[i].cheque;
                         
                                }
                                document.getElementById("darilyloan").innerHTML = "Rs : "+darilyloan;
                                document.getElementById("monthly").innerHTML = "Rs : "+monthlyloan;
                                document.getElementById("monthlyp").innerHTML = "Rs : "+monthlyptypr;
                                document.getElementById("property").innerHTML = "Rs : "+property;
                                document.getElementById("vehical").innerHTML = "Rs : "+vehical;
                                document.getElementById("cheque").innerHTML = "Rs : "+cheque;
                                // document.getElementById("darilyloancloct").innerHTML = "Rs : "+darilyloancollect;
                        
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
         }

         function loadCheque(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/showchequeData",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                      
                        },


                        success:function(data){
                           
                            
                            var amount;
                            var bankname;
                            var accno;
                            var chequeno;
                            var des;
                            var Content;
                           
                            var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){

                                amount = data[i].amount;
                                bankname = data[i].bankname;
                                accno = data[i].accno;
                                chequeno = data[i].checkNo;
                                des = data[i].des;
                                Content=" <tr><td>"+accno+" ("+bankname+") "+"</td><td>"+chequeno+"</td><td>"+des+"</td><td>"+amount+"</td> </tr>";

                                $("#chequedata").append(Content);
                               
                                }
                               
                                sumData();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
         }

         function sumData(){
            var table = document.getElementById("tabledata"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[1].innerHTML);
            }
            
           
            document.getElementById("todayamount").innerHTML ="Rs : "+sumVal+".00";
           
        }

        function changeroutedata(){
            var rid = document.getElementById('routcahnge').value;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/showcollectordata",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                      routid: rid,
                      
                        },


                        success:function(data){
                           

                            if (data.status==2) {
                                const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Route Has Not a Collector....!'
        });
                            }else{

                           
                            var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){

                                targetamo = data[i].totamount;
                                payedamo = data[i].totpaidamount;
                                collectorname = data[i].collecname;
                                balance = targetamo-payedamo;
                                document.getElementById("target").innerHTML = "Rs : "+targetamo;
                                document.getElementById("payed").innerHTML = "Rs : "+payedamo;
                                document.getElementById("arres").innerHTML = "Rs : "+balance;
                                document.getElementById("cname").innerHTML =collectorname;
                         }
                        }
                           
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
        }


        function notification(){

            var noti = document.getElementById("navcount");

            noti.innerHTML = "2";

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/loadnotification",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        
                        },


                        success:function(data){
                           
                            
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });

        }


                    function darilysummry(){
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/darilysummery",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                     
                      
                        },


                        success:function(data){
                            console.log(data);
                            var paidamo;
                               var date;
                               var chamo;
                               var totamount;  
                            var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){

                                paidamo = data[i].totpaidamount;
                                date = data[i].today;
                               chamo = data[i].depoamount;
                               totamount = data[i].fullamo;
                              
                                document.getElementById("collect").innerHTML = "Rs : "+paidamo;
                                document.getElementById("bankepo").innerHTML = "Rs : "+chamo;
                                document.getElementById("totamo").innerHTML = "Rs : "+totamount;
                                document.getElementById("todaydate").innerHTML =date;
                         }
                            // collect
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
                    }
    </script>


</body>

</html>