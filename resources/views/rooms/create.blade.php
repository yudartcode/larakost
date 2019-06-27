@extends('layouts.global')
@section('title') Create room @endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <form action="{{route('rooms.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            @csrf
            <label for="name">Name</label> <br>
            <input type="text" class="form-control" name="name" placeholder="Room Name">
            <br>
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            <br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" class="form-control" placeholder="Give a description about this room"></textarea>
            <br>
            <label for="stock">Stock</label><br>
            <input type="number" class="form-control" id="stock" name="stock" min=1 value=1>
            <br>
            <label for="Price">Price</label> <br>
            <input type="number" class="form-control" name="price" id="price" placeholder="Room price">
            <br>
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
</div>
@endsection