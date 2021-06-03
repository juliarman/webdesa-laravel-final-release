<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('posts_id');

            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('users_id')->on('users');

            $table->unsignedInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories');

            $table->string('judul');
            $table->string('sub_judul');
            $table->string('youtube');
            $table->enum('headline', ['Y', 'N']);
            $table->enum('aktif', ['Y', 'N']);
            $table->enum('utama', ['Y', 'N']);
            $table->enum('status', ['Y', 'N']);
            $table->text('isi_konten');
            $table->text('keterangan_gambar');
            $table->string('hari');
            $table->string('slug');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('gambar');
            $table->string('tag');
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
