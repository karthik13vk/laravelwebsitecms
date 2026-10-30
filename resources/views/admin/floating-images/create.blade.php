@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Add Floating Image</h4>
                <p class="text-muted mb-0">Upload an image for the homepage.</p>
            </div>

            <a href="{{ route('admin.floating-images.index') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left me-1"></i> Back
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('admin.floating-images.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="title" class="form-label">
                                Image Title <span class="text-muted">(Optional)</span>
                            </label>

                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                placeholder="Enter image title">

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="is_active" class="form-label">
                                Status
                            </label>

                            <select name="is_active" id="is_active" class="form-select">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="image" class="form-label">
                                Upload Image <span class="text-danger">*</span>
                            </label>

                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp"
                                required>

                            <small class="text-muted">
                                Accepted formats: JPG, JPEG, PNG, WEBP. Maximum size: 2 MB.
                            </small>

                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <small class="text-muted">
                                Required dimensions: 3822 × 894 pixels. Maximum file size: 2 MB.
                            </small>

                            <div class="mt-3">
                                <img id="image-preview" src="" alt="Image preview"
                                    style="display:none;max-width:250px;max-height:200px;object-fit:contain;"
                                    class="border rounded p-2">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i> Save Image
                        </button>

                        <a href="{{ route('admin.floating-images.index') }}" class="btn btn-light border">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('image');
            const preview = document.getElementById('image-preview');

            input.addEventListener('change', function() {
                const file = this.files && this.files[0];

                if (!file) {
                    preview.removeAttribute('src');
                    preview.style.display = 'none';
                    return;
                }

                if (!file.type.startsWith('image/')) {
                    this.value = '';
                    preview.removeAttribute('src');
                    preview.style.display = 'none';
                    alert('Please select a valid image file.');
                    return;
                }

                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            });
        });
    </script>
@endsection
