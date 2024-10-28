<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <a class="btn btn-warning btn-sm m-5" href="{{ route('categories.index') }}" >go back</a>


      <div style="display:flex;margin-top:100px">
            <div class="card m-auto" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$category->name}}</h5>

                </div>
              </div>

      </div>



</body>
</html>
