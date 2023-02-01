<?php

namespace App\Http\Controllers;
use App\Section;
use App\Course;
use App\AcademicYear;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-section');
    }

    public function index()
    {
        $courses = Course::all();
        $sections = Section::where('academic_year', '=', AcademicYear::latest()->first()->name)->get();
        return view('sections.index',compact('sections', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'level' => 'required',
            'name' => 'required'
        ]);
        
        $input = $request->all();
        $input['academic_year'] = AcademicYear::latest()->first()->name;

        Section::create($input);
    
        return redirect()->route('sections.index')
                        ->with('success','Section created successfully.');
    }

}
