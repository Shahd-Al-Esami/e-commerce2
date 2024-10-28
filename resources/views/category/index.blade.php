<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">category</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New category</a>
            <a href="{{ url('/') }}" class="btn btn-primary border-black mt-5">back</a>



        </div>
        <div class="row mx-0" style="display:flex;padding:10px;">
        @foreach($category as $cats)

        <div class="card col-2 m-2" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">name : {{ $cats->name }}</h5>

              <br>
              <div style="display: flex;margin:5px;">
              <a href="{{ route('categories.edit', $cats->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <a href="{{ route('categories.show', $cats->id) }}" class="btn btn-info btn-sm">Show</a>

              <form action="{{ route('categories.destroy',$cats->id) }}" method="post" >
                 @csrf
                  @method('DELETE')
                  <button type="submit" style="background-color: red;border:none;" > delete</button>
              </form>

              </div>
            </div>
          </div>
        <div class="col-1"></div>
          @endforeach

        </div>


    </div>


    @if (session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif
</body>
</html>
