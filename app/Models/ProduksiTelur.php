<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduksiTelur extends Model
{
    protected $fillable = [
        'tanggal', 'berat_telur', 'harga_telur',
        'berat_pakan', 'harga_pakan',
        'total_harga_telur', 'total_harga_pakan', 'laba_rugi'
    ];

    protected static function booted(): void
    {
        static::saving(function ($model) {
            $model->total_harga_telur = $model->berat_telur * $model->harga_telur;
            $model->total_harga_pakan = $model->berat_pakan * $model->harga_pakan;
            $model->laba_rugi = $model->total_harga_telur - $model->total_harga_pakan;
        });
    }
}