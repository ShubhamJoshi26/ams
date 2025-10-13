@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

@endsection

@section('content')
<section class="mt-5 pb-5" style="padding-top: 80px;background-color:var(--primary-color); color:white;">
    <div class="container">
        <h1>Get in touch</h1>
        <p>We're here to help with courses, certifications, partnerships, and media inquiries.</p>
        <div class="mt-3">
           <a href="#team" class="btn btn-light ">Meet Our Team</a>
        </div>
    </div>
</section>
<!-- <section class="about-hero py-5" style="background-color:var(--primary-color); color:#fff;">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold mb-3">About CertifyPro</h1>
        <p class="lead mb-4">Empowering learners with world-class certifications and expert guidance to achieve their career goals.</p>
        <a href="#team" class="btn btn-light btn-lg">Meet Our Team</a>
    </div>
</section> -->

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-md-6">
                <i class="ri-eye-line fs-1 text-teal mb-3"></i>
                <h3 class="fw-bold">Our Vision</h3>
                <p>To make quality education accessible to everyone, everywhere, and equip learners with skills for the future.</p>
            </div>
            <div class="col-md-6">
                <i class="ri-lightbulb-line fs-1 text-teal mb-3"></i>
                <h3 class="fw-bold">Our Mission</h3>
                <p>Deliver expert-led courses, verified certifications, and practical experience that help learners grow their careers.</p>
            </div>
        </div>
    </div>
</section>

<!-- Timeline / History -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Journey</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-4 rounded-3 shadow-sm">
                    <div class="me-3 text-teal fs-3">
                        <i class="ri-calendar-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">2018</h5>
                        <p>Founded with a vision to provide certified courses for career growth.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-4 rounded-3 shadow-sm">
                    <div class="me-3 text-teal fs-3">
                        <i class="ri-star-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">2020</h5>
                        <p>Reached 50k+ learners worldwide and launched online mentorship programs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-4 rounded-3 shadow-sm">
                    <div class="me-3 text-teal fs-3">
                        <i class="ri-award-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">2022</h5>
                        <p>Partnered with top companies for verified certification programs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-4 rounded-3 shadow-sm">
                    <div class="me-3 text-teal fs-3">
                        <i class="ri-global-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">2025</h5>
                        <p>Empowering 1M+ learners worldwide with expert-led courses.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web-pages.parts.connect')


@endsection

@section('scripts')

@endsection