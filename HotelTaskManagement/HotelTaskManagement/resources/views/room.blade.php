@extends('master') @section('content')
<div class="container">
    <br>
    <h3 align="center" onclick="reserve(1)">Room Status Management</h3>
    <div id="out_message"></div>
    <br>

    <div id=rooms>


    </div>
</div>

<br>
<br>
<br>

<script type="text/javascript">
    $(document).ready(function() {


        loadRooms();

    });

    function loadRooms() {

        var txt = "";
        $.ajax({
            type: "GET",
            url: "{{route('room.getdata')}}",
            data: {
                'name': "ku"
            },
            success: function(data) {

                // for (var count = 0; count < data.data.length; count++) {
                //         error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                //     }

                $("#rooms").html(data.data);
            },
            dataType: "json",
            contentType: "application/json"
        });

    }

    function reserve(id) {

        $.ajax({
            type: "GET",
            url: "{{route('room.reserve')}}",
            data: {
                'id': id
            },
            success: function(data) {

                if (data.error.length > 0) {
                    var error_html = '';
                    for (var count = 0; count < data.error.length; count++) {
                        error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                    }
                    $('#out_message').html(error_html);
                } else {
                    // alert(data.data);
                    loadRooms();
                    $('#out_message').html('<div class="alert alert-success">' + data.data + '</div>');
                }
            },
            dataType: "json",
            contentType: "application/json"
        });

    }
</script>

@endsection