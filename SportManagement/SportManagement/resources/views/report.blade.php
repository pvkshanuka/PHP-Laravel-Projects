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
    <h3 align="center">Sport Registration Report</h3>

    <br>
    <br>

    <div id="">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student</th>
                    <th scope="col">Sport</th>
                    <th scope="col">Sport Date</th>
                </tr>
            </thead>
            <tbody id="dataviewer">
                <tr>
                    <th scope="row">1</th>
                    <td>1| Kusal Shanuka</td>
                    <td>Cricket</td>
                    <td>
                        <a href="#" class="badge badge-success " "=" ">Saturday</a>
                    </td>
                 </tr>
                 
                                         
            </tbody>
        </table>

    </div>


</div>

<script type="text/javascript ">
    $(document).ready(function() {

        loadData();

    });

function loadData() {
    var txt = "";
        $.ajax({
            type: "GET",
            url: "{{route('report.getdata')}}",
            data: {
                'name': "ku"
            },
            success: function(data) {

                $("#dataviewer").html(data.data);
                window.print();
            },
            dataType: "json",
            contentType: "application/json"
        });
}

</script>

@endsection