<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Disdukcapil') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'navy': '#27374D',
                        'blue-gray': '#526D82',
                        'light-blue': '#9DB2BF',
                        'pale-blue': '#DDE6ED',
                    }
                }
            },
            daisyui: {
                themes: [{
                    light: {
                        "primary": "#27374D",
                        "primary-focus": "#526D82",
                        "primary-content": "#DDE6ED",
                        "secondary": "#9DB2BF",
                        "accent": "#526D82",
                        "base-100": "#DDE6ED",
                        "base-200": "#9DB2BF",
                        "base-300": "#526D82",
                        "neutral": "#27374D",
                    },
                    dark: {
                        "primary": "#526D82",
                        "primary-focus": "#27374D",
                        "primary-content": "#DDE6ED",
                        "secondary": "#9DB2BF",
                        "accent": "#9DB2BF",
                        "base-100": "#27374D",
                        "base-200": "#526D82",
                        "base-300": "#9DB2BF",
                        "neutral": "#DDE6ED",
                    }
                }]
            }
        }
    </script>
    @livewireStyles
</head>

<body class="font-sans antialiased bg-pale-blue">
    <!-- Navbar -->
    @if(!request()->routeIs('home'))
    <div id="navbar-main" class="sticky top-0 z-50 bg-slate-900 shadow-md transition-transform duration-300">
        <!-- Top Bar -->
        <div class="bg-gradient-to-r from-slate-900 to-navy text-gray-200 py-2">
            <div class="container mx-auto px-4 flex justify-between items-center text-sm">
                <div class="flex items-center space-x-4">
                    <a href="tel:+62xxx" class="hover:text-white flex items-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Hotline: (021) xxx-xxxx
                    </a>
                    <span class="hidden md:inline text-gray-400">|</span>
                    <a href="mailto:contact@disdukcapil.go.id" class="hidden md:flex hover:text-white items-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        contact@disdukcapil.go.id
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="/faq" class="hover:text-white transition-all duration-300">FAQ</a>
                    <span class="text-gray-400">|</span>
                    <a href="/panduan" class="hover:text-white transition-all duration-300">Panduan</a>
                    <a href="/cek-status" class="md:hidden text-white hover:text-white transition-all duration-300 hover:font-medium">Cek Status</a>
                </div>
            </div>
        </div>

        <!-- Main Navbar -->
        <div class="bg-slate-800 text-gray-100">
            <div class="navbar container mx-auto px-4 py-3">
                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden text-gray-200 hover:bg-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-3 shadow-lg bg-slate-800 text-gray-200 rounded-xl w-56 space-y-1 animate-fadeIn">
                            <li><a href="{{ route('home') }}" class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">🏠</a></li>
                            <li>
                                <a class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">💼 Layanan</a>
                                <ul class="p-2 bg-slate-800 rounded-xl shadow-lg">
                                    <li><a href="{{ route('services.ktp') }}" class="flex items-center py-2 hover:bg-slate-700 transition-colors duration-200 rounded-lg">e-KTP</a></li>
                                    <li><a href="{{ route('services.kk') }}" class="flex items-center py-2 hover:bg-slate-700 transition-colors duration-200 rounded-lg">Kartu Keluarga</a></li>
                                    <li><a href="{{ route('services.akta') }}" class="flex items-center py-2 hover:bg-slate-700 transition-colors duration-200 rounded-lg">Akta Kelahiran</a></li>
                                </ul>
                            </li>
                            <li><a href="/kontak" class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">📞 Kontak</a></li>
                            <li class="divider my-1 opacity-20 bg-gray-400"></li>
                            <li><a href="{{ route('services.status') }}" class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">🔍 Cek Status</a></li>
                            @auth
                                <li>
                                    <a class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="p-2 bg-slate-800 rounded-xl shadow-lg">
                                        <li><a href="{{ route('profile') }}" class="flex items-center py-2 hover:bg-slate-700 transition-colors duration-200 rounded-lg">Profil</a></li>
                                        <li>
                                            <livewire:auth.logout />
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}" class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">Masuk</a></li>
                                <li><a href="{{ route('register') }}" class="font-medium hover:bg-slate-700 transition-colors duration-200 rounded-lg">Daftar</a></li>
                            @endauth
                        </ul>
                    </div>
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <span class="text-xl font-bold text-white">D</span>
                        </div>
                        <div class="text-xl font-bold tracking-tight text-gray-100 group-hover:text-indigo-300 transition-colors duration-300">Disdukcapil</div>
                    </a>
                </div>

                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 space-x-1">
                        <li><a href="{{ route('home') }}" class="font-medium hover:bg-slate-700 hover:text-gray-100 transition-all duration-200 rounded-lg px-3 py-2">🏠</a></li>
                        <li>
                            <details>
                                <summary class="font-medium hover:bg-slate-700 hover:text-gray-100 transition-all duration-200 rounded-lg px-3 py-2">💼 Layanan</summary>
                                <ul class="p-4 bg-slate-800 rounded-xl shadow-lg w-56 z-[1] border border-slate-700">
                                    <li><a href="{{ route('services.ktp') }}" class="flex items-center py-2 hover:bg-slate-700 text-gray-100 transition-all duration-200 rounded-lg">e-KTP</a></li>
                                    <li><a href="{{ route('services.kk') }}" class="flex items-center py-2 hover:bg-slate-700 text-gray-100 transition-all duration-200 rounded-lg">Kartu Keluarga</a></li>
                                    <li><a href="{{ route('services.akta') }}" class="flex items-center py-2 hover:bg-slate-700 text-gray-100 transition-all duration-200 rounded-lg">Akta Kelahiran</a></li>
                                </ul>
                            </details>
                        </li>
                        <li><a href="/kontak" class="font-medium hover:bg-slate-700 hover:text-gray-100 transition-all duration-200 rounded-lg px-3 py-2">📞 Kontak</a></li>
                        <li><a href="{{ route('services.status') }}" class="font-medium hover:bg-slate-700 hover:text-gray-100 transition-all duration-200 rounded-lg px-3 py-2">🔍 Cek Status</a></li>
                    </ul>
                </div>

                <div class="navbar-end">
                    <div class="flex items-center space-x-2">
                        @auth
                            <div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center">
                                        <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                </label>
                                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow-lg menu menu-sm dropdown-content bg-slate-800 rounded-xl w-52">
                                    <li class="p-2 text-gray-300 font-medium border-b border-slate-700">
                                        {{ Auth::user()->name }}
                                    </li>
                                    <li><a href="{{ route('profile') }}" class="hover:bg-slate-700">Profil</a></li>
                                    <li>
                                        <livewire:auth.logout />
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn bg-indigo-600 hover:bg-indigo-700 text-white border-none rounded-full px-4 py-2 transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span class="hidden md:inline">Masuk</span>
                                <span class="inline md:hidden">Login</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main>
        @hasSection('content')
        @yield('content')
        @else
        {{ $slot ?? '' }}
        @endif
    </main>

    <!-- Footer -->
    @if(!request()->routeIs('home'))
    <footer class="bg-gradient-to-r from-[#27374D] to-[#526D82] text-[#DDE6ED] pt-16 pb-8">
        <div class="container mx-auto px-4">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <!-- Brand Column -->
                <div class="space-y-6">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#526D82] to-[#27374D] flex items-center justify-center shadow-lg shadow-[#27374D]/30 transition-all duration-300 group-hover:scale-105">
                            <span class="text-xl font-bold text-[#DDE6ED]">D</span>
                        </div>
                        <div class="text-xl font-bold tracking-tight group-hover:text-[#9DB2BF] transition-colors duration-300">Disdukcapil</div>
                    </a>
                    <p class="text-sm leading-relaxed opacity-80 max-w-xs">Pelayanan administrasi kependudukan dan pencatatan sipil yang cepat, akurat, dan terpercaya.</p>

                    <!-- Contact Quick Info -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <span class="text-sm">(021) 555-789</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-sm">info@disdukcapil.go.id</span>
                        </div>
                    </div>
                </div>

                <!-- Service Links Column -->
                <div class="mt-8 sm:mt-0">
                    <h3 class="font-semibold text-lg mb-6 pb-2 border-b border-[#9DB2BF]/30 inline-flex items-center">
                        <span class="bg-[#9DB2BF]/20 p-1.5 rounded-full mr-2">💼</span>
                        Layanan
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('services.ktp') }}" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">👤</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">e-KTP</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.kk') }}" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">👨‍👩‍👧‍👦</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Kartu Keluarga</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.akta') }}" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">📜</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Akta Kelahiran</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.status') }}" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">🔍</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Cek Status</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Information Links Column -->
                <div class="mt-8 lg:mt-0">
                    <h3 class="font-semibold text-lg mb-6 pb-2 border-b border-[#9DB2BF]/30 inline-flex items-center">
                        <span class="bg-[#9DB2BF]/20 p-1.5 rounded-full mr-2">ℹ️</span>
                        Informasi
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="/pengumuman" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">📢</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Pengumuman</span>
                            </a>
                        </li>
                        <li>
                            <a href="/kontak" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">📞</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Kontak</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Legal Links -->
                    <h3 class="font-semibold text-lg mb-6 pb-2 border-b border-[#9DB2BF]/30 inline-flex items-center mt-8">
                        <span class="bg-[#9DB2BF]/20 p-1.5 rounded-full mr-2">⚖️</span>
                        Legal
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="/kebijakan-privasi" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">🔒</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Kebijakan Privasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="/syarat-ketentuan" class="flex items-center group transition-all duration-300">
                                <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#9DB2BF]/10 mr-3 group-hover:bg-primary/20 transition-all duration-300">📝</span>
                                <span class="group-hover:text-[#9DB2BF] group-hover:translate-x-1 transition-all duration-300">Syarat & Ketentuan</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter & Social Column -->
                <div class="mt-8 lg:mt-0">
                    <h3 class="font-semibold text-lg mb-6 pb-2 border-b border-[#9DB2BF]/30 inline-flex items-center">
                        <span class="bg-[#9DB2BF]/20 p-1.5 rounded-full mr-2">📱</span>
                        Hubungi Kami
                    </h3>

                    <!-- Newsletter Form -->
                    <div class="mb-8">
                        <p class="text-sm mb-4 opacity-80">Dapatkan berita dan informasi terbaru dari kami.</p>
                        <form class="flex flex-col sm:flex-row gap-2">
                            <input type="email" placeholder="Email Anda" class="input input-sm bg-[#9DB2BF]/10 border-[#9DB2BF]/20 focus:border-[#9DB2BF] text-white flex-grow" />
                            <button class="btn btn-sm btn-primary">Langganan</button>
                        </form>
                    </div>

                    <!-- Social Media -->
                    <div>
                        <p class="text-sm mb-4 opacity-80">Ikuti kami di media sosial:</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="#" class="w-10 h-10 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center hover:bg-[#9DB2BF]/40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center hover:bg-[#9DB2BF]/40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center hover:bg-[#9DB2BF]/40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center hover:bg-[#9DB2BF]/40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center hover:bg-[#9DB2BF]/40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="h-px bg-gradient-to-r from-transparent via-[#9DB2BF]/20 to-transparent my-8"></div>

            <!-- Copyright Section -->
            <div class="flex flex-col md:flex-row justify-between items-center text-sm opacity-80">
                <div class="mb-4 md:mb-0 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#9DB2BF]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                    </svg>
                    2025 Disdukcapil. All rights reserved.
                </div>

                <!-- Back to top button -->
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="group flex items-center space-x-2 hover:text-[#9DB2BF] transition-colors duration-300">
                    <span>Kembali ke Atas</span>
                    <div class="w-8 h-8 rounded-full bg-[#9DB2BF]/20 flex items-center justify-center group-hover:bg-[#9DB2BF]/40 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:-translate-y-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </footer>
    @endif

    <!-- Navbar scroll hide/show script -->
    <script>
        // Variables for storing scroll position and state
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar-main');
        const navbarHeight = navbar.offsetHeight;
        let isScrollingUp = false;

        // Add transition class to navbar
        navbar.classList.add('transition-transform', 'duration-300');

        // Function to handle scroll event
        function handleScroll() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Determine scroll direction
            if (scrollTop > lastScrollTop && scrollTop > navbarHeight) {
                // Scrolling down & past navbar height
                if (!isScrollingUp) {
                    navbar.style.transform = 'translateY(-100%)';
                }
                isScrollingUp = false;
            } else {
                // Scrolling up
                navbar.style.transform = 'translateY(0)';
                isScrollingUp = true;
            }

            // Update last scroll position
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }

        // Throttle function to limit scroll event firing
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (!scrollTimeout) {
                scrollTimeout = setTimeout(function() {
                    handleScroll();
                    scrollTimeout = null;
                }, 150);
            }
        });
    </script>

    @livewireScripts
</body>

</html>