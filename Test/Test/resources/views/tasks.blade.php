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
                    <h1>Tasks</h1>

                    @foreach($errors->all() as $error)

                    <div class="alert alert-danger">
                        {{$error}}
                    </div>

                    @endforeach

                    <form action="/saveTask" method="POST">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here">
                        <br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>

                    <br>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Completed</th>
                        <th>Action</th>

                        @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>
                                @if($task->iscompleted)
                                <button class="btn btn-success btn-sm">Completed</button>
                                @else
                                <button class="btn btn-warning btn-sm">Not Completed</button>
                                @endif
                            </td>
                            <td>
                            @if($task->iscompleted)
                            <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-warning">Mark as Not Completed</a>
                            @else
                            <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as Completed</a>
                            @endif
                            <a href="/deletetask/{{$task->id}}" class="btn btn-danger">Delete</a>
                            <a href="/updatetaskview/{{$task->id}}" class="btn btn-success">Update</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
