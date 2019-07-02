@extends('layouts.global')
@section('title') Detail Room @endsection
@section('content')

<div class="w3-card-4" style="float:left">
    @if($room->photo)
    <img src="{{asset('storage/'.$room->photo)}}" width="500px">
    @else
    N/A
    @endif
    <div class="card-footer">
        <div style="font-weight: bold;">{{$room->name}}</div>
        <div style="color:brown"> IDR {{$room->price}}/Month</div>
        <small class="text-muted">Stock : {{$room->stock}}</small>
    </div>
    <form action="{{route('rooms.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
        @csrf
        <label for="month">For (Month)</label>
        <input type="number" class="form-control" id="month" name="month" min=1 value=1>
        <br>
        <input class="btn btn-primary" type="submit" value="Buy This Room" />
    </form>
</div>

@endsection