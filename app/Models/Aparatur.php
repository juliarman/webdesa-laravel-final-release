<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparatur extends Model
{
    public $timestamps = false;
    protected $table = 'aparatur';
    protected $primaryKey = 'aparatur_id';
    protected $fillable = ['nama', 'jabatan', 'no_hp', 'photo'];
}
