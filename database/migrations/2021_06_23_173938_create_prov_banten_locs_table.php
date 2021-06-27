<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvBantenLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_banten_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_banten');
            $table->string('nama_kabupaten_banten', 100);
            $table->float('luas_wilayah_banten', 30)->nullable();
            $table->float('total_penduduk_banten', 30)->nullable();
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
        Schema::dropIfExists('prov_banten_locs');
    }
}
