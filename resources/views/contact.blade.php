@extends('main')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="fw-bold display-5 mb-3" style="color: #3c3630;">Help Center</h1>
                <p class="text-muted fs-5">Got a question regarding skincare routine or products? We're here to help.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5 p-5 text-white d-flex flex-column justify-content-center" style="background-color: #d36856;">
                        <h3 class="fw-bold mb-4">Contact Information</h3>
                        <p class="mb-4 opacity-75">Fill out the form and our team will get back to you within 24 hours.</p>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle bg-white bg-opacity-25 p-2 me-3">
                                <i class="bi bi-geo-alt fs-5"></i>
                            </div>
                            <span>123 Skincare Lane, Glow City</span>
                        </div>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle bg-white bg-opacity-25 p-2 me-3">
                                <i class="bi bi-telephone fs-5"></i>
                            </div>
                            <span>+1 (555) 123-4567</span>
                        </div>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle bg-white bg-opacity-25 p-2 me-3">
                                <i class="bi bi-envelope fs-5"></i>
                            </div>
                            <span>support@anease.com</span>
                        </div>
                    </div>
                    
                    <div class="col-md-7 p-5 bg-white">
                        <form action="{{ route('help.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label text-muted fw-bold small">YOUR NAME</label>
                                    <input type="text" name="name" class="form-control border-0 bg-light py-3 px-4 rounded-3" value="{{ auth()->check() ? auth()->user()->firstname . ' ' . auth()->user()->lastname : '' }}" required placeholder="Jane Doe">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label text-muted fw-bold small">EMAIL ADDRESS</label>
                                    <input type="email" name="email" class="form-control border-0 bg-light py-3 px-4 rounded-3" value="{{ auth()->check() ? auth()->user()->email : '' }}" required placeholder="jane@example.com">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label text-muted fw-bold small">SUBJECT</label>
                                <select name="subject" class="form-select border-0 bg-light py-3 px-4 rounded-3">
                                    <option value="Skincare Routine">Skincare Routine Help</option>
                                    <option value="Product Inquiry">Product Inquiry</option>
                                    <option value="Order Support">Order Support</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            
                            <div class="mb-5">
                                <label class="form-label text-muted fw-bold small">MESSAGE</label>
                                <textarea name="message" class="form-control border-0 bg-light py-3 px-4 rounded-3" rows="4" required placeholder="How can we help you today?"></textarea>
                            </div>
                            
                            <button type="submit" class="btn text-white w-100 py-3 fw-bold shadow-sm rounded-3" style="background-color: #3c3630;">
                                Send Message <i class="bi bi-send ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="mt-5 pt-4 border-top">
                <h4 class="fw-bold mb-4" style="color: #3c3630;">Frequently Asked Questions</h4>
                <div class="accordion accordion-flush" id="faqAccordion">
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-transparent fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What is the best routine for oily skin?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                For oily skin, we recommend a gentle foaming cleanser, followed by a niacinamide serum and a lightweight, oil-free water cream moisturizer.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-transparent fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How long does shipping take?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Standard shipping typically takes 3-5 business days. Express shipping is available for 1-2 day delivery.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
