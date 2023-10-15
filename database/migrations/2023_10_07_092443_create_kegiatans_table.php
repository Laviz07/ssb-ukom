<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->integer('id_kegiatan')->autoIncrement()->primary();
            $table->enum('tipe_kegiatan', ['latihan', 'pertandingan'])->nullable(false);
            $table->time('jam_kegiatan')->nullable(false);
            $table->string('foto_kegiatan', 255)->nullable(true);
            $table->text('detail_kegiatan')->nullable(false);
            $table->string('laporan_kegiatan', 255)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
