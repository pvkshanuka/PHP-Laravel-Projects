@extends('master') @section('content')
<div class="container">


    <br>
    <h3 align="center" style="background-color:lightyellow !important; padding: 5px;">Hotel Session Report</h3>
    <br>
    <table class="table table-striped">
        <thead>
            <tr class="thcolor">
                <th>ID</th>
                <th>EMP</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Details</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="tabledata">
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url: "{{ route('sessionreport.viewreport') }}",
            method: "GET",
            success: function(data) {

                $('#tabledata').html(data);
                window.print();

            },
            error: function() {
                alert("error");
            }
        })

    });
</script>

@endsection