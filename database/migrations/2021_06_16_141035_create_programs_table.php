<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('edulevel_id')->unsigned(); // Cara Kedua Untuk Foreign Key
            $table->foreignId('edulevel_id')->constrained('edulevels')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->float('student_price')->nullable();
            $table->bigInteger('student_max')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });

        // Schema::table('programs', function (Blueprint $table) { // Cara Pertama Untuk Foreign Key
        //     // Foreign Key Constraints
        //     $table->foreign('edulevel_id')->references('id')->on('edulevels')
        //             ->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
