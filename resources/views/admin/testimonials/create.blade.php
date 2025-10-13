<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Add Testimonial</h3>
        <p class="text-muted">Fill in the testimonial details below</p>
    </div>

    <form id="testimonials-form" action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Enter name">
        </div>

        <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control" placeholder="Enter designation">
        </div>

        <div class="col-md-12">
            <label class="form-label">Feedback</label>
            <textarea name="feedback" class="form-control" rows="3" placeholder="Enter feedback"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#testimonials-form").validate({
        submitHandler:function(form){
            var formData = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                data: formData,
                processData:false,
                contentType:false,
                dataType:'json',
                success:function(res){
                    if(res.status=='success'){
                        toastr.success(res.message);
                        $(".modal").modal('hide');
                        $('#testimonials-table').DataTable().ajax.reload();
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
