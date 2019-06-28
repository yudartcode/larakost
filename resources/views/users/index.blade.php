@extends('layouts.global')
@section('title') Rooms @endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Phone Number</b></th>
                <th><b>Address</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>
                    <a href="{{route('users.edit',['id' => $user->id])}}" class="btn btn-info btn-sm"> Edit</a>
        
                    <form onsubmit="return confirm('Delete this room permanently?')" class="d-inline" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection