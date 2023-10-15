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
        Schema::create('peninjauan', function (Blueprint $table) {
            $table->integer('id_peninjauan')->autoIncrement()->primary();
            $table->date('tanggal_peninjauan')->default('1960-01-01')->nullable(false);
            $table->text('evaluasi')->nullable(false);
            $table->int('nilai', 3)->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peninjauan');
    }
};
