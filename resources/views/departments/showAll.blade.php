<!DOCTYPE html>
<html>
<head>
    <title>Department List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="header">
    <h1>Department List</h1>

    <a href="{{ route('dashboard') }}" class="back">
        Back
    </a>
</div>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

   <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
              
            </tr>
        </thead>

        <tbody>

            @forelse($departments as $department)

                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>
                        <span class="{{ $department->status ? 'status-active' : 'status-inactive' }}">
                            {{ $department->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td> 
                   
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        No Departments found.
                    </td>
                </tr>

            @endforelse

        </tbody>

</table>

</body>
</html>
{{-- <div class="sidebar">

    <h2>Menu</h2>

    <a href="{{ route('employees.index') }}">
        👥 Employees
    </a>

    <a href="{{ route('departments.index') }}">
        🏢 Departments
    </a>

    <a href="{{ route('attendances.index') }}">
        📅 Attendance
    </a>

    <a href="{{ route('payrolls.index') }}">
        💰 Payroll
    </a>

</div> --}}