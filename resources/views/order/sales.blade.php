<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ensure you include styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Sales Report</h1>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary border-black mt-5">back</a>

        <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->product->title }}</td> <!-- Assuming 'product_name' is an attribute in Sale model -->
                        <td>{{ $sale->quantity }}</td>
                        <td>${{ number_format($sale->price, 2) }}</td>
                        <td>${{ number_format($sale->total, 2) }}</td>
                        <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                        <td>{{ $sale->status }}</td>
                         <!-- Assuming 'created_at' is available -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No sales data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
