<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Monthly loan Reports</title>
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

<body onload="">


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
                        <h1>Loan Report</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Property Loan Report</li>

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
                                <strong class="card-title">Property loan Summary</strong>

                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i
                                                            class="ti-money text-success border-success"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text"><strong>Total Amount</strong></div>

                                                        <div id="tot" class="stat-digit">Rs:00.00</div>
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
                                                    <div class="stat-icon dib"><i
                                                            class="ti-money text-success border-success"></i></div>
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
                                                    <div class="stat-icon dib"><i
                                                            class="ti-money text-success border-success"></i></div>
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
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <form action="/propertyLoanAdSearch" id="checkcollectamountform" method="POST"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="content mt-3">

                            </form>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                        <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                            <label>LoanType :
                                                <select id="loantype" name="Ltype"
                                                    aria-controls="bootstrap-data-table-export"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="0">All</option>
                                                    <option value="4">Property Loan</option>
                                                    <option value="5">Vehicle Loan</option>
                                                </select> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-4">
                                    <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                        <div class="dataTables_length" id="bootstrap-data-table-export_length">
                                            <label>Status :
                                                <select id="status" name="Lstatus"
                                                    aria-controls="bootstrap-data-table-export"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="0">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Pending</option>
                                                    <option value="4">Not Approve</option>
                                                    <option value="6">Finish</option>
                                                </select> </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4 col-md-4" id="bootstrap-data-table-export_length">
                                    <label>Rate:
                                        <input type="number" name="rate" class="form-control form-control-sm" />
                                    </label>
                                </div>

                            </div>

                            <div class="row">



                                <div class="col-sm-12 col-md-3">
                                    <label>Start Date:<input onchange="checkfield(this);" type="date" id="sd"
                                            name="sdate" class="form-control form-control-sm"
                                            aria-controls="bootstrap-data-table-export"></label>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <label>End Date:<input onchange="checkfield(this);" type="date" id="ed" name="edate"
                                            class="form-control form-control-sm"
                                            aria-controls="bootstrap-data-table-export"></label>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <label>Search :<br><button type="submit"
                                            class="btn btn-dark btn-sm">Search</button></label>
                                </div>
                                {{-- <div class="col-sm-12 col-md-3">
                                    <label>Print :<br> <a href="/customerprintpdf"
                                            class="btn btn-secondary btn-sm">Download
                                            Report</a></label>
                                </div> --}}
                                <div class="col-sm-12 col-md-3">
                                    <label>Print :<br> <button class="btn btn-secondary btn-sm">Download
                                            Report</button></label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIC</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Taken Date</th>
                                        <th>End Date</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (is_array($ldata ?? '') || is_object($ldata ?? ''))


                                    @foreach ($ldata as $smry)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $smry->cnic}}</td>
                                        <td class="sorting_1">{{ $smry->cname }}</td>
                                        <td class="sorting_1">@if($smry->ltype==4)

                                            <span class="font-weight-bold">Property Loan</span>

                                            @elseif($smry->ltype==5)

                                            <span class="font-weight-bold">Vehicle Loan</span>
                                            @endif
                                        </td>
                                        <td class="sorting_1">{{$smry->ldate}}</td>
                                        <td class="sorting_1">{{$smry->edate}}</td>
                                        <td class="sorting_1">{{ $smry->lrate }}%</td>
                                        <td class="sorting_1">{{ $smry->lamount }}</td>
                                        <td class="sorting_1">{{ $smry->lpaidamount}}</td>
                                        <td class="sorting_1">@if($smry->lstatus==1)
                                            <span class="badge badge-success">Active</span>

                                            @elseif($smry->lstatus==2)
                                            <span class="badge badge-warning">pennding</span>

                                            @elseif($smry->lstatus==4)
                                            <span class="badge badge-dark">not approve</span>

                                            @elseif($smry->lstatus==6)
                                            <span class="badge badge-primary">finish</span>

                                            @elseif($smry->lstatus==3)
                                            <span class="badge badge-light">Transfer Loan</span>


                                            @endif

                                        </td>


                                    </tr>
                                    @endforeach

                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- .content -->
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
        document.getElementById("loanreportsb").setAttribute("class", "menu-item-has-children dropdown active");
             sumData();
        });

   function sumData(){
            var table = document.getElementById("bootstrap-data-table-export"), sumVal = 0;
            var table1 = document.getElementById("bootstrap-data-table-export"), sumVal1 = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseFloat(table.rows[i].cells[6].innerHTML);
                sumVal1 = sumVal1 + parseFloat(table.rows[i].cells[7].innerHTML);
            }
            
            document.getElementById("tot").innerHTML ="Rs : "+sumVal+".00";
            document.getElementById("pay").innerHTML ="Rs : "+sumVal1+".00";
            document.getElementById("due").innerHTML ="Rs : "+(sumVal-sumVal1)+".00";
            console.log(sumVal);
        }


    </script>

</body>

</html>