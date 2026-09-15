@extends('layouts.app')
@section('title', 'Department Management')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="header">
    <h1>Department List</h1>
        <a href="{{ route('departments.create') }}" class="add-btn">
            Add Department
        </a>
    </div>
    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <table border="1" cellpadding="10" cellspacing="0" width="100%">

        <thead>

            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            @forelse($departments as $department)

                <tr>

                    {{-- <td>
                        {{ $department->id }}
                    </td> --}}

                    <td>
                        {{ $department->name }}
                    </td>

                    <td>
                        {{ $department->description }}
                    </td>

                    <td>

                        <span class="{{ $department->status ? 'status-active' : 'status-inactive' }}">

                            {{ $department->status ? 'Active' : 'Inactive' }}

                        </span>

                    </td>

                    <td>

                        <a href="{{ route('departments.edit', $department->id) }}"
                           class="edit"
                           title="Edit Department">

                            <i class="bi bi-pencil-square"></i>

                        </a>


                        <form action="{{ route('departments.destroy', $department->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete"
                                    title="Delete Department"
                                    onclick="return confirm('Are you sure you want to delete this department?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" style="text-align:center;">

                        No Departments found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

@endsection