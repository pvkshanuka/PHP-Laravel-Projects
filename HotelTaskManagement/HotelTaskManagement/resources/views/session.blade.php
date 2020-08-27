@extends('master')

@section('content')
<div class="container">
    <br>
    <h3 align="center">Hotel Session Management</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br>
    <table id="session_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>EMP</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Details</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="sessionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="session_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Session</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>EMP ID</label>
                        <input type="number" name="emp_id" id="emp_id" class="form-control" placeholder="Enter EMP ID"/>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" name="stime" id="stime" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" name="etime" id="etime" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <input type="text" name="details" id="details" class="form-control" placeholder="Enter Session Details"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="session_id" id="session_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        $('#session_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('session.getdata')}}",
            "columns": [
                { "data": "id" },
                { "data": "emp" },
                { "data": "stime2" },
                { "data": "etime2" },
                { "data": "details"},
                { "data": "status2"},
                { "data": "action", orderable: false, searchable: false }
            ]
        });


        $('#add_data').click(function () {
            $('#sessionModal').modal('show');
            $('#session_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
        });


        $('#session_form').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('session.postdata') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.error.length > 0) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else {
                        $('#session_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Task');
                        $('#button_action').val('insert');
                        $('#session_table').DataTable().ajax.reload();
                        $('#form_output').html(data.success);
                    }
                }
            })
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).attr("id");
            $('#form_output').html('');
            $.ajax({
                url: "{{route('session.fetchdata')}}",
                method: 'get',
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    if (data.error.length > 0) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else {
                        $('#emp_id').val(data.emp_id);
                        $('#stime').val(data.stime);
                        $('#etime').val(data.etime);
                        $('#details').val(data.details);
                        $('#session_id').val(id);
                        $('#sessionModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Task');
                        $('#button_action').val('update');
                    }
                }
            })
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            if (confirm("Are you sure you want to Delete this data?")) {
                $.ajax({
                    url: "{{route('session.removedata')}}",
                    mehtod: "get",
                    data: { id: id },
                    success: function (data) {
                        alert(data);
                        $('#session_table').DataTable().ajax.reload();
                    }
                })
            }
            else {
                return false;
            }
        });

        $(document).on('click', '.complete', function () {
            var id = $(this).attr('id');
            // if (confirm("Are you sure you want to Delete this data?")) {
                $.ajax({
                    url: "{{route('session.complete')}}",
                    mehtod: "get",
                    data: { id: id },
                    success: function (data) {
                        alert(data);
                        $('#session_table').DataTable().ajax.reload();
                    }
                })
            // }
            // else {
            //     return false;
            // }
        });

    });

</script>

@endsection