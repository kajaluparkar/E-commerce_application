
@extends('backend.layouts.master')
@section('content')

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Product</h4>
                            </div>
                            @if($errors->any())
                            <ul>
                           @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                           @endforeach
                            </ul>
                              @endif

                            <div class="content">
                                <form action="{{url('admin/product/store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Name:</label>
                                                <input type="text" class="form-control border-input" placeholder="" name="name" id="name">
                                            </div>

                                            <div class="form-group">
                                                <label>Product Price:</label>
                                                <input type="text" class="form-control border-input" placeholder="" name="price" id="price">
                                            </div>

                                            <div class="form-group">
                                                <label>Product Description:</label>
                                                <textarea cols="30" rows="10"
                                                          class="form-control border-input" placeholder="Product Description" name="description" id="description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Product Image:</label>
                                                <input type="file" class="form-control border-input" name="image">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <script>
                                    ClassicEditor
                                   .create( document.querySelector( '#description' ) )
                                    .catch( error => {
                                    console.error( error );
                                        } );
                                   </script>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
