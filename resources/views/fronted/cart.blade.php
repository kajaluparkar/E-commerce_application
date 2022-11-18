@extends('fronted.layouts.master')
@section('content')


<!-- Page Content -->
<div class="container">

    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
    <hr>

    <h4 class="mt-5">{{Cart::instance('default')->count()}} items(s) in Shopping Cart</h4>

    <div class="cart-items">

        <div class="row">

            <div class="col-md-12">

                <table class="table">

                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td><img src="{{asset('images/12.jpg')}}" style="width: 5em"></td>
                            <td>
                                <strong>{{$d->name}}</strong><br>
                            </td>

                            <td>

                                <a href="{{route('cart.remove',$d->rowId)}}">Remove</a><br>
                                <a href="">Save for later</a>

                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>Rs.{{$d->price}}</td>
                        </tr>
                    @endforeach
                        <!-- <tr>
                            <td><img src="{{asset('images/01.jpg')}}" style="width: 5em"></td>
                            <td>
                                <strong>Laptop</strong><br> This is some text for the product
                            </td>

                            <td>

                                <a href="">Remove</a><br>
                                <a href="">Save for later</a>

                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>$233</td>
                        </tr>

                        <tr>
                            <td><img src="{{asset('images/12.jpg')}}" style="width: 5em"></td>
                            <td>
                                <strong>Laptop</strong><br> This is some text for the product
                            </td>

                            <td>

                                <a href="">Remove</a><br>
                                <a href="">Save for later</a>

                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>$233</td>
                        </tr> -->

                    </tbody>

                </table>

            </div>
            <!-- Price Details -->
                <div class="col-md-6">
                        <div class="sub-total">
                             <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td>Subtotal </td>
                                        <td>{{Cart::subtotal()}} </td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>{{Cart::tax()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>{{Cart::total()}}</th>
                                    </tr>
                             </table>
                         </div>
                    </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                   <a href="{{route('index')}}"><button class="btn btn-outline-dark">Continue Shopping</button></a>
                   <a href="{{route('checkout')}}"> <button class="btn btn-outline-info">Proceed to checkout</button></a>
                <hr>

                </div>

                <div class="col-md-12">

                <h4>{{Cart::instance('default')->count()}}items Save for Later</h4>
                <table class="table">

                    <tbody>

                    @foreach($data as $d)
                        <tr>
                            <td><img src="{{asset('images/12.jpg')}}" style="width: 5em"></td>
                            <td>
                                <strong>{{$d->name}}</strong><br>
                            </td>

                            <td>

                                <a href="{{route('cart.remove',$d->rowId)}}">Remove</a><br>
                                <a href="">Save for later</a>

                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>Rs.{{$d->price}}</td>
                        </tr>
                    @endforeach
                        <!-- <tr>
                            <td><img src="images/01.jpg" style="width: 5em"></td>
                            <td>
                                <strong>Laptop</strong><br> This is some text for the product
                            </td>

                            <td>

                                <a href="{{route('cart.remove',$d->rowId)}}">Remove</a><br>
                                <a href="">Save for later</a>

                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>$233</td>
                        </tr> -->

                        <!-- <tr>
                            <td><img src="images/12.jpg" style="width: 5em"></td>
                            <td>
                                <strong>Laptop</strong><br> This is some text for the product
                            </td>

                            <td>

                                <a href="">Remove</a><br>
                                <a href="">Save for later</a>

                            </td>

                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>

                            <td>$233</td>
                        </tr> -->

                    </tbody>

                </table>

            </div>
                </div>


            </div>
        </div>
@endsection

