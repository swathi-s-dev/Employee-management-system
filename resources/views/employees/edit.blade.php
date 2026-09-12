<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

         .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .back {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
         /* Status */
        .status-options {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .status-option {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-weight: normal;
            margin: 0;
        }

        .status-option input {
            width: auto;
            margin: 0;
        }


        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style> --}}
</head>

<body>
    
    <div class="header">
        <h1>Edit Employee</h1>

        <a href="{{ route('employees.index') }}" class="back">Back</a>
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

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $employee->name) }}"  oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}"  placeholder="Enter phone number"  inputmode="numeric" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        </div> 

        <div class="form-group">
            <label>Department</label>

            <select name="department_id">
                <option value="">Select Department</option>

                @foreach($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" value="{{ old('salary', $employee->salary) }}"  placeholder="Enter salary"  inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required min="10000" max="1000000" required>
        </div> 
        <div class="status-options">

                <label class="status-option active">
                    <input
                        type="radio"
                        name="status"
                        value="1"
                        {{ $employee->status == 1 ? 'checked' : '' }}
                    >
                    Active
                </label>

                <label class="status-option inactive">
                    <input
                        type="radio"
                        name="status"
                        value="0"
                        {{ $employee->status == 0 ? 'checked' : '' }}
                    >
                    Inactive
                </label>

            </div>
        <button type="submit">
            Update 
        </button>

    </form>

</body>
</html>