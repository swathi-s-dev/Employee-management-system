<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\Payroll;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();

        $totalDepartments = Department::count();

        $todayAttendance = Attendance::whereDate('date', today())->count();

        $totalPayroll = Payroll::sum('net_salary');

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'todayAttendance',
            'totalPayroll'
        ));
    }
}