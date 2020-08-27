@extends('master') @section('content')
<div class="container">
    <br>
    <h3 align="center">Period Management</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br>
    <table id="period_table" class="table table-striped" style="width:100%;background-color: lightgoldenrodyellow">
        <thead>
            <tr>
                <th>Period ID</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Day</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="periodModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="period_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Period</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_class" name="select_class" style="width: 100%">

                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_subject" name="select_subject" style="width: 100%">

                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_period" name="select_period" style="width: 100%">

                            </select>
                        </div>
                        <br>

                    </div>
                    <div class="row" style="margin-top: 5px">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_day" name="select_day" style="width: 100%">

                                    <option value="">Select Day</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
    
                                </select>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="period_id" id="period_id" value="" />
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
        $('#period_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('period.getdata')}}",
            "columns": [{
                "data": "id"
            }, {
                "data": "class"
            }, {
                "data": "subject"
            }, {
                "data": "time"
            }, {
                "data": "day"
            }, {
                "data": "action",
                orderable: false,
                searchable: false
            }]
        });

        $.ajax({
            url: "{{ route('period.loaddata') }}",
            method: "get",
            dataType: "json",
            success: function(data) {

                var classes = '<option value="">Select Class</option>';
                var subjects = '<option value="">Select Subject</option>';
                var periods = '<option value="">Select Period</option>';

                for (var count = 0; count < data.classes.length; count++) {
                    classes += '<option value="' + data.classes[count].id + '">' + data.classes[count].class + '</option>';
                }

                for (var count = 0; count < data.subjects.length; count++) {
                    subjects += '<option value="' + data.subjects[count].id + '">' + data.subjects[count].subject + '</option>';
                }

                for (var count = 0; count < data.periods.length; count++) {
                    periods += '<option value="' + data.periods[count].id + '">' + data.periods[count].time + '</option>';
                }

                $('#select_class').html(classes);
                $('#select_subject').html(subjects);
                $('#select_period').html(periods);

                $('.select2').select2();

            }
        })

    });


    $('#add_data').click(function() {
        $('#periodModal').modal('show');
        $('#period_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');

        $.ajax({
            url: "{{ route('period.loaddata') }}",
            method: "get",
            dataType: "json",
            success: function(data) {

                var classes = '<option value="">Select Class</option>';
                var subjects = '<option value="">Select Subject</option>';
                var periods = '<option value="">Select Period</option>';

                for (var count = 0; count < data.classes.length; count++) {
                    classes += '<option value="' + data.classes[count].id + '">' + data.classes[count].class + '</option>';
                }

                for (var count = 0; count < data.subjects.length; count++) {
                    subjects += '<option value="' + data.subjects[count].id + '">' + data.subjects[count].subject + '</option>';
                }

                for (var count = 0; count < data.periods.length; count++) {
                    periods += '<option value="' + data.periods[count].id + '">' + data.periods[count].time + '</option>';
                }

                $('#select_class').html(classes);
                $('#select_subject').html(subjects);
                $('#select_period').html(periods);

                $('.select2').select2();

            }
        })

    });

    $('#period_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "{{ route('period.postdata') }}",
            method: "POST",
            data: form_data,
            dataType: "json",
            success: function(data) {
                if (data.error.length > 0) {
                    var error_html = '';
                    for (var count = 0; count < data.error.length; count++) {
                        error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                    }
                    $('#form_output').html(error_html);
                } else {
                    $('#period_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Period');
                    $('#button_action').val('insert');
                    $('#period_table').DataTable().ajax.reload();
                    $('#form_output').html(data.success);
                    $('.select2').select2();
                }
            }
        })
    });

    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url: "{{route('period.fetchdata')}}",
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
                    $('#form_output').html(error_html);
                } else {

                    // alert(data.class + "-" + data.subject + "-" + data.time);
                    $('#select_class').val(data.class).change();
                    $('#select_subject').val(data.subject).change();
                    $('#select_period').val(data.time).change();
                    $('#select_day').val(data.day).change();
                    $('#period_id').val(id);
                    $('#periodModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Period');
                    $('#button_action').val('update');
                }
            }
        })
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');
        if (confirm("Are you sure you want to Delete this data?")) {
            $.ajax({
                url: "{{route('period.removedata')}}",
                mehtod: "get",
                data: {
                    id: id
                },
                success: function(data) {
                    alert(data);
                    $('#period_table').DataTable().ajax.reload();
                }
            })
        } else {
            return false;
        }
    });
</script>

@endsection