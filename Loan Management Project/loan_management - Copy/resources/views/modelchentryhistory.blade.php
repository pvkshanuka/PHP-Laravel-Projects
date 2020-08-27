@if (is_array($cshsmry) || is_object($cshsmry))

@foreach ($cshsmry['smry'] as $calsmry)
<div class="row">
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $calsmry['amount'] }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Target Amount (Rs.)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $calsmry['collectedamount'] }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Collected Amount (Rs.)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-secondary mb-0 mt-1">{{ $calsmry['arrershvamount'] }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Arrers COllected Amount (Rs.)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- --------------------summery list-------------------- --}}
<div class="row">
    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry['empname'] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Handovered Employee</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-compass"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry['routename'] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Route Name</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry['collectiondate'] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Collection Date</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry['handoverdate'] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Handovered Date</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- --------------------summery list-------------------- --}}

@endforeach
@endif

<div class="card">
    <div class="card-header">
        <strong class="card-title">Cash Collect History</strong>
    </div>
    <div class="card-body">
        <table class="table" id="loantable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NIC</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Payable Date</th>
                    <th scope="col">Paid Date</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody id="loadcustomerloandetails">
                @if (is_array($cshsmry) || is_object($cshsmry))

                @foreach ($cshsmry['entryhistory'] as $ensmry)

                @if ($ensmry['statusins'] ==2 || $ensmry['statusins'] == 1 )
                {{-- need to write quary for retrive date of installment paid     --}}
                <?php
                $instllid =$ensmry['installmentId'];
                $lstinspays = DB::table('installmentpay')
                ->where('installmentId', $instllid)
                ->get();
                // this will return the list of installmentpays of intallments
                
                foreach ($lstinspays as $insp) {
                    
                    
                    $installmentpayabledate = $ensmry['datec'];
                    $installmentpaiddate = $insp->datec;
                    
                    ?>
                <tr>
                    <td><span class="badge badge-Light">{{$ensmry['nic']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['name']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['pno']}}</span></td>
                    <td><span class="badge badge-Light">{{$installmentpayabledate}}</span></td>
                    <td><span class="badge badge-Light">{{$installmentpaiddate}}</span></td>
                    <td><span class="badge badge-success">Paid</span></td>

                </tr>

                <?php
                }
                
                ?>

                @else
                {{-- not paid installment yet --}}
                <tr>
                    <td><span class="badge badge-Light">{{$ensmry['nic']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['name']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['pno']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['datec']}}</span></td>
                    <td><span class="badge badge-Light">None</span></td>
                    <td><span class="badge badge-danger">Arrers</span></td>

                </tr>

                @endif


                @endforeach
                @endif

            </tbody>
        </table>

    </div>

</div>