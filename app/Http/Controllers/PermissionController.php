<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        Permission::create($request->all());
    
        return redirect()->route('roles.index')
                        ->with('success','Permission created successfully.');
    }

}
