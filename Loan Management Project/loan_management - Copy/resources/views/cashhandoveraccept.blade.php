<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sanju enterprises - Collected Cash Handover Manage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sanju enterprises - Collected Cash Handover Manage">
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
                        <h1>Cash Collect manage</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/cashcollect"> Cash Handover Manage </a></li>
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
                                <strong class="card-title">Collected Cash Recived </strong>
                            </div>
                            <div class="card-body">


                                @if (is_array($cshsmry) || is_object($cshsmry))
                                @foreach ($cshsmry['smrydta'] as $cald)
                                @if ($cald['statuspaid']=='0' )
                                <div class="alert alert-warning">Already received cash from this routes</div>
                                @endif
                                @endforeach
                                @endif

                                {{-- @if(isset($flag)&&$flag==1)
                                    <div class="alert alert-success">Record Added Successfull</div>
                                    @endif --}}
                                <form action="/checkCashHandover" id="checkcollectamountform" method="POST"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="containe">
                                        <div class="row">

                                            <div class="col-sm-12 col-md-4 {{$errors->has('sdate')?'has-error' : ''}}">
                                                <label>Select Date</label>
                                                <input type="date" id="sdate" name="datecsh"
                                                    class="form-control form-control-sm"
                                                    aria-controls="bootstrap-data-table-export"
                                                    value="{{ old('sdate')}}">
                                                @error('datecsh')
                                                <small class="help-block form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div
                                                class="form-group col-md-4 {{$errors->has('routrcsh')?'has-error' : ''}}">
                                                <label>Select Route</label><br>
                                                <select name="routrcsh" id="route_id" class="form-control-sm">
                                                    <option value="0">Please Select Route</option>
                                                    <?php
                                                $route_data = DB::table('route')->where('status',1)->get();
                                                foreach ($route_data as  $rname) {?>
                                                    <option value="{{$rname->routeId}}">{{$rname->routename}}</option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                                @error('routrcsh')
                                                <small class="help-block form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>&nbsp;</label>
                                                <button id="Savebtn" type="submit" class="btn btn-sm btn-info btn-block"
                                                    type="submit">
                                                    <i class="fa fa-plus fa-eye"></i>&nbsp;
                                                    <span id="payment-button-amount">Calculate</span>
                                                </button>
                                                {{-- <button id="Savebtn" type="submit" class="btn btn-sm btn-info btn-block"
                                        onclick="cashHandoverCheck();">
                                        <i class="fa fa-plus fa-eye"></i>&nbsp;
                                        <span id="payment-button-amount">Calculate</span>
                                    </button> --}}
                                            </div>

                                        </div>
                                        <hr>

                                        <div id="calcollection" class="container">
                                            @if (is_array($cshsmry) || is_object($cshsmry))


                                            @foreach ($cshsmry['smrydta'] as $cald)
                                            @if ($cald['statuspaid']=='0' )

                                            @else

                                            <div class="col-6 col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="clearfix">
                                                            <i
                                                                class="fa fa-calendar bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                                                            <div class="h5 text-secondary mb-0 mt-1">
                                                                {{ $cald['selectdate'] }}</div>
                                                            <div
                                                                class="text-muted text-uppercase font-weight-bold font-xs small">
                                                                Selected Date</div>
                                                            <input type="text" id="ressltdate" name="ressltdate"
                                                                class="form-control form-control-sm" hidden
                                                                value="{{ $cald['selectdate'] }}">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="clearfix">
                                                            <i
                                                                class="fa fa-compass bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                                                            <div class="h5 text-secondary mb-0 mt-1">
                                                                {{ $cald['selectedroutename'] }}</div>
                                                            <div
                                                                class="text-muted text-uppercase font-weight-bold font-xs small">
                                                                Selected Route</div>
                                                            <input type="text" id="retrtid" name="retrtid"
                                                                class="form-control form-control-sm" hidden
                                                                value="{{ $cald['selectedrid'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body p-0 clearfix">
                                                        <i
                                                            class="fa fa-money bg-info p-4 font-2xl mr-3 float-left text-light"></i>
                                                        <div class="h5 text-info mb-0 pt-3">
                                                            <span id="clctionamnt"
                                                                name="clctionamnt">{{ $cald['targetamount'] }}</span>
                                                        </div>
                                                        <div
                                                            class="text-muted text-uppercase font-weight-bold font-xs small">
                                                            Daily Target (Rs.)</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body p-0 clearfix">
                                                        <i
                                                            class="fa fa-money bg-info p-4 font-2xl mr-3 float-left text-light"></i>
                                                        <div class="h5 text-info mb-0 pt-3">
                                                            <span id="clctedamnt"
                                                                name="clctedamnt">{{ $cald['collectedamount'] }}</span>
                                                        </div>
                                                        <div
                                                            class="text-muted text-uppercase font-weight-bold font-xs small">
                                                            Collected Amount (Rs.)</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body p-0 clearfix">
                                                        <i
                                                            class="fa fa-money bg-info p-4 font-2xl mr-3 float-left text-light"></i>
                                                        <div class="h5 text-info mb-0 pt-3">
                                                            <span id="clctedarersamnt"
                                                                name="clctedarersamnt">{{ $cald['arrersamount'] }}</span>
                                                        </div>
                                                        <div
                                                            class="text-muted text-uppercase font-weight-bold font-xs small">
                                                            Collected Arrers (Rs.)</div>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif

                                            @endforeach
                                            @endif

                                            <table id="bootstrap-data-table-export"
                                                class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>NIC</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cctbdy">
                                                    @if (is_array($cshsmry) || is_object($cshsmry))

                                                    @foreach ($cshsmry['qrydata'] as $smry)

                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $smry['nic'] }}</td>
                                                        <td class="sorting_1"><span>{{ $smry['name'] }}</span>
                                                        <td class="sorting_1"><span>{{ $smry['cpno'] }}</span>
                                                        </td>
                                                        <td>
                                                            {{ $smry['datec'] }}
                                                        </td>
                                                        <td>
                                                            @if ($smry['statusins'] == 0 )
                                                            <span class="badge badge-danger">Arrears</span>
                                                            @elseif ($smry['statusins'] == 1)
                                                            <span class="badge badge-info">Collected</span>
                                                            @endif
                                                        </td>


                                                    </tr>
                                                    @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                </form>

                            </div>


                        </div> <!-- .card -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>&nbsp;</label>
                        <button class="btn btn-sm btn-info btn-block" onclick="addcashHandoverReceived()">
                            <i class="fa fa-plus fa-sm"></i>&nbsp;
                            <span id="payment-button-amount">Add</span>
                        </button>
                        <br><br><br>
                    </div>
                </div>
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
            document.getElementById("cshclctmngmngsb").setAttribute("class", "menu-item-has-children dropdown active");
        });
    </script>

    <script>
        // $(document).ready(function () {
            //     $("#checkcollectamountform").submit(function () {
                //         $("#sdate").attr("readonly", true);
                //         return true;
                //     });
                // });
                
                function cashHandoverCheck()
                {   
                    
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');          
                    var route = document.getElementById("route_id").value
                    var firstd = document.getElementById('sdate').value;       
                    $.ajax({
                        url: "/checkCashHandover",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            routrcsh: route,
                            datecsh: firstd
                            
                        },
                        success:function(response){
                            console.log(response);
                            if(response.status == 1){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: ''+response.errors[0]
                                });
                            }else{
                                if(response.paidstatus == true){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        type: 'warning',
                                        title: 'Already Handovered Cash of this day on this route'
                                    });
                                }else {
                                    document.getElementById("containercamount").innerHTML = "";
                                    
                                    var newElement = document.createElement('input');
                                    newElement.setAttribute("class", "form-control");
                                    newElement.setAttribute("value", ""+response.targetamount+"");
                                    newElement.setAttribute("id", "dcollectionamount");
                                    newElement.setAttribute("readonly", "true");
                                    document.getElementById("containercamount").appendChild(newElement);
                                    
                                    document.getElementById("containercollectedamount").innerHTML = "";
                                    
                                    var newElement2 = document.createElement('input');
                                    newElement2.setAttribute("class", "form-control");
                                    newElement2.setAttribute("value", ""+response.collectamount+"");
                                    newElement2.setAttribute("id", "collectedamount");
                                    newElement2.setAttribute("readonly", "true");
                                    document.getElementById("containercollectedamount").appendChild(newElement2);
                                    
                                    document.getElementById("route_id").disabled = true;
                                    document.getElementById('sdate').disabled = true;
                                    
                                }
                            }                                                             
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
                                title: 'Error'
                            });
                            
                        }
                    });
                    
                }
                
                function addcashHandoverReceived(){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var camount = document.getElementById("clctionamnt").innerHTML
                    var clctedarersamnt = document.getElementById("clctedarersamnt").innerHTML
                    var cltdamnt = document.getElementById('clctedamnt').innerHTML
                    var route = document.getElementById("retrtid").value
                    var firstd = document.getElementById('ressltdate').value
                    $.ajax({
                        url: "/approvehandover",
                        type:"POST",
                        data: {_token: CSRF_TOKEN,
                            routrcsh: route,
                            datecsh: firstd,
                            cltamnt: camount,
                            arrersamnt: clctedarersamnt,
                            cltedamnt: cltdamnt
                            
                        },
                        success:function(response){
                            console.log(response);
                            // console.log(response.status.length);
                            if(response.status == 1){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'error',
                                    title: ''+response.errors[0]
                                });
                            }else if(response.status == 2){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'warning',
                                    title: 'Please Calculate again'
                                });
                            }else if(response.status == 3){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'warning',
                                    title: 'Already Received cash from this route of this date'
                                });
                            }else {
                                location.replace("/cashcollect")
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                Toast.fire({
                                    type: 'success',
                                    title: 'Added Success'
                                });
                                
                            }
                            
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
                                title: 'Error'
                            });
                            
                        }
                    });
                    
                }
                
    </script>

</body>

</html>