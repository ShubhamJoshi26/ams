<div class="modal-body">
    <div class="text-center mb-3">
        <h3 class="mb-2 text-primary">Edit Event / Article</h3>
        <p class="text-muted">Update the event or article details below</p>
    </div>

    <form id="edit-event-form" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <div class="col-md-6">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required placeholder="Enter title">
        </div>
        <div class="col-md-6">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug" value="{{ $event->slug ?? '' }}">
            <small class="text-muted">Example: my-event-title</small>
        </div>
        <div class="col-md-6">
            <label class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="image" {{ $event->type == 'image' ? 'selected' : '' }}>Image</option>
                <option value="video" {{ $event->type == 'video' ? 'selected' : '' }}>Video</option>
                <option value="embed" {{ $event->type == 'embed' ? 'selected' : '' }}>Embed Link</option>
            </select>
        </div>

        {{-- Upload / Embed Fields --}}
        <div class="col-md-12 {{ $event->type == 'embed' ? 'd-none' : '' }}" id="media_field">
            <label class="form-label">Upload Media</label>
            <input type="file" name="media_path" class="form-control">
            @if($event->media_path)
            <div class="mt-2">
                @if($event->type === 'video')
                <video width="160" height="90" controls>
                    <source src="{{ asset($event->media_path) }}" type="video/mp4">
                </video>
                @else
                <img src="{{ asset($event->media_path) }}" alt="media" width="120" class="rounded border">
                @endif
            </div>
            @endif
        </div>

        <div class="col-md-12 {{ $event->type != 'embed' ? 'd-none' : '' }}" id="embed_field">
            <label class="form-label">Embed Video Link</label>
            <input type="url" name="embed_link" value="{{ $event->embed_link }}" class="form-control" placeholder="Paste YouTube embed link">
        </div>

        <div class="col-md-12">
            <label class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="2" placeholder="Enter short description">{{ $event->short_description }}</textarea>
        </div>

        <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter detailed description">{{ $event->description }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Is New</label>
            <select name="status" class="form-select">
                <option value="1" {{ $event->status ? 'selected' : '' }}>New</option>
                <option value="0" {{ !$event->status ? 'selected' : '' }}>Old</option>
            </select>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
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
        $("#edit-event-form").validate({
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
                            $('#events-table').DataTable().ajax.reload();
                        } else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
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