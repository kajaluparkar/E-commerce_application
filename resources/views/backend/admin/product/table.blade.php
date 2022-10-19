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
                                <p class="category">List of all stock</p>
                                <td><a href="{{route('admin.product.create')}}"><button class="btn btn-success">Add</button></a></td>
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
                                        <td>{{$d->description}}</td>
                                        <td> <img src="{{asset('uploads/'.$d->image)}}" width="50px"  height="50px"></td>
                                        <td>
                                        <a href="{{route('admin.product.edit',$d->id)}}"> <button type="button" class="btn btn-sm btn-info ti-pencil-alt"></button></a>
                                        <a href="{{route('admin.product.delete',$d->id)}}"> <button type="button" class="btn btn-sm btn-danger ti-trash"></button></a>
                                        <a href="{{route('admin.product.detail',$d->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>

                                        </td>
                                        <!-- <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                    <!-- <tr>
                                        <td>2</td>
                                        <td>Minerva Hooper</td>
                                        <td>$23,789</td>
                                        <td>Curaçao</td>
                                        <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sage Rodriguez</td>
                                        <td>$56,142</td>
                                        <td>Netherlands</td>
                                        <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Philip Chaney</td>
                                        <td>$38,735</td>
                                        <td>Korea, South</td>
                                        <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Doris Greene</td>
                                        <td>$63,542</td>
                                        <td>Malawi</td>
                                        <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Mason Porter</td>
                                        <td>$78,615</td>
                                        <td>Chile</td>
                                        <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td>
                                    </tr> -->
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
