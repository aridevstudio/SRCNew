{{--
|--------------------------------------------------------------------------
| AUTHENTICATION BASE LAYOUT — TWO-COLUMN DESIGN
|--------------------------------------------------------------------------
| Layout pembungkus utama untuk seluruh halaman autentikasi (Login, Register,
| Forgot Password, dan Admin Login). Struktur:
| 1. LEFT (hidden on mobile, lg:flex) — branded visual panel bg-src-blue
|    • Customisable via @section('left-panel') di setiap halaman
|    • Fallback default: SRC branding + decorative SVG
| 2. RIGHT — header (Kembali ke Beranda), @yield('content'), footer
|--------------------------------------------------------------------------
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Dynamic Page Title --}}
        <title>@yield('title', 'SRC — Sukabumi Robotic Competition 2026')</title>

        {{-- Typography: Plus Jakarta Sans --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />

        {{-- Asset Bundling via Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-dvh bg-white font-sans text-slate-900 antialiased selection:bg-src-yellow selection:text-slate-900 lg:h-dvh lg:overflow-hidden">

        @php
            $portal = trim($__env->yieldContent('portal')) ?: 'user';
            $isAdmin = $portal === 'admin';
        @endphp

        {{-- ================================================================
             OUTER SHELL — full-height two-column flex container
        ================================================================= --}}
        <div data-auth-page="{{ $portal }}" class="flex min-h-dvh overflow-x-hidden lg:h-full lg:min-h-0 lg:overflow-hidden">

            {{-- ============================================================
                 LEFT COLUMN — Branded visual panel (desktop only)
                 Hidden on mobile, visible from lg breakpoint.
                 Each page provides its own @section('left-panel').
            ============================================================= --}}
            <aside class="relative z-20 hidden shrink-0 flex-col overflow-hidden lg:flex lg:h-full lg:w-[45%] xl:w-[42%]" style="clip-path: url(#panel-wave-clip)">
                {{-- Shared wave artwork for every authentication page. --}}
                <svg aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 hidden h-full w-full md:block" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <clipPath id="panel-wave-clip" clipPathUnits="objectBoundingBox">
                            <path d="M0 0H.77C.82 0 .84 .04 .86 .1C.9 .22 .94 .35 .97 .46C1 .56 .98 .61 .91 .67C.83 .74 .77 .79 .71 .85C.66 .9 .66 .95 .72 1H0Z" />
                        </clipPath>
                        <linearGradient id="panel-blue" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#0A5CBA" />
                            <stop offset="55%" stop-color="#044A9C" />
                            <stop offset="100%" stop-color="#033777" />
                        </linearGradient>
                        <pattern id="panel-dots" width="4" height="4" patternUnits="userSpaceOnUse">
                            <circle cx="1" cy="1" r=".22" fill="#fff" fill-opacity=".18" />
                        </pattern>
                    </defs>
                    <path d="M0 0H77C82 0 84 4 86 10C90 22 94 35 97 46C100 56 98 61 91 67C83 74 77 79 71 85C66 90 66 95 72 100H0Z" fill="url(#panel-blue)" />
                    <path d="M0 0H77C82 0 84 4 86 10C90 22 94 35 97 46C100 56 98 61 91 67C83 74 77 79 71 85C66 90 66 95 72 100H0Z" fill="url(#panel-dots)" />
                    <path d="M-8 69C16 57 29 75 52 62S77 49 91 57" fill="none" stroke="#fff" stroke-opacity=".14" stroke-width=".35" />
                    <path d="M-8 76C15 64 30 82 53 69S78 56 94 64" fill="none" stroke="#fff" stroke-opacity=".1" stroke-width=".35" />
                </svg>
                @hasSection('left-panel')
                    @yield('left-panel')
                @else
                    {{-- ---- Default left-panel fallback ---- --}}
                    {{-- Dots grid pattern --}}
                    <svg class="absolute inset-0 w-full h-full opacity-[0.07] pointer-events-none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <defs>
                            <pattern id="dots-default" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="1.5" fill="white"/>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#dots-default)"/>
                    </svg>

                    {{-- Decorative circles --}}
                    <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full border border-white/10 pointer-events-none"></div>
                    <div class="absolute -bottom-16 -right-16 w-60 h-60 rounded-full border border-white/10 pointer-events-none"></div>
                    <div class="absolute top-20 -left-16 w-48 h-48 rounded-full bg-white/5 pointer-events-none"></div>
                    <div class="absolute top-48 -left-8 w-28 h-28 rounded-full border border-white/10 pointer-events-none"></div>

                    {{-- Content --}}
                    <div class="relative z-10 flex h-full items-center p-10 xl:p-14">
                        {{-- Hero --}}
                        <div class="w-full -translate-y-8">
                            <h1 class="text-5xl xl:text-6xl font-extrabold text-white leading-tight tracking-tight">
                                Kompetisi <span class="text-src-yellow">Robotika</span><br>Terbesar di Sukabumi
                            </h1>
                            <p class="mt-5 text-xl text-white/70 leading-relaxed">
                                Bergabunglah bersama ratusan tim robotika dari seluruh Indonesia dalam ajang SRC 2026.
                            </p>
                        </div>

                    </div>
                @endif

            </aside>

            {{-- ============================================================
                 RIGHT COLUMN — Header + Form + Footer
            ============================================================= --}}
            <div class="relative isolate flex min-h-dvh flex-1 flex-col overflow-x-hidden bg-white lg:h-full lg:min-h-0 lg:overflow-y-auto lg:overscroll-contain">

                {{-- Subtle companion texture echoes the blue panel without competing with the form. --}}
                <svg class="pointer-events-none absolute inset-0 h-full w-full" viewBox="0 0 800 1000" preserveAspectRatio="none" aria-hidden="true">
                    <defs>
                        <pattern id="auth-right-dots" width="22" height="22" patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="1.25" fill="#0c44a1" fill-opacity=".12"/>
                        </pattern>
                        <linearGradient id="auth-right-fade" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0" stop-color="white" stop-opacity=".05"/>
                            <stop offset=".42" stop-color="white" stop-opacity="1"/>
                        </linearGradient>
                        <mask id="auth-right-dots-mask">
                            <rect width="800" height="1000" fill="url(#auth-right-fade)"/>
                        </mask>
                    </defs>
                    <rect width="800" height="1000" fill="url(#auth-right-dots)" mask="url(#auth-right-dots-mask)" opacity=".65"/>
                    <circle cx="770" cy="875" r="155" fill="#0c44a1" fill-opacity=".025"/>
                    <circle cx="770" cy="875" r="205" fill="none" stroke="#0c44a1" stroke-opacity=".08" stroke-width="1.5"/>
                    <circle cx="770" cy="875" r="265" fill="none" stroke="#0c44a1" stroke-opacity=".05" stroke-width="1.5"/>
                </svg>

                {{-- --------------------------------------------------------
                     HEADER: Tombol "Kembali ke Beranda"
                --------------------------------------------------------- --}}
                <header class="relative z-20 flex w-full shrink-0 items-center justify-end px-6 py-5 sm:px-8 sm:py-6">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 sm:px-5 sm:py-2.5 text-xs sm:text-sm font-semibold text-slate-700 shadow-xs transition-all duration-200 hover:border-src-blue hover:text-src-blue hover:shadow-md hover:bg-slate-50 focus-visible:outline-none">
                        <x-icon name="arrow-left" class="size-4" />
                        <span>Kembali ke Beranda</span>
                    </a>
                </header>

                {{-- --------------------------------------------------------
                     MAIN: Auth form — centred vertically in available space
                --------------------------------------------------------- --}}
                <main class="relative z-10 mx-auto flex w-full flex-1 items-center justify-center px-4 py-8 sm:px-8 sm:py-10">
                    <div class="w-full max-w-2xl">
                        {{-- Card wrapper: visible border/shadow on mobile, borderless on desktop --}}
                        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xl shadow-slate-900/[0.06] sm:p-9 lg:border-0 lg:shadow-none lg:p-0">
                            @yield('content')
                        </div>

                        {{-- Footer Sub-text --}}
                        @hasSection('footer')
                            <div class="mt-6 text-center text-sm leading-relaxed text-slate-500">
                                @yield('footer')
                            </div>
                        @endif
                    </div>
                </main>

                {{-- --------------------------------------------------------
                     FOOTER: copyright line
                --------------------------------------------------------- --}}
                <footer class="relative z-10 w-full shrink-0 px-4 pb-6 text-center text-sm text-slate-400 sm:px-8">
                    &copy; {{ date('Y') }} Sukabumi Robotic Competition 2026. Seluruh hak cipta dilindungi.
                </footer>

            </div>{{-- / RIGHT COLUMN --}}

        </div>{{-- / OUTER SHELL --}}

    </body>
</html>
