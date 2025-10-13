@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/course-list.css') }}">
@endsection

@section('content')
<section class="course-header mt-5 pb-5" style="padding-top: 80px; background-color: var(--primary-color); color: white;">
    <div class="container text-start text-md-center">
        <h1 class="fw-bold">Explore Our Courses</h1>
        <p class="mb-3">Discover job-ready courses designed to help you upskill and succeed in your career.</p>
    </div>
</section>

<section class="course-listing py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Categories -->
            <div class="col-lg-3 mb-4">
                <h5 class="fw-bold mb-3">Categories</h5>
                <ul class="nav nav-pills flex-column flex-lg-column" id="courseTab" role="tablist">
                    <li class="nav-item mb-2">
                        <button class="nav-link active category-item" type="button" data-id="0">All Courses</button>
                    </li>
                    @foreach($categories as $cat)
                    <li class="nav-item mb-2">
                        <button class="nav-link category-item" type="button" data-id="{{ $cat->id }}">{{ $cat->name }}</button>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Courses -->
            <div class="col-lg-9">
                <div class="row g-4 justify-content-center" id="course-container">
                    @foreach($courses as $course)
                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="course-card bg-white shadow-sm rounded-3 overflow-hidden h-100">
                            <img src="{{ $course->thumbnail ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=400&h=200&fit=crop' }}" alt="{{ $course->name }}" class="course-img w-100">
                            <div class="course-body p-3">
                                <h5 class="fw-bold mb-2">{{ $course->name }}</h5>
                                <p class="text-secondary small mb-3">{{ $course->short_description ?? '' }}</p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://i.pravatar.cc/40" class="rounded-circle me-2" width="30" height="30">
                                    <span class="small">{{ $course->instructor ?? 'Instructor' }}</span>
                                    <span class="ms-auto">⭐ {{ $course->rating ?? '4.5' }}</span>
                                </div>
                                <div class="progress mb-2" style="height: 6px; border-radius: 4px;">
                                    <div class="progress-bar bg-teal" role="progressbar" style="width: {{ $course->progress ?? 0 }}%"></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="small text-secondary">{{ $course->progress ?? 0 }}%</span>
                                    <a href="/courses/{{ $course->slug }}" class="btn btn-sm btn-teal">View Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Handle category filter clicks
        $('.category-item').on('click', function() {
            let categoryId = $(this).data('id');

            // Update active state
            $('.category-item').removeClass('active');
            $(this).addClass('active');

            // Show loading state
            $('#course-container').html(`
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-teal" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-muted">Loading courses...</p>
                </div>
            `);

            $.ajax({
                url: "{{ route('courses.filter') }}",
                type: "GET",
                data: {
                    category_id: categoryId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    let courses = response.courses;
                    let html = '';

                    if (courses.length === 0) {
                        html = `
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">No courses found in this category.</p>
                            </div>`;
                    } else {
                        courses.forEach(course => {
                            html += `
                                <div class="col-md-6 col-lg-4 col-12">
                                    <div class="course-card bg-white shadow-sm rounded-3 overflow-hidden h-100">
                                        <img src="${course.thumbnail || 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=400&h=200&fit=crop'}" alt="${course.name}" class="course-img w-100">
                                        <div class="course-body p-3">
                                            <h5 class="fw-bold mb-2">${course.name}</h5>
                                            <p class="text-secondary small mb-3">${course.short_description || ''}</p>
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="https://i.pravatar.cc/40" class="rounded-circle me-2" width="30" height="30">
                                                <span class="small">${course.instructor || 'Instructor'}</span>
                                                <span class="ms-auto">⭐ ${course.rating || '4.5'}</span>
                                            </div>
                                            <div class="progress mb-2" style="height: 6px; border-radius: 4px;">
                                                <div class="progress-bar bg-teal" role="progressbar" style="width: ${course.progress || 0}%"></div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="small text-secondary">${course.progress || 0}%</span>
                                                <a href="/courses/${course.slug}" class="btn btn-sm btn-teal">View Course</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        });
                    }

                    $('#course-container').html(html);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#course-container').html(`
                        <div class="col-12 text-center py-5">
                            <p class="text-danger">Error loading courses. Please try again.</p>
                            <button class="btn btn-teal btn-sm" onclick="location.reload()">Reload Page</button>
                        </div>
                    `);
                }
            });
        });
    });
</script>
@endsection