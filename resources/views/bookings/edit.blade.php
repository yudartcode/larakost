@extends('layouts.global')

@section('title') Edit Room @endsection

@section('content')

<div class="col-md-8">
    <form action="{{route('bookings.update', ['id'=>$booking->id])}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="booking_id">Booking ID</label>
        <input type="text" class="form-control" name="booking_id" id="booking_id" value="{{$booking->id}}" readonly>
        <br>
        <label for="room_id">Room ID</label>
        <input type="text" class="form-control" name="room_id" id="room_id" value="{{$booking->room_id}}" readonly>
        <br>
        <label for="user_id">User ID</label>
        <input type="text" class="form-control" name="user_id" id="user_id" value="{{$booking->user_id}}" readonly>
        <br>
        <label for="date_check_in" style="font-weight: bold;">Check In</label>
        <div class="input-group mb-3">
            <input class="form-control" type="date" name="date_check_in" id="date_check_in" value="{{$booking->date_check_in}}" readonly>
        </div>
        <label for="month" style="font-weight:bold">Duration (Month)</label>
        <input type="number" class="form-control" id="month" name="duration" readonly value="{{$booking->duration}}">
        <br>
        <div style="font-weight: bold;">Total Price</div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">IDR</span>
            </div>
            <input type="text" class="form-control" name="total_price" id="total_price" value="{{$booking->total_price}}" readonly>
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
        <hr>
        <label for="payment" style="font-weight: bold;">Payment Method</label>
        <input type="text" class="form-control" name="payment_method" id="payment_method" value="{{$booking->payment_method}}" readonly>
        <br>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" value="{{$booking->status}}">
                <option value="pending">Pending</option>
                <option value="finish">Finish</option>
            </select>
        </div>
        <input class="btn btn-primary" type="submit" value="Update" />
    </form>
</div>

@endsection