@foreach($ccmodel as $calsmry)
<div class="row">
    <div class="col-sm-12 mb-4">
        <div class="card-group">

            <div class="card col-md-4 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-dollar"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry[0]}}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Loan Amount</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-4 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-dollar"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry[3] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Interest / Installment</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-4 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-calandar"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>{{ $calsmry[1] }}</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Taken Date</small>
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
                        $rid =$calsmry[2];
                        $rtnm = DB::table('loanType')
                        ->where('loanTypeId', $rid)
                        ->get();
                        // this will return customer name
                        
                        foreach ($rtnm as $rt) {
                            
                            
                            ?>
                        <p id="cnic">{{ $rt->name }}</p>
                        <?php
                        }
                        
                        ?>
                        <span>route</span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Loan Type</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>


        </div>
    </div>
</div>
@endforeach