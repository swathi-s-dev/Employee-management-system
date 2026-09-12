
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@extends('layouts.app')

@section('title', 'Attendance Management')

@section('content')

        <h1>Attendance Management</h1>
        <a href="{{ route('dashboard') }}" class="back">
            🏠 Dashboard
        </a>
        <a href="{{ route('attendances.create') }}" class="back">
            + Add Attendance
        </a>
  

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
                            <span class="status present">Present</span>

                        @elseif($attendance->status == 'Absent')
                            <span class="status absent">Absent</span>

                        @elseif($attendance->status == 'Leave')
                            <span class="status leave">Leave</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('attendances.destroy', $attendance->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this attendance?')">
                                Delete
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