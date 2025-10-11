@extends('layouts.main')
@section('content')

<script type="module">
    $(function() {
        var dataTable = $('#certification-table');
        if (dataTable.length) {
            dataTable.DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('certifications.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'badge_icon',
                        name: 'badge_icon'
                    },
                    {
                        data: 'issued_date',
                        name: 'issued_date'
                    },
                    {
                        data: 'certificate_id',
                        name: 'certificate_id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        targets: 5, // status column
                        render: function(data, type, full, meta) {
                            var checked = data == 1 ? 'checked' : '';
                            // detect module name dynamically from current URL
                            var module = window.location.pathname.split('/')[1];

                            return `
            <label class="switch">
                <input type="checkbox" class="switch-input" ${checked}
                    onclick="toggleStatus('${module}', ${full.id}, this)">
                <span class="switch-toggle-slider">
                    <span class="switch-on"><i class="ti ti-check"></i></span>
                    <span class="switch-off"><i class="ti ti-x"></i></span>
                </span>
                <span class="switch-label">${data == 1 ? 'Yes' : 'No'}</span>
            </label>
        `;
                        }
                    },
                    {
                        targets: 2, // badge_icon column
                        render: function(data, type, full) {
                            return `<img src="${data}" alt="Badge Icon" class="img-fluid" style="width: 50px; height: 50px;">`;
                        }
                    },
                    {
                        targets: -1, // action column
                        searchable: false,
                        orderable: false,
                        render: function(data, type, full) {
                            return '<button class="btn btn-sm btn-icon me-2" onclick="edit(\'/certifications/' + full.id + '/edit\', \'modal-lg\')"><i class="ti ti-edit"></i></button>' +
                                '<button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/certifications/' + full.id + '\', \'certification-table\')"><i class="ti ti-trash"></i></button>';
                        }
                    }
                ],
                aaSorting: false,
                dom: '<"row mx-1"<"col-sm-12 col-md-3" l><"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end"<"me-3"f>B>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [{
                    text: 'Add Certification',
                    className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                    attr: {
                        'onclick': "add('{{ route('certifications.create') }}','modal-lg')"
                    },
                }]
            });
        }
    });

    // Toggle status function
</script>

<h4 class="mb-4">Certifications List</h4>
<div class="card">
    <div class="card-datatable table-responsive">
        <table id="certification-table" class="table border-top">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Badge Icon</th>
                    <th>Issued Date</th>
                    <th>Certificate ID</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection