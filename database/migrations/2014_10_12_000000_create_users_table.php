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
        Schema::create('user', function (Blueprint $table) {
            $table->integer("id_user")->autoIncrement();
            $table->boolean('active')->default(true); 
            $table->string('username')->nullable(false);
            $table->string('password')->nullable(false);
            $table->enum("role", ['admin', 'pelatih', 'pemain'])->nullable(false);
            $table->string("foto_profil", 255)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
