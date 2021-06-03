<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';
    protected $primaryKey = 'photo_id';
    protected $fillable = ['photo_id, album_id'];

    public function album()
    {

        return $this->belongsTo(Album::class, 'album_id');
    }
}
