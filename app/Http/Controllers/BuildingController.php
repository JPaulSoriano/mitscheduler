<?php

namespace App\Http\Controllers;
use App\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-building');
    }

    public function index()
    {
        $buildings = Building::latest()->paginate(5);
        return view('buildings.index',compact('buildings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        Building::create($request->all());
    
        return redirect()->route('buildings.index')
                        ->with('success','Building created successfully.');
    }
}
