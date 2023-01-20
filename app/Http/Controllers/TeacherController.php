<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\User;
use App\Department;
use App\Specialization;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(User $user)
    {
        $departments = Department::all();
        $specializations = Specialization::all();
        return view('teachers.index', compact('user', 'departments', 'specializations'));
    }


    public function load()
    {
        $teachers = Teacher::all();
        return view('teachers.load', compact('teachers'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'mi' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'contactno' => 'required',
            'department_id' => 'required',
            'specialization_id' => 'required'
        ]);
    
        $user->teacher()->updateOrCreate(
            [
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'mi' => $request->mi,
            ], $request->all()
        );


    
        return redirect()->route('users.teachers.index', $user)
                        ->with('success','Profile created successfully.');
    }

}
