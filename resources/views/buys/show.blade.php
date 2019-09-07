@extends('layouts.global')
@section('title') Detail Buy @endsection
@section('content')

<div class="w3-card-4" style="float:left">
    @if($room->photo)
    <img src="{{asset('storage/'.$room->photo)}}" width="500px">
    @else
    N/A
    @endif
    <div class="card-footer" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);margin-bottom:20px">
        <div style="font-weight: bold">Facilities</div>
        <p>{{$room->description}}</p>
        <hr>
        <div style="font-weight: bold">Location</div>
        <p>{{$room->address}}</p>
    </div>
</div>
<!-- pembayaran -->
<div class="w3-card-4" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);float:left; margin-left:20px;margin-bottom:10px; min-width:450px;">
    <div class="card-footer">
        <div style="font-weight: bold;">{{$room->name}}</div>
        <div style="color:brown"> IDR <b>{{$room->price}}</b>/Month</div>
        <small class="text-muted">Stock : {{$room->stock}}</small>
    </div>
    <form action="{{route('bookings.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
        @csrf
        <label for="room_id">Room ID</label>
        <input type="text" class="form-control" name="room_id" id="room_id" value="{{$room->id}}" readonly>
        <br>
        <label for="date_check_in" style="font-weight: bold;">Check In</label>
        <div class="input-group mb-3">
            <input class="form-control" type="date" name="date_check_in" id="date_check_in">
        </div>
        <label for="month" style="font-weight:bold">Duration (Month)</label>
        <input type="number" class="form-control" id="month" name="duration" min=1 value=1 onclick='kali()'>
        <br>
        <div style="font-weight: bold;">Total Price</div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">IDR</span>
            </div>
            <input type="text" class="form-control" name="total_price" id="total_price" placeholder="Total Price" readonly>
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
        <hr>
        <label for="payment" style="font-weight: bold;">Payment Method</label>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="payment_method" value="Bank" class="custom-control-input">
            <label class="custom-control-label" for="customRadio1">Bank Transfer</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="payment_method" value="Kost" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">Pay at Kost</label>
        </div>
        <hr>
        <input class="btn btn-primary" type="submit" value="Booking Now!" onclick="enabled()"/>
    </form>
</div>

<script type="text/javascript">
    function kali() {
        var x = {{$room->price}}
        var y = document.getElementById('month').value
        var jawaban = x * y
        document.getElementById('total_price').value = jawaban
    }
</script>

@endsection