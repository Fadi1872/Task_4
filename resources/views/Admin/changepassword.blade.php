@extends('layouts.app')
@section('content')
    @php
    $user = $user[0];
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Password For User {{$user->name}}</div>
                    <div class="card-body">
                        <form action="{{route('users.updatepass', $user->id)}}" method="post">
                            @method('PUT')
                            @csrf
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
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection