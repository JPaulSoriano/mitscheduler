<?php

namespace App\Http\Controllers;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-department');
    }

    public function index()
    {
        $departments = Department::latest()->paginate(5);
        return view('departments.index',compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        Department::create($request->all());
    
        return redirect()->route('departments.index')
                        ->with('success','Department created successfully.');
    }
}
