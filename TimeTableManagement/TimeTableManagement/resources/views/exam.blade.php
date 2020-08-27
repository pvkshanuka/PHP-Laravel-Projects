@extends('master')

@section('content')
<div class="container">
    <br>
    <h3 align="center">Exam Management</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br>
    <table id="exam_table" class="table table-striped" style="width:100%;background-color: lightgoldenrodyellow">
        <thead>
            <tr>
                <th>Exam ID</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Year</th>
                <th>Exam Type</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Remarks</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div id="examModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="exam_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Period</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ex_date">Exam Date</label>
                            <input type="date" class="form-control" id="ex_date" name=ex_date>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ex_ayear">Acadamic Year</label>
                            <input type="number" class="form-control" id="ex_year" name="ex_year"
                                placeholder="Acadamic Year">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ex_stime">Start Time</label>
                            <input type="time" class="form-control" id="ex_stime" name="ex_stime">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ex_etime">End Time</label>
                            <input type="time" class="form-control" id="ex_etime" name="ex_etime">
                        </div>
                    </div>

                    <div class="row" style="padding: 15px">
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_class" name="select_class"
                                style="width: 100%">

                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_subject" name="select_subject"
                                style="width: 100%">

                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" id="select_etype" name="select_etype"
                                style="width: 100%">

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="ex_remarks">Remarks</label>
                            <textarea class="form-control" id="ex_remarks" name="ex_remarks" rows="5"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="exam_id" id="exam_id" value="" />
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
        $('#exam_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('exam.getdata')}}",
            "columns": [
                { "data": "id" },
                { "data": "class" },
                { "data": "subject" },
                { "data": "year" },
                { "data": "etype" },
                { "data": "date" },
                { "data": "stime" },
                { "data": "etime" },
                { "data": "remarks" },
                { "data": "action", orderable: false, searchable: false }
            ]
        });

        $.ajax({
            url: "{{ route('exam.loaddata') }}",
            method: "get",
            dataType: "json",
            success: function (data) {

                var classes = '<option value="">Select Class</option>';
                var subjects = '<option value="">Select Subject</option>';
                var etype = '<option value="">Select Exam Type</option>';

                for (var count = 0; count < data.classes.length; count++) {
                    classes += '<option value="' + data.classes[count].id + '">' + data.classes[count].class + '</option>';
                }

                for (var count = 0; count < data.subjects.length; count++) {
                    subjects += '<option value="' + data.subjects[count].id + '">' + data.subjects[count].subject + '</option>';
                }

                for (var count = 0; count < data.etype.length; count++) {
                    etype += '<option value="' + data.etype[count].id + '">' + data.etype[count].type + '</option>';
                }

                $('#select_class').html(classes);
                $('#select_subject').html(subjects);
                $('#select_etype').html(etype);

                $('.select2').select2();

            }
        })

    });

    $('#add_data').click(function () {
        $('#examModal').modal('show');
        $('#exam_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');

        $.ajax({
            url: "{{ route('exam.loaddata') }}",
            method: "get",
            dataType: "json",
            success: function (data) {

                var classes = '<option value="">Select Class</option>';
                var subjects = '<option value="">Select Subject</option>';
                var etype = '<option value="">Select Exam Type</option>';

                for (var count = 0; count < data.classes.length; count++) {
                    classes += '<option value="' + data.classes[count].id + '">' + data.classes[count].class + '</option>';
                }

                for (var count = 0; count < data.subjects.length; count++) {
                    subjects += '<option value="' + data.subjects[count].id + '">' + data.subjects[count].subject + '</option>';
                }

                for (var count = 0; count < data.etype.length; count++) {
                    etype += '<option value="' + data.etype[count].id + '">' + data.etype[count].type + '</option>';
                }

                $('#select_class').html(classes);
                $('#select_subject').html(subjects);
                $('#select_etype').html(etype);

                $('.select2').select2();

            }
        })

    });

    $('#exam_form').on('submit', function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "{{ route('exam.postdata') }}",
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
                    $('#exam_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Exam');
                    $('#button_action').val('insert');
                    $('#exam_table').DataTable().ajax.reload();
                    $('#form_output').html(data.success);
                    $('.select2').select2();
                }
            }
        })
    });

    $(document).on('click', '.edit', function () {
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url: "{{route('exam.fetchdata')}}",
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

                    // alert(data.class + "-" + data.subject + "-" + data.time);
                    $('#select_class').val(data.class).change();
                    $('#select_subject').val(data.subject).change();
                    $('#select_etype').val(data.etype).change();
                    $('#ex_year').val(data.year);
                    $('#ex_date').val(data.date);
                    $('#ex_stime').val(data.stime);
                    $('#ex_etime').val(data.etime);
                    $('#ex_remarks').val(data.remarks);
                    $('#exam_id').val(id);
                    $('#examModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Exam');
                    $('#button_action').val('update');
                }
            }
        })
    });

    $(document).on('click', '.delete', function () {
        var id = $(this).attr('id');
        if (confirm("Are you sure you want to Delete this data?")) {
            $.ajax({
                url: "{{route('exam.removedata')}}",
                mehtod: "get",
                data: { id: id },
                success: function (data) {
                    alert(data);
                    $('#exam_table').DataTable().ajax.reload();
                }
            })
        }
        else {
            return false;
        }
    });

</script>

@endsection