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
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Go Back</a>

{{-- {{ dd($categories->all())}} --}}

 <div class="container mt-5">
 <h1 class="text-center mb-4">Deleted Items</h1>

 <div class="row">
 <!-- Loop through your deleted items -->
 @if($categories->isEmpty())
 <div class="col-12 text-center">
 <p>No deleted items found!</p>
 </div>
 @else @foreach($categories as $category)
 <div class="col-md-4 deleted-item">
 <div class="card">
 <div class="card-body">
 <h5 class="card-title">Name : {{ $category->name }}</h5>
 <p class="card-text">Deleted on: {{ $category->deleted_at->format('d M, Y H:i:s') }}</p>
 <a  href="{{ route('restore',$category->id) }}" class="btn btn-primary mt-3">Restore Category with posts</a>

 {{-- <a href="{{ route('forceDelete',$category->id) }}" class="btn btn-danger mt-3">Delete Permanently</a> --}}
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
