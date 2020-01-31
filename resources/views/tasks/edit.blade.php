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

        {{-- başarılı mesajı--}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                <strong>Success:</strong>{{ Session::get('success') }}
            </div>
        @endif


<div class="row">
    <form action="{{ route('tasks.update',[$taskUnderEdit->id]) }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" name="updatedTaskName" class="form-control input-lg" value="{{$taskUnderEdit->name}}">
        </div>
        <div class="form-group">
            <input type="submit" value="Save Changes" class="btn btn-success input-lg">
            <a href="" class="btn btn-dark btn-md">Go Back</a>
        </div>
    </form>
</div>




    </div>
</div>

</body></html>