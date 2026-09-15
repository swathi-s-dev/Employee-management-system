@extends('layouts.app')
@section('title', 'Add Department')
@section('content')

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
<div class="form-container">
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
        <div class="buttons">

            <button type="submit" class="save-button">
                Save
            </button>

        <button
            type="button"
            class="cancel-button"
            onclick="clearForm()">Cancel
        </button>

    </form>
</div>
    <script>

        function clearForm() {

            document.querySelector('input[name="name"]').value = '';

            document.querySelector('input[name="description"]').value = '';

            document.querySelectorAll('input[name="status"]').forEach(function(radio) {
                radio.checked = false;
            });

        }

    </script>
@endsection