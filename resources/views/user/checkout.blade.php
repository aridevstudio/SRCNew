<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pendaftaran {{ $competition['name'] ?? 'Lomba Robotik' }} - SRC 2026</title>

    <!-- Tailwind CSS & Vite Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* State pilihan dikendalikan lewat aria-pressed */
        .method-btn[aria-pressed="true"] { border: 2px solid #044A9C; background: #eff6ff; }
        .method-btn[aria-pressed="false"] { border: 1px solid #cbd5e1; background: #fff; }
        .method-btn[aria-pressed="false"]:hover { border-color: #044A9C; }
        .method-btn[aria-pressed="true"] .icon-box { background: #044A9C; color: #fff; }
        .method-btn[aria-pressed="false"] .icon-box { background: #f1f5f9; color: #475569; }

        .sub-btn[aria-pressed="true"] { border: 2px solid #044A9C; background: #eff6ff; color: #0f172a; }
        .sub-btn[aria-pressed="false"] { border: 1px solid #cbd5e1; background: #fff; color: #334155; }
        .sub-btn[aria-pressed="false"]:hover { border-color: #044A9C; }

        @keyframes reveal-registration-form {
            from { opacity: .55; transform: translateX(-2rem); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes subtle-pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .animate-subtle-pulse {
            animation: subtle-pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }

        @media (min-width: 768px) and (prefers-reduced-motion: no-preference) {
            .registration-panel { animation: reveal-registration-form .6s cubic-bezier(.22, 1, .36, 1) .05s both; }
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased selection:bg-[#044A9C] selection:text-white">

    @php
        $compType = $competition['type'] ?? 'Tim';
        $isTeam = (strtolower($compType) === 'tim');
        $rawPrice = $competition['price_early'] ?? ($competition['price_normal'] ?? 'Rp 100.000');
        $unitPrice = (int) preg_replace('/[^0-9]/', '', $rawPrice) ?: 100000;
        $unitPriceFormatted = 'Rp ' . number_format($unitPrice, 0, ',', '.');
    @endphp

    <section class="min-h-screen w-full bg-white">
        <div class="grid min-h-screen md:grid-cols-2 md:items-start">

            {{-- ================= SISI KIRI ================= --}}
            <div class="relative isolate flex min-h-[440px] flex-col overflow-hidden bg-[#044A9C] p-8 text-white sm:p-10 md:sticky md:top-0 md:z-20 md:h-screen md:min-h-0 md:bg-white md:pr-20 lg:p-12 lg:pr-24">

                {{-- Tepi bergelombang pemisah kiri & kanan (hanya md ke atas) --}}
                <svg aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 hidden h-full w-full md:block" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="panel-blue" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#0A5CBA" />
                            <stop offset="55%" stop-color="#044A9C" />
                            <stop offset="100%" stop-color="#033777" />
                        </linearGradient>
                        <pattern id="panel-dots" width="4" height="4" patternUnits="userSpaceOnUse"><circle cx="1" cy="1" r=".22" fill="#fff" fill-opacity=".18" /></pattern>
                    </defs>
                    <path d="M0 0H77C82 0 84 4 86 10C90 22 94 35 97 46C100 56 98 61 91 67C83 74 77 79 71 85C66 90 66 95 72 100H0Z" fill="url(#panel-blue)" />
                    <path d="M0 0H77C82 0 84 4 86 10C90 22 94 35 97 46C100 56 98 61 91 67C83 74 77 79 71 85C66 90 66 95 72 100H0Z" fill="url(#panel-dots)" />
                    <path d="M-8 69C16 57 29 75 52 62S77 49 91 57" fill="none" stroke="#fff" stroke-opacity=".14" stroke-width=".35" />
                    <path d="M-8 76C15 64 30 82 53 69S78 56 94 64" fill="none" stroke="#fff" stroke-opacity=".1" stroke-width=".35" />
                </svg>

                {{-- Dekorasi statis: jalur sirkuit bertema robotik --}}
                <svg aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 h-full w-full text-white md:w-[76%]" viewBox="0 0 400 800" preserveAspectRatio="xMinYMax slice" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <g stroke-opacity=".16" stroke-width="1.5">
                        <path d="M0 560H70L100 590H190L215 615H290" />
                        <path d="M0 595H48L78 625H150L175 650H250" />
                        <path d="M0 630H30L58 658H120" />
                        <path d="M40 800V735L70 705V680" />
                        <path d="M110 800V750L140 720" />
                        <path d="M300 60H350V110" />
                        <path d="M265 60H300" />
                        <rect x="338" y="110" width="24" height="24" rx="4" />
                    </g>
                    <g fill="currentColor" fill-opacity=".22" stroke="none">
                        <circle cx="290" cy="615" r="4" />
                        <circle cx="250" cy="650" r="4" />
                        <circle cx="120" cy="658" r="4" />
                        <circle cx="70" cy="680" r="4" />
                        <circle cx="140" cy="720" r="4" />
                    </g>
                </svg>

                {{-- Lingkaran dekoratif (statis) --}}
                <div aria-hidden="true" class="pointer-events-none absolute -bottom-24 -left-20 -z-10 h-72 w-72 rounded-full bg-white/10"></div>
                <div aria-hidden="true" class="pointer-events-none absolute -top-16 right-1/4 -z-10 h-40 w-40 rounded-full border border-white/15"></div>

                {{-- Tombol Navigasi Kembali --}}
                <div class="mb-4">
                    <a href="{{ isset($competition['slug']) ? route('competitions.show', $competition['slug']) : route('home') }}" 
                       class="inline-flex items-center gap-2 text-xs font-bold text-blue-100 hover:text-white bg-white/10 hover:bg-white/20 px-3.5 py-1.5 rounded-lg transition-colors border border-white/15">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Kembali ke Detail Lomba</span>
                    </a>
                </div>

                {{-- Judul --}}
                <div class="mt-2 sm:mt-4">
                    <div class="mb-3 flex items-center gap-2 flex-wrap">
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-white/15 px-2.5 py-1 text-xs font-semibold text-blue-100 backdrop-blur-sm border border-white/10">
                            <svg aria-hidden="true" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="8" width="14" height="11" rx="2"/><path d="M12 8V4M9 13h.01M15 13h.01M3 13v2m18-2v2"/></svg>
                            Kategori {{ $competition['type'] ?? 'Tim' }}
                        </span>
                        @if(isset($competition['category_badge']))
                            <span class="inline-flex items-center rounded-md bg-amber-400/20 px-2.5 py-1 text-xs font-semibold text-amber-200 backdrop-blur-sm border border-amber-300/20">
                                {{ $competition['category_badge'] }}
                            </span>
                        @endif
                    </div>
                    <h1 class="max-w-lg text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        {{ $competition['name'] ?? 'Lomba Robotik 2026' }}
                    </h1>
                    <p class="mt-3 text-sm text-blue-100/90 max-w-md font-medium leading-relaxed">
                        {{ $competition['tagline'] ?? 'Sukabumi Robotic Competition 2026' }}
                    </p>
                </div>

                {{-- Satu kartu info tetap di bawah judul; isinya mengikuti fase & metode pembayaran --}}
                <div class="mt-6 flex min-h-[180px] max-w-md flex-col justify-center rounded-xl border border-white/30 bg-white/10 p-5 backdrop-blur-sm">
                    {{-- Info default saat Fase 1 (Data Tim/Peserta) --}}
                    <div id="info-step1">
                        <p class="text-xs font-semibold uppercase tracking-wider text-blue-100">Informasi Pendaftaran</p>
                        <p class="mt-2 text-base font-bold">{{ $competition['team_size'] ?? ($isTeam ? 'Tim (2-3 Orang)' : 'Individu (1 Orang)') }}</p>
                        <p class="mt-2 text-sm leading-6 text-white/90">
                            Biaya registrasi: <strong class="text-white font-bold">{{ $unitPriceFormatted }}</strong> per {{ $isTeam ? 'tim' : 'peserta' }}. Silakan lengkapi data formulir di samping untuk melanjutkan ke pembayaran.
                        </p>
                    </div>

                    {{-- Info saat Fase 2: Otomatis Midtrans --}}
                    <div id="info-auto" class="hidden">
                        <p class="text-xs font-semibold uppercase tracking-wider text-blue-100">Pembayaran otomatis</p>
                        <p class="mt-2 text-base font-bold">Pembayaran dilanjutkan melalui Midtrans</p>
                        <p class="mt-2 text-sm leading-6 text-white/90">Setelah menekan Bayar Sekarang, kamu akan diarahkan ke Midtrans untuk memilih metode (VA, QRIS, GoPay) dan menyelesaikan pembayaran secara instan.</p>
                    </div>

                    {{-- Info saat Fase 2: Manual > Transfer --}}
                    <div id="info-transfer" class="hidden">
                        <p class="text-xs font-semibold uppercase tracking-wider text-blue-100">Transfer ke rekening panitia</p>
                        <p id="bank-name" class="mt-2 text-base font-bold">Bank BCA</p>
                        <div class="mt-3 flex items-center justify-between gap-3">
                            <p id="bank-number" class="font-mono text-2xl font-bold tracking-wider">1234 5678 90</p>
                            <button type="button" id="copy-rek" class="rounded-lg border border-white/40 px-3 py-1.5 text-xs font-semibold text-white hover:bg-white/15 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/70">Salin</button>
                        </div>
                        <p class="mt-3 border-t border-white/20 pt-3 text-xs text-blue-100">a.n. Panitia Sukabumi Robotic Competition 2026</p>
                    </div>

                    {{-- Info saat Fase 2: Manual > Cash --}}
                    <div id="info-cash" class="hidden">
                        <p class="text-xs font-semibold uppercase tracking-wider text-blue-100">Pembayaran tunai</p>
                        <p class="mt-2 text-base font-bold">Bayar langsung ke panitia</p>
                        <p class="mt-2 text-sm leading-6 text-white/90">Silakan lakukan pembayaran tunai ke meja registrasi panitia saat konfirmasi pendaftaran lomba.</p>
                    </div>
                </div>
            </div>

            {{-- ================= SISI KANAN ================= --}}
            <div class="registration-panel relative isolate z-0 flex min-h-screen flex-col justify-start overflow-hidden bg-white p-6 sm:p-10 md:z-10 lg:p-12">

                {{-- Hiasan background halus (statis) --}}
                <div aria-hidden="true" class="pointer-events-none absolute right-0 top-0 -z-10 h-56 w-56 bg-[radial-gradient(#044A9C33_1px,transparent_1px)] [background-size:14px_14px] [mask-image:radial-gradient(circle_at_top_right,#000,transparent_70%)]"></div>
                <div aria-hidden="true" class="pointer-events-none absolute -bottom-24 -right-24 -z-10 h-64 w-64 rounded-full bg-blue-50"></div>
                <div aria-hidden="true" class="pointer-events-none absolute -bottom-10 -right-10 -z-10 h-40 w-40 rounded-full border border-blue-100"></div>
                <svg aria-hidden="true" class="pointer-events-none absolute bottom-0 left-0 -z-10 h-24 w-full text-[#044A9C]/10" viewBox="0 0 400 100" preserveAspectRatio="none" fill="none" stroke="currentColor" stroke-width="1.2">
                    <path d="M0 70C60 40 110 95 180 65S320 40 400 70" />
                    <path d="M0 85C70 58 120 108 190 80S330 56 400 84" />
                </svg>

                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">Checkout Pendaftaran</h2>
                    <a href="{{ isset($competition['slug']) ? route('competitions.show', $competition['slug']) : route('home') }}" class="grid h-8 w-8 place-items-center rounded-full border border-slate-300 text-sm text-slate-500 hover:bg-slate-100 transition-colors" aria-label="Tutup Checkout">×</a>
                </div>

                {{-- STEPPER --}}
                <nav aria-label="Langkah pembayaran" class="mb-7 rounded-xl border border-slate-200 bg-slate-50 px-4 py-4 sm:px-5">
                    <ol class="flex items-start">
                        {{-- Step 1 --}}
                        <li class="flex flex-1 flex-col items-center text-center" id="stepper-step-1">
                            <div class="flex w-full items-center">
                                <span class="flex-1"></span>
                                <span id="stepper-step-1-badge" class="grid h-9 w-9 place-items-center rounded-full border-2 border-[#044A9C] bg-white text-sm font-bold text-[#044A9C]">1</span>
                                <span id="stepper-line-1" class="h-0.5 flex-1 bg-slate-300"></span>
                            </div>
                            <span class="mt-2 text-[11px] font-bold text-slate-900 sm:text-xs">{{ $isTeam ? 'Data Tim' : 'Data Peserta' }}</span>
                            <span id="step1-status" class="hidden text-[10px] text-[#044A9C] sm:block">Sedang diisi</span>
                        </li>

                        {{-- Step 2 --}}
                        <li class="flex flex-1 flex-col items-center text-center" id="stepper-step-2">
                            <div class="flex w-full items-center">
                                <span id="stepper-line-2-left" class="h-0.5 flex-1 bg-slate-300"></span>
                                <span id="stepper-step-2-badge" class="grid h-9 w-9 place-items-center rounded-full border-2 border-slate-300 bg-white text-sm font-bold text-slate-400">2</span>
                                <span id="stepper-line-2" class="h-0.5 flex-1 bg-slate-300"></span>
                            </div>
                            <span class="mt-2 text-[11px] font-semibold text-slate-500 sm:text-xs">Pembayaran</span>
                            <span id="step2-status" class="hidden text-[10px] text-slate-400 sm:block">Menunggu data</span>
                        </li>

                        {{-- Step 3 --}}
                        <li class="flex flex-1 flex-col items-center text-center" id="stepper-step-3">
                            <div class="flex w-full items-center">
                                <span class="h-0.5 flex-1 bg-slate-300"></span>
                                <span id="stepper-step-3-badge" class="grid h-9 w-9 place-items-center rounded-full border-2 border-slate-300 bg-white text-sm font-bold text-slate-400">3</span>
                                <span class="flex-1"></span>
                            </div>
                            <span class="mt-2 text-[11px] font-medium text-slate-500 sm:text-xs">Konfirmasi</span>
                            <span id="step3-note" class="hidden text-[10px] text-slate-400 sm:block">Otomatis</span>
                        </li>
                    </ol>
                </nav>

                {{-- ======================================================== --}}
                {{-- FASE 1: FORM DATA TIM / PESERTA                           --}}
                {{-- ======================================================== --}}
                <div id="section-step-1">
                    <div class="mb-5">
                        <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-[#044A9C]">Langkah 1 dari 2</span>
                        <h3 class="mt-2 text-lg font-bold text-slate-900 sm:text-xl">
                            {{ $isTeam ? 'Data Tim Peserta' : 'Data Peserta Individu' }}
                        </h3>
                        <p class="mt-1 text-xs sm:text-sm text-slate-500">
                            {{ $isTeam ? 'Tentukan jumlah tim yang akan didaftarkan. Form akan menyesuaikan jumlahnya secara dinamis.' : 'Tentukan jumlah peserta yang akan didaftarkan. Lengkapi nama peserta dan asal sekolah.' }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 sm:p-5">
                        <label for="team-count" class="block text-sm font-semibold text-slate-800">
                            {{ $isTeam ? 'Jumlah Tim' : 'Jumlah Peserta' }}
                        </label>
                        <div class="mt-2 flex max-w-xs items-center gap-3">
                            <button type="button" id="count-down" aria-label="Kurangi jumlah" class="grid h-10 w-10 place-items-center rounded-lg border border-slate-300 bg-white text-lg font-bold text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-[#044A9C]/30 transition">−</button>
                            <input id="team-count" type="number" min="1" max="30" value="1" class="h-10 w-24 rounded-lg border border-slate-300 bg-white text-center font-bold text-slate-900 focus:border-[#044A9C] focus:outline-none focus:ring-2 focus:ring-[#044A9C]/20" inputmode="numeric">
                            <button type="button" id="count-up" aria-label="Tambah jumlah" class="grid h-10 w-10 place-items-center rounded-lg border border-slate-300 bg-white text-lg font-bold text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-[#044A9C]/30 transition">+</button>
                        </div>
                        <p class="mt-2 text-xs text-slate-500">
                            Biaya registrasi {{ $unitPriceFormatted }} per {{ $isTeam ? 'tim' : 'peserta' }}.
                        </p>
                    </div>

                    {{-- Dynamic Container for Form Fields --}}
                    <div id="team-fields" class="mt-6 space-y-4"></div>

                    {{-- Estimasi Biaya Step 1 --}}
                    <div class="mt-6 flex items-center justify-between rounded-xl border border-blue-200 bg-blue-50/70 p-4 sm:p-5">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Perkiraan total biaya</p>
                            <p id="step1-price-detail" class="mt-1 text-sm font-bold text-slate-700">1 {{ $isTeam ? 'tim' : 'peserta' }} × {{ $unitPriceFormatted }}</p>
                        </div>
                        <p id="step1-price-total" class="text-xl font-black text-[#044A9C]">{{ $unitPriceFormatted }}</p>
                    </div>

                    <button type="button" id="btn-to-step-2" class="mt-6 flex w-full items-center justify-center gap-2 rounded-xl bg-[#044A9C] px-5 py-4 text-sm font-bold text-white shadow-lg shadow-[#044A9C]/20 transition hover:bg-[#033a7c] focus:outline-none focus:ring-2 focus:ring-[#044A9C] focus:ring-offset-2">
                        <span>Lanjut ke Pembayaran</span>
                        <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                    <p id="step1-error" role="alert" class="mt-3 hidden rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 font-medium"></p>
                </div>

                {{-- ======================================================== --}}
                {{-- FASE 2: PILIHAN METODE PEMBAYARAN & CHECKOUT              --}}
                {{-- ======================================================== --}}
                <div id="section-step-2" class="hidden">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-[#044A9C]">Langkah 2 dari 2</span>
                            <h3 class="mt-1 text-lg font-bold text-slate-900 sm:text-xl">Metode Pembayaran</h3>
                            <p class="text-xs text-slate-500">Pilih cara kamu membayar biaya pendaftaran</p>
                        </div>
                        <button type="button" id="btn-back-to-step-1" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#044A9C] hover:text-[#033a7c] hover:underline">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                            <span>Ubah Data {{ $isTeam ? 'Tim' : 'Peserta' }}</span>
                        </button>
                    </div>

                    {{-- Pilihan utama: Otomatis / Manual --}}
                    <div class="grid grid-cols-2 gap-3" role="group" aria-label="Metode pembayaran">
                        <button type="button" data-method="auto" aria-pressed="true" class="method-btn rounded-xl p-3.5 text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C]/40">
                            <span class="flex items-center gap-2">
                                <span class="icon-box grid h-8 w-8 place-items-center rounded-lg"><svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 4 14h7l-1 8 9-12h-7z"/></svg></span>
                                <span class="text-sm font-semibold text-slate-900">Otomatis</span>
                            </span>
                            <span class="mt-2 block text-[11px] leading-4 text-slate-500">Virtual Account, QRIS, e-wallet via Midtrans</span>
                        </button>
                        <button type="button" data-method="manual" aria-pressed="false" class="method-btn rounded-xl p-3.5 text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C]/40">
                            <span class="flex items-center gap-2">
                                <span class="icon-box grid h-8 w-8 place-items-center rounded-lg"><svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2zM16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg></span>
                                <span class="text-sm font-semibold text-slate-900">Manual</span>
                            </span>
                            <span class="mt-2 block text-[11px] leading-4 text-slate-500">Transfer atau cash, dikonfirmasi panitia</span>
                        </button>
                    </div>

                    {{-- Keterangan Otomatis --}}
                    <p id="note-auto" class="mt-3 flex items-start gap-2 text-xs leading-5 text-slate-500">
                        <svg aria-hidden="true" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-[#044A9C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg>
                        Aman lewat Midtrans. Pembayaran terkonfirmasi otomatis tanpa menunggu persetujuan manual.
                    </p>

                    {{-- Sub-pilihan Manual --}}
                    <div id="manual-options" class="mt-4 hidden">
                        <p class="mb-2 text-xs font-medium text-slate-600">Bayar dengan</p>
                        <div class="grid grid-cols-2 gap-3" role="group" aria-label="Jenis pembayaran manual">
                            <button type="button" data-sub="transfer" aria-pressed="true" class="sub-btn rounded-lg px-4 py-3 text-left text-sm font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C]/40">
                                Transfer Bank
                                <span class="mt-0.5 block text-[11px] font-normal text-slate-500">Ke rekening BCA panitia</span>
                            </button>
                            <button type="button" data-sub="cash" aria-pressed="false" class="sub-btn rounded-lg px-4 py-3 text-left text-sm font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C]/40">
                                Tunai / Cash
                                <span class="mt-0.5 block text-[11px] font-normal text-slate-500">Bayar ke meja panitia</span>
                            </button>
                        </div>

                        {{-- Hanya untuk Transfer --}}
                        <div id="transfer-fields">
                            <p class="mt-3 text-xs leading-5 text-slate-500">Detail nomor rekening dan panduan konfirmasi transfer akan tertera pada saat checkout pendaftaran disubmit.</p>
                        </div>

                        <p class="mt-3 text-xs leading-5 text-slate-500">Pembayaran manual akan diverifikasi oleh panitia lomba.</p>
                    </div>

                    {{-- Voucher --}}
                    <div class="mt-5">
                        <label for="payment-voucher" class="mb-2 block text-sm font-medium text-slate-700">Kode Voucher / Promo</label>
                        <div class="flex gap-2">
                            <input id="payment-voucher" name="voucher" type="text" placeholder="Masukkan kode kupon jika ada" class="min-w-0 flex-1 rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:border-[#044A9C] focus:outline-none focus:ring-2 focus:ring-[#044A9C]/20 uppercase">
                            <button type="button" id="btn-apply-voucher" class="rounded-lg border border-[#044A9C] bg-white px-4 py-3 text-sm font-semibold text-[#044A9C] hover:bg-blue-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C]/40 transition">Terapkan</button>
                        </div>
                    </div>

                    {{-- Rincian harga --}}
                    <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-5">
                        <div class="mb-4 flex items-center justify-between">
                            <h4 class="text-sm font-semibold text-slate-800">Rincian Pembayaran</h4>
                            <span id="summary-count-badge" class="text-xs font-semibold text-[#044A9C] bg-blue-100/70 px-2 py-0.5 rounded">1 {{ $isTeam ? 'tim' : 'peserta' }}</span>
                        </div>
                        <dl class="space-y-3 text-sm">
                            <div class="flex justify-between gap-4 text-slate-500">
                                <dt id="summary-item-label">Biaya pendaftaran ({{ $competition['name'] ?? 'Lomba' }})</dt>
                                <dd id="summary-item-price" class="font-semibold text-slate-900">{{ $unitPriceFormatted }}</dd>
                            </div>
                            <div class="flex justify-between gap-4 text-slate-500">
                                <dt>Biaya Layanan & Pajak</dt>
                                <dd class="font-semibold text-slate-900">Rp0</dd>
                            </div>
                            <div class="flex items-center justify-between gap-4 border-t border-dashed border-slate-300 pt-4 text-base font-bold">
                                <dt class="text-slate-900">Total Pembayaran</dt>
                                <dd id="summary-total-price" class="text-xl font-black text-[#044A9C]">{{ $unitPriceFormatted }}</dd>
                            </div>
                        </dl>
                    </div>

                    {{-- Form submission target --}}
                    <form id="payment-form" method="POST" action="{{ route('payments.store') }}" class="hidden">
                        @csrf
                        <input type="hidden" name="competition_slug" value="{{ $competition['slug'] ?? '' }}">
                        <input id="selected-payment-method" type="hidden" name="payment_method" value="auto">
                        <div id="hidden-participant-inputs"></div>
                    </form>

                    <button type="submit" form="payment-form" class="mt-7 flex w-full items-center justify-center gap-2 rounded-xl bg-[#044A9C] px-5 py-4 text-sm font-bold text-white transition hover:bg-[#033a7c] focus:outline-none focus:ring-2 focus:ring-[#044A9C] focus:ring-offset-2 shadow-lg shadow-[#044A9C]/25 cursor-pointer">
                        <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
                        <span id="pay-label">Bayar Sekarang</span>
                    </button>
                    <p id="payment-error" role="alert" class="mt-3 hidden rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"></p>

                    <ul class="mt-4 flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-[11px] text-slate-500">
                        <li class="inline-flex items-center gap-1.5"><svg aria-hidden="true" class="h-3.5 w-3.5 text-[#044A9C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg>Dienkripsi SSL</li>
                        <li class="inline-flex items-center gap-1.5"><svg aria-hidden="true" class="h-3.5 w-3.5 text-[#044A9C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 4 14h7l-1 8 9-12h-7z"/></svg><span id="trust-confirm">Konfirmasi instan</span></li>
                        <li class="inline-flex items-center gap-1.5"><svg aria-hidden="true" class="h-3.5 w-3.5 text-[#044A9C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>Pembayaran Resmi SRC 2026</li>
                    </ul>

                    <p class="mt-4 text-center text-xs leading-5 text-slate-500">Dengan melakukan pendaftaran & pembayaran, Anda menyetujui <a href="#" class="text-[#044A9C] underline underline-offset-2 hover:text-[#033a7c]">syarat &amp; ketentuan</a> lomba.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- FASE 3: MODAL KONFIRMASI PEMBAYARAN                      --}}
    {{-- ======================================================== --}}
    <div id="approval-modal" class="fixed inset-0 z-[100] hidden items-center justify-center overflow-y-auto bg-slate-950/50 p-4 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="approval-title" aria-hidden="true">
        <div class="relative my-auto w-full max-w-lg overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-2xl shadow-slate-950/20">
            <div class="h-2 w-full bg-gradient-to-r from-[#0A5CBA] via-[#044A9C] to-[#033777]"></div>
            <div class="p-6 sm:p-8">
                <div class="flex justify-end -mt-2 -mr-2">
                    <button type="button" data-close-approval aria-label="Tutup" class="grid h-10 w-10 place-items-center rounded-full text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C]">
                        <svg aria-hidden="true" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="text-center">
                    <div id="approval-pending-icon" class="relative mx-auto grid h-20 w-20 place-items-center rounded-full bg-blue-50 text-[#044A9C] ring-8 ring-blue-50/60">
                        <svg class="h-10 w-10 animate-spin-slow text-blue-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12a9 9 0 1 1-6.219-8.56" /></svg>
                        <svg class="absolute h-7 w-7 text-[#044A9C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8m-8 4h8"/></svg>
                    </div>
                    <div id="approval-success-icon" class="mx-auto hidden h-20 w-20 place-items-center rounded-full bg-emerald-50 text-emerald-600 ring-8 ring-emerald-50/60">
                        <svg class="h-11 w-11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                    </div>
                    <h2 id="approval-title" class="mt-7 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Menyiapkan konfirmasi</h2>
                    <p id="approval-message" class="mt-3 text-sm leading-relaxed text-slate-500 sm:text-base"></p>
                    <div id="approval-countdown-wrap" class="mt-5 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2">
                        <span class="relative flex h-2.5 w-2.5"><span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-[#044A9C]"></span></span>
                        <span id="approval-countdown" aria-live="polite" class="text-xs font-semibold tracking-wide text-[#044A9C]"></span>
                    </div>
                </div>

                <section aria-labelledby="approval-details-title" class="mt-7 overflow-hidden rounded-xl border border-slate-200 bg-slate-50 text-left">
                    <div class="flex items-center justify-between border-b border-slate-200 bg-slate-100/70 px-5 py-3">
                        <h3 id="approval-details-title" class="text-xs font-bold uppercase tracking-wider text-slate-500">Rincian Transaksi</h3>
                        <span class="text-[10px] text-slate-400">ID: <span id="approval-reference">—</span></span>
                    </div>
                    <dl class="space-y-4 px-5 py-4 text-sm">
                        <div class="flex items-center justify-between gap-4"><dt class="text-slate-500">Tanggal</dt><dd id="approval-date" class="font-semibold text-slate-800"></dd></div>
                        <div class="flex items-center justify-between gap-4"><dt class="text-slate-500">Metode</dt><dd id="approval-method" class="font-semibold text-slate-800"></dd></div>
                        <div class="flex items-center justify-between gap-4"><dt class="text-slate-500">Status</dt><dd><span id="approval-status" class="inline-flex items-center gap-1.5 rounded-md bg-amber-50 px-2 py-1 text-xs font-semibold text-amber-700"><span id="approval-status-dot" class="h-2 w-2 rounded-full bg-amber-500"></span><span id="approval-status-text">Tertunda</span></span></dd></div>
                        <div class="flex items-center justify-between gap-4 border-t border-dashed border-slate-300 pt-4"><dt class="font-semibold text-slate-900">Total biaya</dt><dd id="approval-amount" class="text-xl font-black text-[#044A9C]"></dd></div>
                    </dl>
                </section>

                <a href="{{ isset($competition['slug']) ? route('competitions.show', $competition['slug']) : route('home') }}" class="mt-6 flex w-full items-center justify-center gap-2 rounded-xl bg-[#044A9C] px-5 py-3.5 text-sm font-bold text-white transition hover:bg-[#033777] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#044A9C] focus-visible:ring-offset-2">
                    Kembali ke halaman perlombaan
                    <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var isTeam = {{ $isTeam ? 'true' : 'false' }};
            var unitPrice = {{ $unitPrice }};
            var compName = @json($competition['name'] ?? 'Lomba Robotik 2026');
            var format = new Intl.NumberFormat('id-ID');

            var countInput = document.getElementById('team-count');
            var fieldsContainer = document.getElementById('team-fields');
            var sectionStep1 = document.getElementById('section-step-1');
            var sectionStep2 = document.getElementById('section-step-2');
            var btnToStep2 = document.getElementById('btn-to-step-2');
            var btnBackToStep1 = document.getElementById('btn-back-to-step-1');
            var step1Error = document.getElementById('step1-error');
            var hiddenInputsContainer = document.getElementById('hidden-participant-inputs');

            // Stepper elements
            var step1Badge = document.getElementById('stepper-step-1-badge');
            var step1Status = document.getElementById('step1-status');
            var stepLine1 = document.getElementById('stepper-line-1');
            var stepLine2Left = document.getElementById('stepper-line-2-left');
            var step2Badge = document.getElementById('stepper-step-2-badge');
            var step2Status = document.getElementById('step2-status');
            var step2Note = document.getElementById('step3-note');

            // Left panel info cards
            var infoStep1 = document.getElementById('info-step1');
            var infoAuto = document.getElementById('info-auto');
            var infoTransfer = document.getElementById('info-transfer');
            var infoCash = document.getElementById('info-cash');

            // Payment state
            var state = { method: 'auto', sub: 'transfer', currentStep: 1 };
            var methodBtns = document.querySelectorAll('.method-btn');
            var subBtns = document.querySelectorAll('.sub-btn');

            function show(el, on) {
                if (el) el.classList.toggle('hidden', !on);
            }

            // RENDER FORM FIELDS STEP 1 (TIM vs INDIVIDU)
            function renderStep1Fields() {
                var count = Math.max(1, Math.min(30, Number(countInput.value) || 1));
                countInput.value = count;

                // Collect existing values to prevent losing them during count change
                var previous = [];
                var cards = fieldsContainer.querySelectorAll('.participant-card');
                cards.forEach(function (card) {
                    var teamInput = card.querySelector('.team-name-input');
                    var childInput = card.querySelector('.child-name-input');
                    var schoolInput = card.querySelector('.school-name-input');
                    previous.push({
                        team_name: teamInput ? teamInput.value : '',
                        child_name: childInput ? childInput.value : '',
                        school_name: schoolInput ? schoolInput.value : ''
                    });
                });

                fieldsContainer.replaceChildren();

                for (var i = 0; i < count; i++) {
                    var data = previous[i] || { team_name: '', child_name: '', school_name: '' };
                    var card = document.createElement('fieldset');
                    card.className = 'participant-card rounded-xl border border-slate-200 bg-white p-4 sm:p-5 shadow-sm transition';

                    var legend = document.createElement('legend');
                    legend.className = 'px-2 text-sm font-bold text-slate-900 flex items-center gap-1.5';
                    legend.innerHTML = isTeam
                        ? '<span class="inline-block w-2 h-2 rounded-full bg-[#044A9C]"></span> Tim ' + (i + 1)
                        : '<span class="inline-block w-2 h-2 rounded-full bg-[#044A9C]"></span> Peserta ' + (i + 1);
                    card.appendChild(legend);

                    if (isTeam) {
                        // FIELD 1: Nama Tim
                        var wrapTeam = document.createElement('div');
                        wrapTeam.className = 'mt-3';
                        var labelTeam = document.createElement('label');
                        labelTeam.className = 'mb-1.5 block text-xs sm:text-sm font-semibold text-slate-700';
                        labelTeam.textContent = 'Nama Tim *';
                        labelTeam.htmlFor = 'team-name-' + i;
                        var inputTeam = document.createElement('input');
                        inputTeam.id = 'team-name-' + i;
                        inputTeam.type = 'text';
                        inputTeam.required = true;
                        inputTeam.maxLength = 100;
                        inputTeam.value = data.team_name || '';
                        inputTeam.placeholder = 'cth. RoboTech ' + (i + 1);
                        inputTeam.className = 'team-name-input w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 focus:border-[#044A9C] focus:outline-none focus:ring-2 focus:ring-[#044A9C]/20';
                        wrapTeam.append(labelTeam, inputTeam);
                        card.appendChild(wrapTeam);

                        // FIELD 2: Nama Anak / Ketua
                        var wrapChild = document.createElement('div');
                        wrapChild.className = 'mt-3';
                        var labelChild = document.createElement('label');
                        labelChild.className = 'mb-1.5 block text-xs sm:text-sm font-semibold text-slate-700';
                        labelChild.textContent = 'Nama Lengkap Anak / Ketua Tim *';
                        labelChild.htmlFor = 'child-name-' + i;
                        var inputChild = document.createElement('input');
                        inputChild.id = 'child-name-' + i;
                        inputChild.type = 'text';
                        inputChild.required = true;
                        inputChild.maxLength = 100;
                        inputChild.value = data.child_name || '';
                        inputChild.placeholder = 'cth. Muhammad Farhan';
                        inputChild.className = 'child-name-input w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 focus:border-[#044A9C] focus:outline-none focus:ring-2 focus:ring-[#044A9C]/20';
                        wrapChild.append(labelChild, inputChild);
                        card.appendChild(wrapChild);
                    } else {
                        // INDIVIDU
                        // FIELD 1: Nama Lengkap Anak / Peserta
                        var wrapChildIndiv = document.createElement('div');
                        wrapChildIndiv.className = 'mt-3';
                        var labelChildIndiv = document.createElement('label');
                        labelChildIndiv.className = 'mb-1.5 block text-xs sm:text-sm font-semibold text-slate-700';
                        labelChildIndiv.textContent = 'Nama Lengkap Peserta *';
                        labelChildIndiv.htmlFor = 'child-name-' + i;
                        var inputChildIndiv = document.createElement('input');
                        inputChildIndiv.id = 'child-name-' + i;
                        inputChildIndiv.type = 'text';
                        inputChildIndiv.required = true;
                        inputChildIndiv.maxLength = 100;
                        inputChildIndiv.value = data.child_name || '';
                        inputChildIndiv.placeholder = 'cth. Ahmad Fauzi';
                        inputChildIndiv.className = 'child-name-input w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 focus:border-[#044A9C] focus:outline-none focus:ring-2 focus:ring-[#044A9C]/20';
                        wrapChildIndiv.append(labelChildIndiv, inputChildIndiv);
                        card.appendChild(wrapChildIndiv);

                        // FIELD 2: Asal Sekolah / Instansi
                        var wrapSchool = document.createElement('div');
                        wrapSchool.className = 'mt-3';
                        var labelSchool = document.createElement('label');
                        labelSchool.className = 'mb-1.5 block text-xs sm:text-sm font-semibold text-slate-700';
                        labelSchool.textContent = 'Asal Sekolah / Instansi *';
                        labelSchool.htmlFor = 'school-name-' + i;
                        var inputSchool = document.createElement('input');
                        inputSchool.id = 'school-name-' + i;
                        inputSchool.type = 'text';
                        inputSchool.required = true;
                        inputSchool.maxLength = 100;
                        inputSchool.value = data.school_name || data.team_name || '';
                        inputSchool.placeholder = 'cth. SDN 1 Sukabumi / Edurobotik';
                        inputSchool.className = 'school-name-input team-name-input w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 focus:border-[#044A9C] focus:outline-none focus:ring-2 focus:ring-[#044A9C]/20';
                        wrapSchool.append(labelSchool, inputSchool);
                        card.appendChild(wrapSchool);
                    }

                    fieldsContainer.appendChild(card);
                }

                // Update live calculations for step 1
                var total = count * unitPrice;
                var countText = count + (isTeam ? ' tim' : ' peserta');
                document.getElementById('step1-price-detail').textContent = countText + ' × Rp' + format.format(unitPrice);
                document.getElementById('step1-price-total').textContent = 'Rp' + format.format(total);

                // Also update step 2 summary placeholders
                document.getElementById('summary-count-badge').textContent = countText;
                document.getElementById('summary-item-label').textContent = 'Biaya pendaftaran (' + countText + ')';
                document.getElementById('summary-item-price').textContent = 'Rp' + format.format(total);
                document.getElementById('summary-total-price').textContent = 'Rp' + format.format(total);
            }

            // Sync hidden inputs for final payment form
            function syncHiddenInputs() {
                hiddenInputsContainer.replaceChildren();
                var count = Math.max(1, Number(countInput.value) || 1);
                var cards = fieldsContainer.querySelectorAll('.participant-card');

                cards.forEach(function (card, i) {
                    var teamInput = card.querySelector('.team-name-input');
                    var childInput = card.querySelector('.child-name-input');

                    var hTeam = document.createElement('input');
                    hTeam.type = 'hidden';
                    hTeam.name = 'teams[' + i + '][team_name]';
                    hTeam.value = teamInput ? teamInput.value : (isTeam ? 'Tim ' + (i + 1) : 'Peserta ' + (i + 1));

                    var hChild = document.createElement('input');
                    hChild.type = 'hidden';
                    hChild.name = 'teams[' + i + '][child_name]';
                    hChild.value = childInput ? childInput.value : '';

                    hiddenInputsContainer.append(hTeam, hChild);
                });
            }

            // Validate step 1 fields
            function validateStep1() {
                var cards = fieldsContainer.querySelectorAll('.participant-card');
                for (var i = 0; i < cards.length; i++) {
                    var inputs = cards[i].querySelectorAll('input[required]');
                    for (var j = 0; j < inputs.length; j++) {
                        if (!inputs[j].value.trim()) {
                            inputs[j].focus();
                            step1Error.textContent = 'Harap lengkapi semua isian ' + (isTeam ? 'Tim ' : 'Peserta ') + (i + 1) + '.';
                            step1Error.classList.remove('hidden');
                            return false;
                        }
                    }
                }
                step1Error.classList.add('hidden');
                return true;
            }

            // UI Render function (Step 1 vs Step 2)
            function renderStep() {
                var isStep1 = state.currentStep === 1;
                show(sectionStep1, isStep1);
                show(sectionStep2, !isStep1);

                if (isStep1) {
                    // Stepper 1 active
                    step1Badge.className = 'grid h-9 w-9 place-items-center rounded-full border-2 border-[#044A9C] bg-white text-sm font-bold text-[#044A9C]';
                    step1Badge.innerHTML = '1';
                    step1Status.textContent = 'Sedang diisi';
                    step1Status.className = 'hidden text-[10px] text-[#044A9C] sm:block';
                    stepLine1.className = 'h-0.5 flex-1 bg-slate-300';
                    stepLine2Left.className = 'h-0.5 flex-1 bg-slate-300';

                    // Stepper 2 pending
                    step2Badge.className = 'grid h-9 w-9 place-items-center rounded-full border-2 border-slate-300 bg-white text-sm font-bold text-slate-400';
                    step2Status.textContent = 'Menunggu data';
                    step2Status.className = 'hidden text-[10px] text-slate-400 sm:block';

                    // Left panel info
                    show(infoStep1, true);
                    show(infoAuto, false);
                    show(infoTransfer, false);
                    show(infoCash, false);
                } else {
                    // Stepper 1 done
                    step1Badge.className = 'grid h-9 w-9 place-items-center rounded-full bg-[#044A9C] text-white';
                    step1Badge.innerHTML = '<svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>';
                    step1Status.textContent = 'Selesai';
                    step1Status.className = 'hidden text-[10px] text-slate-500 sm:block';
                    stepLine1.className = 'h-0.5 flex-1 bg-[#044A9C]';
                    stepLine2Left.className = 'h-0.5 flex-1 bg-[#044A9C]';

                    // Stepper 2 active
                    step2Badge.className = 'grid h-9 w-9 place-items-center rounded-full border-2 border-[#044A9C] bg-white text-sm font-bold text-[#044A9C]';
                    step2Status.textContent = 'Sedang berjalan';
                    step2Status.className = 'hidden text-[10px] text-[#044A9C] sm:block';

                    // Left panel info follows payment method
                    renderPaymentMethod();
                }
            }

            function renderPaymentMethod() {
                if (state.currentStep !== 2) return;

                var manual = state.method === 'manual';
                var transfer = manual && state.sub === 'transfer';
                var cash = manual && state.sub === 'cash';

                methodBtns.forEach(function (b) { b.setAttribute('aria-pressed', String(b.dataset.method === state.method)); });
                subBtns.forEach(function (b) { b.setAttribute('aria-pressed', String(b.dataset.sub === state.sub)); });

                // Right panel
                show(document.getElementById('manual-options'), manual);
                show(document.getElementById('note-auto'), !manual);
                show(document.getElementById('transfer-fields'), transfer);

                // Left panel
                show(infoStep1, false);
                show(infoAuto, !manual);
                show(infoTransfer, transfer);
                show(infoCash, cash);

                // Form & buttons texts
                var selectedMethodInput = document.getElementById('selected-payment-method');
                if (selectedMethodInput) selectedMethodInput.value = manual ? state.sub : 'auto';
                if (step2Note) step2Note.textContent = manual ? 'Disetujui panitia' : 'Otomatis';
                var trustConfirm = document.getElementById('trust-confirm');
                if (trustConfirm) trustConfirm.textContent = manual ? 'Dikonfirmasi panitia' : 'Konfirmasi instan';
                var payLabel = document.getElementById('pay-label');
                if (payLabel) payLabel.textContent = !manual ? 'Bayar Sekarang' : (transfer ? 'Lanjutkan Transfer' : 'Kirim Pendaftaran');
            }

            // Listeners for step transitions
            btnToStep2.addEventListener('click', function () {
                if (validateStep1()) {
                    syncHiddenInputs();
                    state.currentStep = 2;
                    renderStep();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });

            btnBackToStep1.addEventListener('click', function () {
                state.currentStep = 1;
                renderStep();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Listeners for counter
            countInput.addEventListener('input', renderStep1Fields);
            document.getElementById('count-down').addEventListener('click', function () {
                countInput.value = Math.max(1, (Number(countInput.value) || 1) - 1);
                renderStep1Fields();
            });
            document.getElementById('count-up').addEventListener('click', function () {
                countInput.value = Math.min(30, (Number(countInput.value) || 1) + 1);
                renderStep1Fields();
            });

            // Listeners for payment methods
            methodBtns.forEach(function (b) {
                b.addEventListener('click', function () {
                    state.method = b.dataset.method;
                    renderPaymentMethod();
                });
            });

            subBtns.forEach(function (b) {
                b.addEventListener('click', function () {
                    state.sub = b.dataset.sub;
                    renderPaymentMethod();
                });
            });

            // Copy Rekening Button
            var copyBtn = document.getElementById('copy-rek');
            if (copyBtn) {
                copyBtn.addEventListener('click', function (e) {
                    var btn = e.currentTarget;
                    var number = document.getElementById('bank-number').textContent.replace(/\s/g, '');
                    var done = function (t) { btn.textContent = t; setTimeout(function () { btn.textContent = 'Salin'; }, 1500); };
                    if (navigator.clipboard) {
                        navigator.clipboard.writeText(number).then(function () { done('Tersalin'); }, function () { done('Gagal'); });
                    } else {
                        done('Gagal');
                    }
                });
            }

            // Voucher button alert
            var btnApplyVoucher = document.getElementById('btn-apply-voucher');
            if (btnApplyVoucher) {
                btnApplyVoucher.addEventListener('click', function () {
                    var val = document.getElementById('payment-voucher').value.trim();
                    if (!val) {
                        alert('Silakan masukkan kode voucher Anda.');
                    } else {
                        alert('Kode voucher "' + val + '" tidak valid atau telah mencapai batas penggunaan.');
                    }
                });
            }

            // INITIALIZATION
            renderStep1Fields();
            renderStep();
        })();

        // SUBMISSION & CONFIRMATION MODAL HANDLER
        (function () {
            var form = document.getElementById('payment-form');
            var submitButton = document.querySelector('[form="payment-form"]');
            var modal = document.getElementById('approval-modal');
            var closeButtons = modal ? modal.querySelectorAll('[data-close-approval]') : [];
            var closeButton = modal ? modal.querySelector('[data-close-approval]') : null;
            var previousFocus = null;
            var csrfToken = form ? form.querySelector('[name="_token"]').value : '';
            var submitLabel = document.getElementById('pay-label');
            var errorBox = document.getElementById('payment-error');

            function closeModal() {
                if (!modal) return;
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('overflow-hidden');
                if (previousFocus) previousFocus.focus();
            }

            function openModal(payment) {
                if (!modal) return;
                previousFocus = document.activeElement;
                document.getElementById('approval-reference').textContent = payment.reference;
                document.getElementById('approval-title').textContent = payment.status === 'Berhasil' ? 'Pembayaran Berhasil!' : 'Menunggu Konfirmasi';
                document.getElementById('approval-date').textContent = payment.date_formatted;
                document.getElementById('approval-method').textContent = payment.method_formatted;
                document.getElementById('approval-amount').textContent = payment.amount_formatted;
                document.getElementById('approval-status-text').textContent = payment.status;
                document.getElementById('approval-message').textContent = payment.method === 'auto'
                    ? 'Pembayaran sedang diproses sistem Midtrans. Status pendaftaran akan diperbarui otomatis.'
                    : 'Pendaftaran sudah tercatat di sistem kami dan menunggu konfirmasi dari panitia lomba.';

                var hasCountdown = Boolean(payment.approval_completes_at);
                document.getElementById('approval-countdown-wrap').classList.toggle('hidden', !hasCountdown);
                document.getElementById('approval-pending-icon').classList.toggle('hidden', payment.status === 'Berhasil');
                document.getElementById('approval-success-icon').classList.toggle('hidden', payment.status !== 'Berhasil');

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('overflow-hidden');
                if (closeButton) closeButton.focus();

                if (hasCountdown) startCountdown(payment.approval_completes_at, payment.complete_url);
            }

            function markSuccessful() {
                document.getElementById('approval-title').textContent = 'Pembayaran Berhasil!';
                document.getElementById('approval-message').textContent = 'Pendaftaran Anda sudah terverifikasi. Selamat bersiap untuk kompetisi SRC 2026!';
                document.getElementById('approval-status').className = 'inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-semibold text-emerald-700';
                document.getElementById('approval-status-dot').className = 'h-2 w-2 rounded-full bg-emerald-500';
                document.getElementById('approval-status-text').textContent = 'Berhasil';
                document.getElementById('approval-countdown-wrap').classList.add('hidden');
                document.getElementById('approval-pending-icon').classList.add('hidden');
                document.getElementById('approval-success-icon').classList.remove('hidden');
            }

            function startCountdown(completesAt, completeUrl) {
                var countdown = document.getElementById('approval-countdown');
                var completing = false;

                function confirmPayment() {
                    if (completing) return;
                    completing = true;
                    countdown.textContent = 'Menyelesaikan konfirmasi...';

                    fetch(completeUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then(function (response) {
                        if (!response.ok) throw new Error('Konfirmasi belum tersedia.');
                        return response.json();
                    }).then(markSuccessful).catch(function () {
                        completing = false;
                        countdown.textContent = 'Menunggu konfirmasi server...';
                        window.setTimeout(confirmPayment, 2000);
                    });
                }

                function updateCountdown() {
                    var secondsLeft = Math.max(0, Math.ceil((completesAt - Date.now()) / 1000));
                    if (secondsLeft === 0) {
                        window.clearInterval(timer);
                        confirmPayment();
                        return;
                    }
                    countdown.textContent = 'Mengecek status dalam ' + secondsLeft + ' detik.';
                }

                var timer = window.setInterval(updateCountdown, 250);
                updateCountdown();
            }

            if (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    if (submitButton && submitButton.disabled) return;

                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.classList.add('cursor-wait', 'opacity-70');
                    }
                    if (submitLabel) submitLabel.textContent = 'Memproses...';
                    if (errorBox) {
                        errorBox.classList.add('hidden');
                        errorBox.textContent = '';
                    }

                    fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then(function (response) {
                        return response.json().then(function (data) {
                            if (!response.ok) {
                                var validationMessage = data.errors
                                    ? Object.values(data.errors).flat()[0]
                                    : data.message;
                                throw new Error(validationMessage || 'Pembayaran belum dapat diproses.');
                            }
                            return data;
                        });
                    }).then(function (data) {
                        if (submitLabel) submitLabel.textContent = 'Pendaftaran Tercatat';
                        openModal(data.payment);
                    }).catch(function (error) {
                        if (submitButton) {
                            submitButton.disabled = false;
                            submitButton.classList.remove('cursor-wait', 'opacity-70');
                        }
                        if (submitLabel) submitLabel.textContent = 'Coba Lagi';
                        if (errorBox) {
                            errorBox.textContent = error.message || 'Terjadi kesalahan. Silakan coba lagi.';
                            errorBox.classList.remove('hidden');
                        }
                    });
                });
            }

            closeButtons.forEach(function (button) { button.addEventListener('click', closeModal); });
            if (modal) {
                modal.addEventListener('click', function (event) {
                    if (event.target === modal) closeModal();
                });
            }
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal && !modal.classList.contains('hidden')) closeModal();
            });
        })();
    </script>
</body>
</html>
