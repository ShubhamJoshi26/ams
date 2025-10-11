<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Add FAQ</h3>
        <p class="text-muted">Fill out the form below to add a new FAQ</p>
    </div>

    <form id="create-faq-form" action="{{ route('faqs.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-12">
            <label class="form-label">Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>

        <div class="col-md-12">
            <label class="form-label">Answer</label>
            <textarea name="answer" class="form-control" rows="3" required></textarea>
        </div>

        

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#create-faq-form").validate({
        submitHandler:function(form){
            var formData = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: formData,
                processData:false,
                contentType:false,
                dataType:'json',
                success:function(res){
                    if(res.status=='success'){
                        toastr.success(res.message);
                        $(".modal").modal('hide');
                        $('#faq-table').DataTable().ajax.reload();
                    } else toastr.error(res.message);
                }
            });
        }
    });
});
</script>
