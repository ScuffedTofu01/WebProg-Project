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
    .resource-hero {
        background-color: var(--color-emerald-dark);
        padding-top: 6rem;
        padding-bottom: 6rem;
        position: relative;
        overflow: hidden;
    }
    .hero-orb {
        position: absolute; top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 800px; height: 800px;
        background: rgba(16, 185, 129, 0.15);
        border-radius: 50%; filter: blur(100px);
        pointer-events: none; z-index: 0;
    }
    .hero-noise {
        position: absolute; inset: 0;
        background-image: url('https://grainy-gradients.vercel.app/noise.svg');
        opacity: 0.1; pointer-events: none; z-index: 0;
    }

    /* --- Glass Search Bar --- */
    .search-container { position: relative; max-width: 650px; margin: 0 auto; z-index: 2; }
    .search-glow {
        position: absolute; inset: -3px;
        background: linear-gradient(to right, #10b981, #34d399, #2dd4bf);
        filter: blur(15px); opacity: 0.3; border-radius: 50rem;
        transition: opacity 0.5s ease;
    }
    .search-container:hover .search-glow { opacity: 0.6; }
    
    .glass-bar {
        position: relative;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50rem;
        padding: 0.5rem;
        display: flex; align-items: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .glass-input {
        background: transparent; border: none; color: white;
        font-size: 1.1rem; width: 100%; padding-left: 1rem;
        font-weight: 500;
    }
    .glass-input:focus { outline: none; background: transparent; color: white; box-shadow: none; }
    .glass-input::placeholder { color: rgba(209, 250, 229, 0.5); }

    /* --- Floating Filter Dock --- */
    .filter-dock {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid #e2e8f0;
        border-radius: 50rem;
        padding: 0.5rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        display: inline-flex; gap: 0.25rem; flex-wrap: wrap; justify-content: center;
    }
    .filter-btn {
        border-radius: 50rem; padding: 0.5rem 1.5rem;
        font-size: 0.875rem; font-weight: 700; border: none;
        transition: all 0.3s ease;
    }
    .filter-btn.active { background-color: #0f172a; color: white; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    .filter-btn.inactive { background-color: transparent; color: #64748b; }
    .filter-btn.inactive:hover { background-color: #f1f5f9; color: #0f172a; }

    /* --- Resource Cards & GLOW EFFECTS --- */
   .resource-card {
        position: relative; 
        background: white; 
        border: 1px solid #e2e8f0;
        border-radius: 1.5rem; 
        padding: 2rem;
        height: 100%; 
        display: flex; 
        flex-direction: column;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease, border-color 0.4s ease;
        will-change: transform; 
        z-index: 1;
    }
    
    /* 1. Card Hover Movement */
    .resource-card:hover {
        transform: translateY(-8px);
        border-color: var(--color-emerald-primary);
        box-shadow: 0 20px 40px -10px rgba(16, 185, 129, 0.15); 
    }

    /* 2. Title Glow Effect */
    .resource-title {
        color: #212529; 
        transition: all 0.3s ease;
    }
    .resource-card:hover .resource-title {
        color: var(--color-emerald-primary);
        text-shadow: 0 0 20px rgba(16, 185, 129, 0.4); 
    }

    /* 3. Arrow Button Glow Effect */
    .arrow-btn {
        width: 45px; height: 45px;
        background-color: #f8f9fa; 
        color: #212529;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }
    .resource-card:hover .arrow-btn {
        background-color: var(--color-emerald-primary);
        color: white;
        border-color: var(--color-emerald-primary);
        transform: scale(1.1) rotate(-45deg); 
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.6);
    }
    
    /* Type Badges */
    .badge-type { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.25rem 0.75rem; border-radius: 50rem; border: 1px solid transparent; }
    .badge-video { background-color: #fff1f2; color: #e11d48; border-color: #ffe4e6; }
    .badge-tool { background-color: #eef2ff; color: #4f46e5; border-color: #e0e7ff; }
    .badge-article { background-color: #ecfdf5; color: #047857; border-color: #d1fae5; }
</style>
@endsection

@section('content')

<div class="bg-light min-vh-100 font-sans">

    {{-- HERO SECTION --}}
    <section class="resource-hero text-center">
        <div class="hero-orb"></div>
        <div class="hero-noise"></div>

        <div class="container position-relative z-1" style="max-width: 900px;">
            <h1 class="display-3 font-serif text-white mb-3">
                Knowledge <span class="fst-italic text-success">Hub</span>
            </h1>
            <p class="lead text-white opacity-75 mb-5 mx-auto" style="max-width: 650px; font-weight: 300;">
                Explore our curated library of insights, visual guides, and interactive tools.
            </p>

            {{-- SEARCH BAR --}}
            <div class="search-container group">
                <div class="search-glow"></div>
                <div class="glass-bar">
                    <div class="ps-3 text-white opacity-50">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" id="searchInput" placeholder="Search resources..." class="glass-input">
                    <button class="btn btn-success rounded-pill px-4 py-2 fw-bold shadow-sm" style="background-color: #10b981; border: none;">Search</button>
                </div>
            </div>
        </div>
    </section>

    {{-- FILTER SECTION --}}
    <section class="sticky-top" style="top: 1rem; z-index: 1020; margin-top: -2rem; pointer-events: none;">
        <div class="container text-center" style="pointer-events: auto;">
            <div class="filter-dock" id="filterContainer">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn inactive" data-filter="article">Articles</button>
                <button class="filter-btn inactive" data-filter="video">Videos</button>
                <button class="filter-btn inactive" data-filter="tool">Tools</button>
            </div>
        </div>
    </section>

    {{-- RESOURCES GRID --}}
    <section class="container py-5 min-vh-50">
        @if($resources->count() === 0)
            <div class="d-flex flex-col align-items-center justify-content-center py-5 text-center opacity-50">
                <h3 class="h4 font-serif text-dark">Library Empty</h3>
            </div>
        @else
            <div class="row g-4" id="resourcesGrid">
                @foreach($resources as $resource)
                    <div class="col-md-6 col-lg-4 resource-item" 
                         data-type="{{ $resource->type }}" 
                         data-title="{{ strtolower($resource->title) }}">
                        
                        {{-- CARD START --}}
                        <div class="resource-card group">
                            
                            {{-- Top Meta --}}
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <span class="badge-type {{ $resource->type == 'video' ? 'badge-video' : ($resource->type == 'tool' ? 'badge-tool' : 'badge-article') }}">
                                    {{ $resource->type }}
                                </span>
                                <div class="text-secondary opacity-50">
                                    <i class="bi bi-bookmark"></i>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="flex-grow-1">
                                <h2 class="h4 font-serif fw-bold mb-2">
                                    <a href="{{ $resource->url }}" target="_blank" class="text-decoration-none resource-title stretched-link">
                                        {{ $resource->title }}
                                    </a>
                                </h2>
                                <p class="text-muted small lh-lg mb-4">
                                    {{ Str::limit($resource->description, 120) }}
                                </p>
                            </div>

                            {{-- Footer Action --}}
                            <div class="mt-auto pt-4 border-top d-flex justify-content-between align-items-center">
                                <span class="text-muted small fw-bold" style="font-size: 0.75rem;">READ MORE</span>
                                
                                <span class="arrow-btn rounded-circle d-flex align-items-center justify-content-center">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.resource-item'); 

        let currentFilter = 'all';

        function filterResources() {
            const searchTerm = searchInput.value.toLowerCase();
            items.forEach(item => {
                const type = item.getAttribute('data-type');
                const title = item.getAttribute('data-title');
                const matchesFilter = (currentFilter === 'all') || (type === currentFilter);
                const matchesSearch = title.includes(searchTerm);

                if (matchesFilter && matchesSearch) {
                    item.style.display = 'block';
                    item.style.opacity = '0';
                    setTimeout(() => item.style.opacity = '1', 50);
                } else {
                    item.style.display = 'none';
                }
            });
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => { b.classList.remove('active'); b.classList.add('inactive'); });
                btn.classList.remove('inactive'); btn.classList.add('active');
                currentFilter = btn.getAttribute('data-filter');
                filterResources();
            });
        });

        searchInput.addEventListener('keyup', filterResources);
    });
</script>

@endsection