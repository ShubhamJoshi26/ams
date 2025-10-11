@extends('layouts.web-main')

@section('content')
<!-- Hero Section -->
@include('web-pages.parts.hero');

<!-- Certification Badges -->
<section class="py-5" id="certifications">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-primary mb-1">Your Achievements</p>
                <h2 class="fw-bold">Certification Badges</h2>
            </div>
            <a href="#" class="text-teal text-decoration-none">Download all</a>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon fw-bold">C</div>
                    <h5 class="fw-bold mt-3">Data Analytics Certified</h5>
                    <p class="text-muted small mb-0">Issued Apr 2024 • ID 47281</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon fw-bold">C</div>
                    <h5 class="fw-bold mt-3">Cloud Fundamentals</h5>
                    <p class="text-muted small mb-0">Issued Feb 2024 • ID 89733</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon fw-bold">P</div>
                    <h5 class="fw-bold mt-3">Python Practitioner</h5>
                    <p class="text-muted small mb-0">Issued Jan 2024 • ID 18916</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon fw-bold">A</div>
                    <h5 class="fw-bold mt-3">AI & ML Basics</h5>
                    <p class="text-muted small mb-0">Issued Feb 2025 • ID ML-7149</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Courses -->
@include('web-pages.parts.courses')

<!-- How It Works -->
<section class="py-5">
    <div class="container">
        <p class="text-primary mb-2">Simple & Transparent</p>
        <h2 class="fw-bold mb-4">How it works</h2>
        <p class="text-muted mb-5">Get certified in four clear steps.</p>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">1. Discover</h3>
                    <p class="text-muted">Browse curated courses by role, skill, or industry.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">2. Learn</h3>
                    <p class="text-muted">Follow bite-sized lessons with hands-on projects.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">3. Certify</h3>
                    <p class="text-muted">Pass assessments to earn verified certificates.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">4. Share</h3>
                    <p class="text-muted">Add badges to your LinkedIn and resume to stand out.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('web-pages.parts.connect')

@include('web-pages.parts.tutors')
@include('web-pages.parts.testimonials')




<!-- Events Section -->
@include('web-pages.parts.events')
<!-- FAQ Section -->
<section class="py-5" id="faq">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-primary mb-1">Have Questions?</p>
            <h2 class="fw-bold">Frequently Asked Questions</h2>
        </div>

        <div class="accordion" id="faqAccordion">
            <div class="accordion-item mb-3 border-0 shadow-sm">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        How do I enroll in a course?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        You can enroll directly by clicking the "View Course" button and following payment instructions.
                    </div>
                </div>
            </div>

            <div class="accordion-item mb-3 border-0 shadow-sm">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Are the certificates recognized globally?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes! All our certifications are verified and accepted by major organizations and recruiters.
                    </div>
                </div>
            </div>

            <div class="accordion-item mb-3 border-0 shadow-sm">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        Can I access courses offline?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Absolutely! You can download lessons from our mobile app and watch anytime.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
@endsection