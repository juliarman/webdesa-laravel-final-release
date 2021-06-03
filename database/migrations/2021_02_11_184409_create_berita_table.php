<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->bigIncrements('berita_id');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories')->onDelete('cascade');
            $table->string('judul');
            $table->string('sub_judul')->nullable();
            $table->enum('headline', ['Y', 'N']);
            $table->enum('aktif', ['Y', 'N']);
            $table->enum('utama', ['Y', 'N']);
            $table->enum('status', ['Terbit', 'Draft']);
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
        //
    }
}
