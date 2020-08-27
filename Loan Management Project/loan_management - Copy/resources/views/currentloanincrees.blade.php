<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Daily Loan Create</title>
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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body onload="showloantype();">


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
                            <li class="active">Daily Loan Create</li>
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
                                <strong class="card-title">Loan Create Sheet</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card">

                                                    <div class="card-body card-block">
                                                        {{-- <div class="row form-group">
                                                        <div class="col-12 col-md-12">
                                                            <select name="select" id="selectid" class="form-control">
                                                                <option value="0">Please Select Shedulle Loan Type</option>
                                                                <option value="1">Loan reshedulle plan</option>
                                                                <option value="2">Current Loan upto plan</option>
                                                               
                                                            </select>
                                                        </div>
                                                        </div> --}}


                                                            <div class="row form-group">
                                                                <div class="col col-md-12">
                                                                    <div class="input-group">
                                                                        <input type="text" id="cid"
                                                                            placeholder="Search Loan ID"
                                                                            class="form-control">
                                                                        <div class="input-group-btn"><button
                                                                                class="btn btn-primary" id="searchbtn" onclick="searchloan();">Search</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                    

                                                            <!-- Daily Loan  Details Start...................................... -->
                                                            <div id="darily">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1"> Arrears Loan
                                                                    Amount</label>
                                                                <input id="arrloanamount" type="text"
                                                                    class="form-control" disabled value="0" style="color: red">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input id="newloanamount" type="text"
                                                                            class="form-control" placeholder="New Loan Amount">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input id="newamount" type="text"
                                                                    class="form-control" disabled value="0" style="color: green">
                                                                </div>
                                                               
                                                                <div class="col-md-6">
                                                                    <button  type="submit" onclick="recalculate();"
                                                                    class="btn btn-lg btn-success btn-block">
                                                                    <i class="fa  fa-gear (alias) fa-lg"></i>&nbsp;
                                                                    <span id="payment-button-amount">Calclulate</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment"
                                                                    class="control-label mb-1">Payment Daily
                                                                    Amount</label>
                                                                <input id="dailyamount"  type="text"
                                                                    class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Loan
                                                                    Installment Count</label>
                                                                <input id="count"  type="text"
                                                                    class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            
                                                            <div class="col-12 col-md-9">
                                                                <select name="select" id="selectid" class="form-control" onchange="HandleChqequ();">
                                                                    <option value="0">Please Select Payment Method</option>
                                                                    <option value="1">Cash</option>
                                                                    <option value="2">Cheque</option>
                                                                   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Daily Loan  Details End...................................... -->


                                                        <!-- Cheque Payment  Details Start...................................... -->
                                                            <div class="row" id="HIDDN1">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment" class="control-label mb-1">
                                                                           Cheque Number</label>
                                                                        <input id="chquenum" name="cc-payment" type="number"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false" placeholder="Cheque Number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment" class="control-label mb-1">
                                                                            Select Account</label>
                                                                        <select name="select" id="accNo" class="form-control" onchange="HandleChqequ();">
                                                                        <?php
                                                        $clevel_data = DB::table('bankaccount')->where('status',1)->get();
                                                        foreach ($clevel_data as  $rname) {?>
                                                        
                                                            <option value="{{$rname->accountId}}">{{$rname->accNumber}}</option>
                                                    
                                                       
                                                         
                                                     <?php
                                                        }?>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                     
                                                            <div class="row" id="HIDDN2">
                                                                <div class="col-md-3">
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment" class="control-label mb-1">
                                                                           check Date</label>
                                                                        <input id="cheqedate" name="cc-payment" type="date"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    
                                                                </div>
                                                            </div>
                                                            <!-- Cheque Payment  Details End...................................... -->
                                                            
                                                            <div id="viewbtn">
                                                            

                                                                <button onclick="viewPlan();" id="payment-button" type="submit"
                                                                class="btn btn-lg btn-info btn-block">
                                                                <i class="fa fa-eye fa-lg"></i>&nbsp;
                                                                <span id="payment-button-amount">View Plan</span>
                    
                                                            </button>
                                                            </div>
                                                       
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <aside class="profile-nav alt">
                                                    <section class="card" id="loaddetais">
                                                        
                        
                        
                                                        {{-- <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <a href="#"> <i class="fa  fa-money"></i> Full Loan Amount <span class="badge badge-primary pull-right" id="fullamo">00.00</span></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <a href="#"> <i class="fa fa-money"></i> Payment Amount <span class="badge badge-success pull-right" id="payamo">00.00</span></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <a href="#"> <i class="fa fa-money"></i> Due Amount <span class="badge badge-danger pull-right" id="balace">00.00</span></a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <button id="payment-button" type="submit"
                                                                class="btn btn-lg btn-info btn-block">
                                                                <i class="fa fa-edit fa-lg"></i>&nbsp;
                                                                <span id="payment-button-amount">Transfer New Loan</span>
                    
                                                            </button>
                                                            </li>
                                                        
                                                        </ul> --}}
                        
                                                    </section>
                                                </aside>


                                                <aside class="profile-nav alt">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img id="cusimg" class="align-self-center rounded-circle mr-3"
                                                                        style="width:85px; height:85px;" alt=""
                                                                        src="images/admin.jpg">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h2 class="text-light display-6" id="cname"></h2>
                                                                    <p id="cnic"></p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <a href="#" id="cmobile"> <i class="fa fa-phone"></i> </a>
                                                            </li>
                                                        </ul>

                                                    </section>
                                                </aside>

                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">
                                                       Loan Satisfy Comment</label>
                                                    <input id="commentloan" name="cc-payment" type="text"
                                                        class="form-control" placeholder="comments..">
                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row" id="viewplan">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Payment Plan</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="dataTables_length"
                                                        id="bootstrap-data-table-export_length">
                                                        <label>Show <select name="bootstrap-data-table-export_length"
                                                                aria-controls="bootstrap-data-table-export"
                                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="-1">All</option>
                                                            </select> </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="plantable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                            
                                                                <th>Payment Date</th>
                                                                <th>Payment Amount</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="loanPlan">
                                                     

                                                       
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="bootstrap-data-table-export_info"
                                                        role="status" aria-live="polite">Showing
                                                        1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers pull-right">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="bootstrap-data-table-export_previous"><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="0" tabindex="0"
                                                                    class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                                            </li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                                            </li>
                                                            <li class="paginate_button page-item next"
                                                                id="bootstrap-data-table-export_next"><a href="#"
                                                                    aria-controls="bootstrap-data-table-export"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div>
                                        <button onclick="Createloan();" id="payment-button" type="submit"
                                            class="btn btn-lg btn-success btn-block">
                                            <i class="fa fa-edit fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Create Loan</span>

                                        </button>
                                       
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div> <!-- .card -->

                    </div>
                </div>



            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <div class="modal fade" id="userDetails" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Customer Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cc-payment"
                            class="control-label mb-1">Loan Payment Feedback</label>
                        <input type="text"
                            class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
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

            var customerid; 
            var dateplan;
            var endDate;
            var monthlyplan;
            var monthlyendDate;
            var loan_id;

        $(document).ready(function () {
               document.getElementById("loanmngsb").setAttribute("class", "menu-item-has-children dropdown active");
             });

              
                    function recalculate(){
                       
        
                      
                        var arramount = document.getElementById('arrloanamount').value;
                        var nloanamo = document.getElementById('newloanamount').value;
                       

                            var amo = nloanamo-arramount;
                          

                        document.getElementById('newamount').value=amo;

                    }
                    function closeloan(id){
                        loan_id = id;
                         var x = document.getElementById("tranfer");
                       x.style.display = "none";
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var arramount = document.getElementById('arrloanamount').value;
                        // var arramount = document.getElementById('closebtn').value;
                        $.ajax({
                        url: "/showarrearsamount",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        loanid: id,
                        amount: arramount
                        },


                        success:function(data){
                            
                            console.log(data);
                            document.getElementById('arrloanamount').value=data;
            
                        
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
                    
                    }

             function chequePayCal(){
                 var Camount = document.getElementById("Camount").value;
                 var Cinterest = document.getElementById("Cinterest").value;
                 var x=Camount*Cinterest/100;
                 var y=Camount-x;

                 
                 document.getElementById("Cprofit").value = x;
              document.getElementById("Ctotamount").value = y;
 
             }



             function HandleChqequ(){
                 var name = document.getElementById("selectid").value;
                 var x = document.getElementById("HIDDN1");
                 var y = document.getElementById("HIDDN2");
                 if(name==1){
               
                    x.style.display = "none";
                    y.style.display = "none";
                    
                 }else if(name ==2){
                    x.style.display = "block";
                    y.style.display = "block";
                 }
 
             }


             function showloantype(){
               
                var x = document.getElementById("HIDDN1");
                 var y = document.getElementById("HIDDN2");
                
                    x.style.display = "none";
                    y.style.display = "none";
                    

             }

               function searchloan(){
                $("#loaddetais").empty();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var cusid = document.getElementById("cid").value;

                if(cusid!=''){


                    
               
                $.ajax({
                        url: "/viewOldLoan",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        cusid: cusid},


                        success:function(data){

                           var lenght = Object.keys(data).length;
                           
                            console.log(data);
                            var name;
                            var mobile;
                            var nic;
                            var img;
                            var totamount;
                            var payamount;
                            var balance;
                            var loanId;
                            var contet;
                            var enddate;
                        for(var i=0;i<lenght;i++){

                             name = data[i].name;
                             mobile = data[i].mobile;
                             customerid = data[i].id;
                             img = data[i].img;
                             nic = data[i].nic;
                             totamount = data[i].fullamount;
                             payamount = data[i].payamount;
                             balance = data[i].balance;
                             loanId = data[i].loanid;
                             enddate = data[i].enddate;
                        }


                          document.getElementById("cname").innerHTML = name;
                          document.getElementById("cnic").innerHTML = nic;
                          document.getElementById("cmobile").innerHTML = mobile;
                          document.getElementById("cusimg").src = img;
                         

                           contet = "<ul class='list-group list-group-flush'><li class='list-group-item'><a href='#'> <i class='fa  fa-money'></i> Full Loan Amount <span class='badge badge-primary pull-right'>"+totamount+"</span></a> </li> <li class='list-group-item'><a href='#'> <i class='fa fa-money'></i> Payment Amount <span class='badge badge-success pull-right'>"+payamount+"</span></a></li><li class='list-group-item'> <a href='#'> <i class='fa fa-money'></i> Due Amount <span class='badge badge-danger pull-right' >"+balance+"</span></a> </li><li class='list-group-item'> <a href='#'> <i class='fa fa-calendar'></i> Loan End Date <span class='badge badge-warning pull-right' >"+enddate+"</span></a> </li> <li class='list-group-item'><button id='tranfer' onclick='closeloan("+loanId+")' type='submit' class='btn btn-lg btn-info btn-block'> <i class='fa fa-edit fa-lg'></i>&nbsp;<span id='payment-button-amount'>Transfer New Loan</span> </button></li></ul>"
                          $("#loaddetais").append(contet);
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });

                }else{

                     const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'warning',
                            title: 'Please Enter Customer Number or NIC...!'
                        });


                }

                

             }

            

             function viewPlan(){
                $("#loanPlan").empty();
                // alert("okkk");
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                // var name = document.getElementById("loantypeid");
              
                // var plantype = name.options[name.selectedIndex].value;

                var amount = document.getElementById("dailyamount").value;
                var count = document.getElementById("count").value;

        

                    if(amount!="" && count!=""){

                    $.ajax({
                        url: "/recreateloanplan",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        dailyamount: amount,
                        count: count
                        },


                        success:function(data){

                            dateplan = data;
                          console.log(Object.keys(data).length);

                        console.log(data);
                          var lenght = Object.keys(data).length;
                          var tabledata ;

                          for(var i=0;lenght>i;i++){

                            console.log("date"+i+"   "+data[i]);
                            endDate = data[i];

                            tabledata = "<tr><td>"+data[i]+"</td><td>"+amount+"</td></tr>";
                            $("#loanPlan").append(tabledata);
                          }

                          

                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
    

                    }

                


                
             }


             function Createloan(){


          
                var arrloanamount = document.getElementById("arrloanamount").value;
                var newloanamount = document.getElementById("newloanamount").value;
                var loanamount = document.getElementById("newamount").value;
                var dailyamount = document.getElementById("dailyamount").value;
                var installmentcount = document.getElementById("count").value;
                var comment = document.getElementById("commentloan").value;
                var pmethod = document.getElementById("selectid").value;
                var cheqedate = document.getElementById("cheqedate").value;
                var accNo = document.getElementById("accNo").value;
                var chquenum = document.getElementById("chquenum").value;


                 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                             if(dateplan == null){
                                                
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'warning',
                                    title: 'Please Create Loan Plan...!'
                                });

                                }else{
                                

                                if (pmethod==0) {
                                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'warning',
                                    title: 'Please Select Payment Type...!'
                                }); 
                                } else {
                                    if (loanamount!="" && dailyamount!="" && comment!="") {
                                    
                                    $.ajax({ 
                                       url: "/newcreateloan_reassing",
                                       type:"POST",
                                       data: {_token: CSRF_TOKEN,
                                           cid:customerid,
                                           newamount:newloanamount,
                                           lid:loan_id,
                                           end:endDate,
                                           amount:loanamount,
                                           dailyamount:dailyamount,
                                           plan:dateplan,
                                           date:cheqedate,
                                           accid:accNo,
                                           chequeno:chquenum,
                                           lcomment:comment,
                                           realamount:arrloanamount,
                                           count:installmentcount,
                                           pmethod:pmethod
                                       },
                                   
                                   
                                       success:function(data){
                                  
                                       // console.log(Object.keys(data).length);
                                       
                                       console.log(data);
                             
                                           const Toast = Swal.mixin({
                                       toast: true,
                                       position: 'top-end',
                                       showConfirmButton: false,
                                       timer: 3000
                                       });
                                       Toast.fire({
                                       type: 'success',
                                       title: 'Loan Created Successfully!'
                                       });
                                      
                                      
                                   
                                       },
                                   
                                       error: function(data) {
                                           console.log(data);
                                       }
                                   });
                               
                               
                                  
                               
                               
                               }else{
                               const Toast = Swal.mixin({
                                   toast: true,
                                   position: 'top-end',
                                   showConfirmButton: false,
                                   timer: 3000
                               });
                               Toast.fire({
                               type: 'warning',
                               title: 'Fill All Details...!'
                               });
                           }  
                                }
                                    
                                



                                }

             }
    </script>

</body>

</html>