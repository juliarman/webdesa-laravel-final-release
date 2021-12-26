<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bansos extends Model
{
    protected $table = 'bansos';
    protected $primaryKey = 'bansos_id';
    protected $fillable = [
        'nama', 'no_ktp', 'no_kk',
        'no_hp', 'alamat', 'keterangan',
        'jenis_bantuan', 'status', 'nama_provinsi', 'nama_kabupaten',
        'nama_kecamatan', 'nama_kelurahan', 'no_rt',
        'no_rw', 'cif', 'no_rekening', 'no_kartu', 'kocab', 'nama_area', 'reg'
    ];
}
