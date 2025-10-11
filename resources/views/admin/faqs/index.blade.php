@extends('layouts.main')

@section('content')
<div class="container">
    <h4 class="mb-3">FAQ List</h4>
    <table class="table table-bordered" id="faqTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#faqTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('faqs.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'question', name: 'question' },
            { data: 'answer', name: 'answer' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
