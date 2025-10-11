<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit Certification</h3>
        <p class="text-muted">Update the certification details below</p>
    </div>

    <form id="edit-certification-form" action="{{ route('certifications.update', $certification->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <input type="hidden" name="certification_id" value="{{ $certification->id }}">

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $certification->name }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Badge Icon</label>
            <input type="file" name="badge_icon" class="form-control">
            @if($certification->badge_icon)
                <img src="{{ asset($certification->badge_icon) }}" class="img-thumbnail mt-2" width="100">
            @endif
        </div>

        <div class="col-md-6">
            <label class="form-label">Issued Date</label>
            <input type="date" name="issued_date" class="form-control" value="{{ $certification->issued_date }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Certificate ID</label>
            <input type="text" name="certificate_id" class="form-control" value="{{ $certification->certificate_id }}">
        </div>

      

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#edit-certification-form").validate({
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
                        $('#certification-table').DataTable().ajax.reload();
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
