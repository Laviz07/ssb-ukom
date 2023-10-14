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
        Schema::create('tim', function (Blueprint $table) {
            $table->integer('id_tim')->autoIncrement()->primary();
            $table->string('nama_tim', 50)->nullable(false);
            $table->varchar('foto_tim', 255)->nullable(true);
            $table->text('desk_tim')->nullable(true);
            
            // $table->foreign('nisn_pemain')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim');
    }
};
