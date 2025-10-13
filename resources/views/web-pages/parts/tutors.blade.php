<!-- Our Tutors Section -->
<section class="py-5" id="tutors">
  <div class="container">
    <div class="text-center mb-5">
      <p class="text-primary mb-1">Expert Instructors</p>
      <h2 class="fw-bold">Meet Our Tutors</h2>
    </div>

    <!-- Category Tabs -->
    <ul class="nav nav-pills justify-content-center mb-4" id="tutorTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" data-category="all" type="button" role="tab">All</button>
      </li>
      @foreach($categories as $category)
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-category="{{ $category->slug }}" type="button" role="tab">
            {{ $category->name }}
          </button>
        </li>
      @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="tutorTabsContent">
      <div class="tab-pane fade show active" id="tab-content" role="tabpanel">
        <div class="row g-4" id="tutorCardsContainer">
          @foreach($allTutors as $tutor)
            <div class="col-sm-6 col-lg-3">
              <div class="card tutor-card text-center p-3 zoom-in"
                   data-bs-toggle="modal"
                   data-bs-target="#tutorModal{{ $tutor->id }}">
                <img src="{{ asset($tutor->image) }}" class="rounded-circle mx-auto mb-3" width="120" height="120" alt="{{ $tutor->name }}">
                <h6 class="fw-bold mb-1">{{ $tutor->name }}</h6>
                <p class="text-secondary small mb-2">{{ $tutor->designation }}</p>
                <p class="text-muted small">{{ $tutor->experience }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Tutor Modals (all tutors) -->
@foreach($allTutors as $tutor)
  <div class="modal fade" id="tutorModal{{ $tutor->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4 text-center">
        <img src="{{ asset($tutor->image) }}" class="rounded-circle mx-auto mb-3" width="120" height="120" alt="{{ $tutor->name }}">
        <h4 class="fw-bold">{{ $tutor->name }}</h4>
        <p class="text-secondary mb-1">{{ $tutor->designation }}</p>
        <p class="text-muted small mb-3">{{ $tutor->experience }}</p>
        <p>{{ $tutor->bio }}</p>
      </div>
    </div>
  </div>
@endforeach