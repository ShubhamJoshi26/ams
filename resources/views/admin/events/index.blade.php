@extends('layouts.main')

@section('content')

<h4 class="mb-4 text-primary">Events / Articles</h4>
<div class="card">
    <div class="card-datatable table-responsive">
        <table id="events-table" class="table border-top">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Media</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script type="module">
    $(function() {
        var dataTable = $('#events-table');
        if (dataTable.length) {
            dataTable.DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('events.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'media',
                        name: 'media',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                        targets: 3, // Media column
                        render: function(data, type, full) {
                            // 'data' already contains HTML from controller
                            if (!data) {
                                return '<span class="text-muted">N/A</span>';
                            }
                            return data;
                        }
                    },
                    {
                        targets: 4, // Status column
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
                        targets: 5, // Action column
                        render: function(data, type, full) {
                            return `
                        <button class="btn btn-sm btn-icon me-2" onclick="edit('events/${full.id}/edit','modal-lg')">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-icon delete-record" onclick="destry('/events/${full.id}', 'events-table')">
                            <i class="ti ti-trash"></i>
                        </button>`;
                        }
                    }
                ],
                aaSorting: false,
                dom: '<"row mx-1"<"col-sm-12 col-md-3" l>' +
                    '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end"<"me-3"f>B>>>t' +
                    '<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [{
                    text: 'Add Event / Article',
                    className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                    attr: {
                        onclick: "add('{{ route('events.create') }}','modal-lg')"
                    }
                }]
            });
        }
    });
</script>

@endsection