<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBumdes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bumdes', function (Blueprint $table) {
            $table->bigIncrements('bumdes_id');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->string('judul')->nullable();
            $table->string('sub_judul')->nullable();
            $table->enum('headline', ['Y', 'N'])->nullable();
            $table->enum('aktif', ['Y', 'N'])->nullable();
            $table->enum('utama', ['Y', 'N'])->nullable();
            $table->enum('status', ['Terbit', 'Draft'])->nullable();
            $table->text('isi_konten')->nullable();
            $table->text('keterangan_gambar')->nullable();
            $table->string('gambar')->nullable();
            $table->string('slug')->nullable();
            $table->string('tag')->nullable();
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
        Schema::dropIfExists('bumdes');
    }
}
