@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/course-list.css') }}">
@endsection
@section('content')
<section class="course-header mt-5 pb-5" style="padding-top: 80px; background-color: var(--primary-color); color: white;">
    <div class="container text-start text-md-center">
        <h1 class="fw-bold">Explore Our Courses</h1>
        <p class="mb-3">Discover job-ready courses designed to help you upskill and succeed in your career.</p>
        <div class="d-flex justify-content-start justify-content-md-center flex-wrap gap-2 mt-3">
            <span class="btn btn-light border-0 px-4 py-2">100+ Courses</span>
            <span class="btn btn-light border-0 px-4 py-2">Expert Instructors</span>
            <span class="btn btn-light border-0 px-4 py-2">120k+ Learners</span>
        </div>
    </div>
</section>

<section class="course-listing py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Categories -->
            <div class="col-lg-3 mb-4">
                <h5 class="fw-bold mb-3">Categories</h5>
                <ul class="nav nav-pills flex-column flex-lg-column" id="courseTab" role="tablist">
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link active" id="data-tab" data-bs-toggle="pill" data-bs-target="#data" type="button" role="tab">Data Science</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link" id="web-tab" data-bs-toggle="pill" data-bs-target="#web" type="button" role="tab">Web Development</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link" id="cloud-tab" data-bs-toggle="pill" data-bs-target="#cloud" type="button" role="tab">Cloud & DevOps</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link" id="ai-tab" data-bs-toggle="pill" data-bs-target="#ai" type="button" role="tab">AI & ML</button>
                    </li>
                </ul>
            </div>

            <!-- Courses -->
            <div class="col-lg-9">
                <div class="tab-content" id="courseTabContent">
                    <!-- Loop over categories dynamically here if needed -->
                    @foreach(['data','web','cloud','ai'] as $category)
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $category }}" role="tabpanel">
                            <div class="row g-4 justify-content-center">
                                @for($i=1;$i<=6;$i++)
                                    <div class="col-md-6 col-lg-4 col-12">
                                        <div class="course-card bg-white shadow-sm rounded-3 overflow-hidden h-100">
                                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=400&h=200&fit=crop" alt="Course" class="course-img w-100">
                                            <div class="course-body p-3">
                                                <h5 class="fw-bold mb-2">Full Stack Web Development</h5>
                                                <p class="text-secondary small mb-3">Learn React, Node, and modern web technologies</p>
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="https://i.pravatar.cc/40?img={{ $i }}" alt="Instructor" class="rounded-circle me-2" width="30" height="30">
                                                    <span class="small">Instructor Name</span>
                                                    <span class="ms-auto">⭐ 4.7</span>
                                                </div>
                                                <div class="progress mb-2" style="height: 6px; border-radius: 4px;">
                                                    <div class="progress-bar bg-teal" role="progressbar" style="width: 72%"></div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="small text-secondary">72%</span>
                                                    <button class="btn btn-sm btn-teal">View Course</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
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
@endsection