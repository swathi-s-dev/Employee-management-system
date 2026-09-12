<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')
            ->latest('date')
            ->get();

        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::where('status', 1)->get();

        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
{
    $validate = $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'date' => 'required|date',
        'check_in' => 'nullable',
        'check_out' => 'nullable',
        'status' => 'required|in:Present,Absent,Leave',
    ]);

    $alreadyExists = Attendance::where('employee_id', $request->employee_id)
        ->where('date', $request->date)
        ->exists();

    if ($alreadyExists) {
        return back()
            ->withInput()
            ->withErrors([
                'date' => 'Attendance already exists for this employee on this date.'
            ]);
    }

    Attendance::create($validate);

    return redirect()
        ->route('attendances.index')
        ->with('success', 'Attendance created successfully.');
}

    public function edit(Attendance $attendance)
    {
        $employees = Employee::where('status', 1)->get();

        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendance $attendance)
{
    $validate = $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'date' => 'required|date',
        'check_in' => 'nullable',
        'check_out' => 'nullable',
        'status' => 'required|in:Present,Absent,Leave',
    ]);

    $alreadyExists = Attendance::where('employee_id', $request->employee_id)
        ->where('date', $request->date)
        ->where('id', '!=', $attendance->id)
        ->exists();

    if ($alreadyExists) {
        return back()
            ->withInput()
            ->withErrors([
                'date' => 'Attendance already exists for this employee on this date.'
            ]);
    }

    $attendance->update($validate);

    return redirect()
        ->route('attendances.index')
        ->with('success', 'Attendance updated successfully.');
}

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }
}