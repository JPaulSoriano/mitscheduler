<?php

namespace App\Http\Controllers;
use App\Subject;
use App\Curriculum;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Curriculum $curriculum)
    {
        return view('subjects.index', compact('curriculum'));
    }


    public function store(Request $request, Curriculum $curriculum)
    {
        request()->validate([
            'period' => 'required',
            'level' => 'required',
            'code' => 'required',
            'name' => 'required',
            'lec' => 'required',
            'lab' => 'required',
            'units' => 'required'
        ]);
    
        $curriculum->subjects()->create($request->all());
    
        return redirect()->route('curricula.subjects.index', $curriculum)
                        ->with('success','Subject created successfully.');
    }

}
