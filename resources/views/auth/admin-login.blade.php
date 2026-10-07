{{--
|--------------------------------------------------------------------------
| ADMIN LOGIN VIEW (PORTAL ADMINISTRATOR)
|--------------------------------------------------------------------------
| Portal login khusus administrator Sukabumi Robotic
| Competition (SRC). Tampilan diselaraskan persis dengan halaman login user.
|--------------------------------------------------------------------------
--}}

@extends('layouts.app')

@section('title', 'SRC - Login Admin')
@section('portal', 'admin')

@section('footer')
    <p class="text-slate-500">
        Akses khusus administrator <span class="font-semibold text-slate-700">SRC 2026</span>.
    </p>
@endsection

@section('content')

@php
    $inputCls = 'block w-full h-14 min-h-[56px] rounded-xl border border-slate-300 bg-white px-4 py-3 text-lg text-slate-900 transition duration-150
                placeholder:text-slate-400 hover:border-slate-400
                focus:border-src-blue focus:outline-none
                disabled:cursor-not-allowed disabled:bg-slate-100 disabled:text-slate-500
                aria-[invalid=true]:border-red-500 aria-[invalid=true]:bg-red-50/40';
    $labelCls = 'mb-2 block text-base sm:text-lg font-semibold text-slate-700';
    $errorCls = 'mt-1.5 hidden items-center gap-1.5 text-base font-medium text-red-600';
    $iconCls = 'pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-3.5 text-slate-400 transition group-focus-within:text-src-blue';
    $eyeCls = 'absolute inset-y-0 right-0 flex items-center justify-center px-3.5 text-slate-400 transition hover:text-src-blue focus-visible:outline-none';
    $btnCls = 'inline-flex w-full h-14 min-h-[56px] items-center justify-center gap-2 rounded-xl bg-src-blue px-5 text-lg font-semibold text-white shadow-lg shadow-src-blue/25 transition duration-150
               hover:bg-src-blue/90 hover:shadow-src-blue/35 active:scale-[0.99] focus-visible:outline-none
               disabled:cursor-not-allowed disabled:opacity-60';
    $spinner = '<svg class="size-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" /><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z" /></svg>';
@endphp

{{-- Target Route Admin Dashboard --}}
<script type="application/json" id="src-routes">@json(['adminDashboard' => route('dashboard.admin')])</script>

<form data-auth-form="admin-login" novalidate class="space-y-5 sm:space-y-6">
    {{-- Header Admin (selaras persis dengan Masuk Akun) --}}
    <div class="mb-4 sm:mb-5">
        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900">Admin Control Panel</h2>
        <p class="mt-2 text-lg text-slate-500">Panitia Sukabumi Robotic Competition 2026</p>
    </div>

    {{-- Error Banner --}}
    <div class="hidden" data-form-message>
        <div class="flex items-start gap-2.5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700">
            <x-icon name="alert" class="mt-0.5 size-4 shrink-0" />
            <span class="min-w-0 flex-1" data-error-text></span>
        </div>
    </div>

    {{-- Input Email Admin --}}
    <div class="group">
        <label for="admin-email" class="{{ $labelCls }}">
            Email Administrator <span class="text-src-blue" aria-hidden="true">*</span>
        </label>
        <div class="relative">
            <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="mail" class="size-5" /></span>
            <input id="admin-email" name="email" type="email" autocomplete="email" placeholder="admin@src-sukabumi.id"
                   data-validate="required|email" aria-describedby="admin-email-error" required
                   class="{{ $inputCls }} pl-11">
        </div>
        <p id="admin-email-error" data-error-for="email" role="alert" class="{{ $errorCls }}">
            <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
        </p>
    </div>

    {{-- Input Password Admin --}}
    <div class="group">
        <label for="admin-password" class="{{ $labelCls }}">
            Kata Sandi <span class="text-src-blue" aria-hidden="true">*</span>
        </label>
        <div class="relative">
            <span class="{{ $iconCls }}" aria-hidden="true"><x-icon name="lock" class="size-5" /></span>
            <input id="admin-password" name="password" type="password" autocomplete="current-password" placeholder="••••••••"
                   data-validate="required|min:8" aria-describedby="admin-password-error" required
                   class="{{ $inputCls }} pr-12 pl-11">
            <button type="button" data-password-toggle="admin-password" aria-label="Tampilkan kata sandi" aria-pressed="false"
                    class="{{ $eyeCls }}">
                <x-icon name="eye" class="size-5" data-password-icon />
                <x-icon name="eye-off" class="hidden size-5" data-password-icon />
            </button>
        </div>
        <p id="admin-password-error" data-error-for="password" role="alert" class="{{ $errorCls }}">
            <x-icon name="alert" class="size-4 shrink-0" /><span data-error-text></span>
        </p>
    </div>

    {{-- Submit Button --}}
    <button type="submit" data-submit-admin class="{{ $btnCls }}">
        <span data-button-spinner class="hidden" aria-hidden="true">{!! $spinner !!}</span>
        <span data-button-label>Masuk</span>
    </button>

    {{-- Footer Info (selaras persis dengan Masuk Akun) --}}
    <div class="pt-2 text-center">
        <p class="text-sm text-slate-500">
            Bukan administrator?
            <a href="{{ route('login') }}" class="font-semibold text-src-blue hover:underline">
                Masuk sebagai Peserta
            </a>
        </p>
    </div>
</form>

@endsection
