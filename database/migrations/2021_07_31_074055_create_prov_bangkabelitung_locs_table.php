<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvBangkabelitungLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_bangkabelitung_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_bangkabelitung');
            $table->string('nama_kabupaten_bangkabelitung', 100);
            $table->integer('luas_wilayah_bangkabelitung')->nullable();
            $table->integer('total_penduduk_bangkabelitung')->nullable();
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
        Schema::dropIfExists('prov_bangkabelitung_locs');
    }
}
