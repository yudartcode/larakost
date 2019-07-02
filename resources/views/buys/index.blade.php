@extends('layouts.global')
@section('title') Buy Room @endsection
@section('content')

    @foreach($rooms as $room)
    <div class="w3-card-4" style="width:300px;float:left">
            @if($room->photo)
                <img src="{{asset('storage/'.$room->photo)}}" width="300px" height="200px">
            @else
                N/A
            @endif
            <div class="card-footer">
                <div style="font-weight: bold;"><a href="{{route('buys.show', ['id' => $room->id])}}"> {{$room->name}} </a></div>
                <div style="color:brown"> IDR {{$room->price}}/Month</div>
                <small class="text-muted">Stock : {{$room->stock}}</small>
            </div>
    </div>
    @endforeach

@endsection