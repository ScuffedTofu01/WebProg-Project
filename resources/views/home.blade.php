@extends('layouts.app')

@section('custom_styles')
{{-- Load Serif Font --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">

<style>
    /* Custom Theme Overrides to maintain the "Nature" look in Bootstrap */
    :root {
        --color-emerald-900: #064e3b;
        --color-emerald-100: #d1fae5;
        --color-deep-forest: #052e16;
    }

    .font-serif { font-family: 'Playfair Display', serif; }
    
    /* Hero Helpers */
    .hero-section { position: relative; height: 85vh; overflow: hidden; }
    .video-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; filter: brightness(0.75); }
    .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(5, 46, 22, 0.9), rgba(5, 46, 22, 0.4), transparent); z-index: 1; }
    .hero-content { position: relative; z-index: 2; }
    
    /* Glassmorphism for Bootstrap */
    .glass-badge { background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); color: var(--color-emerald-100); }
    .glass-card { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 1.5rem; transition: transform 0.3s ease; }
    .glass-card:hover { background: rgba(255, 255, 255, 0.1); transform: translateY(-5px); }
    
    /* Text Gradients */
    .text-gradient { background: linear-gradient(to right, #a7f3d0, #99f6e4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    
    /* Card Hover Effects */
    .card-hover-zoom { overflow: hidden; border-radius: 1rem; border: none; }
    .card-hover-zoom img { transition: transform 0.5s ease; }
    .card-hover-zoom:hover img { transform: scale(1.1); }
    .card-overlay { background: rgba(5, 46, 22, 0.85); opacity: 0; transition: opacity 0.3s ease; }
    .card-hover-zoom:hover .card-overlay { opacity: 1; }
    
    /* Custom Scroll Down */
    .scroll-down { position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); z-index: 10; animation: bounce 2s infinite; color: rgba(255,255,255,0.5); }
    @keyframes bounce { 0%, 20%, 50%, 80%, 100% {transform: translateX(-50%) translateY(0);} 40% {transform: translateX(-50%) translateY(-10px);} 60% {transform: translateX(-50%) translateY(-5px);} }
</style>
@endsection

@section('content')

<section class="hero-section d-flex align-items-center text-white">
    
    {{-- 1. Video Background --}}
    <video autoplay loop muted playsinline class="video-bg">
        <source src="{{ asset('videos/0_Climate_Change_Global_Warming_1920x1080.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>

    {{-- 3. Content --}}
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-6 text-start">
                
                {{-- Badge --}}
                <div class="glass-badge d-inline-flex align-items-center px-3 py-2 rounded-pill mb-4">
                    <span class="bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></span>
                    <small class="fw-bold text-uppercase tracking-wide">SDG Goal 07</small>
                </div>

                {{-- Headline --}}
                <h1 class="display-3 font-serif fw-normal mb-4">
                    Affordable & <br/>
                    <span class="text-gradient fw-bold">Clean Energy</span>
                </h1>

                <p class="lead text-light opacity-75 mb-5 fw-light">
                    Powering the future without harming the planet. Learn how small daily actions lead to massive energy savings.
                </p>

                {{-- Buttons --}}
                <div class="d-flex gap-3">
                    <a href="/tips" class="btn btn-light rounded-pill px-4 py-3 fw-bold text-success shadow-lg">
                        Start Saving Energy 
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="#impact" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold">
                        Learn More
                    </a>
                </div>

            </div>
            <div class="col-lg-6 d-none d-lg-block"></div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-down">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
        </svg>
    </div>
</section>


<section class="py-5 bg-white" id="impact">
    <div class="container py-4">
        
        {{-- Header --}}
        <div class="text-center mb-5">
            <span class="text-success fw-bold text-uppercase small">Our Impact</span>
            <h2 class="display-6 fw-bold text-dark mt-2">Why Clean Energy Matters</h2>
            <p class="text-muted">Discover the benefits of switching to renewable sources</p>
        </div>

        {{-- Grid --}}
        <div class="row g-4">
            
            {{-- Card 1 --}}
            <div class="col-md-4">
                <div class="card card-hover-zoom text-white h-100 shadow-sm">
                    <img src="{{ asset('images/back-view-man-holding-his-mask-up.jpg') }}" class="card-img h-100 object-fit-cover" alt="Reduce Emissions" style="height: 400px; object-fit: cover;">
                    <div class="card-img-overlay card-overlay d-flex flex-column justify-content-end p-4">
                        <h3 class="h4 fw-bold text-uppercase mb-3">Reduce Emissions</h3>
                        <p class="small text-light mb-3">Clean energy reduces greenhouse gases and helps fight climate change effectively.</p>
                        <a href="{{ url('/resources') }}" class="btn btn-sm btn-outline-light rounded-pill align-self-start">Learn More</a>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-md-4">
                <div class="card card-hover-zoom text-white h-100 shadow-sm">
                    <img src="{{ asset('images/close-up-education-economy-objects.jpg') }}" class="card-img h-100 object-fit-cover" alt="Save Money" style="height: 400px; object-fit: cover;">
                    <div class="card-img-overlay card-overlay d-flex flex-column justify-content-end p-4">
                        <h3 class="h4 fw-bold text-uppercase mb-3">Save Money</h3>
                        <p class="small text-light mb-3">Energy-efficient habits and technologies reduce your electricity bill significantly.</p>
                        <a href="{{ url('/resources') }}" class="btn btn-sm btn-outline-light rounded-pill align-self-start">Learn More</a>
                    </div>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-md-4">
                <div class="card card-hover-zoom text-white h-100 shadow-sm">
                    <img src="{{ asset('images/tea-leaf-field.jpg') }}" class="card-img h-100 object-fit-cover" alt="Sustainable Future" style="height: 400px; object-fit: cover;">
                    <div class="card-img-overlay card-overlay d-flex flex-column justify-content-end p-4">
                        <h3 class="h4 fw-bold text-uppercase mb-3">Sustainable Future</h3>
                        <p class="small text-light mb-3">Renewables support long-term sustainability and a healthier planet.</p>
                        <a href="{{ url('/resources') }}" class="btn btn-sm btn-outline-light rounded-pill align-self-start">Learn More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- 
    MILESTONES / ACHIEVEMENTS SECTION
--}}
<section class="py-5 position-relative overflow-hidden" style="background-color: var(--color-deep-forest);">
    <div style="position: absolute; inset: 0; background-image: url('https://grainy-gradients.vercel.app/noise.svg'); opacity: 0.05; pointer-events: none;"></div>

    <div class="container position-relative z-1 py-4">
        
        {{-- Header --}}
        <div class="text-center mb-5">
            <div class="glass-badge d-inline-flex align-items-center px-3 py-2 rounded-pill mb-3">
                <span class="bg-success rounded-circle me-2 animate-pulse" style="width: 8px; height: 8px;"></span>
                <small class="fw-bold text-uppercase">Celebrating Progress</small>
            </div>
            <h2 class="display-4 font-serif text-white mb-3">
                Milestones in the <br> <span class="text-gradient">Green Transition</span>
            </h2>
            <p class="text-light opacity-75 lead mx-auto" style="max-width: 700px;">
                Significant strides have been made recently. Here are the wins we have achieved together globally.
            </p>
        </div>

        {{-- Stats Grid --}}
        <div class="row g-4">

            {{-- Stat 1 --}}
            <div class="col-md-4">
                <div class="glass-card p-4 h-100 text-center text-md-start">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-25 rounded-3 p-3 mb-4 text-success">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="display-4 font-serif text-white mb-2">92%</h3>
                    <p class="fw-bold text-light text-uppercase small mb-3">Global Electricity Access</p>
                    <hr class="border-light opacity-25">
                    <p class="text-white-50 small mb-0">Up from 87% in 2015. This means <strong class="text-white">18.8 million fewer people</strong> were left in the dark.</p>
                </div>
            </div>

            {{-- Stat 2 --}}
            <div class="col-md-4">
                <div class="glass-card p-4 h-100 text-center text-md-start">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-25 rounded-3 p-3 mb-4 text-success">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <h3 class="display-4 font-serif text-white mb-2">27%</h3>
                    <p class="fw-bold text-light text-uppercase small mb-3">Increase in Funding</p>
                    <hr class="border-light opacity-25">
                    <p class="text-white-50 small mb-0">International public financial flows supporting clean energy rose to <strong class="text-white">$21.6 billion</strong> in 2023.</p>
                </div>
            </div>

            {{-- Stat 3 --}}
            <div class="col-md-4">
                <div class="glass-card p-4 h-100 text-center text-md-start">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-25 rounded-3 p-3 mb-4 text-success">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="display-4 font-serif text-white mb-2">478W</h3>
                    <p class="fw-bold text-light text-uppercase small mb-3">Capacity Per Capita</p>
                    <hr class="border-light opacity-25">
                    <p class="text-white-50 small mb-0">A new record for renewable energy capacity per person, jumping <strong class="text-white">13%</strong> in a single year.</p>
                </div>
            </div>

        </div>

        {{-- Success Story (Full Width) --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="glass-card p-5 text-center position-relative overflow-hidden">
                    <div style="position: absolute; top: 0; right: 0; width: 300px; height: 300px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; filter: blur(80px);"></div>
                    
                    <h3 class="h2 font-serif text-white mb-3 position-relative z-1">Universal Success Stories</h3>
                    <p class="lead text-light opacity-75 mb-4 position-relative z-1">
                        Between 2010 and 2023, <strong class="text-white">45 countries</strong> successfully achieved universal access to electricity.
                    </p>
                    <a href="https://sdgs.un.org/goals/goal7#progress_and_info" target="_blank" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-success position-relative z-1 shadow-sm">
                        Fact Check: Target 7.1
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- 
    SEARCH SECTION 
--}}
<section class="py-5 bg-white border-top">
    <div class="container text-center py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="fw-bold text-dark mb-2">Find Your Next <span class="text-success">Green Habit</span></h3>
                <p class="text-muted mb-4">Browse our database for tips on solar, wind, and daily savings.</p>
                
                {{-- Search Component Wrapper --}}
                <div class="d-flex justify-content-center">
                    @include('components.searchbar')
                </div>
            </div>
        </div>
    </div>
</section>

@endsection