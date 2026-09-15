
@extends('layouts.app')

@section('title', 'Employee Management')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <div class="header">
        <h1>Employee List</h1>
        <a href="{{ route('employees.create') }}" class="add-btn">
            Add Employee
        </a>
   </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($employees as $employee)

                <tr>
                    {{-- <td>{{ $employee->id }}</td> --}}
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        {{ $employee->department ? $employee->department->name : 'No Department' }}
                    </td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <span class="{{ $employee->status ? 'status-active' : 'status-inactive' }}">
                            {{ $employee->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <td>
                      <a href="{{ route('employees.edit', $employee->id) }}"
                        class="edit"
                        title="Edit Employee">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('employees.destroy', $employee->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete"
                                    title="Delete Employee"
                                    onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6"style="text-align:center;">
                        No employees found.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

@endsection