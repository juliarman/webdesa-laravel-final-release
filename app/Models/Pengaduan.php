<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'pengaduan_id';
    protected $fillable = ['subjek', 'pesan', 'nama', 'kontak', 'status'];
}
