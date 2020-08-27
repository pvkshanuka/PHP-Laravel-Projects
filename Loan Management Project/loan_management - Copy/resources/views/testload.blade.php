@foreach ($ccmodel as $tbl)
<tr role="row" class="odd">
    <td class="sorting_1">{{ $tbl->name }}</td>
    <td class="sorting_1">{{ $tbl->nic }}</td>
    <td>
       {{ $tbl->email }}
    </td>
    <td><span class="text-success">Deactive</span></td>
    <td><button type="button" class="btn btn-outline-primary btn-sm mb-1" data-toggle="modal"
            data-target="#mediumModalcusUpdate">Update</button>
    </td>
    <td><button type="button" class="btn btn-outline-danger btn-sm">Active</button>
    </td>
</tr>

@endforeach

{{ $ccmodel->links() }}
{{-- {{ $tbl->links() }} --}}