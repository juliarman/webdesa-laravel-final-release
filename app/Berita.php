<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model

{

    protected $table = 'berita';
    protected $primaryKey = 'berita_id';
    protected $fillable = ['judul', 'isi_konten', 'users_id', 'status', 'sub_judul', 'gambar'];
    protected $guarded = [];


    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }


    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }



    public function getImages()
    {
        if (!$this->gambar) {
            return asset('assets/images/berita/default.jpg');
        }
        return asset($this->gambar);
    }
}
