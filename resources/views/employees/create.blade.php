<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="header">
        <h1>Add Employee</h1>

        <a href="{{ route('employees.index') }}" class="back">
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

    <form action="{{ route('employees.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter employee name"
                oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"
                required
            >
        </div>

        <div class="form-group">
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter employee email"
                required
            >
        </div>

        <div class="form-group">
            <label>Phone</label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                placeholder="Enter phone number"
                maxlength="10"
                required
            >
        </div>

        {{-- Department --}}
        <div class="form-group">
            <label>Department</label>

            <select name="department_id" required>
                <option value="">Select Department</option>

                @foreach ($departments as $department)
                    <option
                        value="{{ $department->id }}"
                        {{ old('department_id') == $department->id ? 'selected' : '' }}
                    >
                        {{ $department->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Salary</label>

            <input
                type="number"
                name="salary"
                value="{{ old('salary') }}"
                placeholder="Enter Salary"
                required
            >
        </div>

        <div class="form-group">

            <label>Status</label>

            <div class="status-options">

                <label class="status-option">
                    <input
                        type="radio"
                        name="status"
                        value="1"
                        checked
                    >
                    Active
                </label>

                <label class="status-option">
                    <input
                        type="radio"
                        name="status"
                        value="0"
                    >
                    Inactive
                </label>

            </div>

        </div>

        <button type="submit">
            Save
        </button>

    </form>

</body>
</html>