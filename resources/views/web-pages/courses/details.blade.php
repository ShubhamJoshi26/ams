@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/course-list.css') }}">
<style>
    .course-info img.course-img {
        border-radius: 15px;
        object-fit: cover;
        height: 300px;
        width: 100%;
    }

    .course-info h2 {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .btn-teal {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-teal:hover {
        background-color: var(--primary-color);
        opacity: 0.9;
    }

    .instructor-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .instructor-card img {
        border-radius: 50%;
    }

    @media(max-width: 992px) {
        .course-header h1 {
            font-size: 2rem;
        }

        .course-info img.course-img {
            height: 250px;
        }
    }

    @media(max-width: 576px) {
        .course-info img.course-img {
            height: 200px;
        }
    }
</style>
@endsection

@section('content')

<!-- Course Header -->
<section class="course-header mt-5 pb-5" style="padding-top: 80px; background-color: var(--primary-color); color: white;">
    <div class="container text-start text-md-center">
        <h1 class="fw-bold">{{ $course->name }}</h1>
        <p>{{ $course->short_description }}</p>
        <div class="d-flex justify-content-start justify-content-md-center flex-wrap gap-2 mt-3">
            <span class="btn btn-light border-0 px-4 py-2">Duration: {{ $course->duration }}</span>
            <span class="btn btn-light border-0 px-4 py-2">Rating: ⭐ {{ $course->rating }}</span>
        </div>
    </div>
</section>

<!-- Course Info -->
<section class="course-info py-5">
    <div class="container">
        <div class="row g-4">

            <!-- Left: Main Course Info -->
            <div class="col-lg-8">
                @if(!empty($course->image))
                <img src="{{ asset($course->image) }}" alt="Course Image" class="course-img mb-4" style="height: 400px; object-fit: contain; width: 100%;">
                @endif

                <!-- Description -->
                <p>{{ $course->description }}</p>

                <!-- Curriculum -->
                @if(isset($subjects) && $subjects->isNotEmpty())
                <div class="curriculum mt-4">
                    <h4>Course Curriculum</h4>
                    <div class="accordion" id="curriculumAccordion">
                        @foreach($subjects as $subject)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ 'faqCollapse'.$subject->id }}">
                                    {{ $subject->name }}
                                </button>
                            </h2>
                            <div id="{{ 'faqCollapse'.$subject->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ $subject->description }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- FAQs -->
                <div class="faqs mt-5">
                    <h4>Frequently Asked Questions</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne">
                                    Do I need prior coding experience?
                                </button>
                            </h2>
                            <div id="faqCollapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No prior experience is needed. This course starts with the basics and gradually moves to advanced topics.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo">
                                    Will I receive a certificate?
                                </button>
                            </h2>
                            <div id="faqCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, you will receive a certificate upon successful completion of the course.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Instructor & Related Courses -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px; z-index: 0;">

                    <!-- Instructor -->
                    @if(isset($tutors) && $tutors->isNotEmpty())
                    @foreach($tutors as $tutor)
                    <div class="instructor-card text-center mb-5">
                        @if(!empty($tutor->image))
                        <img src="{{ asset($tutor->image) }}" alt="{{ $tutor->name }}" width="100" height="100" class="rounded-circle">
                        @endif
                        <h5 class="mt-3">{{ $tutor->name }} <span class="text-muted">({{ $tutor->designation }})</span></h5>
                        <p class="text-secondary small mb-1">{{ $tutor->experience }}</p>
                        <p class="text-muted small">{{ $tutor->bio }}</p>
                        <button class="btn btn-teal w-100 mt-3">Enroll Now</button>
                    </div>
                    @endforeach
                    @endif

                    <!-- Related Courses -->
                    <div class="related-courses">
                        <h4 class="fw-bold mb-4">Related Courses</h4>
                        <div class="row g-3">
                            @foreach($relatedCourses as $relatedCourse)
                            <div class="col-md-6 col-lg-12">
                                <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100 hover-shadow transition">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="{{ asset($relatedCourse->image) }}" class="img-fluid" alt="{{ $relatedCourse->name }}" style="height: 100px; object-fit: contain; width: 100%;">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-2">
                                                <h6 class="fw-bold mb-1">{{ $relatedCourse->name }}</h6>
                                                <div class="d-flex align-items-start justify-content-start mb-1 flex-wrap flex-column">
                                                    <p class="text-warning mb-0">Ratting: ⭐ {{ $relatedCourse->rating }}</p>
                                                    <p class="text-muted mb-0">Duration: {{ $relatedCourse->duration }}</p>
                                                </div>
                                                <a href="{{ route('course.details', ['category' => $relatedCourse->category->name ?? 'courses', 'slug' => $relatedCourse->slug]) }}" class="stretched-link text-teal fw-bold">
                                                    View Course
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    // Custom JS if needed
</script>