<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jbansos extends Model
{
    protected $table = 'jbansos';
    protected $primaryKey = 'jbansos_id';
    protected $fillable = ['kategori_bansos'];
}
