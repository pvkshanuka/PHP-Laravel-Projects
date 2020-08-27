@if (is_array($cshsmry) || is_object($cshsmry))

@foreach ($cshsmry['smry'] as $calsmry)
<aside class="profile-nav alt">
    <section class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <a href="#">
                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt=""
                        src="images/1593970758.jpg">
                </a>
                <div class="media-body">
                    <h2 class="text-light display-6" id="cname">{{ $calsmry['cusname'] }}</h2>
                    <?php
                    $instllid =$calsmry['customerLevelId'];
                    $lstinspays = DB::table('customerlevel')
                    ->where('customerLevelId', $instllid)
                    ->get();
                    // this will return customer name
                    
                    foreach ($lstinspays as $insp) {
                        
                        
                        ?>
                    <p id="cnic">{{ $insp->cuslevelname }}</p>
                    <?php
                    }
                    
                    ?>
                </div>
            </div>
        </div>

    </section>

</aside>
<div class="row">
    <div class="col-sm-12 mb-4">
        <div class="card-group">

            <div class="card col-md-4 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-sort-numeric-asc"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry['nic'] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">NIC</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-4 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry['pno'] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Mobile Number</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-4 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-compass"></i>
                    </div>

                    <div class="h4 mb-0">
                        <?php
                        $rid =$calsmry['routeId'];
                        $rtnm = DB::table('route')
                        ->where('routeId', $rid)
                        ->get();
                        // this will return customer name
                        
                        foreach ($rtnm as $rt) {
                            
                            
                            ?>
                        <p id="cnic">{{ $rt->routename }}</p>
                        <?php
                        }
                        
                        ?>
                        <span>route</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Handovered Date</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>


        </div>
    </div>
</div>
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
                    <th scope="col">Amount</th>
                    <th scope="col">Taken Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody id="loadcustomerloandetails">
                @if (is_array($cshsmry) || is_object($cshsmry))

                @foreach ($cshsmry['entryhistory'] as $ensmry)

                <tr>
                    <td><span class="badge badge-Light">{{$ensmry['amount']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['takenDate']}}</span></td>
                    <td><span class="badge badge-Light">{{$ensmry['endDate']}}</span></td>
                    @if ($ensmry['loanstatus'] ==1 )
                    <td><span class="badge badge-info">On Going</span></td>
                    @elseif($ensmry['loanstatus'] ==2)
                    <td><span class="badge badge-warning">Pending</span></td>
                    @elseif($ensmry['loanstatus'] ==3)
                    <td><span class="badge badge-info">Tranfered with some other Loan </span></td>
                    @elseif($ensmry['loanstatus'] ==4)
                    <td><span class="badge badge-danger">Rejected</span></td>
                    @elseif($ensmry['loanstatus'] ==6)
                    <td><span class="badge badge-success">Finished</span></td>
                    @endif
                </tr>

                @endforeach
                @endif

            </tbody>
        </table>

    </div>

</div>