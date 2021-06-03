<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends \Illuminate\Foundation\Auth\User
{

    protected $table = 'users';
    protected $primaryKey = 'users_id';
    protected $fillable = ['username', 'fullname', 'no_hp', 'foto', 'level', 'blok', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];



    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
