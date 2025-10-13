<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit Tutor</h3>
        <p class="text-muted">Update the tutor details below</p>
    </div>

    <form id="edit-tutor-form" action="{{ route('tutors.update', $tutor->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $tutor->name }}" required placeholder="Enter tutor name">
        </div>

        <div class="col-md-6">
            <label class="form-label">Experience</label>
            <input type="text" name="experience" class="form-control" value="{{ $tutor->experience }}" placeholder="Enter experience (e.g., 5 years)">
        </div>

        <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control" value="{{ $tutor->designation }}" placeholder="Enter designation">
        </div>

        <div class="col-md-12">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3" placeholder="Enter tutor bio">{{ $tutor->bio }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($tutor->image)
                <img src="{{ asset($tutor->image) }}" class="img-thumbnail mt-2" width="100">
            @endif
        </div>

        <div class="col-md-6">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-select" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $tutor->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#edit-tutor-form").validate({
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
                        $('#tutors-table').DataTable().ajax.reload();
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
