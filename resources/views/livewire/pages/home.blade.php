@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-navy to-blue-gray">
    <!-- Hero Section with Glassmorphism -->
    <div class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Simplified Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/5 to-transparent"></div>

        <div class="container mx-auto px-4 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-[#DDE6ED] mb-6">
                    Selamat Datang di Portal Layanan
                </h1>
                <p class="text-xl text-[#DDE6ED]/90 mb-8">
                    Akses dan dapatkan pelayanan kependudukan dengan mudah dan efisien.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('services') }}" class="btn bg-[#27374D] text-[#DDE6ED] border-[#27374D] btn-lg glass hover:scale-105 transition duration-300 hover:bg-[#27374D]/80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        Mulai Layanan
                    </a>
                    <button class="btn btn-ghost btn-lg text-[#DDE6ED] hover:bg-[#DDE6ED]/10 hover:scale-105 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Cek Status
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }

    .animate-fade-in-delay {
        animation: fadeIn 0.8s ease-out 0.2s both;
    }

    .animate-bounce-in {
        animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .animate-bounce-in-delay {
        animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.1s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0.3);
            opacity: 0;
        }

        50% {
            transform: scale(1.05);
        }

        70% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .bg-grid-white {
        background-image: linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
    }
</style>
@endpush