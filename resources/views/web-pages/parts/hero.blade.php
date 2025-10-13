<section class="hero-section" id="home">
  <div class="container">
    <div class="row align-items-center">
      <!-- Hero Text -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <p class="text-secondary mb-2">Trusted Online Certifications</p>
        <h1 class="display-4 fw-bold mb-3">{{ $hero->title }}</h1>
        <p class="text-secondary mb-4">
          {{ $hero->subtitle }}
        </p>
        <ul class="list-unstyled d-flex flex-wrap gap-3 mb-4">
          <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Flexible schedules</li>
          <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i>Industry expert mentors</li>
          <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Career-oriented programs</li>
          <li><a href="{{ $hero->button_link }}" class="btn btn-primary">{{ $hero->button_text }}</a></li>
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

            <button type="submit" class="btn btn-secondary border-0 w-100 py-2 rounded-3 mt-2">
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