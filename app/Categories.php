<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'categories_id';


    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
