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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
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



                                                        <div class="row form-group">

                                                            <div class="col col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-3"></div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">


                                                                            <input type="text" id="loanId"
                                                                                style="color: red" name="input2-group2"
                                                                                class="form-control">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-12">
                                                                <div class="input-group">
                                                                    <input type="text" id="cid" name="input2-group2"
                                                                        placeholder="Search Customer"
                                                                        class="form-control">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-primary" id="searchbtn"
                                                                            onclick="serachCustomer();">Search</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">

                                                            <div class="col-12 col-md-9">
                                                                <select name="select" id="loantypeid"
                                                                    class="form-control" onchange="filterLtype();">
                                                                    <option value="0">Please Select Loan Type</option>
                                                                    <?php
                                                                $clevel_data = DB::table('loantype')->where('status',1)->get();
                                                                foreach ($clevel_data as  $rname) {?>

                                                                    <option value="{{$rname->loanTypeId}}">
                                                                        {{$rname->name}}</option>


                                                                    <?php
                                                                    }?>

                                                                    <!-- <option value="1">Daily Loan</option>
                                                                        <option value="2">Monthly Loan</option>
                                                                        <option value="3">Monthly Loan-Interst</option>
                                                                        <option value="4">Vehical Loan</option>
                                                                        <option value="5">property Loan</option>
                                                                        <option value="6">Cheque Loan</option> -->

                                                                </select>
                                                            </div>
                                                        </div>


                                                        <!-- Daily Loan  Details Start...................................... -->
                                                        <div id="darily">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Loan
                                                                    Amount</label>
                                                                <input id="loanamount" type="text" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment"
                                                                    class="control-label mb-1">Payment Daily
                                                                    Amount</label>
                                                                <input id="dailyamount" type="text" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Loan
                                                                    Installment Count</label>
                                                                <input id="count" type="text" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Loan Create Date
                                                                </label>
                                                                <input id="cdate" type="date" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>
                                                        </div>
                                                        <!-- Daily Loan  Details End...................................... -->

                                                        {{-- monthly loan ptype details.................................. --}}

                                                        <div id="monthlyloan1">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Total
                                                                    Loan
                                                                    Amount</label>
                                                                <input id="ptypeamount" type="text" class="form-control"
                                                                    placeholder="Loan Amount">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input id="ptypeinterst" type="text"
                                                                            class="form-control" placeholder="(%)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input id="countptype" type="text"
                                                                            class="form-control" placeholder="count">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button type="button"
                                                                        class="btn btn-outline-warning btn-sm"
                                                                        onclick="monthlycalculate();">Calculate</button>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input id="monthpayamohidn" type="text"
                                                                            class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">
                                                                            Loan Create Date
                                                                        </label>
                                                                        <input id="ctdate" type="date"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Change
                                                                            Amount</label>
                                                                        <input id="monthpayamo" type="text"
                                                                            class="form-control"
                                                                            placeholder="Loan Amount">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <br>
                                                        {{-- monthly loan ptype details end.................................. --}}
                                                        <!-- Monthly Loan  Details Start...................................... -->
                                                        <div id="monthly">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Loan
                                                                    Amount</label>
                                                                <input id="monthloanamount" type="text"
                                                                    class="form-control" aria-required="true"
                                                                    aria-invalid="false" placeholder="Loan Amount">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Interst (%)</label>
                                                                <input id="monthlyinterst" type="text"
                                                                    class="form-control" aria-required="true"
                                                                    aria-invalid="false">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Loan Create Date
                                                                </label>
                                                                <input id="mtypedate" type="date" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="cc-payment" class="control-label mb-1">
                                                                        <strong> Include Interst</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="checkbox" id="checkinterst">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <button id="payment-button" type="submit"
                                                                        onclick="CalculateMonthly();"
                                                                        class="btn btn-lg btn-success btn-block">
                                                                        <i class="fa fa-eye fa-lg"></i>&nbsp;
                                                                        <span
                                                                            id="payment-button-amount">calculate</span>

                                                                    </button>
                                                                </div>
                                                                <div class="col-md-4"></div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Total pay interst</label>
                                                                <input id="totinterst" type="" class="form-control"
                                                                    aria-required="true" aria-invalid="false" disabled
                                                                    style="color: red">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Total pay Amount</label>
                                                                <input id="Payamount" type="" class="form-control"
                                                                    aria-required="true" aria-invalid="false" disabled
                                                                    style="color: green">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Next payment Day</label>
                                                                <input id="nextpaydate" type="" class="form-control"
                                                                    aria-required="true" aria-invalid="false" disabled
                                                                    style="color: green">
                                                            </div>
                                                           
                                                        </div>
                                                        <!-- Monthly Loan  Details End...................................... -->


                                                        <!-- Property Loan  Details Start...................................... -->
                                                        <div id="property">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Loan
                                                                    Amount</label>
                                                                <input id="pamount" type="text" class="form-control"
                                                                    placeholder="0.00">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col md- 6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Loan
                                                                            Interst</label>
                                                                        <input id="pinterst" type="text"
                                                                            class="form-control" placeholder="%">
                                                                    </div>
                                                                </div>
                                                                <div class="col md- 6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Instrallment
                                                                            Count</label>
                                                                        <input id="pcount" type="number"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button onclick="calculatepropty()" type="submit"
                                                                        class="btn btn-success btn-sm">Calculate</button>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input id="calamount" type="number"
                                                                        class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Installment
                                                                            Amount</label>
                                                                        <input id="changeamount" type="number"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3"></div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">
                                                                    Loan Create Date
                                                                </label>
                                                                <input id="cdate1" type="date" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="cc-payment"
                                                                    class="control-label mb-1">Select Loan
                                                                    Documents</label>
                                                                <input type="file" id="propertyloandfiles"
                                                                    name="file-input" class="form-control-file"
                                                                    multiple="multiple">
                                                                <small class="form-text text-muted">Maximum number of
                                                                    file count that you can upload is 5.</small>
                                                            </div>
                                                        </div>
                                                        <!-- Property Loan  Details End...................................... -->

                                                        <!-- Cheque Loan  Details Start...................................... -->
                                                        <div id="cheque">

                                                            <div class="form-group">
                                                                <label for="cc-payment"
                                                                    class="control-label mb-1">Cheque
                                                                    Amount</label>
                                                                <input id="Camount" name="loan_amount" type="text"
                                                                    class="form-control" aria-required="true"
                                                                    aria-invalid="false">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="cc-payment"
                                                                    class="control-label mb-1">Cheque Create
                                                                    Date</label>
                                                                <input id="CCreatedate" type="date" class="form-control"
                                                                    aria-required="true" aria-invalid="false">
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="cc-payment"
                                                                    class="control-label mb-1">Interst
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="number" id="Cinterest" name="Cinterest"
                                                                        placeholder="Set Interst" class="form-control">
                                                                    <div class="input-group-btn">

                                                                        <button class="btn btn-primary" type="submit"
                                                                            onclick="chequePayCal();"
                                                                            id="searchbtn">Calculate</button>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Payment Total
                                                                            Amount</label>
                                                                        <input id="Ctotamount"
                                                                            name="totale_payble_amount" type="text"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false" disabled>


                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Interst
                                                                            Amount</label>


                                                                        <input style="color: green" id="Cprofit"
                                                                            name="totale_payble_amount" type="text"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Cheque
                                                                            Number</label>
                                                                        <input id="Cnum4us" type="text"
                                                                            class="form-control" aria-required="true"
                                                                            placeholder="0000-0000-0000"
                                                                            aria-invalid="false">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">
                                                                            Bank Name</label>
                                                                        <input id="Cbank4us" type="text"
                                                                            class="form-control" aria-required="true"
                                                                            placeholder="bank Name"
                                                                            aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">

                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label for="cc-payment"
                                                                            class="control-label mb-1">Cheque
                                                                            Date</label>
                                                                        <input id="Cdate4us" type="date"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false">
                                                                    </div>
                                                                    <div class="col-md-2">

                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div>
                                                        <!-- Cheque Loan  Details End...................................... -->
                                                        <div class="row form-group">

                                                            <div class="col-12 col-md-9">
                                                                <select name="select" id="selectid" class="form-control"
                                                                    onchange="HandleChqequ();">
                                                                    <option value="0">Please Select Payment Method
                                                                    </option>
                                                                    <option value="1">Cash</option>
                                                                    <option value="2">Cheque</option>

                                                                </select>

                                                            </div>

                                                        </div>
                                                        <div class="row form-group" id="guarantorfild">

                                                            <div class="col-12 col-md-9">
                                                                <select name="select" id="selectid_guarantor"
                                                                    class="form-control" onchange="enableGuarantor();">
                                                                    <option value="0">Do You Have Guarantor</option>
                                                                    <option value="1">Yes</option>
                                                                    <option value="2">No</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <!-- Cheque Payment  Details Start...................................... -->
                                                        <div class="row" id="HIDDN1">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">
                                                                        Cheque Number</label>
                                                                    <input id="chquenum" type="number"
                                                                        class="form-control" aria-required="true"
                                                                        aria-invalid="false"
                                                                        placeholder="Cheque Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="cc-payment" class="control-label mb-1">
                                                                        Select Account</label>
                                                                    <select name="select" id="accNo"
                                                                        class="form-control" onchange="HandleChqequ();">
                                                                        <?php
                                                                                                                $clevel_data = DB::table('bankaccount')->where('status',1)->get();
                                                                                                                foreach ($clevel_data as  $rname) {?>

                                                                        <option value="{{$rname->accountId}}">
                                                                            {{$rname->accNumber}}</option>



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
                                                                    <input id="cheqedate" type="date"
                                                                        class="form-control" aria-required="true"
                                                                        aria-invalid="false">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">

                                                            </div>
                                                        </div>
                                                        <!-- Cheque Payment  Details End...................................... -->

                                                        <div id="viewbtn">
                                                            {{-- <button id="payment-button" type="submit" onclick="viewPlan();"
                                                                                                            class="btn btn-lg btn-info btn-block">
                                                                                                            <i class="fa fa-eye fa-lg"></i>&nbsp;
                                                                                                            <span id="payment-button-amount">View Plan</span>
                                                                                                            <span id="payment-button-sending"
                                                                                                            style="display:none;">Sending…</span>
                                                                                                        </button> --}}

                                                            <button onclick="viewPlan();" id="payment-button"
                                                                type="submit" class="btn btn-lg btn-info btn-block">
                                                                <i class="fa fa-eye fa-lg"></i>&nbsp;
                                                                <span id="payment-button-amount">View Plan</span>

                                                            </button>
                                                            
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="stat-widget-four">
                                                                        <div class="stat-icon dib">
                                                                            <i class="ti-stats-up text-muted"></i>
                                                                        </div>
                                                                        <div class="stat-content">
                                                                            <div class="text-left dib">
                                                                                <div class="stat-heading"><strong>
                                                                                        Payment Last Date</strong></div>
                                                                                <div class="stat-text">
                                                                                    <h1 id="dendate" style="color: red">
                                                                                        YYYY-MM-DD</h1>
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
                                            <div class="col-lg-6">
                                                <aside class="profile-nav alt">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img id="cusimg"
                                                                        class="align-self-center rounded-circle mr-3"
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
                                                                <a href="#" id="cmobile"> <i class="fa fa-phone"></i>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </section>
                                                </aside>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong class="card-title">Customer Loan History</strong>
                                                    </div>
                                                    <div id="customerlnhistory" class="card-body">
                                                        <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Loan ID</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Taken Date</th>
                                                                    <th scope="col">End Date</th>
                                                                    <th scope="col">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="cusloanhistorytbl">
                                                                <tr>
                                                                    <th scope="row">2020/1/20</th>
                                                                    <td>100000.00</td>
                                                                    <td>00.00</td>
                                                                    <td>@mdo</td>
                                                                </tr>


                                                            </tbody>
                                                        </table>

                                                        <div id="historyalert" class="alert alert-info" role="alert"
                                                            style="visibility: hidden">
                                                            No Loan History!
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- gurantor------------------------------------------------------------------------------------ --}}
                                                <aside class="profile-nav alt" id="GPROFILE">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img id="gimg"
                                                                        class="align-self-center rounded-circle mr-3"
                                                                        style="width:85px; height:85px;" alt=""
                                                                        src="images/admin.jpg">
                                                                </a>
                                                                <div class="media-body">
                                                                    <div class="raw">
                                                                        <div class="col col-8">
                                                                            <h2 class="text-light display-6" id="gname">
                                                                                Guarantor</h2>
                                                                            <p id="gnic"></p>
                                                                            <p class="d-none" id="setgid"></p>


                                                                        </div>
                                                                        <div class="col col-4">
                                                                            <button class="btn btn-secondary btn-lg"
                                                                                id="srchGbtn"
                                                                                onclick="GuarantoraddTabale();">Add</button>


                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <a href="#" id="gmobile"> <i class="fa fa-phone"></i>
                                                                </a>

                                                            </li>
                                                        </ul>
                                                        <div class="row form-group">
                                                            <div class="col col-md-12">
                                                                <div class="input-group">
                                                                    <input type="text" id="guanic" name="input2-group2"
                                                                        placeholder="Search Guarantor by NIC"
                                                                        class="form-control">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-secondary" id="srchGbtn"
                                                                            onclick="serachGuarantor()">Search</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </section>
                                                </aside>

                                                <div class="col-md-12">

                                                </div>
                                                <div class="card" id="GTABLE">
                                                    <div class="card-header">
                                                        <strong class="card-title">Guarantors</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table" id="gtable">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">id</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Nic</th>
                                                                    <th scope="col">Action</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody id="cusloanhistory">
                                                                <tr>

                                                                </tr>


                                                            </tbody>
                                                        </table>

                                                        <div id="historyalert" class="alert alert-info" role="alert"
                                                            style="visibility: hidden">
                                                            No Loan History!
                                                        </div>

                                                    </div>
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

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script>
        var customerid; 
            var customernic; 
            var customername;
            var dateplan;
            var endDate;
            var monthlyplan;
            var monthlyendDate;
            var customrnic;
            var gid_array = [];
            const formatter = new Intl.NumberFormat('LKR', {
                                //  style: 'currency',
                                // currency: 'LKR',
                                 minimumFractionDigits: 2
                                    })

        $(document).ready(function () {
               document.getElementById("loanmngsb").setAttribute("class", "menu-item-has-children dropdown active");
             });


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

function filterLtype(){
    
    var name = document.getElementById("loantypeid").value;
    var darily = document.getElementById("darily");
   
    var monthly = document.getElementById("monthly");
    var property = document.getElementById("property");
    var viewplan = document.getElementById("viewplan");
    var viewbtn = document.getElementById("viewbtn");
    var cheque = document.getElementById("cheque");
    var month1 = document.getElementById("monthlyloan1");

    var gt = document.getElementById("GTABLE");
    var gp = document.getElementById("GPROFILE");
    var guarantorfild = document.getElementById("guarantorfild");
   if (name==1) {
    darily.style.display = "block";
    viewplan.style.display = "block";
    viewbtn.style.display = "block";
    monthly.style.display = "none";
    property.style.display = "none";
    cheque.style.display = "none";
    month1.style.display = "none";

    gt.style.display = "none";
    gp.style.display = "none";
    guarantorfild.style.display = "none";
   } else if(name==2){
    darily.style.display = "none";
    month1.style.display = "block";
    viewplan.style.display = "block";
    viewbtn.style.display = "block";
    monthly.style.display = "none";
    property.style.display = "none";
    cheque.style.display = "none";

    gt.style.display = "none";
    gp.style.display = "none";
    guarantorfild.style.display = "none";
   }else if(name==3){
    month1.style.display = "none"
    darily.style.display = "none";
    viewplan.style.display = "none";
    viewbtn.style.display = "none";
    monthly.style.display = "block";
    property.style.display = "none";
    cheque.style.display = "none";
    guarantorfild.style.display = "block";
    }else if(name==4){
        month1.style.display = "none"
        darily.style.display = "none";
        monthly.style.display = "none";
        property.style.display = "block";
        viewplan.style.display = "block";
        viewbtn.style.display = "block";
        cheque.style.display = "none";
        guarantorfild.style.display = "block";
    }else if(name==5){
        month1.style.display = "none"
        darily.style.display = "none";
        monthly.style.display = "none";
        property.style.display = "block";
        viewplan.style.display = "block";
        viewbtn.style.display = "block";
        cheque.style.display = "none";
        guarantorfild.style.display = "block";
    }else if(name==6){
        month1.style.display = "none"
        darily.style.display = "none";
        monthly.style.display = "none";
        property.style.display = "none";
        viewplan.style.display = "none";
        viewbtn.style.display = "none";
        cheque.style.display = "block";
        guarantorfild.style.display = "block";
    }
    genarateId(name);

}

             function showloantype(){
                 
                var darily = document.getElementById("darily");
                var monthly = document.getElementById("monthly");
                var property = document.getElementById("property");
                var x = document.getElementById("HIDDN1");
                 var y = document.getElementById("HIDDN2");
                 var viewplan = document.getElementById("viewplan");
                 var viewbtn = document.getElementById("viewbtn");
                 var cheque = document.getElementById("cheque");
                 var month1 = document.getElementById("monthlyloan1");

                 var guarantorfild = document.getElementById("guarantorfild");
                 var gt = document.getElementById("GTABLE");
                 var gp = document.getElementById("GPROFILE");
                    darily.style.display = "none";
                    monthly.style.display = "none";
                    property.style.display = "none";
                    x.style.display = "none";
                    y.style.display = "none";
                     viewplan.style.display = "none";
                     viewbtn.style.display = "none";
                     cheque.style.display = "none";
                     month1.style.display = "none";

                     gt.style.display = "none";
                    gp.style.display = "none";
                    guarantorfild.style.display = "none";


             }

               function serachCustomer(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var cusid = document.getElementById("cid").value;

                if(cusid!=''){

                $.ajax({
                        url: "/customerdetails",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        cusid: cusid},


                        success:function(data){


                            if(data.status==1){

                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'warning',
                            title: 'Please Enter valid Customer Number or NIC...!'
                        });

                            }else{


                                 var lenght = Object.keys(data).length;
                           
                            console.log(data);
                           
                            var mobile;
                            var level;
                            var img;
                        for(var i=0;i<lenght;i++){

                             console.log(data[i].name);
                             console.log(data[i].mobile);
                             console.log(data[i].nic);

                             customername = data[i].name;
                             customrnic = data[i].nic;
                             mobile = data[i].mobile;
                             level = data[i].level;
                             customerid = data[i].id;
                             img = data[i].img;
                        }

                        LoanHistory(customerid);

                          document.getElementById("cname").innerHTML = customername;
                          document.getElementById("cnic").innerHTML = level;
                          document.getElementById("cmobile").innerHTML = mobile;
                          document.getElementById("cusimg").src = img;

                            }

                          
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

             function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
               
              
                document.getElementById("gtable").deleteRow(i);
                gid_array=getColumn();
                }

             function GuarantoraddTabale(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

           
             var gname =document.getElementById("gname").textContent;
             var gnic =document.getElementById("gnic").textContent;  
             var gid =document.getElementById("setgid").textContent;
         
             if(gname!="Guarantor"){
          
             var table = document.getElementById("gtable");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
              
                cell1.innerHTML = gid;
                cell2.innerHTML = gname;
                cell3.innerHTML = gnic;
                cell4.innerHTML = "<button class='btn btn-clipboard' onclick='deleteRow(this)'>remove</button>";
                gid_array=getColumn();
               
                document.getElementById("gname").innerHTML = "Guarantor";
                document.getElementById("gnic").innerHTML = "";
                document.getElementById("setgid").innerHTML = "";
                document.getElementById("gmobile").innerHTML = "";
                document.getElementById("guanic").value = "";
               
        
                    }else{
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        type: 'warning',
                        title: 'Search Guarantor First'
                    }); 
                    }
         

             }

             function getColumn() {
                        col= 0;
               var tab = document.getElementById("gtable"),
                n = tab.rows.length,
                arr = [],
                row;
            
            if (col < 0) {
                return arr; // Return empty Array.
            }
            for (row = 0; row < n; ++row) {
                if (tab.rows[row].cells.length > col) {
                  
                    arr.push(tab.rows[row].cells[col].innerText);
                   
                }
            }
            return arr;
            }


             function serachGuarantor(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var gnic = document.getElementById("guanic").value;
             
                if(gnic!=''){
                  

                $.ajax({
                        url: "/guarantorDetails",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            gnic: gnic},

      

        success:function(data){
           

           var lenght = Object.keys(data).length;
          
            console.log(data);
           
            var mobile;
            var id;
            var img;
        for(var i=0;i<lenght;i++){
             id = data[i].guarantorId;
             customername = data[i].name;
             customrnic = data[i].nic;          
             mobile = data[i].pno;
             img = data[i].img;
        }
 
        if(lenght!=0){
         
          document.getElementById("gname").innerHTML = customername;
          document.getElementById("gnic").innerHTML = customrnic;
          document.getElementById("gmobile").innerHTML = mobile;
          document.getElementById("gimg").src = img;
          document.getElementById("setgid").innerHTML = id;
          
        
        }else{
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'warning',
            title: 'Register Guarantor First'
        }); 
        }
          
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
            title: 'Please Enter Guarantor NIC...!'
        });


}



}
 
              function LoanHistory(cusid){
                   $("#cusloanhistory").empty();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

               // var cusid = document.getElementById("cid").value;

                $.ajax({
                        url: "/loanHistory",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        id: cusid},


                        success:function(data){

                            if(data.status == 1){

                                document.getElementById("historyalert").style.visibility = "visible";
                                //alert("No Data");

                            }else{

                                var tbl;
                                document.getElementById("historyalert").style.visibility = "hidden";
                                console.log(data);

                                for(var i=0; Object.keys(data).length>i;i++){

                                    // tbl += " <tr><th scope=row>"+data[i].date+"</th><td>"+data[i].amount+"</td><td>00.00</td><td>"+data[i].comment+"</td></tr>"
                                    // $("#cusloanhistory").append(tbl);
                                }

                                


                            }
                         // console.log(Object.keys(data).length);

                         // console.log(data);
                         
                            
                        },

                        error: function(data) {
                            console.log(data);
                             alert("error");
                        }
                    });


             }

            

             function viewPlan(){
                 
                $("#loanPlan").empty();
                // alert("okkk");
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                var name = document.getElementById("loantypeid");
                // var curdate = document.getElementById("cdate");
              
                var plantype = name.options[name.selectedIndex].value;

                var amount = document.getElementById("dailyamount").value;
                var loanamount = document.getElementById("loanamount").value;
                var count = document.getElementById("count").value;
                var curdate = document.getElementById("cdate").value;

                if(plantype==1){
                    //daily view plan eka enna oniiiiii

                    if(amount!="" && count!="" && curdate!=""&& loanamount!=""){

                    $.ajax({
                        url: "/dailyLoanPlan",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        dailyamount: amount,
                        count: count,
                        cdate: curdate,
                        loantype: plantype
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
                            document.getElementById("dendate").innerHTML = endDate;
                            tabledata = "<tr><td>"+data[i]+"</td><td>"+ formatter.format(amount)+"</td></tr>";
                            $("#loanPlan").append(tabledata);
                          }

                          

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
                            title: 'Please Enter All Data...!'
                        });
                    }


                }else if(plantype==2){
                    
           
                 var curdate = document.getElementById("ctdate").value;

                var amo = document.getElementById('monthpayamo').value;
                var ctype = document.getElementById('countptype').value;
          

                if (curdate!="" && amo!="" && ctype!="") {
                    $.ajax({
                        url: "/monthlyLoanPlan",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        monthlyamount: amo,
                        cdate: curdate,
                        count: ctype,
                        },


                        success:function(data){

                            monthlyplan = data;

                            console.log(Object.keys(data).length);

                            console.log(data);
                            var lenght = Object.keys(data).length;
                            var tabledata ;

                          for(var i=0;lenght>i;i++){

                            console.log("date"+i+"   "+data[i]);
                            monthlyendDate = data[i];
                            document.getElementById("dendate").innerHTML = monthlyendDate;
                            tabledata = "<tr><td>"+data[i]+"</td><td>"+formatter.format(amo)+"</td></tr>";
                            $("#loanPlan").append(tabledata);
                          }


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
                       
    


                    

                }else if(plantype ==4 ||plantype ==5){
                    // var amount = document.getElementById('pamount').value;
                var count = document.getElementById('pcount').value;
                var interst = document.getElementById('pinterst').value;
                var curdate = document.getElementById("cdate1").value;
                var amount = document.getElementById("changeamount").value;

               
               var totInterst;

                if (amount!="" && count !="" && interst!="") {
                    
                        // var newInterst = (amount/100*interst);
                   
                        // var totamount = +newInterst + +amount;
                       
                        // var mpay = totamount/count;
                        // totInterst = mpay.toFixed(2);
                      
                        $.ajax({
                        url: "/vehicalLoanPlan",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                        cdate: curdate,
                        count1: count
                        },


                        success:function(data){

                            monthlyplan = data;

                            console.log(Object.keys(data).length);

                            console.log(data);
                            var lenght = Object.keys(data).length;
                            var tabledata ;

                          for(var i=0;lenght>i;i++){

                            console.log("date"+i+"   "+data[i]);
                            monthlyendDate = data[i];

                            document.getElementById("dendate").innerHTML = monthlyendDate;
                            tabledata = "<tr><td>"+data[i]+"</td><td>"+formatter.format(amount)+"</td></tr>";
                            $("#loanPlan").append(tabledata);
                          }


                        },

                        error: function(data) {
                            console.log(data);
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
                            title: 'Fill All Details...!'
                            }); 
                }
                }


                
             }


             function Createloan(){

                 if(customerid==null){

                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Please Enter Customer Number or NIC.....'
                            });


                 }else{
                     
                

                var loan_type = document.getElementById("loantypeid").value;
                var pay_method = document.getElementById("selectid").value;
                var loanamount = document.getElementById("loanamount").value;
                var dailyamount = document.getElementById("dailyamount").value;
                var installmentcount = document.getElementById("count").value;
                //emplyeeid 
                // var empid = document.getElementById("empid").value;
                //use cheque paymentMethod
                //guarantor
                var hvguarantor = document.getElementById("selectid_guarantor").value;
              
                var CnumFromus = document.getElementById("chquenum").value;
                var CaccNoFromus = document.getElementById("accNo").value;
                var CdateFromus = document.getElementById("cheqedate").value;
                //for chequeloan
                var Camount = document.getElementById("Camount").value;
                var Cinterest = document.getElementById("Cinterest").value;
                var Cprofit = document.getElementById("Cprofit").value;
                 var CCreatedate= document.getElementById("CCreatedate").value;

                var Cnum4us = document.getElementById("Cnum4us").value;
                var Cbank4us = document.getElementById("Cbank4us").value;
                 var Cdate4us = document.getElementById("Cdate4us").value;
               
                 var curdate = document.getElementById("cdate").value;
                var loanid = document.getElementById("loanId").value;
                var x = false;
                var g = false;

                // alert(empid+"---"+CaccNoFromus);

                 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                if(loanid!=""){

               
                if(loan_type==1){

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

                        if (pay_method==0) {
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
                        }else{


                            
                            if (loanamount!="" && dailyamount!="") {

                           

                               if(pay_method==1){


                                 $.ajax({ 
                                    url: "/createloan",
                                    type:"POST",
                                    data: {_token: CSRF_TOKEN,
                                        cid:customerid,
                                        end:endDate,
                                        paymethod:pay_method,
                                        loantype:loan_type,
                                        amount:loanamount,
                                        dailyamount:dailyamount,
                                        plan:dateplan,
                                        cdate:curdate,
                                        cname:customername,
                                        loanid:loanid,
                                        nic:customrnic,
                                        count:installmentcount,
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
                                    genarateId(loan_type);
                                    window.location = '/document?loanid=1';
                                    },

                                    error: function(data) {
                                        console.log(data);
                                    }
                                });


                               }else if(pay_method==2){
                                    //check

                                    var chequeno = document.getElementById("chquenum").value;
                                    var account = document.getElementById("accNo");
                                    var accountid = account.options[account.selectedIndex].value;
                                    var date = document.getElementById("cheqedate").value;

                                    
                                   if(chequeno=='' && accountid == '' && date == ''){

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


                                $.ajax({ 
                                    url: "/createloan",
                                    type:"POST",
                                    data: {_token: CSRF_TOKEN,
                                        cid:customerid,
                                        end:endDate,
                                        paymethod:pay_method,
                                        loantype:loan_type,
                                        amount:loanamount,
                                        dailyamount:dailyamount,
                                        plan:dateplan,
                                        count:installmentcount,
                                        chequeno:chequeno,
                                        loanid:loanid,
                                        cdate:curdate,
                                        accid:accountid,
                                        date:date,
                                        cname:customername,
                                        nic:customrnic,
                                      
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
                                    genarateId(loan_type);
                                    },

                                    error: function(data) {
                                        console.log(data);
                                    }
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
                            title: 'Fill All Details...!'
                            });
                        }
                     }

                     

                }
                    
                }else if(loan_type==2){


                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var cusid = document.getElementById("cid").value;
                        var amo = document.getElementById('monthpayamo').value;
                        var amount1 = document.getElementById('ptypeamount').value;
                        var ctype = document.getElementById('countptype').value;
                        var fdate = document.getElementById('ctdate').value;
                        if(cusid==''){
                            //no cutomer search
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                                type: 'warning',
                                title: 'Please Enter Customer Id or NIC...!'
                            });

                        }else{

                          if(selectid_guarantor==0){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                                type: 'warning',
                                title: 'Select Gurnter ...!'
                            });
                          }else{
                            if (pay_method!=0) {

                                if(monthlyplan!= null){
                                
                                
                        if(pay_method==1){
                                    
                                    $.ajax({ 
                                    url: "/createMonthlyLoan",
                                    type:"POST",
                                    data: {_token: CSRF_TOKEN,
                                    cid:customerid,
                                    monthlyendDate:monthlyendDate,
                                    paymethod:pay_method,
                                    loantype:loan_type,
                                    amount:amount1,
                                    cname:customername,
                                    nic:customrnic,
                                    cdate:fdate,
                                    loanid:loanid,
                                    dailyamount:amo,
                                    gurnter:selectid_guarantor,
                                    plan:monthlyplan,
                                    guranterindex: hvguarantor,
                                         gids:gid_array,
                                    count:ctype,
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
                                genarateId(loan_type);

                                },

                                error: function(data) {
                                    console.log(data);
                                }
                                });


                                }else if(pay_method==2){
                                
                                
                                var chequeno = document.getElementById("chquenum").value;
                                var account = document.getElementById("accNo");
                                var accountid = account.options[account.selectedIndex].value;
                                var date = document.getElementById("cheqedate").value;
                                
                                
                                if(chequeno=='' && accountid == '' && date == ''){
                                
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

                                $.ajax({ 
                                url: "/createMonthlyLoan",
                                type:"POST",
                                data: {_token: CSRF_TOKEN,
                                
                                    cid:customerid,
                                    monthlyendDate:monthlyendDate,
                                    paymethod:pay_method,
                                    loantype:loan_type,
                                    amount:amount1,
                                    cname:customername,
                                    nic:customrnic,
                                     loanid:loanid,
                                    cdate:fdate,
                                    gurnter:selectid_guarantor,
                                    dailyamount:amo,
                                    plan:monthlyplan,
                                    count:ctype,
                                    chequeno:chequeno,
                                    accid:accountid,
                                    date:date,
                                    guranterindex: hvguarantor,
                                         gids:gid_array,
                                    cdate:fdate,
                                
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
                                genarateId(loan_type);
                                },

                                error: function(data) {
                                    console.log(data);
                                }
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
                                    title: 'Please Create Loan Plan First!'
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
                                title: 'Please Select Payment Type...!'
                                });
                                }

                          }

                                

                     



                        }



                }else if(loan_type==6){
                    if(hvguarantor==0||hvguarantor==2){
                               g=true;
                    }
                   
                    if(pay_method==2){
                    if(CnumFromus!=""&&CaccNoFromus!=""&&CdateFromus!=""){
                           
                            x= true
                          
                    }
                       }
                    if (pay_method==0) {
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
                    }else if(pay_method==1||x){

                        if (Camount!="" && Cinterest!=""&&Cnum4us!=""&& Cbank4us!=""&& Cdate4us!=""&&CCreatedate!="") {
                           
                        
                            if(Cprofit!=""){
                              
                            if((hvguarantor==1 &&  gid_array.length > 1)|| g ){
                       
                                    $.ajax({ 
                                    url: "/Clonecreate",
                                    type:"POST",
                                    data: {_token: CSRF_TOKEN,
                                        CCreatedate:CCreatedate,
                                        hvguarantor:hvguarantor,
                                        cid:customerid,
                                        loanid:loanid,
                                        Guarantorid:gid_array,
                                        loantype:loan_type,
                                        pay_method:pay_method,
                                        Cinterest:Cinterest,
                                        Cprofit:Cprofit,
                                        Camount:Camount,
                                        Cnum4us:Cnum4us,
                                        Cbank4us:Cbank4us,
                                        Cdate4us:Cdate4us,
                                        CnumFromus:CnumFromus,
                                        CaccNoFromus:CaccNoFromus,
                                        CdateFromus:CdateFromus,
                                       
                                    },


                                

                            success:function(data){

                            // console.log(Object.keys(data).length);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'success',
                            title: 'Loan Created Successful'
                            });
                             genarateId(loan_type);
//cler filds
                   document.getElementById("Camount").value="";
                   document.getElementById("Cinterest").value="";
                   document.getElementById("Cprofit").value="";
                   document.getElementById("Ctotamount").value="";
                   document.getElementById("CCreatedate").value="";
                   
                    document.getElementById("Cnum4us").value="";
                    document.getElementById("Cbank4us").value="";
                    document.getElementById("Cdate4us").value="";
                    if(pay_method==2){
                    document.getElementById("CnumFromus").value="";
                    document.getElementById("CaccNoFromus").value="";
                    document.getElementById("CnumFromus").value="";
                    }



                            console.log(data);
                            
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
                            title: 'Add Guarantor..!'
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
                            title: 'Calculate Total Payment...!'
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
                            title: 'Fill All Details...!'
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
                            title: 'Fill All Details...!'
                            });



                     }



                }else if (loan_type==3) {
                    if (pay_method==0) {
                        const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Please choose Payment Type...!'
                            });
                        
                    }else{

                        if (customerid!=null) {


                                if (hvguarantor==0) {
                                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Please Select Guranter...!'
                            });
                                }else{
                                    var amount = document.getElementById('monthloanamount').value; 
                var interst = document.getElementById('monthlyinterst').value; 
                var nextdate = document.getElementById('nextpaydate').value; 
                var checkno = document.getElementById('chquenum').value; 
                var acc = document.getElementById('accNo').value; 
                var datecheque = document.getElementById('cheqedate').value; 
                var pay_method = document.getElementById("selectid").value;
                var checkinterst = document.getElementById("checkinterst").checked;
                var createdate = document.getElementById("mtypedate").value;
                var loanid = document.getElementById("loanId").value;

      
                        $.ajax({
        url: "/monthlyLoanPCreate",
        type:"POST",
        data: {_token: CSRF_TOKEN,
        loanamount: amount,
        loaninterst: interst,
        checknum: checkno,
        accno: acc,
        guranterindex: hvguarantor,
        gids:gid_array,
        loanid:loanid,
        cid: customerid,
        chequedate: datecheque,
        paymethod:pay_method,
        interstcheck:checkinterst,
        fdate:createdate,
        cname:customername,
        nic:customrnic,
        date:nextdate},
        success:function(data){

            if (data.status == 1) {
                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Invalid Details.....'
                            });
            }else if (data.status == 2) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: 'success',
                    title: 'Loan Created successfully....'
                });
            }
            console.log(data);
            
            genarateId(loan_type);
                $("#routename").val('');
                $("#details").val('');
        
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
                            type: 'warning',
                            title: 'error'
                            });
            
                                
                            }
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
                            title: 'Costomer does not Exits.....'
                            });
                        }

               
                    }
                  
                    
                }else if (loan_type==4 ||loan_type==5) {
                    // property and vehical
                        var pamount = document.getElementById('pamount').value;
                        var pinterst = document.getElementById('pinterst').value;
                        var pcount = document.getElementById('pcount').value;
                        var reamount = document.getElementById('changeamount').value;
                        var curdate = document.getElementById("cdate1").value;

                    if(cusid==''){
                            //no cutomer search
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                                type: 'warning',
                                title: 'Please Enter Customer Id or NIC...!'
                            });

                        }else{

                            if (pamount!="" && pinterst!="") {

                                if (pay_method!=0) {

                                    if(monthlyplan!= null){

                                        if (hvguarantor==0) {
                                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Please Select Guranter...!'
                            });
                                }else{
                                        if(pay_method==1){

                                        $.ajax({ 
                                        url: "/propertyAndvehicalLoan",
                                        type:"POST",
                                        data: {_token: CSRF_TOKEN,
                                        cid:customerid,
                                        monthlyendDate:monthlyendDate,
                                        paymethod:pay_method,
                                        loantype:loan_type,
                                        reamount1:reamount,
                                        amount:pamount,
                                        interst:pinterst,
                                        cdate:curdate,
                                        guranterindex: hvguarantor,
                                         gids:gid_array,
                                        cname:customername,
                                        loanid:loanid,
                                        nic:customrnic,
                                        plan:monthlyplan,
                                        count:pcount,
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

                                    genarateId(loan_type);
                                    },

                                    error: function(data) {
                                        console.log(data);
                                    }
                                    });


                                    }else if(pay_method==2){


                                    var chequeno = document.getElementById("chquenum").value;
                                    var account = document.getElementById("accNo");
                                    var accountid = account.options[account.selectedIndex].value;
                                    var date = document.getElementById("cheqedate").value;

                                    
                                   if(chequeno=='' && accountid == '' && date == ''){

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

                                   $.ajax({ 
                                    url: "/propertyAndvehicalLoan",
                                    type:"POST",
                                    data: {_token: CSRF_TOKEN,
                                        cid:customerid,
                                        monthlyendDate:monthlyendDate,
                                        paymethod:pay_method,
                                        loantype:loan_type,
                                        amount:pamount,
                                        reamount1:reamount,
                                        interst:pinterst,
                                        plan:monthlyplan,
                                        cname:customername,
                                        loanid:loanid,
                                        nic:customrnic,
                                        count:pcount,
                                        chequeno:chequeno,
                                        accid:accountid,
                                        guranterindex: hvguarantor,
                                         gids:gid_array,
                                        date:date
                                        
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
                                    genarateId(loan_type);
                                    },

                                    error: function(data) {
                                        console.log(data);
                                    }
                                });



                                    }
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
                                        title: 'Please Create Loan Plan First!'
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
                                    title: 'Please Select Payment Type...!'
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
                                title: 'Please Fill All Fields!'
                                });

                            }



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
                            title: 'please select loan type...!'
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
                            title: 'Empty Loan ID...!'
                            });      

}
                    
               

             }

             }
             
             function genarateId(id){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "/genarateAutoId",
                    type:"POST",
                    data: {_token: CSRF_TOKEN,
                    tid:id,

                    },
                    success:function(response){

                        console.log(response);

                        document.getElementById('loanId').value=response;
                


                    },
                    error: function(response) {
                     console.log(response);
                    }
                });
             }

             function CalculateMonthly(){
                 
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var amount = document.getElementById('monthloanamount').value;
                var interst = document.getElementById('monthlyinterst').value;
                var checkbx = document.getElementById('checkinterst').checked;
                // var today = document.getElementById('mtypedate').value;

                    if (checkbx==true) {
                        alert("true");
                    }else{
                        alert("falce");
                    }
               
                if (amount!="" && interst !="") {
                    if (amount>0) {
                        var totale_interst = amount/100*interst;
                    var payamount = amount-totale_interst;
                    
                    document.getElementById('totinterst').value= formatter.format(totale_interst);
                    document.getElementById('Payamount').value=formatter.format(payamount);
                    var today = new Date();

                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                           

                    var dateString = date; // date string
                    var actualDate = new Date(dateString); // convert to actual date
                    var newDate = new Date(actualDate.getFullYear(), actualDate.getMonth(), actualDate.getDate()+30);
                       
                            var newdate1 =newDate.getFullYear()+'-'+(newDate.getMonth()+1)+'-'+newDate.getDate();
                            document.getElementById('nextpaydate').value=newdate1;
                        
                    }else{
                        const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Invalid Details...!'
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
                            title: 'Empty Feils...!'
                            }); 
                }
               
             }

             function p_clculate(){
                var amount = document.getElementById('pamount').value;
                var count = document.getElementById('pcount').value;
                var interst = document.getElementById('pinterst').value;
               

                if (amount!="" && count !="" && interst!="") {
                    
                        var newInterst = (amount/100*interst);
                   
                        var totamount = +newInterst + +amount;
                       
                        var mpay = totamount/count;
                        // var n = mpay.toFixed(2);
                        document.getElementById('monthlypayamount').value=formatter.format(mpay);


                } else {
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


             function calculatepropty(){
                        var pamount = document.getElementById('pamount').value;
                        var pinterst = document.getElementById('pinterst').value;
                        var pcount = document.getElementById('pcount').value;


                        const formatter1 = new Intl.NumberFormat('LKR', {
                                //  style: 'currency',
                                // currency: 'LKR',
                                 minimumFractionDigits: 3
                                })
                        if (pamount!="" && pinterst!="" && pcount!="") {
                            var interst = pamount*pinterst/100;
                        var netamount = +interst+ +pamount;
                        var finalamo = netamount/pcount;
                    

                    //    var amo =  finalamo.toFixed(2);
                        document.getElementById('calamount').value=finalamo;
                        document.getElementById('changeamount').value=finalamo;
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

             function monthlycalculate(){
                var amount = document.getElementById('ptypeamount').value;
                var interst = document.getElementById('ptypeinterst').value;
                var count = document.getElementById('countptype').value;

                    if (amount!="" && interst!="" && count!="") {
                        var interst = amount*interst/100;
                        var netamount = +interst+ +amount;
                        var finalamo = netamount/count;
                       var amo =  finalamo.toFixed(2);
                       document.getElementById('monthpayamohidn').value=finalamo;
                        document.getElementById('monthpayamo').value=finalamo;

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

             function enableGuarantor(){
                var name = document.getElementById("selectid_guarantor").value;
                 var gt = document.getElementById("GTABLE");
                 var gp = document.getElementById("GPROFILE");
                 if(name==1){
               
                    gt.style.display = "block";
                    gp.style.display = "block";
                    
                 }else if(name ==2){

                     if(gid_array.length>1){
                        const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            Toast.fire({
                            type: 'warning',
                            title: 'Remove Guarantor First..!'
                            }); 
                      
                     }else{
                        gt.style.display = "none";
                    gp.style.display = "none";
                     }
                   
                 
                 }
                  

                 

                // document.getElementById("guanic").disabled = true;
                // document.getElementById("srchGbtn").disabled = true;
               
             }
    </script>

</body>

</html>