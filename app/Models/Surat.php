<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'surat_id';
    protected $fillable = ['nama', 'nik', 'no_hp', 'jenis_surat', 'pesan'];
}
