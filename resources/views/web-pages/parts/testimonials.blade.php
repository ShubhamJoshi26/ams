<!-- Testimonials Section -->
<section class="py-5 position-relative overflow-hidden" id="testimonials">
    <div class="container-fluid position-relative px-4">
        <div class="text-center mb-5">
            <p class="text-uppercase text-muted fw-semibold mb-2" style="letter-spacing: 1px;">What Learners Say</p>
            <h2 class="fw-bold text-dark">Testimonials</h2>
            <div class="mx-auto mt-2" style="width: 60px; height: 3px; background-color: #14b8a6;"></div>
        </div> <!-- Swiper -->
        <div class="swiper testimonialSwiper pb-5">
            <div class="swiper-wrapper"> <!-- Slide 1 -->
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="card border-0 shadow-sm  p-4 text-center rounded-4 h-100 bg-white">
                        <div class="d-flex justify-content-center mb-3"> <img src="{{ asset($testimonial->image) }}" alt="User" class="rounded-circle border border-3 border-teal shadow-sm" width="90" height="90"> </div>
                        <p class="text-muted fst-italic mb-3">"{{ $testimonial->feedback }}"</p>
                        <h6 class="fw-bold text-black fw-bold mb-0">{{ $testimonial->name }}</h6> <small class="text-muted">{{ $testimonial->designation }}</small>
                    </div>
                    @endforeach
                </div> <!-- Slide 2 -->

            </div> <!-- Pagination -->
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>