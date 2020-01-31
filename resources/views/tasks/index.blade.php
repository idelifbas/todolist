<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">

    {{-- bootstrap css --}}

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- bootstrap js--}}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>To Do List App</title>

</head>
<body>

<div class="container">

    <div class="col-md-offset-2 col-md-8">
        <div class="row">
            <h1>ToDo List</h1>
        </div>

        {{-- hata mesajlarını görüntüler--}}
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>

            </div>
        @endif
        <div class="row">
            <form action="{{ route('tasks.store') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md">
                    <input type="text" name='newTaskName' class='form-control'>

                </div>
                <br>
                <div class="col-md">
                    <input type="submit" class="btn btn-primary btn-block" value="Add Task">
                </div>

            </form>
        </div>
        {{-- başarılı mesajı--}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                <strong>Success:</strong>{{ Session::get('success') }}
            </div>
            @endif

        {{-- Verileri görüntüle--}}
        @if ( count($storedTasks)>0)
            <table class="table">
                <thead>
                <th>Task #</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>


                <tbody>
                @foreach($storedTasks as $storedTask)
                    <th>{{ $storedTask->id }}</th>
                    <td>{{ $storedTask->name }}</td>
                    <td><a href="{{ route('tasks.edit', ['task'=>$storedTask->id]) }}" class="btn btn-dark">Edit</a> </td>
                    <td>
                        <form action="{{ route('tasks.destroy',['task'=>$storedTask->id]) }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                @endforeach
                </tbody>
            </table>
        @endif

        {{-- pagination
        <div class="row">
              {{ $storedTasks->links() }}
        </div>
        --}}


    </div>
</div>

</body></html>