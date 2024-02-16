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
        Schema::create('presensi_pelatih', function (Blueprint $table) {
            $table->string('id_presensi_pelatih', 7)->primary();
            $table->string('id_presensi', 7)->nullable(false);
            $table->bigInteger('nik_pelatih')->nullable(false);
            $table->enum('keterangan', ['hadir', 'sakit', 'izin'])->nullable(false);
            // $table->time('waktu')->nullable(false)->useCurrent();
            $table->timestamp('created_at')->nullable(false)->useCurrent();

            $table->foreign('id_presensi')->references('id_presensi')->on('presensi')
                ->onDelete('cascade')->onUpdate("cascade");

            $table->foreign('nik_pelatih')->references('nik_pelatih')->on('pelatih')
                ->onDelete('cascade')->onUpdate("cascade");

            // Validasi unik untuk id_presensi dan nik_pelatih
            $table->unique(['id_presensi', 'nik_pelatih']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_pelatih');
    }
};
