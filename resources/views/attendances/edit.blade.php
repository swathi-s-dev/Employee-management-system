<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="header">
        <h1>Edit Attendance</h1>

        <a href="{{ route('attendances.index') }}" class="back">
            Back
        </a>
    </div>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Employee</label>

            <select name="employee_id" required>
                <option value="">Select Employee</option>

                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}"
                        {{ old('employee_id', $attendance->employee_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Date</label>

            <input
                type="date"
                name="date"
                value="{{ old('date', $attendance->date) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Check In</label>

            <input
                type="time"
                name="check_in"
                value="{{ old('check_in', $attendance->check_in) }}"
            >
        </div>

        <div class="form-group">
            <label>Check Out</label>

            <input
                type="time"
                name="check_out"
                value="{{ old('check_out', $attendance->check_out) }}"
            >
        </div>

        <div class="form-group">
            <label>Status</label>

            <div class="status-options">

                <label class="status-option">
                    <input
                        type="radio"
                        name="status"
                        value="Present"
                        {{ old('status', $attendance->status) == 'Present' ? 'checked' : '' }}
                    >
                    Present
                </label>

                <label class="status-option">
                    <input
                        type="radio"
                        name="status"
                        value="Absent"
                        {{ old('status', $attendance->status) == 'Absent' ? 'checked' : '' }}
                    >
                    Absent
                </label>

                <label class="status-option">
                    <input
                        type="radio"
                        name="status"
                        value="Leave"
                        {{ old('status', $attendance->status) == 'Leave' ? 'checked' : '' }}
                    >
                    Leave
                </label>

            </div>
        </div>

        <button type="submit">
            Update Attendance
        </button>

    </form>

</body>
</html>