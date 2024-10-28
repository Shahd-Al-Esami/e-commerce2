<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Your Orders</title>
</head>

<body>
<a class="btn btn-warning btn-sm m-5" href="{{ url('/') }}" >go back</a>
<a href="{{ route('products.index') }}" class="btn btn-primary">Add New order</a>


    <div class="container mt-4">
        <h1 class="text-center mb-4">Your Orders</h1>

        @if($orders->isEmpty())
        <div class="alert alert-info text-center">
            You have no orders yet.
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ number_format($order->price, 2) }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('orders.edit',$order->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('orders.pay',$order->id) }}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-danger btn-sm">Pay</button> <!-- Changed button style -->
                            </form>

                            <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark btn-sm">Delete</button> <!-- Changed button style -->
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    @if (session('status'))
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


@if (session('alert'))
<script>
    alert("{{ session('alert') }}");
</script>
@endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
