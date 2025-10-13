@extends('layouts.student.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    :root {
        --primary-color: #0d6efd;
        --secondary-color: #6c757d;
        --coral-color: #ff6b7a;
        --sidebar-bg: #f8f9fa;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
    }

    .sidebar {
        background-color: white;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        width: 220px;
        padding: 20px 0;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        z-index: 1000;
    }

    .sidebar .logo {
        font-size: 24px;
        font-weight: bold;
        color: var(--primary-color);
        padding: 0 20px 30px;
    }

    .sidebar .nav-item {
        margin: 5px 0;
    }

    .sidebar .nav-link {
        color: #6c757d;
        padding: 12px 20px;
        border-radius: 0;
        transition: all 0.3s;
        font-weight: 500;
    }

    .sidebar .nav-link:hover {
        background-color: #f0f7ff;
        color: var(--primary-color);
    }

    .sidebar .nav-link.active {
        background-color: var(--primary-color);
        color: white;
        border-radius: 10px;
        margin: 5px 13px;
        padding-left: 20px;
    }

    .main-content {
        margin-left: 220px;
        padding: 30px;
    }

    .header-nav {
        background-color: white;
        padding: 20px 30px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .header-nav a {
        color: #6c757d;
        text-decoration: none;
        margin-right: 30px;
        font-weight: 500;
        transition: color 0.3s;
    }

    .header-nav a.active {
        color: #212529;
        font-weight: 600;
    }

    .filter-section {
        background-color: white;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .nav-pills .nav-link {
        padding: 10px 20px;
        margin-right: 8px;
        border-radius: 20px;
        color: var(--primary-color);
        background-color: #f0f7ff;
        border: none;
        font-weight: 500;
        transition: all 0.3s;
    }

    .nav-pills .nav-link:hover {
        background-color: #d6ebff;
        transform: translateY(-2px);
    }

    .nav-pills .nav-link.active {
        background-color: var(--primary-color);
        color: white;
    }

    .course-card {
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        height: 100%;
        margin-bottom: 30px;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .course-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .course-content {
        padding: 20px;
    }

    .course-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #212529;
    }

    .course-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .course-duration {
        color: #6c757d;
        font-size: 14px;
    }

    .course-price {
        font-size: 20px;
        font-weight: bold;
        color: #212529;
    }

    .course-tags {
        margin-bottom: 15px;
    }

    .course-tag {
        display: inline-block;
        padding: 4px 12px;
        background-color: #f0f7ff;
        color: var(--primary-color);
        border-radius: 15px;
        font-size: 12px;
        margin-right: 8px;
        margin-bottom: 8px;
    }

    .enroll-btn {
        width: 100%;
        padding: 12px;
        background-color: var(--coral-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        cursor: pointer;
    }

    .enroll-btn:hover {
        background-color: #ff5565;
        transform: scale(1.02);
    }

    .saved-courses {
        background-color: #e3f2fd;
        color: var(--primary-color);
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .compare-btn {
        background-color: var(--primary-color);
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .compare-btn:hover {
        background-color: #0b5ed7;
        transform: scale(1.05);
    }

    .pagination {
        justify-content: center;
    }

    .page-link {
        border-radius: 8px;
        margin: 0 5px;
        border: 1px solid #dee2e6;
        color: var(--primary-color);
    }

    .page-link.active {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .user-icons {
        display: flex;
        gap: 15px;
    }

    .user-icon {
        width: 40px;
        height: 40px;
        background-color: #f0f7ff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .user-icon:hover {
        background-color: var(--primary-color);
        color: white;
    }
    .nav .nav-item {
        /* white-space: nowrap; */
        margin-left: 12px !important;
    }
    @media (max-width: 991px) {
        .nav .nav-item {
            /* white-space: nowrap; */
            margin-left: 8px !important;
        }
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .mobile-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }
    }

    @media (min-width: 992px) {
        .mobile-toggle {
            display: none;
        }
        .nav .nav-item {
            /* white-space: nowrap; */
            margin-left: 6px !important;
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

        {{-- <h2 class="mb-4 fw-bold">Browse Courses</h2> --}}

        <!-- Filter Section -->
        <div class="filter-section">
            {{-- <div class="row g-3 mb-3">
                <div class="col-lg-3 col-md-6">
                    <input type="text" class="form-control" placeholder="Search courses, instructors...">
                </div>
                <div class="col-lg-3 col-md-6">
                    <select class="form-select">
                        <option>Category: All</option>
                        <option>Technology</option>
                        <option>Education</option>
                        <option>Business</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <select class="form-select">
                        <option>Level: Beginner</option>
                        <option>Intermediate</option>
                        <option>Advanced</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <select class="form-select">
                        <option>Duration: Any</option>
                        <option>Short (1-2 months)</option>
                        <option>Medium (3-6 months)</option>
                        <option>Long (6+ months)</option>
                    </select>
                </div>
            </div> --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <ul class="nav nav-pills" id="categoryTabs" role="tablist">
                    @foreach ($data as $key=>$cat )
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  {{$key==0?'active':''}}" id="{{$cat->slig}}-tab" data-bs-toggle="pill"
                            data-bs-target="#{{$cat->slug}}" type="button" role="tab">{{$cat->name}}</button>
                    </li>
                    @endforeach
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="popular-tab" data-bs-toggle="pill" data-bs-target="#popular"
                            type="button" role="tab">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new-tab" data-bs-toggle="pill" data-bs-target="#new" type="button"
                            role="tab">New</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="free-tab" data-bs-toggle="pill" data-bs-target="#free"
                            type="button" role="tab">Free</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="certification-tab" data-bs-toggle="pill"
                            data-bs-target="#certification" type="button" role="tab">Certification</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="short-term-tab" data-bs-toggle="pill" data-bs-target="#short-term"
                            type="button" role="tab">Short-term</button>
                    </li> --}}
                </ul>
                {{-- <button class="btn btn-primary mt-2 mt-md-0">Apply</button> --}}
            </div>
        </div>

        <!-- Results Header -->
        {{-- <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Results</h5>
            <span class="text-muted" id="resultsCount">Showing 3 of 128 courses</span>
        </div> --}}

        <!-- Course Cards -->
        <div class="tab-content" id="categoryTabContent">
            <!-- Popular Courses -->
            @foreach ($data as $key=>$category )
            <div class="tab-pane fade {{$key==0?'show active':''}}" id="{{$category->slug}}" role="tabpanel">
                <div class="row" id="{{$category->slug}}Courses">
                    @foreach ($category->courses as $key=>$course )
                    {{-- {{dd($category)}} --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="course-card">
                                <img src="{{asset($course->image)}}"
                                    alt="{{$course->name}}" class="course-image">
                                <div class="course-content">
                                    <h5 class="course-title">{{$course->name}}</h5>
                                    <div class="course-meta">
                                        <span class="course-duration">{{$course->duration}}</span>
                                        <span class="course-price">{{$course->price}}</span>
                                    </div>
                                    <div class="course-tags">
                                        <span class="course-tag">Certification</span>
                                        <span class="course-tag">Mentor-led</span>
                                    </div>
                                    <button class="enroll-btn">Enroll Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{-- <nav aria-label="Page navigation" id="paginationWrapper">
            <ul class="pagination" id="paginationControls">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">Prev</a>
                </li>
                <li class="page-item"><a class="page-link active" href="#" data-page="1">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">Next</a>
                </li>
            </ul>
        </nav> --}}

    </div>
</div>


@endsection
<script>
    function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth < 992) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
</script>