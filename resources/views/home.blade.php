@extends('layouts.app')

@section('content')

{{-- Hero Section with Video Background --}}
<section class="relative h-[75vh] flex items-center text-white overflow-hidden">

    {{-- 1. The Background Video --}}
    <video autoplay loop muted playsinline class="absolute z-0 w-auto min-w-full min-h-full max-w-none object-cover">
        <source src={{asset("videos/0_Climate_Change_Global_Warming_1920x1080.mp4")}}
        type="video/mp4">
        Your browser does not support the video tag.
    </video>

    {{-- 2. The Dark Overlay --}}
    <div class="absolute z-10 inset-0 bg-black opacity-10"></div>


    {{-- 3. The Content (Left Aligned) --}}
    <div class="relative z-20 max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="text-left">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight shadow-sm">
                    SDG 7: Affordable & Clean Energy
                </h2>
                <p class="text-lg md:text-xl mb-8 text-gray-100 max-w-xl">
                    Learn how small daily actions can contribute to big energy savings.
                    Explore practical clean energy tips that help protect our planet.
                </p>

                <div>
                    <a href="/tips"
                       class="inline-block px-8 py-4 bg-green-600 text-white font-bold rounded-lg shadow-lg hover:bg-green-700 hover:-translate-y-1 transition-all duration-300">
                        Explore Tips
                    </a>
                </div>
            </div>

            <div class="hidden lg:block"></div>
        </div>
    </div>
</section>


{{-- SDG 7 Overview Cards --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-3 text-gray-900">Why Clean Energy Matters</h2>
            <p class="text-gray-500">Discover the benefits of switching to renewable sources</p>
        </div>

        {{-- Grid --}}
<div class="grid md:grid-cols-3 gap-8">
            
    {{-- Card 1: Reduce Emissions --}}
    <div class="relative h-96 rounded-2xl overflow-hidden shadow-lg group cursor-pointer">
        
        {{-- 1. Background Image (Zooms on hover) --}}
        <img src={{asset('images\back-view-man-holding-his-mask-up.jpg')}}
             alt="Reduce Emissions" 
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        
        {{-- 2. Dark Overlay (Initially invisible, fades in on hover) --}}
        <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>

        {{-- 3. Content Container (Anchored to bottom) --}}
        <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
            
            {{-- Title (Always visible, moves up slightly on hover) --}}
            <h3 class="text-xl font-bold uppercase tracking-wide drop-shadow-md group-hover:drop-shadow-none transition-all">
                Reduce Emissions
            </h3>

            {{-- Hidden Content (Expands upwards on hover) --}}
            <div class="overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out group-hover:max-h-40 group-hover:opacity-100">
                <p class="text-sm text-gray-200 mt-3 mb-4">
                    Clean energy reduces greenhouse gases and helps fight climate change effectively.
                </p>
                <a href="#" class="inline-block px-4 py-2 border border-white rounded-full text-sm font-semibold hover:bg-white hover:text-black transition">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    {{-- Card 2: Save Money --}}
    <div class="relative h-96 rounded-2xl overflow-hidden shadow-lg group cursor-pointer">
        <img src= {{ asset('images\close-up-education-economy-objects.jpg')}}
             alt="Save Money" 
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        
        <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>

        <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
            <h3 class="text-xl font-bold uppercase tracking-wide drop-shadow-md group-hover:drop-shadow-none transition-all">
                Save Money
            </h3>
            <div class="overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out group-hover:max-h-40 group-hover:opacity-100">
                <p class="text-sm text-gray-200 mt-3 mb-4">
                    Energy-efficient habits and technologies reduce your electricity bill significantly over time.
                </p>
                <a href="#" class="inline-block px-4 py-2 border border-white rounded-full text-sm font-semibold hover:bg-white hover:text-black transition">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    {{-- Card 3: Sustainable Future --}}
    <div class="relative h-96 rounded-2xl overflow-hidden shadow-lg group cursor-pointer">
        <img src="{{ asset('images/tea-leaf-field.jpg') }}" 
             alt="Sustainable Future" 
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        
        <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>

        <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
            <h3 class="text-xl font-bold uppercase tracking-wide drop-shadow-md group-hover:drop-shadow-none transition-all">
                Sustainable Future
            </h3>
            <div class="overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out group-hover:max-h-40 group-hover:opacity-100">
                <p class="text-sm text-gray-200 mt-3 mb-4">
                    Clean energy supports long-term sustainability and a healthier planet for future generations.
                </p>
                <a href="#" class="inline-block px-4 py-2 border border-white rounded-full text-sm font-semibold hover:bg-white hover:text-black transition">
                    Learn More
                </a>
            </div>
        </div>
    </div>

</div>

{{-- Achievements / Success Stories Section --}}
<section class="py-20 bg-green-50">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="text-green-600 font-bold tracking-wider uppercase text-sm">Celebrating Progress</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2">
                Milestones in the Green Transition
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Significant strides have been made from 2015 to 2023. Here are the wins we have achieved together globally.
            </p>
        </div>

        {{-- Grid of Positive Stats --}}
        <div class="grid md:grid-cols-3 gap-8">

            {{-- Card 1: Access Growth --}}
            <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-green-500 hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-6">
                    {{-- Icon: Lightning --}}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-5xl font-extrabold text-gray-900 mb-2">92%</h3>
                <p class="font-bold text-gray-700 mb-2">Global Electricity Access</p>
                <p class="text-sm text-gray-500">
                    Up from 87% in 2015. This means <strong>18.8 million fewer people</strong> were left in the dark in 2023 compared to the year before.
                </p>
            </div>

            {{-- Card 2: Investment Spike --}}
            <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-green-500 hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-6">
                    {{-- Icon: Trending Up --}}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h3 class="text-5xl font-extrabold text-gray-900 mb-2">27%</h3>
                <p class="font-bold text-gray-700 mb-2">Increase in Funding</p>
                <p class="text-sm text-gray-500">
                    International public financial flows supporting clean energy rose to <strong>$21.6 billion</strong> in 2023, fueling new projects.
                </p>
            </div>

            {{-- Card 3: Capacity Record --}}
            <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-green-500 hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-6">
                    {{-- Icon: Sun / Energy --}}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-5xl font-extrabold text-gray-900 mb-2">478W</h3>
                <p class="font-bold text-gray-700 mb-2">Capacity Per Capita</p>
                <p class="text-sm text-gray-500">
                    A new record for renewable energy capacity per person, jumping <strong>13%</strong> in a single year as technology scales up.
                </p>
            </div>

        </div>

        {{-- Additional Positive Note (Wide Bar) --}}
        <div class="mt-12 bg-green-600 rounded-2xl p-8 md:p-12 text-center text-white shadow-lg">
            <h3 class="text-2xl font-bold mb-4">Universal Success Stories</h3>
            <p class="text-lg text-green-100 max-w-3xl mx-auto mb-6">
                Between 2010 and 2023, <strong>45 countries</strong> successfully achieved universal access to electricity, proving that 100% coverage is an achievable goal.
            </p>
            <a href="https://sdgs.un.org/goals/goal7#progress_and_info" 
               target="_blank" 
               class="inline-block bg-white text-green-800 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wide hover:bg-green-100 hover:scale-105 transition-all duration-300 shadow-sm">
                Fact Check: Target 7.1
            </a>
        </div>

    </div>
</section>

{{-- Search Section --}}
<section class="py-14">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h3 class="text-2xl font-bold mb-4">Search for Clean Energy Tips</h3>

        @include('components.searchbar')
    </div>
</section>

@endsection