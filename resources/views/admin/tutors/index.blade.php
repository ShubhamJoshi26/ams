@extends('layouts.main')

@section('content')

<h4 class="mb-4 text-primary">Tutors</h4>
<div class="card">
    <div class="card-datatable table-responsive">
        <table id="tutors-table" class="table border-top">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Experience</th>
                    <th>Designation</th>
                    <th>Bio</th>
                    <th>Course</th>
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
    var dataTable = $('#tutors-table');
    if (dataTable.length) {
        dataTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tutors.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'experience', name: 'experience' },
                { data: 'designation', name: 'designation' },
                { data: 'bio', name: 'bio' },
                { data: 'course_name', name: 'course_name' }, // new column
                { data: 'image', name: 'image' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            columnDefs: [
                {
                    targets: 6, // image column
                    render: function(data) {
                        if(!data) return '<span class="text-muted">No Image</span>';
                        return `<img src="${data}" alt="Tutor Image" class="rounded" style="width:50px;height:50px;object-fit:cover;">`;
                    }
                },
                {
                    targets: 7, // status column
                    render: function(data, type, full) {
                        // console.log(data);
                            var checked = data == 1 ? 'checked' : '';
                            var module = window.location.pathname.split('/')[1];
                            console.log(module);
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
                    targets: 8, // action column
                    render: function(data, type, full) {
                        return `
                        <button class="btn btn-sm btn-icon me-2" onclick="edit('tutors/${full.id}/edit','modal-lg')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry('/tutors/${full.id}', 'tutors-table')">
                            <i class="ti ti-trash"></i>
                        </button>`;
                    }
                }
            ],
            aaSorting: false,
            dom: '<"row mx-1"<"col-sm-12 col-md-3" l><"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end"<"me-3"f>B>>>t' +
                 '<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [
                {
                    text: 'Add Tutor',
                    className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                    attr: { onclick: "add('{{ route('tutors.create') }}','modal-lg')" }
                }
            ]
        });
    }
});
</script>

@endsection
