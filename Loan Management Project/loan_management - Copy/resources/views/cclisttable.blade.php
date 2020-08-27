<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NIC</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="cctbdy">
        @foreach($CashCollectorLoad as $cclist)<tr>
            <td>{{$cclist->nic}}</td>
            <td>{{$cclist->name}}</td>
            <td>{{$cclist->pno}}</td>
            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#mediumModal">More
                    Details</button></td>
        </tr>
        @endforeach
    </tbody>
</table>