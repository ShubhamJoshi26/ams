<section class="py-5" id="courses">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
      <div class="mb-3 mb-md-0">
        <p class="text-primary mb-1">Popular Right Now</p>
        <h2 class="fw-bold">Featured Courses</h2>
      </div>

      <!-- Dynamic Nav Tabs -->
      <ul class="nav nav-tabs border-0 d-flex flex-wrap gap-2" id="courseTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="tab-button active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
            All
          </button>
        </li>
        @foreach ($categories as $category)
        <li class="nav-item" role="presentation">
          <button class="tab-button" id="cat-{{ $category->id }}-tab" data-bs-toggle="tab"
            data-bs-target="#cat-{{ $category->id }}" type="button" role="tab">
            {{ $category->name }}
          </button>
        </li>
        @endforeach
      </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="courseTabsContent">
      <!-- All Courses -->
      <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
        <div class="row g-4">
          @foreach ($categories as $category)
          @foreach ($category->courses as $course)
          <div class="col-md-6 col-lg-4">
            <div class="course-card">
              <img src="{{ asset($course->image ?? 'assets/images/default-course.jpg') }}"
                alt="{{ $course->name }}" class="course-img" style="height: 200px; object-fit: contain;">

              <div class="course-body">
                <p>{{$course->duration}}</p>
                <h5 class="fw-bold mb-2">{{ $course->name }}</h5>
                <p class="text-muted small mb-3">{{ $course->short_description }}</p>
                <div class="d-flex align-items-center mb-3">
                  @if($course->tutors->isNotEmpty())
                  @php $tutor = $course->tutors->first(); @endphp
                  <img src="{{ asset($tutor->image ?? 'assets/images/default-user.jpg') }}"
                    alt="{{ $tutor->name }}" class="rounded-circle me-2" width="30" height="30">
                  <span class="small">{{ $tutor->name }}</span>
                  @endif
                  <span class="ms-auto">⭐ {{ $course->rating ?? '0.0' }}</span>
                </div>

                <div class="progress-bar-custom mb-2">
                  <div class="progress-fill" style="width: {{ rand(10, 100) }}%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small text-muted">{{ rand(10, 100) }}%</span>
                </div>
                <div class="text-end">
                  <a href="{{ route('course.details', ['category' => $category->name, 'slug' => $course->slug]) }}" class="btn btn-sm btn-primary">View Course</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>

      <!-- Category-wise Tabs -->
      @foreach ($categories as $category)
      <div class="tab-pane fade" id="cat-{{ $category->id }}" role="tabpanel"
        aria-labelledby="cat-{{ $category->id }}-tab">
        <div class="row g-4">
          @forelse ($category->courses as $course)
          <div class="col-md-6 col-lg-4">
            <div class="course-card">
              <img src="{{ asset($course->image ?? 'assets/images/default-course.jpg') }}"
                alt="{{ $course->name }}" class="course-img" style="height: 200px; object-fit: contain;">

              <div class="course-body">
                <p>{{$course->duration}}</p>
                <h5 class="fw-bold mb-2">{{ $course->name }}</h5>
                <p class="text-muted small mb-3">{{ $course->short_description }}</p>
                <div class="d-flex align-items-center mb-3">
                  @if($course->tutors->isNotEmpty())
                  @php $tutor = $course->tutors->first(); @endphp
                  <img src="{{ asset($tutor->image ?? 'assets/images/default-user.jpg') }}"
                    alt="{{ $tutor->name }}" class="rounded-circle me-2" width="30" height="30">
                  <span class="small">{{ $tutor->name }}</span>
                  @endif
                  <span class="ms-auto">⭐ {{ $course->rating ?? '0.0' }}</span>
                </div>

                <div class="progress-bar-custom mb-2">
                  <div class="progress-fill" style="width: {{ rand(10, 100) }}%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small text-muted">{{ rand(10, 100) }}%</span>
                </div>
                <div class="text-end">
                  <a href="{{ route('course.details', ['category' => $category->name, 'slug' => $course->slug]) }}" class="btn btn-sm btn-primary">View Course</a>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <div class="alert alert-info">No courses available in this category.</div>
          </div>
          @endforelse
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>