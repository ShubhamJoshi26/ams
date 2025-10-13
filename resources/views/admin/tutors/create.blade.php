<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Add Tutor</h3>
        <p class="text-muted">Fill in the tutor details below</p>
    </div>

    <form id="tutors-form" action="{{ route('tutors.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Enter tutor name">
        </div>

        <div class="col-md-6">
            <label class="form-label">Experience</label>
            <input type="text" name="experience" class="form-control" placeholder="Enter experience (e.g., 5 years)">
        </div>

        <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control" placeholder="Enter designation">
        </div>

        <div class="col-md-12">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3" placeholder="Enter tutor bio"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-select" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#tutors-form").validate({
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
                        $('#tutors-table').DataTable().ajax.reload();
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
