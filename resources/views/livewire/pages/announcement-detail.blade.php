<div class="min-h-screen bg-gradient-to-b from-navy to-blue-gray">
    <div class="container mx-auto px-4 py-12">
        @if($announcement && !$error)
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('pengumuman') }}" class="group flex items-center text-white/80 hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Daftar Pengumuman</span>
                </a>
            </div>

            <!-- Announcement Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="badge badge-{{ isset($announcement->type) ? ($announcement->type === 'info' ? 'info' : ($announcement->type === 'warning' ? 'warning' : 'success')) : 'info' }}">
                        {{ isset($announcement->type) ? ($announcement->type === 'info' ? 'Informasi' : ($announcement->type === 'warning' ? 'Peringatan' : 'Sukses')) : 'Informasi' }}
                    </div>
                    <div class="text-sm text-white/80 bg-black/30 px-3 py-1 rounded-full">
                        {{ is_string($announcement->created_at) ? \Carbon\Carbon::parse($announcement->created_at)->format('d M Y') : $announcement->created_at->format('d M Y') }}
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">{{ $announcement->title }}</h1>
                <div class="h-1 w-32 bg-accent mb-6"></div>
            </div>

            <!-- Announcement Content -->
            <div class="card bg-white/10 backdrop-blur-lg p-8 mb-8 border border-white/10 shadow-xl">
                <div class="prose prose-lg prose-invert max-w-none">
                    {!! nl2br(e($announcement->content)) !!}
                </div>
            </div>

            <!-- Announcement Metadata -->
            <div class="card bg-white/5 backdrop-blur-sm p-6 border border-white/10">
                <h3 class="text-xl font-semibold text-white mb-4">Informasi Pengumuman</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start">
                        <div class="bg-white/10 rounded-full p-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/60 text-sm">Tanggal Mulai</p>
                            <p class="text-white font-medium">
                                @if($announcement->start_date)
                                    @if(is_string($announcement->start_date))
                                        {{ \Carbon\Carbon::parse($announcement->start_date)->format('d M Y') }}
                                    @else
                                        {{ $announcement->start_date->format('d M Y') }}
                                    @endif
                                @else
                                    Tidak ada batas waktu
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-white/10 rounded-full p-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/60 text-sm">Tanggal Berakhir</p>
                            <p class="text-white font-medium">
                                @if($announcement->end_date)
                                    @if(is_string($announcement->end_date))
                                        {{ \Carbon\Carbon::parse($announcement->end_date)->format('d M Y') }}
                                    @else
                                        {{ $announcement->end_date->format('d M Y') }}
                                    @endif
                                @else
                                    Tidak ada batas waktu
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Announcements (Dummy) -->
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-white mb-6">Pengumuman Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @for($i = 1; $i <= 2; $i++)
                    <div class="card bg-white/10 backdrop-blur-sm hover:bg-white/15 transition-all duration-300 border border-white/10">
                        <div class="card-body">
                            <div class="flex items-center gap-2 mb-2">
                                <div class="badge badge-accent shadow-md">Pengumuman</div>
                                <div class="text-xs text-white/80">{{ \Carbon\Carbon::now()->subDays($i * 2)->format('d M Y') }}</div>
                            </div>
                            <h3 class="card-title text-lg text-white">Pengumuman Penting #{{ $i }}</h3>
                            <p class="text-white/80 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="card-actions justify-end mt-4">
                                <a href="#" class="btn btn-sm btn-ghost text-white/80 hover:text-white">
                                    <span>Lihat</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        @else
        <div class="max-w-4xl mx-auto text-center py-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-2xl font-bold text-white mb-2">Pengumuman Tidak Ditemukan</h2>
            <p class="text-white/70 mb-6">Maaf, pengumuman yang Anda cari tidak ditemukan atau telah dihapus.</p>
            <a href="{{ route('pengumuman') }}" class="btn btn-accent">
                Kembali ke Daftar Pengumuman
            </a>
        </div>
        @endif
    </div>
</div>
