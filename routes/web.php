<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Url;
use App\Models\Click;

Route::get('/', function () {
    return view('home');
});

Route::get('/url', [UrlController::class, 'index'])->name('urls.index');
Route::post('/url', [UrlController::class, 'store'])->name('urls.store');

Route::get('/url/{id}', [UrlController::class, 'show'])->name('urls.show');
Route::get('/url/{id}/edit', [UrlController::class, 'edit'])->name('urls.edit');
Route::put('/url/{id}', [UrlController::class, 'update'])->name('urls.update');

Route::delete('/url/{id}', [UrlController::class, 'destroy'])->name('urls.destroy');

Route::post('/', function (Request $request) {
    $originalUrl = $request->input('url');

    // Encontra a URL existente com o mesmo original_url se existir
    $existingUrl = Url::where('original_url', $originalUrl)->first();

    if ($existingUrl) {
        return redirect()->route('shorten.show', ['id' => $existingUrl->id]);
    }

    // Se não existir, encurta a URL
    $shortenedUrl = Http::withHeaders(['Content-Type' => 'application/json',])
        ->post('https://api.urlshortener.com/v1/shorten?apiKey=YOUR_API_KEY&url=' . urlencode($originalUrl));

    // Armazene os dados encurtados na base de dados
    $shortened = new Url();
    $shortened->original_url = $originalUrl;
    $shortened->shortened_url = $shortened->id; // Você pode usar outras informações da resposta
    $shortened->save();

    return redirect()->route('shorten.show', ['id' => $shortened->id]);
});

Route::get('/{id}', function (Request $request, $id) {
    $url = Url::findOrFail($id);

    // Atualize os dados de rastreamento
    $clickCount = Click::where('url_id', $url->id)->count();
    $trackingData = [
        'click_count' => $clickCount,
    ];
    $url->tracking_data = json_encode($trackingData);
    $url->save();

    return view('shorten/show', ['url' => $url]);
});
