<div class="min-h-screen bg-gradient-to-b from-navy to-blue-gray">

    <!-- Main Content with Glassmorphism Cards -->
    <div class="container mx-auto px-4 py-12">
        <!-- Layanan Utama Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-[#DDE6ED] text-center mb-4">Layanan Utama</h2>
            <p class="text-[#DDE6ED]/80 text-center mb-8">Akses layanan kependudukan yang Anda butuhkan dengan mudah</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- e-KTP Card -->
                <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg hover:bg-[#DDE6ED]/20 transition-all duration-300 hover:scale-105 cursor-pointer group">
                    <div class="card-body text-[#DDE6ED] text-center">
                        <div class="rounded-full bg-[#27374D]/50 w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-[#27374D] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">e-KTP</h3>
                        <p class="text-[#DDE6ED]/80">Pendaftaran dan pengurusan e-KTP dengan mudah</p>
                        <div class="card-actions justify-center mt-4">
                            <a href="{{ route('services.ktp') }}" class="btn btn-ghost btn-sm glass hover:bg-[#DDE6ED]/20 text-[#DDE6ED]">
                                Daftar Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kartu Keluarga Card -->
                <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg hover:bg-[#DDE6ED]/20 transition-all duration-300 hover:scale-105 cursor-pointer group">
                    <div class="card-body text-[#DDE6ED] text-center">
                        <div class="rounded-full bg-[#526D82]/50 w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-[#526D82] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Kartu Keluarga</h3>
                        <p class="text-[#DDE6ED]/80">Pengurusan kartu keluarga online</p>
                        <div class="card-actions justify-center mt-4">
                            <a href="{{ route('services.kk') }}" class="btn btn-ghost btn-sm glass hover:bg-[#DDE6ED]/20 text-[#DDE6ED]">
                                Daftar Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Akta Kelahiran Card -->
                <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg hover:bg-[#DDE6ED]/20 transition-all duration-300 hover:scale-105 cursor-pointer group">
                    <div class="card-body text-[#DDE6ED] text-center">
                        <div class="rounded-full bg-[#9DB2BF]/50 w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-[#9DB2BF] transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Akta Kelahiran</h3>
                        <p class="text-[#DDE6ED]/80">Pembuatan akta kelahiran baru</p>
                        <div class="card-actions justify-center mt-4">
                            <a href="{{ route('services.akta') }}" class="btn btn-ghost btn-sm glass hover:bg-[#DDE6ED]/20 text-[#DDE6ED]">
                                Daftar Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-16">
                @include('livewire.pages.news-and-announcements')
            </div>
        </div>
    </div>
</div>