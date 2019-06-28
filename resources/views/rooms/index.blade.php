@extends('layouts.global')
@section('title') Rooms @endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <a href="{{route('rooms.create')}}" class="btn btn-primary"><span class="oi oi-plus"></span> Create New Room</a>
        <br>
        <br>
    </div>
</div>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Description</b></th>
                <th><b>Stock</b></th>
                <th><b>Price</b></th>
                <th><b>Photo</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{$room->name}}</td>
                <td>{{$room->description}}</td>
                <td>{{$room->stock}}</td>
                <td>{{$room->price}}</td>
                <td>
                    @if($room->photo)
                        <img src="{{asset('storage/'.$room->photo)}}" width="70px">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{route('rooms.edit',['id' => $room->id])}}" class="btn btn-info btn-sm"> Edit</a>
        
                    <form onsubmit="return confirm('Delete this room permanently?')" class="d-inline" action="{{route('rooms.destroy', ['id' => $room->id ])}}" method="POST">
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