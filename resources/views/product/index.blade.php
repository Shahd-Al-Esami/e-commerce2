


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <div class="container mt-5">
        @if (session('alert'))
            <div class="alert alert-warning">{{ session('alert') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Products</h1>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
                <a href="{{ route('showDeletedItems') }}" class="btn btn-secondary">Show Deleted Items</a>
                <a href="{{ route('welcome') }}" class="btn btn-outline-dark mt-5">Back</a>
            </div>
        </div>

        <div>
            <h2 class="mt-5">Search: Enter Category</h2>
            <form class="mt-3" method="get" action="{{ route('products.index') }}">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="row mt-4">
            @foreach($products as $product)
                <div class="col-4  mb-4">
                    <div class="card shadow-sm">
                        <img class="card-img-top" style="height: 150px; object-fit: cover;" src="{{ asset('/' . $product->path) }}" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Description: {{ $product->description }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Price: ${{ number_format($product->price, 2) }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Amount: {{ $product->amount }}</h6>

                            <h6>Categories:</h6>
                            @foreach($product->categories as $category)
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $category->name }}</label>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <form action="{{ route('forceDelete', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-sm">Force Delete</button>
                                </form>

                                <form action="{{ route('orders.create', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>
</html>
