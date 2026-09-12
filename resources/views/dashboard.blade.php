/* DASHBOARD */
<style>
.content h2 {
    margin-top: 0;
    margin-bottom: 25px;
}


/* DASHBOARD CARDS */

.dashboard {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 20px;

    margin-top: 20px;
}


/* EACH CARD */

.card {
    padding: 25px 20px;

    background: #ffffff;

    border: 1px solid #ddd;

    border-radius: 10px;

    text-align: center;

    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}


/* CARD TITLE */

.card h2 {
    margin: 0 0 15px;

    font-size: 18px;

    color: #333;
}


/* CARD NUMBER */

.card p {
    margin: 0;

    font-size: 30px;

    font-weight: bold;

    color: #333;
}


/* DASHBOARD LINKS */

.links {
    margin-top: 30px;
}

.links a {
    display: inline-block;

    margin-right: 10px;
    margin-bottom: 10px;

    padding: 10px 18px;

    text-decoration: none;

    color: #333;

    border: 1px solid #ccc;

    border-radius: 5px;

    background: #fff;
}

.links a:hover {
    background: #eeeeee;
}


/* TABLET */

@media (max-width: 1000px) {

    .dashboard {
        grid-template-columns: repeat(2, 1fr);
    }

}


/* MOBILE */

@media (max-width: 600px) {

    .dashboard {
        grid-template-columns: 1fr;
    }

}
</style>
@extends('layouts.app')

@section('title', 'Employee Management')

@section('content')
    <!-- DASHBOARD CONTENT -->

    <div class="content">

        <h2>Dashboard Overview</h2>

        <div class="dashboard">

            <div class="card">
                <h2>Total Employees</h2>
                <p>{{ $totalEmployees }}</p>
            </div>

            <div class="card">
                <h2>Total Departments</h2>
                <p>{{ $totalDepartments }}</p>
            </div>

            <div class="card">
                <h2>Today's Attendance</h2>
                <p>{{ $todayAttendance }}</p>
            </div>

            <div class="card">
                <h2>Total Payroll</h2>
                <p>
                    ₹{{ number_format($totalPayroll, 2) }}
                </p>
            </div>

        </div>

    </div>


    <!-- DASHBOARD LINKS -->

    <div class="links">

        <a href="{{ route('employees.index') }}">
            👥 Employees
        </a>
<br>
        <a href="{{ route('departments.index') }}">
            🏢 Departments
        </a><br>

        <a href="{{ route('attendances.index') }}">
            📅 Attendance
        </a><br>

        <a href="{{ route('payrolls.index') }}">
            💰 Payroll
        </a><br>

    </div>

@endsection