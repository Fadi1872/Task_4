@extends('layouts.app')
@section('content')
    @php
    $user = $user[0];
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User {{$user->name}}</div>
                    <div class="card-body">
                        <form action="{{route('users.update', $user->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <label for="exampleInputPassword1" class="col-md-4 col-form-label text-md-end">Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" id="exampleInputPassword1">
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
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('users.editpass', $user->id)}}" class="btn btn-primary" >Change Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection