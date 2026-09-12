<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')
            ->latest()
            ->get();

        return view('payrolls.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::where('status', 1)->get();

        return view('payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string',
            'basic_salary' => 'required|numeric|min:0',
            'allowance' => 'nullable|numeric|min:0',
            'deduction' => 'nullable|numeric|min:0',
            'status' => 'required|in:Pending,Paid',
        ]);

        $allowance = $request->allowance ?? 0;
        $deduction = $request->deduction ?? 0;

        $validate['net_salary'] =
            $request->basic_salary + $allowance - $deduction;

        $alreadyExists = Payroll::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'month' => 'Payroll already exists for this employee and month.'
                ]);
        }

        Payroll::create($validate);

        return redirect()
            ->route('payrolls.index')
            ->with('success', 'Payroll created successfully.');
    }

    public function edit(Payroll $payroll)
    {
        $employees = Employee::where('status', 1)->get();

        return view('payrolls.edit', compact('payroll', 'employees'));
    }

    // public function showAll()
    // {
    //     $employees = Employee::with('department')->latest()->get();

    //     return view('payrolls.showAll', compact('employees'));
    // }

    public function update(Request $request, Payroll $payroll)
    {
        $validate = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string',
            'basic_salary' => 'required|numeric|min:0',
            'allowance' => 'nullable|numeric|min:0',
            'deduction' => 'nullable|numeric|min:0',
            'status' => 'required|in:Pending,Paid',
        ]);

        $allowance = $request->allowance ?? 0;
        $deduction = $request->deduction ?? 0;

        $validate['net_salary'] =
            $request->basic_salary + $allowance - $deduction;

        Payroll::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->where('id', '!=', $payroll->id)
            ->exists();

        $alreadyExists = Payroll::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->where('id', '!=', $payroll->id)
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'month' => 'Payroll already exists for this employee and month.'
                ]);
        }

        $payroll->update($validate);

        return redirect()
            ->route('payrolls.index')
            ->with('success', 'Payroll updated successfully.');
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return redirect()
            ->route('payrolls.index')
            ->with('success', 'Payroll deleted successfully.');
    }
}