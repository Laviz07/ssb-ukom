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
        Schema::create('pemain', function (Blueprint $table) {
            $table->integer('nisn_pemain')->autoIncrement()->primary();
            $table->string('nama_pemain', 50)->nullable(false);
            $table->string('tmpt_lahir', 50)->nullable(false);
            $table->date('tgl_lahir')->default('1960-01-01')->nullable(false);
            $table->string('alamat', 255)->nullable(false);
            $table->integer('no_telp', 15)->nullable(false);
            $table->enum('posisi', ['kiper', 'back', 'gelandang', 'striker'])->nullable(false);
            $table->enum('kategori_umur', ['7-12', '13-15', '16-18'])->nullable(false);
            $table->varchar('foto_pemain', 255)->nullable(true);
            $table->text('desk_pemain')->nullable(true);
            $table->int('no_punggung')->nullable(false);
            
            
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemain');
    }
};
