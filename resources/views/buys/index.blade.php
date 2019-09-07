@extends('layouts.global')
@section('title') Booking @endsection
@section('content')

    @foreach($rooms as $room)
    <div class="w3-card-4" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);width:300px;float:left; margin:10px">
            @if($room->photo)
                <img src="{{asset('storage/'.$room->photo)}}" width="300px" height="200px">
            @else
                N/A
            @endif
            <div class="card-footer">
                <div style="font-weight: bold;"><a href="{{route('buys.show', ['id' => $room->id])}}"> {{$room->name}} </a></div>
                <div style="color:brown"> IDR {{$room->price}}/Month</div>
                <small class="text-muted">Stock : {{$room->stock}}</small>
                <hr>
                {{$room->address}}
            </div>
    </div>
    @endforeach

@endsection