@extends('layouts.global')
@section('title') List Orders @endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="row">
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room ID</th>
                <th>Chack In</th>
                <th>Duration</th>
                <th>Total Price</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>User ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->id}}</td>
                <td>{{$booking->room_name}}</td>
                <td>{{$booking->date_check_in}}</td>
                <td>{{$booking->duration}} month</td>
                <td>IDR {{$booking->total_price}}</td>
                <td>{{$booking->payment_method}}</td>
                <td>
                    @if ($booking->status == "pending")
                    <span class="badge badge-warning">{{$booking->status}}</span>
                    @else
                    <span class="badge badge-success">{{$booking->status}}</span>
                    @endif
                </td>
                <td>{{$booking->user_name}}</td>
                <td><a href="{{route('bookings.edit',['id' => $booking->id])}}" class="btn btn-info btn-sm"> Edit</a>

                    <form onsubmit="return confirm('Delete this order permanently?')" class="d-inline" action="{{route('bookings.destroy', ['id' => $booking->id ])}}" method="POST">
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