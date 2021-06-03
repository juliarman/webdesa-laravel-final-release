<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->id('kota_id');
            $table->unsignedInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('provinsi_id')->on('provinsi');
            $table->string('nama_provinsi');
            $table->string('type');
            $table->string('nama_kota');
            $table->string('kode_pos', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kota');
    }
}
