<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Sukabumi Robotic Competition (SRC) 2026
|--------------------------------------------------------------------------
| Landing Page dan Dashboard dihapus dari alur aplikasi.
| Rute root (/) dan dashboard dialihkan (redirect) secara elegan ke login,
| menjamin tidak ada exception 500 'View not found'.
|
*/

// Redirect root ke halaman login
Route::redirect('/', '/login');

// Autentikasi Peserta (Login, Registrasi)
Route::view('/login', 'auth.login')->name('login');

// Lupa Kata Sandi (Halaman Khusus)
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

// Autentikasi Administrator
Route::view('/admin/login', 'auth.admin-login')->name('admin.login');

// Fallback redirect untuk dashboard yang dihapus
Route::redirect('/dashboard', '/login')->name('dashboard.user');
Route::redirect('/admin/dashboard', '/admin/login')->name('dashboard.admin');
