

 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <head> <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Admins Dashboard</title>
      <!-- Fonts --> <link rel="preconnect" href="https://fonts.bunny.net">
       <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles --> <style> body { font-family: 'Figtree', sans-serif; background-color: #f8f9fa; } .sidebar { height:100vh; background-color: #343a40; padding:20px; } .sidebar a { color: #ffffff; text-decoration: none; display: block; padding:10px; margin:5px0; border-radius:5px; } .sidebar a:hover { background-color: #495057; } .content { padding:20px; } .header { text-align: center; margin-bottom:20px; } .blog-info { background-color: #ffffff; padding:20px; border-radius:10px; box-shadow:02px10px rgba(0,0,0,0.1); margin-bottom:20px; } .card { margin-bottom:20px; } </style>
     </head>
      <body class="antialiased">
         <div class="d-flex">
            <div class="sidebar">
             @if (Route::has('login'))
              <div class="text-center mb-4">
                @auth
                 <h5 class="text-white">Welcome, {{ Auth::user()->name }}</h5>
                 <a href="{{ route('welcome') }}"> move to welcome page</a>
                 @else <a href="{{ route('login') }}">Log in</a>
                  @if (Route::has('register'))
                   <a href="{{ route('register') }}">Register</a>
                  @endif
                   @endauth </div>
                   @endif <a href="{{ route('products.index') }}"> Products</a>
                   <a href="{{ route('categories.index') }}"> Categories</a> <a href="{{ route('orders.index') }}"> Orders</a>
                   <a href="{{ route('sales') }}"> Sales</a>
                    <a href="{{ route('users.index') }}"> Users</a>
                </div>
                    <div class="content flex-grow-1">
                         <div class="header">
                             <h1>Admins Dashboard</h1>
                             <p>Manage your store and monitor its performance</p> </div>
                              <div class="row">
                                 <div class="col-md-4"> <div class="card text-white bg-primary">
                                     <div class="card-body">
                                     <h5 class="card-title">Total Products</h5>
                                     @php
                                         $productCount = App\Models\Product::count();
                                    @endphp
                                    <p class="card-text">{{ $productCount }}</p>
                                 </div>
                                </div>
                             </div>
                                     <div class="col-md-4">
                                         <div class="card text-white bg-success">
                                         <div class="card-body">
                                             <h5 class="card-title">Total Orders</h5>
                                             @php
                                             $orderCount = App\Models\Order::count();
                                        @endphp
                                             <p class="card-text">{{ $orderCount }}</p>
                                             </div>
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                             <div class="card text-white bg-danger">
                                                <div class="card-body">
                                                     <h5 class="card-title">Total Users</h5>
                                                     @php
                                                     $userCount = App\Models\User::count();
                                                @endphp
                                            <p class="card-text">{{ $userCount }}</p>
                                        </div>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="card text-white bg-danger">
                                           <div class="card-body">
                                                <h5 class="card-title">Total Sales</h5>
                                                @php
                                                $salesCount = App\Models\Order::where('status', 'completed')->count();
                                           @endphp
                                       <p class="card-text">{{ $salesCount }}</p>
                                   </div>
                                </div>
                                </div>
                                     </div>
                                            <div class="blog-info">
                                                <h3>E-Commerce Insights</h3>
                                                 <p>Discover the latest trends, tips, and articles to enhance your online shopping experience and boost your sales.</p>
                                                  <ul> <li>Article1: Getting Started with E-Commerce</li>
                                                     <li>Article2: Strategies for Increasing Online Sales</li>
                                                      <li>Article3: How to Optimize Your Product Listings for Better Visibility</li>
                                                     </ul>
                                                     </div>
                                                     </div>
                                                     </div>
                                                     </body>
                                                      </html>
