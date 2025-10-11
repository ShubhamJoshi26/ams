@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/web.css') }}">
<style>
    .hero-banner {
        position: relative;
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
    }

    .event-meta span {
        display: inline-block;
        margin-right: 15px;
        color: var(--primary-color);
        font-weight: 500;
    }

    .content-section p {
        line-height: 1.8;
        color: #555;
    }

    .related-card {
        transition: all 0.3s ease;
        border: none;
    }

    .related-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 767px) {
        .hero-banner {
            padding: 60px 0;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')

<!-- 🏞 Hero Banner -->
<section class="hero-banner" style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1200');">
    <div class="hero-overlay"></div>
    <div class="container position-relative text-center text-md-start">
        <h1 class="fw-bold display-5">Tech Innovation Summit 2025</h1>
        <p class="lead">Exploring the future of Artificial Intelligence, Cloud, and Emerging Technologies.</p>
    </div>
</section>

<!-- 📰 Event / Article Details -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="event-meta mb-3">
                    <span><i class="ri-calendar-line me-1"></i> 15 Oct 2025</span>
                    <span><i class="ri-time-line me-1"></i> 10:00 AM – 4:00 PM</span>
                    <span><i class="ri-map-pin-line me-1"></i> New Delhi, India</span>
                </div>
                <img src="https://images.unsplash.com/photo-1535223289827-42f1e9919769?w=1000" class="img-fluid rounded mb-4" alt="Event Main">
                
                <div class="content-section">
                    <h3 class="fw-bold mb-3">About the Event</h3>
                    <p>
                        Join us for an inspiring day at the Tech Innovation Summit 2025, where industry experts, innovators, and
                        technology leaders will share insights into the evolving world of Artificial Intelligence, Cloud Computing, 
                        and Data Science. This event aims to bridge the gap between emerging technologies and their practical applications.
                    </p>
                    <p>
                        Expect engaging keynote sessions, panel discussions, and live demos that will showcase how technology continues 
                        to reshape industries and transform the way we live and work. Network with professionals and gain first-hand knowledge 
                        of the latest trends in innovation.
                    </p>

                    <h4 class="fw-bold mt-5 mb-3">Key Highlights</h4>
                    <ul>
                        <li>AI & ML Hands-on Workshops</li>
                        <li>Keynote Sessions by Industry Experts</li>
                        <li>Panel Discussions on Tech Trends</li>
                        <li>Networking with Professionals</li>
                    </ul>

                    <div class="mt-5">
                        <button class="btn btn-primary px-4 py-2 me-2"><i class="ri-calendar-check-line me-1"></i> Register Now</button>
                        <button class="btn btn-outline-secondary px-4 py-2"><i class="ri-share-line me-1"></i> Share Event</button>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Event Information</h5>
                            <p><i class="ri-user-line me-2"></i> Hosted by: <strong>Deepak Rawat</strong></p>
                            <p><i class="ri-map-pin-line me-2"></i> Location: New Delhi, India</p>
                            <p><i class="ri-time-line me-2"></i> Duration: 6 hours</p>
                            <p><i class="ri-price-tag-3-line me-2"></i> Category: Technology</p>
                            <a href="#" class="btn btn-teal w-100 mt-3">Join Event</a>
                        </div>
                    </div>

                    <div class="related-events">
                        <h5 class="fw-bold mb-3">Related Events</h5>
                        <div class="row g-3">
                            @foreach(range(1,3) as $i)
                            <div class="col-12">
                                <div class="card related-card">
                                    <img src="https://images.unsplash.com/photo-15{{$i}}6761175-4b46a572b786?w=400&h=200&fit=crop" class="card-img-top" alt="Related Event">
                                    <div class="card-body">
                                        <h6 class="fw-bold">AI Future Conference {{$i}}</h6>
                                        <small class="text-muted"><i class="ri-calendar-line me-1"></i> 20 Oct 2025</small>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection
