@extends('master')

@section('content')
<div class="container">
    <br>
    <div style="float: left">
        <table>
            <tr>
                <td>
                    <h4>ID</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4><b id="st_id"></b></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Name</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4><b id="st_name"></b></h4>
                </td>
            </tr>
        </table>
    </div>
    <div style="float: right" class="form-inline">
        <input type="number" class="form-control" name="st_ses_id" id="st_ses_id" placeholder="Enter Student ID">
        <button type="button" name="add" id="set_session" class="btn btn-success">Set</button>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div id="out_message"></div>
    <h3 align="center">Sport Registration</h3>
    <div class="row justify-content-center">
        <div class="col-md-2"></div>

        <form id="reg_sportform" class="col-md-8">
            {{csrf_field()}}
            <span id="form_output"></span>
            <div class="form-group">
                <label>Select Sport</label>
                <select id="sport_select" name="sport_select" class="form-control">
                    <option selected>Choose...</option>
                </select>
            </div>
            <div class="form-group">
                <label>Leadership Qulifications</label>
                <textarea class="form-control" rows="5" id="leaderq" name="leaderq"></textarea>
            </div>
            <div class="form-group">
                <label>Other Qulifications</label>
                <textarea class="form-control" rows="5" id="otherq" name="otherq"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Registor">
            </div>

        </form>

        <div class="col-md-2"></div>
    </div>

    <div class="container">
        <br>
        <h3 align="center">Sports Details</h3>
        <br>
        <table id="sport_table" class="table table-striped" style="width:100%;background-color: lightgoldenrodyellow">
            <thead>
                <tr>
                    <th>Sport</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Venue</th>
                </tr>
            </thead>
        </table>
    </div>
    <br>
    <br>
    <br>
    <!-- <table id="sport_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sport ID</th>
                <th>Sport</th>
                <th>Day</th>
                <th>time</th>
                <th>Action</th>
            </tr>
        </thead>
    </table> -->
</div>

<!-- <div id="sportModal" class="modal fade" role="dialog">
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
                        <input type="text" name="sport" id="sport" class="form-control" placeholder="Enter Sport" />
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
</div> -->

<script type="text/javascript">
$(document).on('click', '#set_session', function() {
    var id = $('#st_ses_id').val();
    $.ajax({
        url: "{{route('sportreg.setstses')}}",
        method: 'get',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(data) {
            if (data.error.length > 0) {
                var error_html = '';
                for (var count = 0; count < data.error.length; count++) {
                    error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                }
                $('#out_message').html(error_html);
            } else {
                $('#st_id').html(data.id);
                $('#st_name').html(data.name);
                $('#st_ses_id').val('');

                alert("Student Signed In.!");

            }
        }
    })
});

$(document).ready(function() {

    $.ajax({
        url: "{{route('sportreg.loadsports')}}",
        method: 'get',
        dataType: 'json',
        success: function(data) {


            for (i = 0; i < data.length; i++) {
                $('#sport_select').html($('#sport_select').html() + '<option value="' + data[i].id +
                    '">' + data[i].sport + '</option>');
            }

        }
    });

    $('#sport_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('sport.getdata')}}",
            "columns": [
                { "data": "sport" },
                { "data": "day" },
                { "data": "time" },
                { "data": "venu" },
            ]
        });

});

$('#reg_sportform').on('submit', function(event) {
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
        url: "{{ route('sportreg.savedata') }}",
        method: "POST",
        data: form_data,
        dataType: "json",
        success: function(data) {
            if (data.error.length > 0) {
                var error_html = '';
                for (var count = 0; count < data.error.length; count++) {
                    error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                }
                $('#out_message').html(error_html);
            } else {
                $('#reg_sportform')[0].reset();
                // $('#action').val('Add');
                // $('.modal-title').text('Add Sport');
                // $('#button_action').val('insert');
                // $('#sport_table').DataTable().ajax.reload();
                $('#out_message').html(data.success);
            }
        }
    })
});
</script>

@endsection