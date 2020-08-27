@extends('master') @section('content')
<div class="container">
    <br>
    <h3 align="center">Class Time Tables</h3>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <select class="form-control select2" id="select_class" name="select_class" style="width: 100%" onchange="loadData()">
                    
                </select>
        </div>
        <div class="col-md-4"></div>
    </div>

    <br>
    <br>

    <table class="table">
            <thead class="thead-dark" style="background-color: burlywood">
              <tr>
                <th scope="col">Period</th>
                <th scope="col">Monday</th>
                <th scope="col">Tuesday</th>
                <th scope="col">Wednesday</th>
                <th scope="col">Thursday</th>
                <th scope="col">Friday</th>
              </tr>
            </thead>
            <tbody id="tbldata">
                    <tr>
                            <th scope="row">07:30 AM - 08:10 AM</th>
                            <td>Maths</td>
                            <td>Free</td>
                            <td>Science</td>
                            <td>Free</td>
                            <td>Maths</td>
                          </tr>
            </tbody>
          </table>


</div>



<script type="text/javascript">
    $(document).ready(function() {
    //     $('#period_table').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "ajax": "{{route('period.getdata')}}",
    //         "columns": [{
    //             "data": "id"
    //         }, {
    //             "data": "class"
    //         }, {
    //             "data": "subject"
    //         }, {
    //             "data": "time"
    //         }, {
    //             "data": "action",
    //             orderable: false,
    //             searchable: false
    //         }]
    //     });

        $.ajax({
            url: "{{ route('period.loaddata') }}",
            method: "get",
            dataType: "json",
            success: function(data) {

                var classes = '<option value="">Select Class</option>';
    //             var subjects = '<option value="">Select Subject</option>';
    //             var periods = '<option value="">Select Period</option>';

                for (var count = 0; count < data.classes.length; count++) {
                    classes += '<option value="' + data.classes[count].id + '">' + data.classes[count].class + '</option>';
                }

    //             for (var count = 0; count < data.subjects.length; count++) {
    //                 subjects += '<option value="' + data.subjects[count].id + '">' + data.subjects[count].subject + '</option>';
    //             }

    //             for (var count = 0; count < data.periods.length; count++) {
    //                 periods += '<option value="' + data.periods[count].id + '">' + data.periods[count].time + '</option>';
    //             }

                $('#select_class').html(classes);
    //             $('#select_subject').html(subjects);
    //             $('#select_period').html(periods);

                $('.select2').select2();

            }
        });

    });

function loadData(){
    
    $.ajax({
            type: "GET",
            url: "{{route('timetable.getdata')}}",
            data: {
                'id': $('#select_class').val()
            },
            success: function(data) {
                $("#tbldata").html(data.data);
                // window.print();
            },
            dataType: "json",
            contentType: "application/json"
        });

}

</script>

@endsection