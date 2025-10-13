@extends('layouts.student.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    :root {
        --primary-color: #0066FF;
        --success-color: #22C55E;
        --bg-light: #F8F9FA;
        --text-muted: #6C757D;
    }

    body {
        background-color: var(--bg-light);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 260px;
        background: white;
        border-right: 1px solid #E5E7EB;
        z-index: 1000;
    }

    .sidebar-brand {
        padding: 1.5rem 1.5rem;
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--primary-color);
        text-decoration: none;
        display: block;
    }

    .sidebar-nav {
        padding: 0 1rem;
    }

    .sidebar-nav .nav-link {
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        color: #374151;
        font-weight: 500;
        transition: all 0.2s;
    }

    .sidebar-nav .nav-link:hover {
        background-color: #F3F4F6;
    }

    .sidebar-nav .nav-link.active {
        background-color: var(--primary-color);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 102, 255, 0.2);
    }

    .sidebar-footer {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
        background-color: #F3F4F6;
        padding: 1rem;
        border-radius: 0.75rem;
    }

    .sidebar-footer p {
        margin: 0;
        font-size: 0.875rem;
        color: var(--primary-color);
        font-weight: 500;
    }

    .main-content {
        margin-left: 260px;
        padding: 2rem;
    }

    .stats-card {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 0.75rem;
        padding: 1.5rem;
        transition: box-shadow 0.2s;
    }

    .stats-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .stats-value {
        font-size: 2rem;
        font-weight: bold;
        color: #111827;
        margin-bottom: 0.25rem;
    }

    .stats-label {
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    .nav-pills .nav-link {
        border-radius: 50px;
        padding: 0.625rem 1.5rem;
        font-weight: 500;
        color: var(--text-muted);
        transition: all 0.2s;
    }

    .nav-pills .nav-link:hover {
        background-color: #F3F4F6;
        color: #374151;
    }

    .nav-pills .nav-link.active {
        background-color: var(--primary-color);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 102, 255, 0.2);
    }

    .course-card {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: box-shadow 0.2s;
    }

    .course-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .course-image {
        width: 80px;
        height: 80px;
        border-radius: 0.5rem;
        object-fit: cover;
    }

    .course-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
        margin-bottom: 0.5rem;
    }

    .course-meta {
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    .progress {
        height: 8px;
        background-color: #E5E7EB;
    }

    .progress-bar {
        background-color: var(--primary-color);
    }

    .badge-success {
        background-color: rgba(34, 197, 94, 0.1);
        color: var(--success-color);
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: #0052CC;
        border-color: #0052CC;
    }

    .btn-outline-primary {
        color: var(--primary-color);
        border-color: #E5E7EB;
    }

    .btn-outline-primary:hover {
        background-color: rgba(0, 102, 255, 0.1);
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: "/";
        color: var(--text-muted);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
        }

        .course-card .d-flex {
            flex-direction: column;
        }

        .course-actions {
            margin-top: 1rem;
            width: 100%;
        }
    }
</style>
@section('content')
<div class="container mt-4">
    <div class="row">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Courses</li>
            </ol>
        </nav>

        <!-- Stats Cards -->
        <div class="row g-3 mb-5">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card">
                    <div class="stats-value">{{count($student->studentCourses)}}</div>
                    <div class="stats-label">Course Taken</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card">
                    <div class="stats-value">{{count($studentOtherData->ongoing)}}</div>
                    <div class="stats-label">In Progress</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card">
                    <div class="stats-value">{{count($studentOtherData->completed)}}</div>
                    <div class="stats-label">Completed</div>
                </div>
            </div>
            {{-- <div class="col-12 col-sm-6 col-lg-3">
                <div class="stats-card">
                    <div class="stats-value">6h 42m</div>
                    <div class="stats-label">Time This Week</div>
                </div>
            </div> --}}
        </div>

        <!-- Nav Pills Tabs -->
        <ul class="nav nav-pills mb-4" id="courseTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="in-progress-tab" data-bs-toggle="pill" data-bs-target="#in-progress"
                    type="button" role="tab">
                    In Progress
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="completed-tab" data-bs-toggle="pill" data-bs-target="#completed"
                    type="button" role="tab">
                    Completed
                </button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="wishlist-tab" data-bs-toggle="pill" data-bs-target="#wishlist"
                    type="button" role="tab">
                    Wishlist
                </button>
            </li> --}}
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="courseTabsContent">
            <!-- In Progress Tab -->
            <div class="tab-pane fade show active" id="in-progress" role="tabpanel">
                <div class="section-header">
                    <h2 class="h4 fw-bold mb-0">Continue Learning</h2>
                    <span class="text-muted small">{{count($studentOtherData->ongoing)}} courses</span>
                </div>

                @foreach ($studentOtherData->ongoing as $course)
                <div class="course-card">
                    <div class="d-flex gap-3 align-items-start">
                        <img src="{{asset($course->image)}}" alt="Montessori Teacher Training" class="course-image">

                        <div class="flex-fill">
                            <h3 class="course-title">{{$course->name}}</h3>
                            <div class="course-meta mb-3">
                                <span>{{$course->duration}}</span>
                                <span class="mx-2">•</span>
                                {{-- <span>18/40 Lessons</span> --}}
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-lg-center course-actions">
                            <div class="d-flex flex-column gap-2" style="min-width: 280px;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted small">Progress</span>
                                    <div class="progress flex-fill">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$course->progress}}%"></div>
                                    </div>
                                </div>
                                {{-- <span class="badge badge-success align-self-end">Certification</span> --}}
                            </div>

                            <div class="d-flex gap-2">
                                {{-- <button class="btn btn-outline-primary">Syllabus</button> --}}
                                <button class="btn btn-primary">Resume</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Course Card 1 -->
                {{-- <div class="course-card">
                    <div class="d-flex gap-3 align-items-start">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&h=400&fit=crop"
                            alt="Montessori Teacher Training" class="course-image">

                        <div class="flex-fill">
                            <h3 class="course-title">Montessori Teacher Training</h3>
                            <div class="course-meta mb-3">
                                <span>11 Months</span>
                                <span class="mx-2">•</span>
                                <span>18/40 Lessons</span>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-lg-center course-actions">
                            <div class="d-flex flex-column gap-2" style="min-width: 280px;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted small">Progress</span>
                                    <div class="progress flex-fill">
                                        <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                                    </div>
                                </div>
                                <span class="badge badge-success align-self-end">Certification</span>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary">Syllabus</button>
                                <button class="btn btn-primary">Resume</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="course-card">
                    <div class="d-flex gap-3 align-items-start">
                        <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=400&h=400&fit=crop"
                            alt="Early Childhood Education" class="course-image">

                        <div class="flex-fill">
                            <h3 class="course-title">Early Childhood Education</h3>
                            <div class="course-meta mb-3">
                                <span>6 Months</span>
                                <span class="mx-2">•</span>
                                <span>9/24 Lessons</span>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-lg-center course-actions">
                            <div class="d-flex flex-column gap-2" style="min-width: 280px;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted small">Progress</span>
                                    <div class="progress flex-fill">
                                        <div class="progress-bar" role="progressbar" style="width: 37%"></div>
                                    </div>
                                </div>
                                <span class="badge badge-success align-self-end">Project-based</span>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary">Syllabus</button>
                                <button class="btn btn-primary">Resume</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="course-card">
                    <div class="d-flex gap-3 align-items-start">
                        <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=400&h=400&fit=crop"
                            alt="Inclusive Education" class="course-image">

                        <div class="flex-fill">
                            <h3 class="course-title">Inclusive Education</h3>
                            <div class="course-meta mb-3">
                                <span>5 Months</span>
                                <span class="mx-2">•</span>
                                <span>3/18 Lessons</span>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-lg-center course-actions">
                            <div class="d-flex flex-column gap-2" style="min-width: 280px;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted small">Progress</span>
                                    <div class="progress flex-fill">
                                        <div class="progress-bar" role="progressbar" style="width: 16%"></div>
                                    </div>
                                </div>
                                <span class="badge badge-success align-self-end">Intermediate</span>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary">Syllabus</button>
                                <button class="btn btn-primary">Resume</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Completed Tab -->
            <div class="tab-pane fade" id="completed" role="tabpanel">
                <div class="section-header">
                    <h2 class="h4 fw-bold mb-0">Completed</h2>
                    <span class="text-muted small">{{count($studentOtherData->completed)}} courses</span>
                </div>

                <!-- Completed Course Card -->
                @forelse ($studentOtherData->completed as $course)
                <div class="course-card">
                    <div class="d-flex gap-3 align-items-start">
                        <img src="{{asset($course->image)}}" alt="Montessori Teacher Training" class="course-image">

                        <div class="flex-fill">
                            <h3 class="course-title">{{$course->name}}</h3>
                            <div class="course-meta mb-3">
                                <span>{{$course->duration}}</span>
                                <span class="mx-2">•</span>
                                {{-- <span>18/40 Lessons</span> --}}
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-lg-center course-actions">
                            <div class="d-flex flex-column gap-2" style="min-width: 280px;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted small">Progress</span>
                                    <div class="progress flex-fill">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{$course->progress}}%"></div>
                                    </div>
                                </div>
                                {{-- <span class="badge badge-success align-self-end">Certification</span> --}}
                            </div>

                            <div class="d-flex gap-2">
                                {{-- <button class="btn btn-outline-primary">Syllabus</button> --}}
                                <button class="btn btn-primary">Resume</button>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <div class="course-card">
                    <p>No Course Is Completed Yet.</p>
                </div>
                @endforelse
            </div>

            <!-- Wishlist Tab -->
            {{-- <div class="tab-pane fade" id="wishlist" role="tabpanel">
                <div class="text-center py-5">
                    <p class="text-muted">No courses in your wishlist yet.</p>
                </div>
            </div> --}}
        </div>

    </div>
</div>


@endsection

<script>
    // Update sidebar active state based on navigation
        document.querySelectorAll('.sidebar-nav .nav-link, .navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.sidebar-nav .nav-link, .navbar-nav .nav-link').forEach(l => {
                    l.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Update course count when switching tabs
        document.querySelectorAll('#courseTabs button').forEach(button => {
            button.addEventListener('shown.bs.tab', function (e) {
                const target = e.target.getAttribute('data-bs-target');
                const tabPane = document.querySelector(target);
                const courseCards = tabPane.querySelectorAll('.course-card');
                const sectionHeader = tabPane.querySelector('.section-header span');
                
                if (sectionHeader) {
                    sectionHeader.textContent = `${courseCards.length} courses`;
                }
            });
        });
</script>