<?php

namespace App\Http\Controllers;
use App\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::latest()->paginate(5);
        return view('specializations.index',compact('specializations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        Specialization::create($request->all());
    
        return redirect()->route('specializations.index')
                        ->with('success','Specialization created successfully.');
    }
}
