<div class="container mx-auto px-4 py-12">
    <!-- Page Header - Improved with better spacing and container width -->
    <header class="max-w-4xl mx-auto text-center mb-16">
        <h1 class="text-4xl font-bold text-white mb-3">Berita & Pengumuman</h1>
        <div class="w-24 h-1 bg-primary mx-auto mb-5"></div>
        <p class="text-white/80 text-lg">Informasi terbaru seputar layanan kependudukan dan kegiatan Disdukcapil</p>
    </header>

    <div class="space-y-20">
        <!-- Announcements Section - Matching the News section layout -->
        <section>
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-1">Pengumuman Penting</h2>
                    <p class="text-white/70">Informasi terkini seputar layanan Disdukcapil</p>
                </div>
                <a href="#" class="group btn btn-outline btn-sm border-white text-white hover:bg-white/10 self-start md:self-center transition-all duration-300">
                    <span>Lihat Semua</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Announcements Grid with data check -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($announcements) && count($announcements) > 0)
                @foreach($announcements as $item)
                <div class="card bg-white/10 backdrop-blur-sm hover:bg-white/15 transition-all duration-300 overflow-hidden h-full border border-white/10 hover:shadow-lg hover:shadow-primary/10 transform hover:-translate-y-1">
                    <figure class="relative h-56">
                        <img src="https://picsum.photos/800/400?random={{ $loop->iteration }}"
                            alt="{{ $item->title }}"
                            class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 flex items-center gap-2">
                            <div class="badge badge-{{ isset($item->type) ? ($item->type === 'info' ? 'info' : ($item->type === 'warning' ? 'warning' : 'success')) : 'info' }} shadow-md">
                                {{ isset($item->type) ? ($item->type === 'info' ? 'Informasi' : ($item->type === 'warning' ? 'Peringatan' : 'Sukses')) : 'Informasi' }}
                            </div>
                            <div class="text-xs text-white/80 bg-black/30 px-2 py-1 rounded-full">
                                @if(isset($item->created_at))
                                    @if(is_string($item->created_at))
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    @else
                                        {{ $item->created_at->format('d M Y') }}
                                    @endif
                                @else
                                    {{ \Carbon\Carbon::now()->format('d M Y') }}
                                @endif
                            </div>
                        </div>
                    </figure>
                    <div class="card-body p-6">
                        <h3 class="card-title text-xl mb-3 text-pale-blue hover:text-primary transition-colors duration-300">
                            {{ $item->title }}
                        </h3>
                        <p class="text-white/80 mb-5 text-sm leading-relaxed">
                            {{ Str::limit($item->content, 150) }}
                        </p>
                        <div class="mt-auto pt-2">
                            <a href="{{ route('pengumuman.detail', $item->id) }}" class="group btn btn-sm btn-accent glass hover:glass-hover transition-all duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-span-full text-center text-white/70 py-16 bg-white/5 rounded-lg backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-lg font-medium mb-1">Belum Ada Pengumuman</p>
                    <p class="text-sm">Pengumuman penting akan ditampilkan di sini</p>
                </div>
                @endif
            </div>
        </section>

        <!-- News Section -->
        <section>
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-1">Berita Terbaru</h2>
                    <p class="text-white/70">Informasi dan berita seputar layanan Disdukcapil</p>
                </div>
                <a href="#" class="group btn btn-outline btn-sm border-white text-white hover:bg-white/10 self-start md:self-center transition-all duration-300">
                    <span>Lihat Semua</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- News Grid with data check -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($news) && count($news) > 0)
                @foreach($news as $item)
                <div class="card bg-white/10 backdrop-blur-sm hover:bg-white/15 transition-all duration-300 overflow-hidden h-full border border-white/10 hover:shadow-lg hover:shadow-primary/10 transform hover:-translate-y-1">
                    <figure class="relative h-56">
                        <img src="{{ $item->image ?? 'https://picsum.photos/800/400?random=' . ($loop->iteration + 10) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 flex items-center gap-2">
                            <div class="badge badge-primary shadow-md">Berita</div>
                            <div class="text-xs text-white/80 bg-black/30 px-2 py-1 rounded-full">
                                @if(isset($item->published_at))
                                    @if(is_string($item->published_at))
                                        {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                                    @else
                                        {{ $item->published_at->format('d M Y') }}
                                    @endif
                                @elseif(isset($item->created_at))
                                    @if(is_string($item->created_at))
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    @else
                                        {{ $item->created_at->format('d M Y') }}
                                    @endif
                                @else
                                    {{ \Carbon\Carbon::now()->format('d M Y') }}
                                @endif
                            </div>
                        </div>
                    </figure>
                    <div class="card-body p-6">
                        <h3 class="card-title text-xl mb-3 text-pale-blue hover:text-primary transition-colors duration-300">
                            {{ $item->title }}
                        </h3>
                        <p class="text-white/80 mb-5 text-sm leading-relaxed">
                            {{ Str::limit($item->content, 150) }}
                        </p>
                        <div class="mt-auto pt-2">
                            <button class="group btn btn-sm btn-primary glass hover:glass-hover transition-all duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-span-full text-center text-white/70 py-16 bg-white/5 rounded-lg backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v1M19 8l-7 5-7-5M3 8v8a2 2 0 002 2h14a2 2 0 002-2V8" />
                    </svg>
                    <p class="text-lg font-medium mb-1">Belum Ada Berita</p>
                    <p class="text-sm">Berita terbaru akan ditampilkan di sini</p>
                </div>
                @endif
            </div>
        </section>
    </div>
</div>