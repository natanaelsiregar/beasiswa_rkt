<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('prodi', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('nama_prodi');
    //         $table->integer('id_prodi');
    //         $table->foreign('id_prodi')->references('id_prodi')->on('data_beasiswa');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodi');
    }
};
