<?php

namespace App\Http\Controllers;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(5);
        return view('rooms.index',compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        request()->validate([
            'no' => 'required',
            'building' => 'required',
        ]);
    
        Room::create($request->all());
    
        return redirect()->route('rooms.index')
                        ->with('success','Room created successfully.');
    }

   

}
