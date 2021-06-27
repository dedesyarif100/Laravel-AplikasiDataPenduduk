<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvJawatengahLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_jawatengah_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_jawatengah');
            $table->string('nama_kabupaten_jawatengah', 100);
            $table->float('luas_wilayah_jawatengah', 30)->nullable();
            $table->float('total_penduduk_jawatengah', 30)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prov_jawatengah_locs');
    }
}
