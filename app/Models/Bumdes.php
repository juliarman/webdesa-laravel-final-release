<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bumdes extends Model
{
    protected $table = 'bumdes';
    protected $primaryKey = 'bumdes_id';
    protected $fillable = ['judul', 'isi_konten', 'users_id', 'status', 'sub_judul', 'gambar'];
    protected $guarded = [];


    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function getImages()
    {
        if (!$this->gambar) {
            return asset('assets/images/berita/default.jpg');
        }
        return asset($this->gambar);
    }
}
