@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mt-5">Login</h3>

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        @if($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
        @endif

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
