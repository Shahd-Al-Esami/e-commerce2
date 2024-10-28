

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>E-commerce</title>
    <style>
        body {
            background-image: url(imgs/image.png);
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .header-title {
            text-align: center;
            margin-bottom: 40px;
            color: #fff; /* Change text color for visibility against background */
        }
        .btn-custom {
            width: 100%; /* Full width buttons */
            margin-top: 10px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body>

@extends('layouts.header+footer') <!-- Ensure the header is included -->

@section('content')
<div class="container mt-5">
    <h2 style="text-align: center">Welcome to Our Commerce</h2>
    <div class="row mb-4">
        <div class="col text-center"> <!-- Centered with Bootstrap classes -->
            <a href="{{ route('dashboard') }}" class="btn btn-primary ">Dashboard</a>
        </div>
    </div>
    <div class="row mb-4 button-container">
        <div class="col">
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-custom">Display Products</a>
        </div>
        <div class="col">
            <a href="{{ route('categories.index') }}" class="btn btn-info btn-custom">Display Categories</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <form action="{{ route('userOrders') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-danger ">
                    My Orders
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

</body>
</html>
