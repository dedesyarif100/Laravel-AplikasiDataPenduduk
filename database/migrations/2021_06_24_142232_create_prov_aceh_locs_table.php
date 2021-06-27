<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvAcehLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_aceh_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_aceh');
            $table->string('nama_kabupaten_aceh', 100);
            $table->float('luas_wilayah_aceh', 30)->nullable();
            $table->float('total_penduduk_aceh', 30)->nullable();
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
        Schema::dropIfExists('prov_aceh_locs');
    }
}
