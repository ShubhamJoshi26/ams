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
            @foreach($certifications as $certification)
            <div class="col-md-6 col-lg-3">
                <div class="badge-card">
                    @if(!empty($certification->badge_icon))
                    <img src="{{ asset($certification->badge_icon) }}" class="img-fluid " style="max-height: 100px; object-fit: contain;" alt="{{ $certification->name }}">
                    @else
                    <div class="badge-icon fw-bold">{{ substr($certification->name ?? '', 0, 1) }}</div>
                    @endif

                    <h5 class="fw-bold mt-3">{{ $certification->name ?? 'No Name' }}</h5>
                    <p class="text-muted small mb-0">
                        Issued {{ $certification->issued_date ?? 'N/A' }} • ID {{ $certification->id ?? 'N/A' }}
                    </p>
                </div>
            </div>
            @endforeach

            <!-- <div class="col-md-6 col-lg-3">
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
            </div> -->
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
            @foreach($steps as $step)

            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <img src="{{ asset($step['icon']) }}" class="img-fluid " style="max-height: 100px; object-fit: contain;" alt="{{ $step['title'] }}">
                    <h3 class="text-teal mb-3">1. {{ $step['title'] }}</h3>
                    <p class="text-muted">{{ $step['description'] }}</p>
                </div>
            </div>
            @endforeach
            <!-- <div class="col-md-6 col-lg-3">
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
            </div> -->
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
            @foreach($faqs as $faq)
            
            <div class="accordion-item mb-3 border-0 shadow-sm">
                <h2 class="accordion-header" id="heading{{ $faq->id ?? $loop->index }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id ?? $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $faq->id ?? $loop->index }}">
                        {{ $faq->question ?? 'No Question' }}
                    </button>
                </h2>
                <div id="collapse{{ $faq->id ?? $loop->index }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        {{ $faq->answer ?? 'No Answer' }}
                    </div>
                </div>
            </div>
            @endforeach

            <!-- <div class="accordion-item mb-3 border-0 shadow-sm">
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
            </div> -->
        </div>
    </div>
</section>

@endsection
@section('scripts')
<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
  const tabButtons = document.querySelectorAll('#tutorTabs button[data-bs-toggle="pill"]');
  const tabPanes = document.querySelectorAll('.tab-pane');

  tabButtons.forEach(button => {
    button.addEventListener('shown.bs.tab', function (event) {
      const targetSelector = event.target.getAttribute('data-bs-target');

      // Remove 'show' and 'active' from all panes
      tabPanes.forEach(pane => pane.classList.remove('show', 'active'));

      // Add 'show' and 'active' to the clicked tab's pane
      const targetPane = document.querySelector(targetSelector);
      if (targetPane) {
        targetPane.classList.add('show', 'active');
      }
    });
  });
});



</script> -->

<script>
$(document).ready(function() {
  $('#tutorTabs button').on('click', function() {
    var category = $(this).data('category');
    // console.log('Selected category:', category);
    // Update active tab button
    $('#tutorTabs button').removeClass('active');
    $(this).addClass('active');

    // Fetch tutors via AJAX
    $.ajax({
      url: '/tutors/category/' + category,
      type: 'GET',
      success: function(data) {
        var html = '';
        if (data.length === 0) {
          html = '<p class="text-center">No tutors available in this category.</p>';
        } else {
          data.forEach(function(tutor) {
            html += `
              <div class="col-sm-6 col-lg-3">
                <div class="card tutor-card text-center p-3 zoom-in" data-bs-toggle="modal" data-bs-target="#tutorModal${tutor.id}">
                  <img src="/${tutor.image}" class="rounded-circle mx-auto mb-3" width="120" height="120" alt="${tutor.name}">
                  <h6 class="fw-bold mb-1">${tutor.name}</h6>
                  <p class="text-secondary small mb-2">${tutor.designation}</p>
                  <p class="text-muted small">${tutor.experience}</p>
                </div>
              </div>
            `;
          });
        }

        $('#tutorCardsContainer').html(html);
      },
      error: function() {
        $('#tutorCardsContainer').html('<p class="text-center text-danger">Failed to load tutors.</p>');
      }
    });
  });
});
</script>
@endsection