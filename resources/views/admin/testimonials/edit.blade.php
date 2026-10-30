
@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Edit Testimonial</h3>
            <p class="text-muted mb-0">Update customer feedback and display settings.</p>
        </div>

        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
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

    <div class="card">
        <div class="card-body">
            <form
                action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="customer_name" class="form-label">
                            Customer Name <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="customer_name"
                            id="customer_name"
                            class="form-control @error('customer_name') is-invalid @enderror"
                            value="{{ old('customer_name', $testimonial->customer_name) }}"
                            required>

                        @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="rating" class="form-label">
                            Star Rating <span class="text-danger">*</span>
                        </label>

                        <select name="rating" id="rating" class="form-select" required>
                            @for($i = 5; $i >= 1; $i--)
                                <option
                                    value="{{ $i }}"
                                    @selected(old('rating', $testimonial->rating) == $i)>
                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                </option>
                            @endfor
                        </select>

                        @error('rating')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="review" class="form-label">
                            Customer Review <span class="text-danger">*</span>
                        </label>

                        <textarea
                            name="review"
                            id="review"
                            rows="5"
                            class="form-control @error('review') is-invalid @enderror"
                            required>{{ old('review', $testimonial->review) }}</textarea>

                        @error('review')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Current Customer Image</label>

                        <img
                            id="imagePreview"
                            src="{{ $testimonial->image
                                ? asset('storage/' . $testimonial->image)
                                : asset('assets/frontend/images/user.webp') }}"
                            alt="{{ $testimonial->customer_name }}"
                            width="90"
                            height="90"
                            style="object-fit:cover;border-radius:50%;">

                        <label for="image" class="form-label d-block mt-3">
                            Change Customer Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control @error('image') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">Leave empty to keep the current image. Maximum 2 MB.</small>

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Status</label>

                        <input type="hidden" name="is_active" value="0">

                        <div class="form-check form-switch mt-2">
                            <input
                                type="checkbox"
                                name="is_active"
                                id="is_active"
                                class="form-check-input"
                                value="1"
                                @checked(old('is_active', $testimonial->is_active ? '1' : '0') == '1')>

                            <label class="form-check-label" for="is_active">
                                Active — display on homepage
                            </label>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Update Testimonial
                    </button>

                    <a href="{{ route('admin.testimonials.index') }}"
                       class="btn btn-light border">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#image').on('change', function () {
        const file = this.files[0];

        if (file) {
            $('#imagePreview').attr('src', URL.createObjectURL(file));
        }
    });
});
</script>
@endpush
