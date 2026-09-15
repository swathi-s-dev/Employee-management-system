<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

//login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// employee routes
Route::resource('employees', EmployeeController::class)->middleware('auth')->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::get('/employee-list', [EmployeeController::class, 'showAll'])->middleware('auth')->name('employees.showAll');

//departments routes
Route::get('/departments-list', [DepartmentController::class, 'showAll'])->middleware('auth')->name('departments.showAll');
Route::resource('departments', DepartmentController::class)->middleware('auth') ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

//attendances routes
Route::resource('attendances', AttendanceController::class)->middleware('auth')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::get('/attendance-list', [AttendanceController::class, 'showAll'])->middleware('auth')->name('attendances.showAll');

//payrolls routes
Route::resource('payrolls', PayrollController::class)->middleware('auth')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::get('/payroll-list', [PayrollController::class, 'showAll'])->middleware('auth')->name('payrolls.showAll');
   
//dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// GET       /employees
// GET       /employees/create
// POST      /employees
// GET       /employees/{employee}
// GET       /employees/{employee}/edit
// PUT/PATCH /employees/{employee}
// DELETE    /employees/{employee}
// 
