
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <a class="btn btn-warning btn-sm m-5" href="{{  url('/userOrders') }}" >go back</a>

    <h1 class="text-center">Product Ordering</h1>

    <div class="product-title">order</div>

    <div style="display: flex; justify-content: center;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">



                <form action="{{ route('orders.update',$order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label>Enter Quantity :</label>
                    <input type="number" name="quantity" required value="{{ $order->quantity }}"/>
                    <label for="paymentMethod"  >paymentMethod:</label>
                    <select name="paymentMethod[]" id="paymentMethod" required>
                        <option value="paypal" {{ (old('paymentMethod') == 'paypal' || (isset($order) && $order->paymentMethod == 'paypal')) ? 'selected' : '' }}>Paypal</option>
                        <option value="creditCard" {{ (old('paymentMethod') == 'creditCard' || (isset($order) && $order->paymentMethod == 'creditCard')) ? 'selected' : '' }}>Credit Card</option>
                    </select>
                    <br>
                <button class="btn btn-primary" >update order</button>

                </form>


            </div>
        </div>
    </div>

    



</body>
</html>
