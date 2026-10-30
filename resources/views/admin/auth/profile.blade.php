
@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')

@php
    $admin = $admin ?? auth('admin')->user();

    $hasProfileImage = $admin?->profile_picture
        && \Illuminate\Support\Facades\Storage::disk('public')
            ->exists($admin->profile_picture);

    $profileImage = $hasProfileImage
        ? asset('storage/' . $admin->profile_picture)
        : null;

    $fullName = $admin?->name ?: $admin?->username ?: 'Admin';
@endphp

<style>
    .profile-page {
        padding: 20px 0;
    }

    .profile-card {
        background: #fff;
        border: 1px solid #edf0f5;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(25, 35, 55, .05);
        overflow: hidden;
    }

    .profile-summary {
        padding: 30px 22px;
        text-align: center;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #f0edff;
        background: #f5f3ff;
    }

    .profile-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        background: #f0edff;
        color: #5234c9;
        font-size: 48px;
        border: 4px solid #f7f5ff;
    }

    .profile-summary .profile-email {
        overflow-wrap: anywhere;
        font-size: 14px;
    }

    .profile-stat {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #edf0f5;
        font-size: 14px;
    }

    .profile-stat:last-child {
        border-bottom: 0;
    }

    .profile-stat strong {
        text-align: right;
        overflow-wrap: anywhere;
    }

    .profile-content {
        padding: 24px;
    }

    .profile-page .nav-tabs .nav-link {
        color: #667085;
        font-weight: 500;
    }

    .profile-page .nav-tabs .nav-link.active {
        color: #5234c9;
        border-bottom: 2px solid #5234c9;
    }

    .profile-page .form-label {
        font-weight: 600;
        font-size: 14px;
    }

    .profile-page .form-control {
        min-height: 42px;
        border-radius: 7px;
    }

    .profile-page textarea.form-control {
        min-height: 100px;
    }

    .profile-page .btn-primary {
        background: #5234c9;
        border-color: #5234c9;
    }

    .profile-page .btn-primary:hover {
        background: #4025a7;
        border-color: #4025a7;
    }

    .profile-image-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 16px;
    }

    .profile-image-preview {
        width: 120px;
        height: 120px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #e5e7eb;
    }

    .profile-page .section-heading {
        font-weight: 600;
        color: #344054;
    }

    @media (max-width: 767px) {
        .profile-page {
            padding: 10px 0;
        }

        .profile-content {
            padding: 16px;
        }

        .profile-summary {
            padding: 24px 16px;
        }
    }
</style>

<section class="section profile profile-page">

    {{-- Alerts --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Please correct the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (!$admin)
        <div class="alert alert-warning">
            Admin account not found. Please log in again.
            <a href="{{ route('admin.login') }}">Login</a>
        </div>
    @else

    <div class="row g-4">

        {{-- LEFT: PROFILE SUMMARY --}}
        <div class="col-xl-4 col-lg-4 col-md-5">
            <div class="profile-card h-100">

                <div class="profile-summary">

                    @if ($profileImage)
                        <img
                            src="{{ $profileImage }}?v={{ $admin->updated_at?->timestamp ?? time() }}"
                            alt="Admin Profile Picture"
                            class="profile-avatar"
                        >
                    @else
                        <div class="profile-placeholder">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif

                    <h4 class="fw-semibold mt-3 mb-1">
                        {{ $fullName }}
                    </h4>

                    <span class="badge bg-primary-subtle text-primary mb-3">
                        {{ $admin->role ?: 'Admin' }}
                    </span>

                    <p class="text-muted profile-email mb-2">
                        <i class="bi bi-envelope me-1"></i>
                        {{ $admin->email ?: 'Email not added' }}
                    </p>

                    <p class="text-muted small mb-0">
                        <i class="bi bi-telephone me-1"></i>
                        {{ $admin->mobile_number ?: 'Mobile number not added' }}
                    </p>

                    {{-- Picture deletion is a separate form.
                         It is NOT inside the Edit Profile form. --}}
                    @if ($admin->profile_picture)
                        <div class="profile-image-actions">
                            <form
                                action="{{ route('admin.delete-profile-image') }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to permanently delete your profile picture?');"
                            >
                                @csrf

                                <button type="submit"
                                        class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>
                                    Delete Picture
                                </button>
                            </form>
                        </div>
                    @endif

                    <hr class="my-4">

                    <div class="text-start">
                        <div class="profile-stat">
                            <span class="text-muted">Username</span>
                            <strong>{{ $admin->username ?: '—' }}</strong>
                        </div>

                        <div class="profile-stat">
                            <span class="text-muted">City</span>
                            <strong>{{ $admin->city ?: '—' }}</strong>
                        </div>

                        <div class="profile-stat">
                            <span class="text-muted">Country</span>
                            <strong>{{ $admin->country ?: '—' }}</strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- RIGHT: OVERVIEW AND EDIT --}}
        <div class="col-xl-8 col-lg-8 col-md-7">
            <div class="profile-card">

                <div class="profile-content">

                    <ul class="nav nav-tabs nav-tabs-bordered"
                        id="profileTabs" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link active"
                                id="overview-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#profile-overview"
                                type="button"
                                role="tab"
                                aria-controls="profile-overview"
                                aria-selected="true">
                                <i class="bi bi-person-lines-fill me-1"></i>
                                Overview
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link"
                                id="edit-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#profile-edit"
                                type="button"
                                role="tab"
                                aria-controls="profile-edit"
                                aria-selected="false">
                                <i class="bi bi-pencil-square me-1"></i>
                                Edit Profile
                            </button>
                        </li>

                    </ul>

                    <div class="tab-content pt-4">

                        {{-- OVERVIEW --}}
                        <div
                            class="tab-pane fade show active"
                            id="profile-overview"
                            role="tabpanel"
                            aria-labelledby="overview-tab">

                            <h5 class="section-heading mb-3">About</h5>

                            <p class="text-muted">
                                {{ $admin->address ?: 'No address information has been added yet.' }}
                            </p>

                            <h5 class="section-heading mt-4 mb-3">
                                Profile Details
                            </h5>

                            <div class="profile-details">

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Full Name</div>
                                    <div class="col-sm-8 fw-medium">
                                        {{ $admin->name ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Username</div>
                                    <div class="col-sm-8">
                                        {{ $admin->username ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Role</div>
                                    <div class="col-sm-8">
                                        {{ $admin->role ?: 'Admin' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Email Address</div>
                                    <div class="col-sm-8">
                                        {{ $admin->email ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Mobile Number</div>
                                    <div class="col-sm-8">
                                        {{ $admin->mobile_number ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Country</div>
                                    <div class="col-sm-8">
                                        {{ $admin->country ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">State</div>
                                    <div class="col-sm-8">
                                        {{ $admin->state ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">City</div>
                                    <div class="col-sm-8">
                                        {{ $admin->city ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3 border-bottom">
                                    <div class="col-sm-4 text-muted">Pincode</div>
                                    <div class="col-sm-8">
                                        {{ $admin->pincode ?: '—' }}
                                    </div>
                                </div>

                                <div class="row py-3">
                                    <div class="col-sm-4 text-muted">Address</div>
                                    <div class="col-sm-8">
                                        {{ $admin->address ?: '—' }}
                                    </div>
                                </div>

                            </div>

                            <button
                                type="button"
                                class="btn btn-primary mt-3"
                                onclick="document.getElementById('edit-tab').click()">
                                <i class="bi bi-pencil me-1"></i>
                                Edit Profile
                            </button>

                        </div>

                        {{-- EDIT PROFILE --}}
                        <div
                            class="tab-pane fade"
                            id="profile-edit"
                            role="tabpanel"
                            aria-labelledby="edit-tab">

                            <h5 class="section-heading mb-1">
                                Edit Your Information
                            </h5>

                            <p class="text-muted small mb-4">
                                Update your personal details and profile picture.
                            </p>

                            <form
                                action="{{ route('admin.save-profile') }}"
                                method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                {{-- PROFILE PICTURE --}}
                                <div class="mb-4">
                                    <label class="form-label d-block">
                                        Profile Picture
                                    </label>

                                    <div class="d-flex align-items-center gap-3 flex-wrap">

                                        <div>
                                            @if ($profileImage)
                                                <img
                                                    id="profileImagePreview"
                                                    src="{{ $profileImage }}"
                                                    alt="Profile preview"
                                                    class="profile-image-preview">
                                            @else
                                                <div
                                                    id="profileImagePlaceholder"
                                                    class="profile-placeholder"
                                                    style="width:120px;height:120px;">
                                                    <i class="bi bi-person"></i>
                                                </div>

                                                <img
                                                    id="profileImagePreview"
                                                    src=""
                                                    alt="Selected profile preview"
                                                    class="profile-image-preview d-none">
                                            @endif
                                        </div>

                                        <div class="flex-grow-1">

                                            <label for="profileImage"
                                                   class="btn btn-primary btn-sm mb-2">
                                                <i class="bi bi-upload me-1"></i>
                                                Choose Picture
                                            </label>

                                            {{-- Only ONE file input --}}
                                            <input
                                                type="file"
                                                name="profile_picture"
                                                id="profileImage"
                                                class="form-control"
                                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                                            <small class="text-muted d-block mt-2">
                                                JPG, JPEG, PNG or WebP. Maximum 2 MB.
                                                Leave empty to keep the current picture.
                                            </small>

                                            @error('profile_picture')
                                                <div class="text-danger small mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                {{-- FULL NAME --}}
                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Full Name *
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            value="{{ old('name', $admin->name) }}"
                                            maxlength="255"
                                            required>
                                    </div>
                                </div>

                                {{-- USERNAME --}}
                                <div class="row mb-3">
                                    <label for="username"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Username *
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            name="username"
                                            id="username"
                                            class="form-control"
                                            value="{{ old('username', $admin->username) }}"
                                            maxlength="255"
                                            required>
                                    </div>
                                </div>

                                {{-- ROLE --}}
                                <div class="row mb-3">
                                    <label for="role"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Role
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            id="role"
                                            class="form-control"
                                            value="{{ $admin->role ?: 'Admin' }}"
                                            readonly>
                                        <small class="text-muted">
                                            Role cannot be changed from this page.
                                        </small>
                                    </div>
                                </div>

                                {{-- EMAIL --}}
                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Email Address
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control"
                                            value="{{ old('email', $admin->email) }}"
                                            maxlength="255">
                                    </div>
                                </div>

                                {{-- MOBILE --}}
                                <div class="row mb-3">
                                    <label for="mobile_number"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Mobile Number
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="tel"
                                            name="mobile_number"
                                            id="mobile_number"
                                            class="form-control"
                                            value="{{ old('mobile_number', $admin->mobile_number) }}"
                                            maxlength="30">
                                    </div>
                                </div>

                                {{-- COUNTRY --}}
                                <div class="row mb-3">
                                    <label for="country"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Country
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            name="country"
                                            id="country"
                                            class="form-control"
                                            value="{{ old('country', $admin->country) }}"
                                            maxlength="100">
                                    </div>
                                </div>

                                {{-- STATE --}}
                                <div class="row mb-3">
                                    <label for="state"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        State
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            name="state"
                                            id="state"
                                            class="form-control"
                                            value="{{ old('state', $admin->state) }}"
                                            maxlength="100">
                                    </div>
                                </div>

                                {{-- CITY --}}
                                <div class="row mb-3">
                                    <label for="city"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        City
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            name="city"
                                            id="city"
                                            class="form-control"
                                            value="{{ old('city', $admin->city) }}"
                                            maxlength="100">
                                    </div>
                                </div>

                                {{-- PINCODE --}}
                                <div class="row mb-3">
                                    <label for="pincode"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Pincode
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <input
                                            type="text"
                                            name="pincode"
                                            id="pincode"
                                            class="form-control"
                                            value="{{ old('pincode', $admin->pincode) }}"
                                            maxlength="20">
                                    </div>
                                </div>

                                {{-- ADDRESS --}}
                                <div class="row mb-4">
                                    <label for="address"
                                           class="col-md-4 col-lg-3 col-form-label">
                                        Address
                                    </label>

                                    <div class="col-md-8 col-lg-9">
                                        <textarea
                                            name="address"
                                            id="address"
                                            class="form-control"
                                            rows="3"
                                            maxlength="1000">{{ old('address', $admin->address) }}</textarea>
                                    </div>
                                </div>

                                {{-- ACTIONS --}}
                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Save Changes
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="document.getElementById('overview-tab').click()">
                                        Cancel
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    @endif
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('profileImage');
    const preview = document.getElementById('profileImagePreview');
    const placeholder = document.getElementById('profileImagePlaceholder');

    if (!input || !preview) {
        return;
    }

    let previewUrl = null;

    input.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            return;
        }

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Please select a JPG, PNG, or WebP image.');
            this.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('The profile picture must be 2 MB or smaller.');
            this.value = '';
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        preview.src = previewUrl;
        preview.classList.remove('d-none');

        if (placeholder) {
            placeholder.classList.add('d-none');
        }
    });
});
</script>

@endsection
