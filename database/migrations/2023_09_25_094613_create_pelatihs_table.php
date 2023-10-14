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
        Schema::create('pelatih', function (Blueprint $table) {

            $table->integer('nik_pelatih')->autoIncrement()->primary();
            $table->string('nama_pelatih', 50)->nullable(false);
            $table->string('tmpt_lahir', 50)->nullable(false);
            $table->date('tgl_lahir')->default('1960-01-01')->nullable(false);
            $table->varchar('foto_pelatih', 255)->nullable(true);
            $table->integer('no_telp', 15)->nullable(false);
            $table->string('alamat', 255)->nullable(false);
            $table->text('desk_pelatih')->nullable(true);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatih');
    }
};
