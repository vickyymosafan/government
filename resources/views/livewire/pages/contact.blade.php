<div class="min-h-screen bg-gradient-to-b from-navy to-blue-gray">
    <!-- Main Content with Glassmorphism Cards -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-[#DDE6ED] text-center mb-4">Hubungi Kami</h1>
            <p class="text-[#DDE6ED]/80 text-center mb-12">Kami siap membantu Anda dengan pertanyaan dan kebutuhan layanan kependudukan</p>
        </div>

        <!-- Contact Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-[#DDE6ED] text-center mb-4">Butuh Bantuan?</h2>
            <p class="text-[#DDE6ED]/80 text-center mb-8">Tim kami siap membantu Anda</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Phone Contact -->
                <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg hover:bg-[#DDE6ED]/20 transition-all duration-300 hover:scale-105 cursor-pointer">
                    <div class="card-body text-[#DDE6ED] text-center">
                        <div class="rounded-full bg-[#526D82]/50 w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-[#526D82]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Telepon</h3>
                        <p class="text-[#DDE6ED]/80 mb-4">Hubungi kami di jam kerja</p>
                        <a href="tel:+62123456789" class="text-lg font-semibold hover:text-[#DDE6ED]/80">
                            (021) 123-456-789
                        </a>
                    </div>
                </div>

                <!-- Email Contact -->
                <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg hover:bg-[#DDE6ED]/20 transition-all duration-300 hover:scale-105 cursor-pointer">
                    <div class="card-body text-[#DDE6ED] text-center">
                        <div class="rounded-full bg-[#9DB2BF]/50 w-16 h-16 mx-auto mb-4 flex items-center justify-center group-hover:bg-[#9DB2BF]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Email</h3>
                        <p class="text-[#DDE6ED]/80 mb-4">Kirim pertanyaan Anda</p>
                        <a href="mailto:info@disdukcapil.go.id" class="text-lg font-semibold hover:text-[#DDE6ED]/80">
                            info@disdukcapil.go.id
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="mt-16 max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-[#DDE6ED] text-center mb-4">Kirim Pesan</h2>
            <p class="text-[#DDE6ED]/80 text-center mb-8">Isi formulir di bawah ini dan kami akan segera menghubungi Anda</p>
            
            <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg p-6">
                @if (session()->has('message'))
                    <div class="alert alert-success mb-6">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form wire:submit.prevent="submitForm" class="space-y-6">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#DDE6ED]">Nama Lengkap</span>
                        </label>
                        <input type="text" wire:model="name" class="input input-bordered bg-[#DDE6ED]/10 text-[#DDE6ED] border-[#9DB2BF]/30 focus:border-[#9DB2BF] focus:ring-[#9DB2BF]" placeholder="Masukkan nama lengkap Anda" />
                        @error('name') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#DDE6ED]">Email</span>
                        </label>
                        <input type="email" wire:model="email" class="input input-bordered bg-[#DDE6ED]/10 text-[#DDE6ED] border-[#9DB2BF]/30 focus:border-[#9DB2BF] focus:ring-[#9DB2BF]" placeholder="Masukkan alamat email Anda" />
                        @error('email') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#DDE6ED]">Subjek</span>
                        </label>
                        <input type="text" wire:model="subject" class="input input-bordered bg-[#DDE6ED]/10 text-[#DDE6ED] border-[#9DB2BF]/30 focus:border-[#9DB2BF] focus:ring-[#9DB2BF]" placeholder="Masukkan subjek pesan" />
                        @error('subject') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#DDE6ED]">Pesan</span>
                        </label>
                        <textarea wire:model="message" class="textarea textarea-bordered bg-[#DDE6ED]/10 text-[#DDE6ED] border-[#9DB2BF]/30 focus:border-[#9DB2BF] focus:ring-[#9DB2BF] h-32" placeholder="Tulis pesan Anda di sini"></textarea>
                        @error('message') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target="submitForm">Kirim Pesan</span>
                            <span wire:loading wire:target="submitForm">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Mengirim...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Office Location Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-[#DDE6ED] text-center mb-4">Lokasi Kantor</h2>
            <p class="text-[#DDE6ED]/80 text-center mb-8">Kunjungi kami di alamat berikut</p>
            
            <div class="card bg-[#DDE6ED]/10 backdrop-blur-lg p-6 max-w-4xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="text-[#DDE6ED]">
                        <h3 class="text-xl font-bold mb-4">Kantor Disdukcapil</h3>
                        <div class="space-y-3">
                            <p class="flex items-start">
                                <span class="mr-2">📍</span>
                                <span>Jl. Contoh No. 123, Kecamatan Contoh, Kota Contoh, Provinsi Contoh</span>
                            </p>
                            <p class="flex items-start">
                                <span class="mr-2">🕒</span>
                                <span>Senin - Jumat: 08.00 - 16.00 WIB</span>
                            </p>
                            <p class="flex items-start">
                                <span class="mr-2">📞</span>
                                <span>(021) 123-456-789</span>
                            </p>
                            <p class="flex items-start">
                                <span class="mr-2">✉️</span>
                                <span>info@disdukcapil.go.id</span>
                            </p>
                        </div>
                    </div>
                    <div class="h-64 bg-[#DDE6ED]/5 rounded-lg flex items-center justify-center">
                        <!-- Placeholder for map or office image -->
                        <p class="text-[#DDE6ED]/70 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Peta Lokasi Kantor</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
