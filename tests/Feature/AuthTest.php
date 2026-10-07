<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Uji Redirect Halaman Utama ke Login (Landing Page Dihapus)
     */
    public function test_landing_page_redirects_to_login(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }

    /**
     * Uji Halaman Login & Registrasi Peserta dengan Brand Sukabumi Robotic Competition 2026
     */
    public function test_user_login_and_register_page_meets_all_specifications(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);

        // Teks identitas & navigasi
        $response->assertSee('Sukabumi Robotic Competition 2026');

        // Navigasi Kembali ke Beranda
        $response->assertSee('Kembali ke Beranda');

        // Form tabs & headings
        $response->assertSee('Masuk Akun');
        $response->assertSee('Daftar Akun Baru');
        $response->assertSee('Registrasi Akun Baru');
        $response->assertSee('Daftarkan akun untuk melihat Dashboard anda.');

        // Field labels & placeholders
        $response->assertSee('Email');
        $response->assertSee('placeholder="nama@gmail.com"', false);
        $response->assertSee('Nama Lengkap');
        $response->assertSee('placeholder="Nama Lengkap Anda"', false);

        // Forgot password button
        $response->assertSee('Lupa kata sandi?');

        // Verifikasi negatif: elemen lama yang diminta dihapus
        $response->assertDontSee('Portal Admin');
        $response->assertDontSee('PORTAL PESERTA RESMI SRC');
        $response->assertDontSee('Pendaftaran Terbuka');
        $response->assertDontSee('PENDAFTARAN RESMI PESERTA');
        $response->assertDontSee('Suka Robot Competition');
    }

    /**
     * Uji Halaman Login Administrator dengan Brand Sukabumi Robotic Competition 2026
     */
    public function test_admin_login_page_renders(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);

        $response->assertSee('Admin Control Panel');
        $response->assertSee('admin-email');
        $response->assertSee('admin-password');
        $response->assertSee('Sukabumi Robotic Competition 2026');
        $response->assertSee('Kembali ke Beranda');
        $response->assertDontSee('Suka Robot Competition');
    }

    /**
     * Uji Halaman Khusus Lupa Kata Sandi (Forgot Password)
     */
    public function test_forgot_password_page_renders(): void
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);

        $response->assertSee('Lupa Kata Sandi');
        $response->assertSee('Kirim Kode OTP');
        $response->assertSee('Verifikasi Kode OTP');
        $response->assertSee('Kembali');
        $response->assertSee('Sukabumi Robotic Competition 2026');
    }

    /**
     * Uji Redirect Dashboard yang Dihapus
     */
    public function test_dashboards_redirect_gracefully(): void
    {
        $userDash = $this->get('/dashboard');
        $userDash->assertRedirect('/login');

        $adminDash = $this->get('/admin/dashboard');
        $adminDash->assertRedirect('/admin/login');
    }
}
