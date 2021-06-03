<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JSurat extends Model
{
    protected $table = 'jsurat';
    protected $primaryKey = 'jsurat_id';
    protected $fillable = ['jenis_surat'];
}
