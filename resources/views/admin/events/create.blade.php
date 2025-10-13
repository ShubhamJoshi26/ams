<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Add Event / Article</h3>
        <p class="text-muted">Fill in the event or article details below</p>
    </div>

    <form id="events-form" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required placeholder="Enter event title">
        </div>
        <div class="col-md-6">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug" >
            <small class="text-muted">Example: my-event-title</small>
        </div>
        <div class="col-md-6">
            <label class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="image">Image</option>
                <option value="video">Video</option>
                <option value="embed">Embed Link</option>
            </select>
        </div>

        <div class="col-md-12" id="media_field">
            <label class="form-label">Upload Media</label>
            <input type="file" name="media_path" class="form-control">
        </div>

        <div class="col-md-12 d-none" id="embed_field">
            <label class="form-label">Embed Video Link</label>
            <input type="url" name="embed_link" class="form-control" placeholder="Paste YouTube embed link">
        </div>

        <div class="col-md-12">
            <label class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="2" placeholder="Enter short description"></textarea>
        </div>

        <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter detailed description"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Is New</label>
            <select name="status" class="form-select">
                <option value="1" selected>New</option>
                <option value="0">Old</option>
            </select>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('type').addEventListener('change', function() {
        const type = this.value;
        document.getElementById('media_field').classList.toggle('d-none', type === 'embed');
        document.getElementById('embed_field').classList.toggle('d-none', type !== 'embed');
    });

    $(document).ready(function() {
        $("#events-form").validate({
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
                        if (res.status === 'success') {
                            toastr.success(res.message);
                            $(".modal").modal('hide');
                            $('#event-table').DataTable().ajax.reload();
                        } else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong!');
                    }
                });
            }
        });
    });
</script>