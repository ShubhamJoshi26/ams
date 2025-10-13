<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit Testimonial</h3>
        <p class="text-muted">Update the testimonial details below</p>
    </div>

    <form id="edit-testimonial-form" action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <input type="hidden" name="testimonial_id" value="{{ $testimonial->id }}">

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required placeholder="Enter name">
        </div>

        <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}" placeholder="Enter designation">
        </div>

        <div class="col-md-12">
            <label class="form-label">Feedback</label>
            <textarea name="feedback" class="form-control" rows="3" placeholder="Enter feedback">{{ $testimonial->feedback }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($testimonial->image)
                <img src="{{ asset($testimonial->image) }}" class="img-thumbnail mt-2" width="100">
            @endif
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#edit-testimonial-form").validate({
        submitHandler: function(form){
            var formData = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                type: $(form).attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(res){
                    if(res.status == 'success'){
                        toastr.success(res.message);
                        $(".modal").modal('hide');
                        $('#testimonials-table').DataTable().ajax.reload();
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function(xhr){
                    if(xhr.responseJSON && xhr.responseJSON.message){
                        toastr.error(xhr.responseJSON.message);
                    } else {
                        toastr.error('Something went wrong!');
                    }
                }
            });
        }
    });
});
</script>
