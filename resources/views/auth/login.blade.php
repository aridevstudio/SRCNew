{{--
|--------------------------------------------------------------------------
| USER AUTHENTICATION VIEW (LOGIN & REGISTER)
|--------------------------------------------------------------------------
| Halaman autentikasi tunggal (Single Page Auth) untuk peserta / pengguna.
| Mengelola dua mode utama via state machine di resources/js/auth.js:
| 1. Mode 'login'    : Form Masuk Akun (Email & Password)
| 2. Mode 'register' : Form Registrasi Akun Baru
|--------------------------------------------------------------------------
--}}

@extends('layouts.app')

@section('title', 'SRC - Masuk / Registrasi Akun')
@section('portal', 'user')

{{-- Footer Bantuan Teknis --}}
@section('footer')
    <p class="text-slate-500">
        Butuh bantuan teknis atau informasi kompetisi?
        <a href="mailto:info@src-sukabumi.id" class="font-medium text-src-blue underline hover:text-src-blue/80 transition">
            Hubungi Panitia SRC
        </a>
    </p>
@endsection

{{-- =========================================================================
     LEFT PANEL — SRC Branding for Login/Register
========================================================================== --}}
@section('left-panel')
    {{-- Dots grid SVG background --}}
    <svg class="absolute inset-0 w-full h-full opacity-[0.07] pointer-events-none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
            <pattern id="dots-login" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1.5" fill="white"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#dots-login)"/>
    </svg>

    {{-- Abstract decorative circles --}}
    <div class="absolute -bottom-40 -right-40 w-[28rem] h-[28rem] rounded-full border border-white/10 pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-72 h-72 rounded-full border border-white/[0.08] pointer-events-none"></div>
    <div class="absolute top-16 -left-20 w-56 h-56 rounded-full bg-white/[0.04] pointer-events-none"></div>
    <div class="absolute top-44 -left-10 w-32 h-32 rounded-full border border-white/10 pointer-events-none"></div>
    {{-- Accent yellow glow blob --}}
    <div class="absolute top-1/3 right-0 w-40 h-40 rounded-full bg-src-yellow/10 blur-3xl pointer-events-none"></div>

    {{-- Panel Content --}}
    {{-- Panel Content --}}
    <div class="relative z-10 flex h-full items-center px-10 py-10 xl:px-14 xl:py-12">

        {{-- Hero section --}}
        <div class="w-full -translate-y-8">
            <h1 class="text-[2.75rem] xl:text-[3.25rem] font-extrabold text-white leading-[1.1] tracking-tight">
                Selamat Datang<br>di <span class="text-src-yellow">SRC 2026</span>
            </h1>
            <p class="mt-5 text-lg xl:text-xl text-white/75 leading-relaxed max-w-sm">
                Kompetisi robotika bergengsi yang mempertemukan talenta muda Indonesia dalam inovasi teknologi dan otomasi.
            </p>

            {{-- Benefits list --}}
            <ul class="mt-8 space-y-4">
                <li class="flex items-start gap-3">
                    <span class="mt-0.5 flex size-5 shrink-0 items-center justify-center rounded-full bg-src-yellow/20 text-src-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-3" aria-hidden="true"><path d="m4.5 12.75 6 6 9-13.5"/></svg>
                    </span>
                    <span class="text-lg text-white/80 leading-snug">Akses dashboard tim &amp; manajemen anggota</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-0.5 flex size-5 shrink-0 items-center justify-center rounded-full bg-src-yellow/20 text-src-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-3" aria-hidden="true"><path d="m4.5 12.75 6 6 9-13.5"/></svg>
                    </span>
                    <span class="text-lg text-white/80 leading-snug">Update jadwal &amp; pengumuman resmi panitia</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="mt-0.5 flex size-5 shrink-0 items-center justify-center rounded-full bg-src-yellow/20 text-src-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-3" aria-hidden="true"><path d="m4.5 12.75 6 6 9-13.5"/></svg>
                    </span>
                    <span class="text-lg text-white/80 leading-snug">Registrasi kategori &amp; unggah berkas lomba</span>
                </li>
            </ul>
        </div>

    </div>
@endsection

@section('content')

{{-- =========================================================================
     DESIGN TOKENS (Shared Tailwind CSS Classes)
========================================================================== --}}
@php
    $inputCls = 'block w-full h-14 min-h-[56px] rounded-lg border border-slate-300 bg-white px-4 py-3 text-lg text-slate-900 transition duration-150
                placeholder:text-slate-400 hover:border-slate-400
                focus:border-src-blue focus:outline-none
                disabled:cursor-not-allowed disabled:bg-slate-100 disabled:text-slate-500
                aria-[invalid=true]:border-red-500 aria-[invalid=true]:bg-red-50/40';
    $labelCls = 'mb-2 block text-base sm:text-lg font-semibold text-slate-700';
    $errorCls = 'mt-1.5 hidden items-center gap-1.5 text-base font-medium text-red-600';
    $iconCls = 'pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-3.5 text-slate-400 transition group-focus-within:text-src-blue';
    $eyeCls = 'absolute inset-y-0 right-0 flex items-center justify-center px-3.5 text-slate-400 transition hover:text-src-blue focus-visible:outline-none';
    $btnCls = 'inline-flex w-full h-14 min-h-[56px] items-center justify-center gap-2 rounded-lg bg-src-blue px-5 text-lg font-semibold text-white shadow-md shadow-src-blue/25 transition duration-150
               hover:bg-src-blue/90 hover:shadow-src-blue/35 active:scale-[0.99] focus-visible:outline-none
               disabled:cursor-not-allowed disabled:opacity-60';
    $ghostCls = 'inline-flex w-full h-14 min-h-[56px] items-center justify-center gap-2 rounded-lg px-4 text-base sm:text-lg font-semibold text-slate-600 transition duration-150
                 hover:bg-slate-100 hover:text-src-blue focus-visible:outline-none';
    $spinner = '<svg class="size-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" /><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z" /></svg>';
@endphp



    {{-- =====================================================================
         PANEL 1: FORM MASUK AKUN (LOGIN)
    ====================================================================== --}}
    <div id="panel-login" role="tabpanel" aria-labelledby="tab-login">
        <form data-auth-form="login" novalidate class="space-y-5 sm:space-y-6">
            {{-- Header Form Login --}}
            <div class="mb-1">
                <h2 class="text-4xl font-bold tracking-tight text-slate-900">Masuk Akun</h2>
                <p class="mt-2 text-lg text-slate-500">Selamat datang kembali di Sukabumi Robotic Competition.</p>
            </div>

            {{-- Banner Notifikasi Form (Error / Success alert) --}}
            <div class="hidden" data-form-message>
                <div class="flex items-start gap-2.5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700">
                    <span data-message-icon class="shrink-0">
                        <x-icon name="alert" class="mt-0.5 size-4" />
                    </span>
                    <span class="min-w-0 flex-1" data-error-text></span>
                </div>
            </div>

            {{-- Input Email --}}
            <div class="group">
                <label for="login-email" class="{{ $labelCls }}">
                    Email <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="mail" class="size-5" /></span>
                    <input id="login-email" name="email" type="email" autocomplete="email" placeholder="nama@gmail.com"
                           data-validate="required|email" aria-describedby="login-email-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="login-email-error" data-error-for="email" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input Kata Sandi --}}
            <div class="group">
                <label for="login-password" class="{{ $labelCls }}">
                    Kata Sandi <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="lock" class="size-5" /></span>
                    <input id="login-password" name="password" type="password" autocomplete="current-password" placeholder="••••••••"
                           data-validate="required|min:8" aria-describedby="login-password-error" required
                           class="{{ $inputCls }} pr-12 pl-11">
                    <button type="button" data-password-toggle="login-password" aria-label="Tampilkan kata sandi" aria-pressed="false" class="{{ $eyeCls }}">
                        <x-icon name="eye" class="size-5" data-password-icon />
                        <x-icon name="eye-off" class="hidden size-5" data-password-icon />
                    </button>
                </div>
                <p id="login-password-error" data-error-for="password" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>

                {{-- Lupa kata sandi? --}}
                <div class="mt-2 text-right">
                    <a href="{{ route('password.request') }}"
                       class="rounded text-sm font-semibold text-src-blue hover:text-src-blue/80 hover:underline transition focus-visible:outline-none">
                        Lupa kata sandi?
                    </a>
                </div>
            </div>

            {{-- Tombol Submit Masuk --}}
            <button type="submit" data-submit-login class="{{ $btnCls }}">
                <span data-button-spinner class="hidden" aria-hidden="true">{!! $spinner !!}</span>
                <span data-button-label>Masuk Sekarang</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 opacity-80" aria-hidden="true"><path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>

            {{-- Divider --}}
            <div class="relative flex items-center gap-3">
                <div class="flex-1 border-t border-slate-200"></div>
                <span class="text-sm font-medium text-slate-400">atau</span>
                <div class="flex-1 border-t border-slate-200"></div>
            </div>

            {{-- Sign in with Google --}}
            <button type="button" data-action="google-login"
                    class="inline-flex w-full h-14 min-h-[56px] items-center justify-center gap-3 rounded-lg border border-slate-200 bg-white px-5 text-lg font-semibold text-slate-700 transition duration-150 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-0">
                <svg viewBox="0 0 24 24" class="size-5 shrink-0" aria-hidden="true">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Masuk dengan Google
            </button>

            {{-- Footer Switch to Register --}}
            <div class="pt-2 text-center">
                <p class="text-sm text-slate-500">
                    Belum punya akun?
                    <button type="button" data-action="show-register" class="font-semibold text-src-blue hover:underline">
                        Daftar akun di sini
                    </button>
                </p>
            </div>
        </form>
    </div>

    {{-- =====================================================================
         PANEL 2: FORM REGISTRASI AKUN BARU
    ====================================================================== --}}
    <div id="panel-register" role="tabpanel" aria-labelledby="tab-register" hidden>
        <form data-auth-form="register" novalidate class="space-y-5">
            {{-- Header Registrasi --}}
            <div class="mb-1">
                <h2 class="text-4xl font-bold tracking-tight text-slate-900">Registrasi Akun Baru</h2>
                <p class="mt-2 text-lg text-slate-500">Daftarkan akun untuk melihat Dashboard anda.</p>
            </div>

            {{-- Banner Notifikasi Registrasi --}}
            <div class="hidden" data-form-message>
                <div class="flex items-start gap-2.5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700">
                    <span data-message-icon class="shrink-0">
                        <x-icon name="alert" class="mt-0.5 size-4" />
                    </span>
                    <span class="min-w-0 flex-1" data-error-text></span>
                </div>
            </div>

            {{-- Input Nama Lengkap --}}
            <div class="group">
                <label for="register-name" class="{{ $labelCls }}">
                    Nama Lengkap <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="user" class="size-5" /></span>
                    <input id="register-name" name="name" type="text" autocomplete="name" placeholder="Nama Lengkap Anda"
                           data-validate="required|min:3" aria-describedby="register-name-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="register-name-error" data-error-for="name" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input Username --}}
            <div class="group">
                <label for="register-username" class="{{ $labelCls }}">
                    Username <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true" focusable="false"><path d="M16 12a4 4 0 1 0-8 0 4 4 0 0 0 8 0Zm0 0v1.5a2.5 2.5 0 0 0 5 0V12a9 9 0 1 0-9 9m4.5-1.206a8.959 8.959 0 0 1-4.5 1.207"/></svg>
                    </span>
                    <input id="register-username" name="username" type="text" autocomplete="username" placeholder="contoh: timrobot2026"
                           data-validate="required|min:3" aria-describedby="register-username-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="register-username-error" data-error-for="username" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input Email Aktif --}}
            <div class="group">
                <label for="register-email" class="{{ $labelCls }}">
                    Email <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="mail" class="size-5" /></span>
                    <input id="register-email" name="email" type="email" autocomplete="email" placeholder="nama@gmail.com"
                           data-validate="required|email" aria-describedby="register-email-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="register-email-error" data-error-for="email" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input No. HP Aktif --}}
            <div class="group">
                <label for="register-phone" class="{{ $labelCls }}">
                    No. HP Aktif <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true" focusable="false"><path d="M2.25 6.338c0 9.73 7.583 17.625 17 17.625h.375a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v1.838Z"/></svg>
                    </span>
                    <input id="register-phone" name="phone" type="tel" autocomplete="tel" placeholder="08xx-xxxx-xxxx"
                           data-validate="required|min:9" aria-describedby="register-phone-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="register-phone-error" data-error-for="phone" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input Sekolah / Instansi --}}
            <div class="group">
                <label for="register-institution" class="{{ $labelCls }}">
                    Sekolah / Instansi <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true" focusable="false"><path d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.63 48.63 0 0 1 12 20.904a48.63 48.63 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                    </span>
                    <input id="register-institution" name="institution" type="text" autocomplete="organization" placeholder="Nama Sekolah / Instansi Anda"
                           data-validate="required|min:3" aria-describedby="register-institution-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="register-institution-error" data-error-for="institution" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input Kata Sandi --}}
            <div class="group">
                <label for="register-password" class="{{ $labelCls }}">
                    Kata Sandi <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="lock" class="size-5" /></span>
                    <input id="register-password" name="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter"
                           data-validate="required|min:8" aria-describedby="register-password-error" required
                           class="{{ $inputCls }} pr-12 pl-11">
                    <button type="button" data-password-toggle="register-password" aria-label="Tampilkan kata sandi" aria-pressed="false" class="{{ $eyeCls }}">
                        <x-icon name="eye" class="size-5" data-password-icon />
                        <x-icon name="eye-off" class="hidden size-5" data-password-icon />
                    </button>
                </div>
                <p id="register-password-error" data-error-for="password" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Input Konfirmasi Kata Sandi --}}
            <div class="group">
                <label for="register-password-confirmation" class="{{ $labelCls }}">
                    Konfirmasi Kata Sandi <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="lock" class="size-5" /></span>
                    <input id="register-password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Ulangi kata sandi"
                           data-validate="required|match:password" aria-describedby="register-password-confirmation-error" required
                           class="{{ $inputCls }} pr-12 pl-11">
                    <button type="button" data-password-toggle="register-password-confirmation" aria-label="Tampilkan kata sandi" aria-pressed="false" class="{{ $eyeCls }}">
                        <x-icon name="eye" class="size-5" data-password-icon />
                        <x-icon name="eye-off" class="hidden size-5" data-password-icon />
                    </button>
                </div>
                <p id="register-password-confirmation-error" data-error-for="password_confirmation" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            {{-- Tombol Submit Registrasi --}}
            <button type="submit" data-submit-register class="{{ $btnCls }}">
                <span data-button-spinner class="hidden" aria-hidden="true">{!! $spinner !!}</span>
                <span data-button-label>Daftar Akun Baru</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 opacity-80" aria-hidden="true"><path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>

            {{-- Divider --}}
            <div class="relative flex items-center gap-3">
                <div class="flex-1 border-t border-slate-200"></div>
                <span class="text-sm font-medium text-slate-400">atau</span>
                <div class="flex-1 border-t border-slate-200"></div>
            </div>

            {{-- Sign up with Google --}}
            <button type="button" data-action="google-register"
                    class="inline-flex w-full h-14 min-h-[56px] items-center justify-center gap-3 rounded-lg border border-slate-200 bg-white px-5 text-lg font-semibold text-slate-700 transition duration-150 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-0">
                <svg viewBox="0 0 24 24" class="size-5 shrink-0" aria-hidden="true">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Daftar dengan Google
            </button>

            <p class="text-center text-sm leading-relaxed text-slate-500">
                Dengan mendaftar, Anda menyetujui seluruh ketentuan dan kode etik <span class="font-medium text-slate-700">Sukabumi Robotic Competition</span>.
            </p>

            {{-- Footer Switch to Login --}}
            <div class="pt-2 text-center">
                <p class="text-sm text-slate-500">
                    Sudah punya akun?
                    <button type="button" data-action="show-login" class="font-semibold text-src-blue hover:underline">
                        Masuk di sini
                    </button>
                </p>
            </div>
        </form>
    </div>

@endsection
