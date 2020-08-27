<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Loan Pay Installment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Loan Pay Installment">
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
                        <h1>Loan Pay</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/cashcollect"> Loan Pay Installment </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            
            <div class="animated fadeIn">
                
                <form method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Search Loan</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Credit Card -->
                                    
                                    <div id="pay-invoice">
                                        <div class="card-body {{$errors->has('lnid')?'has-error' : ''}}">
                                            
                                            <div class="input-group ">
                                                <input type="text" id="lnid" name="lnid" placeholder="Loan ID"
                                                class="form-control" value="{{ old('lnid')}}">
                                                <div class="input-group-btn"><button class="btn btn-primary"
                                                    id="searchbtn"
                                                    formaction="/searchloaninstallment">Search</button>
                                                </div>
                                                
                                            </div>
                                            @error('lnid')
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> <!-- .card -->
                            
                        </div>
                        @if (is_array($installmentpy) || is_object($installmentpy))
                        <div class="col-lg-6">
                            {{-- profile --}}
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a>
                                            <img id="cusimg" class="align-self-center rounded-circle mr-3"
                                            style="width:85px; height:85px;" alt=""
                                            src="{{$installmentpy->cusimg}}">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="text-light display-6" id="cname">{{$installmentpy->cusname}}</h2>
                                            <p id="cnic">
                                                <?php
                                                $data = DB::table('customerLevel')
                                                ->where('customerLevelId', $installmentpy->cuslevel)
                                                ->first();
                                                ?>
                                                {{$data->cuslevelname}}
                                                
                                            </p>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                            </section>
                            
                        </div>
                        @endif
                        
                    </div>
                    @if (is_array($installmentpy) || is_object($installmentpy))
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <strong class="card-title">Pay Loan</strong>
                                        </div>
                                        <div class="col-lg-3">
                                            <input id="lid" placeholder="Loan ID" name="lid" type="text"
                                            class="form-control" aria-required="true"
                                            value="{{$installmentpy->loanId}}" aria-invalid="false" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="loanDetailsDiv" style="display: show">
                                    <!-- Credit Card -->
                                    <div>
                                        <div class="card-body">
                                            
                                            <div id="monthPPay">
                                                
                                                <label><b>Installment Payments</b></label>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="bootstrap-data-table-export"
                                                        class="table table-striped table-bordered">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Payable Date</th>
                                                                <th scope="col">Paid Date</th>
                                                                <th scope="col">Status</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="loadcustomerloandetails">
                                                            
                                                            <?php
                                                            $datains = DB::table('installment')
                                                            ->where('loanId', $installmentpy->loanId)
                                                            ->get();
                                                            
                                                            $countmonths= 0;
                                                            $installmentamount= 0;
                                                            $interestamount= 0;
                                                            
                                                            foreach ($datains as $ensmry) {
                                                                $installmentamount = $ensmry->amount
                                                                
                                                                ?>
                                                                
                                                                @if ($ensmry->status==1 || $ensmry->status==2)
                                                                {{-- need to write quary for retrive date of installment paid     --}}
                                                                <?php
                                                                $instllid =$ensmry->installmentId;
                                                                $lstinspays = DB::table('installmentpay')
                                                                ->where('installmentId', $instllid)
                                                                ->get();
                                                                // this will return the list of installmentpays of intallments
                                                                
                                                                foreach ($lstinspays as $insp) {
                                                                    
                                                                    
                                                                    $installmentpayabledate = $ensmry->datec;
                                                                    $installmentpaiddate = $insp->datec;
                                                                    
                                                                    ?>
                                                                    <tr>
                                                                        <td><span
                                                                            class="badge badge-Light">{{$installmentpayabledate}}</span>
                                                                        </td>
                                                                        <td><span
                                                                            class="badge badge-Light">{{$installmentpaiddate}}</span>
                                                                        </td>
                                                                        <td><span class="badge badge-success">Paid</span>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    
                                                                    <?php
                                                                }
                                                                
                                                                ?>
                                                                
                                                                @else
                                                                {{-- not paid installment yet --}}
                                                                <tr>
                                                                    <td><span
                                                                        class="badge badge-Light">{{$ensmry->datec}}</span>
                                                                    </td>
                                                                    <td><span class="badge badge-Light">None</span></td>
                                                                    <td>
                                                                        <?php
                                                                        $today = \Carbon\Carbon::now()->toDateString();
                                                                        
                                                                        ?>
                                                                        @if ($ensmry->datec == $today)
                                                                        <?php
                                                                        $countmonths+=1;
                                                                        ?>
                                                                        <span class="badge badge-warning">Ongoing</span>
                                                                        @elseif ($ensmry->datec > $today)
                                                                        <span class="badge badge-info">Ongoing</span>
                                                                        @else
                                                                        <?php
                                                                        $countmonths+=1;
                                                                        ?>
                                                                        <span class="badge badge-danger">Arrers</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                
                                                                @endif
                                                                
                                                                
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            
                                            <hr>
                                            
                                            <table align="center" width="100%">
                                                <tr>
                                                    <td><b>Loan ID</b>: <span
                                                        id="ldlid">{{$installmentpy->custom_loanId}}</span></td>
                                                        <td><b>Loan Type:</b> <span id="ldltype">
                                                            <?php
                                                            $datalntyp = DB::table('loantype')
                                                            ->where('loanTypeId', $installmentpy->loanTypeId)
                                                            ->first();
                                                            ?>
                                                            {{$datalntyp->name}}
                                                        </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Amount:</b> <span
                                                            id="ldamount">{{$installmentpy->amount}}</span></td>
                                                            <td><b>Paid Amount:</b> <span
                                                                id="ldpamount">{{$installmentpy->paidAmount}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Taken Date:</b> <span
                                                                id="ldtdate">{{$installmentpy->takenDate}}</span></td>
                                                                <td><b>End Date:</b> <span
                                                                    id="ldedate">{{$installmentpy->endDate}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Arrears month Count:</b> <span
                                                                        id="ldtdate">{{$countmonths}}</span></td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                                
                                                                <br>
                                                                <hr>
                                                                <div class="col-md-12">
                                                                    
                                                                    <div class="form-row">
                                                                        
                                                                        <div class="form-group col-md-3">
                                                                            <label>Arrers Month Count </label>
                                                                            <input type="number" id="mnthcount" name="mnthcount"
                                                                            class="form-control" placeholder="Payable Amount"
                                                                            value="{{$countmonths}}" disabled>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label>Installment Amount</label>
                                                                            <input type="number" id="amntinstallment"
                                                                            name="amntinstallment" class="form-control"
                                                                            placeholder="installment" value="{{$installmentamount}}"
                                                                            disabled>
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label>Interest</label>
                                                                            <input type="number" id="intrstval" name="intrstval"
                                                                            class="form-control" placeholder="%">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label>Calculate</label>
                                                                            <span onclick="calArrersInstallment()"
                                                                            class="btn btn-sm btn-secondary btn-block">
                                                                            <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                                            <span id="payment-button-amount">Calculate</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    
                                                                    <div class="form-group col-md-4">
                                                                        <label>Total Payable Amount</label>
                                                                        <input type="number" id="duetot" name="duetot"
                                                                        class="form-control" placeholder="Payable Amount"
                                                                        value="" disabled>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Installment Total</label>
                                                                        <input type="number" id="instot" name="instot"
                                                                        class="form-control" placeholder="installment total"
                                                                        disabled>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Total Panelty Amount</label>
                                                                        <input type="number" id="panaltyamount" name="panaltyamount"
                                                                        class="form-control" placeholder="Panelty Amount"
                                                                        disabled>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <hr>
                                                                <div class="form-row">
                                                                    
                                                                    <div class="form-group col-md-6">
                                                                        <label>Payment Installment Count</label>
                                                                        <input type="number" id="installmentcount"
                                                                        name="installmentcount" class="form-control"
                                                                        placeholder="Payment Installment Count"
                                                                        value="{{$countmonths}}">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Calculate</label>
                                                                        <span onclick="calPaidAmount()"
                                                                        class="btn btn-sm btn-secondary btn-block">
                                                                        <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                                        <span id="payment-button-amount">Calculate Paid
                                                                            Amount</span>
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-row">
                                                                    
                                                                    <div class="form-group col-md-12">
                                                                        <label>Payment Amount</label>
                                                                        <input type="number" id="pymntamnt" name="pymntamnt"
                                                                        class="form-control" placeholder="Payment Amount"
                                                                        disabled>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <span onclick="makeInstallmentPayment()"
                                                                    class="btn btn-sm btn-success btn-block">
                                                                    <i class="fa fa-plus fa-sm"></i>&nbsp;
                                                                    <span id="payment-button-amount">Pay</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                
                                
                            </div>
                        </form>
                        
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
                    document.getElementById("cshrcvlnpy").setAttribute("class", "menu-item-has-children dropdown active");
                });
            </script>
            
            <script>
                function calArrersInstallment(){
                    var mnthcount = document.getElementById("mnthcount").value; // arresrs month count
                    var insamount = document.getElementById("amntinstallment").value; // installment amount
                    var interestamnt = document.getElementById("intrstval").value; // entered interest amount
                    
                    var interstformnth =  (insamount / 100) * interestamnt;   // interest for month panelty                     
                    var pnltycount =(mnthcount * (+mnthcount + +"1") ) /2 ;   // panelty total month count                    
                    var panaltytot = interstformnth * pnltycount  ; // total panelty
                    var instot = mnthcount * insamount; // installment total
                    var totdue = instot + panaltytot  //due total
                    
                    document.getElementById("duetot").value = totdue;
                    document.getElementById("instot").value = instot;
                    document.getElementById("panaltyamount").value = panaltytot;
                    
                }
                function calPaidAmount(){
                    var pyinstallmentcount = document.getElementById("installmentcount").value;
                    var mnthcount = document.getElementById("mnthcount").value; // arresrs month count
                    var insamount = document.getElementById("amntinstallment").value; // installment amount
                    var interestamnt = document.getElementById("intrstval").value; // entered interest amount
                    // Sn = (n/2)*  ((2*a) + ((n-1)*d)) //panelty total month count
                    // n= payment installment count 
                    // a= arrers installment count 
                    // d= -1
                    // Sn= Panelty Count
                    
                    var interstformnth = (insamount / 100) * interestamnt; // interest for month panelty
                    var pnltycount = (pyinstallmentcount / 2) * (( 2 * mnthcount) + (( pyinstallmentcount - 1 ) * (-1) )); // panelty total month count
                    var panaltytot = interstformnth * pnltycount ; // total panelty
                    var instot = pyinstallmentcount * insamount; // installment total
                    var totdue = instot + panaltytot //due total
                                     
                    var totpaid = document.getElementById("pymntamnt").value = totdue;
                    
                }
                function makeInstallmentPayment(){
                    alert('call')
                }
            </script>
            
        </body>
        
        </html>