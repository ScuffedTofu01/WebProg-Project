@extends('layouts.app')

@section('custom_styles')
<style>
    /* --- Theme Variables --- */
    :root {
        --color-emerald-dark: #022c22;
        --color-emerald-primary: #10b981;
        --color-emerald-light: #d1fae5;
    }

    /* --- Hero Section --- */
    .tip-hero-section {
        background-color: var(--color-emerald-dark);
        padding-top: 8rem; 
        padding-bottom: 12rem; 
        position: relative;
        overflow: hidden;
    }

    /* Background Effects */
    .hero-glow {
        position: absolute; width: 600px; height: 600px;
        background: rgba(13, 148, 136, 0.15);
        filter: blur(100px); border-radius: 50%;
        top: -100px; right: -100px; pointer-events: none;
    }

    /* Glass Buttons/Badges */
    .glass-btn {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ecfdf5; transition: all 0.3s ease;
    }
    .glass-btn:hover { background: rgba(255, 255, 255, 0.2); color: white; }

    /* --- Layout Overlap --- */
    .content-overlap {
        margin-top: -8rem;
        position: relative;
        z-index: 10;
    }

    /* --- Cards --- */
    .content-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    /* --- Typography & readability --- */
    .prose-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #475569;
    }
    .font-serif { font-family: 'Playfair Display', serif; }

    /* --- Sidebar Widgets --- */
    .impact-card {
        background-color: #0f172a; 
        color: white; border-radius: 1.5rem;
        position: relative; overflow: hidden;
    }
    .impact-glow {
        position: absolute; top: 0; right: 0;
        width: 150px; height: 150px;
        background: var(--color-emerald-primary);
        filter: blur(60px); opacity: 0.2;
    }

    .avatar-placeholder {
        width: 40px; height: 40px;
        background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: bold; color: #64748b; font-size: 0.75rem;
    }
</style>
@endsection

@section('content')

<div class="bg-light min-vh-100 font-sans">


    <section class="tip-hero-section">
        {{-- Background Noise & Glow --}}
        <div style="position: absolute; inset: 0; background-image: url('https://grainy-gradients.vercel.app/noise.svg'); opacity: 0.05; pointer-events: none;"></div>
        <div class="hero-glow"></div>

        <div class="container position-relative z-1">
            
            {{-- Breadcrumb --}}
            <a href="/tips" class="glass-btn d-inline-flex align-items-center rounded-pill px-3 py-2 mb-5 text-decoration-none small fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Back to Tips
            </a>

            <div class="col-lg-10">
                <h1 class="display-4 text-white font-serif mb-4 fw-medium">
                    {{ $tip->title }}
                </h1>

                {{-- Quick Meta --}}
                <div class="d-flex align-items-center gap-4 text-emerald-light small text-uppercase fw-bold tracking-wide" style="letter-spacing: 1px; color: #a7f3d0;">
                    <span class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2"></i> Actionable Tip
                    </span>
                    <span class="d-flex align-items-center">
                        <span class="bg-success rounded-circle me-2" style="width: 6px; height: 6px;"></span>
                        Clean Energy
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- 
      2. MAIN CONTENT OVERLAP
    --}}
    <div class="container content-overlap pb-5">
        <div class="row g-5">

            {{-- LEFT COLUMN: CONTENT (Span 8) --}}
            <div class="col-lg-8">
                
                {{-- Main Card --}}
                <div class="card content-card mb-5">
                    <div class="card-body p-4 p-md-5">
                        
                        {{-- Featured Image --}}
                        @if($tip->image)
                            <div class="rounded-4 overflow-hidden mb-5 shadow-sm">
                                <img src="{{ asset('storage/' . $tip->image) }}" alt="{{ $tip->title }}" class="img-fluid w-100 object-fit-cover" style="transition: transform 0.5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            </div>
                        @endif

                        {{-- Description --}}
                        <h2 class="h3 font-serif text-dark mb-4">Overview</h2>
                        <div class="prose-text mb-5">
                            {!! nl2br(e($tip->description)) !!}
                        </div>

                        {{-- Benefits Section --}}
                        @if(!empty($tip->benefits))
                            <h2 class="h3 font-serif text-dark mb-4">Key Benefits</h2>
                            
                            @php
                                $benefitsLines = preg_split("/\\r\\n|\\r|\\n/", $tip->benefits);
                            @endphp

                            <div class="d-flex flex-column gap-3">
                                @foreach($benefitsLines as $line)
                                    @if(trim($line) !== '')
                                        <div class="d-flex align-items-start p-3 rounded-3 border border-success-subtle bg-success-subtle bg-opacity-10">
                                            <div class="flex-shrink-0 bg-success bg-opacity-25 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; margin-top: 2px;">
                                                <i class="bi bi-check-lg" style="font-size: 14px;"></i>
                                            </div>
                                            <span class="ms-3 text-dark fw-medium">{{ $line }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>

                {{-- Feedback Section --}}
                <div class="card content-card" id="reviews">
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
                            <h2 class="h3 font-serif text-dark mb-0">Community Insights</h2>
                            
                            {{-- Sort Dropdown --}}
                            <form class="position-relative">
                                <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm rounded-pill fw-bold border-secondary-subtle bg-light" style="min-width: 140px;">
                                    <option value="newest" {{ request('sort')=='newest'?'selected':'' }}>Newest</option>
                                    <option value="oldest" {{ request('sort')=='oldest'?'selected':'' }}>Oldest</option>
                                    <option value="highest" {{ request('sort')=='highest'?'selected':'' }}>Highest Rated</option>
                                    <option value="lowest" {{ request('sort')=='lowest'?'selected':'' }}>Lowest Rated</option>
                                </select>
                            </form>
                        </div>

                        @if($feedback->count() > 0)
                            <div class="vstack gap-4">
                                @foreach($feedback as $fb)
                                    <div class="d-flex gap-3 pb-4 border-bottom last-no-border">
                                        {{-- Avatar --}}
                                        <div class="avatar-placeholder flex-shrink-0">
                                            User
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <h5 class="h6 fw-bold text-dark mb-0">Community Member</h5>
                                                <small class="text-muted">{{ $fb->created_at->diffForHumans() }}</small>
                                            </div>

                                            <div class="text-warning mb-2" style="font-size: 0.8rem;">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="bi {{ $i <= $fb->rating ? 'bi-star-fill' : 'bi-star text-light-emphasis' }}"></i>
                                                @endfor
                                            </div>

                                            @if($fb->comment)
                                                <p class="text-secondary small mb-0">{{ $fb->comment }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-4">
                                {{ $feedback->links() }} 
                                {{-- Note: Ensure you use Bootstrap pagination views in Laravel --}}
                            </div>
                        @else
                            <div class="text-center py-5 bg-light rounded-4 border border-dashed">
                                <p class="text-muted mb-3">No reviews yet. Have you tried this tip?</p>
                                <a href="/feedback/{{ $tip->id }}" class="fw-bold text-success text-decoration-none">Write the first review</a>
                            </div>
                        @endif

                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN: SIDEBAR (Span 4) --}}
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 2rem;">
                    
                    {{-- 1. Impact Card --}}
                    @if(!empty($tip->energy_saving))
                        <div class="card impact-card mb-4 border-0 shadow-lg">
                            <div class="impact-glow"></div>
                            <div class="card-body p-4 position-relative z-1">
                                <div class="d-flex align-items-center text-success mb-2">
                                    <i class="bi bi-lightning-charge-fill me-2"></i>
                                    <span class="small fw-bold text-uppercase tracking-wide">Potential Impact</span>
                                </div>
                                <h3 class="h2 font-serif fw-normal mb-0">{{ $tip->energy_saving }}</h3>
                            </div>
                        </div>
                    @endif

                    {{-- 2. Rating & Action Card --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 text-center">
                            
                            <div class="mb-4">
                                <span class="d-block text-uppercase text-muted fw-bold small mb-2" style="letter-spacing: 1px;">Average Rating</span>
                                @if($average)
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span class="display-4 font-serif fw-bold text-dark">{{ number_format($average, 1) }}</span>
                                        <div class="text-warning fs-5">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                    <small class="text-muted">{{ $feedback->count() }} Reviews</small>
                                @else
                                    <span class="h4 font-serif text-muted">No Ratings</span>
                                @endif
                            </div>

                            <div class="d-grid gap-3">
                                <a href="/feedback/{{ $tip->id }}" class="btn btn-success btn-lg rounded-pill fw-bold shadow-sm">
                                    Rate This Tip
                                </a>
                                <a href="/resources" class="btn btn-light btn-lg rounded-pill fw-bold border">
                                    Learn More
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- 3. Share --}}
                    <div class="card border-success-subtle bg-success-subtle bg-opacity-25 rounded-4">
                        <div class="card-body p-4">
                            <h5 class="font-serif text-dark mb-2">Spread the word</h5>
                            <p class="small text-secondary mb-3">Sharing knowledge is the first step towards a sustainable planet.</p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-circle shadow-sm text-success" style="width: 40px; height: 40px;"><i class="bi bi-twitter"></i></button>
                                <button class="btn btn-light rounded-circle shadow-sm text-success" style="width: 40px; height: 40px;"><i class="bi bi-facebook"></i></button>
                                <button class="btn btn-light rounded-circle shadow-sm text-success" style="width: 40px; height: 40px;"><i class="bi bi-linkedin"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection