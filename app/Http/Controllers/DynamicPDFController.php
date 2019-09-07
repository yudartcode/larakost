<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index() {
        $booking_data = $this->get_booking_data();
        return view('bookings.booking_data_pdf')->with('booking_data', $booking_data);
    }

    function get_booking_data() {
        $booking_data = DB::table('bookings')->limit(1)->get();
        return $booking_data;
    }

    function pdf() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_booking_data_to_HTML());
        $pdf->stream();
    }

    function convert_booking_data_to_HTML(){
        $booking_data = $this->get_booking_data(0);
        $output = '
        <div class="card-header">Booking Detail</div>
    
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>ID Booking</th>
                    <th>Room ID</th>
                    <th>Chack In</th>
                    <th>Duration</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>User ID</th>
                </tr>
            </thead>    
        ';
        $output .= '
        <tbody>
        <tr>
        <td>{{$booking->id}}</td>
        <td>{{$booking->room_id}}</td>
        <td>{{$booking->date_check_in}}</td>
        <td>{{$booking->duration}}</td>
        <td>{{$booking->total_price}}</td>
        <td>{{$booking->payment_method}}</td>
        <td>{{$booking->status}}</td>
        <td>{{$booking->user_id}}</td>
    </tr>
    </tbody>
        ';
        $output .= '</table>';
        return $output;
    }
}
