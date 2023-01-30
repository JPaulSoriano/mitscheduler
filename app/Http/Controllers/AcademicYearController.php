<?php

namespace App\Http\Controllers;
use App\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicyears = AcademicYear::get();
        return view('academicyears.index',compact('academicyears'));
    }

    public function edit(AcademicYear $academicyear)
    {
        return view('academicyears.edit',compact('academicyear'));
    }

    public function update(Request $request, AcademicYear $academicyear)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $academicyear->update($request->all());

        return redirect()->route('academicyears.index')
                        ->with('success','Academic Year changed successfully');
    }
}