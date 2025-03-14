@php
$currentStep = 1;
@endphp

<x-app-layout>
    <!-- Hero Section with Consistent Brand Colors -->
    <div class="bg-blue-800 py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-4">
                <h1 class="text-4xl font-bold mb-3">Pendaftaran e-KTP</h1>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mb-6"></div>
                <p class="max-w-2xl mx-auto text-lg text-blue-100">
                    Silakan lengkapi formulir pendaftaran e-KTP berikut. Pastikan semua data yang diisi sesuai dengan dokumen pendukung Anda.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Area with Consistent Background -->
    <div class="bg-gray-100 py-12 px-4">
        <div class="container mx-auto">
            <!-- Form Card -->
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Information Alert - Matching Blue Theme -->
                <div class="bg-blue-50 border-l-4 border-blue-600 p-4 flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-blue-800">Penting!</h3>
                        <div class="text-blue-700">Data yang Anda masukkan akan diverifikasi dengan database kependudukan nasional.</div>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="p-6">
                    @livewire('services.ktp-registration', ['currentStep' => $currentStep])
                </div>
            </div>

            <!-- Help Section - Consistent Blue Theme -->
            <div class="max-w-4xl mx-auto mt-8">
                <h3 class="text-lg font-medium text-blue-800 mb-4 ml-2">Informasi Tambahan</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Bantuan Card -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border-t-4 border-blue-600">
                        <div class="p-5">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <h2 class="font-bold text-blue-800">Bantuan</h2>
                            </div>
                            <p class="text-gray-600">Butuh bantuan? Hubungi call center kami di (021) xxx-xxxx atau email support@disdukcapil.go.id</p>
                        </div>
                    </div>

                    <!-- Persyaratan Card -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border-t-4 border-blue-600">
                        <div class="p-5">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <h2 class="font-bold text-blue-800">Persyaratan</h2>
                            </div>
                            <p class="text-gray-600">Pastikan Anda sudah menyiapkan dokumen seperti KK, Akta Kelahiran, dan foto terbaru.</p>
                        </div>
                    </div>

                    <!-- Waktu Proses Card -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border-t-4 border-blue-600">
                        <div class="p-5">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <h2 class="font-bold text-blue-800">Waktu Proses</h2>
                            </div>
                            <p class="text-gray-600">Proses pembuatan e-KTP memerlukan waktu 7-14 hari kerja setelah verifikasi data selesai.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>