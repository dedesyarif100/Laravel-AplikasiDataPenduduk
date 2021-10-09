<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_jambi_create
            AFTER INSERT ON `prov_jambi_locs`
            FOR EACH ROW
            BEGIN
                INSERT INTO trigger_createjambi SET
                    id_kabupaten_jambi = NEW.id_kabupaten_jambi,
                    new_kabupaten = NEW.nama_kabupaten_jambi,
                    new_wilayah = NEW.luas_wilayah_jambi,
                    new_penduduk = NEW.total_penduduk_jambi,
                    created_at = now();
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
        DB::unprepared('DROP TRIGGER `trigger_jambi_create`');
    }
}
