@extends('layouts.app')

@section('content')
<div class="container mt-4">

    @if ($showCreate)
        <h3>Create Student</h3>

        <form method="POST" action="{{ route('student.store') }}">
            @csrf
            <div class="mb-3">
                <label>Student Name</label>
                <input type="text" class="form-control" name="std_name" required>
            </div>
            <div class="mb-3">
                <label>DOB</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Back to List</a>

        </form>

    @else
        @if(session()->has('username'))
    <a href="{{ route('logout') }}" class="btn btn-danger float-end mb-3">Logout</a>
@endif
        <h3>Student List</h3>
        <a href="{{ route('student.index', ['create' => 1]) }}" class="btn btn-success mb-3">Create New Student</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $key => $student)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $student->std_name }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">No students found.</td></tr>
                @endforelse
            </tbody>
        </table>
    @endif

</div>
@endsection
