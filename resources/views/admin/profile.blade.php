@extends('backend.layouts.master')
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Profile</h4>

                            {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif --}}

                        </div>
                        <div class="content">
                            <form action="{{ url('admin/profile/store',$user->id) }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control border-input"
                                                placeholder="name"id="name"value="{{ $user->name }}" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" class="form-control border-input"
                                                placeholder="email"id="email"value="{{ $user->email }}" name="email">
                                        </div>

                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control border-input"
                                                placeholder="password"id="password"value=""
                                                name="password">
                                        </div>
                                        <div class="">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                                    </div>


                                    </div>

                                </div>
                                <div class="">

                                </div>
                                <div class="clearfix"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


