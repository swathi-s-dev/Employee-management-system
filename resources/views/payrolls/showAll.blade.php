<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="header">
    <h1>Employee List</h1>

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
                            <span class="status present">Paid</span>
                        @else
                            <span class="status absent">Pending</span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('payrolls.edit', $payroll->id) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('payrolls.destroy', $payroll->id) }}"
                            method="POST"
                            style="display:inline;"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this payroll?')"
                            >
                                Delete
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

</body>
</html>