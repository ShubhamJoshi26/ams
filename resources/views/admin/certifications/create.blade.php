<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Add Certification</h3>
        <p class="text-muted">Fill in the certification details below</p>
    </div>

    <form id="certification-form" action="{{ route('certifications.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Badge Icon</label>
            <input type="file" name="badge_icon" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Issued Date</label>
            <input type="date" name="issued_date" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Certificate ID</label>
            <input type="text" name="certificate_id" class="form-control">
        </div>

       

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#certification-form").validate({
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
