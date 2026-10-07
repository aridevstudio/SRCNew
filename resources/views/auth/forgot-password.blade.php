{{--
|--------------------------------------------------------------------------
| FORGOT PASSWORD VIEW (ALUR RESET KATA SANDI)
|--------------------------------------------------------------------------
| Halaman mandiri alur reset kata sandi multi-tahap:
| 1. Step 1: Input Email Terdaftar
| 2. Step 2: Verifikasi Kode OTP (4 Digit, pengetikan dari pojok kiri)
| 3. Step 3: Buat Kata Sandi Baru & Konfirmasi
| 4. Step 4: Konfirmasi Sukses Reset Kata Sandi
|--------------------------------------------------------------------------
--}}

@extends('layouts.app')

@section('title', 'SRC - Lupa Kata Sandi')
@section('portal', 'user')

@section('footer')
    <p class="text-slate-500">
        Butuh bantuan teknis atau informasi kompetisi?
        <a href="mailto:info@src-sukabumi.id" class="font-medium text-src-blue underline hover:text-src-blue/80 transition">
            Hubungi Panitia SRC
        </a>
    </p>
@endsection

{{-- =========================================================================
     LEFT PANEL — Security / Password Reset Theme
========================================================================== --}}
@section('left-panel')
    {{-- Diagonal lines SVG texture --}}
    <svg class="absolute inset-0 w-full h-full opacity-[0.06] pointer-events-none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
            <pattern id="diag-forgot" x="0" y="0" width="24" height="24" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1.5" fill="white"/>
                <circle cx="14" cy="14" r="1.5" fill="white"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#diag-forgot)"/>
    </svg>

    {{-- Decorative geometric rings --}}
    <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full border border-white/10 pointer-events-none"></div>
    <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full border border-white/[0.07] pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-[22rem] h-[22rem] rounded-full border border-white/10 pointer-events-none"></div>
    <div class="absolute bottom-20 right-0 w-36 h-36 rounded-full bg-src-yellow/10 blur-2xl pointer-events-none"></div>

    {{-- Panel Content --}}
    <div class="relative z-10 flex h-full items-center px-10 py-10 xl:px-14 xl:py-12">

        {{-- Central shield / key icon --}}
        <div class="w-full -translate-y-8">
            <h1 class="text-[2.6rem] xl:text-[3rem] font-extrabold text-white leading-[1.1] tracking-tight">
                Atur Ulang<br><span class="text-src-yellow">Kata Sandi</span> Anda
            </h1>
            <p class="mt-5 text-lg xl:text-xl text-white/65 leading-relaxed max-w-sm">
                Ikuti tiga langkah mudah untuk memulihkan akses akun SRC Anda dengan aman melalui verifikasi OTP.
            </p>

            {{-- Security tips --}}
            <div class="mt-8 space-y-3">
                <p class="text-sm font-semibold text-white/50 uppercase tracking-wider">Tips keamanan akun</p>
                <ul class="space-y-2.5">
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex size-4 shrink-0 items-center justify-center rounded-full bg-src-yellow/20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-2.5 text-src-yellow" aria-hidden="true"><path d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </span>
                        <span class="text-base text-white/70">Gunakan kata sandi minimal 8 karakter</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex size-4 shrink-0 items-center justify-center rounded-full bg-src-yellow/20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-2.5 text-src-yellow" aria-hidden="true"><path d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </span>
                        <span class="text-base text-white/70">Kombinasikan huruf, angka, dan simbol</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex size-4 shrink-0 items-center justify-center rounded-full bg-src-yellow/20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-2.5 text-src-yellow" aria-hidden="true"><path d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </span>
                        <span class="text-base text-white/70">Jangan bagikan kode OTP kepada siapapun</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

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
    $backBtnCls = 'inline-flex w-full h-14 min-h-[56px] items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-5 text-base sm:text-lg font-semibold text-slate-700 shadow-xs transition-all duration-200 hover:border-src-blue hover:text-src-blue hover:shadow-md hover:bg-slate-50 focus-visible:outline-none';
    $spinner = '<svg class="size-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" /><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z" /></svg>';
@endphp

    {{-- =====================================================================
         ALUR RESET KATA SANDI (FORGOT PASSWORD)
         Terdiri dari 4 langkah berurutan: Email -> OTP -> Sandi Baru -> Sukses
    ====================================================================== --}}
    <div id="panel-forgot">


        {{-- -------------------------------------------------------------
             STEP 1: Masukkan Email Akun
        -------------------------------------------------------------- --}}
        <form data-forgot-step="email" novalidate class="space-y-5 sm:space-y-6">
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-slate-900">Lupa Kata Sandi</h2>
                <p class="mt-2 text-lg text-slate-500">
                    Masukkan email akun SRC Anda untuk menerima 4-digit kode OTP verifikasi.
                </p>
            </div>

            <div class="group">
                <label for="forgot-email" class="{{ $labelCls }}">
                    Email Terdaftar <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="mail" class="size-5" /></span>
                    <input id="forgot-email" name="email" type="email" autocomplete="email" placeholder="nama@gmail.com"
                           data-validate="required|email" aria-describedby="forgot-email-error" required
                           class="{{ $inputCls }} pl-11">
                </div>
                <p id="forgot-email-error" data-error-for="email" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            <button type="submit" data-submit-forgot-email class="{{ $btnCls }}">
                <span data-button-spinner class="hidden" aria-hidden="true">{!! $spinner !!}</span>
                <span data-button-label>Kirim Kode OTP</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 opacity-80" aria-hidden="true"><path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>

            <button type="button" data-action="back-to-login" class="{{ $backBtnCls }}">
                <x-icon name="arrow-left" class="size-4" /> Kembali ke Masuk
            </button>
        </form>

        {{-- -------------------------------------------------------------
             STEP 2: Input & Verifikasi Kode OTP (4 Digit)
        -------------------------------------------------------------- --}}
        <form data-forgot-step="otp" novalidate class="space-y-5 sm:space-y-6" hidden>
            <div class="text-center">
                <h2 class="text-4xl font-bold tracking-tight text-slate-900">Verifikasi Kode OTP</h2>
                <p class="mt-2 text-lg text-slate-500">
                    Masukkan 4-digit kode verifikasi yang dikirim ke
                    <span class="font-semibold text-slate-800" data-otp-email></span>.
                </p>
            </div>

            <fieldset data-otp-group class="w-full">
                <legend class="sr-only">Masukkan 4 digit kode OTP verifikasi</legend>
                <div class="flex justify-center gap-2 sm:gap-3">
                    @for ($i = 0; $i < 4; $i++)
                        <input type="text" inputmode="numeric" maxlength="1" pattern="[0-9]*" data-otp-input
                               autocomplete="{{ $i === 0 ? 'one-time-code' : 'off' }}" aria-label="Digit ke-{{ $i + 1 }} dari 4"
                               class="h-14 w-12 min-h-[56px] rounded-lg border border-slate-300 bg-white text-center text-2xl font-bold text-slate-900 transition duration-150
                                      hover:border-slate-400
                                      focus:border-src-blue focus:outline-none focus:ring-0
                                      aria-[invalid=true]:border-red-500 sm:h-14 sm:w-14 sm:text-2xl">
                    @endfor
                </div>
                <p data-error-for="otp" role="alert" class="{{ $errorCls }} justify-center mt-2.5">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </fieldset>

            <button type="submit" data-submit-forgot-otp class="{{ $btnCls }}">
                <span data-button-spinner class="hidden" aria-hidden="true">{!! $spinner !!}</span>
                <span data-button-label>Verifikasi OTP</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 opacity-80" aria-hidden="true"><path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>

            <div class="flex flex-wrap items-center justify-between gap-2 text-sm pt-1">
                <button type="button" data-action="change-email"
                        class="rounded font-semibold text-slate-500 transition hover:text-src-blue focus-visible:outline-none">
                    Ganti email
                </button>
                <span class="flex items-center gap-1.5">
                    <span class="text-slate-400">Tidak menerima?</span>
                    <button type="button" data-action="resend-otp"
                            class="rounded font-semibold text-src-blue transition hover:underline focus-visible:outline-none disabled:cursor-not-allowed disabled:text-slate-400 disabled:no-underline">
                        <span data-resend-label>Kirim Ulang OTP</span>
                    </button>
                </span>
            </div>

            <button type="button" data-action="back-to-login" class="{{ $backBtnCls }}">
                <x-icon name="arrow-left" class="size-4" /> Kembali
            </button>
        </form>

        {{-- -------------------------------------------------------------
             STEP 3: Buat Kata Sandi Baru
        -------------------------------------------------------------- --}}
        <form data-forgot-step="reset" novalidate class="space-y-5 sm:space-y-6" hidden>
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-slate-900">Buat Kata Sandi Baru</h2>
                <p class="mt-2 text-lg text-slate-500">Pilih kata sandi baru yang kuat dan belum pernah digunakan.</p>
            </div>

            <div class="group">
                <label for="reset-password" class="{{ $labelCls }}">
                    Kata Sandi Baru <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="lock" class="size-5" /></span>
                    <input id="reset-password" name="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter"
                           data-validate="required|min:8" aria-describedby="reset-password-error" required
                           class="{{ $inputCls }} pr-12 pl-11">
                    <button type="button" data-password-toggle="reset-password" aria-label="Tampilkan kata sandi" aria-pressed="false" class="{{ $eyeCls }}">
                        <x-icon name="eye" class="size-5" data-password-icon />
                        <x-icon name="eye-off" class="hidden size-5" data-password-icon />
                    </button>
                </div>
                <p id="reset-password-error" data-error-for="password" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            <div class="group">
                <label for="reset-password-confirmation" class="{{ $labelCls }}">
                    Konfirmasi Kata Sandi Baru <span class="text-src-blue" aria-hidden="true">*</span>
                </label>
                <div class="relative">
                    <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="lock" class="size-5" /></span>
                    <input id="reset-password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Ulangi kata sandi baru"
                           data-validate="required|match:password" aria-describedby="reset-password-confirmation-error" required
                           class="{{ $inputCls }} pr-12 pl-11">
                    <button type="button" data-password-toggle="reset-password-confirmation" aria-label="Tampilkan kata sandi" aria-pressed="false" class="{{ $eyeCls }}">
                        <x-icon name="eye" class="size-5" data-password-icon />
                        <x-icon name="eye-off" class="hidden size-5" data-password-icon />
                    </button>
                </div>
                <p id="reset-password-confirmation-error" data-error-for="password_confirmation" role="alert" class="{{ $errorCls }}">
                    <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
                </p>
            </div>

            <button type="submit" data-submit-forgot-reset class="{{ $btnCls }}">
                <span data-button-spinner class="hidden" aria-hidden="true">{!! $spinner !!}</span>
                <span data-button-label>Perbarui Kata Sandi</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="size-4 shrink-0 opacity-80" aria-hidden="true"><path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </button>
        </form>

        {{-- -------------------------------------------------------------
             STEP 4: Konfirmasi Sukses Reset Kata Sandi
        -------------------------------------------------------------- --}}
        <div data-forgot-step="success" hidden>
            <div class="text-center py-3">
                <span class="mx-auto flex size-14 sm:size-16 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 ring-8 ring-emerald-50/70 border border-emerald-200">
                    <x-icon name="check" class="size-7 sm:size-8" />
                </span>
                <h2 class="mt-4 sm:mt-5 text-4xl font-bold tracking-tight text-slate-900">Kata Sandi Diperbarui!</h2>
                <p class="mt-2 text-lg leading-relaxed text-slate-500">
                    Kata sandi akun SRC Anda telah berhasil diubah. Sekarang Anda dapat masuk dengan kata sandi baru.
                </p>
            </div>

            <button type="button" data-action="back-to-login" class="mt-5 sm:mt-6 {{ $btnCls }}">
                Masuk Sekarang <x-icon name="arrow-right" class="size-4" />
            </button>
        </div>
    </div>

@endsection
