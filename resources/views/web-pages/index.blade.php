@extends('layouts.web-main')

@section('content')
<!-- Hero Section -->
<section class="hero-section" id="home">
  <div class="container">
    <div class="row align-items-center">
      <!-- Hero Text -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <p class="text-teal mb-2">Trusted Online Certifications</p>
        <h1 class="display-4 fw-bold mb-3">Advance your skills with job-ready certificates</h1>
        <p class="text-secondary mb-4">
          Expert-led lessons, measurable progress, and credentials recruiters recognize.
        </p>
        <ul class="list-unstyled d-flex flex-wrap gap-3 mb-4">
          <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Flexible schedules</li>
          <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Industry expert mentors</li>
          <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Career-oriented programs</li>
        </ul>
      </div>

      <!-- Lead Form -->
      <div class="col-lg-6">
        <div class="card shadow-lg border-0 p-4 rounded-4 bg-white position-relative overflow-hidden">
          <h4 class="fw-bold mb-3 text-center text-dark">Get Free Career Guidance</h4>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control rounded-3" id="name" placeholder="Enter your full name" required />
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control rounded-3" id="email" placeholder="you@example.com" required />
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control rounded-3" id="phone" placeholder="+91 98765 43210" required />
            </div>

            <div class="mb-3">
              <label for="interest" class="form-label">Interested In</label>
              <select class="form-select rounded-3" id="interest" required>
                <option value="">Select a course</option>
                <option>Full Stack Development</option>
                <option>Data Science</option>
                <option>Cloud Computing</option>
                <option>Cyber Security</option>
              </select>
            </div>

            <button type="submit" class="btn btn-teal w-100 py-2 rounded-3 mt-2">
              Get Free Consultation
            </button>
          </form>
          <small class="text-muted text-center d-block mt-3">
            No spam — we respect your privacy.
          </small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Certification Badges -->
<section class="py-5" id="certifications">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-secondary mb-1">Your Achievements</p>
                <h2 class="fw-bold">Certification Badges</h2>
            </div>
            <a href="#" class="text-teal text-decoration-none">Download all</a>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon">C</div>
                    <h5 class="fw-bold mt-3">Data Analytics Certified</h5>
                    <p class="text-secondary small mb-0">Issued Apr 2024 • ID 47281</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon">C</div>
                    <h5 class="fw-bold mt-3">Cloud Fundamentals</h5>
                    <p class="text-secondary small mb-0">Issued Feb 2024 • ID 89733</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon">P</div>
                    <h5 class="fw-bold mt-3">Python Practitioner</h5>
                    <p class="text-secondary small mb-0">Issued Jan 2024 • ID 18916</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    <div class="badge-icon">A</div>
                    <h5 class="fw-bold mt-3">AI & ML Basics</h5>
                    <p class="text-secondary small mb-0">Issued Feb 2025 • ID ML-7149</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Courses -->
<section class="py-5" id="courses">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-secondary mb-1">Popular Right Now</p>
                <h2 class="fw-bold">Featured Courses</h2>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <button class="tab-button">Filters</button>
                <button class="tab-button">Beginner</button>
                <button class="tab-button">Intermediate</button>
                <button class="tab-button">Advanced</button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Course 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=200&fit=crop" alt="Data Analytics" class="course-img">
                    <div class="course-body">
                        <h5 class="fw-bold mb-2">Data Analytics Foundations</h5>
                        <p class="text-secondary small mb-3">SQL, spreadsheets, and data storytelling to drive decisions</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://i.pravatar.cc/40?img=1" alt="Alex Kim" class="rounded-circle me-2" width="30" height="30">
                            <span class="small">Alex Kim</span>
                            <span class="ms-auto">⭐ 4.8</span>
                        </div>
                        <div class="progress-bar-custom mb-2">
                            <div class="progress-fill" style="width: 56%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-secondary">56%</span>
                            <button class="btn btn-sm btn-teal">View Course</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=400&h=200&fit=crop" alt="Python" class="course-img">
                    <div class="course-body">
                        <h5 class="fw-bold mb-2">Python for Professionals</h5>
                        <p class="text-secondary small mb-3">Automation, data cleaning, and APIs made practical</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://i.pravatar.cc/40?img=2" alt="Riya Patel" class="rounded-circle me-2" width="30" height="30">
                            <span class="small">Riya Patel</span>
                            <span class="ms-auto">⭐ 4.9</span>
                        </div>
                        <div class="progress-bar-custom mb-2">
                            <div class="progress-fill" style="width: 24%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-secondary">24%</span>
                            <button class="btn btn-sm btn-teal">View Course</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=400&h=200&fit=crop" alt="Cloud" class="course-img">
                    <div class="course-body">
                        <h5 class="fw-bold mb-2">Cloud Practitioner Essentials</h5>
                        <p class="text-secondary small mb-3">Core cloud services, security, and cost management</p>
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://i.pravatar.cc/40?img=3" alt="Samuel Lee" class="rounded-circle me-2" width="30" height="30">
                            <span class="small">Samuel Lee</span>
                            <span class="ms-auto">⭐ 4.7</span>
                        </div>
                        <div class="progress-bar-custom mb-2">
                            <div class="progress-fill" style="width: 0%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-secondary">0%</span>
                            <button class="btn btn-sm btn-teal">View Course</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-5">
    <div class="container">
        <p class="text-secondary mb-2">Simple & Transparent</p>
        <h2 class="fw-bold mb-4">How it works</h2>
        <p class="text-secondary mb-5">Get certified in four clear steps.</p>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">1. Discover</h3>
                    <p class="text-secondary">Browse curated courses by role, skill, or industry.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">2. Learn</h3>
                    <p class="text-secondary">Follow bite-sized lessons with hands-on projects.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">3. Certify</h3>
                    <p class="text-secondary">Pass assessments to earn verified certificates.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <h3 class="text-teal mb-3">4. Share</h3>
                    <p class="text-secondary">Add badges to your LinkedIn and resume to stand out.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('web-pages.parts.connect')

@include('web-pages.parts.tutors')
@include('web-pages.parts.testimonials')




<!-- Events Section -->
<section class="py-5" id="events">
  <div class="container">
    <div class="text-center mb-5">
      <p class="text-secondary mb-1">Don't Miss Out</p>
      <h2 class="fw-bold">Upcoming Events</h2>
      <p class="text-muted">Join our live sessions, workshops, and bootcamps to level up your skills.</p>
    </div>

    <div class="row g-4">
      <!-- Event Card 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm event-card h-100 position-relative overflow-hidden">
          <img src="https://images.unsplash.com/photo-1581091215367-59ab6b71b245?w=400&h=200&fit=crop" class="card-img-top" alt="Event">
          <div class="card-body">
            <h5 class="fw-bold">Web Dev Bootcamp 2025</h5>
            <p class="text-muted small mb-1">Starts: 15 Oct 2025 | 10:00 AM</p>
            <p class="text-secondary small mb-0">Hands-on coding bootcamp for React, Node, and API development.</p>
          </div>
          <div class="position-absolute top-0 start-0 w-100 h-100 overlay d-flex justify-content-center align-items-center">
            <a href="#" class="btn btn-teal">Register Now</a>
          </div>
        </div>
      </div>

      <!-- Event Card 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm event-card h-100 position-relative overflow-hidden">
          <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?w=400&h=200&fit=crop" class="card-img-top" alt="Event">
          <div class="card-body">
            <h5 class="fw-bold">AI & ML Summit</h5>
            <p class="text-muted small mb-1">Starts: 28 Oct 2025 | 11:00 AM</p>
            <p class="text-secondary small mb-0">Discover the latest AI trends and real-world ML use cases.</p>
          </div>
          <div class="position-absolute top-0 start-0 w-100 h-100 overlay d-flex justify-content-center align-items-center">
            <a href="#" class="btn btn-teal">Register Now</a>
          </div>
        </div>
      </div>

      <!-- Event Card 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm event-card h-100 position-relative overflow-hidden">
          <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=200&fit=crop" class="card-img-top" alt="Event">
          <div class="card-body">
            <h5 class="fw-bold">Cloud & DevOps Workshop</h5>
            <p class="text-muted small mb-1">Starts: 5 Nov 2025 | 2:00 PM</p>
            <p class="text-secondary small mb-0">Learn automation with Docker, Kubernetes, and CI/CD pipelines.</p>
          </div>
          <div class="position-absolute top-0 start-0 w-100 h-100 overlay d-flex justify-content-center align-items-center">
            <a href="#" class="btn btn-teal">Register Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FAQ Section -->
<section class="py-5" id="faq">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-secondary mb-1">Have Questions?</p>
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