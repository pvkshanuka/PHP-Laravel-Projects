<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Sanju enterprises - Monthly loan Reports</title>
    {{-- {{-- <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}

    {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> --}}
</head>

<body>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>


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

                                    @foreach ($qrydata as $qrysmry)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $qrysmry['cnic']}}</td>
                                        <td class="sorting_1">{{ $qrysmry['cname'] }}</td>
                                        <td class="sorting_1">@if($qrysmry['ltype']==4)

                                            <span class="font-weight-bold">Property Loan</span>

                                            @elseif($qrysmry['ltype']==5)

                                            <span class="font-weight-bold">Vehicle Loan</span>
                                            @endif
                                        </td>
                                        <td class="sorting_1">{{$qrysmry['ldate']}}</td>
                                        <td class="sorting_1">{{$qrysmry['edate']}}</td>
                                        <td class="sorting_1">{{ $qrysmry['lrate'] }} %</td>
                                        <td class="sorting_1">{{ $qrysmry['lamount'] }}</td>
                                        <td class="sorting_1">{{ $qrysmry['lpaidamount']}}</td>
                                        <td class="sorting_1">@if($qrysmry['lstatus']==1)
                                            <span class="badge badge-success">Active</span>

                                            @elseif($qrysmry['lstatus']==2)
                                            <span class="badge badge-warning">pennding</span>

                                            @elseif($qrysmry['lstatus']==4)
                                            <span class="badge badge-dark">not approve</span>

                                            @elseif($qrysmry['lstatus']==6)
                                            <span class="badge badge-primary">finish</span>

                                            @elseif($qrysmry['lstatus']==3)
                                            <span class="badge badge-light">Transfer Loan</span>


                                            @endif

                                        </td>


                                    </tr>
                                    {{-- {{$qrysmry['idcustomer']}}
                                    {{$qrysmry['name']}} --}}

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


</body>

</html>