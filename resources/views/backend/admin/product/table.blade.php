@extends('backend.layouts.master')
@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                @if(session()->has('msg'))
                             <div class="alert alert-success">
                              {{ session()->get('msg') }}
                              </div>
                               @endif

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Products</h4>
                                <p class="category">List of all stock</p><br>
                                <td><a href="{{route('admin.product.create')}}"><button class="btn btn-success ti-plus">Add</button></a></td>
                                </div>


                               <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>{!!$d->description!!}</td>
                                        <td> <img src="{{asset('uploads/'.$d->image)}}" width="50px"  height="50px"></td>
                                        <td>
                                        <a href="{{route('admin.product.edit',$d->id)}}"> <button type="button" class="btn btn-sm btn-info ti-pencil-alt"></button></a>
                                        <a href="{{route('admin.product.delete',$d->id)}}"> <button type="button" class="btn btn-sm btn-danger ti-trash"></button></a>
                                        <a href="{{route('admin.product.detail',$d->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$data->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
