<x-app-layout>
    <!-- Invisible anchor for Home scroll-spy -->
    <div id="hero"></div>

    <!-- Section 1: Hero Section with Clean Wave Art & High Contrast Readability -->
    <section id="about" class="relative overflow-hidden bg-white pt-8 pb-20 lg:pt-14 lg:pb-28">
        <!-- SVG Organic Background Waves -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <!-- Top-Left Soft Light Blue Shape -->
            <svg class="absolute -top-24 -left-24 w-[28rem] h-[28rem] sm:w-[36rem] sm:h-[36rem] text-brand-100/70"
                viewBox="0 0 600 600" fill="currentColor">
                <path d="M 0,0 C 180,40 320,120 300,280 C 280,440 140,480 0,550 Z" />
            </svg>

            <!-- Top-Right Sweeping Deep Blue Wave (#044A9C & Dark Blue) -->
            <svg class="absolute top-0 -right-10 w-[42rem] h-[32rem] sm:w-[54rem] sm:h-[40rem] text-brand-700/95"
                viewBox="0 0 800 600" fill="currentColor">
                <path d="M 300,0 C 260,160 400,300 640,330 C 740,345 780,460 800,560 L 800,0 Z" />
            </svg>
            <svg class="absolute top-0 right-0 w-[36rem] h-[26rem] sm:w-[46rem] sm:h-[34rem] text-brand-500/85"
                viewBox="0 0 800 600" fill="currentColor">
                <path d="M 400,0 C 350,130 480,230 650,260 C 750,280 790,380 800,450 L 800,0 Z" />
            </svg>

            <!-- Bottom-Left Deep Blue Corner Shape -->
            <svg class="absolute -bottom-44 -left-44 w-[24rem] h-[24rem] sm:w-[30rem] sm:h-[30rem] text-brand-700/90"
                viewBox="0 0 500 500" fill="currentColor">
                <circle cx="150" cy="350" r="230" />
            </svg>
            <svg class="absolute -bottom-36 -left-36 w-[20rem] h-[20rem] sm:w-[25rem] sm:h-[25rem] text-brand-500/80"
                viewBox="0 0 500 500" fill="currentColor">
                <circle cx="150" cy="350" r="180" />
            </svg>

            <!-- Bottom-Right Soft Light Blue Wave -->
            <svg class="absolute -bottom-16 -right-16 w-[32rem] h-[28rem] sm:w-[40rem] sm:h-[34rem] text-brand-100/80"
                viewBox="0 0 600 500" fill="currentColor">
                <path d="M 600,500 L 160,500 C 230,380 340,310 470,290 C 570,270 600,160 600,160 Z" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Hero Left Column Content -->
                <div class="lg:col-span-7 space-y-7 reveal reveal-left">
                    <!-- Eyebrow Badge -->
                    <div
                        class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white border-2 border-brand-100 text-brand-700 text-xs sm:text-sm font-extrabold shadow-sm">
                        <span class="flex h-2.5 w-2.5 rounded-full bg-brand-500 animate-pulse"></span>
                        <span>SRC 2026 • Edisi ke-5</span>
                    </div>

                    <!-- Main Headline -->
                    <div class="space-y-3">
                        <h1
                            class="text-4xl sm:text-6xl lg:text-7xl font-black text-brand-950 tracking-tight leading-[1.08]">
                            Sukabumi Robotic <br class="hidden sm:inline" />
                            <span class="text-brand-500">Competition</span>
                        </h1>
                        <!-- Bold Accent Bar -->
                        <div class="w-16 h-2 bg-brand-500 rounded-full"></div>
                    </div>

                    <!-- Subtitle Description -->
                    <div class="p-4 sm:p-5 rounded-2xl bg-white border-2 border-brand-100 shadow-sm max-w-2xl">
                        <p class="text-base sm:text-lg text-slate-800 leading-relaxed font-medium">
                            Turnamen robotika nasional tahunan yang diselenggarakan oleh <strong
                                class="text-brand-600 font-bold">Sukarobot Academy</strong> berkolaborasi dengan <strong
                                class="text-brand-500 font-bold">Universitas Nusa Putra</strong> dan <strong
                                class="text-brand-700 font-bold">Perkumpulan Robotika Seluruh Indonesia (PRSI)</strong>.
                        </p>
                    </div>

                    <!-- CTA Action Buttons -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#categories"
                            class="inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-extrabold text-white bg-brand-500 hover:bg-brand-600 shadow-xl shadow-brand-500/30 hover:shadow-brand-500/45 transition-all duration-300 hover:-translate-y-1 group">
                            Daftar
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="#location"
                            class="inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-bold text-brand-700 bg-brand-50 border-2 border-brand-200 hover:bg-brand-100 hover:border-brand-400 transition-all duration-300">
                            Lokasi & Peta Acara
                        </a>
                    </div>
                </div>

                <!-- Hero Right Column Showcase Card -->
                <div class="lg:col-span-5 relative reveal reveal-right">
                    <div
                        class="relative rounded-3xl bg-white border-2 border-brand-100 p-4 sm:p-5 shadow-2xl shadow-brand-500/15">
                        <!-- Image Container -->
                        <div class="relative aspect-4/3 rounded-2xl overflow-hidden group border border-brand-100">
                            <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=1200&auto=format&fit=crop"
                                alt="Inovasi Robotika dan AI SRC"
                                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700" />
                            <!-- Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-brand-950/80 via-transparent to-transparent">
                            </div>

                            <!-- Floating Badge Top-Right -->
                            <div class="absolute top-4 right-4 z-10">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-white/95 border border-brand-200 text-brand-700 text-xs font-extrabold shadow-md">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Tema: Greentech & AI
                                </span>
                            </div>

                            <!-- Floating Badge Bottom-Left -->
                            <div class="absolute bottom-4 left-4 z-10">
                                <span
                                    class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg bg-brand-500 text-white text-xs font-bold shadow-lg">
                                    <svg class="w-4 h-4 text-brand-100" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    29–30 Agustus 2026
                                </span>
                            </div>
                        </div>

                        <!-- Sub-caption Card -->
                        <div
                            class="mt-4 p-4 rounded-xl bg-brand-50/90 border border-brand-200/80 flex items-center justify-between text-xs text-slate-700">
                            <span class="flex items-center gap-2 font-bold text-brand-900">
                                <span class="w-2.5 h-2.5 rounded-full bg-brand-500"></span> Tuan Rumah: Universitas Nusa
                                Putra
                            </span>
                            <span class="text-brand-600 font-extrabold">Turnamen Nasional</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Competition Categories Grid with Filter Controls -->
    <section id="categories" class="py-20 bg-white border-t border-brand-100 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 reveal">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-4">
                    🎯 Kategori Resmi Perlombaan
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-brand-900 tracking-tight">Kategori Perlombaan SRC 2026
                </h2>
                <p class="text-slate-600 mt-3 text-base sm:text-lg font-medium">
                    10 kategori kompetisi robotika nasional yang dirancang untuk berbagai tingkatan usia, format tim,
                    dan individu.
                </p>
            </div>

            <!-- Filter Buttons (All, Tim, Individu) -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-12 reveal">
                <button type="button" data-filter="all"
                    class="competition-filter-btn active px-6 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 shadow-sm cursor-pointer bg-brand-500 text-white shadow-brand-500/25">
                    Semua Kategori ({{ count($competitions ?? config('competitions.items')) }})
                </button>
                <button type="button" data-filter="Tim"
                    class="competition-filter-btn px-6 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 shadow-sm cursor-pointer bg-brand-50 text-brand-700 hover:bg-brand-100 border border-brand-200">
                    👥 Format Tim (3)
                </button>
                <button type="button" data-filter="Individu"
                    class="competition-filter-btn px-6 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 shadow-sm cursor-pointer bg-brand-50 text-brand-700 hover:bg-brand-100 border border-brand-200">
                    👤 Format Individu (7)
                </button>
            </div>

            <!-- Competitions Grid -->
            @php
                $competitionList = $competitions ?? config('competitions.items', []);
            @endphp

            <div id="competitions-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($competitionList as $item)
                    <div data-type="{{ $item['type'] }}"
                        onclick="window.location='{{ route('competitions.show', $item['slug']) }}'"
                        onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault(); window.location='{{ route('competitions.show', $item['slug']) }}';}"
                        tabindex="0" role="link" aria-label="Lihat detail kategori {{ $item['name'] }}"
                        class="competition-card p-6 sm:p-7 rounded-3xl bg-white border-2 border-brand-100 hover:border-brand-500 hover:-translate-y-1.5 transition-all duration-300 shadow-md hover:shadow-xl shadow-brand-500/5 flex flex-col justify-between group reveal cursor-pointer focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">

                        <div>
                            <!-- Card Image Preview with Fallback -->
                            <div
                                class="aspect-[16/10] w-full rounded-2xl overflow-hidden bg-brand-50 border border-brand-100 mb-5 relative">
                                @if(!empty($item['image']))
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-brand-100 to-brand-50 p-4 text-center\'><span class=\'text-3xl sm:text-4xl mb-1\'>🤖</span><span class=\'text-[11px] font-bold text-brand-700\'>{{ addslashes($item['name']) }}</span></div>';" />
                                @else
                                    <div
                                        class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-brand-100 to-brand-50 p-4 text-center">
                                        <span class="text-3xl sm:text-4xl mb-1">🤖</span>
                                        <span class="text-[11px] font-bold text-brand-700">{{ $item['name'] }}</span>
                                    </div>
                                @endif

                                <!-- Floating Type Badge on Image -->
                                <div class="absolute top-3 left-3 z-10">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-[10px] sm:text-[11px] font-black uppercase tracking-wider backdrop-blur-md shadow-sm {{ $item['type'] === 'Tim' ? 'bg-cyan-600/90 text-white' : 'bg-amber-500/90 text-white' }}">
                                        {{ $item['type'] === 'Tim' ? '👥 TIM' : '👤 INDIVIDU' }}
                                    </span>
                                </div>

                                <!-- Floating Category Badge on Image -->
                                <div class="absolute top-3 right-3 z-10">
                                    <span
                                        class="px-2.5 py-1 rounded-lg bg-white/95 text-brand-800 text-[10px] sm:text-xs font-extrabold shadow-sm border border-brand-100/80">
                                        {{ $item['category_badge'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Title -->
                            <h3
                                class="text-xl font-black text-brand-900 group-hover:text-brand-600 transition-colors mb-2 leading-snug">
                                {{ $item['name'] }}
                            </h3>

                            <!-- Target & Tagline -->
                            <p class="text-xs text-brand-600 font-semibold mb-2">
                                🎯 {{ $item['target_level'] }}
                            </p>
                            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ $item['tagline'] }}
                            </p>
                        </div>

                        <!-- Card Footer with Pricing & Detail Action Button -->
                        <div class="pt-5 border-t border-brand-100 space-y-4">
                            <!-- Pricing Snippet -->
                            <div class="flex items-center justify-between text-xs">
                                <div>
                                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Early Bird</span>
                                    <span class="text-base font-black text-brand-600">{{ $item['price_early'] }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Harga Normal</span>
                                    <span
                                        class="line-through text-slate-400 font-semibold">{{ $item['price_normal'] }}</span>
                                </div>
                            </div>

                            <!-- Move to Detail Page Button -->
                            <a href="{{ route('competitions.show', $item['slug']) }}" onclick="event.stopPropagation();"
                                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl text-xs sm:text-sm font-extrabold text-white bg-brand-500 group-hover:bg-brand-600 shadow-md shadow-brand-500/20 group-hover:shadow-brand-500/35 transition-all duration-300">
                                <span>Informasi & Panduan Lengkap</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Consultation & Guidance (Right After Competition Categories) -->
    <section id="consultation"
        class="py-16 sm:py-20 bg-gradient-to-b from-white via-brand-50/50 to-white border-t border-brand-100 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div
                class="bg-gradient-to-br from-brand-900 via-brand-800 to-brand-950 rounded-3xl p-8 sm:p-12 lg:p-16 text-white shadow-2xl relative overflow-hidden border border-brand-700/50 reveal reveal-scale">
                <!-- Background Glow Accents -->
                <div
                    class="absolute -top-24 -right-24 w-96 h-96 bg-brand-400/20 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-24 -left-24 w-96 h-96 bg-cyan-400/15 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    <div class="lg:col-span-8 space-y-6">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-cyan-300 text-xs font-extrabold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                            Butuh Panduan Kategori?
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
                            Konsultasi & Panduan Kategori Lomba
                        </h2>

                        <p
                            class="text-brand-100/90 text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl font-medium">
                            Masih bingung menentukan kategori yang tepat untuk tim atau siswa Anda? Memiliki pertanyaan
                            seputar regulasi kit robotika, panduan registrasi, atau pendaftaran rombongan sekolah? Tim
                            teknis kami siap membantu Anda.
                        </p>

                        <!-- Highlights -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                            <div
                                class="flex items-center gap-3 p-3.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                                <div
                                    class="w-9 h-9 rounded-lg bg-brand-500/80 flex items-center justify-center text-white shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold text-brand-50">Konsultasi Kategori
                                    Gratis</span>
                            </div>

                            <div
                                class="flex items-center gap-3 p-3.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                                <div
                                    class="w-9 h-9 rounded-lg bg-brand-500/80 flex items-center justify-center text-white shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold text-brand-50">Bimbingan Regulasi
                                    Teknis</span>
                            </div>

                            <div
                                class="flex items-center gap-3 p-3.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                                <div
                                    class="w-9 h-9 rounded-lg bg-brand-500/80 flex items-center justify-center text-white shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold text-brand-50">Delegasi Sekolah &
                                    Komunitas</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col items-start lg:items-end justify-center">
                        <button type="button" id="open-consultation-modal"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4.5 rounded-2xl text-base font-extrabold text-brand-950 bg-white hover:bg-brand-50 shadow-2xl shadow-black/30 hover:scale-105 transition-all duration-300 group cursor-pointer">
                            <span>Hubungi untuk Konsultasi</span>
                            <svg class="w-5 h-5 text-brand-600 group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </button>
                        <p class="text-xs text-brand-200/80 mt-3 text-center lg:text-right w-full sm:w-auto">
                            Respon cepat dari Tim Panitia SRC
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Event Pillars Section with Scroll Fade-In -->
    <section id="pillars" class="py-20 bg-brand-50/70 border-t border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 reveal">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-4 shadow-sm">
                    🏆 Penghargaan & Rekognisi
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-brand-900 tracking-tight">Pilar Utama SRC 2026</h2>
                <p class="text-slate-600 mt-3 text-base sm:text-lg font-medium">
                    Mengapresiasi keunggulan inovasi, penguasaan teknologi, dan potensi akademik generasi masa depan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pillar 1 -->
                <div
                    class="p-8 rounded-3xl bg-white border-2 border-brand-100 hover:border-brand-500 transition-all duration-300 shadow-lg hover:shadow-xl shadow-brand-500/5 group reveal delay-100">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-13 h-13 rounded-2xl bg-brand-50 border border-brand-200 flex items-center justify-center text-brand-500 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                        </div>
                        <span
                            class="px-3.5 py-1 rounded-full bg-brand-100 text-brand-700 text-xs font-extrabold tracking-wide">
                            Beasiswa Pendidikan
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-brand-900 mb-3">Beasiswa Pendidikan Prestasi</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pemenang inovator terbaik mendapatkan alokasi beasiswa pendidikan untuk mendukung kelanjutan
                        studi akademik dan riset teknologi.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div
                    class="p-8 rounded-3xl bg-white border-2 border-brand-100 hover:border-brand-500 transition-all duration-300 shadow-lg hover:shadow-xl shadow-brand-500/5 group reveal delay-200">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-13 h-13 rounded-2xl bg-brand-50 border border-brand-200 flex items-center justify-center text-brand-500 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <span
                            class="px-3.5 py-1 rounded-full bg-brand-100 text-brand-700 text-xs font-extrabold tracking-wide">
                            Trofi Kejuaraan
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-brand-900 mb-3">Trofi Kejuaraan Nasional</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Piala dan trofi bergengsi tingkat nasional dianugerahkan bagi juara pertama, kedua, dan ketiga
                        di seluruh kategori kompetisi.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div
                    class="p-8 rounded-3xl bg-white border-2 border-brand-100 hover:border-brand-500 transition-all duration-300 shadow-lg hover:shadow-xl shadow-brand-500/5 group reveal delay-300">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-13 h-13 rounded-2xl bg-brand-50 border border-brand-200 flex items-center justify-center text-brand-500 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span
                            class="px-3.5 py-1 rounded-full bg-brand-100 text-brand-700 text-xs font-extrabold tracking-wide">
                            Sertifikasi Resmi
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-brand-900 mb-3">Sertifikat Resmi PRSI & Kampus</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Sertifikat resmi bertaraf nasional yang ditandatangani oleh Perkumpulan Robotika Seluruh
                        Indonesia (PRSI) dan Universitas Nusa Putra untuk seluruh peserta terverifikasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: 3 Partner Sections (Right before Venue & Location) -->
    @php
        // Helper function to scan valid image files in a folder
        $scanImages = function ($subfolder) {
            $folderPath = public_path('images/' . $subfolder);
            if (!is_dir($folderPath)) {
                return [];
            }
            $allFiles = glob($folderPath . '/*.*');
            if (!$allFiles) {
                return [];
            }
            return array_filter($allFiles, function ($file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                return in_array($ext, ['png', 'jpg', 'jpeg', 'svg', 'webp', 'gif']);
            });
        };

        $organizerImages = $scanImages('organizers');
        $mediaPartnerImages = $scanImages('media-partners');
        $sponsorImages = $scanImages('sponsors');
    @endphp

    <section id="partners" class="py-20 bg-white border-t border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

            <!-- 1. Organizer & Supporter -->
            <div class="reveal">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-3">
                        🤝 Jaringan Kolaborasi
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-brand-900 tracking-tight">Penyelenggara & Pendukung
                    </h2>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">Diselenggarakan berkolaborasi dengan institusi
                        akademik dan organisasi robotika nasional.</p>
                </div>

                @if(count($organizerImages) > 0)
                    <!-- Image Cards / Carousel Grid -->
                    <div
                        class="flex flex-wrap items-center justify-center gap-6 p-6 rounded-3xl bg-brand-50/50 border border-brand-100">
                        @foreach($organizerImages as $filePath)
                            @php $filename = basename($filePath); @endphp
                            <div
                                class="h-24 sm:h-28 w-44 sm:w-56 p-4 rounded-2xl bg-white border-2 border-brand-100 shadow-sm hover:shadow-md hover:border-brand-400 hover:-translate-y-1 transition-all flex items-center justify-center group">
                                <img src="{{ asset('images/organizers/' . $filename) }}" alt="Logo Penyelenggara / Pendukung"
                                    class="max-h-full max-w-full object-contain transition-all duration-300" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Placeholder Box -->
                    <div class="p-8 sm:p-10 rounded-3xl bg-brand-50/60 border-2 border-dashed border-brand-200 text-center">
                        <div
                            class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-brand-900">Penyelenggara & Pendukung</h3>
                        <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">
                            Tambahkan file logo ke dalam <code
                                class="px-2 py-0.5 rounded bg-brand-100 text-brand-700 font-mono text-[11px]">public/images/organizers</code>
                            untuk menampilkannya secara otomatis.
                        </p>
                    </div>
                @endif
            </div>

            <!-- 2. Media Partner -->
            <div class="reveal delay-100">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-3">
                        📢 Publikasi Media
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-brand-900 tracking-tight">Media Partner</h2>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">Media publikasi resmi yang meliput jalannya
                        kompetisi SRC 2026.</p>
                </div>

                @if(count($mediaPartnerImages) > 0)
                    <!-- Image Cards / Carousel Grid -->
                    <div
                        class="flex flex-wrap items-center justify-center gap-6 p-6 rounded-3xl bg-brand-50/50 border border-brand-100">
                        @foreach($mediaPartnerImages as $filePath)
                            @php $filename = basename($filePath); @endphp
                            <div
                                class="h-24 sm:h-28 w-44 sm:w-56 p-4 rounded-2xl bg-white border-2 border-brand-100 shadow-sm hover:shadow-md hover:border-brand-400 hover:-translate-y-1 transition-all flex items-center justify-center group">
                                <img src="{{ asset('images/media-partners/' . $filename) }}" alt="Logo Media Partner"
                                    class="max-h-full max-w-full object-contain transition-all duration-300" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Placeholder Box -->
                    <div class="p-8 sm:p-10 rounded-3xl bg-brand-50/60 border-2 border-dashed border-brand-200 text-center">
                        <div
                            class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-brand-900">Media Partner</h3>
                        <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">
                            Tambahkan file logo ke dalam <code
                                class="px-2 py-0.5 rounded bg-brand-100 text-brand-700 font-mono text-[11px]">public/images/media-partners</code>
                            untuk menampilkannya secara otomatis.
                        </p>
                    </div>
                @endif
            </div>

            <!-- 3. Sponsor -->
            <div class="reveal delay-200">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-3">
                        💎 Sponsor & Mitra Industri
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black text-brand-900 tracking-tight">Sponsor</h2>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">Apresiasi khusus kepada mitra perusahaan dan
                        pendukung teknologi turnamen.</p>
                </div>

                @if(count($sponsorImages) > 0)
                    <!-- Image Cards / Carousel Grid -->
                    <div
                        class="flex flex-wrap items-center justify-center gap-6 p-6 rounded-3xl bg-brand-50/50 border border-brand-100">
                        @foreach($sponsorImages as $filePath)
                            @php $filename = basename($filePath); @endphp
                            <div
                                class="h-24 sm:h-28 w-44 sm:w-56 p-4 rounded-2xl bg-white border-2 border-brand-100 shadow-sm hover:shadow-md hover:border-brand-400 hover:-translate-y-1 transition-all flex items-center justify-center group">
                                <img src="{{ asset('images/sponsors/' . $filename) }}" alt="Logo Sponsor"
                                    class="max-h-full max-w-full object-contain transition-all duration-300" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Placeholder Box -->
                    <div class="p-8 sm:p-10 rounded-3xl bg-brand-50/60 border-2 border-dashed border-brand-200 text-center">
                        <div
                            class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 mx-auto flex items-center justify-center mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-sm sm:text-base font-bold text-brand-900">Sponsor</h3>
                        <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">
                            Tambahkan file logo ke dalam <code
                                class="px-2 py-0.5 rounded bg-brand-100 text-brand-700 font-mono text-[11px]">public/images/sponsors</code>
                            untuk menampilkannya secara otomatis.
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </section>

    <!-- Section 4: Interactive Map Card Container (#location) -->
    <section id="location" class="py-20 bg-white border-t border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 reveal">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-4">
                    <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Lokasi & Tempat Acara
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-brand-900 tracking-tight">Universitas Nusa Putra (Tuan
                    Rumah)</h2>
                <p class="text-slate-600 mt-3 text-base sm:text-lg font-medium">
                    Berlokasi di Sukabumi, Jawa Barat. Akses strategis dan ramah bagi rombongan peserta dari seluruh
                    Indonesia.
                </p>
            </div>

            <!-- Feature Card Wrapper -->
            <div class="bg-brand-50/60 border-2 border-brand-100 rounded-3xl p-6 lg:p-8 shadow-xl reveal reveal-scale">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <!-- Left Column: Venue Details -->
                    <div class="lg:col-span-4 space-y-6">
                        <div class="p-6 rounded-2xl bg-white border border-brand-200 space-y-5 shadow-md">
                            <div>
                                <!-- Event Schedule Badge -->
                                <span
                                    class="px-3 py-1 rounded-md bg-brand-500 text-white text-xs font-extrabold uppercase tracking-wider inline-block mb-3">
                                    29–30 Agustus 2026
                                </span>
                                <h3 class="text-2xl font-extrabold text-brand-900">Universitas Nusa Putra</h3>
                                <p class="text-slate-600 text-xs sm:text-sm mt-1 font-semibold">Tuan Rumah Resmi
                                    Sukabumi Robotic Competition</p>
                            </div>

                            <div class="space-y-4 pt-3 border-t border-brand-100 text-xs sm:text-sm text-slate-700">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-brand-100 flex items-center justify-center text-brand-600 shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0v-5a2 2 0 012-2h2a2 2 0 012 2v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-bold text-brand-900 block">Tempat Acara</span>
                                        <span class="text-slate-600">Gedung Universitas Nusa Putra, Sukabumi, Jawa
                                            Barat</span>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-brand-100 flex items-center justify-center text-brand-600 shrink-0 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="font-bold text-brand-900 block">Alamat Lengkap</span>
                                        <span class="text-slate-600">Jl. Cibolang Kaler No. 21, Cisaat, Sukabumi</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Direct Google Maps Button -->
                            <div class="pt-4 border-t border-brand-100">
                                <a href="https://maps.google.com/?q=Nusa+Putra+University+Sukabumi" target="_blank"
                                    rel="noopener noreferrer"
                                    class="w-full inline-flex items-center justify-center px-5 py-3 rounded-xl text-xs font-bold text-white bg-brand-500 hover:bg-brand-600 shadow-md shadow-brand-500/25 transition-all duration-300">
                                    Navigasi Langsung Google Maps
                                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Framed Map Container -->
                    <div class="lg:col-span-8">
                        <div class="overflow-hidden rounded-2xl border-2 border-brand-200 shadow-lg relative bg-white">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13280.00680561061!2d106.86932548505801!3d-6.907367426450399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6836505836505836821d%3A0x619b6e8271f232cc!2sNusa%20Putra%20University!5e0!3m2!1sen!2sid!4v1791195636120!5m2!1sen!2sid"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="strict-origin-when-cross-origin"
                                title="Lokasi Google Maps Universitas Nusa Putra"
                                class="w-full h-[350px] sm:h-[450px] rounded-2xl">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: FAQ (Frequently Asked Questions) -->
    <section id="faq" class="py-20 bg-brand-50/60 border-t border-brand-100 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14 reveal">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-brand-200 text-brand-600 text-xs font-extrabold uppercase tracking-wider mb-4 shadow-sm">
                    ❓ Pusat Bantuan & Informasi
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-brand-900 tracking-tight">Pertanyaan yang Sering
                    Diajukan (FAQ)</h2>
                <p class="text-slate-600 mt-3 text-base sm:text-lg font-medium">
                    Temukan jawaban cepat atas pertanyaan umum seputar pelaksanaan Sukabumi Robotic Competition 2026.
                </p>
            </div>

            <!-- FAQ Accordion List -->
            <div class="space-y-4 reveal">
                @php
                    $faqs = [
                        [
                            'q' => 'Apa itu Sukabumi Robotic Competition (SRC) 2026?',
                            'a' => 'Sukabumi Robotic Competition (SRC) 2026 adalah turnamen robotika tingkat nasional tahunan yang diselenggarakan oleh Sukarobot Academy berkolaborasi dengan Universitas Nusa Putra dan Perkumpulan Robotika Seluruh Indonesia (PRSI) untuk mengasah minat, bakat, serta inovasi generasi muda di bidang robotika, otomatisasi, dan Artificial Intelligence.'
                        ],
                        [
                            'q' => 'Siapa saja yang dapat berpartisipasi dalam SRC 2026?',
                            'a' => 'Kompetisi ini terbuka untuk berbagai jenjang pendidikan mulai dari tingkat TK, SD/MI, SMP/MTs, SMA/SMK/MA, hingga mahasiswa dan umum sesuai kategori lomba yang dipilih (format Tim maupun Individu).'
                        ],
                        [
                            'q' => 'Bagaimana cara mendaftar dan apakah ada promo Early Bird?',
                            'a' => 'Pendaftaran dapat dilakukan secara langsung dengan menghubungi Panitia Perlombaan atau Panitia Bendahara melalui WhatsApp. Peserta yang mendaftar pada periode awal berhak memperoleh potongan harga promo Early Bird sesuai ketentuan masing-masing kategori lomba.'
                        ],
                        [
                            'q' => 'Apakah kit robotika disediakan oleh panitia atau peserta membawa mandiri?',
                            'a' => 'Untuk kategori tertentu (seperti Fast Building TK dan Fast Building SD), kit balok disediakan langsung oleh panitia di meja pertandingan. Sementara untuk kategori kreasi dan autonomous (seperti Creative Innovation, Line Follower, Robot Soccer, dan Sumo 1 KG), peserta membawa robot/kit rakitan sendiri sesuai batasan regulasi teknis resmi SRC 2026.'
                        ],
                        [
                            'q' => 'Apakah seluruh peserta akan mendapatkan sertifikat?',
                            'a' => 'Ya, setiap peserta yang terdaftar resmi dan berpartisipasi dalam kompetisi akan memperoleh Sertifikat Resmi bertaraf nasional yang disahkan langsung oleh Perkumpulan Robotika Seluruh Indonesia (PRSI) dan Universitas Nusa Putra.'
                        ],
                        [
                            'q' => 'Apakah sekolah / institusi dapat mendaftarkan rombongan peserta dalam jumlah banyak?',
                            'a' => 'Tentu saja. Sekolah atau lembaga bimbingan/komunitas robotika dapat mendaftarkan delegasi rombongan secara kolektif. Anda dapat menghubungi Panitia Bendahara untuk penerbitan invoice resmi atau penyesuaian teknis rombongan.'
                        ]
                    ];
                @endphp

                @foreach($faqs as $idx => $faq)
                    <div
                        class="faq-item rounded-2xl bg-white border-2 border-brand-100 hover:border-brand-300 transition-all duration-300 shadow-sm overflow-hidden group">
                        <button type="button"
                            class="faq-toggle w-full text-left p-5 sm:p-6 flex items-center justify-between gap-4 font-black text-brand-950 text-base sm:text-lg focus:outline-none cursor-pointer">
                            <span class="flex items-center gap-3">
                                <span
                                    class="w-7 h-7 rounded-xl bg-brand-50 text-brand-600 font-extrabold text-xs flex items-center justify-center shrink-0 border border-brand-200">
                                    {{ $idx + 1 }}
                                </span>
                                <span>{{ $faq['q'] }}</span>
                            </span>
                            <span
                                class="faq-icon w-8 h-8 rounded-full bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 transition-transform duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div
                            class="faq-content hidden px-5 sm:px-6 pb-6 pt-1 text-slate-600 text-sm sm:text-base leading-relaxed border-t border-brand-50">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Still have questions banner -->
            <div class="mt-12 text-center p-8 rounded-3xl bg-white border-2 border-brand-100 shadow-md reveal">
                <h3 class="text-xl font-black text-brand-900 mb-2">Masih memiliki pertanyaan lain seputar SRC 2026?</h3>
                <p class="text-slate-600 text-sm max-w-xl mx-auto mb-6">
                    Tim panitia kami selalu siap memberikan bimbingan dan penjelasan lengkap untuk tim atau instansi
                    Anda.
                </p>
                <button type="button"
                    class="open-consultation-trigger inline-flex items-center gap-2.5 px-6 py-3 rounded-xl text-sm font-extrabold text-white bg-brand-500 hover:bg-brand-600 shadow-lg shadow-brand-500/25 transition-all hover:scale-105 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span>Hubungi Kontak Panitia WhatsApp</span>
                </button>
            </div>
        </div>
    </section>

    @php
        // NOMOR WHATSAPP RESMI PANITIA SRC 2026 (Format: 628xxxxxxxxxx)
        $waPerlombaan = '6281234567890'; // WhatsApp Perlombaan
        $waBendahara = '6281234567891'; // WhatsApp Panitia Bendahara
        $waAcara = '6281234567892'; // WhatsApp Panitia Acara
    @endphp

    <!-- Interactive Consultation Pop-up Modal with 3 WhatsApp Action Buttons -->
    <div id="consultation-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 overflow-y-auto" role="dialog"
        aria-modal="true">
        <!-- Backdrop -->
        <div id="consultation-backdrop"
            class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity opacity-0"></div>

        <!-- Modal Dialog Box -->
        <div id="consultation-panel"
            class="relative bg-white w-full max-w-lg rounded-3xl shadow-2xl border-2 border-brand-100 p-6 sm:p-8 transform scale-95 opacity-0 transition-all duration-300 z-10 my-8">
            <!-- Header -->
            <div class="flex items-start justify-between pb-5 border-b border-brand-100">
                <div class="flex items-center gap-3">
                    <div
                        class="w-11 h-11 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-brand-900">Pusat Konsultasi & Bantuan</h3>
                        <p class="text-xs text-slate-500 font-medium">Hubungi panitia resmi melalui WhatsApp langsung
                        </p>
                    </div>
                </div>
                <button type="button" id="close-consultation-modal"
                    class="text-slate-400 hover:text-slate-600 p-2 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- 3 WhatsApp Action Buttons Container -->
            <div class="space-y-3.5 pt-6">
                <!-- 1st Button: WhatsApp Perlombaan -->
                <a href="https://wa.me/{{ $waPerlombaan }}?text={{ urlencode('Halo Panitia Perlombaan SRC 2026, saya ingin konsultasi mengenai kategori dan regulasi teknis perlombaan.') }}"
                    target="_blank" rel="noopener noreferrer"
                    class="group w-full p-4.5 rounded-2xl bg-gradient-to-r from-brand-50 to-white hover:from-brand-500 hover:to-brand-600 border-2 border-brand-200 hover:border-brand-500 transition-all duration-300 shadow-sm hover:shadow-lg flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div
                            class="w-12 h-12 rounded-xl bg-brand-500 group-hover:bg-white text-white group-hover:text-brand-600 flex items-center justify-center shrink-0 transition-colors shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-2">
                                <span
                                    class="text-sm font-black text-brand-900 group-hover:text-white transition-colors">WhatsApp
                                    Perlombaan</span>
                                <span
                                    class="px-2 py-0.5 rounded bg-brand-100 group-hover:bg-white/20 text-brand-700 group-hover:text-white text-[10px] font-black uppercase">Kategori
                                    & Regulasi</span>
                            </div>
                            <p class="text-xs text-slate-500 group-hover:text-brand-100 transition-colors mt-0.5">
                                Pertanyaan seputar kategori lomba, regulasi teknis, & panduan peserta.</p>
                        </div>
                    </div>
                    <div
                        class="text-brand-500 group-hover:text-white group-hover:translate-x-1 transition-all shrink-0 ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- 2nd Button: WhatsApp Panitia Bendahara -->
                <a href="https://wa.me/{{ $waBendahara }}?text={{ urlencode('Halo Panitia Bendahara SRC 2026, saya ingin bertanya mengenai pembayaran pendaftaran dan invoice.') }}"
                    target="_blank" rel="noopener noreferrer"
                    class="group w-full p-4.5 rounded-2xl bg-gradient-to-r from-emerald-50/70 to-white hover:from-emerald-600 hover:to-emerald-700 border-2 border-emerald-200 hover:border-emerald-600 transition-all duration-300 shadow-sm hover:shadow-lg flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div
                            class="w-12 h-12 rounded-xl bg-emerald-600 group-hover:bg-white text-white group-hover:text-emerald-700 flex items-center justify-center shrink-0 transition-colors shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-2">
                                <span
                                    class="text-sm font-black text-slate-900 group-hover:text-white transition-colors">WhatsApp
                                    Panitia Bendahara</span>
                                <span
                                    class="px-2 py-0.5 rounded bg-emerald-100 group-hover:bg-white/20 text-emerald-800 group-hover:text-white text-[10px] font-black uppercase">Pembayaran</span>
                            </div>
                            <p class="text-xs text-slate-500 group-hover:text-emerald-100 transition-colors mt-0.5">
                                Konfirmasi transfer, promo Early Bird, kuitansi resmi, & invoice.</p>
                        </div>
                    </div>
                    <div
                        class="text-emerald-600 group-hover:text-white group-hover:translate-x-1 transition-all shrink-0 ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- 3rd Button: WhatsApp Panitia Acara -->
                <a href="https://wa.me/{{ $waAcara }}?text={{ urlencode('Halo Panitia Acara SRC 2026, saya ingin bertanya seputar jadwal kegiatan, lokasi, dan kemitraan.') }}"
                    target="_blank" rel="noopener noreferrer"
                    class="group w-full p-4.5 rounded-2xl bg-gradient-to-r from-cyan-50/70 to-white hover:from-cyan-600 hover:to-cyan-700 border-2 border-cyan-200 hover:border-cyan-600 transition-all duration-300 shadow-sm hover:shadow-lg flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div
                            class="w-12 h-12 rounded-xl bg-cyan-600 group-hover:bg-white text-white group-hover:text-cyan-700 flex items-center justify-center shrink-0 transition-colors shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-2">
                                <span
                                    class="text-sm font-black text-slate-900 group-hover:text-white transition-colors">Panitia
                                    Acara & Rundown</span>
                                <span
                                    class="px-2 py-0.5 rounded bg-cyan-100 group-hover:bg-white/20 text-cyan-800 group-hover:text-white text-[10px] font-black uppercase">Jadwal
                                    & Venue</span>
                            </div>
                            <p class="text-xs text-slate-500 group-hover:text-cyan-100 transition-colors mt-0.5">Rundown
                                acara, akomodasi, venue Universitas Nusa Putra, & sponsorship.</p>
                        </div>
                    </div>
                    <div
                        class="text-cyan-600 group-hover:text-white group-hover:translate-x-1 transition-all shrink-0 ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Modal Footer Note -->
            <div class="mt-6 pt-4 border-t border-brand-100 flex items-center justify-between text-xs text-slate-400">
                <span>Sukabumi Robotic Competition 2026</span>
                <button type="button" id="cancel-consultation-modal"
                    class="font-bold text-brand-600 hover:text-brand-700 cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</x-app-layout>