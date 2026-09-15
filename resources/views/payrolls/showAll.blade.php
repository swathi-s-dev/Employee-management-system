@extends('layouts.app')

@section('title', 'Payroll View')

@section('content')
  
<div class="header">
    <h1>Payroll View</h1>

    <a href="{{ route('dashboard') }}" class="back">
        Back
    </a>
</div>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Employee</th>
             <th>Month</th>
            <th>Basic Salary</th>
            <th>Allowance</th>
            <th>Deduction</th>
            <th>Net Salary</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($payrolls as $payroll)
            <tr>
           <td>
                {{ $payroll->employee->name ?? 'N/A' }}
            </td>

            <td>
                {{ $payroll->month }}
            </td>

            <td>
                ₹{{ number_format($payroll->basic_salary, 2) }}
            </td>

            <td>
                ₹{{ number_format($payroll->allowance, 2) }}
            </td>

            <td>
                ₹{{ number_format($payroll->deduction, 2) }}
            </td>

            <td>
                ₹{{ number_format($payroll->net_salary, 2) }}
            </td>

            <td>

                @if($payroll->status == 'Paid')

                    <span class="status-active">
                        Paid
                    </span>

                @else

                    <span class="status-inactive">
                        Pending
                    </span>

                @endif

            </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection