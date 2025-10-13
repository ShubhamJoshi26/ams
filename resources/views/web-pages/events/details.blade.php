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
        <h1 class="fw-bold display-5">{{ $event->title }}</h1>
        <p class="lead">{{ $event->short_description }}</p>
    </div>
</section>

<!-- 📰 Event / Article Details -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="event-meta mb-3">
                    @if($event->created_at)
                    <span>
                        <i class="ri-calendar-line me-1"></i>
                        {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y | H:i:s') }}
                    </span>
                    @endif
                </div>
                <div class="event-media rounded-4 overflow-hidden" style="width: 100%; max-height: 500px;">
                    @if($event->type === 'image' && $event->media_path)
                    <img src="{{ asset($event->media_path) }}" alt="{{ $event->title }}" class="w-100 h-100 object-fit-cover" style="max-height: 500px;min-height: 300px;">
                    @elseif($event->type === 'video' && $event->media_path)
                    <video src="{{ asset($event->media_path) }}" autoplay muted loop class="w-100 h-100 object-fit-cover" style="max-height: 500px;min-height: 300px;"></video>
                    @elseif($event->type === 'embed' && $event->embed_link)
                    <iframe src="{{ $event->embed_link }}" frameborder="0" allowfullscreen class="w-100 h-100 object-fit-cover" style="max-height: 500px;min-height: 500px;"></iframe>
                    @else
                    <img src="https://via.placeholder.com/1200x500" alt="No Media" class="w-100 h-100 object-fit-cover" style="max-height: 500px;min-height: 300px;"></img>
                    @endif
                </div>

                <div class="content-section">
                    <h3 class="fw-bold mb-3">{{ $event->title }}</h3>
                    <p>
                        {{ $event->short_description }}
                    </p>

                    <!-- <div class="mt-5">
                        <button class="btn btn-primary px-4 py-2 me-2"><i class="ri-calendar-check-line me-1"></i> Register Now</button>
                        <button class="btn btn-outline-secondary px-4 py-2"><i class="ri-share-line me-1"></i> Share Event</button>
                    </div> -->
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">

                    <div class="related-events">
                        <h5 class="fw-bold mb-3">Related Events</h5>
                        <div class="row g-3">
                            @foreach($relatedEvents as $related)
                            <div class="col-12">
                                <div class="card related-card">
                                    @if($related->type === 'image' && $related->media_path)
                                    <img src="{{ asset($related->media_path) }}" alt="{{ $related->title }}">
                                    @elseif($related->type === 'video' && $related->media_path)
                                    <video src="{{ asset($related->media_path) }}" autoplay muted loop></video>
                                    @elseif($related->type === 'embed' && $related->embed_link)
                                    <iframe src="{{ $related->embed_link }}" frameborder="0" allowfullscreen></iframe>
                                    @else
                                    <img src="https://via.placeholder.com/1200x500" alt="No Media">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="fw-bold">{{ $related->title }}</h6>
                                        @if($related->created_at)
                                        <span>
                                            <i class="ri-calendar-line me-1"></i>
                                            {{ \Carbon\Carbon::parse($related->created_at)->format('d M Y | H:i:s') }}
                                        </span>
                                        @endif
                                        <a href="/event/{{ $related->slug }}" class="stretched-link"></a>
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