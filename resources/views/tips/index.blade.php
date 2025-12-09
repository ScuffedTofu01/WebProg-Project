@extends('layouts.app')

@section('custom_styles')
<style>
    /* --- Custom Theme Colors --- */
    :root {
        --color-emerald-dark: #022c22;
        --color-emerald-light: #d1fae5;
    }

    /* --- Hero Section Styling --- */
    .hero-section {
        background-color: var(--color-emerald-dark);
        padding-top: 6rem;
        padding-bottom: 8rem;
        border-bottom-left-radius: 3rem;
        border-bottom-right-radius: 3rem;
        position: relative;
        overflow: hidden;
    }

    /* Background Orbs/Glows */
    .hero-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }
    .orb-1 { top: 0; right: 0; width: 600px; height: 600px; background: rgba(13, 148, 136, 0.2); transform: translate(30%, -20%); }
    .orb-2 { bottom: 0; left: 0; width: 400px; height: 400px; background: rgba(5, 150, 105, 0.2); transform: translate(-30%, 30%); }
    .hero-noise {
        position: absolute; inset: 0; 
        background-image: url('https://grainy-gradients.vercel.app/noise.svg');
        opacity: 0.1; mix-blend-mode: soft-light; pointer-events: none;
    }

    /* --- Glass Search Bar --- */
    .search-wrapper { position: relative; max-width: 700px; margin: 0 auto; }
    .search-glow {
        position: absolute; inset: -5px;
        background: linear-gradient(to right, #34d399, #22d3ee);
        filter: blur(15px); opacity: 0.3; border-radius: 50px;
        transition: opacity 0.5s ease;
    }
    .search-wrapper:hover .search-glow { opacity: 0.6; }
    
    .glass-input-container {
        position: relative;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 0.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        display: flex; align-items: center;
    }

    .glass-input {
        background: transparent; border: none; color: white;
        font-size: 1.1rem; width: 100%; padding-left: 1rem;
    }
    .glass-input:focus { outline: none; box-shadow: none; background: transparent; color: white; }
    .glass-input::placeholder { color: rgba(209, 250, 229, 0.6); }

    /* --- Card Hover Effects --- */
    .tip-card {
        border: 1px solid #f1f5f9; border-radius: 1.5rem;
        overflow: hidden; transition: all 0.5s ease;
        background: white; height: 100%; display: flex; flex-direction: column;
    }
    .tip-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .card-img-wrapper { height: 220px; overflow: hidden; position: relative; }
    .card-img-top { width: 100%; height: 100%; object-fit: cover; transition: transform 0.7s ease; }
    .tip-card:hover .card-img-top { transform: scale(1.1); }
    
    .rating-badge {
        position: absolute; top: 1rem; right: 1rem;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(4px);
        padding: 0.25rem 0.75rem; border-radius: 50rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        font-weight: bold; font-size: 0.75rem; color: #1e293b;
        display: flex; align-items: center; gap: 0.25rem;
    }

    /* Text Gradient */
    .text-gradient {
        background: linear-gradient(to right, #a7f3d0, #99f6e4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endsection

@section('content')

<div class="bg-light min-vh-100 font-sans">

    {{-- 
      1. HERO & SEARCH SECTION
    --}}
    <section class="hero-section text-center">
        
        {{-- Background Effects --}}
        <div class="hero-noise"></div>
        <div class="hero-orb orb-1"></div>
        <div class="hero-orb orb-2"></div>

        <div class="container position-relative z-1" style="max-width: 900px;">
            
            {{-- Header Text --}}
            <h1 class="display-4 fw-normal text-white mb-3 font-serif">
                Sustainable <span class="text-gradient fw-bold">Living Tips</span>
            </h1>
            <p class="lead text-light opacity-75 mb-5 mx-auto" style="max-width: 600px; font-weight: 300;">
                Small adjustments in your daily routine can lead to massive global impact. Browse our practical guide to saving energy.
            </p>

            {{-- Styled Search Form --}}
            <form action="{{ url()->current() }}" method="GET" class="search-wrapper group">
                <div class="search-glow"></div>
                
                <div class="glass-input-container">
                    {{-- Search Icon --}}
                    <div class="ps-3 text-info opacity-75">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    
                    {{-- Input --}}
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}"
                           placeholder="How can I save energy today?" 
                           class="form-control glass-input">
                    
                    {{-- Button --}}
                    <button type="submit" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-success shadow-sm">
                        Find Tips
                    </button>
                </div>
            </form>

        </div>
    </section>

    {{-- 
      2. TIPS GRID
    --}}
    <section class="container position-relative z-2 pb-5" style="margin-top: -5rem;">
        
        @if($tips->count() == 0)
            
            {{-- Empty State --}}
            <div class="card border-0 shadow-lg rounded-4 p-5 text-center">
                <div class="card-body">
                    <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-4" style="width: 80px; height: 80px;">
                        <svg class="text-secondary" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    @if(request('q'))
                        <h3 class="h4 font-serif text-dark mb-2">No results found</h3>
                        <p class="text-muted">We couldn't find any tips matching "<span class="fw-bold text-dark">{{ request('q') }}</span>". Try a different keyword.</p>
                    @else
                        <h3 class="h4 font-serif text-dark mb-2">No tips available</h3>
                        <p class="text-muted">Check back soon for new energy saving ideas.</p>
                    @endif
                    <a href="{{ url()->current() }}" class="d-inline-block mt-4 text-decoration-none fw-bold text-success">Clear Search</a>
                </div>
            </div>

        @else

            <div class="row g-4">
                @foreach ($tips as $tip)
                    <div class="col-md-6 col-lg-4">
                        <div class="tip-card h-100">

                            {{-- Image Section --}}
                            <div class="card-img-wrapper">
                                @if($tip->image)
                                    <img src="{{ asset('storage/' . $tip->image) }}" class="card-img-top" alt="{{ $tip->title }}">
                                @else
                                    {{-- Fallback Gradient --}}
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center card-img-top" style="background: linear-gradient(to bottom right, #065f46, #115e59);">
                                        <svg class="text-white opacity-25" width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    </div>
                                @endif

                                {{-- Rating Badge --}}
                                @php $avg = $tip->averageRating() ?? 0; @endphp
                                <div class="rating-badge">
                                    <svg class="text-warning" width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <span>{{ number_format($avg, 1) }}</span>
                                </div>
                            </div>

                            {{-- Content Section --}}
                            <div class="card-body p-4 d-flex flex-column">
                                <h3 class="h4 font-serif fw-bold text-dark mb-2">
                                    <a href="/tips/{{ $tip->id }}" class="text-decoration-none text-dark hover-success">
                                        {{ $tip->title }}
                                    </a>
                                </h3>

                                <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ Str::limit($tip->description, 120) }}
                                </p>

                                <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                                    <span class="small fw-bold text-uppercase text-secondary tracking-wide" style="letter-spacing: 1px;">Actionable Tip</span>
                                    
                                    <a href="/tips/{{ $tip->id }}" class="text-decoration-none small fw-bold text-success d-inline-flex align-items-center">
                                        View Details
                                        <svg class="ms-1" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        @endif
    </section>

</div>

@endsection