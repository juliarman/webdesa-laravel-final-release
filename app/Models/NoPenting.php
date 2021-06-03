<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoPenting extends Model
{
    protected $table = 'nopenting';
    protected $primaryKey = 'nopenting_id';
    protected $fillable = ['nama', 'nomor'];
}
