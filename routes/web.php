<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduksiTelurController;

Route::get('/', function () {
    return redirect('/produksi');
});

Route::resource('produksi', ProduksiTelurController::class);
