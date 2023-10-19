<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $triggerName = 'trigger_after_delete_pelatih';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            "CREATE TRIGGER $this->triggerName
            AFTER DELETE ON pelatih FOR each ROW

            BEGIN

                DECLARE t_username VARCHAR(50);
                DECLARE t_role ENUM('admin', 'pelatih', 'pemain');

                SELECT username into t_username from user where id_user = old.id_user;
                SELECT role into t_role from user where id_user = old.id_user;

                SELECT foto_profil into @foto_profil from user where id_user = old.id_user;

                SET @deskripsi_pelatih := ifnull(old.deskripsi_pelatih, '[NULL]');

                CALL Logger(t_username, 'DELETE',
                    CONCAT(
                        'id_user: ', Old.id_user,
                        ', role: ', t_role,
                        ', nik_pelatih: ', Old.nik_pelatih,
                        ', nama_pelatih: ', Old.nama_pelatih,
                        ', no_telp: ', Old.no_telp,
                        ', email: ', Old.email,
                        ', tempat_lahir: ', Old.tempat_lahir,
                        ', tanggal_lahir: ', Old.tanggal_lahir,
                        ', alamat: ', Old.alamat,
                        ', deskripsi_pelatih: ', @deskripsi_pelatih,
                        ', foto_profil: ', @foto_profil
                    )
                );
            END"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
