@extends('fronted.layouts.master')
@section('content')

<!-- Page Content -->
<div class="container">
                       @if($errors->any())
                              <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                           @endforeach
                              </ul>
                             @endif



    <div class="row">

        <div class="col-md-12" id="register">


            <div class="card col-md-8">
            @if(session()->has('msg'))
                             <div class="alert alert-success">
                              {{ session()->get('msg') }}
                              </div>
                               @endif

                <div class="card-body">
                    <h2 class="card-title">Sign Up</h2>
                    <hr>
                    <form action="{{url('store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="Name">Name:</label>
                            <input type="text" name="name" placeholder="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" placeholder="Address" id="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
