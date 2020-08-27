@extends('master')

@section('content')
<div class="container">
    <br>
    <h3 align="center">Sport Registration Management</h3>
    <div id="out_message"></div>
    <br>
    <table id="regman_table" class="table table-dark" style="width:100%;background-color: lightgoldenrodyellow">
        <thead>
            <tr>
                <th>Student</th>
                <th>Sport</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="detailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sport Registration Details</h4>
            </div>
            <div class="modal-body">
                <span id="form_output"></span>
                <div class="form-group">
                    <p><label>Student :</label>
                        <span id="st_details"></span></p>
                </div>
                <div class="form-group">
                    <p><label>Sport :</label>
                        <span id="sp_details"></span></p>
                </div>
                <div class="form-group">
                    <label>Leadership Qu]ualifications</label>
                    <p id="leaderq"></p>
                </div>
                <div class="form-group">
                    <label>Other Qualifications</label>
                    <p id="otherq"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        $('#regman_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('sportregman.getdata')}}",
            "columns": [
                { "data": "student" },
                { "data": "sport" },
                { "data": "status" },
                { "data": "action", orderable: false, searchable: false }
            ]
        });

        $(document).on('click', '.accept', function () {
            var id = $(this).attr("id");
            $.ajax({
                url: "{{route('sportregman.acceptreg')}}",
                method: 'get',
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    if (data.error.length > 0) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                        }
                        $('#out_message').html(error_html);
                    }
                    else {
                        $('#regman_table').DataTable().ajax.reload();
                        alert("Sport Registration Request Accepted.!");
                    }
                }
            })
        });

        $(document).on('click', '.decline', function () {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to Decline this registration?")) {
                $.ajax({
                    url: "{{route('sportregman.declinereg')}}",
                    method: 'get',
                    data: { id: id },
                    dataType: 'json',
                    success: function (data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                            }
                            $('#out_message').html(error_html);
                        }
                        else {
                            $('#regman_table').DataTable().ajax.reload();
                            alert("Sport Registration Request Declined.!");
                        }
                    }
                })
            }
            else {
                return false;
            }
        });

        $(document).on('click', '.details', function () {

            var id = $(this).attr("id");
            $.ajax({
                url: "{{route('sportregman.detailsreg')}}",
                method: 'get',
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    if (data.error.length > 0) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                        }
                        $('#out_message').html(error_html);
                    }
                    else {
                        $('#st_details').html(data.student);
                        $('#sp_details').html(data.sport);
                        $('#leaderq').html(data.leaderq);
                        $('#otherq').html(data.otherq);
                        $('#detailsModal').modal('show');
                    }
                }
            })

        });

    });

</script>

@endsection