@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Floating Images</h4>
            <p class="text-muted mb-0">Manage homepage floating images.</p>
        </div>

        <a href="{{ route('admin.floating-images.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Add Image
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show"
             role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle"
                       id="floatingImagesTable">
                    <thead class="table-light">
                        <tr>
                            <th width="60">#</th>
                            <th width="150">Image</th>
                            <th>Title</th>
                            <th width="110">Status</th>
                            <th width="160">Created Date</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($floatingImages as $image)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <img
                                        src="{{ asset('storage/' . $image->image) }}"
                                        alt="{{ $image->title ?? 'Floating image' }}"
                                        style="width:100px;height:70px;object-fit:contain;"
                                        class="border rounded p-1"
                                    >
                                </td>

                                <td>
                                    {{ $image->title ?: 'Untitled image' }}
                                </td>

                                <td>
                                    @if($image->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $image->created_at?->format('d M Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.floating-images.edit', $image->id) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Edit image">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.floating-images.destroy', $image->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this image?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete image">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted mb-2">
                                        No floating images found.
                                    </p>

                                    <a href="{{ route('admin.floating-images.create') }}"
                                       class="btn btn-sm btn-primary">
                                        Add your first image
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const alertElement = document.getElementById('success-alert');

    if (alertElement) {
        setTimeout(function () {
            if (typeof bootstrap !== 'undefined') {
                bootstrap.Alert.getOrCreateInstance(alertElement).close();
            } else {
                alertElement.remove();
            }
        }, 3000);
    }
});
</script>
@endsection

