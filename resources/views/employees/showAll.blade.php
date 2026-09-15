@extends('layouts.app')

@section('title', 'Employee View')

@section('content')

<div class="header">
    <h1>Employee View</h1>

    <a href="{{ route('dashboard') }}" class="back">
        Back
    </a>
</div>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

        @forelse($employees as $employee)

        <tr>
            <td>{{ $employee->name }}</td>

            <td>{{ $employee->email }}</td>

            <td>{{ $employee->phone }}</td>

            <td>
                {{ $employee->department->name ?? 'Not Assigned' }}
            </td>

            <td>
                ₹{{ number_format($employee->salary, 2) }}
            </td>

            <td>
                @if($employee->status)
                    <span class="status-active">Active</span>
                @else
                    <span class="status-inactive">Inactive</span>
                @endif
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="6">
                No employees found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>
@endsection