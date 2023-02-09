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
        $schedules = Schedule::where('section_id', '=', $section->id)->get();
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

    public function viewschedule(Teacher $teacher)
    {
        $myschedules = Schedule::where('teacher_id', '=', $teacher->id)->get();

        return view('schedules.viewschedules', compact('teacher', 'myschedules'));
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
        
        // Check if there is a conflict with the room, day, time_start, and time_end

        $schedules = Schedule::where([
            ['room_id', $request->room_id],
            ['day', $request->day],
        ])->get();

        foreach ($schedules as $schedule) {
            if ($schedule->time_start < $request->time_end && $schedule->time_end > $request->time_start) {
                $section = Section::find($schedule->section_id);
                if ($section->id != $section->id) {
                    return redirect()->back()->withErrors(['conflict' => 'The room is reserved by another section at the specified day and time.']);
                }
            }
        }

        // Check if there is a conflict with the section's schedule
        $schedules = Schedule::where([
            ['section_id', $section->id],
            ['room_id', $request->room_id],
            ['day', $request->day],
        ])->get();

        foreach ($schedules as $schedule) {
            if ($schedule->time_start < $request->time_end && $schedule->time_end > $request->time_start) {
                return redirect()->back()->withErrors(['conflict' => 'The schedule conflicts with another schedule in the same room.']);
            }
        }

        // Check if the subject already exists
            $existingSubject = $section->schedules()
            ->where('subject_id', $request->subject_id)
            ->first();

        if ($existingSubject) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['subject_id' => 'The subject is already scheduled for this section.']);
        }


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
