<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DeleteTriggerDeletejambi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_jambi_delete
            AFTER DELETE ON `prov_jambi_locs`
            FOR EACH ROW
            BEGIN
                INSERT INTO trigger_deletejambi SET
                    id_kabupaten_jambi = OLD.id_kabupaten_jambi,
                    new_kabupaten = OLD.nama_kabupaten_jambi,
                    new_wilayah = OLD.luas_wilayah_jambi,
                    new_penduduk = OLD.total_penduduk_jambi,
                    deleted_at = now();
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `trigger_jambi_delete`');
    }
}
