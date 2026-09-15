@extends('layouts.app')

@section('title', 'Attendance View')

@section('content')

<div class="header">
    <h1>Attendance View</h1>
    <a href="{{ route('dashboard') }}" class="back">
        Back
    </a>
</div>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Employee</th>
            <th>Date</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($attendances as $attendance)
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
            </tr>
        @endforeach
    </tbody>
</table>

@endsection