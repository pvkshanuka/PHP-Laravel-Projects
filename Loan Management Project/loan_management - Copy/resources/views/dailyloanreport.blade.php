<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sanju enterprises - Daily loan Reports</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

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
                            <li class="active">Daily Loan Reports</li>
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
                                <strong class="card-title">Daily loan Summary</strong>
                                
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text"><strong>Total Amount</strong></div>
                                                        <div id="tot" class="stat-digit">00.0</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <h3 style="color: green">Total Amount</h3>
                                        <h3 style="color:blue ">Payed Amount</h3>
                                        <h3 style="color:red ">Due Amount</h3> --}}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text"><strong>Payed Amount</strong></div>
                                                        <div id="pay" class="stat-digit">00.0</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            {{-- <h3 id="tot" style="color: green">0.00</h3>
                                            <h3 id="pay" style="color:blue ">0.00</h3>
                                            <h3 id="due" style="color:red ">0.00</h3> --}}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text"><strong> Due Amount</strong></div>
                                                        <div id="due" style="color: red" class="stat-digit">00.0</div>
                                                    </div>
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
        </div>
        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Daily loan Report</strong>
                                
                            </div>
                            <div class="card-body">


                                <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-2">
                                            <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                <label>Show <select name="bootstrap-data-table-export_length"
                                                        aria-controls="bootstrap-data-table-export"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="-1">All</option>
                                                    </select> entries</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            {{-- <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                <label>Order by : <select name="bootstrap-data-table-export_length"
                                                        aria-controls="bootstrap-data-table-export"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">Assending</option>
                                                        <option value="25">Descending</option>
                                                    </select> </label>
                                            </div> --}}
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                    <label>Status : <select id="status" name="bootstrap-data-table-export_length"
                                                            aria-controls="bootstrap-data-table-export"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="2">All</option>
                                                            <option value="1">Arrears</option>
                                                            <option value="0"> Complete </option>
                                                        </select> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                             {{-- <div class="col-sm-12 col-md-4">
                                            <label>Search:<input type="search" class="form-control form-control-sm"
                                                    placeholder="search"
                                                    aria-controls="bootstrap-data-table-export"><small
                                                    class="help-block form-text">(name / nic / Mobile / Reg.
                                                    num)</small></label>
                                        </div> --}}
                                            
                                        </div>
                                       
                                        <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                            <label>Routs : <select id="routeid" name="bootstrap-data-table-export_length"
                                                    aria-controls="bootstrap-data-table-export"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="0">All</option>
                                                    <?php
                                                        $clevel_data = DB::table('route')->where('status',1)->get();
                                                        foreach ($clevel_data as  $rname) {?>
                                                        
                                                            <option value="{{$rname->routeId}}">{{$rname->routename}}</option>
                                                    
                                                       
                                                         
                                                     <?php
                                                        }?>
                                                   
                                                </select> </label>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-12 col-md-4">
                                            <label>Start Date:<input type="date" id="sdate" class="form-control form-control-sm"
                                                    aria-controls="bootstrap-data-table-export"></label>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <label>End Date:<input type="date" id="edate" class="form-control form-control-sm"
                                                    aria-controls="bootstrap-data-table-export"></label>
                                            &nbsp;<button type="submit" class="btn btn-secondary btn-sm" onclick="DarilySearch();">Search</button>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <label>Print :<br> <button type="submit" id="printPage" class="btn btn-secondary btn-sm">Print
                                                    Report</button></label>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="s_data" class="table table-striped table-bordered dataTable no-footer"
                                                    role="grid" aria-describedby="bootstrap-data-table-export_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="bootstrap-data-table-export" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="NIC: activate to sort column descending"
                                                                style="width: 209px;">
                                                                NIC</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="bootstrap-data-table-export" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Register Number: activate to sort column ascending">
                                                                Reg. Number</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="bootstrap-data-table-export" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Name: activate to sort column ascending"
                                                                style="width: 349px;">
                                                                Name</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="bootstrap-data-table-export" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Office: activate to sort column ascending"
                                                                style="width: 154px;">
                                                                Payment Amount</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="bootstrap-data-table-export" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Office: activate to sort column ascending"
                                                                style="width: 154px;">
                                                                Paid Amount</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="bootstrap-data-table-export" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Salary: activate to sort column ascending"
                                                                style="width: 122px;">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablebodysearch">
                                                        {{-- <tr role="row" class="odd">
                                                            <td class="sorting_1">Thushitha</td>
                                                            <td class="sorting_1">Route A</td>
                                                            <td>Nimal</td>
                                                            <td>2000</td>
                                                            <td>2000</td>
                                                            <td> <span class="badge badge-danger">Not Paid</span>  </td>
         
                                                        </tr> --}}

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
                                                                data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                                        </li>
                                                    </ul>
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
            $(document).ready(function () {
               document.getElementById("loanreportsb").setAttribute("class", "menu-item-has-children dropdown active");
             });


             $(document).ready(function(){
        $('#printPage').click(function(){
            var data = '<input type="button" value="Print this page" onClick="window.print()">';
            // data += '<div id="div_print">';
            // data += $('#report').html();
            // data += '</div>';

            myWindow=window.open('','','width=900,height=700');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        });
    });


    function DarilySearch(){
        $("#tablebodysearch").empty();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var stats  = document.getElementById('status').value;
    var rout  = document.getElementById('routeid').value;
    var firstd  = document.getElementById('sdate').value;
    var lastd  = document.getElementById('edate').value;
    
                if (stats==2 && rout==0 && firstd!="" && lastd=="") {
                   
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose last date...!'
        });
                }else if(stats==2 && rout==0 && firstd=="" && lastd!=""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose First date...!'
        });

                }else if(stats==2 && rout>0 && firstd=="" && lastd!=""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose First date...!'
        });

                }else if(stats==2 && rout>0 && firstd!="" && lastd==""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose last date...!'
        });

                }else if(stats<2 && rout==0 && firstd!="" && lastd==""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose last date...!'
        });

                }else if(stats<2 && rout==0 && firstd=="" && lastd!=""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose First date...!'
        });

                }else if(stats<2 && rout>0 && firstd=="" && lastd!=""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose First date...!'
        });

                }else if(stats<2 && rout>0 && firstd!="" && lastd==""){
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Please Choose last date...!'
        });

                }else{

               

            if(firstd!=""&& lastd!="" && stats !=2 && rout!=0){
          
            
            $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,

                first_date: firstd,
                last_date: lastd,
                check: stats,
                route: rout,
                index:8
},
                success:function(data){
                    console.log(data);
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
 
                },
                error: function(data) {
                            console.log(data);
                        }
                });


            }else if (firstd!=""&& lastd!="" && stats ==2 && rout==0) {
               
                $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                first_date: firstd,
                last_date: lastd,
                index:1
},
                success:function(data){
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
 
                },
                error: function(data) {
                            console.log(data);
                        }
                });
            }else if (firstd==""&& lastd=="" && stats !=2 && rout==0) {
               
                $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                p_status: stats,
                index:2
},
                success:function(data){
                    console.log(data);
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
                },
                error: function(data) {
                            console.log(data);
                        }
                });
            }else if (firstd==""&& lastd=="" && stats ==2 && rout!=0) {
               
                $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                
                route: rout,
                
                index:3
},
                success:function(data){
                    console.log(data);
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
                },
                error: function(data) {
                            console.log(data);
                        }
                });
            }else if (firstd==""&& lastd=="" && stats !=2 && rout!=0) {
              
                $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                p_status: stats,
                route: rout,
              
                index:4
},
                success:function(data){
                   
  
                    console.log(data);
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
                },
                error: function(data) {
                            console.log(data);
                        }
                });
            }else if (firstd!=""&& lastd !="" && stats ==2 && rout!=0) {
               
                $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,
               
                route: rout,
                first_date: firstd,
                last_date: lastd,
                index:5
},
                success:function(data){
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
  
                    console.log(data);
                },
                error: function(data) {
                            console.log(data);
                        }
                });
            }else if (firstd!=""&& lastd !="" && stats !=2 && rout==0) {
                $.ajax({
                url: "/darlyloanAdvanceSearch",
                type:"POST",
                data: {_token: CSRF_TOKEN,
                p_status: stats,
               
                first_date: firstd,
                last_date: lastd,
                index:6
},
                success:function(data){
                    var content = "";
                    var lenght = Object.keys(data).length;
                            for(var i=0;i<lenght;i++){
                                var ispayed = data[i].status;

                                if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-danger'>Not Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }else{
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].cnic+"</td><td class='sorting_1'>"+data[i].creg+"</td><td>"+data[i].cname+"</td><td>"+data[i].amount+"</td><td>"+data[i].paidamount+"</td><td> <span class='badge badge-success'>Paid</span></td></tr>";
                                    $("#tablebodysearch").append(content);
                                }
                                sumData();
                                }
                },
                error: function(data) {
                            console.log(data);
                        }
                });
            }
        }
   

    }
    function sumData(){
            var table = document.getElementById("s_data"), sumVal = 0;
            var table1 = document.getElementById("s_data"), sumVal1 = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[3].innerHTML);
                sumVal1 = sumVal1 + parseFloat(table.rows[i].cells[4].innerHTML);
            }
            
            document.getElementById("tot").innerHTML ="Rs : "+sumVal+".00";
            document.getElementById("pay").innerHTML ="Rs : "+sumVal1+".00";
            document.getElementById("due").innerHTML ="Rs : "+(sumVal-sumVal1)+".00";
            console.log(sumVal);
        }
        </script>

</body>

</html>