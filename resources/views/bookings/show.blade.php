@extends('layouts.global')
@section('title') Dont Forget To Pay hehe :V @endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="w3-card-4 bg-white" style="max-width:800px; margin-bottom:20px">
    <div class="card-header">Booking Detail</div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID Booking</th>
                <th>Room Name</th>
                <th>Chack In</th>
                <th>Duration</th>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>User Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$booking->id}}</td>
                <td>{{$booking->room_name}}</td>
                <td>{{$booking->date_check_in}}</td>
                <td>{{$booking->duration}} month</td>
                <td>IDR {{$booking->total_price}}</td>
                <td>
                    @if($booking->payment_method == "Bank")
                        <span class="badge badge-success">{{$booking->payment_method}} BNI - 1710520112</span>
                    @elseif($booking->payment_method == "Kost")
                        {{$booking->payment_method}}
                    @endif
                </td>
                <td><span class="badge badge-warning">{{$booking->status}}</span></td>
                <td>{{$booking->user_name}}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('show/pdf') }}" style="margin-left:10px;margin-bottom:10px" class="btn btn-danger">Print into PDF</a>
</div>

@endsection