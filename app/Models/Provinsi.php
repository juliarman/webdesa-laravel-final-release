<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{

    protected $table = 'provinsi';
    protected $primaryKey = 'provinsi_id';
    protected $guarded = [];


    public function kota()
    {
        return $this->hasMany(Kota::class);
    }
}
