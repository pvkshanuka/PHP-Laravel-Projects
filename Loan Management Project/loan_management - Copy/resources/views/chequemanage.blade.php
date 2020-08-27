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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body onload="load_cheque();">


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
                            <li class="active">Cheque Diary Manage</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">
                <div class="animated fadeIn">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Add New Cheque Details</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleFormControlInput1">Cheque Numer</label>
                                                            <input type="text" id="chenumber" name="name"
                                                                class="form-control" placeholder="Cheque Number">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">

                                                        <div class="form-group col-md-4">
                                                            <label>Date</label>
                                                            <input type="date" id="date" name="nic" class="form-control"
                                                                placeholder="Date">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Account</label>
                                                            <select name="customerlevel" name="cusrank" id="account"
                                                                class="form-control">
                                                                <option value="0">Please select account</option>

                                                                <?php
                                                $clevel_data = DB::table('bankaccount')->where('status',1)->get();
                                                foreach ($clevel_data as  $rname) {?>
                                                                <option value="{{$rname->accountId}}">
                                                                    {{$rname->accNumber}} ({{$rname->accName}})</option>
                                                                <?php
                                             }
                                                ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Amount</label>
                                                            <input type="text" id="amount" name="nic"
                                                                class="form-control" placeholder="Check Amount">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label>Description</label>
                                                            <input type="text" id="description" name="email"
                                                                class="form-control" placeholder="Description">
                                                        </div>

                                                        <div class="form-group col-md-4">

                                                        </div>



                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <button id="payment-button" type="submit"
                                                                class="btn btn-sm btn-info btn-block"
                                                                onclick="AddCheque();">
                                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                                <span id="payment-button-amount">Add</span>
                                                            </button>
                                                        </div>

                                                    </div>




                                                </div>

                                            </div>
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
                                <strong class="card-title">View Cheque Details</strong>
                            </div>
                            <div class="card-body">


                                <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                <label>Show <select id="paidstatus"
                                                        name="bootstrap-data-table-export_length"
                                                        aria-controls="bootstrap-data-table-export"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="3">Please select Payment Type</option>
                                                        <option value="0">Paid Cheque</option>
                                                        <option value="1">Pending Cheque</option>
                                                        <option value="2">Return Cheque</option>
                                                    </select> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                <label>Select First Date : <input type="date" id="firstdate"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                                <label>Select Last Date : <input type="date" id="lastdate"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-12 col-md-4">
                                            <div class=" pull-right">
                                                <label>Search:<input type="search" class="form-control form-control-sm"
                                                        placeholder="search"
                                                        aria-controls="bootstrap-data-table-export"><small
                                                        class="help-block form-text">(name / nic / Mobile / Reg.
                                                        num)</small></label>
                                            </div>
                                        </div> --}}

                                    </div>
                                    <div class=" row">
                                        <div class="col-md-4">
                                            {{-- <label>Check Payment type</label>
                                            <select name="customerlevel" name="cusrank" id="paidstatus"
                                                class="form-control">
                                                <option value="0">Please select Payment Type</option>
                                                <option value="1">Paid Cheque</option>
                                                <option value="2">Pending Cheque</option>

                                            </select> --}}
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-2">
                                            <button style="width: 125px;" onclick="searchdata();" type="button"
                                                class="btn btn-info btn-default ">
                                                <i class="fa fa-search"></i>&nbsp;Search</button>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped table-bordered dataTable no-footer"
                                                role="grid" aria-describedby="bootstrap-data-table-export_info"
                                                id="table">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1" aria-sort="ascending"
                                                            aria-label="NIC: activate to sort column descending"
                                                            style="width: 209px;">
                                                            Bank Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Register Number: activate to sort column ascending">
                                                            Bank Account</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Register Number: activate to sort column ascending">
                                                            Date</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Register Number: activate to sort column ascending">
                                                            Description</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Name: activate to sort column ascending">
                                                            Amount</th>

                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Name: activate to sort column ascending">
                                                            Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="cheque">
                                                    {{-- <tr role="row" class="odd">
                                                        <td class="sorting_1">Sampath</td>
                                                        <td class="sorting_1">564512</td>
                                                        <td>2020-07-12 </td>
                                                        <td>100000.0 </td>
                                                        <td><span style="color: rgb(192, 50, 40)">SSSSSSS</span><button type="button" class="btn btn-warning btn-sm">Warning</button></td>
                                                        <td> <button style="width: 75px;" type="button"
                                                                class="btn btn-success btn-sm">Paid</button></td>

                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">Sampath</td>
                                                        <td class="sorting_1">564512</td>
                                                        <td>2020-07-12 </td>
                                                        <td>100000.0 </td>
                                                        <td><input type="checkbox"> </td>
                                                        <td> <button style="width: 75px;" type="button" onclick="Paystatus();"
                                                                class="btn btn-danger btn-sm">Pending</button></td>

                                                    </tr> --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h3 style="color: blue">Totle Amount</h3>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-3">
                                            <h3 style="color: brown" id="sumcount"></h3>
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
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="0"
                                                            tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="1"
                                                            tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="2"
                                                            tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="3"
                                                            tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="4"
                                                            tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="5"
                                                            tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="6"
                                                            tabindex="0" class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next"
                                                        id="bootstrap-data-table-export_next"><a href="#"
                                                            aria-controls="bootstrap-data-table-export" data-dt-idx="7"
                                                            tabindex="0" class="page-link">Next</a></li>
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


         function AddCheque(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var che_num = document.getElementById('chenumber').value;
            var date = document.getElementById('date').value;
            var acc_num = document.getElementById('account').value;
            var des = document.getElementById('description').value;
            var amo = document.getElementById('amount').value;

           

                if (che_num!="" && date !="" && des!=""&&amo!="") {

                    if (acc_num!=0) {
                        $.ajax({
                        url: "/addnewcheck",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        check_number: che_num,
                        check_date: date,
                        paid_account: acc_num,
                        amount: amo,
                        check_des: des},


                        success:function(data){
                            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'save Cheque...!'
        });
                            load_cheque();
                        $("#chenumber").val('');
                $("#date").val('');
                $("#account").val('');
                $("#description").val('');

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
            title: 'Please select Account...!'
        });
                    }
                    
                }else{
                    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Fill All Details'
        });
                }

            

         }


         function load_cheque(){
            $("#cheque").empty();
          
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/load_cheque",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        },


                        success:function(data){
                            // alert(data);
                            // console.log(data);
                            var lenght = Object.keys(data).length;
                            var content =0;
                            var content1 = "";
                            for(var i=0;i<lenght;i++){
                                    content1+=data[i].amount;
                                // console.log(data[i].bname);
                                // console.log(data[i].accnum);

                                var ismarked = data[i].marked;
                                var ispayed = data[i].status;

                                if (ispayed==0) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+ data[i].amount +"</td><td><span class='badge badge-warning'>Diposit</span></td> </tr>";
                                    $("#cheque").append(content);
                                }else if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+ data[i].amount+"</td><td> <button style='width: 75px;' type='button'  class='btn btn-info btn-sm' onclick='Paystatus("+data[i].tid+");'>Paid</button></td> </tr>";
                                    $("#cheque").append(content);
                                }
                                // else if (ispayed==2) {
                                //     content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+ data[i].amount +"</td><td><span class='badge badge-danger'>Returned</span></td> </tr>";
                                //     $("#cheque").append(content);
                                // }
                               
                                // if(ismarked==1){

                                //         if (ispayed==1) {
                                //             content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+data[i].amount+"</td><td> <button style='width: 75px;' type='button'  class='btn btn-success btn-sm' onclick='Paystatus("+data[i].tid+");'>Paid</button></td> </tr>";
                                //     $("#cheque").append(content);
                                    
                                           
                                //         }else if(ispayed==0){
                                //             content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+data[i].amount+"</td><td><span class='badge badge-success'>Diposit</span></td></tr>";
                                //     $("#cheque").append(content);
                                    
                                   
                                //         }
                                   
                                // }else if(ismarked==0){

                                //         if (ispayed==1) {
                                //             content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+data[i].amount+"</td><td></td> </td><td> <button style='width: 75px;' type='button'  class='btn btn-success btn-sm' onclick='Paystatus("+data[i].tid+");'>Paid</button></td> </tr>";
                                //     $("#cheque").append(content);
                                   
                                //         }else if(ispayed==0){
                                //             content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+data[i].amount+"</td><td></td><td><span class='badge badge-danger'>Diposit</span></td> </tr>";
                                //     $("#cheque").append(content);
                                   
                                //         }
                                   
                                // }

                             
                            }

                            sumData();
                           
                            
                      
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
                   
         }

         function Paystatus(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/checked_dipositeData",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            c_id: id
                    
                        },


                        success:function(data){
                            
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
                            // document.getElementById("cheque").innerHTML = data;
                            load_cheque();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
         }
         function searchdata(){
            $("#cheque").empty();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var first = document.getElementById('firstdate').value;
            var last = document.getElementById('lastdate').value;
            var paidstatus = document.getElementById('paidstatus').value;
            $.ajax({
                        url: "/Advance_searchData",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            f_date: first,
                            l_date: last,
                            paid:paidstatus
                        },


                        success:function(data){
                            // alert(data);
                            console.log(data);
                            var lenght = Object.keys(data).length;
                            var content = "";
                            for(var i=0;i<lenght;i++){

                                console.log(data[i].bname);
                                console.log(data[i].accnum);

                                var ismarked = data[i].marked;
                                var ispayed = data[i].status;
                                if (ispayed==0) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+data[i].amount+"</td><td><span class='badge badge-warning'>Diposit</span></td> </tr>";
                                    $("#cheque").append(content);
                                }else if (ispayed==1) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+data[i].amount+"</td><td> <button style='width: 75px;' type='button'  class='btn btn-success btn-sm' onclick='Paystatus("+data[i].tid+");'>Paid</button></td> </tr>";
                                    $("#cheque").append(content);
                                }else if (ispayed==2) {
                                    content="<tr role='row' class='odd'><td class='sorting_1'>"+data[i].bname+"</td><td class='sorting_1'>"+data[i].accnum+"</td><td>"+data[i].redate+"</td><td>"+data[i].des+"</td><td>"+ data[i].amount +"</td><td><span class='badge badge-danger'>Returned</span></td> </tr>";
                                    $("#cheque").append(content);
                                }


                            }
                            sumData();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
         }

        function checked_cheque(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/checked_cheque_data",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            c_id: id
                    
                        },


                        success:function(data){
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
                            load_cheque();
                        },

                        error: function(data) {
                            console.log(data);
                        }
                    });
        }
                function returnstatus(id){  
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                        url: "/return_cheque_data",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            c_id: id
                    
                        },


                        success:function(data){
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
                            load_cheque();
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