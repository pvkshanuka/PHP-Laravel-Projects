@extends('master') @section('content')
<div class="container">


    <br>
    <h3 align="center" style="background-color:lightyellow !important; padding: 5px;">Hotel Task Report</h3>
    <br>
    <table class="table table-striped">
        <thead>
            <tr class="thcolor">
                <th>Task ID</th>
                <th>EMP</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="tabledata">
            <!-- <tr>
                <td>id</td>
                <td>date</td>
                <td>venue</td>
                <td>emp</td>
                <td>status</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>Moe</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>july@example.com</td>
                <td>july@example.com</td>
            </tr> -->
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url: "{{ route('taskreport.viewreport') }}",
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