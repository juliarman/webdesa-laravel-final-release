<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'album_id';
    protected $fillable = ['album_id', 'nama_album', 'deskripsi'];


    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
}
