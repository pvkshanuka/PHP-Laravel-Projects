@foreach($ccmodel as $ccdetails)

<tr>
    <th scope="row">{{$ccdetails->custom_loanId}}</th>
    <td>{{$ccdetails->amount}}</td>
    <td>{{$ccdetails->takenDate}}</td>
    <td>{{$ccdetails->endDate}}</td>
    <?php
    $today = Carbon\Carbon::now();
    $datefmt = $today->format('Y-m-d');
    ?>
    @if ($ccdetails->endDate < $datefmt ) @if ($ccdetails->status == 1)
        <td><span class="badge badge-danger">Arrers</span></td>
        @elseif($ccdetails->status == 2)
        <td><span class="badge badge-info">Pending Loan</span></td>
        @elseif($ccdetails->status == 3)
        <td><span class="badge badge-warning">Transfered Loan</span></td>
        @elseif($ccdetails->status == 4)
        <td><span class="badge badge-warning">Not approve Loan</span></td>
        @elseif($ccdetails->status == 6)
        <td><span class="badge badge-success">Loan Finished</span></td>

        @endif

        <td><span class="badge badge-danger"></span></td>
        @else
        <td><span class="badge badge-secondary">Loan Ongoing</span></td>

        @endif
</tr>
@endforeach