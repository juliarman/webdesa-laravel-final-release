<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('agenda', function (Blueprint $table) {
            $table->bigIncrements('agenda_id');
            $table->string('judul')->nullable();
            $table->string('tempat')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('slug')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
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
