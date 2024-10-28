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
    <a class="btn btn-warning btn-sm m-5" href="{{ route('products.index') }}" >go back</a>


    <div style="display: flex; margin-top: 100px;">
        <div class="card m-auto" style="width: 18rem;">
            <div class="card-body">
            <img class="card-img-top" style="height: 150px; object-fit: cover;" src="{{ asset('/' . $product->path) }}" alt="Post Image" /> <!-- Improved image styling -->

                <h5 class="card-title">title : {{$product->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">description : {{$product->description}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">price : {{$product->price}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">amount : {{$product->amount}}</h6>
                categories:
                @foreach($product->categories as $category)

                <input disabled class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label">
                    {{ $category->name }}
                </label>
                @endforeach
                <hr>

            </div>
        </div>
    </div>



</body>
</html>
