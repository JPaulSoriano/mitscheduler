<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Section;
use App\Subject;
use App\Room;
use App\Teacher;
use App\AcademicYear;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-schedule');
    }

    public function index(Section $section)
    {
        $subjects = Subject::where('level', $section->level)->get();
        $rooms = Room::all();
        $teachers = Teacher::all();
        $schedules = Schedule::latest()->paginate(5);
        return view('schedules.index', compact('subjects', 'rooms', 'teachers', 'schedules', 'section'));
    }

    public function assign(Teacher $teacher)
    {
        $schedules = Schedule::whereNull('teacher_id')->get();
        $myschedules = Schedule::where('teacher_id', '=', $teacher->id)->get();

        $recoms = Schedule::whereNull('teacher_id')->whereHas('subject', function($query)use($teacher)
        {
            $query->where('specialization_id', $teacher->specialization_id);
        })->get();

        return view('schedules.assign', compact('schedules', 'teacher', 'myschedules', 'recoms'));
    }

    public function store(Request $request, Section $section)
    {
        $request->validate([
            'subject_id' => 'required',
            'room_id' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'day' => 'required'
        ]);
    
        $section->schedules()->create($request->all());
        
    
        return redirect()->route('sections.schedules.index', $section)
                        ->with('success','Schedule created successfully.');
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'teacher_id' => 'required'
        ]);
  
        if($request->teacher_id == $schedule->teacher_id)
        {
            $schedule->update(['teacher_id' => null]);
        }else{

            $schedule->update($request->all());
        }
  
        return redirect()->route('teachers.schedules.assign', $request->teacher_id)
                        ->with('success','Schedule assigned successfully');
    }
}
