<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = \App\Room::paginate(10);
        return view('rooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_room = new \App\Room;
        $new_room->name = $request->get('name');
        $new_room->description = $request->get('description');
        $new_room->price = $request->get('price');
        $new_room->stock = $request->get('stock');
        $new_room->address = $request->get('address');
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photos', 'public');
            $new_room->photo = $file;
        }
        $new_room->slug = str_slug($request->get('name'));
        $new_room->created_by = \Auth::user()->id;

        $new_room->save();
        return redirect()->route('rooms.index')->with('status', 'Room successfully created');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = \App\Room::findOrFail($id);
        return view('rooms.edit', ['room' => $room]);
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
        $room = \App\Room::findOrFail($id);
        $room->name = $request->get('name');
        $room->description = $request->get('description');
        $room->stock = $request->get('stock');
        $room->price = $request->get('price');
        $room->address = $request->get('address');
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photos', 'public');
            $room->photo = $file;
        }
        $room->slug = str_slug($request->get('name'));
        $room->save();
        return redirect()->route('rooms.index', ['id' => $id])->with('status', 'Room succesfully updated');
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
