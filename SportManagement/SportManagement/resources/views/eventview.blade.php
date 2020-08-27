@extends('master') @section('content')

<style>
    .eventview {
        background-color: mintcream;
        border-radius: 10px;
        box-shadow: 8px 8px 10px lightgray;
        padding: 5px;
    }
    
    .eventview:hover {
        background-color: skyblue;
    }
</style>

<div class="container">
    <br>
    <h3 align="center">Student Event Winners</h3>

    <br>
    <br>

    <div id="eventviewer">
        
    </div>


</div>

<script type="text/javascript">
    $(document).ready(function() {


        loadEvents();

    });

    function loadEvents() {

        var txt = "";
        $.ajax({
            type: "GET",
            url: "{{route('eventview.getdata')}}",
            data: {
                'name': "ku"
            },
            success: function(data) {

                $("#eventviewer").html(data.data);
            },
            dataType: "json",
            contentType: "application/json"
        });

    }
</script>

@endsection