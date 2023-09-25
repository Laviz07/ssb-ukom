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

            $table->integer('id_pelatih', true)->autoIncrement();
            $table->string('nama_pelatih', 50)->nullable(false);
            $table->text('desk_pelatih')->nullable(true);
            $table->text('foto_pelatih')->nullable(true);
            $table->string('alamat', 255)->nullable(false);
            $table->integer('no_telp')->nullable(false);
            $table->string('tmpt_lahir', 50)->nullable(false);
            $table->date('tgl_lahir')->default('1960-01-01')->nullable(false);
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
