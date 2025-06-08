<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('produksi_telurs', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->float('berat_telur');
        $table->float('harga_telur');
        $table->float('berat_pakan');
        $table->float('harga_pakan');
        $table->float('total_harga_telur')->nullable();
        $table->float('total_harga_pakan')->nullable();
        $table->float('laba_rugi')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('produksi_telurs');
    }
};
