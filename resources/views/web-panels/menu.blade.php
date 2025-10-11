<nav class="navbar navbar-expand-lg navbar-dark bg-white py-3 sticky-top">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold fs-4 d-flex align-items-center" href="#">
      <img src="{{ asset('/assets/img/web-images/logo.jpg') }}" alt="CertifyPro Logo" class="img-fluid me-2" style="height:40px;">
      
    </a>

    <!-- Toggler -->
    <button
      class="navbar-toggler border-0"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-3" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-3" href="#courses">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-3" href="#certifications">My Certifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-3" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-3" href="#contact">Contact</a>
        </li>
      </ul>

      <!-- Right Side -->
      <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
        <div class="d-none d-lg-block">
          <input
            type="text"
            class="form-control form-control-sm bg-light border-0 rounded-pill px-3"
            placeholder="Search courses..."
            style="width:180px;"
          />
        </div>
        <a href="#" class="text-black text-decoration-none fw-semibold">Log In</a>
        <button class="btn btn-secondary border-0 fw-semibold rounded-pill px-3 py-1">Sign Up</button>
      </div>
    </div>
  </div>
</nav>
