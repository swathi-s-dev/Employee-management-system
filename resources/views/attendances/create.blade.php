@extends('layouts.app')
@section('title', 'Attendance Add')
@section('content')

    <div class="header">
        <h1>Add Attendance</h1>

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


<div class="form-container">

    <form action="{{ route('attendances.store') }}" method="POST">

        @csrf


        <!-- Employee -->

        <div class="form-group">

            <label>Employee</label>

            <select name="employee_id" required>

                <option value="">
                    Select Employee
                </option>

                @foreach($employees as $employee)

                    <option
                        value="{{ $employee->id }}"
                        {{ old('employee_id') == $employee->id ? 'selected' : '' }}
                    >
                        {{ $employee->name }}
                    </option>

                @endforeach

            </select>

        </div>


        <!-- Date -->

        <div class="form-group">

            <label>Date</label>

            <input
                type="date"
                name="date"
                value="{{ old('date', date('Y-m-d')) }}"
                required
            >

        </div>


        <!-- Check In -->

        <div class="form-group">

            <label>Check In</label>

            <input
                type="time"
                name="check_in"
                value="{{ old('check_in') }}"
            >

        </div>


        <!-- Check Out -->

        <div class="form-group">

            <label>Check Out</label>

            <input
                type="time"
                name="check_out"
                value="{{ old('check_out') }}"
            >

        </div>


        <!-- Status -->

        <div class="form-group">

            <label>Status</label>

            <div class="status-options">

                <label class="status-option">

                    <input
                        type="radio"
                        name="status"
                        value="Present"
                        {{ old('status', 'Present') == 'Present' ? 'checked' : '' }}
                    >

                    Present

                </label>


                <label class="status-option">

                    <input
                        type="radio"
                        name="status"
                        value="Absent"
                        {{ old('status') == 'Absent' ? 'checked' : '' }}
                    >

                    Absent

                </label>


                <label class="status-option">

                    <input
                        type="radio"
                        name="status"
                        value="Leave"
                        {{ old('status') == 'Leave' ? 'checked' : '' }}
                    >

                    Leave

                </label>

            </div>

        </div>


        <!-- Buttons -->

        <div class="buttons">

            <button type="submit" class="save-button">
                Save
            </button>

            <button
                type="button"
                class="cancel-button"
                onclick="clearForm()"
            >
                Cancel
            </button>

        </div>

    </form>

</div>


<script>

    function clearForm() {

        document.querySelector('select[name="employee_id"]').value = '';
        document.querySelector('input[name="date"]').value =
            new Date().toISOString().split('T')[0];
        document.querySelector('input[name="check_in"]').value = '';
        document.querySelector('input[name="check_out"]').value = '';
        document.querySelectorAll('input[name="status"]').forEach(function(radio) {
            radio.checked = false;
        });
        document.querySelector('input[name="status"][value="Present"]').checked = true;

    }

</script>

@endsection