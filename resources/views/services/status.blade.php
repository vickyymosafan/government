@php
$currentStep = 1;
@endphp

<x-app-layout>
    <!-- Hero Section with Consistent Brand Colors -->
    <div class="bg-blue-800 py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-4">
                <h1 class="text-4xl font-bold mb-3">Status Pengajuan e-KTP</h1>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mb-6"></div>
                <p class="max-w-2xl mx-auto text-lg text-blue-100">
                    Pantau status pengajuan e-KTP Anda secara real-time. Anda dapat melihat semua pengajuan yang telah Anda lakukan.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    @livewire('services.status-check')
</x-app-layout>
