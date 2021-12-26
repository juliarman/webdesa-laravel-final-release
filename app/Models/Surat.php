<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'surat_id';
    protected $fillable = [
        'nama', 'nik', 'no_hp',
        'status', 'jenis_surat', 'pesan', 'ttl', 'pekerjaan',
        'alamat_lengkap', 'umur',
        'kelamin', 'agama', 'photo_berkas_pendukung_1',
        'photo_berkas_pendukung2'
    ];
}
