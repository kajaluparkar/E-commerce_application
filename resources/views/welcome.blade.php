<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/heroic-features.css')}}" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">LaravelShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Cart <strong>({{Cart::instance('default')->count()}})</strong>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        <!-- <a class="dropdown-item " href="">Sign In</a> -->
                        <!-- <a class="dropdown-item" href="{{route('signup')}}">Sign Up</a> -->
                        @if(auth()->user())
                        <a class="dropdown-item" href="{{route('profile')}}">Profile</a>

                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>

                        @else
                        <a class="dropdown-item" href="{{route('signin')}}">Sign In</a>

                        <a class="dropdown-item" href="{{route('signup')}}">Sign Up</a>

                      @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h5 class="display-3"><strong>Welcome,</strong></h5>
        <p class="display-4"><strong>SALE UPTO 50%</strong></p>
        <p class="display-4">&nbsp;</p>
        <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        @foreach($data as $d)

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('uploads/'.$d->image)}}" alt="" height="300px" width="250px">
                <div class="card-body">
                    <h5 class="card-title">{{$d->name}}</h5>
                    <p class="card-text">
                      {!!$d->description!!}                    </p>
                </div>
                <div class="card-footer">
                    <strong>Rs.{{$d->price}}</strong> &nbsp;
                    <form action="{{url('cart/store')}}" method="POST">
                        @csrf
                    <input type="hidden" value="{{$d->id}}" name="id" />
                    <input type="hidden" value="{{$d->name}}" name="name" />
                    <input type="hidden" value="{{$d->price}}" name="price" />
                    <input type="hidden" value="{{$d->image}}" name="price" />

                    <button type="submit" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>



