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


<a class="btn btn-warning btn-sm m-5" href="{{ url('/userOrders') }}" >go back</a>


<div class="card col-4 m-2 shadow-sm" style="width: 18rem;"> <!-- Added shadow for depth -->
    <h6 class="card-subtitle mb-2 text-muted"># {{ $order->id }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">by:  {{ $order->user->name }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">user-email:  {{ $order->user->email }}</h6>

    <img class="card-img-top" style="height: 150px; object-fit: cover;" src="{{ asset('/' . $order->product->path) }}" alt="Post Image" /> <!-- Improved image styling -->
    <div class="card-body">
        <h5 class="card-title">title: {{ $order->product->title }}</h5> 
        <h6 class="card-subtitle mb-2 text-muted">description :{{ $order->product->description }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">price :{{ $order->price }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">quantity :{{ $order->quantity }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">status :{{ $order->status }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">paymentMethod: {{ $order->paymentMethod }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">total: {{ $order->total }} $</h6>
    </div>

</div>
</body></html>

