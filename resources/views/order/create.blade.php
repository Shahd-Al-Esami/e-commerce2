
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Order Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .order-item {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #6c757d;
            background-color: #ffffff;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .delete-btn {
            background-color: transparent;
            border: none;
            color: #dc3545; /* Bootstrap danger color */
            font-size: 20px;
            cursor: pointer;
        }
        .product-title {
            font-weight: bold;
            font-size: 24px;
            margin: 20px 0;
        }
        #order-summary {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #007bff;
            background-color: #ffffff;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1 class="text-center">Product Ordering</h1>

    <div class="product-title">Product</div>

    <div style="display: flex; justify-content: center;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top" style="height: 150px; object-fit: cover;" src="{{ asset('/' . $product->path) }}" alt="Product Image" />
                <h5 class="card-title">Title: {{$product->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Description: {{$product->description}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Price: ${{$product->price}}</h6>

                <hr>
                <form action="{{ route('orders.store',$product->id) }}" method="POST">

                    @csrf

                    <label>Enter Quantity :</label>
                    <input type="number" name="quantity" required/>
                    <label for="paymentMethod">paymentMethod:</label>
                    <select name="paymentMethod[]" id="paymentMethod"  required>
                        <option value="paypal">paypal</option>
                        <option value="creditCard">creditCard</option>
                    </select>
                    <br>
                <button class="btn btn-primary" >save order</button>

                </form>


            </div>
        </div>
    </div>

        <!-- Your product listing code would go here -->

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
