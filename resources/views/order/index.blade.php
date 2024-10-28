<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>order</title>
</head>
<body>
{{-- {{ dd($orders) }} --}}
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">orders</h1>
            {{-- <a href="{{ route('products.index') }}" class="btn btn-primary">Add New order</a> --}}
            <a href="{{route('dashboard') }}" class="btn btn-primary border-black mt-5"> To Dashboard</a>
    {{-- <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Go Back</a> --}}


        </div>

        {{-- <div class="container">
            <h1 class="mt-5">Search : Enter Category</h1>
            <form class="mt-3" method="get" action="{{ route('orders.index') }}">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div> --}}
        <div class="row mx-0" style="display:flex;padding:10px;">


            {{-- {{ dd($orders) }} --}}
     @foreach($orders as $order)
     {{-- {{dd($order->product)
     }} --}}
        <div class="card col-4 m-2 shadow-sm" style="width: 18rem;"> <!-- Added shadow for depth -->
            <h6 class="card-subtitle mb-2 text-muted"># {{ $order->id }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">by:  {{ $order->user->name }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">user-email:  {{ $order->user->email }}</h6>
            <div class="card-body">

            <img class="card-img-top" style="height: 150px; object-fit: cover;" src="{{ asset('/' . $order->product->path) }}" alt="Post Image" /> <!-- Improved image styling -->
                <h5 class="card-title">title: {{ $order->product->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">description :{{ $order->product->description }}</h6>

                <h6 class="card-subtitle mb-2 text-muted">price :{{ $order->price }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">product_id :{{ $order->product_id }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">quantity :{{ $order->quantity }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">status :{{ $order->status }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">paymentMethod: {{ $order->paymentMethod }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">total: {{ $order->total }} $</h6>
                {{-- <a href="{{ route('orders.edit',$order->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                <a href="{{ route('orders.show',$order->id) }}" class="btn btn-warning btn-sm">Show</a>

                {{-- <form action="{{ route('orders.pay',$order->id) }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm">Pay</button> <!-- Changed button style -->
                </form> --}}
<br>
                <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark btn-sm">Delete</button> <!-- Changed button style -->
                </form>


                 {{-- <div class="d-flex justify-content-between mt-3"> <!-- Flexbox for action buttons -->
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Show</a>

                    <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button> <!-- Changed button style -->
                    </form>

            </div> --}}
        </div>
     </div>
        @endforeach






            </div>
        </div>





       {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.pay-button', function() {
            const form = $(this).closest('form');
            const orderId = form.data('id');

            $.ajax({
                url: '/order/pay/' + orderId,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Assuming the response returns a success message
                    alert('Order status is completed!');
                    // Optionally, you might want to reload the list or update the UI here
                    location.reload(); // Reloads the page
                },
                error: function(xhr) {
                    alert('Something went wrong!'); // Handle errors as needed
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    @if (session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif --}}


    </body>




</html>
