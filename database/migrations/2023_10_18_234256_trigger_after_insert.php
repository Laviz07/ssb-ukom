<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $triggerName = 'trigger_after_insert_pelatih';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE OR REPLACE TRIGGER $this->triggerName
            AFTER INSERT ON pelatih FOR EACH ROW

            BEGIN 
                DECLARE t_username varchar(50);
                -- DECLARE t_password varchar(255);
                DECLARE t_role ENUM('admin', 'pelatih', 'pemain');

                SELECT username into t_username from user where id_user = New.id_user;
                -- SELECT password into t_password from user where id_user = New.id_user;
                SELECT role into t_role from user where id_user = New.id_user;
                
                SELECT foto_profil into @foto_profil from user where id_user = New.id_user;

                SET @deskripsi_pelatih := IFNULL(New.deskripsi_pelatih, '[NULL]');
                
                CALL Logger(t_username, 'INSERT',
                    'ini log');
            END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared("DROP TRIGGER IF EXISTS $this->triggerName");
    }
};
