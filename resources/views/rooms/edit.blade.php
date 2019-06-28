@extends('layouts.global')

@section('title') Edit Room @endsection

@section('content')

<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('rooms.update', ['id'=>$room->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="name">Name</label>
        <input value="{{$room->name}}" class="form-control" placeholder="Room Name" type="text" name="name" id="name" />
        <br>
        <label for="photo">Photo</label>
        <br>
        @if($room->photo)
            Current photo: <br>
            <img src="{{asset('storage/'.$room->photo)}}" width="300px" />
            <br>
        @else
            No photo
        @endif
        <br>
        <input id="photo" name="photo" type="file" class="form-control">
        <small class="text-muted" style="color:red">Kosongkan jika tidak ingin mengubah photo</small>
        <br>
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control" placeholder="Give a description about this room">{{$room->description}}</textarea>
        <br>
        <label for="stock">Stock</label><br>
        <input value="{{$room->stock}}" type="number" class="form-control" id="stock" name="stock" min=1 value=1>
        <br>
        <label for="Price">Price</label> <br>
        <input value="{{$room->price}}" type="number" class="form-control" name="price" id="price" placeholder="Room price">
        <br>
        <input class="btn btn-primary" type="submit" value="Save" />
    </form>
</div>

@endsection