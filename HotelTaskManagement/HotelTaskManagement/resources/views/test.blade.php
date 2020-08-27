<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <h3 align="center">Datatables Server Side Processing in Laravel</h3>
    <br />
    <table id="emp_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>EMP ID</th>
                <th>EMP Name</th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $('#emp_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('test.getdata')}}",
        "columns":[
            { "data": "id" },
            { "data": "name" }
        ]
    });
});

</script>

</body>
</html>