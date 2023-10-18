<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $triggerName = 'trigger_update_insert_pemain';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared(
            " CREATE TRIGGER $this->triggerName
            AFTER UPDATE ON pemain FOR each ROW

            BEGIN
                DECLARE t_username varchar(50);

                SELECT username into t_username from user where id_user = New.id_user;

                SET @deskripsi_pemain := IFNULL(New.deskripsi_pemain, '[NULL]');

                CALL Logger(t_username, 'UPDATE',
                    CONCAT(
                        'from: ', '{',
                        'nama_pemain: ', Old.nama_pemain,
                        ', alamat: ', Old.alamat,
                        ', no_telp: ', Old.no_telp,
                        ', email: ', Old.email,
                        ', deskripsi_pemain: ', Old.deskripsi_pemain,
                        '}',
                        'to: ', '{',
                        'nama_pemain: ', New.nama_pemain,
                        ', alamat: ', New.alamat,
                        ', no_telp: ', New.no_telp,
                        ', email: ', New.email,
                        ', deskripsi_pemain: ', @deskripsi_pemain,
                        '}'
                    ));
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
