<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Add New Interest</title>
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
                        <h1>Setting</h1>
                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Holidays </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Holiday Name</label>
                                            <input id="holiday" name="cc-payment" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Account Number</label>
                                            <input id="holidate" name="cc-payment" type="date" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" onclick="addHoliday();"
                                                class="btn btn-sm btn-info btn-block">
                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                <span id="payment-button-amount">Add</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="card">

                                <div class="card-header">
                                    <strong class="card-title">View Accounts Details</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id="holidaydata">
                                            <?php
                                                $clevel_data = DB::table('holidays')->where('status',1)->get();
                                                foreach ($clevel_data as  $rname) {?>
                                            <tr role="row" class="odd">

                                                <td scope="row">{{$rname->datec}}</td>
                                                <td style="color: rgb(71, 19, 139)">{{$rname->name}}</td>
                                                <td><button type="button" class="btn btn-outline-danger btn-sm"
                                                        onclick="deletHolidays({{$rname->idholidayId}})">Delete</button>
                                                </td>
                                            </tr>

                                            <?php
                                                }?>


                                            {{-- <tr role="row" class="odd"> 

                                                <td scope="row">name</td> 
                                                <td style="color: rgb(71, 19, 139)">aaa</td>
                                                <td><button type="button" class="btn btn-outline-danger btn-sm"
                                                        >Delete</button>
                                                </td> 
                                            </tr> --}}

                                           



                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Account </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Bank Name</label>
                                            <input id="bankname" name="cc-payment" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Account Number</label>
                                            <input id="accnum" name="cc-payment" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" onclick="addAccount();"
                                                class="btn btn-sm btn-info btn-block">
                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                <span id="payment-button-amount">Add</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="card">

                                <div class="card-header">
                                    <strong class="card-title">View Accounts Details</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Bank Name</th>
                                                <th scope="col">Account Number</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $clevel_data = DB::table('bankaccount')->where('status',1)->get();
                                                foreach ($clevel_data as  $rname) {?>
                                            <tr role="row" class="odd">

                                                <td scope="row">{{$rname->accName}}</td>
                                                <td style="color: rgb(71, 19, 139)">{{$rname->accNumber}}</td>
                                                <td><button type="button" class="btn btn-outline-danger btn-sm"
                                                        onclick="deletAccount({{$rname->accountId}})">Delete</button>
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Loan type </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Loan Type</label>
                                            <input id="loantype" name="cc-payment" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" disabled>
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" onclick="addLontype();" disabled
                                                class="btn btn-sm btn-info btn-block">
                                                <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                <span id="payment-button-amount">Add</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="card">

                                <div class="card-header">
                                    <strong class="card-title">View Loan Type</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Loan ID</th>
                                                <th scope="col">Value</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $clevel_data = DB::table('loantype')->where('status',1)->get();
                                        foreach ($clevel_data as  $rname) {?>
                                            <tr role="row" class="odd">

                                                <th scope="row">{{$rname->loanTypeId}}</span>
                                                <td style="color: rgb(241, 117, 14)">{{$rname->name}}</td>

                                            </tr>

                                            <?php
                                        }?>

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div> <!-- .card -->

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
               document.getElementById("loaninterestsb").setAttribute("class", "menu-item-has-children dropdown active");
             });
             
             function addHoliday(){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var holiday =  document.getElementById("holiday").value;
                    var holidate =  document.getElementById("holidate").value;
                    alert(holiday+"--"+holidate);
                    if (holiday!=""&&holidate!="") {
                    $.ajax({
        url: "/newholidayAdd",
        type:"POST",
        data: {_token: CSRF_TOKEN,
            name: holiday,
            hdate: holidate,
        status:1},
        success:function(response){
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Add New Route'
                });

                $("#holiday").val('');
                $("#holidate").val('');
        
        },
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
                    title: 'Please Fill All Details.......!'
                });   
                  }
                }






                function addAccount(){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var bankname =  document.getElementById("bankname").value;
                    var accnum =  document.getElementById("accnum").value;
                    if (bankname!=""&&accnum!="") {
                    $.ajax({
        url: "/newaccount",
        type:"POST",
        data: {_token: CSRF_TOKEN,
            bankname1: bankname,
            accnum1: accnum,
        status:1},
        success:function(response){
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Add New Route'
                });

                $("#bankname").val('');
                $("#accnum").val('');
        
        },
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
                    title: 'Please Fill All Details.......!'
                });   
                  }
                }






                function addLontype(){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var loantype =  document.getElementById("loantype").value;
                    if (loantype!="") {
                    $.ajax({
        url: "/newloantype",
        type:"POST",
        data: {_token: CSRF_TOKEN,
            loantype1: loantype,
        status:1},
        success:function(response){
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Add New Route'
                });

                $("#loantype").val('');
                
        
        },
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
                    title: 'Please Fill Loan Type.......!'
                });   
                  }
                }

function deletAccount(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
        url: "/deletAccount",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    
        accid:id},
        success:function(response){

        
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Delete SucsessFull.....!'
                });

        
        
        },
       });
}
function deletHolidays(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
        url: "/deletholiday",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    
        h_id:id},
        success:function(response){

        
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Delete SucsessFull.....!'
                });

        
        
        },
       });
}



function LoadHolidays(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/loadholidays",
        type:"POST",
        data: {_token: CSRF_TOKEN,
    },
        success:function(response){


// // alert(response);
// console.log(Object.keys(response).length);
//             var tabledata;
//             //console.log(response);
//             // console.log(Object.response.name);

//            var obj = $.parseJSON(response);
//             console.log(obj);


                // console.log(response);
            // tabledata = "<tr><td>"+response[0]+"</td><td>"+response[1]+"</td></tr>";
            //                 $("#holidaydata").append(tabledata);




//             var obj = JSON.parse(response);
//             var lng = Object.keys(response).length;

// for (var i = 0; i < lng; i++) {
//     var name = obj.name;
//     console.log(name);
// }

// var resultData = response.data;
// console.log(response);


// var JSONObject = JSON.parse(response);
//   console.log(JSONObject);      // Dump all data of the Object in the console
//   console.log(JSONObject["name"]);

// $.each(resultData,function(index,row){
// console.log(resultData);



// })
// var JSONObject = JSON.parse(response);
// for (var key in JSONObject) {
//     if (JSONObject.hasOwnProperty(key)) {
//       console.log(JSONObject[key]["name"] + ", " + JSONObject[key]["date"]);
//     }
//   }



        
        },
       });

}
   </script>

</body>

</html>