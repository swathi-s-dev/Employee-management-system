@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')

<div class="header">
    <h1>Edit Department</h1>

    

    <a href="{{ route('departments.index') }}" class="back">
         Back
    </a>
</div>

    <!-- Validation Errors -->

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

    <!-- Edit Department Form -->

    <form action="{{ route('departments.update', $department->id) }}"
          method="POST">

        @csrf

        @method('PUT')


        <!-- Name -->

        <div class="form-group">

            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $department->name) }}"
                required
            >

        </div>


        <!-- Description -->

        <div class="form-group">

            <label>Description</label>

            <textarea name="description">{{ old('description', $department->description) }}</textarea>

        </div>


        <!-- Status -->

        <div class="form-group">

            <label>Status</label>

            <div class="status-options">

                <label class="status-option">

                    <input
                        type="radio"
                        name="status"
                        value="1"
                        {{ $department->status == 1 ? 'checked' : '' }}
                    >

                    Active

                </label>


                <label class="status-option">

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


        <button type="submit" class="update-button">
                Update
            </button>
    </form>


   
</div>
@endsection