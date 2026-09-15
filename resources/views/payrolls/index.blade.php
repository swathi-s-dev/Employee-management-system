@extends('layouts.app')
@section('title', 'Payroll Management')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <div class="header">
       <h1>Payroll Management</h1>

       <a href="{{ route('payrolls.create') }}"class="add-btn">Add Payroll</a>
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
            <th>Month</th>
            <th>Basic Salary</th>
            <th>Allowance</th>
            <th>Deduction</th>
            <th>Net Salary</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

    </thead>


    <tbody>

        @forelse($payrolls as $payroll)

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

            <td>

                <a href="{{ route('payrolls.edit', $payroll->id) }}" class="edit" title="Edit Employee"> <i class="bi bi-pencil-square"></i></a>

                <form action="{{ route('payrolls.destroy', $payroll->id) }}"
                    method="POST"
                    style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete" title="Delete Payroll" onclick="return confirm('Are you sure?')"> <i class="bi bi-trash"></i>
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8" style="text-align:center;">
                No payroll records found.
            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection