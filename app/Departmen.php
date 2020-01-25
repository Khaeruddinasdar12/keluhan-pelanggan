<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departmen extends Model
{
    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }
}
