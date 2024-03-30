@extends('layouts.app')
@section('content')

@php
$i=0;
@endphp

<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1>Users</h1>
        <a href="{{route('users.create')}}" class="btn btn-primary">Add User</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">created at</th>
                <th scope="col">last update</th>
                <th scope="col">process</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection