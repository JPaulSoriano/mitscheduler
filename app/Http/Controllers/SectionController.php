<?php

namespace App\Http\Controllers;
use App\Section;
use App\Course;
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
        $sections = Section::latest()->paginate(5);
        return view('sections.index',compact('sections', 'courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'year' => 'required',
            'name' => 'required'
        ]);
    
        Section::create($request->all());
    
        return redirect()->route('sections.index')
                        ->with('success','Section created successfully.');
    }

}
