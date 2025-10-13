@extends('layouts.main')

@section('content')

<h4 class="mb-4 text-primary">Testimonials</h4>
<div class="card">
    <div class="card-datatable table-responsive">
        <table id="testimonials-table" class="table border-top">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Feedback</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="module">
$(function() {
    var dataTable = $('#testimonials-table');
    if (dataTable.length) {
        dataTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('testimonials.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'designation', name: 'designation' },
                { data: 'feedback', name: 'feedback' },
                { data: 'image', name: 'image' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            columnDefs: [
                {
                    targets: 4, // image column
                    render: function(data) {
                        if (!data) return '<span class="text-muted">No Image</span>';
                        return `<img src="${data}" alt="Image" class="rounded" style="width:50px;height:50px;object-fit:cover;">`;
                    }
                },
                {
                    targets: 5, // status column
                    render: function(data, type, full) {
                        var checked = data == 1 ? 'checked' : '';
                        var module = window.location.pathname.split('/')[1];
                        return `
                        <label class="switch">
                            <input type="checkbox" class="switch-input" ${checked} onclick="toggleStatus('${module}', ${full.id}, this)">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"><i class="ti ti-check"></i></span>
                                <span class="switch-off"><i class="ti ti-x"></i></span>
                            </span>
                            <span class="switch-label">${data == 1 ? 'Active' : 'Inactive'}</span>
                        </label>`;
                    }
                },
                {
                    targets: 6, // action column
                    render: function(data, type, full) {
                        return `
                        <button class="btn btn-sm btn-icon me-2" onclick="edit('testimonials/${full.id}/edit', 'modal-lg')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry('/testimonials/${full.id}', 'testimonials-table')">
                            <i class="ti ti-trash"></i>
                        </button>`;
                    }
                }
            ],
            aaSorting: false,
            dom: '<"row mx-1"<"col-sm-12 col-md-3" l><"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end"<"me-3"f>B>>>t' +
                 '<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [{
                text: 'Add Testimonial',
                className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                attr: { onclick: "add('{{ route('testimonials.create') }}','modal-lg')" },
            }]
        });
    }
});
</script>

@endsection
