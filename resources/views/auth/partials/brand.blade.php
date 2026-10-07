{{--
|--------------------------------------------------------------------------
| BRAND EMBLEM / LOGO COMPONENT
|--------------------------------------------------------------------------
| Komponen logo resmi Sukabumi Robotic Competition (SRC).
| Menggunakan aset gambar resmi 3D (src-logo.png) yang diunggah oleh panitia.
| Mendukung dynamic class sizing, lazy loading attribute, dan efek hover halus.
|
| Usage: @include('auth.partials.brand', ['class' => 'h-11 w-auto'])
|--------------------------------------------------------------------------
--}}
<div class="inline-flex items-center select-none">
    <img src="{{ asset('images/src-logo.png') }}"
         alt="Sukabumi Robotic Competition (SRC)"
         class="{{ $class ?? 'h-24 sm:h-28' }} w-auto object-contain transition-transform duration-300 hover:scale-105"
         loading="eager" />
</div>