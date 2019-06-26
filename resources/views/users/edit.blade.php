@extends('layouts.global')

@section('title') Edit User @endsection

@section('content')

<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', ['id'=>$user->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="name">Name</label>
        <input value="{{$user->name}}" class="form-control" placeholder="Full Name" type="text" name="name" id="name" />
        <br>
        
        <label for="email">Email</label>
        <input value="{{$user->email}}" disabled class="form-control" placeholder="user@mail.com" type="text" name="email" id="email" />
        <br>
        
        <br>
        <label for="phone">Phone number</label>
        <br>
        <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
        <br>
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control">{{$user->address}}
        </textarea>
        <br>
        <input class="btn btn-primary" type="submit" value="Save" />
    </form>
</div>

@endsection