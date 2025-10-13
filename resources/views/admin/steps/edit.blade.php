<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit Step</h3>
        <p class="text-muted">Update the step details below</p>
    </div>

    <form id="edit-step-form" action="{{ route('steps.update', $step->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <input type="hidden" name="step_id" value="{{ $step->id }}">

        <div class="col-md-6">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $step->title }}" required placeholder="Enter step title">
        </div>

        <div class="col-md-6">
            <label class="form-label">Order</label>
            <input type="number" name="order" class="form-control" value="{{ $step->order }}" placeholder="Enter display order (e.g., 1, 2, 3)">
        </div>

        <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter step description">{{ $step->description }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Icon</label>
            <input type="file" name="icon" class="form-control">
            @if($step->icon)
                <img src="{{ asset($step->icon) }}" class="img-thumbnail mt-2" width="100">
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
    $("#edit-step-form").validate({
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
                        $('#steps-table').DataTable().ajax.reload();
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
