<?php

namespace App\Http\Controllers;
use App\Subject;
use App\Curriculum;
use App\Specialization;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Curriculum $curriculum)
    {
        $specializations = Specialization::all();
        return view('subjects.index', compact('curriculum', 'specializations'));
    }


    public function store(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'period' => 'required',
            'level' => 'required',
            'code' => 'required',
            'name' => 'required',
            'lec' => 'required',
            'lab' => 'nullable',
            'units' => 'required',
            'specialization_id' => 'required'
        ]);
    
        $curriculum->subjects()->create($request->all());
    
        return redirect()->route('curricula.subjects.index', $curriculum)
                        ->with('success','Subject created successfully.');
    }

}
