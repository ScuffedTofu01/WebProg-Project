@extends('layouts.app')

@section('custom_styles')
<style>
    /* --- Theme Variables --- */
    :root {
        --color-deep-forest: #052e16;
        --color-emerald-primary: #10b981;
        --color-emerald-light: #d1fae5;
    }

    .font-serif { font-family: 'Playfair Display', serif; }
    .text-justify { text-align: justify; }

    /* --- Hero Section --- */
    .landing-hero {
        background-color: var(--color-deep-forest);
        padding-top: 8rem;
        padding-bottom: 12rem; 
        position: relative;
        overflow: hidden;
    }
    
    /* Background Elements */
    .hero-orb {
        position: absolute; border-radius: 50%;
        filter: blur(80px); pointer-events: none; z-index: 0;
    }
    .orb-1 { top: 0; left: 25%; width: 400px; height: 400px; background: rgba(16, 185, 129, 0.2); transform: translateY(-50%); }
    .orb-2 { bottom: 0; right: 0; width: 500px; height: 500px; background: rgba(13, 148, 136, 0.15); transform: translateY(30%); }
    
    .hero-noise {
        position: absolute; inset: 0;
        background-image: url('https://grainy-gradients.vercel.app/noise.svg');
        opacity: 0.15; pointer-events: none; z-index: 0;
    }

    /* Text Gradient */
    .text-gradient-emerald {
        background: linear-gradient(to right, #a7f3d0, #6ee7b7, #2dd4bf);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* --- Overlap Layout --- */
    .content-overlap {
        margin-top: -8rem;
        position: relative;
        z-index: 10;
    }

    /* --- Glass Cards --- */
    .glass-panel {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 2rem;
        box-shadow: 0 25px 50px -12px rgba(8, 112, 24, 0.1);
    }

    .bento-card {
        border-radius: 1.5rem;
        border: 1px solid #f1f5f9;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        overflow: hidden;
    }
    .bento-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .card-dark {
        background-color: #0f172a;
        color: white; border: none;
        position: relative;
    }
    .card-dark .glow-spot {
        position: absolute; top: 0; right: 0; width: 150px; height: 150px;
        background: #22c55e; filter: blur(60px); opacity: 0.2;
        transition: opacity 0.3s;
    }
    .card-dark:hover .glow-spot { opacity: 0.4; }

    .stat-card-gradient {
        background: linear-gradient(135deg, #059669, #115e59);
        color: white; border-radius: 1rem;
        transition: transform 0.5s ease;
    }

    .stat-card-gradient:hover { 
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .avatar-stack .avatar {
        width: 40px; height: 40px;
        border-radius: 50%;
        border: 2px solid white;
        margin-left: -10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.75rem; font-weight: bold;
    }
    .avatar-stack .avatar:first-child { margin-left: 0; }
</style>
@endsection

@section('content')

<div class="bg-light min-vh-100 font-sans">

    {{-- 
      1. HERO SECTION 
    --}}
    <section class="landing-hero text-white">
        
        {{-- Background Decor --}}
        <div class="hero-orb orb-1"></div>
        <div class="hero-orb orb-2"></div>
        <div class="hero-noise"></div>

        <div class="container position-relative z-1">
            <div class="row">
                <div class="col-lg-8">
                    
                    {{-- Badge --}}
                    <div class="d-inline-flex align-items-center px-3 py-2 rounded-pill mb-4 border border-success border-opacity-25" style="background: rgba(6, 78, 59, 0.5); backdrop-filter: blur(5px);">
                        <span class="bg-success rounded-circle me-2 animate-pulse" style="width: 8px; height: 8px;"></span>
                        <small class="fw-bold text-uppercase text-light tracking-wide" style="font-size: 0.7rem; letter-spacing: 1px;">SDG Goal 07</small>
                    </div>

                    {{-- Headline --}}
                    <h1 class="display-3 font-serif fw-medium mb-4 lh-sm">
                        Energy for <br />
                        <span class="text-gradient-emerald">a Sustainable Future.</span>
                    </h1>

                    <p class="lead text-light opacity-75 fw-light" style="max-width: 600px;">
                        Bridging the gap between human progress and planetary health through affordable, reliable, and modern energy systems.
                    </p>

                </div>
            </div>
        </div>
    </section>

    {{-- 
      2. CONTENT WRAPPER (Overlapping Cards)
    --}}
    <section class="container content-overlap pb-5">
        
        {{-- Intro Card --}}
        <div class="glass-panel p-4 p-md-5 mb-5">
            <div class="row g-5 align-items-center">
                
                {{-- Text Content --}}
                <div class="col-md-7">
                    <h2 class="h2 font-serif text-dark mb-3">What is SDG 7?</h2>
                    <p class="text-secondary lead fs-6 mb-4">
                        It is the global mandate to ensure access to affordable, reliable, sustainable, and modern energy for all. It stands at the center of the challenge to correct climate change.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-bold">Affordability</span>
                        <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-bold">Reliability</span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-bold">Sustainability</span>
                    </div>
                </div>

                {{-- Decorative Statistic --}}
                <div class="col-md-5">
                    <div class="stat-card-gradient p-4 shadow-lg">
                        <div class="display-4 font-serif fw-bold mb-1">733M</div>
                        <p class="text-emerald-light small fw-bold mb-4">People still live without electricity worldwide.</p>
                        
                        {{-- Progress Bar --}}
                        <div class="progress bg-white bg-opacity-25" style="height: 6px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 65%"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Bento Grid Layout --}}
        <div class="row g-4 mb-5">
            
            {{-- Card 1: The Why (Span 8 cols) --}}
            <div class="col-lg-8">
                <div class="card bento-card p-4 h-100 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="h4 font-serif text-dark mb-0">Why Clean Energy?</h3>
                        <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 48px; height: 48px;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        </div>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold text-dark fs-6 mb-2">Planetary Health</h5>
                            <p class="text-muted small">Drastically reduces greenhouse gas emissions, slowing the pace of global warming and preserving biodiversity.</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold text-dark fs-6 mb-2">Economic Growth</h5>
                            <p class="text-muted small">New energy creates jobs in manufacturing and installation while lowering long-term operational costs.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 2: The Obstacles (Span 4 cols - Tall) --}}
            <div class="col-lg-4">
                <div class="card bento-card card-dark p-4 h-100 shadow">
                    <div class="glow-spot"></div>
                    
                    <h3 class="h5 font-serif text-white mb-4 position-relative z-1">The Obstacles</h3>
                    <ul class="list-unstyled text-light opacity-75 small position-relative z-1 vstack gap-3">
                        <li class="d-flex gap-3">
                            <span class="text-danger fw-bold">01.</span>
                            <span>Dependence on legacy fossil fuel infrastructures.</span>
                        </li>
                        <li class="d-flex gap-3">
                            <span class="text-danger fw-bold">02.</span>
                            <span>High initial capital for renewable tech in developing nations.</span>
                        </li>
                        <li class="d-flex gap-3">
                            <span class="text-danger fw-bold">03.</span>
                            <span>Inconsistent policy support and geopolitical barriers.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Card 3: How we help (Full Width) --}}
            <div class="col-12">
                <div class="card bento-card border-success-subtle bg-success-subtle bg-opacity-10 p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="h4 font-serif text-success-emphasis mb-2">Our Digital Contribution</h3>
                            <p class="text-success text-opacity-75 mb-md-0">
                                We curate practical clean energy tips and educational resources to help you transition to a sustainable lifestyle.
                            </p>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end align-items-center gap-3">
                            {{-- Avatar Stack --}}
                            <div class="avatar-stack d-flex">
                                <div class="avatar bg-secondary text-white"></div>
                                <div class="avatar bg-secondary-subtle"></div>
                                <div class="avatar bg-success text-white small">+20</div>
                            </div>
                            <div class="d-flex flex-column lh-1 text-success-emphasis small fw-bold">
                                <span>Tips & Resources</span>
                                <span class="opacity-75">To Learn From</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- CTA SECTION --}}
        <div class="text-center py-5">
            <h2 class="display-5 font-serif text-dark mb-4">
                Change starts with <span class="fst-italic text-success">one switch.</span>
            </h2>
            
            <a href="/tips" class="btn btn-dark btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg d-inline-flex align-items-center hover-lift">
                <span class="me-2">Explore Energy Tips</span>
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>

    </section>
</div>

@endsection