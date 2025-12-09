@extends('layouts.app')

@section('custom_styles')
<style>
    /* --- Theme Variables --- */
    :root {
        --color-emerald-dark: #022c22;
        --color-emerald-primary: #10b981;
    }
    .font-serif { font-family: 'Playfair Display', serif; }

    /* --- Hero Section --- */
    .feedback-hero {
        background-color: var(--color-emerald-dark);
        padding-top: 8rem;
        padding-bottom: 12rem;
        position: relative;
        overflow: hidden;
    }
    .hero-orb {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        width: 600px; height: 600px; background: rgba(16, 185, 129, 0.15);
        border-radius: 50%; filter: blur(100px); pointer-events: none;
    }
    .hero-noise {
        position: absolute; inset: 0; 
        background-image: url('https://grainy-gradients.vercel.app/noise.svg');
        opacity: 0.1; pointer-events: none;
    }

    /* --- Glass Button --- */
    .glass-pill {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #d1fae5; text-decoration: none;
        transition: all 0.2s ease;
    }
    .glass-pill:hover { background: rgba(255, 255, 255, 0.2); color: white; }

    .content-overlap { margin-top: -8rem; position: relative; z-index: 10; }


    .form-card {
        border: none; border-radius: 2rem;
        box-shadow: 0 25px 50px -12px rgba(6, 78, 59, 0.15);
    }
    
    .custom-input {
        background-color: #f8f9fa; 
        border: 1px solid #e9ecef;
        border-radius: 1rem;
        padding: 1rem;
        resize: none;
    }
    .custom-input:focus {
        background-color: white;
        border-color: var(--color-emerald-primary);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        outline: none;
    }

    /* --- Star Rating System --- */
    .star-rating {
        display: flex;
        flex-direction: row-reverse; 
        justify-content: center;
        gap: 0.5rem;
    }
    
    /* Hide Radio Buttons */
    .star-rating input { display: none; }
    
    /* Star SVG Styling */
    .star-rating label {
        cursor: pointer;
        transition: transform 0.2s;
        color: #e2e8f0; 
    }
    
    .star-rating label:hover { transform: scale(1.2); }
    
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #fbbf24; 
    }

    /* --- Submit Button --- */
    .btn-submit {
        background-color: #0f172a; color: white;
        border: none; border-radius: 1rem;
        padding: 1rem; font-weight: bold;
        transition: all 0.3s ease;
    }
    .btn-submit:hover {
        background-color: var(--color-emerald-primary);
        color: white; transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
    }
</style>
@endsection

@section('content')

<div class="bg-light min-vh-100 font-sans">

    {{-- 
      1. HERO HEADER 
    --}}
    <section class="feedback-hero text-center text-white">
        {{-- Effects --}}
        <div class="hero-orb"></div>
        <div class="hero-noise"></div>

        <div class="container position-relative z-1">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    {{-- Back Pill --}}
                    <a href="/tips/{{ $tip->id }}" class="glass-pill d-inline-flex align-items-center rounded-pill px-3 py-1 mb-4 text-uppercase fw-bold small" style="letter-spacing: 1px; font-size: 0.75rem;">
                        <svg class="me-2" width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Return to Tip
                    </a>

                    <h1 class="display-4 font-serif mb-3">
                        Your feedback matters.
                    </h1>
                    <p class="lead text-light opacity-75 fw-light">
                        Sharing your experience helps the community find the most effective energy-saving methods.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 
      2. FEEDBACK FORM CARD
    --}}
    <div class="container content-overlap pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card form-card bg-white p-4 p-md-5">
                    
                    {{-- Header --}}
                    <div class="text-center mb-5">
                        <span class="d-block text-uppercase text-secondary fw-bold small tracking-wide mb-1" style="letter-spacing: 2px;">Reviewing</span>
                        <h2 class="h3 font-serif text-dark">"{{ $tip->title }}"</h2>
                    </div>

                    <form action="/feedback" method="POST">
                        @csrf
                        <input type="hidden" name="tip_id" value="{{ $tip->id }}">

                        {{-- Star Rating Section --}}
                        <div class="mb-5 text-center">
                            <label class="form-label fw-bold text-dark mb-3">How helpful was this tip?</label>
                            
                            <div class="star-rating mb-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                                    <label for="star{{ $i }}" title="{{ $i }} stars">
                                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    </label>
                                @endfor
                            </div>
                            <small class="text-muted fst-italic">Tap a star to rate</small>
                        </div>

                        {{-- Comment Section --}}
                        <div class="mb-4 position-relative">
                            <label for="comment" class="form-label fw-bold text-dark mb-2">
                                Share your experience <span class="fw-normal text-muted">(Optional)</span>
                            </label>
                            
                            <textarea name="comment" 
                                      id="comment" 
                                      rows="5" 
                                      class="form-control custom-input" 
                                      placeholder="Did this tip save you money? Was it easy to implement?"></textarea>
                            
                            {{-- Decorative Icon in textarea corner --}}
                            <div class="position-absolute bottom-0 end-0 p-3 pe-4 text-secondary opacity-25" style="pointer-events: none;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="d-grid gap-3">
                            <button type="submit" class="btn-submit w-100">
                                Submit Review
                            </button>
                            
                            <a href="/tips/{{ $tip->id }}" class="text-center text-decoration-none fw-bold text-secondary small py-2">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection