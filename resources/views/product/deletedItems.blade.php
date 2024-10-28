<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Deleted Items</title>
 <!-- Bootstrap CSS -->
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 <style>
 body {
 background-color: #f8f9fa; /* Light background color */
 }
 .deleted-item {
 margin-bottom:20px;
 }
 </style>
</head>
<body>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Go Back</a>

{{-- {{ dd($products->all())}} --}}

 <div class="container mt-5">
 <h1 class="text-center mb-4">Deleted Items</h1>

 <div class="row">
 <!-- Loop through your deleted items -->
 @if($products->isEmpty())
 <div class="col-12 text-center">
 <p>No deleted items found!</p>
 </div>
 @else @foreach($products as $product)
 <div class="col-md-4 deleted-item">
 <div class="card">
 <div class="card-body">
 <h5 class="card-title">Title : {{ $product->title }}</h5>
 <h5 class="card-title">description : {{ $product->description }}</h5>
 <h5 class="card-title">amount : {{ $product->amount }}</h5>
 <h5 class="card-title">price : {{ $product->price }}</h5>
categories:
 @foreach($product->categories as $category)

 <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
 <label class="form-check-label">
     {{ $category->name }}
 </label>
 @endforeach
  <p class="card-text">Deleted on: {{ $product->deleted_at->format('d M, Y H:i:s') }}</p>
 <a  href="{{ route('restore',$product->id) }}" class="btn btn-primary mt-3">Restore products </a>

 {{-- <a href="{{ route('forceDelete',$product->id) }}" class="btn btn-danger mt-3">Delete Permanently</a> --}}
 </div>
 </div>
 </div>
 @endforeach @endif </div>
 </div>

 <!-- Bootstrap JS and dependencies (optional if needed) -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
