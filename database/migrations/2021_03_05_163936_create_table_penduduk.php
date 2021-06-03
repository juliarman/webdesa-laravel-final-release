<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->bigIncrements('penduduk_id');
            $table->string('nama')->nullable();
            $table->bigInteger('no_nik')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('kelamin', ['Laki-laki', 'Perempuan', 'Tanpa Keterangan'])->nullable();
            $table->enum('agama', ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu', 'Tanpa Keterangan'])->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('photo')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('penduduk');
    }
}
