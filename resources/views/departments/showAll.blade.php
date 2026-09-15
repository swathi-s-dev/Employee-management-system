@extends('layouts.app')

@section('title', 'Department View')

@section('content')

<div class="header">
    <h1>Department View</h1>

    <a href="{{ route('dashboard') }}" class="back">
        Back
    </a>
</div>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

   <thead>
            <tr>
                
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
              
            </tr>
        </thead>

        <tbody>

            @forelse($departments as $department)

                <tr>
                    
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>
                        <span class="{{ $department->status ? 'status-active' : 'status-inactive' }}">
                            {{ $department->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td> 
                   
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        No Departments found.
                    </td>
                </tr>

            @endforelse

        </tbody>

</table>

@endsection