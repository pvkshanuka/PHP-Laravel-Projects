@extends('master')

@section('content')
<div class="container">
    <br>
    <h3 align="center">Student Sport Management</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br>
    <table id="sport_table" class="table table-striped" style="width:100%;background-color: lightgoldenrodyellow">
        <thead>
            <tr>
                <th>Sport ID</th>
                <th>Sport</th>
                <th>Day</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="sportModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="sport_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Sport</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter Sport</label>
                        <input type="text" name="sport" id="sport" class="form-control" placeholder="Enter Sport"/>
                    </div>
                    <div class="form-group">
                        <label>Enter Venue</label>
                        <input type="text" name="venue" id="venue" class="form-control" placeholder="Enter Venue"/>
                    </div>
                    <div class="form-group">
                        <label>Select Time</label>
                        <input type="time" name="time" id="time" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Day</label>
                        <select id="day" name="day" class="form-control">
                          <option selected>Choose...</option>
                          <option value="1">Monday</option>
                          <option value="2">Tuesday</option>
                          <option value="3">Wednesday</option>
                          <option value="4">Thursday</option>
                          <option value="5">Friday</option>
                          <option value="6">Saturday</option>
                          <option value="7">Sunday</option>
                        </select>
                      </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="sport_id" id="sport_id" value="" />
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
        $('#sport_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('sport.getdata')}}",
            "columns": [
                { "data": "id" },
                { "data": "sport" },
                { "data": "day" },
                { "data": "time" },
                { "data": "venu" },
                { "data": "action", orderable: false, searchable: false }
            ]
        });


        $('#add_data').click(function () {
            $('#sportModal').modal('show');
            $('#sport_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
        });


        $('#sport_form').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('sport.postdata') }}",
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
                        $('#sport_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Sport');
                        $('#button_action').val('insert');
                        $('#sport_table').DataTable().ajax.reload();
                        $('#form_output').html(data.success);
                    }
                }
            })
        });

        $(document).on('click', '.edit', function () {
            var id = $(this).attr("id");
            $('#form_output').html('');
            $.ajax({
                url: "{{route('sport.fetchdata')}}",
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
                        $('#sport').val(data.sport);
                        $('#day').val(data.day);
                        $('#time').val(data.time);
                        $('#venue').val(data.venue);
                        $('#sport_id').val(id);
                        $('#sportModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Sport');
                        $('#button_action').val('update');
                    }
                }
            })
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            if (confirm("Are you sure you want to Delete this data?")) {
                $.ajax({
                    url: "{{route('sport.removedata')}}",
                    mehtod: "get",
                    data: { id: id },
                    success: function (data) {
                        alert(data);
                        $('#sport_table').DataTable().ajax.reload();
                    }
                })
            }
            else {
                return false;
            }
        });

    });

</script>

@endsection