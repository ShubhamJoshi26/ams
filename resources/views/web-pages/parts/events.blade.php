<section class="py-5" id="events">
  <div class="container">
    <div class="text-center mb-5">
      <p class="text-primary mb-1">Don't Miss Out</p>
      <h2 class="fw-bold">Upcoming Events</h2>
      <p class="text-muted">Join our live sessions, workshops, and bootcamps to level up your skills.</p>
    </div>

    <div class="row g-4">
            @foreach(range(1,3) as $i)
            <div class="col-md-6 col-lg-4">
                <div class="card event-card shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-15{{$i}}6761175-4b46a572b786?w=600&h=400&fit=crop" alt="Event" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Tech Innovation Summit 2025</h5>
                        <p class="text-muted small mb-1"><i class="ri-calendar-line me-1"></i> Starts: 15 Oct 2025 | 10:00 AM</p>
                        <p class="text-muted small">Explore the future of AI, cloud, and data-driven technologies with top industry leaders.</p>
                    </div>
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <a href="#" class="btn btn-light fw-semibold">Join Event</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
  </div>
</section>