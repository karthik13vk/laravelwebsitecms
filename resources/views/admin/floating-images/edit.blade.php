@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Edit Floating Image</h4>
            <p class="text-muted mb-0">Update your homepage image.</p>
        </div>

        <a href="{{ route('admin.floating-images.index') }}"
           class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i> Back
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form
                action="{{ route('admin.floating-images.update', $floatingImage->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="title" class="form-label">
                            Image Title <span class="text-muted">(Optional)</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $floatingImage->title) }}"
                            placeholder="Enter image title"
                        >

                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="is_active" class="form-label">
                            Status
                        </label>

                        <select name="is_active" id="is_active" class="form-select">
                            <option value="1"
                                {{ (string) old('is_active', (int) $floatingImage->is_active) === '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ (string) old('is_active', (int) $floatingImage->is_active) === '0' ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label d-block">
                            Current Image
                        </label>

                        <img
                            id="image-preview"
                            src="{{ asset('storage/' . $floatingImage->image) }}"
                            alt="{{ $floatingImage->title ?? 'Floating image' }}"
                            style="max-width:250px;max-height:200px;object-fit:contain;"
                            class="border rounded p-2 mb-3"
                        >

                        <label for="image" class="form-label d-block">
                            Replace Image <span class="text-muted">(Optional)</span>
                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control @error('image') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted">
                            Leave empty to keep the current image. Accepted formats: JPG, JPEG, PNG, WEBP. Maximum size: 2 MB.
                        </small>

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Update Image
                    </button>

                    <a href="{{ route('admin.floating-images.index') }}"
                       class="btn btn-light border">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    let currentPreviewUrl = null;

    input.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            return;
        }

        if (!file.type.startsWith('image/')) {
            this.value = '';
            alert('Please select a valid image file.');
            return;
        }

        if (currentPreviewUrl) {
            URL.revokeObjectURL(currentPreviewUrl);
        }

        currentPreviewUrl = URL.createObjectURL(file);
        preview.src = currentPreviewUrl;
    });
});
</script>
@endsection
