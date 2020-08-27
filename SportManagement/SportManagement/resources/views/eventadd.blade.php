@extends('master')

@section('content')
<div class="container">
    <br>
    <h3 align="center">Student Event Management</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br>
    <table id="event_table" class="table table-striped" style="width:100%;background-color: lightgoldenrodyellow">
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Name</th>
                <th>First</th>
                <th>Second</th>
                <th>Third</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="eventModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="event_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Event</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter Event</label>
                        <input type="text" name="event" id="event" class="form-control" placeholder="Enter Event" />
                    </div>
                    <div class="form-group">
                        <label>1st Place</label>
                        <input type="text" name="first" id="first" class="form-control" placeholder="1st Place" />
                    </div>
                    <div class="form-group">
                        <label>2nd Place</label>
                        <input type="text" name="second" id="second" class="form-control" placeholder="2nd Place" />
                    </div>
                    <div class="form-group">
                        <label>3rd Place</label>
                        <input type="text" name="third" id="third" class="form-control" placeholder="3rd Place" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="event_id" id="event_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#event_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('eventadd.getdata2')}}",
        "columns": [{
                "data": "id"
            },
            {
                "data": "name"
            },
            {
                "data": "first"
            },
            {
                "data": "second"
            },
            {
                "data": "third"
            },
            {
                "data": "action",
                orderable: false,
                searchable: false
            }
        ]
    });


    $('#add_data').click(function() {
        $('#eventModal').modal('show');
        $('#event_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
    });


    $('#event_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "{{ route('eventadd.postdata') }}",
            method: "POST",
            data: form_data,
            dataType: "json",
            success: function(data) {
                if (data.error.length > 0) {
                    var error_html = '';
                    for (var count = 0; count < data.error.length; count++) {
                        error_html += '<div class="alert alert-danger">' + data.error[
                            count] + '</div>';
                    }
                    $('#form_output').html(error_html);
                } else {
                    $('#event_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Event');
                    $('#button_action').val('insert');
                    $('#event_table').DataTable().ajax.reload();
                    $('#form_output').html(data.success);
                }
            }
        })
    });

    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url: "{{route('eventadd.fetchdata')}}",
            method: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                if (data.error.length > 0) {
                    var error_html = '';
                    for (var count = 0; count < data.error.length; count++) {
                        error_html += '<div class="alert alert-danger">' + data.error[
                            count] + '</div>';
                    }
                    $('#form_output').html(error_html);
                } else {
                    $('#event').val(data.event);
                    $('#first').val(data.first);
                    $('#second').val(data.second);
                    $('#third').val(data.third);
                    $('#event_id').val(id);
                    $('#eventModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Event');
                    $('#button_action').val('update');
                }
            }
        })
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');
        if (confirm("Are you sure you want to Delete this data?")) {
            $.ajax({
                url: "{{route('eventadd.removedata')}}",
                mehtod: "get",
                data: {
                    id: id
                },
                success: function(data) {
                    alert(data);
                    $('#event_table').DataTable().ajax.reload();
                }
            })
        } else {
            return false;
        }
    });

});
</script>

@endsection