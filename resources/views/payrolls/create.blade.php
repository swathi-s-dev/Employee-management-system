@extends('layouts.app')

@section('title', 'Add Payroll')

@section('content')
<div class="header">
    <h1>Add Payroll</h1>

    <a href="{{ route('payrolls.index') }}" class="back">
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
    <form action="{{ route('payrolls.store') }}" method="POST">

        @csrf


        <!-- Employee -->

        <div class="form-group">

            <label>Employee</label>

            <select name="employee_id" required>

                <option value="">Select Employee</option>

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


        <!-- Month -->

        <div class="form-group">

            <label>Month</label>

            <input
                type="month"
                name="month"
                value="{{ old('month') }}"
                required
            >

        </div>


        <!-- Basic Salary -->

        <div class="form-group">

            <label>Basic Salary</label>

            <input
                type="number"
                name="basic_salary"
                id="basic_salary"
                value="{{ old('basic_salary') }}"
                placeholder="Enter Basic Salary"
                min="10000"
                step="0.01"
                required
                oninput="calculateNetSalary()"
            >

        </div>


        <!-- Allowance -->

        <div class="form-group">

            <label>Allowance</label>

            <input
                type="number"
                name="allowance"
                id="allowance"
                value="{{ old('allowance', 0) }}"
                placeholder="Enter Allowance"
                min="0"
                step="0.01"
                oninput="calculateNetSalary()"
            >

        </div>


        <!-- Deduction -->

        <div class="form-group">

            <label>Deduction</label>

            <input
                type="number"
                name="deduction"
                id="deduction"
                value="{{ old('deduction', 0) }}"
                placeholder="Enter Deduction"
                min="0"
                step="0.01"
                oninput="calculateNetSalary()"
            >

        </div>


        <!-- Net Salary -->

        <div class="form-group">

            <label>Net Salary</label>

            <input
                type="number"
                id="net_salary_display"
                readonly
            >

            <small>
                Net Salary = Basic Salary + Allowance - Deduction
            </small>

        </div>


        <!-- Status -->

        <div class="form-group">

            <label>Status</label>

            <div class="status-options">

                <label class="status-option">

                    <input
                        type="radio"
                        name="status"
                        value="Pending"
                        {{ old('status', 'Pending') == 'Pending' ? 'checked' : '' }}
                    >

                    Pending

                </label>


                <label class="status-option">

                    <input
                        type="radio"
                        name="status"
                        value="Paid"
                        {{ old('status') == 'Paid' ? 'checked' : '' }}
                    >

                    Paid

                </label>

            </div>

        </div>


        <!-- Buttons -->

        <div class="buttons">

            <button
                type="submit"
                class="save-button">
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

            // Employee dropdown
            document.querySelector('select[name="employee_id"]').value = '';

            // Month
            document.querySelector('input[name="month"]').value = '';

            // Salary fields
            document.querySelector('input[name="basic_salary"]').value = '';

            document.querySelector('input[name="allowance"]').value = '';

            document.querySelector('input[name="deduction"]').value = '';

            // Net salary
            document.getElementById('net_salary_display').value = '';

            // Status
            document.querySelectorAll('input[name="status"]').forEach(function(radio) {

                radio.checked = false;

            });

        }


        function calculateNetSalary() {

            let basic =
                parseFloat(document.getElementById('basic_salary').value) || 0;

            let allowance =
                parseFloat(document.getElementById('allowance').value) || 0;

            let deduction =
                parseFloat(document.getElementById('deduction').value) || 0;


            let netSalary =
                basic + allowance - deduction;


            document.getElementById('net_salary_display').value =
                netSalary.toFixed(2);

        }


        calculateNetSalary();

    </script>

@endsection