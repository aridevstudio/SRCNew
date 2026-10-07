<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    $competitions = config('competitions.items', []);
    return view('user.index', compact('competitions'));
})->name('home');

Route::get('/competitions/{slug}', function ($slug) {
    $competitions = config('competitions.items', []);
    $competition = collect($competitions)->firstWhere('slug', $slug);

    if (!$competition) {
        abort(404, 'Kategori perlombaan tidak ditemukan.');
    }

    $otherCompetitions = collect($competitions)->where('slug', '!=', $slug)->take(3);

    return view('user.competition-detail', compact('competition', 'otherCompetitions'));
})->name('competitions.show');

Route::get('/competitions/{slug}/checkout', function ($slug) {
    $competitions = config('competitions.items', []);
    $competition = collect($competitions)->firstWhere('slug', $slug);

    if (!$competition) {
        abort(404, 'Kategori perlombaan tidak ditemukan.');
    }

    return view('user.checkout', compact('competition'));
})->name('competitions.checkout');

Route::get('/checkout', function (Request $request) {
    $slug = $request->query('category', 'creative-innovation');
    $competitions = config('competitions.items', []);
    $competition = collect($competitions)->firstWhere('slug', $slug) ?? ($competitions[0] ?? []);

    return view('user.checkout', compact('competition'));
})->name('checkout');

Route::post('/payments', function (Request $request) {
    $method = $request->input('payment_method', 'auto');
    $slug = $request->input('competition_slug', 'creative-innovation');
    $competitions = config('competitions.items', []);
    $competition = collect($competitions)->firstWhere('slug', $slug) ?? ($competitions[0] ?? []);

    $reference = 'SRC-' . date('Y') . '-' . strtoupper(bin2hex(random_bytes(3)));
    $methodFormatted = match($method) {
        'transfer' => 'Transfer Bank (Manual)',
        'cash' => 'Tunai / Cash (Manual)',
        default => 'Midtrans (Otomatis)'
    };

    $teams = $request->input('teams', []);
    $count = (is_array($teams) && count($teams) > 0) ? count($teams) : (int) $request->input('participant_count', 1);
    if ($count < 1) $count = 1;

    $rawPrice = $competition['price_early'] ?? ($competition['price_normal'] ?? 'Rp 100.000');
    $unitPrice = (int) preg_replace('/[^0-9]/', '', $rawPrice) ?: 100000;
    $totalAmount = $unitPrice * $count;
    $amountFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');

    $now = now();
    $completesAt = ($method === 'auto') ? (int)($now->timestamp * 1000 + 3500) : null;

    return response()->json([
        'success' => true,
        'payment' => [
            'reference' => $reference,
            'status' => ($method === 'auto') ? 'Berhasil' : 'Menunggu Konfirmasi',
            'date_formatted' => $now->translatedFormat('d M Y, H:i') . ' WIB',
            'method' => $method,
            'method_formatted' => $methodFormatted,
            'amount_formatted' => $amountFormatted,
            'approval_completes_at' => $completesAt,
            'complete_url' => route('payments.complete', ['reference' => $reference]),
        ]
    ]);
})->name('payments.store');

Route::post('/payments/complete/{reference}', function ($reference) {
    return response()->json([
        'success' => true,
        'message' => 'Pembayaran berhasil dikonfirmasi.',
        'reference' => $reference
    ]);
})->name('payments.complete');

