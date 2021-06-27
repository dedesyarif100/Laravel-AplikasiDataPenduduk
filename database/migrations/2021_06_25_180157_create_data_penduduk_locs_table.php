<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPendudukLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penduduk_locs', function (Blueprint $table) {
            $table->id('id_penduduk');
            $table->float('nik', 50);
            $table->string('nama', 100)->nullable();
            $table->datetime('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->bigInteger('provinsi_id')->unsigned();
            // $table->foreignId('kabupaten_id');
            // $table->bigInteger('provinsi_id')->unsigned();
            // $table->bigInteger('kabupaten_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('data_penduduk_locs', function (Blueprint $table) { // Cara Pertama Untuk Foreign Key
            // Foreign Key Constraints
            $table->foreign('provinsi_id')->references('id_provinsi')->on('data_provinsi')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_penduduk_locs');
    }
}
