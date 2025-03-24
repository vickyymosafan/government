@php
$currentStep = 1;
@endphp

<x-app-layout>
    <!-- Hero Section with Modern Design -->
    <div class="relative bg-gradient-to-r from-blue-800 to-blue-600 py-20 text-white overflow-hidden">
        <div class="absolute inset-0">
            <svg class="absolute right-0 top-0 h-full w-1/2 transform translate-x-1/2" viewBox="0 0 100 100" preserveAspectRatio="none" fill="none">
                <path d="M0 0L100 0L50 100L0 100Z" fill="rgba(255,255,255,0.1)"/>
            </svg>
        </div>
        <div class="container mx-auto px-4 relative">
            <div class="text-center mb-4">
                <h1 class="text-5xl font-bold mb-4 leading-tight">Pendaftaran e-KTP</h1>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mb-8"></div>
                <p class="max-w-2xl mx-auto text-xl text-blue-100 leading-relaxed">
                    Silakan lengkapi formulir pendaftaran e-KTP berikut. Pastikan semua data yang diisi sesuai dengan dokumen pendukung Anda.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Area with Enhanced Design -->
    <div class="bg-gray-50 py-16 px-4">
        <div class="container mx-auto">
            <!-- Form Card with Improved Shadow -->
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                <!-- Enhanced Information Alert -->
                <div class="bg-blue-50 border-l-4 border-blue-600 p-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-blue-800 mb-1">Penting!</h3>
                            <div class="text-blue-700 leading-relaxed">
                                Data yang Anda masukkan akan diverifikasi dengan database kependudukan nasional. Mohon pastikan keakuratan data yang diinput.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Form with Enhanced Spacing -->
                <div class="p-8">
                    @livewire('services.ktp-registration', ['currentStep' => $currentStep])
                </div>
            </div>

            <!-- Enhanced Help Section -->
            <div class="max-w-4xl mx-auto mt-12">
                <h3 class="text-2xl font-bold text-blue-800 mb-8 text-center">Informasi Tambahan</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Enhanced Bantuan Card -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-blue-600">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <span class="bg-blue-100 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <h2 class="text-xl font-bold text-blue-800">Bantuan</h2>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Butuh bantuan? Hubungi call center kami di <span class="font-semibold">(021) xxx-xxxx</span> atau email <span class="text-blue-600">support@disdukcapil.go.id</span></p>
                        </div>
                    </div>

                    <!-- Enhanced Persyaratan Card -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-blue-600">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <span class="bg-blue-100 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <h2 class="text-xl font-bold text-blue-800">Persyaratan</h2>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Pastikan Anda sudah menyiapkan dokumen seperti KK, Akta Kelahiran, dan foto terbaru sesuai ketentuan.</p>
                        </div>
                    </div>

                    <!-- Enhanced Waktu Proses Card -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-blue-600">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <span class="bg-blue-100 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <h2 class="text-xl font-bold text-blue-800">Waktu Proses</h2>
                            </div>
                            <p class="text-gray-600 leading-relaxed">Proses pembuatan e-KTP memerlukan waktu 7-14 hari kerja setelah verifikasi data selesai.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>