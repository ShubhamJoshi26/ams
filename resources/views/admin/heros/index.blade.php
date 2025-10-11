@extends('layouts.main')
@section('content')

<script type="module">
    $(function() {
        var dataTable = $('#hero-table');

        if (dataTable.length) {
            dataTable.DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('heros.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'subtitle',
                        name: 'subtitle'
                    },
                    {
                        data: 'button_text',
                        name: 'button_text'
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
                        targets: 4, // status column index
                        render: function(data, type, full, meta) {
                            var checked = data == 1 ? 'checked' : '';
                            // Automatically detect current module name from URL
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
                        targets: -1,
                        searchable: false,
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return '<button class="btn btn-sm btn-icon me-2" onclick="edit(\'/heros/' + full.id + '/edit\', \'modal-lg\')"><i class="ti ti-edit"></i></button>' +
                                '<button class="btn btn-sm btn-icon delete-record" onclick="destry(\'/heros/' + full.id + '\', \'hero-table\')"><i class="ti ti-trash"></i></button>';
                        }
                    }
                ],
                aaSorting: false,
                dom: '<"row mx-1"<"col-sm-12 col-md-3" l><"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end"<"me-3"f>B>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [{
                    text: 'Add Hero',
                    className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                    attr: {
                        'onclick': "add('{{ route('heros.create') }}','modal-lg')"
                    },
                }]
            });
        }
    });
    // Make toggleStatus global
</script>


<h4 class="mb-4">Hero Section List</h4>
<div class="card">
    <div class="card-datatable table-responsive">
        <table id="hero-table" class="table border-top">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Button Text</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection