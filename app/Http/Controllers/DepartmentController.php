<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

  
    public function create()
    {
      return view('departments.create');  
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);
        Department::create($validate);
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    
    // public function show(string $id)
    // {
    //     $department = Department::findOrFail($id);
    //     return view('departments.show', compact('department'));
    // }

   public function showAll()
{
    $departments = Department::latest()->get();

    return view('departments.showAll', compact('departments'));
}

   public function edit(string $id)
{
    $department = Department::findOrFail($id);

    return view('departments.edit', compact('department'));
}

    
    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $department->update($validate);
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

   
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
