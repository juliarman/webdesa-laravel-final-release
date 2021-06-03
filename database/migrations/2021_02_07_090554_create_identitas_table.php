<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            $table->bigIncrements('identitas_id');
            $table->string('nama_website')->nullable();
            $table->string('logo_website')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('url_website')->nullable();
            $table->string('meta_deskripsi')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('favicon')->nullable();
            $table->string('maps')->nullable();
            $table->string('nama_kepdes')->nullable();
            $table->string('photo_kepdes')->nullable();
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
