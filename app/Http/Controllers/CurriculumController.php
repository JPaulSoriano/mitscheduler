<?php

namespace App\Http\Controllers;
use App\Curriculum;
use App\Course;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $curricula = Curriculum::latest()->paginate(5);
        return view('curricula.index',compact('curricula', 'courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        request()->validate([
            'course_id' => 'required',
            'name' => 'required',
            'year' => 'required'
        ]);
    
        Curriculum::create($request->all());
    
        return redirect()->route('curricula.index')
                        ->with('success','Curriculum created successfully.');
    }

}
