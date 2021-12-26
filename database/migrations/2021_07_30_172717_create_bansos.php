<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bansos', function (Blueprint $table) {
            $table->bigIncrements('bansos_id');
            $table->string('nama')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('nama_kabupaten')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->string('nama_kelurahan')->nullable();
            $table->string('no_rt')->nullable();
            $table->string('no_rw')->nullable();
            $table->string('cif')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('no_kartu')->nullable();
            $table->string('kocab')->nullable();
            $table->string('nama_area')->nullable();
            $table->string('reg')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('jenis_bantuan')->nullable();
            $table->enum('status', ['Selesai', 'Belum Selesai'])->nullable();
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
        Schema::dropIfExists('bansos');
    }
}
