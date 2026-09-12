<!DOCTYPE html>
<html>
<head>
    <title>Edit Department</title>
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        /* Back Button */
        .back-button {
            position: absolute;
            top: 20px;
            right: 40px;
            padding: 10px 20px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .back-button:hover {
            background: #5a6268;
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 400px;
            padding: 8px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
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

       

        /* Buttons */
        .buttons {
            margin-top: 20px;
        }

        .update-button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-button:hover {
            background: #0056b3;
        }

        .cancel-button {
            padding: 10px 20px;
            margin-left: 10px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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

    <h1>Edit Department</h1>
    <!-- Back Button -->
    <a href="{{ route('departments.index') }}" class="back-button">
        Back
    </a>
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('departments.update', $department->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name"  value="{{ old('name', $department->name) }}" required>
        </div>

        
        <div class="form-group">
            <label>Description</label>

            <textarea name="description">{{ old('description', $department->description) }}</textarea>
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
                        {{ $department->status == 1 ? 'checked' : '' }}
                    >
                    Active
                </label>

                <label class="status-option inactive">
                    <input
                        type="radio"
                        name="status"
                        value="0"
                        {{ $department->status == 0 ? 'checked' : '' }}
                    >
                    Inactive
                </label>

            </div>
        </div>

        <!-- Buttons -->
        <div class="buttons">

            <button type="submit" class="update-button">
                Update
            </button>

            <button type="button" class="cancel-button" onclick="clearForm()">
                Cancel
            </button>

        </div>

    </form>

    <script>
        function clearForm() {

            document.querySelector('input[name="name"]').value = '';

            document.querySelector('textarea[name="description"]').value = '';

            document.querySelectorAll('input[name="status"]').forEach(function(radio) {
                radio.checked = false;
            });
        }
    </script>

</body>
</html>