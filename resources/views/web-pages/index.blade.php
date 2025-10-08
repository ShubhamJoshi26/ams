@extends('layouts.web-main')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>Trusted Online Certifications</h1>
                <p class="lead mb-4">Advance your skills with job-ready certificates. Expert-led lessons, measurable progress, and credentials recruiters recognize.</p>
                <div class="d-flex flex-wrap gap-3">
                    <button class="btn btn-light btn-lg">Explore Courses</button>
                    <button class="btn btn-outline-light btn-lg">View Certifications</button>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://via.placeholder.com/500x350" alt="Online Learning" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 stat-item">
                <div class="stat-number">100x+</div>
                <div class="stat-label">learners</div>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <div class="stat-number">4.8</div>
                <div class="stat-label">average rating</div>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <div class="stat-number">Learn</div>
                <div class="stat-label">at your pace</div>
            </div>
            <div class="col-md-3 col-6 stat-item">
                <div class="stat-number">Verified</div>
                <div class="stat-label">exams</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="container mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Featured Courses</h2>
        <a href="#" class="btn btn-outline-primary">See paths <i class="fas fa-arrow-right ms-1"></i></a>
    </div>
    <div class="row">
        <!-- Course 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card course-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Data Analytics Foundations</h5>
                    <p class="card-text">SQL, spreadsheets, and data storytelling to drive decisions.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Alex Kim</span>
                        <span class="rating">4.8 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="#" class="btn btn-primary w-100">View Course</a>
                </div>
            </div>
        </div>
        <!-- Course 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card course-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Python for Professionals</h5>
                    <p class="card-text">Automation, data pipelines, and APIs made practical.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Riya Petri</span>
                        <span class="rating">4.9 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="#" class="btn btn-primary w-100">View Course</a>
                </div>
            </div>
        </div>
        <!-- Course 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card course-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Cloud Practitioner Essentials</h5>
                    <p class="card-text">Core cloud services, security, and cost management.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Samuel Lee</span>
                        <span class="rating">4.7 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="#" class="btn btn-primary w-100">View Course</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="container mb-5">
    <h2 class="text-center mb-5">How it works</h2>
    <div class="row">
        <!-- Step 1 -->
        <div class="col-lg-3 col-md-6 process-step">
            <div class="step-icon">
                <i class="fas fa-search"></i>
            </div>
            <h4>1. Discover</h4>
            <p>Browse curated courses by role, skill, or industry.</p>
        </div>
        <!-- Step 2 -->
        <div class="col-lg-3 col-md-6 process-step">
            <div class="step-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <h4>2. Learn</h4>
            <p>Follow bite-sized lessons with hands-on projects.</p>
        </div>
        <!-- Step 3 -->
        <div class="col-lg-3 col-md-6 process-step">
            <div class="step-icon">
                <i class="fas fa-award"></i>
            </div>
            <h4>3. Certify</h4>
            <p>Pass assessments to earn verified certificates.</p>
        </div>
        <!-- Step 4 -->
        <div class="col-lg-3 col-md-6 process-step">
            <div class="step-icon">
                <i class="fas fa-share-alt"></i>
            </div>
            <h4>4. Share</h4>
            <p>Add badges to your LinkedIn and resume to stand out.</p>
        </div>
    </div>
</section>

<!-- Your Achievements -->
<section class="container mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Your Achievements</h2>
        <button class="btn btn-outline-primary">Download all</button>
    </div>
    <div class="row">
        <!-- Badge 1 -->
        <div class="col-lg-6 mb-3">
            <div class="card badge-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="badge-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1">Data Analytics Certified</h5>
                        <p class="card-text text-muted mb-1">Issued May 2025</p>
                        <small class="text-muted">48/391</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Badge 2 -->
        <div class="col-lg-6 mb-3">
            <div class="card badge-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="badge-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1">Cloud Fundamentals</h5>
                        <p class="card-text text-muted mb-1">Issued Apr 2025</p>
                        <small class="text-muted">96/315</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Badge 3 -->
        <div class="col-lg-6 mb-3">
            <div class="card badge-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="badge-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1">Python Practitioner</h5>
                        <p class="card-text text-muted mb-1">Issued Mar 2025</p>
                        <small class="text-muted">19534</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Badge 4 -->
        <div class="col-lg-6 mb-3">
            <div class="card badge-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="badge-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1">AI & ML Basics</h5>
                        <p class="card-text text-muted mb-1">Issued Feb 2025</p>
                        <small class="text-muted">77402</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection