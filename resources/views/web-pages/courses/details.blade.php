@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/course-list.css') }}">
<style>
    /* Course Card / Info */

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

    .course-info .btn-teal {
        background-color: var(--primary-color);
        color: white;
    }

    .course-info .btn-teal:hover {
        background-color: var(--primary-color);
    }

    /* Curriculum */
    .curriculum h4 {
        margin-top: 30px;
        margin-bottom: 20px;
    }


    /* Instructor Info */
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

    /* FAQs */
    .faqs h4 {
        margin-bottom: 20px;
    }


    /* Related Courses */
    .related-courses h4 {
        margin-bottom: 20px;
    }

    /* Responsive */
    @media(max-width: 992px) {
        .course-header h1 {
            font-size: 2rem;
        }

        .course-header p {
            font-size: 1rem;
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
<!-- <section class="course-header text-center">
    <div class="container">
        <h1 class="fw-bold">Full Stack Web Development</h1>
        <p>Master modern web technologies and build professional projects to jumpstart your career.</p>
        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
            <span class="btn btn-light border-0 px-4 py-2">Duration: 12 Weeks</span>
            <span class="btn btn-light border-0 px-4 py-2">Level: Beginner</span>
            <span class="btn btn-light border-0 px-4 py-2">Rating: ⭐ 4.8</span>
        </div>
    </div>
</section> -->
<section class="course-header mt-5 pb-5" style="padding-top: 80px; background-color: var(--primary-color); color: white;">
    <div class="container text-start text-md-center">
        <h1 class="fw-bold">Full Stack Web Development</h1>
        <p>Master modern web technologies and build professional projects to jumpstart your career.</p>
        <div class="d-flex justify-content-start justify-content-md-center flex-wrap gap-2 mt-3">
            <span class="btn btn-light border-0 px-4 py-2">Duration: 12 Weeks</span>
            <span class="btn btn-light border-0 px-4 py-2">Level: Beginner</span>
            <span class="btn btn-light border-0 px-4 py-2">Rating: ⭐ 4.8</span>
        </div>
    </div>
</section>
<!-- Course Info & Enrollment -->
<section class="course-info py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=400&fit=crop" alt="Course Image" class="course-img mb-4">
                <h2>Course Overview</h2>
                <p>This course is designed for beginners who want to learn full stack web development. You'll master HTML, CSS, JavaScript, React, Node.js, and more by building real-world projects. By the end, you'll have a professional portfolio to showcase your skills to employers.</p>

                <!-- Curriculum -->
                <div class="curriculum">
                    <h4>Course Curriculum</h4>
                    <div class="accordion" id="curriculumAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#moduleOne">
                                    Module 1: HTML & CSS
                                </button>
                            </h2>
                            <div id="moduleOne" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                                <div class="accordion-body">
                                    Learn the basics of web design, including semantic HTML, CSS layouts, and responsive design.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#moduleTwo">
                                    Module 2: JavaScript & DOM
                                </button>
                            </h2>
                            <div id="moduleTwo" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                                <div class="accordion-body">
                                    Master JavaScript fundamentals, DOM manipulation, and interactive web features.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#moduleThree">
                                    Module 3: React & Node.js
                                </button>
                            </h2>
                            <div id="moduleThree" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                                <div class="accordion-body">
                                    Build modern web applications with React for the frontend and Node.js for backend APIs.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

            <!-- Sidebar: Instructor & Enroll -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;z-index:0;"> <!-- Sticky container with offset -->
                    <!-- Instructor Card -->
                    <div class="instructor-card text-center mb-5">
                        <img src="https://i.pravatar.cc/100?img=5" alt="Instructor" width="100" height="100" class="rounded-circle">
                        <h5 class="mt-3">Instructor: Alex Kim</h5>
                        <p class="text-secondary small">Senior Full Stack Developer with 10+ years of industry experience.</p>
                        <button class="btn btn-teal w-100 mt-3">Enroll Now</button>
                    </div>

                    <!-- Related Courses -->
                    <div class="related-courses">
                        <h4 class="fw-bold mb-4">Related Courses</h4>
                        <div class="row g-3">
                            <!-- Course Card 1 -->
                            <div class="col-md-6 col-lg-12">
                                <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100 hover-shadow transition">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=200&h=100&fit=crop"
                                                class="img-fluid" alt="Data Analytics">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-2">
                                                <h6 class="fw-bold mb-1">Data Analytics Foundations</h6>
                                                <div class="d-flex align-items-center mb-1">
                                                    <span class="text-warning me-2">⭐ 4.8</span>
                                                    <small class="text-muted">Alex Kim</small>
                                                </div>
                                                <a href="#" class="stretched-link text-teal fw-bold">View Course</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Course Card 2 -->
                            <div class="col-md-6 col-lg-12">
                                <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100 hover-shadow transition">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="https://images.unsplash.com/photo-1581091012184-7cbe86d2f6be?w=200&h=100&fit=crop"
                                                class="img-fluid" alt="Cloud Computing">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-2">
                                                <h6 class="fw-bold mb-1">Cloud Computing Basics</h6>
                                                <div class="d-flex align-items-center mb-1">
                                                    <span class="text-warning me-2">⭐ 4.6</span>
                                                    <small class="text-muted">John Doe</small>
                                                </div>
                                                <a href="#" class="stretched-link text-teal fw-bold">View Course</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Course Card 3 -->
                            <div class="col-md-6 col-lg-12">
                                <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100 hover-shadow transition">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            <img src="https://images.unsplash.com/photo-1581092918360-efc3a36eb0b8?w=200&h=100&fit=crop"
                                                class="img-fluid" alt="AI & ML">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body p-2">
                                                <h6 class="fw-bold mb-1">AI & Machine Learning</h6>
                                                <div class="d-flex align-items-center mb-1">
                                                    <span class="text-warning me-2">⭐ 4.9</span>
                                                    <small class="text-muted">Jane Smith</small>
                                                </div>
                                                <a href="#" class="stretched-link text-teal fw-bold">View Course</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection