<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - User Types</title>
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
                        <h1>Loan Pay</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Customer Search</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Search Customer</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="input-group">
                                            <input type="text" id="cid" name="input2-group2" placeholder="Search Customer" class="form-control">
                                            <div class="input-group-btn"><button class="btn btn-primary" id="searchbtn" onclick="serachCustomer();">Search</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->
                        {{-- setpaymet --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <strong class="card-title">Pay Loan</strong>
                                    </div>
                                    <div class="col-lg-3">
                                        <input id="lid" placeholder="Loan ID" name="totale_payble_amount" type="text" class="form-control" aria-required="true" aria-invalid="false" disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="loanDetailsDiv" style="display: none">
                                <!-- Credit Card -->
                                <div>
                                    <div class="card-body">


                                        <table align="center" width="100%">
                                            <tr>
                                                <td><b>Loan ID</b>: <span id="ldlid"></span></td>
                                                <td><b>Custom ID:</b> <span id="ldclid"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Amount:</b> <span id="ldamount"></span></td>
                                                <td><b>Paid Amount:</b> <span id="ldpamount"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Rate:</b> <span id="ldrate"></span></td>
                                                <td><b>Target Income:</b> <span id="ldtincome"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Taken Date:</b> <span id="ldtdate"></span></td>
                                                <td><b>End Date:</b> <span id="ldedate"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Loan Type:</b> <span id="ldltype"></span></td>
                                                <td><b>Status:</b> <span id="ldstatus"></span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Comment:</b> <span id="ldcmnt"></span></td>
                                            </tr>
                                        </table>

                                        <br>

                                        <div id="monthPPay">

                                            <label><b>Interest Payments</b></label>

                                            <table id="monthPPayInterestDetailstbl" class="table table-striped table-bordered dataTable no-footer monthPPayInterestDetailstbl" role="grid" aria-describedby="bootstrap-data-table-export_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Interest ID">
                                                            ID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Interest amount to be paid">
                                                            Amount</th>
                                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Interest paid amount">
                                                            Paid Amount</th>
                                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Date to be paid">
                                                            Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="monthPPayInterestDetails">

                                                    <tr style="cursor: pointer;" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                        <td>1</td>
                                                        <td>1000</td>
                                                        <td>200</td>
                                                        <td>2020/07/15</td>
                                                    </tr>
                                                    <tr style="cursor: pointer;" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                                        <td>2</td>
                                                        <td>1000</td>
                                                        <td>200</td>
                                                        <td>2020/07/15</td>
                                                    </tr>
                                                    <tr style="cursor: pointer;" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                                        <td>3</td>
                                                        <td>1000</td>
                                                        <td>200</td>
                                                        <td>2020/07/15</td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <div id="interestPayDetails">


                                                <div id="collapseInterest8" class="collapse hide" aria-labelledby="headingOne" data-parent="#interestPayDetails">
                                                    <table border="1px solid black" width="100%">
                                                        <thead>
                                                            <th>ID</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>EMP ID</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>02</td>
                                                                <td>300</td>
                                                                <td>2020/07/18 22:51:40</td>
                                                                <td>13</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div id="collapse2" class="collapse hide" aria-labelledby="headingOne" data-parent="#interestPayDetails">
                                                    <br>
                                                    <br>
                                                    2 Kusal Shanuka
                                                    <br>
                                                    <br>
                                                </div>
                                                <div id="collapse3" class="collapse hide" aria-labelledby="headingOne" data-parent="#interestPayDetails">
                                                    <br>
                                                    <br>
                                                    3 Kusal Shanuka
                                                    <br>
                                                    <br>
                                                </div>

                                            </div>

                                            <br>

                                            <label><b>Pay Interest</b></label>
                                            <div class="input-group">
                                                <input type="number" id="intOrInsPayAmount" placeholder="Amount" class="form-control">
                                                <div class="input-group-btn"><button class="btn btn-success" onclick="interestInterOrIstalPay();">Pay
                                                        Now</button>
                                                </div>
                                            </div>

                                            <br>

                                            <label><b>Pay Capital</b></label>
                                            <div class="input-group">
                                                <input type="number" id="capitalPayAmount" placeholder="Amount" class="form-control">
                                                <div class="input-group-btn"><button class="btn btn-success" onclick="loanCapitalPay();">Pay
                                                        Now</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- profile --}}
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img id="cusimg" class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6" id="cname">User Name</h2>
                                        <p id="cnic">NIC</p>

                                    </div>
                                </div>

                            </div>


                        </section>
                        {{-- Loans information --}}
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Customer Loan History</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Loan ID</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Taken Date</th>
                                            <th scope="col">Type</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cloans">

                                    </tbody>
                                    <tfoot id="cloansf" style="display: none;">

                                        <td><b>Loan Count</b></td>
                                        <td id="lcount"></td>
                                        <td><b>Total Loan Amount</b></td>
                                        <td colspan="2" align="center" id="tlamount"></td>

                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">User Types</strong>
                            </div>
                            <div class="card-body">


                                <div id="bootstrap-data-table-export_wrapper"
                                    class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="bootstrap-data-table-export"
                                                class="table table-striped table-bordered dataTable no-footer"
                                                role="grid" aria-describedby="bootstrap-data-table-export_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 209px;">id</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 349px;">
                                                            Name</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 154px;">
                                                            Status</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="bootstrap-data-table-export" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 122px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $clevel_data = DB::table('employeetype')->get();
                                                    foreach ($clevel_data as  $rname) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $rname->employeeTypeId }}</td>
                <td class="sorting_1">
                    <span>{{ $rname->name }}</span>

                </td>
                <td id="statusutyp{{ $rname->employeeTypeId }}">
                    @if($rname->status==0)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Dective</span>
                    @endif
                </td>
                <td id="btnutyp{{ $rname->employeeTypeId }}">
                    @if($rname->status==0)
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="Deactiveutype({{ $rname->employeeTypeId }})">Dective</button>
                    @elseif($rname->status==1)
                    <button type="button" class="btn btn-outline-success btn-sm" onclick="Activeutype({{ $rname->employeeTypeId }})">Active</button>
                    @endif

                </td>

                </tr>

            <?php
                                                    } ?>




            </tbody>
            </table>
            </div>
        </div>

    </div>

    </div>
    </div>
    </div>


    </div> --}}

    </div>


    </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}">
    </script>
    <script src="{{ asset('js/init-scripts/data-table/datatables-init.js') }}"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            document.getElementById("loanpaymng").setAttribute("class", "active");
        });
    </script>
    <script>
        var input = document.getElementById("cid");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("searchbtn").click();
            }
        });
        var input = document.getElementById("capitalPayAmount");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                loanCapitalPay();
            }
        });



        function interestInterOrIstalPay() {


            let loanId = $('#lid').val();
            let amount = $('#intOrInsPayAmount').val();

            if (loanId == undefined || loanId == "") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'error',
                    title: 'Invali LoanId!'
                });
            } else if (amount == undefined || amount == "") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'error',
                    title: 'Invali pay Amount!'
                });
            } else {
                $('#intOrInsPayAmount' + loanId).prop("disabled", true);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "/interestInterOrIstalPay",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        loanId: loanId,
                        amount: amount
                    },
                    success: function(data) {
                        // alert(JSON.stringify(data));
                        if (data == 1) {
                            Swal.fire(
                                'Loan Interest Paid',
                                'Loan Interest Payed Successfully! EMP ID manualy added to interestpay. it must take from session',
                                'success'
                            );

                            $('#intOrInsPayAmount' + loanId).prop("disabled", false);
                            $('#intOrInsPayAmount').val("");



                            selectloan(loanId);
                        }
                    },
                    error: function(data) {
                        // alert("ERROR " + JSON.stringify(data));

                        var title;

                        if (data.responseJSON.message == "" || data.responseJSON.message ==
                            undefined) {
                            title = "Loan Interest or Instalment Pay Failed!";
                        } else {
                            title = data.responseJSON.message;
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'error',
                            title: title
                        });

                        $('#intOrInsPayAmount' + loanId).prop("disabled", false);
                    }
                });

            }
            // alert(loanid + " " + amount);

        }

        function loanCapitalPay() {
            $('#capitalPayAmount' + loanId).prop("disabled", true);
            var loanId = document.getElementById("lid").value;
            var amount = document.getElementById("capitalPayAmount").value;

            var loanAmount = document.getElementById("ldamount").innerHTML;
            var paidAmount = document.getElementById("ldpamount").innerHTML;

            if (amount > 0 && amount <= (loanAmount - paidAmount)) {

                Swal.fire({
                    title: 'Are you sure?',
                    type: 'warning',
                    text: "You want to pay Rs:" + amount + " as Loan Capital!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Pay!'
                }).then((result) => {
                    if (result.value) {

                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            url: "/loanCapitalPay",
                            type: "POST",
                            data: {
                                _token: CSRF_TOKEN,
                                loanId: loanId,
                                amount: amount
                            },
                            success: function(data) {
                                console.log(data);
                                Swal.fire(
                                    'Loan Paid',
                                    'Loan Capital Payed Successfully! EMP ID manualy added to loanpay. it must take from session',
                                    'success'
                                );

                                $('#capitalPayAmount' + loanId).prop("disabled", false);
                                $('#capitalPayAmount').val("");



                                selectloan(loanId);

                            },
                            error: function(data) {
                                console.log(data);

                                var title;

                                if (data.responseJSON.message == "" || data.responseJSON.message ==
                                    undefined) {
                                    title = "Loan Capital Pay Failed!";
                                } else {
                                    console.log("INNNNNNN");
                                    console.log(data.responseJSON.message);
                                    title = data.responseJSON.message;
                                }
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: title
                                });

                                $('#capitalPayAmount' + loanId).prop("disabled", false);
                            }
                        });

                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        // )
                    }
                })

            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'error',
                    title: 'Invali Amount to Pay!'
                });
            }





        }

        function selectloan(loanId) {


            $('#loanselect' + loanId).prop("disabled", true);

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $('#monthPPay').hide();

            $.ajax({
                url: "/loadLoan",
                type: "GET",
                data: {
                    _token: CSRF_TOKEN,
                    loanId: loanId
                },
                success: function(loan) {



                    document.getElementById("lid").value = loan.loanId;
                    document.getElementById("ldlid").innerHTML = loan.loanId;
                    document.getElementById("ldclid").innerHTML = loan.custom_loanId;
                    document.getElementById("ldamount").innerHTML = loan.amount;
                    if (loan.paidAmount == undefined) {
                        document.getElementById("ldpamount").innerHTML = 0;
                    } else {
                        document.getElementById("ldpamount").innerHTML = loan.paidAmount;
                    }
                    document.getElementById("ldtdate").innerHTML = loan.takenDate;
                    document.getElementById("ldedate").innerHTML = loan.endDate;
                    document.getElementById("ldtincome").innerHTML = loan.targetIncome;
                    document.getElementById("ldrate").innerHTML = loan.rate + " %";
                    if (loan.loanTypeId == 1) {
                        document.getElementById("ldltype").innerHTML = "Daily";
                    } else if (loan.loanTypeId == 2) {
                        document.getElementById("ldltype").innerHTML = "Monthly";
                    } else if (loan.loanTypeId == 3) {

                        let tbody = document.getElementById("monthPPayInterestDetails");
                        let interestPayDetails = document.getElementById("interestPayDetails");

                        while (tbody.hasChildNodes()) {
                            tbody.removeChild(tbody.firstChild);
                        }

                        while (interestPayDetails.hasChildNodes()) {
                            interestPayDetails.removeChild(interestPayDetails.firstChild);
                        }

                        let tr;
                        let tdid;
                        let tdam;
                        let tdpam;
                        let tddate;

                        let lable;
                        let bold;
                        let div;
                        let table;
                        let thead;
                        let th0;
                        let th1;
                        let th2;
                        let th3;
                        let th4;
                        let tbodyin;
                        let td0;
                        let td1;
                        let td2;
                        let td3;
                        let td4;
                        for (i = 0; i < loan.interests.length; i++) {


                            tr = document.createElement("tr");
                            tr.setAttribute("style", "cursor: pointer;");
                            tr.setAttribute("data-toggle", "collapse");
                            tr.setAttribute("data-target", "#collapseInterest" + loan.interests[i].interestId);
                            tr.setAttribute("aria-expanded", "false");
                            tr.setAttribute("aria-controls", "collapseInterest" + loan.interests[i].interestId);

                            tdid = document.createElement("td");
                            tdid.innerHTML = loan.interests[i].interestId;
                            tdam = document.createElement("td");
                            tdam.innerHTML = loan.interests[i].amount;
                            tdpam = document.createElement("td");
                            tdpam.innerHTML = loan.interests[i].paidAmount;
                            tddate = document.createElement("td");
                            tddate.innerHTML = loan.interests[i].datec.split(" ")[0];

                            tr.appendChild(tdid);
                            tr.appendChild(tdam);
                            tr.appendChild(tdpam);
                            tr.appendChild(tddate);

                            tbody.appendChild(tr);


                            lable = document.createElement("lable");
                            bold = document.createElement("b");
                            bold.innerHTML = "Interest Pay Details"

                            div = document.createElement("div");
                            div.setAttribute("id", "collapseInterest" + loan.interests[i].interestId);
                            div.setAttribute("class", "collapse hide");
                            div.setAttribute("aria-labelledby", "headingOne");
                            div.setAttribute("data-parent", "#interestPayDetails");

                            div.appendChild(lable);

                            lable.appendChild(bold);

                            if (loan.interests[i].interestpay.length > 0) {

                                for (z = 0; z < loan.interests[i].interestpay.length; z++) {
                                    // alert(loan.interests[i].interestpay.length);



                                    table = document.createElement("table");
                                    table.setAttribute("border", "1px solid black");
                                    table.setAttribute("width", "100%");

                                    thead = document.createElement("thead");

                                    th0 = document.createElement("th");
                                    th0.innerHTML = "Interest ID";
                                    th1 = document.createElement("th");
                                    th1.innerHTML = "ID";
                                    th2 = document.createElement("th");
                                    th2.innerHTML = "Amount";
                                    th3 = document.createElement("th");
                                    th3.innerHTML = "Date";
                                    th4 = document.createElement("th");
                                    th4.innerHTML = "EMP ID";

                                    tbodyin = document.createElement("tbody");

                                    td0 = document.createElement("td");
                                    td0.innerHTML = loan.interests[i].interestpay[z].interestId;
                                    td1 = document.createElement("td");
                                    td1.innerHTML = loan.interests[i].interestpay[z].interestPayId;
                                    td2 = document.createElement("td");
                                    td2.innerHTML = loan.interests[i].interestpay[z].paidAmount;
                                    td3 = document.createElement("td");
                                    td3.innerHTML = loan.interests[i].interestpay[z].datec;
                                    td4 = document.createElement("td");
                                    td4.innerHTML = loan.interests[i].interestpay[z].employeeId;



                                    div.appendChild(table);


                                    table.appendChild(thead);
                                    table.appendChild(tbodyin);

                                    thead.appendChild(th0);
                                    thead.appendChild(th1);
                                    thead.appendChild(th2);
                                    thead.appendChild(th3);
                                    thead.appendChild(th4);

                                    tbodyin.appendChild(td0);
                                    tbodyin.appendChild(td1);
                                    tbodyin.appendChild(td2);
                                    tbodyin.appendChild(td3);
                                    tbodyin.appendChild(td4);

                                    div.appendChild(document.createElement("br"));



                                    interestPayDetails.appendChild(div);

                                }
                            } else {

                                let p = document.createElement("p");
                                p.innerHTML = "No Interest Pays";

                                div.appendChild(lable);

                                lable.appendChild(bold);

                                div.appendChild(p);

                                interestPayDetails.appendChild(div);
                            }


                        }

                        $('#monthPPay').show();
                        document.getElementById("ldltype").innerHTML = "Monthly P";
                    } else if (loan.loanTypeId == 4) {
                        document.getElementById("ldltype").innerHTML = "Property";
                    } else if (loan.loanTypeId == 5) {
                        document.getElementById("ldltype").innerHTML = "Vehicle";
                    } else if (loan.loanTypeId == 6) {
                        document.getElementById("ldltype").innerHTML = "Cheque";
                    }

                    document.getElementById("ldstatus").innerHTML = loan.status;
                    document.getElementById("ldcmnt").innerHTML = loan.loancomment;

                    document.getElementById("loanDetailsDiv").setAttribute("style", "display :");

                    $('#loanselect' + loanId).prop("disabled", false);

                    $('.monthPPayInterestDetailstbl').DataTable();

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
                        title: 'Loan Load Failed!'
                    });
                    $('#loanselect' + loanId).prop("disabled", false);
                }
            });


        }

        function paynow(empid) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var payamount = document.getElementById("payamount").value
            var loanid = document.getElementById("lid").value
            var empid = empid;

            if (payamount != "") {
                if (loanid != "") {



                    $.ajax({
                        url: "/paynow",
                        type: "POST",
                        data: {
                            _token: CSRF_TOKEN,
                            payamount: payamount,
                            loanid: loanid,
                            empid: empid
                        },


                        success: function(response) {

                            console.log(response);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                                type: 'success',
                                title: 'Loan Pay successfully '
                            });

                            document.getElementById("payamount").value = "";
                            document.getElementById("lid").value = "";

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
                        title: 'Please Select Loan First'
                    });
                }


            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'warning',
                    title: 'Empty Amount..!'
                });
            }


        }



        function serachCustomer() {

            $('#searchbtn').prop("disabled", true);


            document.getElementById("cname").innerHTML = "User Name";
            document.getElementById("cnic").innerHTML = "NIC";
            document.getElementById("cusimg").src = "images/admin.jpg";

            document.getElementById("lcount").innerHTML = "";
            document.getElementById("tlamount").innerHTML = "";
            document.getElementById("cloansf").setAttribute("style", "display: none;");

            var i;

            var tbody = document.getElementById("cloans");

            while (tbody.hasChildNodes()) {
                tbody.removeChild(tbody.firstChild);
            }


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var cusid = document.getElementById("cid").value;


            $.ajax({
                url: "/loadCustomersLoans",
                type: "GET",
                data: {
                    _token: CSRF_TOKEN,
                    cusid: cusid
                },
                success: function(data) {

                    console.log(data);

                    const customer = data;

                    document.getElementById("cname").innerHTML = data.name;
                    document.getElementById("cnic").innerHTML = data.nic;
                    document.getElementById("cusimg").src = data.img;

                    var i;

                    var tr;

                    var td1;
                    var td2;
                    var td3;
                    var td4;
                    var td5;
                    var btn;

                    var total = 0;

                    for (i = 0; i < data.loans.length; i++) {

                        var loan = data.loans[i];

                        tr = document.createElement("tr");

                        td1 = document.createElement("td");
                        td1.appendChild(document.createTextNode(loan.loanId + " | " + loan.custom_loanId));
                        td2 = document.createElement("td");
                        td2.appendChild(document.createTextNode(loan.amount));
                        td3 = document.createElement("td");
                        td3.appendChild(document.createTextNode(loan.takenDate));
                        td4 = document.createElement("td");

                        if (loan.loanTypeId == 1) {
                            td4.appendChild(document.createTextNode("Daily"));
                        } else if (loan.loanTypeId == 2) {
                            td4.appendChild(document.createTextNode("Monthly"));
                        } else if (loan.loanTypeId == 3) {
                            td4.appendChild(document.createTextNode("Monthly P"));
                        } else if (loan.loanTypeId == 4) {
                            td4.appendChild(document.createTextNode("Property"));
                        } else if (loan.loanTypeId == 5) {
                            td4.appendChild(document.createTextNode("Vehicle"));
                        } else if (loan.loanTypeId == 6) {
                            td4.appendChild(document.createTextNode("Cheque"));
                        }

                        td5 = document.createElement("td");
                        btn = document.createElement("button");
                        btn.setAttribute("class", "btn btn-primary");
                        btn.setAttribute("id", "loanselect" + loan.loanId);
                        btn.setAttribute("onclick", "selectloan(" + loan.loanId + ");");
                        // btn.onclick = function() {selectloan(loan);}; // for IE
                        btn.appendChild(document.createTextNode("Select"));
                        td5.appendChild(btn);

                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td5);



                        tbody.appendChild(tr);

                        total += loan.amount;

                    }

                    document.getElementById("lcount").innerHTML = data.loans.length;
                    document.getElementById("tlamount").innerHTML = total;
                    document.getElementById("cloansf").setAttribute("style", "display:;");
                    $('#searchbtn').prop("disabled", false);

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
                        title: 'Customer Search Failed!'
                    });

                    $('#searchbtn').prop("disabled", false);


                }
            });

        }



        function customerLoans(id) {
            $("#Cloans").empty();
            // alert("okkk");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            var cid = id;

            $.ajax({
                url: "/customerLoans",
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    cid: cid
                },


                success: function(data) {



                    console.log(data);
                    var lenght = Object.keys(data).length;
                    var tabledata;
                    var i = lenght - 1;
                    tabledata = data[i];
                    $("#Cloans").append(tabledata);




                },

                error: function(data) {
                    console.log(data);
                }
            });

        }
    </script>

</body>

</html>
