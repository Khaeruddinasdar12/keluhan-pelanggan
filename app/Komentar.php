<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    public function departmen()
    {
        return $this->belongsTo('App\Departmen');
    }
}
