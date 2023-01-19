<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Section;
use App\Subject;
use App\Room;
use App\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $subjects = Subject::all();
        $rooms = Room::all();
        $teachers = Teacher::all();
        $schedules = Schedule::latest()->paginate(5);
        return view('schedules.index', compact('schedules', 'sections', 'subjects', 'rooms', 'teachers'));
    }

    public function assign(Teacher $teacher)
    {
        $schedules = Schedule::whereNull('teacher_id')->get();
        $myschedules = Schedule::where('teacher_id', '=', $teacher->id)->get();
        return view('schedules.assign', compact('schedules', 'teacher', 'myschedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'subject_id' => 'required',
            'room_id' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'day' => 'required'
        ]);
    
        Schedule::create($request->all());
    
        return redirect()->route('schedules.index')
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
