@extends('backend.layouts.master')
@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">order Detail</h4>
                                <p class="category">List of the stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>

                                        <tr>
                                            <th>ID</th>
                                            <td>{{$data->id}}</td>
                                        </tr>

                                        <tr>
                                            <th>Users</th>
                                            <td>{{$data->user}}</td>
                                        </tr>

                                        <tr>
                                            <th>Product</th>
                                            <td>{{$data->product}}</td>
                                        </tr>

                                        <tr>
                                            <th>Quantity</th>
                                            <td>{{$data->quantity}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$data->address}}</td>
                                        </tr>

                                        <tr>
                                            <th>Created At</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>

                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{$data->updated_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><span class="label label-success">Confirmed</span></td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
