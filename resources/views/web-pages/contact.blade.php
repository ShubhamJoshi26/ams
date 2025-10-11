@extends('layouts.web-main')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">

@endsection

@section('content')
<section class="mt-5 pb-5" style="padding-top: 80px;background-color:var(--primary-color); color:white;">
    <div class="container">
        <h1>Get in touch</h1>
        <p>We're here to help with courses, certifications, partnerships, and media inquiries.</p>
        <div class="mt-3">
            <span class="btn btn-secondary border-0">Mon-Fri, 9am-6pm</span>
            <span class="btn btn-secondary border-0">Avg. response: under 24h</span>
        </div>
    </div>
</section>

<section class="main-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="card p-4">
                    <h2 class="mb-4">Send us a message</h2>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label text-black">Full Name</label>
                                <input type="text" class="form-control" placeholder="Jane Doe">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-black">Email</label>
                                <input type="email" class="form-control" placeholder="jane@company.com">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-black">Topic</label>
                                <select class="form-select">
                                    <option selected>General question</option>
                                    <option>Technical support</option>
                                    <option>Billing</option>
                                    <option>Partnership</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-black">Organization (optional)</label>
                                <input type="text" class="form-control" placeholder="Acme Inc.">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-black">Your Message</label>
                                <textarea class="form-control" placeholder="I have a question about certification verification..."></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check text-black">
                                    <input class="form-check-input" type="checkbox" id="terms">
                                    <label class="form-check-label text-muted" for="terms">
                                        I agree to the terms and privacy policy
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-muted mb-3">Need urgent help? <a href="#" class="text-teal">Visit Help Center</a></p>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Info & Map -->
            <div class="col-lg-6">
                <!-- Contact Options Card -->
                <div class="card mb-4 p-4">
                    <h2 class="mb-4">Contact Options</h2>
                    <div class="row g-4">
                        <!-- Email Support -->
                        <div class="col-12 col-md-6">
                            <div class="contact-option d-flex align-items-start p-4 bg-white rounded-3 shadow-sm hover-shadow transition">
                                <div class="icon me-3">
                                    <i class="ri-mail-line text-teal fs-3"></i>
                                </div>
                                <div class="content">
                                    <h5 class="fw-bold mb-1">Email Support</h5>
                                    <p class="mb-0 text-muted">support@certifypro.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12 col-md-6">
                            <div class="contact-option d-flex align-items-start p-4 bg-white rounded-3 shadow-sm hover-shadow transition">
                                <div class="icon me-3">
                                    <i class="ri-map-pin-line text-teal fs-3"></i>
                                </div>
                                <div class="content">
                                    <h5 class="fw-bold mb-1">Address</h5>
                                    <p class="mb-0 text-muted">500 Market Street, Suite 300, San Francisco, CA</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sales -->
                        <div class="col-12 col-md-6">
                            <div class="contact-option d-flex align-items-start p-4 bg-white rounded-3 shadow-sm hover-shadow transition">
                                <div class="icon me-3">
                                    <i class="ri-phone-line text-teal fs-3"></i>
                                </div>
                                <div class="content">
                                    <h5 class="fw-bold mb-1">Sales</h5>
                                    <p class="mb-0 text-muted">+1 (415) 555-0123</p>
                                </div>
                            </div>
                        </div>

                        <!-- Press -->
                        <div class="col-12 col-md-6">
                            <div class="contact-option d-flex align-items-start p-4 bg-white rounded-3 shadow-sm hover-shadow transition">
                                <div class="icon me-3">
                                    <i class="ri-broadcast-line text-teal fs-3"></i>
                                </div>
                                <div class="content">
                                    <h5 class="fw-bold mb-1">Press</h5>
                                    <p class="mb-0 text-muted">media@certifypro.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Card -->
                <div class="card p-0">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019277430814!2d-122.40195168468185!3d37.78817797975746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085807c35a7c5db%3A0x8e9bb5123e5bde33!2s500%20Market%20St%2C%20San%20Francisco%2C%20CA%2094105!5e0!3m2!1sen!2sus!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>


            <!-- FAQ Section -->
            <!-- FAQ Section -->
            <div class="col-lg-12 mt-5">
                <h3 class="mb-4 text-black fw-bold">Frequently Asked Questions</h3>
                <div class="accordion  border-0" id="faqAccordion">
                    <div class="accordion-item border-0 mb-3" style="border-radius:12px;">
                        <h2 class="accordion-header" id="faqHeading1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                                How do I verify a certificate?
                            </button>
                        </h2>
                        <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Use our verification tool on the My Certifications page.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 mb-3" style="border-radius:12px;">
                        <h2 class="accordion-header" id="faqHeading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                Do you offer team plans?
                            </button>
                        </h2>
                        <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, contact Sales for bulk enrollment and SSO.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 mb-3" style="border-radius:12px;">
                        <h2 class="accordion-header" id="faqHeading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                Refund policy
                            </button>
                        </h2>
                        <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Full refund within 14 days of purchase if less than 10% completed.
                            </div>
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