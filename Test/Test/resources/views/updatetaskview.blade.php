<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tasks</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>Update Tasks</h1>

                    @foreach($errors->all() as $error)

                    <div class="alert alert-danger">
                        {{$error}}
                    </div>

                    @endforeach

                    <form action="/updatetask" method="POST">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="task" value="{{$taskdata->task}}" placeholder="Enter Your Task Here">
                        <input type="hidden" name="id" value="{{$taskdata->id}}">
                        <br>
                        <input type="submit" class="btn btn-primary" value="UPDATE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
