<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Add FAQ</h3>
        <p class="text-muted">Fill in the FAQ details below</p>
    </div>

    <form id="faqs-form" action="{{ route('faqs.store') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-md-12">
            <label class="form-label">Question</label>
            <input type="text" name="question" class="form-control" required placeholder="Enter question">
        </div>

        <div class="col-md-12">
            <label class="form-label">Answer</label>
            <textarea name="answer" class="form-control" rows="3" placeholder="Enter answer" required></textarea>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#faqs-form").validate({
        submitHandler:function(form){
            $.ajax({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                data: $(form).serialize(),
                dataType:'json',
                success:function(res){
                    if(res.status=='success'){
                        toastr.success(res.message);
                        $(".modal").modal('hide');
                        $('#faqs-table').DataTable().ajax.reload();
                    } else toastr.error(res.message);
                },
                error:function(xhr){
                    toastr.error('Something went wrong!');
                }
            });
        }
    });
});
</script>
