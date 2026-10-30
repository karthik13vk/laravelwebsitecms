
@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="mb-1">Testimonials</h3>
            <p class="text-muted mb-0">Manage customer reviews displayed on your website.</p>
        </div>

        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Add Testimonial
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="testimonialsTable" class="table table-bordered table-striped table-hover align-middle w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Customer Name</th>
                            <th>Review</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <img
                                        src="{{ $testimonial->image
                                            ? asset('storage/' . $testimonial->image)
                                            : asset('assets/frontend/images/user.webp') }}"
                                        alt="{{ $testimonial->customer_name }}"
                                        width="45"
                                        height="45"
                                        style="object-fit:cover;border-radius:50%;">
                                </td>

                                <td>{{ $testimonial->customer_name }}</td>

                                <td>{{ $testimonial->review }}</td>

                                <td>
                                    <span class="text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            {{ $i <= $testimonial->rating ? '★' : '☆' }}
                                        @endfor
                                    </span>
                                    <small>({{ $testimonial->rating }}/5)</small>
                                </td>

                                <td>
                                    @if($testimonial->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                <td>{{ $testimonial->created_at?->format('d-m-Y') }}</td>

                                <td class="text-nowrap">
                                    <a
                                        href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form
                                        action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    if ($.fn.DataTable.isDataTable('#testimonialsTable')) {
        $('#testimonialsTable').DataTable().destroy();
    }

    const table = $('#testimonialsTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        order: [[6, 'desc']],
        dom: 'Bflrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copy',
                exportOptions: { columns: [0, 2, 3, 4, 5, 6] }
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                title: 'Testimonials',
                exportOptions: { columns: [0, 2, 3, 4, 5, 6] }
            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                title: 'Testimonials',
                exportOptions: { columns: [0, 2, 3, 4, 5, 6] }
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                title: 'Testimonials',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: { columns: [0, 2, 3, 4, 5, 6] }
            },
            {
                extend: 'print',
                text: 'Print',
                title: 'Testimonials',
                exportOptions: { columns: [0, 2, 3, 4, 5, 6] }
            },
            {
                text: 'Word',
                action: function (e, dt) {
                    const headers = [];
                    $(dt.columns([0, 2, 3, 4, 5, 6]).header()).each(function () {
                        headers.push('<th>' + $('<div>').text($(this).text()).html() + '</th>');
                    });

                    let rows = '';

                    dt.rows({ search: 'applied' }).every(function () {
                        const data = this.data();
                        const indexes = [0, 2, 3, 4, 5, 6];

                        rows += '<tr>';

                        indexes.forEach(function (index) {
                            const cell = $('<div>').html(data[index] ?? '');
                            rows += '<td>' + $('<div>').text(cell.text().trim()).html() + '</td>';
                        });

                        rows += '</tr>';
                    });

                    const html = `
                        <html>
                        <head><meta charset="utf-8"><title>Testimonials</title></head>
                        <body>
                            <h2>Testimonials</h2>
                            <table border="1" cellpadding="5" cellspacing="0">
                                <thead><tr>${headers.join('')}</tr></thead>
                                <tbody>${rows}</tbody>
                            </table>
                        </body>
                        </html>`;

                    const blob = new Blob(['\ufeff', html], {
                        type: 'application/msword'
                    });

                    const url = URL.createObjectURL(blob);
                    const link = document.createElement('a');

                    link.href = url;
                    link.download = 'testimonials.doc';
                    document.body.appendChild(link);
                    link.click();
                    link.remove();

                    URL.revokeObjectURL(url);
                }
            }
        ],
        language: {
            search: 'Search:',
            emptyTable: 'No testimonials found',
            zeroRecords: 'No matching testimonials found'
        }
    });
});
</script>
@endpush
