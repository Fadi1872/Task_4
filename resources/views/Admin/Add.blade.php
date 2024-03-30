@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a New User</div>
                <div class="card-body">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="exampleInputPassword1" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-end">Email address</label>
                            <div class="col-md-6">
                                <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputPassword1" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input type="password" value="{{old('password')}}" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control" id="exampleInputPassword2">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection