@extends('layouts.app')
@section('title', 'Attendance Management')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <div class="header">
        <h1>Attendance Management</h1>
       
        <a href="{{ route('attendances.create') }}" class="add-btn">
             Add Attendance
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($attendances as $attendance)
                <tr>
                    <td>
                        {{ $attendance->employee->name ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $attendance->date }}
                    </td>

                    <td>
                        {{ $attendance->check_in ?? '-' }}
                    </td>

                    <td>
                        {{ $attendance->check_out ?? '-' }}
                    </td>

                    <td>
                        @if($attendance->status == 'Present')
                            <span class="status-present">Present</span>

                        @elseif($attendance->status == 'Absent')
                            <span class="status-absent">Absent</span>

                        @elseif($attendance->status == 'Leave')
                            <span class="status-leave">Leave</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="edit" title="Edit Employee">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('attendances.destroy', $attendance->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                   class="delete" title="Delete Payroll" onclick="return confirm('Are you sure?')"> <i class="bi bi-trash"></i>
                            </button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">
                        No attendance records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection