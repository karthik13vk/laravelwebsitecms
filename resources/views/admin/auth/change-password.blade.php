@extends('admin.layouts.app')

@section('title', 'Change Password')
@section('heading', 'Change Password')

@section('content')
<div class="panel">

    <h5 class="mb-4">Update Your Password</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update-password') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">
                Current Password
            </label>

            <input
                type="password"
                id="current_password"
                name="current_password"
                class="form-control"
                autocomplete="current-password"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                New Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                autocomplete="new-password"
                required
            >

            <small class="text-muted">
                Use at least 8 characters.
            </small>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Confirm New Password
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Update Password
        </button>

    </form>

</div>
@endsection
