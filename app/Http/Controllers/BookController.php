<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = \App\ViewBooking::paginate(20);
        return view('bookings.index', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $new_book = new \App\Booking;
        $new_book->user_id = \Auth::user()->id;
        $new_book->room_id = $request->get('room_id');
        $new_book->date_check_in = $request->get('date_check_in');
        $new_book->duration = $request->get('duration');
        $new_book->total_price = $request->get('total_price');
        $new_book->payment_method = $request->get('payment_method');
        $new_book->save();
        return redirect()->route('bookings.show',['id' => $new_book->id])->with('status', 'Booking Success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $booking = \App\ViewBooking::findOrFail($id);
        return view('bookings.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $booking = \App\Booking::findOrFail($id);
        return view('bookings.edit', ['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $book = \App\Booking::findOrFail($id);
        $book->user_id = $request->get('user_id');
        $book->room_id = $request->get('room_id');
        $book->date_check_in = $request->get('date_check_in');
        $book->duration = $request->get('duration');
        $book->total_price = $request->get('total_price');
        $book->payment_method = $request->get('payment_method');
        $book->status = $request->get('status');
        $book->save();
        return redirect()->route('bookings.index')->with('status', 'Booking Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
