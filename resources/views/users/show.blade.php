@extends('layouts.global')
@section('title') Detail user @endsection
@section('content')

<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <b>Name:</b> <br />
            {{$user->name}}
            <br><br>

            <b>Email:</b><br>
            {{$user->email}}
            <br><br>

            <b>Phone number</b> <br>
            {{$user->phone}}
            <br><br>

            <b>Address</b> <br>
            {{$user->address}}
            <br>
            <br>
            <a class="btn btn-primary" href="{{route('users.edit',['id'=>$user->id])}}">Edit Profile</a>
        </div>
    </div>
</div>

@endsection