<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'profile_id';
    protected $fillable = [
        'nama_desa', 'email',
        'kepala_desa', 'no_telpon',
        'url', 'alamat', 'map', 'deskripsi',
        'logo', 'keyword', 'visimisi', 'welcome', 'favicon', 'isi_konten', 'quotes', 'photo_kepdes',
        'facebook', 'instagram', 'twitter', 'youtube'
    ];
}
