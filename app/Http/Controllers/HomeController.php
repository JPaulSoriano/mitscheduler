<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\Schedule;
use App\Course;
use App\AcademicYear;
use App\Subject;
use App\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teachers = Teacher::count();
        $courses = Course::count();
        $subjects = Subject::count();
        $rooms = Room::count();
        $schedules = Schedule::count();
        $unassigned = Schedule::whereNull('teacher_id')->count();
        $myschedules = Schedule::orderBy('day', 'ASC')->where('teacher_id', optional(Auth::user()->teacher)->id)->get()->sortBy('time_start');
        $monday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'MON')->get()->sortBy('time_start');
        $tuesday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'TUE')->get()->sortBy('time_start');
        $wednesday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'WED')->get()->sortBy('time_start');
        $thursday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'THU')->get()->sortBy('time_start');
        $friday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'FRI')->get()->sortBy('time_start');
        $saturday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'SAT')->get()->sortBy('time_start');
        $sunday = Schedule::where('teacher_id', optional(Auth::user()->teacher)->id)->where('day', 'SUN')->get()->sortBy('time_start');
        return view('home', compact('myschedules', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'teachers', 'courses', 'subjects', 'rooms', 'schedules', 'unassigned'));
    }
}
