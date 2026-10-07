<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth scroll-pt-20">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sukabumi Robotic Competition (SRC)') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-['Plus_Jakarta_Sans',sans-serif] bg-white text-slate-800 antialiased min-h-full flex flex-col selection:bg-brand-500 selection:text-white">
    @php
        /**
         * PENGATURAN TOPBAR
         * -------------------------------------------------------------
         * 1. Mode: 'text' atau 'image'
         *    - 'text'  : menampilkan banner teks berwarna yang dapat disesuaikan
         *    - 'image' : menampilkan gambar banner dari public/images/
         */
        $topbarMode = 'text'; // ubah ke 'image' untuk menggunakan banner gambar

        // PENGATURAN MODE TEKS
        $topbarText = '🚀 Sukabumi Robotic Competition 2026 — Segera Hadir! Pendaftaran akan segera dibuka.';
        $topbarBgClass = 'bg-brand-600'; // contoh: bg-brand-500 (#044A9C), bg-brand-600 (#033a7d), bg-brand-700 (#022b5c), bg-brand-400 (#3b7ee1)
        $topbarTextColor = 'text-white';

        // PENGATURAN MODE GAMBAR
        // Simpan file banner di dalam public/images/ dan tuliskan nama filenya di sini:
        $topbarImage = 'topbar-banner.png'; // contoh: 'topbar-banner.png', 'banner.jpg'
    @endphp

    <!-- Topbar (Di Atas Navbar) -->
    @if ($topbarMode === 'image' && file_exists(public_path('images/' . $topbarImage)))
        <div class="w-full bg-brand-900 border-b border-brand-800/60 overflow-hidden text-center relative z-50">
            <a href="#about" class="block w-full">
                <img src="{{ asset('images/' . $topbarImage) }}" alt="Banner Pengumuman SRC"
                    class="w-full h-auto max-h-16 md:max-h-20 object-cover object-center mx-auto" />
            </a>
        </div>
    @elseif ($topbarMode === 'text' || $topbarMode === 'image')
        <div class="{{ $topbarBgClass }} {{ $topbarTextColor }} py-2.5 sm:py-3 px-4 text-center text-xs sm:text-sm font-bold tracking-wide relative z-50 shadow-inner flex items-center justify-center gap-2">
            <span class="inline-block w-2 h-2 rounded-full bg-cyan-300 animate-pulse"></span>
            <span>{{ $topbarText }}</span>
        </div>
    @endif

    <!-- Sticky Glass Navbar -->
    <header class="sticky top-0 z-40 backdrop-blur-md bg-white/95 border-b border-brand-100 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 sm:h-24">
                <!-- Brand Logo using Main_Logo.png (Enlarged) -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group py-2">
                    <img src="{{ asset('images/Main_Logo.png') }}" alt="Logo Sukabumi Robotic Competition"
                        class="h-14 sm:h-16 md:h-18 w-auto object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-sm" />
                </a>

                <!-- Navigation Links with Sliding Active Indicator -->
                <nav id="main-nav" class="hidden lg:flex items-center relative">
                    <div class="flex items-center space-x-6 text-sm font-bold text-slate-600">
                        <a href="{{ route('home') }}#" data-section="hero"
                            class="nav-link text-brand-500 hover:text-brand-500 transition-colors duration-300 py-6">Beranda</a>
                        <a href="{{ route('home') }}#about" data-section="about"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">Tentang SRC</a>
                        <a href="{{ route('home') }}#categories" data-section="categories"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">Kategori</a>
                        <a href="{{ route('home') }}#consultation" data-section="consultation"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">Konsultasi</a>
                        <a href="{{ route('home') }}#pillars" data-section="pillars"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">Pilar</a>
                        <a href="{{ route('home') }}#partners" data-section="partners"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">Partner</a>
                        <a href="{{ route('home') }}#location" data-section="location"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">Lokasi</a>
                        <a href="{{ route('home') }}#faq" data-section="faq"
                            class="nav-link hover:text-brand-500 transition-colors duration-300 py-6">FAQ</a>
                    </div>
                    <!-- Sliding Underline Indicator -->
                    <span id="nav-indicator"
                        class="absolute bottom-0 h-[3px] bg-brand-500 rounded-full transition-all duration-400 ease-[cubic-bezier(0.25,0.1,0.25,1)]"></span>
                </nav>

                <!-- CTA Button -->
                <div class="hidden sm:flex items-center space-x-4">
                    <a href="{{ route('home') }}#consultation"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-sm font-extrabold text-brand-600 bg-brand-50 hover:bg-brand-100 border border-brand-200 transition-all duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('home') }}#categories"
                        class="inline-flex items-center justify-center px-6 py-2.5 rounded-xl text-sm font-extrabold text-white bg-brand-500 hover:bg-brand-600 shadow-lg shadow-brand-500/25 hover:shadow-brand-500/40 transition-all duration-300 hover:-translate-y-0.5">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Modern Blue Footer -->
    <footer class="bg-brand-900 border-t border-brand-800 text-slate-300 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/Main_Logo.png') }}" alt="Logo Sukabumi Robotic Competition"
                            class="h-10 sm:h-11 w-auto object-contain bg-white/10 p-1.5 rounded-lg border border-white/20" />
                        <span class="text-xl font-extrabold text-white tracking-wide">Sukabumi Robotic Competition</span>
                    </div>
                    <p class="text-brand-100/80 max-w-sm leading-relaxed text-xs sm:text-sm">
                        Turnamen robotika tingkat nasional tahunan yang diselenggarakan oleh Sukarobot Academy berkolaborasi dengan Universitas Nusa Putra dan Perkumpulan Robotika Seluruh Indonesia (PRSI).
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4 text-xs uppercase tracking-wider text-brand-300">Penyelenggara</h3>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-brand-100/90">
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-brand-300"></span> Sukarobot Academy
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-brand-400"></span> Universitas Nusa Putra
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-brand-200"></span> Perkumpulan Robotika Seluruh Indonesia (PRSI)
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4 text-xs uppercase tracking-wider text-brand-300">Lokasi & Tempat</h3>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-brand-100/90">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-brand-300 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Universitas Nusa Putra, Sukabumi, Jawa Barat, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="pt-8 border-t border-brand-800 flex flex-col sm:flex-row items-center justify-between text-brand-200/70 text-xs">
                <p>&copy; {{ date('Y') }} Sukabumi Robotic Competition (SRC). Hak cipta dilindungi.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>