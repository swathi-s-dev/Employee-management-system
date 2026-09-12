<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
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

        input[type="text"] {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
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

        .back:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 15px;
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

      

        /* Cancel Button */
        .cancel-button {
            margin-left: 10px;
            background: #6c757d;
        }

        .cancel-button:hover {
            background: #5a6268;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style> --}}
</head>

<body>

    <div class="header">

        <h1>Add Department</h1>

        <a href="{{ route('departments.index') }}" class="back">
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

    <form action="{{ route('departments.store') }}" method="POST">

        @csrf

        <!-- Name -->
        <div class="form-group">

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter Department name"
                oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"
                required
            >

        </div>

        <!-- Description -->
        <div class="form-group">

            <label>Description</label>

            <input
                type="text"
                name="description"
                value="{{ old('description') }}"
                placeholder="Enter Description"
                oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"
                required
            >

        </div>

        <!-- Status -->
        <div class="form-group">

            <label>Status</label>

            <div class="status-options">

                <label class="status-option active">

                    <input
                        type="radio"
                        name="status"
                        value="1"
                        checked
                    >

                    Active

                </label>

                <label class="status-option inactive">

                    <input
                        type="radio"
                        name="status"
                        value="0"
                    >

                    Inactive

                </label>

            </div>

        </div>

        <!-- Buttons -->
        <button type="submit">
            Save
        </button>

        <button
            type="button"
            class="cancel-button"
            onclick="clearForm()"
        >
            Cancel
        </button>

    </form>

    <script>

        function clearForm() {

            document.querySelector('input[name="name"]').value = '';

            document.querySelector('input[name="description"]').value = '';

            document.querySelectorAll('input[name="status"]').forEach(function(radio) {
                radio.checked = false;
            });

        }

    </script>

</body>
</html>