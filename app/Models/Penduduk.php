<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'penduduk_id';
    protected $fillable = ['no_kk', 'no_nik', 'nama', 'kelamin', 'tempat_lahir', 'tgl_lahir', 'agama', 'pendidikan', 'pekerjaan', 'status_perkawinan', 'status_keluaraga', 'ayah', 'ibu', 'alamat', 'no_hp', 'status', 'keterangan', 'photo'];
    protected $casts = [
        'tgl_lahir' => 'datetime:d/m/Y',
    ];


    public function getImages()
    {

        if (!$this->photo) {
            return asset('assets/images/user-default.png');
        }
        return asset($this->photo);
    }
}
