<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'penduduk_id';
    protected $fillable = ['nama', 'no_nik', 'no_kk', 'no_hp', 'kelamin', 'agama', 'tgl_lahir', 'photo', 'pekerjaan', 'tempat_lahir', 'alamat'];
}
