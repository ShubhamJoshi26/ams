@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/web.css') }}">

@endsection

@section('content')
<section class="hero-section text-center text-md-start mt-4">
    <div class="container">
        <h1 class="fw-bold mb-3">Stay Updated with Our Events & Articles</h1>
        <p class="lead mb-4">
            Discover upcoming events, insightful articles, and the latest trends in education and technology.
        </p>
        <div class="mt-3">
            <button class="btn btn-light text-primary fw-semibold me-2">
                <i class="ri-calendar-event-line me-1"></i> Upcoming Events
            </button>
            <button class="btn btn-light text-primary fw-semibold">
                <i class="ri-article-line me-1"></i> Latest Articles
            </button>
        </div>
    </div>
</section>
<!-- 🔹 Swiper Banner Section -->
<div class="container mt-5">
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide banner-slide" style="background-image: url('https://images.unsplash.com/photo-1556761175-4b46a572b786?w=1600&h=900&fit=crop');">
                <div class="banner-overlay d-flex h-100 pt-3 pb-3">
                    <div>
                        <h5 class="fw-bold text-start">Tech Innovation Summit 2025</h5>
                        <p class="text-white text-start small mb-1"><i class="ri-calendar-line me-1"></i> Starts: 15 Oct 2025 | 10:00 AM</p>
                        <p class="text-white text-start small">Explore the future of AI, cloud, and data-driven technologies with top industry leaders.</p>
                    </div>
                    <div class=" d-flex align-items-start ms-auto h-100 mt-3">
                        <div class="badge text-bg-danger">New</div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide banner-slide" style="background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=1600&h=900&fit=crop');">
                <div class="banner-overlay d-flex h-100 pt-3 pb-3">
                    <div>
                        <h5 class="fw-bold text-start">Tech Innovation Summit 2025</h5>
                        <p class="text-white text-start small mb-1"><i class="ri-calendar-line me-1"></i> Starts: 15 Oct 2025 | 10:00 AM</p>
                        <p class="text-white text-start small">Explore the future of AI, cloud, and data-driven technologies with top industry leaders.</p>
                    </div>
                    <div class=" d-flex align-items-start ms-auto h-100 mt-3">
                        <div class="badge text-bg-danger">New</div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide banner-slide" style="background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1600&h=900&fit=crop');">
                <div class="banner-overlay d-flex h-100 pt-3 pb-3">
                    <div>
                        <h5 class="fw-bold text-start">Tech Innovation Summit 2025</h5>
                        <p class="text-white text-start small mb-1"><i class="ri-calendar-line me-1"></i> Starts: 15 Oct 2025 | 10:00 AM</p>
                        <p class="text-white text-start small">Explore the future of AI, cloud, and data-driven technologies with top industry leaders.</p>
                    </div>
                    <div class=" d-flex align-items-start ms-auto h-100 mt-3">
                        <div class="badge text-bg-danger">New</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swiper Pagination & Navigation -->
        <div class="swiper-pagination"></div>
        <!-- <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div> -->
    </div>
</div>
<!-- 🔹 Hero Header -->


<!-- 🔹 Events Section -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h2 class="fw-bold mb-2">Events / Articles</h2>
            <a href="#" class="text-teal fw-semibold text-decoration-none">View All <i class="ri-arrow-right-line"></i></a>
        </div>

        <div class="row g-4">
            @foreach(range(1,6) as $i)
            <div class="col-md-6 col-lg-4">
                <div class="card event-card shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-15{{$i}}6761175-4b46a572b786?w=600&h=400&fit=crop" alt="Event" class="card-img-top">
                    <div class="card-body">
                        <h5 class="fw-bold">Tech Innovation Summit 2025</h5>
                        <p class="text-muted small mb-1"><i class="ri-calendar-line me-1"></i> Starts: 15 Oct 2025 | 10:00 AM</p>
                        <p class="text-muted small">Explore the future of AI, cloud, and data-driven technologies with top industry leaders.</p>
                    </div>
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <a href="#" class="btn btn-light fw-semibold">Join Event</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".banner-swiper", {
            loop: true,
            // autoplay: {
            //     delay: 10000,
            //     disableOnInteraction: false,
            // },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>
@endsection