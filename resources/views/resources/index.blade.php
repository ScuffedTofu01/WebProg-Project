@extends('layouts.app')

@section('content')

    {{-- 1.Header--}}
    <section class="bg-green-700 text-white py-16 relative overflow-hidden">
        {{-- Background Pattern (Optional Aesthetic Touch) --}}
        <div class="absolute inset-0 opacity-10" 
             style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
        </div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">
                Knowledge Hub
            </h1>
            <p class="text-lg text-green-100 mb-8 max-w-2xl mx-auto">
                Explore our curated library of articles, videos, and interactive tools designed to help you understand the clean energy transition.
            </p>

            {{-- Search Bar --}}
            <div class="relative max-w-2xl mx-auto mt-8 group">
                <div class="absolute -inset-1 bg-gradient-to-r from-green-300 to-teal-300 rounded-full blur opacity-20 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative flex items-center bg-white rounded-full shadow-2xl">
                    <div class="pl-6 text-gray-400 group-focus-within:text-green-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    {{-- Input Field --}}
                    <input type="text" 
                           id="searchInput" 
                           placeholder="Search resources..." 
                           class="w-full py-4 px-4 bg-transparent border-none text-gray-800 placeholder-gray-400 focus:ring-0 focus:outline-none font-medium text-lg"
                    >
                    <div class="pr-2">
                        <button class="bg-green-600 text-white px-6 py-2.5 rounded-full font-bold shadow-md hover:bg-green-700 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            Search
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    {{-- 2. Filter Buttons --}}
    <section class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex flex-wrap justify-center gap-3" id="filterContainer">
            <button class="filter-btn active px-5 py-2 rounded-full text-sm font-bold bg-green-600 text-white shadow-sm hover:shadow-md transition" data-filter="all">
                All Resources
            </button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-bold bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition" data-filter="article">
                Articles
            </button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-bold bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition" data-filter="video">
                Videos
            </button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-bold bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 transition" data-filter="tool">
                Tools
            </button>
        </div>
    </section>

    {{-- 3. Resources Grid --}}
    <section class="max-w-6xl mx-auto px-6 pb-20">

        @if($resources->count() === 0)
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">No resources found</h3>
                <p class="text-gray-500">Check back later for new content.</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="resourcesGrid">

                               @foreach($resources as $resource)
                    <div
                        class="resource-card group bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col h-full overflow-hidden"
                        data-type="{{ $resource->type }}"
                        data-title="{{ strtolower($resource->title) }}"
                    >

                        <div
                            class="h-2 w-full {{ $resource->type == 'video' ? 'bg-red-500' : ($resource->type == 'tool' ? 'bg-blue-500' : 'bg-green-500') }}">
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <div class="mb-3">
                                <span
                                    class="px-3 py-1 text-xs font-bold uppercase tracking-wide rounded-full {{ $resource->type == 'video' ? 'bg-red-50 text-red-600' : ($resource->type == 'tool' ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600') }}">
                                    {{ $resource->type }}
                                </span>
                            </div>

                            <div class="flex justify-between items-start gap-4 mb-3">
                                <h2 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-green-600 transition-colors flex-1">
                                    {{ $resource->title }}
                                </h2>

                                <div class="text-2xl shrink-0 -mt-1.5">
                                    @if($resource->type == 'video')
                                        <i class="bi bi-play-circle-fill text-red-500"></i>
                                    @elseif($resource->type == 'tool')
                                        <i class="bi bi-calculator-fill text-blue-500"></i>
                                    @else
                                        <i class="bi bi-file-text-fill text-green-500"></i>
                                    @endif
                                </div>
                            </div>


                            <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-1">
                                {{ Str::limit($resource->description, 120) }}
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ $resource->url }}" target="_blank"
                                   class="flex items-center text-sm font-bold text-green-600 hover:text-green-800 transition">
                                    Access Resource
                                    <i class="bi bi-arrow-right-short text-xl ml-1 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        @endif
    </section>

    {{-- Filtering --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.resource-card');

            let currentFilter = 'all';

            function filterResources() {
                const searchTerm = searchInput.value.toLowerCase();

                cards.forEach(card => {
                    const type = card.getAttribute('data-type');
                    const title = card.getAttribute('data-title');
                    
                    const matchesFilter = (currentFilter === 'all') || (type === currentFilter);
                    const matchesSearch = title.includes(searchTerm);

                    if (matchesFilter && matchesSearch) {
                        card.style.display = 'flex'; 
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Event Listeners for Buttons
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-green-600', 'text-white');
                        b.classList.add('bg-white', 'text-gray-600');
                    });
                    btn.classList.remove('bg-white', 'text-gray-600');
                    btn.classList.add('bg-green-600', 'text-white');
                    currentFilter = btn.getAttribute('data-filter');
                    filterResources();
                });
            });

            searchInput.addEventListener('keyup', filterResources);
        });
    </script>

@endsection