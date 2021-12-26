<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->bigIncrements('surat_id');
            $table->string('nama');
            $table->string('nik');
            $table->string('no_hp');
            $table->string('jenis_surat');
            $table->string('alamat_lengkap');
            $table->string('umur');
            $table->string('ttl');
            $table->string('pekerjaan');
            $table->string('photo_berkas_pendukung_1')->nullable();
            $table->string('photo_berkas_pendukung2')->nullable();
            $table->enum('kelamin', ['Laki-laki', 'Perempuan', 'Tanpa Keterangan'])->nullable();
            $table->enum('agama', ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu', 'Tanpa Keterangan'])->nullable();
            $table->enum('status', ['Telah Diproses', 'Belum Diproses'])->nullable();
            $table->string('pesan');
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
        Schema::dropIfExists('surat');
    }
}
