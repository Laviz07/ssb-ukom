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
            $table->integer("id_tim")->autoIncrement();
            $table->bigInteger("nisn_pemain")->nullable(false);
            $table->string("nama_tim", 50)->nullable(false);
            $table->text("deskripsi_tim")->nullable(true);
            $table->string("foto_tim", 255)->nullable(true);

            $table->foreign("nisn_pemain")->on("pemain")->references("nisn_pemain");
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
