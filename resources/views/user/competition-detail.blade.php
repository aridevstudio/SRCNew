<x-app-layout>
    <!-- Top Breadcrumb Banner with 1:1 Preview Image -->
    <div class="bg-brand-900 text-white py-10 sm:py-12 border-b border-brand-800 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-20">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-brand-400 rounded-full blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-cyan-400 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Navigation Back Button & Breadcrumbs -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <a href="{{ route('home') }}#categories" 
                   class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-brand-200 hover:text-white bg-white/10 hover:bg-white/15 px-4 py-2 rounded-xl transition-colors border border-white/10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Semua Kategori</span>
                </a>

                <div class="flex items-center gap-2 text-xs font-semibold text-brand-200">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
                    <span>/</span>
                    <a href="{{ route('home') }}#categories" class="hover:text-white transition-colors">Kategori</a>
                    <span>/</span>
                    <span class="text-white font-bold">{{ $competition['name'] }}</span>
                </div>
            </div>

            <!-- Hero Main Info: 1:1 Aspect Ratio Photo Preview (Left) + Details (Right) -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 sm:gap-8 lg:gap-10 items-center">
                <!-- Left: 1:1 Aspect Ratio Photo Preview -->
                <div class="md:col-span-4 lg:col-span-3">
                    <div class="aspect-square w-full max-w-[240px] sm:max-w-[260px] md:max-w-none mx-auto rounded-3xl overflow-hidden bg-brand-800/80 border-2 border-white/20 shadow-2xl relative group">
                        @if(!empty($competition['image']))
                            <img src="{{ $competition['image'] }}" 
                                 alt="{{ $competition['name'] }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-brand-800 to-brand-950 p-6 text-center\'><span class=\'text-5xl mb-2\'>🤖</span><span class=\'text-xs text-brand-200 font-bold\'>SRC 2026</span></div>';" />
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-brand-800 to-brand-950 p-6 text-center">
                                <span class="text-5xl mb-2">🤖</span>
                                <span class="text-xs text-brand-200 font-bold">SRC 2026</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right: Meta Badges, Title & Tagline -->
                <div class="md:col-span-8 lg:col-span-9 space-y-3 sm:space-y-4">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider {{ $competition['type'] === 'Tim' ? 'bg-cyan-400/20 text-cyan-300 border border-cyan-400/30' : 'bg-amber-400/20 text-amber-300 border border-amber-400/30' }}">
                            {{ $competition['type'] === 'Tim' ? '👥 FORMAT: TIM' : '👤 FORMAT: INDIVIDU' }}
                        </span>
                        <span class="px-3.5 py-1 rounded-full text-xs font-bold bg-white/10 text-brand-100 border border-white/15">
                            🎯 {{ $competition['category_badge'] }}
                        </span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
                        {{ $competition['name'] }}
                    </h1>
                    <p class="text-base sm:text-lg text-brand-100/90 max-w-3xl font-medium leading-relaxed">
                        {{ $competition['tagline'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Detail Content -->
    <div class="py-14 sm:py-20 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
                
                <!-- Left Column: Detailed Information -->
                <div class="lg:col-span-8 space-y-10">
                    
                    <!-- Section: Overview -->
                    <div class="p-8 rounded-3xl bg-white border-2 border-brand-100 shadow-sm space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-black text-brand-900">Deskripsi & Konsep Perlombaan</h2>
                        </div>
                        <p class="text-slate-700 leading-relaxed text-base font-normal">
                            {{ $competition['description'] }}
                        </p>
                    </div>

                    <!-- Section: Evaluation & Criteria -->
                    <div class="p-8 rounded-3xl bg-white border-2 border-brand-100 shadow-sm space-y-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-black text-brand-900">Kriteria & Aspek Penilaian</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2">
                            @foreach($competition['evaluation_points'] as $index => $point)
                                <div class="flex items-start gap-3 p-4 rounded-2xl bg-brand-50/70 border border-brand-200/80">
                                    <div class="w-6 h-6 rounded-full bg-brand-500 text-white font-black text-xs flex items-center justify-center shrink-0 mt-0.5">
                                        {{ $index + 1 }}
                                    </div>
                                    <span class="text-sm font-bold text-brand-950">{{ $point }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Section: Technical Specifications (Juknis Google Drive Button) -->
                    <div class="p-8 rounded-3xl bg-white border-2 border-brand-100 shadow-sm space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-black text-brand-900">Ketentuan Teknis & Peralatan</h2>
                                <p class="text-xs sm:text-sm text-slate-500 font-medium mt-0.5">Panduan lengkap regulasi teknis, ukuran robot, arena pertandingan, dan tata tertib SRC 2026.</p>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="{{ $competition['juknis_url'] ?? 'https://drive.google.com/' }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl text-sm sm:text-base font-extrabold text-white bg-brand-500 hover:bg-brand-600 shadow-lg shadow-brand-500/25 hover:shadow-brand-500/40 transition-all duration-300 hover:-translate-y-0.5 group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"/>
                                </svg>
                                <span>Cek Dokumen Juknis (Google Drive)</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Registration & Pricing Sticky Card -->
                <div class="lg:col-span-4 lg:sticky lg:top-28 space-y-6">
                    <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-b from-brand-900 via-brand-800 to-brand-950 text-white shadow-2xl border-2 border-brand-700/60 relative overflow-hidden">
                        
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-xs font-black uppercase tracking-wider mb-4">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Pendaftaran Dibuka
                        </div>

                        <h3 class="text-xl font-black text-white mb-2">Biaya Pendaftaran</h3>
                        <p class="text-xs text-brand-200/80 mb-6">Sukabumi Robotic Competition (SRC) 2026</p>

                        <!-- Pricing Breakdown -->
                        <div class="p-4.5 rounded-2xl bg-white/10 border border-white/15 backdrop-blur-sm space-y-3 mb-6">
                            <div class="flex items-baseline justify-between border-b border-white/10 pb-3">
                                <div>
                                    <span class="text-xs text-brand-200 font-semibold block">Promo Early Bird</span>
                                    <span class="text-2xl sm:text-3xl font-black text-cyan-300">{{ $competition['price_early'] }}</span>
                                </div>
                                <span class="px-2 py-0.5 rounded bg-cyan-400 text-brand-950 text-[10px] font-black uppercase">Hemat</span>
                            </div>

                            <div class="flex items-center justify-between text-xs text-brand-200/90 pt-1">
                                <span>Harga Normal:</span>
                                <span class="line-through text-brand-300 font-bold">{{ $competition['price_normal'] }}</span>
                            </div>
                        </div>

                        <!-- Summary Meta List (Without Certificate) -->
                        <div class="space-y-3 text-xs sm:text-sm text-brand-100 mb-6">
                            <div class="flex items-center justify-between py-1.5 border-b border-white/10">
                                <span class="text-brand-300">Format:</span>
                                <span class="font-bold text-white">{{ $competition['team_size'] }}</span>
                            </div>
                            <div class="flex items-center justify-between py-1.5 border-b border-white/10">
                                <span class="text-brand-300">Sasaran Peserta:</span>
                                <span class="font-bold text-white text-right">{{ $competition['category_badge'] }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <a href="{{ route('competitions.checkout', $competition['slug']) }}"
                               class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl text-sm font-extrabold text-brand-950 bg-white hover:bg-brand-50 shadow-xl transition-all duration-300 hover:scale-[1.02]">
                                <span>Registrasi</span>
                            </a>

                            <a href="{{ route('home') }}#consultation" 
                               class="w-full inline-flex items-center justify-center px-6 py-3 rounded-xl text-xs font-bold text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-all">
                                💬 Butuh Konsultasi Kategori?
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Competitions Carousel / Grid -->
            @if(count($otherCompetitions) > 0)
                <div class="mt-20 pt-16 border-t border-brand-100">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="text-xs font-extrabold text-brand-600 uppercase tracking-wider block">Kategori Lainnya</span>
                            <h3 class="text-2xl sm:text-3xl font-black text-brand-900">Jelajahi Perlombaan Lain di SRC 2026</h3>
                        </div>
                        <a href="{{ route('home') }}#categories" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-brand-600 hover:text-brand-700">
                            Lihat Semua (10 Kategori) →
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($otherCompetitions as $other)
                            <div 
                                onclick="window.location='{{ route('competitions.show', $other['slug']) }}'"
                                onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault(); window.location='{{ route('competitions.show', $other['slug']) }}';}"
                                tabindex="0"
                                role="link"
                                aria-label="Lihat detail kategori {{ $other['name'] }}"
                                class="p-6 rounded-2xl bg-white border-2 border-brand-100 hover:border-brand-500 hover:-translate-y-1 transition-all duration-300 shadow-sm hover:shadow-lg flex flex-col justify-between group cursor-pointer focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                                <div>
                                    <!-- Preview Image with Fallback -->
                                    <div class="aspect-video w-full rounded-xl overflow-hidden bg-brand-50 border border-brand-100 mb-4 relative">
                                        @if(!empty($other['image']))
                                            <img src="{{ $other['image'] }}" 
                                                 alt="{{ $other['name'] }}"
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                 onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-brand-100 to-brand-50 p-3 text-center\'><span class=\'text-2xl mb-1\'>🤖</span><span class=\'text-[10px] font-bold text-brand-700\'>{{ addslashes($other['name']) }}</span></div>';" />
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-brand-100 to-brand-50 p-3 text-center">
                                                <span class="text-2xl mb-1">🤖</span>
                                                <span class="text-[10px] font-bold text-brand-700">{{ $other['name'] }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase {{ $other['type'] === 'Tim' ? 'bg-cyan-100 text-cyan-800' : 'bg-amber-100 text-amber-800' }}">
                                            {{ $other['type'] }}
                                        </span>
                                        <span class="text-xs font-bold text-slate-400">{{ $other['category_badge'] }}</span>
                                    </div>
                                    <h4 class="text-lg font-black text-brand-900 group-hover:text-brand-600 transition-colors mb-2">
                                        {{ $other['name'] }}
                                    </h4>
                                    <p class="text-slate-600 text-xs leading-relaxed line-clamp-2 mb-4">
                                        {{ $other['tagline'] }}
                                    </p>
                                </div>
                                <a href="{{ route('competitions.show', $other['slug']) }}" 
                                   onclick="event.stopPropagation();"
                                   class="pt-3 border-t border-brand-100 text-xs font-bold text-brand-600 group-hover:text-brand-700 flex items-center justify-between">
                                    <span>Lihat Detail Kategori</span>
                                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
