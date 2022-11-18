@extends('fronted.layouts.master')
@section('content')


<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">


                    <h2 class="card-title">Profile</h2>

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
                    @if(session()->has('msg'))
                             <div class="alert alert-success">
                              {{ session()->get('msg') }}
                              </div>
                               @endif




                        <div class="content">
                        <form action="{{ url('/profile/store',$user->id) }}" method="POST">
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
