<section class="py-5" id="events">
  <div class="container">
    <div class="text-center mb-5">
      <p class="text-primary mb-1">Don't Miss Out</p>
      <h2 class="fw-bold">Upcoming Events</h2>
      <p class="text-muted">Join our live sessions, workshops, and bootcamps to level up your skills.</p>
    </div>

    <div class="row g-4">
      @forelse($events as $event)
      <div class="col-md-6 col-lg-4">
        <div class="card event-card shadow-sm h-100 position-relative">
          @if($event->type === 'image' && $event->media_path)
          <img src="{{ asset($event->media_path) }}" alt="{{ $event->title }}" class="card-img-top" style="height: 200px; object-fit: contain;">
          @elseif($event->type === 'video' && $event->media_path)
          <video class="card-img-top" style="height: 200px; object-fit: cover;" controls>
            <source src="{{ asset($event->media_path) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          @elseif($event->type === 'embed' && $event->embed_link)
          <iframe class="card-img-top" src="{{ $event->embed_link }}" style="height: 200px; width:100%; object-fit: cover;" frameborder="0" allowfullscreen></iframe>
          @else
          <img src="https://via.placeholder.com/400x200?text=No+Media" alt="No Media" class="card-img-top cover">
          @endif

          <div class="card-body">
            <h5 class="fw-bold">{{ $event->title }}</h5>
            @if($event->created_at ?? false)
            <p class="text-muted small mb-1"><i class="ri-calendar-line me-1"></i> Starts: {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y | h:i A') }}</p>
            @endif
            @if($event->short_description)
            <p class="text-muted small">{{ Str::limit($event->short_description, 100) }}</p>
            @endif
          </div>

          <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
            <a href="/event/{{$event->slug}}" class="btn btn-light fw-semibold">Join Event</a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="text-muted">No upcoming events at the moment. Please check back later.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>