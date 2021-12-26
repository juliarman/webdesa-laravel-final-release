<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('profile_id');
            $table->string('nama_desa')->nullable();
            $table->string('email')->nullable();
            $table->string('kepala_desa')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('url')->nullable();
            $table->string('alamat')->nullable();
            $table->text('map')->nullable();
            $table->text('isi_konten')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('quotes')->nullable();
            $table->string('logo')->nullable();
            $table->string('photo_kepdes')->nullable();
            $table->string('keyword')->nullable();
            $table->string('visimisi')->nullable();
            $table->string('favicon')->nullable();
            $table->string('welcome')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('profile');
    }
}
