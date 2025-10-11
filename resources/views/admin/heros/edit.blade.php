<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit Hero Section</h3>
        <p class="text-muted">Update the hero section details below</p>
    </div>

    <form id="edit-hero-form" action="{{ route('heros.update', $hero->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT') <!-- This is the key fix -->
        <input type="hidden" name="hero_id" value="{{ $hero->id }}">

        <div class="col-md-6">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $hero->title }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $hero->subtitle }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Button Text</label>
            <input type="text" name="button_text" class="form-control" value="{{ $hero->button_text }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Button Link</label>
            <input type="text" name="button_link" class="form-control" value="{{ $hero->button_link }}">
        </div>
        <div class="col-md-12">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($hero->image)
            <img src="{{ asset($hero->image) }}" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#edit-hero-form").validate({
            submitHandler: function(form) {
                var formData = new FormData(form);
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            toastr.success(res.message);
                            $(".modal").modal('hide');
                            $('#hero-table').DataTable().ajax.reload();
                        } else toastr.error(res.message);
                    }
                });
            }
        });
    });
</script>