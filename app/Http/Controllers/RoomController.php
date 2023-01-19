<?php

namespace App\Http\Controllers;
use App\Room;
use App\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Building $building)
    {
        return view('rooms.index', compact('building'));
    }

    public function store(Request $request, Building $building)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        $building->rooms()->create($request->all());
    
        return redirect()->route('buildings.rooms.index', $building)
                        ->with('success','Room created successfully.');
    }

}
