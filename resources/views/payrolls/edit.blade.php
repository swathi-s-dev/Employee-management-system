@extends('layouts.app')

@section('title', 'Edit Payroll ')

@section('content')
<div class="header">
        <h1> Edit Payroll</h1>
        <a href="{{ route('payrolls.index') }}" class="back">
             Back</a>
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
    <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Employee</label>

            <select name="employee_id" required>
                <option value="">Select Employee</option>

                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}"
                        {{ old('employee_id', $payroll->employee_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Month</label>
            <input type="month" name="month" value="{{ old('month', $payroll->month) }}" required>
        </div>

        <div class="form-group">
            <label>Basic Salary</label>
                    <input 
            type="number" 
            name="basic_salary" 
            id="basic_salary" 
            value="{{ old('basic_salary', $payroll->basic_salary) }}" 
            min="0" 
            step="0.01" 
            required 
            oninput="calculateNetSalary()" 
        >
                </div>


 <div class="form-group">
            <label>Allowance</label>

            <input
                type="number"
                name="allowance"
                id="allowance"
                value="{{ old('allowance',$payroll->allowance, 0) }}"
                min="0"
                step="0.01"
                oninput="calculateNetSalary()"
            >
        </div>


        <div class="form-group">
            <label>Deduction</label>

            <input
                type="number"
                name="deduction"
                id="deduction"
                value="{{ old('deduction',$payroll->deduction, 0) }}"
                min="0"
                step="0.01"
                oninput="calculateNetSalary()"
            >
        </div>


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


        <div class="form-group">

            <label>Status</label>

            <label style="display:inline; margin-right:15px;">
                <input
                    type="radio"
                    name="status"
                    value="Pending"
                    {{ old('status', 'Pending') == 'Pending' ? 'checked' : '' }}
                >
                Pending
            </label>

            <label style="display:inline;">
                <input
                    type="radio"
                    name="status"
                    value="Paid"
                    {{ old('status') == 'Paid' ? 'checked' : '' }}
                >
                Paid
            </label>

        </div>
        <button type="submit" class="update-button">
                Update
            </button>
    </form>
</div>

    <script>

       
        
        function calculateNetSalary()
        {
            let basic = parseFloat(document.getElementById('basic_salary').value) || 0;

            let allowance = parseFloat(document.getElementById('allowance').value) || 0;

            let deduction = parseFloat(document.getElementById('deduction').value) || 0;

            let netSalary = basic + allowance - deduction;

            document.getElementById('net_salary_display').value =
                netSalary.toFixed(2);
        }

        calculateNetSalary();

    </script>

@endsection


        