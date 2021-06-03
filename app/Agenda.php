<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'agenda_id';
    protected $fillable = ['judul', 'tempat', 'waktu', 'tanggal', 'keterangan'];
}
