<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Monthly Loan Create</title>
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
                            <li class="active">Monthly Loan Create</li>
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
                                <strong class="card-title">Monthly Loan Create Sheet</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card">

                                                    <div class="card-body card-block">
                                                        <form action="" method="post" class="form-horizontal">

                                                            <div class="row form-group">
                                                                <div class="col col-md-12">
                                                                    <div class="input-group">
                                                                        <input type="text" id="input2-group2"
                                                                            name="input2-group2"
                                                                            placeholder="Search Customer Name"
                                                                            class="form-control">
                                                                        <div class="input-group-btn"><button
                                                                                class="btn btn-primary">Search</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="monthly">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1">Loan
                                                                    Amount</label>
                                                                <input id="cc-pament" name="cc-payment" type="text"
                                                                    class="form-control" aria-required="true"
                                                                    aria-invalid="false" value="100.00">
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="select" class=" form-control-label">Interest</label></div>
                                                                <div class="col-12 col-md-9">
                                                                    <select name="select" id="select" class="form-control">
                                                                        <option value="0">Please select</option>
                                                                        <option value="1">5</option>
                                                                        <option value="2">10</option>
                                                                        <option value="3">12</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="row form-group">
                                                            
                                                                <div class="col-12 col-md-9">
                                                                    <select name="select" id="select_id" class="form-control" onchange="HandleChqequ();">
                                                                        <option value="0">Please Select Payment Method</option>
                                                                        <option value="1">Cash</option>
                                                                        <option value="2">Cheque</option>
                                                                       
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="HIDDN1">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment" class="control-label mb-1">
                                                                           Cheque Number</label>
                                                                        <input id="chquenum" name="cc-payment" type="text"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false" placeholder="Cheque Number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment" class="control-label mb-1">
                                                                            Select Account</label>
                                                                        <select name="select" id="selectid" class="form-control" onchange="HandleChqequ();">
                                                                            <option value="0">04102</option>
                                                                            <option value="1">60210</option>
                                                                            <option value="2">80452</option>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="HIDDN2">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cc-payment" class="control-label mb-1">
                                                                           Bank Name</label>
                                                                        <input id="chquenum" name="cc-payment" type="text"
                                                                            class="form-control" aria-required="true"
                                                                            aria-invalid="false" placeholder="bank name">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-5">
                                                                    <h6>dema metanata date Chooser ekak dapanko</h6>
                                                                </div>
                                                            </div>
                                                            
                                                            <div>
                                                                <button id="payment-button" type="submit"
                                                                    class="btn btn-lg btn-info btn-block">
                                                                    <i class="fa fa-eye fa-lg"></i>&nbsp;
                                                                    <span id="payment-button-amount">View Plan</span>
                                                                    <span id="payment-button-sending"
                                                                        style="display:none;">Sending…</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <aside class="profile-nav alt">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img class="align-self-center rounded-circle mr-3"
                                                                        style="width:85px; height:85px;" alt=""
                                                                        src="images/admin.jpg">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h2 class="text-light display-6">Jim Doe</h2>
                                                                    <p>Batch Name</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <a href="#"> <i class="fa fa-phone"></i> 0711225524</a>
                                                            </li>
                                                        </ul>

                                                    </section>
                                                </aside>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong class="card-title">Customer Loan History</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Arrears</th>
                                                                    <th scope="col">Comment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">2020/1/20</th>
                                                                    <td>100000.00</td>
                                                                    <td>00.00</td>
                                                                    <td>@mdo</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2020/1/20</th>
                                                                    <td>120000.00</td>
                                                                    <td>00.00</td>
                                                                    <td>@fat</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2020/1/20</th>
                                                                    <td>120000.00</td>
                                                                    <td>00.00</td>
                                                                    <td>@fat</td>
                                                                </tr>


                                                                <tr>
                                                                    <th scope="row">2020/1/20</th>
                                                                    <td>150000.00</td>
                                                                    <td scope="row" style="color: red">35000.00</td>
                                                                    <td>@twitter</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row">

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
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Reg No</th>
                                                                <th>Name</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Amount</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>65664564V</td>
                                                                <td>Sample Name</td>
                                                                <td>2020-06-20</td>
                                                                <td>2100.00</td>

                                                            </tr>
                                                            <tr>
                                                                <td>65664564V</td>
                                                                <td>Sample Name</td>
                                                                <td>2020-06-21</td>
                                                                <td>2100.00</td>

                                                            </tr>
                                                            <tr>
                                                                <td>65664564V</td>
                                                                <td>Sample Name</td>
                                                                <td>2020-06-22</td>
                                                                <td>2100.00</td>

                                                            </tr>

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
                                        <button id="payment-button" type="submit"
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
               document.getElementById("loanmngsb").setAttribute("class", "menu-item-has-children dropdown active");
             });
             function HandleChqequ(){
                 var name = document.getElementById("select_id").value;
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
    </script>

</body>

</html>