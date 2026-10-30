@extends('admin.layouts.app')

@section('title', 'Add New User')
@section('heading', 'Add New User')

@section('content')
    <div class="panel">
        <h5 class="mb-4">Create Admin Account</h5>

        <form action="{{ route('admin.store-user') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="new-password" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                Create User
            </button>
        </form>
    </div>
@endsection
