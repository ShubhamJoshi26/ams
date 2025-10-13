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
    <!-- <div class="swiper banner-swiper">
        <div class="swiper-wrapper">
            @forelse($events as $event)
            <div class="swiper-slide banner-slide" style="background-image: url('{{ $event->media_path ? asset($event->media_path) : 'https://via.placeholder.com/1600x900' }}');">
                <div class="banner-overlay d-flex h-100 pt-3 pb-3">
                    <div>
                        <h5 class="fw-bold text-start">{{ $event->title }}</h5>
                        <p class="text-white text-start small mb-1"><i class="ri-calendar-line me-1"></i> Starts: {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y | h:i A') }}</p>
                        <p class="text-white text-start small">{{ Str::limit($event->short_description, 100) }}</p>
                    </div>
                    @if($event->is_new == 1)
                    <div class="d-flex align-items-start ms-auto h-100 mt-3">
                        <div class="badge text-bg-danger">New</div>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="swiper-slide banner-slide" style="background-image: url('https://via.placeholder.com/1600x900');">
                <div class="banner-overlay d-flex h-100 pt-3 pb-3">
                    <p class="text-white">No upcoming events</p>
                </div>
            </div>
            @endforelse
        </div>     
        <div class="swiper-pagination"></div>
    </div> -->
    <div class="swiper banner-swiper" style="height: 400px;">
        <div class="swiper-wrapper">
            @forelse($events as $event)
            <div class="swiper-slide banner-slide position-relative" style="height: 100%;">
                <a href="/event/{{$event->slug}}" class="stretched-link">
                    {{-- Media Layer --}}
                    @if($event->type === 'image' && $event->media_path)
                    <img src="{{ asset($event->media_path) }}" alt="{{ $event->title }}" class="w-100 h-100" style="object-fit: contain;">
                    @elseif($event->type === 'video' && $event->media_path)
                    <video class="w-100 h-100" style="object-fit: cover;" muted>
                        <source src="{{ asset($event->media_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @elseif($event->type === 'embed' && $event->embed_link)
                    <iframe class="w-100 h-100" src="{{ $event->embed_link }}" style="object-fit: cover;" frameborder="0" allowfullscreen></iframe>
                    @else
                    <img src="https://via.placeholder.com/1600x900" alt="No Media" class="w-100 h-100" style="object-fit: cover;">
                    @endif

                    {{-- Overlay Content --}}
                    <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-between align-items-start p-4" style="background: rgba(0,0,0,0.4);">

                        @if($event->is_new == 1)
                        <div class="badge text-bg-danger mt-2 mb-3">New</div>
                        @endif
                        <div class="text-start">
                            <p class="text-white small mb-1">
                                <i class="ri-calendar-line me-1"></i> Starts: {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y | h:i A') }}
                            </p>
                            <h5 class="fw-bold text-white">{{ $event->title }}</h5>

                            <p class="text-white small">{{ Str::limit($event->short_description, 150) }}</p>
                        </div>

                    </div>
                </a>
            </div>
            @empty
            <div class="swiper-slide banner-slide position-relative">
                <img src="https://via.placeholder.com/1600x900" alt="No Media" class="w-100 h-100" style="object-fit: cover;">
                <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                    <p class="text-white">No upcoming events</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
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
            @forelse($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card event-card shadow-sm h-100 position-relative">
                    @if($event->type === 'image' && $event->media_path)
                    <img src="{{ asset($event->media_path) }}" alt="{{ $event->title }}" class="card-img-top" style="height: 200px; object-fit: contain;">
                    @elseif($event->type === 'video' && $event->media_path)
                    <video class="card-img-top" style="height: 200px; object-fit: cover;" controls>
                        <source src="{{ asset($event->media_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @elseif($event->type === 'embed' && $event->embed_link)
                    <iframe class="card-img-top" src="{{ $event->embed_link }}" style="height: 200px; width:100%; object-fit: cover;" frameborder="0" allowfullscreen></iframe>
                    @else
                    <img src="https://via.placeholder.com/400x200?text=No+Media" alt="No Media" class="card-img-top cover">
                    @endif

                    <div class="card-body">
                        <h5 class="fw-bold">{{ $event->title }}</h5>
                        @if($event->created_at ?? false)
                        <p class="text-muted small mb-1"><i class="ri-calendar-line me-1"></i> Starts: {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y | h:i A') }}</p>
                        @endif
                        @if($event->short_description)
                        <p class="text-muted small">{{ Str::limit($event->short_description, 100) }}</p>
                        @endif
                    </div>

                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                        <a href="/event/{{$event->slug}}" class="btn btn-light fw-semibold">Join Event</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No upcoming events at the moment. Please check back later.</p>
            </div>
            @endforelse
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