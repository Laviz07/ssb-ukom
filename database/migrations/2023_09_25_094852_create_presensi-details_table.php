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
        Schema::create('presensi-detail', function (Blueprint $table) {
            $table->integer('id_presensi_detail')->autoIncrement();
            $table->enum('keterangan', ['hadir', 'sakit', 'izin'])->nullable(false);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi-detail');
    }
};
