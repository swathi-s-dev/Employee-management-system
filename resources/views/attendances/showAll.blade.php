<!DOCTYPE html>
<html>
<head>
    <title>Attendance Records</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="header">
    <h1>Attendance Records</h1>

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
        </tr>

        @empty

        <tr>
            <td colspan="6">
                No attendance records found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

</body>
</html>