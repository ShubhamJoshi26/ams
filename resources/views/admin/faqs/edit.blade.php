<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit FAQ</h3>
        <p class="text-muted">Update the FAQ details below</p>
    </div>

    <form id="edit-faq-form" action="{{ route('faqs.update', $faq->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <input type="hidden" name="faq_id" value="{{ $faq->id }}">

        <div class="col-md-12">
            <label class="form-label">Question</label>
            <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required placeholder="Enter question">
        </div>

        <div class="col-md-12">
            <label class="form-label">Answer</label>
            <textarea name="answer" class="form-control" rows="3" required>{{ $faq->answer }}</textarea>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#edit-faq-form").validate({
        submitHandler: function(form){
            $.ajax({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                data: $(form).serialize(),
                dataType:'json',
                success: function(res){
                    if(res.status=='success'){
                        toastr.success(res.message);
                        $(".modal").modal('hide');
                        $('#faqs-table').DataTable().ajax.reload();
                    } else toastr.error(res.message);
                },
                error: function(xhr){
                    toastr.error('Something went wrong!');
                }
            });
        }
    });
});
</script>
