<?php

namespace App;

use App\Models\Bumdes;
use Illuminate\Database\Eloquent\Model;


class User extends \Illuminate\Foundation\Auth\User
{

    protected $table = 'users';
    protected $primaryKey = 'users_id';
    protected $fillable = ['username', 'name', 'no_hp', 'foto', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];



    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function bumdes()
    {

        return $this->hasMany(Bumdes::class);
    }

    public function defaultImage()
    {


        if (!$this->foto) {

            return asset('assets/images/user-default.png');
        }

        return asset($this->foto);
    }
}
