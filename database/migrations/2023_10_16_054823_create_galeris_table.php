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
        Schema::create('galeri', function (Blueprint $table) {
            $table->integer("id_galeri", true);
            // $table->integer("nik_admin")->nullable(false);
            $table->string("foto", 255)->nullable(false);
            $table->text("keterangan_foto")->nullable(false);

            //FOREIGN KEY

            // $table->foreign("nik_admin")->on("admin")->references("nik_admin");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
