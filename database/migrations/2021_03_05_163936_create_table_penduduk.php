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
            $table->string('no_kk')->nullable();
            $table->string('no_nik')->nullable();
            $table->string('nama')->nullable();
            $table->enum('kelamin', ['L', 'P', 'Tanpa Keterangan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->enum('agama', ['ISLAM', 'KRISTEN', 'KATOLIK', 'HINDU', 'BUDDHA', 'KONG HU CU', 'Tanpa Keterangan'])->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();


            $table->enum('status_perkawinan', [
                'KAWIN', 'BELUM KAWIN',
                'CERAI MATI', 'CERAI HIDUP', 'KAWIN BELUM TERCATAT',
                'BELUM KAWIN TERCATAT', 'KAWIN TERCATAT'
            ])->nullable();


            $table->enum('status_keluarga', [
                'KK', 'ISTRI', 'ANAK',
                'FAMILI LAIN', 'CUCU', 'MERTUA', 'ORANG TUA',
                'Tanpa Keterangan'
            ])->nullable();


            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('status', ['Masih Hidup', 'Meninggal', 'Tanpa Keterangan'])->nullable();
            $table->enum('keterangan', ['Pindah Datang', 'Pindah Keluar', 'Warga Tetap', 'Tanpa Keterangan'])->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            // $table->string('dusun')->nullable();
            // $table->string('provinsi')->nullable();
            // $table->string('kota')->nullable();
        });
    }




    // public function up()
    // {
    //     Schema::create('penduduk', function (Blueprint $table) {
    //         $table->bigIncrements('penduduk_id');
    //         $table->string('nama')->nullable();
    //         $table->string('no_nik')->nullable();
    //         $table->string('no_kk')->nullable();
    //         $table->string('no_hp')->nullable();
    //         $table->enum('status_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Tanpa Keterangan'])->nullable();
    //         $table->enum('kelamin', ['Laki-laki', 'Perempuan', 'Tanpa Keterangan'])->nullable();
    //         $table->enum('agama', ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu', 'Tanpa Keterangan'])->nullable();
    //         $table->enum('status', ['Masih Hidup', 'Meninggal', 'Tanpa Keterangan'])->nullable();
    //         $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin'])->nullable();
    //         $table->enum('keterangan', ['Pindah Datang', 'Pindah Keluar', 'Warga Tetap', 'Tanpa Keterangan'])->nullable();
    //         $table->string('dusun')->nullable();
    //         $table->string('tgl_lahir')->nullable();
    //         $table->string('pendidikan_terakhir')->nullable();
    //         $table->string('photo')->nullable();
    //         $table->string('pekerjaan')->nullable();
    //         $table->string('provinsi')->nullable();
    //         $table->string('kota')->nullable();
    //         $table->string('alamat')->nullable();
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
        Schema::dropIfExists('penduduk');
    }
}
