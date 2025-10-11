<section class="py-5" id="courses">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
      <div class="mb-3 mb-md-0">
        <p class="text-primary mb-1">Popular Right Now</p>
        <h2 class="fw-bold">Featured Courses</h2>
      </div>

      <!-- Bootstrap Nav Tabs -->
      <ul class="nav nav-tabs border-0 d-flex flex-wrap gap-2" id="courseTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="tab-button active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">All</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="tab-button" id="beginner-tab" data-bs-toggle="tab" data-bs-target="#beginner" type="button" role="tab">Beginner</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="tab-button" id="intermediate-tab" data-bs-toggle="tab" data-bs-target="#intermediate" type="button" role="tab">Intermediate</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="tab-button" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced" type="button" role="tab">Advanced</button>
        </li>
      </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="courseTabsContent">

      <!-- All Courses -->
      <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
        <div class="row g-4">
          <!-- Course 1 -->
          <div class="col-md-6 col-lg-4">
            <div class="course-card">
              <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=200&fit=crop" alt="Data Analytics" class="course-img">
              <div class="course-body">
                <h5 class="fw-bold mb-2">Data Analytics Foundations</h5>
                <p class="text-muted small mb-3">SQL, spreadsheets, and data storytelling to drive decisions</p>
                <div class="d-flex align-items-center mb-3">
                  <img src="https://i.pravatar.cc/40?img=1" alt="Alex Kim" class="rounded-circle me-2" width="30" height="30">
                  <span class="small">Alex Kim</span>
                  <span class="ms-auto">⭐ 4.8</span>
                </div>
                <div class="progress-bar-custom mb-2">
                  <div class="progress-fill" style="width: 56%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small text-muted">56%</span>
                  <button class="btn btn-sm btn-primary">View Course</button>
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
                <p class="text-muted small mb-3">Automation, data cleaning, and APIs made practical</p>
                <div class="d-flex align-items-center mb-3">
                  <img src="https://i.pravatar.cc/40?img=2" alt="Riya Patel" class="rounded-circle me-2" width="30" height="30">
                  <span class="small">Riya Patel</span>
                  <span class="ms-auto">⭐ 4.9</span>
                </div>
                <div class="progress-bar-custom mb-2">
                  <div class="progress-fill" style="width: 24%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small text-muted">24%</span>
                 <button class="btn btn-sm btn-primary">View Course</button>
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
                <p class="text-muted small mb-3">Core cloud services, security, and cost management</p>
                <div class="d-flex align-items-center mb-3">
                  <img src="https://i.pravatar.cc/40?img=3" alt="Samuel Lee" class="rounded-circle me-2" width="30" height="30">
                  <span class="small">Samuel Lee</span>
                  <span class="ms-auto">⭐ 4.7</span>
                </div>
                <div class="progress-bar-custom mb-2">
                  <div class="progress-fill" style="width: 0%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="small text-muted">0%</span>
                  <button class="btn btn-sm btn-primary">View Course</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Beginner -->
      <div class="tab-pane fade" id="beginner" role="tabpanel" aria-labelledby="beginner-tab">
        <div class="alert alert-info">Beginner courses coming soon...</div>
      </div>

      <!-- Intermediate -->
      <div class="tab-pane fade" id="intermediate" role="tabpanel" aria-labelledby="intermediate-tab">
        <div class="alert alert-warning">Intermediate level content will be updated shortly.</div>
      </div>

      <!-- Advanced -->
      <div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
        <div class="alert alert-success">Advanced courses will be available soon!</div>
      </div>
    </div>
  </div>
</section>