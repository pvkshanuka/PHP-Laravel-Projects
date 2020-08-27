@extends('master')

@section('content')
<div class="container">
    <br>
    <h3 align="center">Hotel Task Management</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br>
    <table id="task_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Task ID</th>
                <th>Date</th>
                <th>Venue</th>
                <th>EMP</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="taskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="task_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Task</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter EMP ID</label>
                        <input type="number" name="emp_id" id="emp_id" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" name="date" id="date" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter Venue</label>
                        <input type="text" name="venue" id="venue" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="task_id" id="task_id" value="" />
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
        $('#task_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('task.getdata')}}",
            "columns": [
                { "data": "id" },
                { "data": "date" },
                { "data": "venue" },
                { "data": "emp" },
                { "data": "status2"},
                { "data": "action", orderable: false, searchable: false }
            ]
        });


        $('#add_data').click(function () {
            $('#taskModal').modal('show');
            $('#task_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
        });


        $('#task_form').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('task.postdata') }}",
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
                        $('#task_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Task');
                        $('#button_action').val('insert');
                        $('#task_table').DataTable().ajax.reload();
                        $('#form_output').html(data.success);
                    }
                }
            })
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).attr("id");
            $('#form_output').html('');
            $.ajax({
                url: "{{route('task.fetchdata')}}",
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
                        $('#venue').val(data.venue);
                        $('#date').val(data.date);
                        $('#task_id').val(id);
                        $('#taskModal').modal('show');
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
                    url: "{{route('task.removedata')}}",
                    mehtod: "get",
                    data: { id: id },
                    success: function (data) {
                        alert(data);
                        $('#task_table').DataTable().ajax.reload();
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
                    url: "{{route('task.complete')}}",
                    mehtod: "get",
                    data: { id: id },
                    success: function (data) {
                        alert(data);
                        $('#task_table').DataTable().ajax.reload();
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